<?php 
namespace App\Controllers;
use App\Models\MainModel;
use App\Models\Financial_Model;

class Financial_Metrics extends BaseController
{	
	function __construct(){
        //parent::__construct();
        //$this->session = \Config\Services::session();
        //$this->session->remove('user_name');
        $this->data = array();
        $this->Financial = new Financial_Model();
    } 

    public function getOverallTarget(){
    	$Targets =  $this->Financial->getGoalsFinancialData();
    	return json_encode($Targets);
    }

    public function OverallOEETarget(){
        $ref="Overall";
        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        $Overall = $this->getDataRaw($ref,$fromTime,$toTime);
        echo json_encode($Overall);
    }

	public function getDataRaw($graphRef,$fromTime=null,$toTime=null){
        //if($this->request->isAjax()){
            // $fromTime = $this->request->getVar("from");
            // $toTime = $this->request->getVar("to");

            // $fromTime = "2022-05-06T18:00:00";
            // $toTime = "2022-05-07T20:11:02";

            // // Calculation for to find ALL time value
            $tmpFromDate =explode("T", $fromTime);
            $tmpToDate = explode("T", $toTime);

            //Difference between two dates......
            $diff = abs(strtotime($toTime) - strtotime($fromTime));
            $AllTime = (int)($diff/60);

            //time split for date+time seperated values
            $tmpFrom = explode("T",$fromTime);
            $tmpTo = explode("T",$toTime);
            // temporary time......
            $tempFrom = explode(":",$tmpFrom[1]);
            $tempTo = explode(":",$tmpTo[1]);
            //From date
            $FromDate = $tmpFrom[0];
            //milli seconds added ":00", because in real data milli seconds added
            $FromTime = $tempFrom[0].":00".":00";
            //Exact value
            //$FromTime = $tmpFrom[1];
            //To Date
            $ToDate = $tmpTo[0];
            //milli seconds added ":00"
            $ToTime = $tempTo[0].":00".":00";
            //Exact Value
            //$ToTime = $tmpTo[1];
            //echo $FromTime;

            // //Data from reason mapping table
            $output = $this->Financial->getDataRaw($FromDate,$FromTime,$ToDate,$ToTime);
            $outputCopy = $output;
            //Machine list Details....
            $machine = $this->Financial->getMachineRec($FromDate,$ToDate);
            $machine = $this->Financial->getMachineRecActive();
            //Convert Machine Id as per the real data id......
            $machine = $this->convertMachineId($machine);
            //Part list Details......
            $part = $this->Financial->getPartRec($FromDate,$ToDate);
            //Production Data......
            $production = $this->Financial->getProductionRec($FromDate,$ToDate);
            $productionCopy = $production;


            //$tmpDataArray = [];
            foreach ($output as $key => $value) {   
                if ($value['shift_date'] == $FromDate  && $value['start_time'] < $FromTime) {
                    //array_push($tmpDataArray, $value);
                    unset($output[$key]);
                }
                if ($value['shift_date'] == $ToDate  && $value['end_time'] > $ToTime) {
                    unset($output[$key]);
                }
            }


            foreach ($production as $key => $value) {   
                if ($value['shift_date'] == $FromDate  && $value['start_time'] < $FromTime) {
                    //array_push($tmpDataArray, $value);
                    unset($production[$key]);
                }
                if ($value['shift_date'] == $ToDate  && $value['end_time'] > $ToTime) {
                    unset($production[$key]);
                }
            }

            //Downtime reasons calculated.....
            $MachineWiseDataRaw = $this->storeData($output,$production,$machine,$part);
            //Get number of date list in the given start and end option.....
            $shiftDate = $this->Financial->getShiftDate($FromDate,$ToDate);

            //Parts produced detailes has been calculated......
            //$productionCountData = $this->productionData($MachineWiseDataRaw,$machine,$part);

            //Function return for qualityOpportunity graph........
            if ($graphRef == "qualityOpportunity") {
                return $production;
            } 
            
            // echo "<pre>";
            // print_r($MachineWiseDataRaw);

            //Part Details.....
            $partsDetails = $this->Financial->settings_tools(); 
            
            //Data calculation for OEE function call
            //Downtime data has been calculated......
            $downtime = $this->oeeData($MachineWiseDataRaw,$machine,$part);

            
            //Function return for performanceOpportunity graph........
            if ($graphRef == "PerformanceOpportunity") {
                $res['production'] = $production;
                $res['downtime'] = $downtime;
                $res['machineData'] = $MachineWiseDataRaw;
                $res['all']=$AllTime;
                return $res;
            } 

            //Machine wise Performance,Quality,Availability........
            $MachineWiseData = [];
            foreach ($downtime as $down) {
                $PlannedDownTime = $down['Planned'];
                $UnplannedDownTime = $down['Unplanned'];
                $MachineOFFDownTime = $down['Machine_OFF'];
                $All = $AllTime;

                $TotalCTPP_NICT = 0 ;
                $TotalCTPP = 0 ;
                $TotalReject = 0 ;
                $TotalCTPP_NICT_Arry = [];
                foreach ($part as $p) { 
                    $tmpCorrectedTPP_NICT = 0;
                    $tmpCorrectedTPP = 0;
                    $tmpReject = 0;
                    foreach ($production as $product) {
                        if ($product['machine_id'] == $down['Machine_ID'] && $p['part_id'] == $product['part_id']) {

                            //To find NICT.....
                            $NICT = 0;
                            foreach ($partsDetails as $partVal) {
                                if ($p['part_id'] == $partVal->part_id) {
                                    $NICT = number_format($partVal->NICT/60,2);
                                }
                            }
                            
                            $corrected_tpp = $product['production']+($product['corrections']);
                            $CorrectedTPP_NICT = $NICT*$corrected_tpp;
                            // For Find Performance.....
                            $tmpCorrectedTPP_NICT = $tmpCorrectedTPP_NICT+$CorrectedTPP_NICT;

                            //For Find Quality.......
                            $tmpCorrectedTPP = $tmpCorrectedTPP+$corrected_tpp;
                            $tmpReject = $tmpReject+$product['rejections'];
                         }
                    }
                    $TotalCTPP_NICT =$TotalCTPP_NICT+$tmpCorrectedTPP_NICT;
                    $TotalCTPP =$TotalCTPP+$tmpCorrectedTPP;
                    $TotalReject = $TotalReject+$tmpReject;
                }

                //conversion for the parameters for avoid Division by Zero Error
                if ($TotalCTPP <=0) {
                    $TotalCTPP = 1;
                }

                //Machine Wise Performance ......
                $performance = number_format(($TotalCTPP_NICT)/($All-$down['Planned']-$down['Unplanned']-$down['Machine_OFF']),2);
                if ($performance<0) {
                    $performance = 0;
                }

                //Machine Wise Quality ......
                $quality = number_format(($TotalCTPP - $TotalReject)/($TotalCTPP),2);
                //Machine Wise Availability ......
                $availability = number_format(($All-$down['Planned']-$down['Unplanned']-$down['Machine_OFF'])/($All-$down['Planned']-$down['Machine_OFF']),2);
                // Machine Wise Availability TEEP.......
                $availTEEP = number_format(($All-$down['Planned']-$down['Unplanned']-$down['Machine_OFF'])/($All-$down['Planned']),2);
                // Machine Wise Availability OOE.....
                $availOOE = number_format(($All-$down['Planned']-$down['Unplanned']-$down['Machine_OFF'])/($All-$down['Machine_OFF']),2);
                //Machine Wise OEE .......
                $oee = number_format(($performance*$quality*$availability),2);
                // Machine Wise TEEP.....
                $teep = number_format(($performance*$quality*$availTEEP),2);
                // Machine Wise OOE.....
                $ooe = number_format(($performance*$quality*$availOOE),2);

                //Store Machine wise Data......
                $tmp = array("Machine_Id"=>$down['Machine_ID'],"Availability"=>$availability,"Performance"=>$performance,"Quality"=>$quality,"Availability_TEEP"=>$availTEEP,"Availability_OOE"=>$availOOE,"OEE"=>$oee,"TEEP"=>$teep,"OOE"=>$ooe);
                array_push($MachineWiseData, $tmp);
            }

            if ($graphRef == "MachinewiseOEE") {
                return $MachineWiseData;
            }
            if ($graphRef == "ReasonwiseMachine") {
                return $downtime;
            }
            
            
            $Overall = $this->calculateOverallOEE($MachineWiseData);
            if ($graphRef ="Overall") {
                return $Overall;
            }
            // echo "<pre>";
            // print_r($MachineWiseData);
        // }
    }
    // public function getDataRaw($graphRef){
    //     // if($this->request->isAjax()){
    //         // $fromTime = $this->request->getVar("from");
    //         // $toTime = $this->request->getVar("to");

    //         $fromTime = "2022-05-06T18:00:00";
    //         $toTime = "2022-05-07T20:11:02";

    //         // // Calculation for to find ALL time value
    //         $tmpFromDate =explode("T", $fromTime);
    //         $tmpToDate = explode("T", $toTime);

    //         //Difference between two dates......
    //         $diff = abs(strtotime($toTime) - strtotime($fromTime));
    //         $AllTime = (int)($diff/60);

    //         //time split for date+time seperated values
    //         $tmpFrom = explode("T",$fromTime);
    //         $tmpTo = explode("T",$toTime);
    //         // temporary time......
    //         $tempFrom = explode(":",$tmpFrom[1]);
    //         $tempTo = explode(":",$tmpTo[1]);
    //         //From date
    //         $FromDate = $tmpFrom[0];
    //         //milli seconds added ":00", because in real data milli seconds added
    //         $FromTime = $tempFrom[0].":00".":00";
    //         //Exact value
    //         //$FromTime = $tmpFrom[1];
    //         //To Date
    //         $ToDate = $tmpTo[0];
    //         //milli seconds added ":00"
    //         $ToTime = $tempTo[0].":00".":00";
    //         //Exact Value
    //         //$ToTime = $tmpTo[1];
    //         //echo $FromTime;

    //         // //Data from reason mapping table
    //         $output = $this->Financial->getDataRaw($FromDate,$FromTime,$ToDate,$ToTime);
    //         $outputCopy = $output;
    //         //Machine list Details....
    //         $machine = $this->Financial->getMachineRec($FromDate,$ToDate);
    //         $machine = $this->Financial->getMachineRecActive();
    //         //Convert Machine Id as per the real data id......
    //         $machine = $this->convertMachineId($machine);
    //         //Part list Details......
    //         $part = $this->Financial->getPartRec($FromDate,$ToDate);
    //         //Production Data......
    //         $production = $this->Financial->getProductionRec($FromDate,$ToDate);
    //         $productionCopy = $production;


    //         //$tmpDataArray = [];
    //         foreach ($output as $key => $value) {   
    //             if ($value['shift_date'] == $FromDate  && $value['start_time'] < $FromTime) {
    //                 //array_push($tmpDataArray, $value);
    //                 unset($output[$key]);
    //             }
    //             if ($value['shift_date'] == $ToDate  && $value['end_time'] > $ToTime) {
    //                 unset($output[$key]);
    //             }
    //         }


    //         foreach ($production as $key => $value) {   
    //             if ($value['shift_date'] == $FromDate  && $value['start_time'] < $FromTime) {
    //                 //array_push($tmpDataArray, $value);
    //                 unset($production[$key]);
    //             }
    //             if ($value['shift_date'] == $ToDate  && $value['end_time'] > $ToTime) {
    //                 unset($production[$key]);
    //             }
    //         }

    //         //Downtime reasons calculated.....
    //         $MachineWiseDataRaw = $this->storeData($output,$production,$machine,$part);
    //         //Get number of date list in the given start and end option.....
    //         $shiftDate = $this->Financial->getShiftDate($FromDate,$ToDate);

    //         //Parts produced detailes has been calculated......
    //         //$productionCountData = $this->productionData($MachineWiseDataRaw,$machine,$part);

    //         //Part Details.....
    //         $partsDetails = $this->Financial->settings_tools(); 
            
    //         //Data calculation for OEE function call
    //         //Downtime data has been calculated......
    //         $downtime = $this->oeeData($MachineWiseDataRaw,$machine,$part);

    //         //Machine wise Performance,Quality,Availability........
    //         $MachineWiseData = [];
    //         foreach ($downtime as $down) {
    //             $PlannedDownTime = $down['Planned'];
    //             $UnplannedDownTime = $down['Unplanned'];
    //             $MachineOFFDownTime = $down['Machine_OFF'];
    //             $All = $AllTime;

    //             $TotalCTPP_NICT = 0 ;
    //             $TotalCTPP = 0 ;
    //             $TotalReject = 0 ;
    //             $TotalCTPP_NICT_Arry = [];
    //             foreach ($part as $p) { 
    //                 $tmpCorrectedTPP_NICT = 0;
    //                 $tmpCorrectedTPP = 0;
    //                 $tmpReject = 0;
    //                 foreach ($production as $product) {
    //                     if ($product['machine_id'] == $down['Machine_ID'] && $p['part_id'] == $product['part_id']) {

    //                         //To find NICT.....
    //                         $NICT = 0;
    //                         foreach ($partsDetails as $partVal) {
    //                             if ($p['part_id'] == $partVal->part_id) {
    //                                 $NICT = number_format($partVal->NICT/60,2);
    //                             }
    //                         }
                            
    //                         $corrected_tpp = $product['production']+($product['corrections']);
    //                         $CorrectedTPP_NICT = $NICT*$corrected_tpp;
    //                         // For Find Performance.....
    //                         $tmpCorrectedTPP_NICT = $tmpCorrectedTPP_NICT+$CorrectedTPP_NICT;

    //                         //For Find Quality.......
    //                         $tmpCorrectedTPP = $tmpCorrectedTPP+$corrected_tpp;
    //                         $tmpReject = $tmpReject+$product['rejections'];
    //                      }
    //                 }
    //                 $TotalCTPP_NICT =$TotalCTPP_NICT+$tmpCorrectedTPP_NICT;
    //                 $TotalCTPP =$TotalCTPP+$tmpCorrectedTPP;
    //                 $TotalReject = $TotalReject+$tmpReject;
    //             }

    //             //conversion for the parameters for avoid Division by Zero Error
    //             if ($TotalCTPP <=0) {
    //                 $TotalCTPP = 1;
    //             }

    //             //Machine Wise Performance ......
    //             $performance = number_format(($TotalCTPP_NICT)/($All-$down['Planned']-$down['Unplanned']-$down['Machine_OFF']),2);
    //             if ($performance<0) {
    //                 $performance = 0;
    //             }

    //             //Machine Wise Quality ......
    //             $quality = number_format(($TotalCTPP - $TotalReject)/($TotalCTPP),2);
    //             //Machine Wise Availability ......
    //             $availability = number_format(($All-$down['Planned']-$down['Unplanned']-$down['Machine_OFF'])/($All-$down['Planned']-$down['Machine_OFF']),2);
    //             // Machine Wise Availability TEEP.......
    //             $availTEEP = number_format(($All-$down['Planned']-$down['Unplanned']-$down['Machine_OFF'])/($All-$down['Planned']),2);
    //             // Machine Wise Availability OOE.....
    //             $availOOE = number_format(($All-$down['Planned']-$down['Unplanned']-$down['Machine_OFF'])/($All-$down['Machine_OFF']),2);
    //             //Machine Wise OEE .......
    //             $oee = number_format(($performance*$quality*$availability),2);
    //             // Machine Wise TEEP.....
    //             $teep = number_format(($performance*$quality*$availTEEP),2);
    //             // Machine Wise OOE.....
    //             $ooe = number_format(($performance*$quality*$availOOE),2);

    //             //Store Machine wise Data......
    //             $tmp = array("Machine_Id"=>$down['Machine_ID'],"Availability"=>$availability,"Performance"=>$performance,"Quality"=>$quality,"Availability_TEEP"=>$availTEEP,"Availability_OOE"=>$availOOE,"OEE"=>$oee,"TEEP"=>$teep,"OOE"=>$ooe);
    //             array_push($MachineWiseData, $tmp);
    //         }

    //         if ($graphRef == "MachinewiseOEE") {
    //             return $MachineWiseData;
    //         }
            
    //         $Overall = $this->calculateOverallOEE($MachineWiseData);
    //         echo json_encode($Overall);
    //         // echo "<pre>";
    //         // print_r($MachineWiseData);
    //     // }
    // }

        public function calculateOverallOEE($MachineWiseData)
    {
        //temporary variable for Overall OEE,OOE,TEEP.....
        $tmpOEE=0;
        $tmpOOE =0;
        $tmpTEEP=0;
        foreach ($MachineWiseData as $value) {
            $tmpOEE = $tmpOEE + $value['OEE'];
            $tmpOOE = $tmpOOE+$value['Availability_OOE'];
            $tmpTEEP = $tmpOOE+$value['Availability_TEEP'];
        }
        //Average of the OEE to calculate Overall OEE....
        $OverallOEE['Overall_OEE'] = number_format((($tmpOEE/(sizeof($MachineWiseData)))*100),2);
        $OverallOEE['Overall_OOE'] = number_format((($tmpOOE/(sizeof($MachineWiseData)))*100),2);
        $OverallOEE['Overall_TEEP'] = number_format((($tmpTEEP/(sizeof($MachineWiseData)))*100),2);
        return $OverallOEE;
    }

    public function storeData($rawData,$production,$machine,$part)
    {
        $MachineWiseDataRaw = [];
        foreach ($machine as $m) {
            //Temporary variable for machine wise data split.......
            $tmpMachineWise = [];
            foreach ($part as $p) {
                //Temporary variable for part wise data split.......
                $tmpPartWise = [];
                foreach ($rawData as $r) {

                    if (($r['machine_id'] == $m['machine_id']) AND $r['part_id'] == $p['part_id']) {
                        array_push($tmpPartWise, $r);
                    }
                }
                $tmp = array($p['part_id']=> $tmpPartWise);
                array_push($tmpMachineWise, $tmp);
            }
            $tmpMachine = array($m['machine_id'] =>$tmpMachineWise);
            array_push($MachineWiseDataRaw, $tmpMachine);
        }
    
      // echo "<pre>";
      // print_r($production);
      return $MachineWiseDataRaw;
    }

    public function getMachineWiseOEE(){
        // if($this->request->isAjax()){

        // }

        $ref = "MachinewiseOEE";
        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        //Machine Wise Calculated Data...........
        $MachinewiseData = $this->getDataRaw($ref,$fromTime,$toTime);
        // Machine Name and ID Reference............
        $MachineName = $this->Financial->getMachineRecGraph();
        // Machine Id Conversion as per the Machine data.......
        $MachineName = $this->convertMachineId($MachineName);
        // General Settings Targets......
        $Targets =  $this->Financial->getGoalsFinancialData();

        // echo "<pre>";
        // print_r($Targets);

        $Availability= [];
        $Quality =[];
        $Performance =[];
        $MachineNameRef =[];
        $OEE=[]; 
        $AvailabilityTarget= [];
        $QualityTarget= [];
        $PerformanceTarget =[];
        $OEETarget=[]; 


        //Initially insert zero values for UI Perfections........
        array_push($MachineNameRef, "");
        array_push($Availability, $Targets[0]['availability']);
        array_push($Quality,$Targets[0]['quality']);
        array_push($Performance, $Targets[0]['performance']);
        array_push($OEE, 0);
        array_push($AvailabilityTarget, $Targets[0]['availability']);
        array_push($QualityTarget, $Targets[0]['quality']);
        array_push($PerformanceTarget, $Targets[0]['performance']);
        array_push($OEETarget, $Targets[0]['oee_target']);

        foreach ($MachinewiseData as $value) {
            foreach ($MachineName as $name) {
                if ($name['machine_id'] == $value['Machine_Id']) {
                    array_push($MachineNameRef, $name['machine_name']);
                    array_push($Availability, ($value['Availability']*100));
                    array_push($Quality, ($value['Quality']*100));
                    array_push($Performance, ($value['Performance']*100));
                    array_push($OEE, ($value['OEE']*100));

                    array_push($AvailabilityTarget, $Targets[0]['availability']);
                    array_push($QualityTarget, $Targets[0]['quality']);
                    array_push($PerformanceTarget, $Targets[0]['performance']);
                    array_push($OEETarget, $Targets[0]['oee_target']);
                }
            }
        }

        //Finally insert zero values for UI Perfection...........
        array_push($MachineNameRef, "");
        array_push($Availability, $Targets[0]['availability']);
        array_push($Quality, $Targets[0]['quality']);
        array_push($Performance, $Targets[0]['performance']);
        array_push($OEE, 0);
        array_push($AvailabilityTarget, $Targets[0]['availability']);
        array_push($QualityTarget, $Targets[0]['quality']);
        array_push($PerformanceTarget, $Targets[0]['performance']);
        array_push($OEETarget, $Targets[0]['oee_target']);
        
        //$graphData = array("Availability"=>$Availability,"Quality"=>$Quality,"Performance"=>$Performance,"OEE"=>$OEE,"MachineName"=>$MachineNameRef);

        $graphData['Availability'] = $Availability;
        $graphData['Quality'] = $Quality;
        $graphData['Performance'] = $Performance;
        $graphData['OEE'] = $OEE;
        $graphData['MachineName'] = $MachineNameRef;
        $graphData['AvailabilityTarget'] = $AvailabilityTarget;
        $graphData['QualityTarget'] = $QualityTarget;
        $graphData['PerformanceTarget'] = $PerformanceTarget;
        $graphData['OEETarget'] = $OEE;

        // echo "<pre>";
        // print_r($graphData);
        echo json_encode($graphData);
    }

    public function productionData($MachineWiseDataRaw,$machine,$part){
        //function for get part data to cairo_matrix_invert(matrix)lculate productions.....
        $partDetails = $this->Financial->settings_tools();

        //Production Details.....
        $ProductionData = [];
        foreach ($MachineWiseDataRaw as $Machine){
            foreach ($Machine as $machineKey => $Part) {
                $PartWiseData = [];
                foreach ($Part as $Record) {
                    $PartNoOfShots = 0;
                    $PartcycleCount =0;
                    $PartTotalPartProduced =0;   
                    $PartNICT=0;
                    foreach ($Record as $key => $Values) {
                        
                        $tmpPartNoOfShots = 0;
                        $tmpcycleCount =0;
                        $tmpTotalPartProduced =0;
                        $tmpNICT=0;
                        foreach ($Values as $DTR) {
                            $start = $DTR['start_time'];
                            $end = $DTR['end_time'];
                            $part = $DTR['part_id'];
                            $shiftDate = $DTR['shift_date'];
                            $machine = $DTR['machine_id'];

                            $partProducedDetails = $this->Financial->getShotCount($start,$end,$shiftDate,$machine);

                            foreach ($partProducedDetails['start'] as $s) {
                                $startShot = $s['shot_count'];
                                
                            }

                            foreach ($partProducedDetails['end'] as $e) {
                                $endShot  = $e['shot_count'];
                                
                            }
                            $NoOfShots = $endShot - $startShot;
                            $cycleTime= 0;
                            foreach ($partDetails as $partData) {
                                if ($partData->part_id == $DTR['part_id']) {
                                    $cycleTime = $partData->part_produced_cycle;
                                    $NICT = number_format($partData->NICT/60, 2);
                                }
                            }
                            $tmpNICT = $NICT;
                            $TotalPartProduced = $NoOfShots*$cycleTime;

                            $tmpPartNoOfShots = $tmpPartNoOfShots+$NoOfShots;
                            $tmpcycleCount =$cycleTime;
                            $tmpTotalPartProduced =$tmpTotalPartProduced + $TotalPartProduced; 
                        }
                        $PartNoOfShots = $PartNoOfShots+$tmpPartNoOfShots;
                        $PartcycleCount =$tmpcycleCount;
                        $PartTotalPartProduced =$PartTotalPartProduced+$tmpTotalPartProduced;
                        $PartNICT = $tmpNICT;

                        $tmpArray = array("Part_Id"=>$key,"NoOfShots"=>$PartNoOfShots,"CycleTime"=>$PartcycleCount,"PartProduced"=>$PartTotalPartProduced,"NICT"=>$PartNICT);
                        array_push($PartWiseData, $tmpArray);
                    }
                }
                $tmpArrayMachine = array("Machine Id"=>$machineKey,"Parts" =>$PartWiseData);
                array_push($ProductionData, $tmpArrayMachine);
            }
        }
        // echo "<pre>";
        // print_r($ProductionData);
        return $ProductionData;

    }    

    public function oeeData($MachineWiseDataRaw,$machine,$part)
    {

        // echo "<pre>";
        // print_r($MachineWiseDataRaw);

        $DowntimeTimeData =[];
        foreach ($MachineWiseDataRaw as $Machine){
            $MachineOFFDown = 0;
            $UnplannedDown = 0;
            $PlannedDown = 0;
            $MachineId = "";
            foreach ($Machine as $key => $Part) {
                $MachineId = $key;
                foreach ($Part as $Record) {
                    $PartMachineOFFDown = 0;
                    $PartUnplannedDown = 0;
                    $PartPlannedDown = 0;
                    foreach ($Record as $Values) {
                        $tmpMachineOFFDown = 0;
                        $tmpPlannedDown = 0;
                        $tmpUnplannedDown = 0;
                        foreach ($Values as $key => $DTR) {
                            if($DTR['downtime_category'] == 'Unplanned'){
                                $tmpUnplannedDown = $tmpUnplannedDown + $DTR['split_duration'];
                            }
                            else if(($DTR['downtime_category'] == 'Planned') && ($DTR['downtime_reason'] == 'Machine OFF')){
                                $tmpMachineOFFDown = $tmpMachineOFFDown + $DTR['split_duration'];
                            }
                            else {
                                $tmpPlannedDown = $tmpPlannedDown + $DTR['split_duration'];
                            }
                        }
                        $PartMachineOFFDown = $PartMachineOFFDown + $tmpMachineOFFDown; 
                        $PartUnplannedDown = $PartUnplannedDown + $tmpUnplannedDown;
                        $PartPlannedDown = $PartPlannedDown + $tmpPlannedDown;
                    }
                    $MachineOFFDown = $PartMachineOFFDown + $MachineOFFDown; 
                    $UnplannedDown = $PartUnplannedDown + $UnplannedDown;
                    $PlannedDown = $PartPlannedDown + $PlannedDown;
                }
            }

            $tempCalc = $MachineOFFDown + $UnplannedDown + $PlannedDown;
            $tmpDown = array("Machine_ID"=>$MachineId,"Planned"=>$PlannedDown,"Unplanned"=>$UnplannedDown,"Machine_OFF"=>$MachineOFFDown,"All"=>$tempCalc);
            array_push($DowntimeTimeData, $tmpDown);
        }
        // echo "<pre>";
        // print_r($DowntimeTimeData);
        return $DowntimeTimeData;
    }

    public function convertMachineId($machine){
        // echo "<pre>";
        // print_r($machine);
        foreach ($machine as $key => $value) {
            $tmp = explode("C", $value['machine_id']);
            $machine[$key]['machine_id'] = ($tmp[1]-1000);
        }
        return $machine;
    }

    public function getAvailabilityReasonWise(){
        $ref = "ReasonwiseMachine";

        // $fromTime = "2022-05-06T18:00:00";
        // $toTime = "2022-05-07T20:11:02";
        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        // // Calculation for to find ALL time value
            $tmpFromDate =explode("T", $fromTime);
            $tmpToDate = explode("T", $toTime);

            //Difference between two dates......
            $diff = abs(strtotime($toTime) - strtotime($fromTime));
            $AllTime = (int)($diff/60);

            //time split for date+time seperated values
            $tmpFrom = explode("T",$fromTime);
            $tmpTo = explode("T",$toTime);
            // temporary time......
            $tempFrom = explode(":",$tmpFrom[1]);
            $tempTo = explode(":",$tmpTo[1]);
            //From date
            $FromDate = $tmpFrom[0];
            //milli seconds added ":00", because in real data milli seconds added
            $FromTime = $tempFrom[0].":00".":00";
            //Exact value
            //$FromTime = $tmpFrom[1];
            //To Date
            $ToDate = $tmpTo[0];
            //milli seconds added ":00"
            $ToTime = $tempTo[0].":00".":00";

        //Machine Wise Calculated Data...........
            //$MachinewiseData = $this->getDataRaw($ref);
        // Machine Name and ID Reference............
        $MachineName = $this->Financial->getMachineRecGraph();
        // Machine Id Conversion as per the Machine data.......
        $MachineName = $this->convertMachineId($MachineName);
        // Downtime Reason.......
        $DowntimeReason = $this->Financial->downtimeReason();
        // Machine Data.........
        $ReasonwiseData = $this->Financial->ReasonwiseData($FromDate,$ToDate);

        // echo "<pre>";
        // //print_r($ReasonwiseData[0]['SUM(split_duration)']);
        // print_r($ReasonwiseData);

        //Reason wise Availability for Logical Perspective..........
        $ReasonwiseAvailability =[];
        $AvailabilityTotal = [];
        $GrandTotal = 0;
        foreach ($DowntimeReason as $reason) {
            $tmpMachine=[];
            $tmpTotal = 0;
            foreach ($MachineName as $key => $machine) {
                $tmp=[];
                foreach ($ReasonwiseData as $key => $value) {
                    if ($value['machine_id'] == $machine['machine_id'] AND $value['downtime_reason_id'] == $reason['downtime_reason_id']) {
                        $tmpArray = array("machine_id"=>$machine['machine_id'],"machine_name"=>$machine['machine_name'],"duration"=>$value['SUM(split_duration)']);
                        array_push($tmp, $tmpArray);
                        $tmpTotal = $tmpTotal + $value['SUM(split_duration)'];
                    }
                }
                array_push($tmpMachine, $tmp);
            }
            $temp = array("reason_id"=>$reason['downtime_reason_id'],"reason_name"=>$reason['downtime_reason'],"data"=>$tmpMachine);
            array_push($ReasonwiseAvailability, $temp);
            array_push($AvailabilityTotal, $tmpTotal);
            $GrandTotal =$GrandTotal + $tmpTotal;
        }   

        /// Machine wise reason for Graph Perspective.......
        $ReasonwiseAvailabilityGraph=[];
        foreach ($MachineName as $machine) {
            $tmpMachine=[];
            foreach ($DowntimeReason as $reason) {
                $tmp=[];
                foreach ($ReasonwiseData as $value) {
                    if ($value['machine_id'] == $machine['machine_id'] AND $value['downtime_reason_id'] == $reason['downtime_reason_id']) {
                        $tmpArray = array("downtime_reason_id"=>$reason['downtime_reason_id'],"reason_name"=>$reason['downtime_reason'],"duration"=>$value['SUM(split_duration)']);
                        array_push($tmp, $tmpArray);
                    }
                }
                array_push($tmpMachine, $tmp);
            }
            
            $temp = array("machine_id"=>$machine['machine_id'],"machine_name"=>$machine['machine_name'],"data"=>$tmpMachine);
            array_push($ReasonwiseAvailabilityGraph, $temp);
        }

            $res['data'] = $ReasonwiseAvailabilityGraph;
            $res['reason'] = $DowntimeReason;
            $res['total'] = $AvailabilityTotal;
            $res['grandTotal'] = $GrandTotal;
            $res['machineName'] = $MachineName;
            // echo "<pre>";
            // print_r($res['data']);
        echo json_encode($res);
    }


    public function qualityOpportunity(){
        $qualityReason = $this->Financial->qualityReason();

        //Function call for production data............
        $ref = "qualityOpportunity";
        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");
        // $fromTime = "2022-05-06T18:00:00";
        // $toTime = "2022-05-07T20:11:02";

        $ProductionData = $this->getDataRaw($ref,$fromTime,$toTime);
        // echo "<pre>";
        // print_r($ProductionData);
        $ProductionDataExpand = [];
        foreach ($ProductionData as $value) {
            $reasons =  explode("&&", $value['reject_reason']);

            foreach ($reasons as $count) {
                $total = preg_replace("/[^0-9]/", '', $count);
              
                $temp = explode($total, $count);
                $reason = $temp[1];
                $tmp = array("machine_id"=>$value['machine_id'],"part_id"=>$value['part_id'],"reject_count"=>$total,"reject_reason"=>$reason,"total_reject"=>$value['rejections'],"total_correct"=>$value['corrections'],"total_production"=>$value['production'],"shot_count"=>$value['actual_shot_count']);
                array_push($ProductionDataExpand, $tmp);
            }
        }

        $partDetails = $this->Financial->getPartDetails();

        $machineDetails = $this->Financial->getMachineDetails();

        // echo "<pre>";
        // print_r($partDetails);

        // $QualityData = [];
        // foreach ($qualityReason as $reason) {
        //     $tmp=[];
        //     foreach ($partDetails as $part) {
        //         $tmpPart =[];    
        //         foreach ($ProductionDataExpand as $production) {
        //             if ($part['part_id'] == $production['part_id'] AND $reason['quality_reason_name'] == $production['reject_reason'])  {
        //                 //$tmpArr = array();
        //                 array_push($tmpPart,$production['part_id']);
        //             }
        //         }
        //         array_push($tmp, $tmpPart);
        //     }
        //     $tmpArr=array("Reason"=>$reason['quality_reason_name'],"Part"=>$tmp);
        //     array_push($QualityData, $tmpArr);
        // }
        // echo "<pre>";
        // print_r($QualityData);

        //Part wise quality reason........
        $QualityAvailabilityData=[];
        $QualityAvailabilityActual =[];
        $PartArray =[];
        $ReasonArray=[];
        foreach ($partDetails as $part) {
            $tmpReason=[];
            $tmpActualReason=[];
            foreach ($qualityReason as $reason) {
                $tmpPart =[];
                $tmpTotalReject=0;
                $tmpOpportunityCost=0;
                foreach ($ProductionDataExpand as $production) {
                    if ($part['part_id'] == $production['part_id'] AND $reason['quality_reason_name'] == $production['reject_reason'])  {
                        // array_push($tmpPart,$reason['quality_reason_name']);
                        $MachineRateHour = 0;
                        $MachineOffRateHour=0;
                        foreach ($machineDetails as $machine) {
                            $tmp = explode("C", $machine['machine_id']);
                            $machineId = ($tmp[1]-1000);
                            
                            if ($machineId == $production['machine_id']) {
                                $MachineRateHour = $machine['rate_per_hour'];
                                $MachineOffRateHour = $machine['machine_offrate_per_hour'];
                            }
                        }

                        $PartPrice = $part['part_price'];
                        $MaterialPrice = $part['material_price'];
                        $PartWeight =$part['part_weight'];
                        $PartPrice =$part['part_price'];
                        // $NICT = $partData->NICT;
                        // $PartsProducedPerCycle =$partData->Part_Produced_Cycle;
                        // //$PartInMachine = $PlannedDown+$UnplannedDown;
                        $tmps = explode(":", $production['start_time']);
                        $tmpe = explode(":", $production['end_time']);
                        $tmpds = ($tmps[0]*3600)+($tmps[1]*60)+($tmps[2]);
                        $tmpde = ($tmpe[0]*3600)+($tmpe[1]*60)+($tmpe[2]);
                        $PartInMachine = (int)(($tmpde-$tmpds)/60);
                        // $NoOfShots = 90;
                        $TPP = $production['total_production'];

                        $Rejects =$production['total_reject'];
                        $Correction =$production['total_correct'];
                        $TCorrected = $TPP+($Correction);

                        $UMaterialCost  = $PartPrice*$TCorrected*($PartWeight/1000);
                        //$UProductionCost  = ($PartInMachine/60)*$MachineRateHour;
                        $UProductionCost  = ($PartInMachine/60)*$MachineRateHour;
                        $UTotalPartProducedCost = $UMaterialCost+$UProductionCost;
                        $GoodRevenu = $PartPrice*($TCorrected-$Rejects);
                        $ProfitLoss = $GoodRevenu-$UTotalPartProducedCost;

                        // //unit part produced cost
                        $unitPartProductionCost = number_format($UTotalPartProducedCost/$TCorrected,2);
                        $Treject=$Rejects;
                        $OppCost = number_format($Treject*$unitPartProductionCost,2);
                        
                        $tmpTotalReject =$tmpTotalReject+$Treject;
                        $tmpOpportunityCost=$tmpOpportunityCost+$OppCost;


                        $temp = array("Rejects_Reason"=>$production['reject_reason'],"Part_Id"=>$part['part_id'],"UnitCost"=>$unitPartProductionCost,"TotalRejects"=>$Treject,"OpportunityCost"=>$OppCost);
                        array_push($tmpPart, $temp);
                    }
                }
                array_push($tmpReason, $tmpPart);

                $tmpOpportunityCost = number_format($tmpOpportunityCost,0);
                $tmpTotalReject = number_format($tmpTotalReject,0);
                $tmpActual = array("Reason"=>$reason['quality_reason_name'],"TotalRejects"=>$tmpTotalReject,"TotalCost"=>$tmpOpportunityCost);
                array_push($tmpActualReason, $tmpActual);
                // echo "<pre>";
                // print_r($tmpActual);

            }
            //Reason wise parts.............
            $tmpArr=array("Part"=>$part['part_id'],"Reason"=>$tmpReason);
            array_push($QualityAvailabilityData, $tmpArr);

            //Part wise reason cumulative........
            $tmpAcualFinal = array("Part"=>$part['part_id'],"Reason"=>$tmpActualReason);
            array_push($QualityAvailabilityActual, $tmpAcualFinal);

            //Part Details..........
            array_push($PartArray,$part['part_id']);
            
        }

        foreach ($qualityReason as $key => $value) {
            array_push($ReasonArray, $value["quality_reason_name"]);
        }

        //Reason wise Total Cost Opportunity............
        $OverallOpportunity = 0;
        $ReasonWiseTotal=[];
        foreach ($ReasonArray as $res) {
            $tmpCost = 0;
            foreach ($QualityAvailabilityActual as $part) {
                foreach ($part['Reason'] as $value) {
                    if ($value['Reason'] == $res) {
                        $tmpCost=(int)$tmpCost+(int)$value['TotalCost'];
                    }
                }
            }
            array_push($ReasonWiseTotal, $tmpCost);
            $OverallOpportunity = $OverallOpportunity +$tmpCost;
        }

        $result['OppCost'] = $QualityAvailabilityActual;
        $result['Part'] = $PartArray;
        $result['Reason']=$ReasonArray;
        $result['GrandTotal']=$OverallOpportunity;
        $result['Total']=$ReasonWiseTotal;

        // echo "<pre>";
        // print_r($result);
        // echo "<br>";
        // echo $OverallOpportunity;
        echo json_encode($result);
    }

    public function performanceOpportunity(){
        $ref = "PerformanceOpportunity";

        $fromTime = $this->request->getVar("from");
        $toTime = $this->request->getVar("to");

        // $fromTime = "2022-05-06T18:00:00";
        // $toTime = "2022-05-07T20:11:02";

        $machineData = $this->getDataRaw($ref,$fromTime,$toTime);
        $partDetails = $this->Financial->PartDetails();
        $machineDetails = $this->Financial->getMachineDetails();

        //Availability Opportunity.........
        $AvailabilityOpportunity=[];
        //Direct value for graph......
        $varDataMachine=[];
        foreach ($machineData['downtime'] as $machine) {
            $tmpMachine=[];
            //Direct value for graph......
            $varData=[];
            foreach ($partDetails as $key => $part) {
                $tmpPart=[];
                $corrected_tppNICT=0;
                $machineOFFRate=0;
                foreach ($machineData['production'] as $val) {
                    if ($machine['Machine_ID']==$val['machine_id'] AND $part['part_id']==$val['part_id']) {
                        
                        foreach ($machineDetails as $m) {
                            $tmpm = explode("C", $m['machine_id']);
                            $machineId = ($tmpm[1]-1000);
                            if ($machineId == $machine['Machine_ID']) {
                                $machineOFFRate = $m['rate_per_hour'];
                            }
                        }
                        $corrected_tpp = $val['production']+($val['corrections']);
                        $ctpNICT = $part['NICT']*$corrected_tpp;
                        $corrected_tppNICT = $corrected_tppNICT+$ctpNICT;
                    }
                }
                $downtime=$machineData['all']-$machine['Planned']-$machine['Unplanned']-$machine['Machine_OFF'];
                if ($machineOFFRate<1) {
                    $machineOFFRate = 1;
                }
                // echo $corrected_tppNICT;
                // echo "<br>";
                //For no production........
                if ($corrected_tppNICT > 0) {
                    $Opportunity = number_format(($downtime-$corrected_tppNICT)/(60*$machineOFFRate),2);
                }
                else{
                    $Opportunity=0;
                }
                
                $temp = array("part_id"=>$part['part_id'],"data"=>$corrected_tppNICT,"OppCost"=>$Opportunity);
                array_push($tmpMachine, $temp);
                array_push($varData, $Opportunity);
            }
            $x = array("machine_id"=>$machine['Machine_ID'],"machineData"=>$tmpMachine);
            array_push($AvailabilityOpportunity, $x);

            $z= array("machine_id"=>$machine['Machine_ID'],"machineData"=>$varData);
            array_push($varDataMachine, $z);
            
        }

        // echo("<pre>");
        // print_r($varDataMachine);    

        $length = sizeof($varDataMachine);
        $l=sizeof($partDetails);
        $partTotal=[];
        $GrandTotal=0;
        for ($i=0; $i < $l ; $i++) { 
            $tmpPartTotal=0;
            for ($j=0; $j <$length ; $j++) { 
                $tmpPartTotal=$tmpPartTotal+($varDataMachine[$j]['machineData'][$i]);
            }
            $GrandTotal=$GrandTotal+$tmpPartTotal;
            array_push($partTotal, number_format($tmpPartTotal,2));
        }
        $res['dataPart']=$varDataMachine;
        $res['Part']=$partDetails;
        $res['Total']=$partTotal;
        $res['GrandTotal']=number_format($GrandTotal,0);
        echo json_encode($res);
    }

}

?>