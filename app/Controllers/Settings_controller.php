<?php 


namespace App\Controllers;
use App\Models\Settings_Model;

class Settings_controller extends BaseController{

	protected $datas;
	protected $session;
	public function __construct(){

		$this->session = \Config\Services::session();

		$this->datas = new Settings_Model();

	}

	// =======================================Machine Settings================================================
	// add machine
	  public function addMachine($select_opt=null,$select_sub_opt=null){
        helper(['form']);
        //if($_POST['Add_Machine'] ){
            $rules = [
                'inputMachineName' => 'required',
                'inputMachineRateHour' => 'required',
                'inputMachineOffRateHour' => 'required',
                'inputTonnage'    => 'required',
                'inputMachineBrand'    => 'required',
                'inputMachineSerialId'    => 'required',
            ];
            if ($this->validate($rules)) {

                $machineData = array();
                $machine = $this->machineRecordCount();
                //For site Location and Site Name for Iot gateway data.......
               // $siteData=$this->data->getSiteData($this->session->get('site'));
                $machineData["machine_id"] = "MC".($machine);
                $machineData["machine_name"] = $this->request->getVar('inputMachineName');
                $machineData["rate_per_hour"] = $this->request->getVar('inputMachineRateHour');
                $machineData["machine_offrate_per_hour"] = $this->request->getVar('inputMachineOffRateHour');
                $machineData["tonnage"] = $this->request->getVar('inputTonnage');
                $machineData["machine_brand"] = $this->request->getVar('inputMachineBrand');   
                $machineData["status"] = 1;
                $machineData["machine_serial_number"] = $this->request->getVar('inputMachineSerialId');
                $machineData['last_updated_by'] = $this->session->get('user_name');

                $machine_iot['location'] = $this->session->get('location');
                $machine_iot['site_id'] = $this->request->getVar('site_id');

                $this->data['add_Machine'] = $this->datas->add_Machine($machineData,$machine_iot);
                if($this->data['add_Machine']){
                    return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                }
                else{
                    return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                }
            }
            else{
                $this->data['validation']= $this->validator;
                $data2['Machine_Errors'] = [
                    1 => ''.$this->data['validation']->getError('inputMachineId').'',
                    2 => ''.$this->data['validation']->getError('inputMachineName').'',
                    3 => ''.$this->data['validation']->getError('inputTonnage').'',
                    4 => ''.$this->data['validation']->getError('inputMachinePerHour').'',
                    5 => ''.$this->data['validation']->getError('inputMachineOffCostPerHour').'',
                    6 => ''.$this->data['validation']->getError('inputLastModifiedby').''
                ];

                echo "Something went wrong, try again!!";
            }
        //}
    }


    // deactivate machine 
     public function deactivateMachine(){
        if($this->request->isAJAX()){
           $mData = $this->datas->getMachineData($this->request->getVar('MachineId'));
            $uData['machine_id'] = $mData['machine'][0]['machine_id'] ;
            $uData['machine_name'] = $mData['machine'][0]['machine_name'];
            $uData['rate_per_hour'] = $mData['machine'][0]['rate_per_hour'];
            $uData['machine_offrate_per_hour'] = $mData['machine'][0]['machine_offrate_per_hour'];
            $uData['tonnage'] = $mData['machine'][0]['tonnage'];
            $uData['machine_brand'] = $mData['machine'][0]['machine_brand'];
            $uData['status'] = $mData['machine'][0]['status'];
            $uData['machine_serial_number'] = $mData['machine'][0]['machine_serial_number'];
            $uData['last_updated_by'] = $this->session->get('user_name');

            $output = $this->datas->deactivateMachine($this->request->getVar('MachineId'),$this->request->getVar('Status_Machine'),$uData);
            echo json_encode($output);
        }
    }


    // get machine records
     public function getMachineData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getMachineData($this->request->getVar('MachineId'));
            echo json_encode($output);
        }
    }


    // settings machine update function
     public function editMachineData(){
        if($this->request->isAjax()){

            $req = $this->datas->getMachineData($this->request->getVar('MachineId'));
            $update['machine_id']= $req['machine'][0]['machine_id'];
            $update['machine_name']= $this->request->getVar('MachineName');
            $update['rate_per_hour']= $this->request->getVar('MachineRateHour');
            $update['machine_offrate_per_hour']= $this->request->getVar('MachineOffRateHour');
            $update['tonnage']= $this->request->getVar('Tonnage');
            $update['machine_brand']= $this->request->getVar('MachineBrand');
          //  $update['machine_serial_number']= $req['machine'][0]['machine_serial_number'];
            $update['status']= $req['machine'][0]['status'];
            $update['last_updated_by'] = $this->session->get('user_name');
            $serial_id = $this->request->getVar('machine_serial_id');
            $output = $this->datas->editMachineData($update,$this->request->getVar('MachineId'),$serial_id);
            echo json_encode($output);
        }
    }

    // 
    //  public function getSite(){
    //     if($this->request->isAJAX()){
    //         $output = $this->datas->getSite($this->request->getVar('Sname'));
    //         echo json_encode($output);
    //     }
    // }

      // check machine serial id
public function check_serialid(){
    if ($this->request->isAJAX()) {
        $serial_id = $this->request->getVar('serial_id');
        $res = $this->datas->check_machine_serialid($serial_id);
        
        echo json_encode($res);
    }
}
// machine id generation
public function machineRecordCount(){
        $rec = $this->datas->getMachineId();
        if (!empty($rec)) {
            //$id = explode("C",$user[0]['Machine_Id']);
            //$newId = $id[1]+1;
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }
       
        return $newId;
    }

    // count active and inactive machine counts
     public function aIaMachine(){
        if($this->request->isAJAX()){
            $output = $this->datas->aIaMachine();
            echo json_encode($output);
        }
    }


    // Part settings ===================================================================================

    // add part function
    public function addTool($select_opt=null,$select_sub_opt=null){
        helper(['form']);
        // if($_POST['Add_Tool'] ){
            $rules = [
                'inputPartName' => 'required',
                'inputNICT' => 'required',
                'inputNoOfPartsPerCycle' => 'required',
                'inputPartPrice'    => 'required',
                'inputPartWeight'    => 'required',
                'inputMaterialPrice'    => 'required',
                'inputMaterialName'    => 'required',
                 'inputToolName'    => 'required',
            ];

            print_r($_POST);
            
            if ($this->validate($rules)) {

                $machineData = array();
                $toolData = array();

                $part = $this->partRecordCount();
                $machineData["part_id"] = "PT".($part);
                $machineData["part_name"] = $this->request->getVar('inputPartName');
                $tool_opt = $this->request->getVar('inputToolName');
                if ($tool_opt == 'new') {
                    $tool = $this->toolRecordCount();
                    $machineData["tool_id"] = "TL".($tool);
                    $toolData["tool_id"]=$machineData["tool_id"];
                    $toolData["tool_name"]=$this->request->getVar('inputNewToolName');
                    $toolData["tool_status"]=1;
                    // $toolData["Created_By"]=$this->session->get('user_name');
                    // $toolData["Created_On"]=date('Y-m-d');
                    $toolData["last_updated_by"]=$this->session->get('user_name');
                }
                else{
                    //$output = $this->datas->getTool($tool_opt);
                    //print_r($output);
                    $machineData["tool_id"] = $tool_opt;
                    // $machineData["tool_name"] = $output[0]['tool_name'];
                }
                $machineData["NICT"] =$this->request->getVar('inputNICT'); 
                $machineData["part_produced_cycle"] = $this->request->getVar('inputNoOfPartsPerCycle');
                $machineData["part_price"] = $this->request->getVar('inputPartPrice');
                $machineData["part_weight"] =$this->request->getVar('inputPartWeight'); 
                // $machineData["tool_id"] = 'A123G46';
                $machineData["material_name"] =$this->request->getVar('inputMaterialName'); 
                $machineData["material_price"] = $this->request->getVar('inputMaterialPrice');;
                $machineData["status"] = 1;
                $machineData['last_updated_by'] = $this->session->get('user_name');
                // $uData =  $machineData;
                // $machineData["Created_By"] = $this->session->get('user_name');
                // $machineData["Created_On"] = date('Y-m-d');
                // $machineData["Last_Updated_By"] = $this->session->get('user_name');
                // $uData["Last_Updated_By"] = $this->session->get('user_name');

                // $this->data['add_Tool'] = $this->datas->add_Tool($machineData,$uData,$toolData);
                $this->data['add_Tool'] = $this->datas->add_Tool($machineData,$toolData);
                if($this->data['add_Tool']){
                   return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                }
                else{
                    echo "something went wrong, try again !!";
                }
            }
            else{
                $this->data['validation']= $this->validator;
                $data2['Machine_Errors'] = [
                    1 => ''.$this->data['validation']->getError('Tool_Name').'',
                    2 => ''.$this->data['validation']->getError('Job_Name').'',
                    3 => ''.$this->data['validation']->getError('NICT').'',
                    4 => ''.$this->data['validation']->getError('NoOfParts_Produced_Cycle').'',
                    5 => ''.$this->data['validation']->getError('Part_Price').'',
                    6 => ''.$this->data['validation']->getError('Material_Name').'',
                    7 => ''.$this->data['validation']->getError('Part_Weight').'',
                    8 => ''.$this->data['validation']->getError('MaterialMarket_Price').'',
                    9 => ''.$this->data['validation']->getError('Last_Modified_By').'',
                ];
               //  echo"<pre>";
               // print_r($this->data['Machine_Errors']) ;
               // print_r($data['validation']->listErrors());  
                //return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
            }        
        // }
        
    }

    // part settings id generation function
     public function partRecordCount(){
        $rec = $this->datas->getPartId();
        if (!empty($rec)) {
            // $id = explode("T",$user[0]['Part_Id']);
            //$newId = $id[1]+1;
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }
        return $newId;
    }

    // part settings tool id generation function
    public function toolRecordCount(){
        $rec = $this->datas->getToolId();
        if (!empty($rec)) {
            //$id = explode("L",$user[0]['Tool_ID']);
            //$newId = $id[1]+1;
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }
        
        return $newId;
    }


    // deactivate tool function
     public function deactivateTool(){
        if($this->request->isAJAX()){
            $tData = $this->datas->getToolData($this->request->getVar('Part_Id'));
            $uData['part_id'] = $tData['tool'][0]['part_id'] ;
            $uData['part_name'] = $tData['tool'][0]['part_name'];
            $uData['tool_id'] = $tData['tool'][0]['tool_id'];
            $uData['NICT'] = $tData['tool'][0]['NICT'];
            $uData['part_produced_cycle'] = $tData['tool'][0]['part_produced_cycle'];
            $uData['part_price'] = $tData['tool'][0]['part_price'];
            $uData['part_weight'] = $tData['tool'][0]['part_weight'];
            $uData['material_name'] = $tData['tool'][0]['material_name'];
            $uData['material_price'] = $tData['tool'][0]['material_price'];
            $uData['status'] = $tData['tool'][0]['status'];
            $uData['last_updated_by'] = $this->session->get('user_name');

            $output = $this->datas->deactivateTool($this->request->getVar('Part_Id'),$this->request->getVar('Status_Tool'),$uData);
            echo json_encode($output);
        }
    }

    // get tool name in dropdown
     public function getToolName(){
        if($this->request->isAJAX()){
            // $user = $this->request->getVar('UserNameRef');
            // $role = $this->request->getVar('UserRoleRef');
            // $output = $this->datas->getToolName($user,$role);
            $output = $this->datas->getToolName();
            echo json_encode($output);
        }
    }

    // get tool in parts settings edit or info
     public function getTool(){
        if($this->request->isAJAX()){
            $output = $this->datas->getTool($this->request->getVar('TId'));
            echo json_encode($output);
        }
    }
    // get tool data for part settings in info model or edit model
     public function getToolData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getToolData($this->request->getVar('Pid'));
            echo json_encode($output);
        }
    }

    // get part count for active inactive
     public function aIaTool(){
        if($this->request->isAJAX()){
            $output = $this->datas->aIaTool();
            echo json_encode($output);
        }
    }

    // edit part settings function
        public function add_tool_edit_part(){
        if ($this->request->isAJAX()) {
           $update['part_id'] = $this->request->getVar('Part_Id');
           $update['part_name']= $this->request->getVar('EditPartName');  
           $update['NICT']= $this->request->getVar('EditNICT');
           $update['part_produced_cycle']= $this->request->getVar('EditNoOfPartsPerCycle');
           $update['part_price']= $this->request->getVar('EditPartPrice');
           $update['part_weight']= $this->request->getVar('EditPartWeight');
           $update['material_name']= $this->request->getVar('EditMaterialName');
           $update['material_price']= $this->request->getVar('EditMaterialPrice');
           $update['status']= 1;
           $update['last_updated_by'] = $this->session->get('user_name');
            $tool_id = $this->toolRecordCount();
            $tool_id_new = "TL".($tool_id);
            $tool['tool_id']= $tool_id_new;
            $update['tool_id'] = $tool_id_new;
            $tool['tool_name'] = $this->request->getVar('inputNewToolNameEdit');
            $tool['tool_status'] = 1;
            //echo json_encode();
            $res_tool = $this->datas->addToolData($tool);
            if ($res_tool == true) {
                $res = $this->datas->editToolData($update);
                if ($res == true) {
                    echo json_encode($res);
                }else{
                    echo json_encode("Part Edit error");
                }
            }else{
                echo json_encode("Tool Not Inserted");
            }
        }
    }


    // edit part function
    public function editToolData(){
        if($this->request->isAjax()){
            
            $tempId=$this->request->getVar('Part_Id');
            $req = $this->datas->getToolData($tempId);
            $update['part_id'] = $tempId;
            $update['part_name']= $this->request->getVar('EditPartName');     
            $update['NICT']= $this->request->getVar('EditNICT');
            $update['part_produced_cycle']= $this->request->getVar('EditNoOfPartsPerCycle');
            $update['part_price']= $this->request->getVar('EditPartPrice');
            $update['part_weight']= $this->request->getVar('EditPartWeight');
            $update['material_name']= $this->request->getVar('EditMaterialName');
            $update['material_price']= $this->request->getVar('EditMaterialPrice');
            $update['last_updated_by'] = $this->session->get('user_name');
            $update['status']= 1;
            if ($this->request->getVar('inputToolNameEdit') != "") {
                $update['tool_id'] =$this->request->getVar('inputToolNameEdit');
            }
            else{
                $update['tool_id'] = $req['tool'][0]['tool_id'];
            }
            $output = $this->datas->editToolData($update);
            echo json_encode($output);
        }
    }

    
// general settings =================================================================================

    // financial matrics for general settings update function
    public function getGoalsFinancialData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getGoalsFinancialData();
            echo json_encode($output);
        }
    }


    // update shift function general settings
     public function updateShift(){
        // if($this->request->isAJAX()){

            $shift_start = $this->request->getVar('startingTime');
            $hour = $this->request->getVar('hours');
            // $shift_start = "11:30";
            // $hour = "08:00";

            $arr = explode(':',$shift_start);
            $arr1 = explode(':', $hour);

            // print_r($arr1);
            $tmphour = ($arr1[0]*60)+$arr1[1];
            $no_shift = (24*60)/$tmphour;

            $sh = $arr[0];
            $sm = $arr[1];
            $shift = [];

            for ($i=0; $i < $no_shift; $i++) { 
                //Add zero for prefix
                //hour
                $th2 ="";
                if (strlen((string)$sh) ==1) {
                    $th2 = "0".$sh;
                }
                else{
                    $th2 = $sh;
                }
                //minutes
                $th3 ="";
                if (strlen((string)$sm) ==1) {
                    $th3 = "0".$sm;
                }
                else{
                    $th3 = $sm;
                }

                $tmp = $th2.":".$th3.":"."00";
                $eh = $arr1[0];
                $em = $arr1[1];
                $exact_time =  (($sh*60)+$sm)+(($eh*60)+$em);
                array_push($shift, $tmp);    
                $eh = $eh+$sh;  
                if (($exact_time) >= (24*60)) {

                    if ($i == (int)($no_shift)) {
                        $tmp = $arr[0].":".$arr[1].":"."00";
                        array_push($shift,$tmp);
                        break;
                    }
                    else{
                        $eh= $eh-24;
                        $em = $em+$sm;
                        if ($em >= 60) {
                            while ($em>=60) {
                                $eh = $eh+1;
                                $em = $em-60;
                            } 
                        }
                        //Add zero for prefix
                        //hour
                        $th ="";
                        if (strlen((string)$eh) ==1) {
                            $th = "0".$eh;
                        }
                        else{
                            $th = $eh;
                        }
                        //minutes
                        $th4 ="";
                        if (strlen((string)$em) ==1) {
                            $th4 = "0".$em;
                        }
                        else{
                            $th4 = $em;
                        }

                        $tmp = $th.":".$th4.":"."00";
                        array_push($shift,$tmp);
                        $sh = $eh;
                        $sm = $em;
                    }

                }
                else{
                    if ($i == (int)($no_shift)) {
                        $tmp = $arr[0].":".$arr[1].":"."00";
                        array_push($shift,$tmp);
                        break;
                    }
                    else{
                        $em = $em+$sm;
                        if ($em >= 60) {
                            while ($em>=60) {
                                $eh = $eh+1;
                                $em = $em-60;
                            }
                        }
                        //Add zero for prefix
                        //hours
                        $th1 ="";
                        if (strlen((string)$eh) ==1) {
                            $th1 = "0".$eh;
                        }else{
                            $th1 = $eh;
                        }
                        //minutes
                        $th5 ="";
                        if (strlen((string)$em) ==1) {
                            $th5 = "0".$em;
                        }
                        else{
                            $th5 = $em;
                        }
                        $tmp = $th1.":".$th5.":"."00";
                        array_push($shift,$tmp);
                        $sh = $eh;
                        $sm = $em;
                    }
                } 
            }

        // echo "<pre>";
        // print_r($shift);
        // echo "<br>";
        // echo sizeof($shift);
        // echo "<br>";
        // $s =["A","B","C","D","E","F","G","H"];
        // $l=sizeof($shift);
        // $j=0;
        // for ($i=0; $i<($l-1) ; $i=$i+2) {
        //     $tm = array("Shifts"=>$s[$j],"start_time"=>$shift[$i],"end_time"=>$shift[$i+1]);
        //     $j=$j+1;
        // }


            // $output = $this->datas->updateShift();

            $last_updated_by = $this->session->get('user_name');
            $output = $this->datas->updateShift($shift_start,$hour,$shift,$last_updated_by);
            // return $shift_start;
            echo json_encode($output);
        // }
    }


    // update shift data display function
     public function getShiftData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getShift();
            // echo "<pre>";
            // print_r($output);
            echo json_encode($output);
        }
    }

    // edit finanical metrics data
     public function editGFMData(){
        if($this->request->isAJAX()){
            //$update['R_NO']= $req[0]['R_NO'];
            $update['overall_teep']= $this->request->getVar('EOTEEP');
            $update['overall_ooe']= $this->request->getVar('EOOOE');
            $update['overall_oee']= $this->request->getVar('EOOEE');
            $update['availability']= $this->request->getVar('EAvailability');
            $update['performance']= $this->request->getVar('EPerformance');
            $update['quality']= $this->request->getVar('EQuality');
            $update['oee_target']= $this->request->getVar('EOEE');
            $update['last_updated_by']= $this->session->get('user_name');
            $output = $this->datas->editGFMData($update);
            echo json_encode($output);
        }
    }

    // edit downtime threshold
     public function editDTData(){
        if($this->request->isAJAX()){
            //$update['R_NO']= $req[0]['R_NO'];
            $update['downtime_threshold']= $this->request->getVar('DT');
            $update['last_updated_by']= $this->session->get('user_name');
            $output = $this->datas->editDTData($update);
            echo json_encode($output);
        }
    }

    // retrive downtime threshold 
    public function getDowntimeTData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getDowntimeTData();
            echo json_encode($output);
        }
    }

// retrive downtime reasons function
     public function getDowntimeRData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getDowntimeRData();
            echo json_encode($output);
        }
    }

    // get quality reasons retrive function
     public function getQualityData(){
        if($this->request->isAJAX()){
            $output = $this->datas->getQualityData();
            echo json_encode($output);
        }
    }

    // delete downtime reaosns
     public function deleteDownReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->deleteDownReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }

    // delete quality reasons
    public function deleteQualityReason(){
        if($this->request->isAJAX()){
            $output = $this->request->getVar('Record_No');
            $output = $this->datas->deleteQualityReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }

    // edit downtime reasons for particular record view
     public function getDownReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->getDownReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }
    // get quality reasons for update
     public function getQualiyReason(){
        if($this->request->isAJAX()){
            $output = $this->datas->getQualiyReason($this->request->getVar('Record_No'));
            echo json_encode($output);
        }
    }

    // update current shift performance 
    public function current_shift_performance(){
        //$session = \Config\Services::session($config);
        if ($this->request->isAJAX()) {
            $update['green'] = $this->request->getVar("green");
            $update['yellow'] = $this->request->getVar("yellow");
            $update['oee'] = $this->request->getVar("target");
            $update['last_updated_by'] = $this->session->get('user_name');
            // $update['username'] = $this->session->get('user_name');
            $res = $this->datas->current_shift_performance_model($update);
            echo json_encode($res);
        }
        else{
            echo "something went wrong!!";
        }
    }
    // current shift performance for retrive

    public function current_shift_retrive(){
            //echo json_encode('demo');
        if ($this->request->isAJAX()) {
            //echo json_encode("ok");
            // $username =$this->session->get('user_name');
            //echo json_encode($username);
            $res  = $this->datas->current_shift_retrive_data();
           //echo $res;
            echo json_encode($res);
        }
    }

    // get downtime reasons
     public function downtime_reason_retrive(){      
        if ($this->request->isAJAX()) {
            $output =  $this->datas->downtime_reason_retrive();
            echo json_encode($output);
        
        } 
    }

    // id generation for downtime reasons
     public function DownImgRecordCount(){
        $rec = $this->datas->getDowntimeImgId();
        if (!empty($rec)) {
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }       
        return $newId;
    }

    // id generation for quality reasons
    public function QualityImgRecordCount(){
        $rec = $this->datas->getQualityImgId();
        if (!empty($rec)) {
            $newId = sizeof($rec)+1+1000;
        }
        else{
            $newId = 1000+1;
        }       
        return $newId;
    }

    // add downtime reasons
     public function UploadDowntime($select_opt=null,$select_sub_opt=null){
        helper(['filesystem']);
        $file = $this->request->getFiles();
        $cat = $this->request->getVar('DTRCategory');
            $imgname = array(); 
            $orgname = array();
                $i=0;
                foreach ($file['DTReasonimg'] as $img) {
                    if ($img->isValid()) {
                            $orgname[$i] = $img->getName();
                            $map = directory_map('./public/uploads/Downtime_Reason/Planned/');
                            $map1 = directory_map('./public/uploads/Downtime_Reason/Unplanned/');
                            $imgCount= count($map)+count($map1)+1;
                            $fileName = 'Reason_'.$imgCount;
                            $imgname[$i] = $fileName;
                            //echo $fileName;
                                $tmpIdCount = $this->DownImgRecordCount();
                                $update['image_id'] = "DI".($tmpIdCount);
                                $update['original_file_name']= $img->getName();
                                $update['original_file_extension']= $img->getExtension();
                                $update['original_file_size_kb']= $img->getSizeByUnit('kb');
                                $update['uploaded_file_name'] = $fileName;
                                $update['uploaded_file_extension'] = $img->getExtension();
                                $reason['status'] = 1;

                                $reason['downtime_reason']= $this->request->getVar('DTName');
                                $reason['downtime_category']= $this->request->getVar('DTRCategory');
                                $reason['last_updated_by'] = $this->session->get('user_name');
                                if ($cat == 'Planned') {
                                    $update['uploaded_file_location'] = base_url()."/public/uploads/Downtime_Reason/Planned/";
                                    if ($img->move( './public/uploads/Downtime_Reason/Planned/',''.$fileName.''.'.png')) {
                                        if ($output = $this->datas->uploadReasons($update,$reason)) {
                                           //Redirect to Dahsboard
                                        }
                                    } 
                                }else{
                                    $update['uploaded_file_location'] = base_url()."/public/uploads/Downtime_Reason/Unplanned/";
                                    if ($img->move('./public/uploads/Downtime_Reason/Unplanned/',''.$fileName.''.'.png')) {
                                        if ($output = $this->datas->uploadReasons($update,$reason)) {
                                            //Redirect to Dahsboard
                                        }
                                    } 
                                }
                                ++$i;
                    }
                        //  echo "<p>".$img->getName()."is moved successfully</p>";  
                    else{
                        echo "<p>".$img->getErrorString()."</p>";
                    }
                   
                }
                return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                       
              
    }


    // update downtime reasons
     public function UpdateDowntime($select_opt=null,$select_sub_opt=null){
        helper(['filesystem']);
        $file = $this->request->getFile('UDTReasonImg');
        $cat = $this->request->getVar('UDTRCategory');
        $change['r_no'] = $this->request->getVar('UDTRRecord');
        $change['Changes'] = 0;
        if ($file->getSize() > 0) {
            // if($file->getSize() > 0) {
                $change['Changes'] = 1;
                // $update['downtime_reason']= $this->request->getVar('UDTName');
                // $update['downtime_category']= $cat;
                $update['original_file_name']= $file->getName();
                $update['original_file_extension']= $file->getExtension();
                $update['original_file_size_kb']= $file->getSizeByUnit('kb');
                if ($cat == "Planned") {
                    $map = directory_map('./public/uploads/Downtime_Reason/Planned/');
                    $map1 = directory_map('./public/uploads/Downtime_Reason/Unplanned/');
                    $imgCount= count($map)+count($map1)+1;
                    $fileName = 'Reason_'.$imgCount;
                    $update['uploaded_file_name'] = $fileName;
                    $update['uploaded_file_extension'] = $file->getExtension();
                    $update['uploaded_file_location'] = base_url()."/public/uploads/Downtime_Reason/Planned/";
                    $update['last_updated_by'] = $this->session->get('user_name');
                    // print_r($update);
                    if ($file->move('./public/uploads/Downtime_Reason/Planned/',''.$fileName.''.'.png')) {
                        if($this->datas->updateReasons($update,$change)){
                            return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                        }
                        return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                    }
                }
                else{
                    $map = directory_map('./public/uploads/Downtime_Reason/Planned/');
                    $map1 = directory_map('./public/uploads/Downtime_Reason/Unplanned/');
                    $imgCount= count($map)+count($map1)+1;
                    $fileName = 'Reason_'.$imgCount;
                   // echo $fileName;
                    
                    $update['uploaded_file_name'] = $fileName;
                    $update['uploaded_file_extension'] = $file->getExtension();
                    $update['uploaded_file_location'] = base_url()."/public/uploads/Downtime_Reason/Unplanned/";
                    $update['last_updated_by'] = $this->session->get('user_name');
                    // print_r($update);
                    if ($file->move('./public/uploads/Downtime_Reason/Unplanned/',''.$fileName.''.'.png')) {
                        if($this->datas->updateReasons($update,$change)){
                    //         // echo"<pre>";
                    //         // print_r("<script>alert(".$update.")</script>");
                            return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                        }
                        return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                    }
                }
                // echo "<pre>";
                // print_r($update);
                // }
            // else{
            //     echo "No Images Selected";
            // }
        }
        else{
            $update['downtime_reason']= $this->request->getVar('UDTName');
            $update['downtime_category']= $cat;
            $update['last_updated_by'] = $this->session->get('user_name');
            // print_r($change);
            if($this->datas->updateReasons($update,$change)){
                return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
            }
        }
    }


    // update quality reasons
     public function UploadQuality($select_opt=null,$select_sub_opt=null){
        helper(['filesystem']);
        $file = $this->request->getFile('QReasonImg');
        if ($file->getSize() > 0) {
            $reasons['quality_reason']= $this->request->getVar('QReasonName');
            $tmpIdCount = $this->QualityImgRecordCount();
            $update['image_id'] = "QI".($tmpIdCount);
            $reasons['image_id'] = $update['image_id'];
            $update['original_file_name']= $file->getName();
            $update['original_file_extension']= $file->getExtension();
            $update['original_file_size_kb']= $file->getSizeByUnit('kb');
                $map = directory_map('./public/uploads/Quality_Reason/');
                $update['Uploaded_File_Location'] = base_url()."/public/uploads/Quality_Reason/";
                $imgCount= count($map);
                $imgCount = $imgCount +1;
                $fileName = 'Reason_'.$imgCount;
                $update['uploaded_file_name'] = $fileName;
                $update['uploaded_file_extension'] = $file->getExtension();
                 $extension = $file->getExtension();
                //$update['status'] = 1;
                $reasons['last_updated_by'] = $this->session->get("user_name");
                // $update['Last_Modified_By'] = 'Manikandan';

                if ($file->move('./public/uploads/Quality_Reason/',''.$fileName.''.'.'.$extension)) {
                    if($output = $this->datas->uploadReasonsQuality($update,$reasons)){
                        // echo"<pre>";
                        // print_r($update);
                        return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                    }
                }  
            
        }
        else{
            echo "size error";
        }
    }

    // update quality reasons
     public function UpdateQuality($select_opt=null,$select_sub_opt=null){
        helper(['filesystem']);
        $file = $this->request->getFile('UQReasonImg');
        $change['r_no'] =$this->request->getVar('UQRRecord');
        $update['last_updated_by'] = $this->session->get("user_name");
        $change['Changes'] = 0;
        if ($file->getSize() > 0) {
            // if ($file->getSize() > 0) {
                $change['Changes'] = 1;
                $update['quality_reason']= $this->request->getVar('UQReasonName');
                $update['original_file_name']= $file->getName();
                $update['original_file_extension']= $file->getExtension();
                $update['original_file_size_kb']= $file->getSizeByUnit('kb');
                    $map = directory_map('./public/uploads/Quality_Reason/');
                    $update['uploaded_file_location'] = base_url()."/public/uploads/Quality_Reason/";
                    $imgCount= count($map);
                    $imgCount = $imgCount+1;
                    $fileName = 'Reason_'.$imgCount;
                    $extension = $file->getExtension();
                    $update['uploaded_file_name'] = $fileName;
                    $update['uploaded_file_extension'] = $file->getExtension();
                    //$update['uploaded_file_location'] = base_url()."/public/uploads/Quality_Reason/";
                    // $update['Last_Modified_By'] = 'Manikandan';
                    if ($file->move('./public/uploads/Quality_Reason/',''.$fileName.''.'.'.$extension)) {
                        if($output = $this->datas->UpdateQuality($update,$change)){
                            // echo"<pre>";
                             //print_r("<script>alert(".$update.")</script>");
                            return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                        }
                    }  
            // }
            // else{
            //     return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');
                
            // }
        }
        else{
            $update['quality_reason']= $this->request->getVar('UQReasonName');
            if($output = $this->datas->UpdateQuality($update,$change)){
               // echo "ok its reasons";
                return redirect()->to('Home/dashboard/'.$select_opt.'/'.$select_sub_opt.'');

            }
        }
    }

}











 ?>