<?php


namespace App\Controllers;
use App\Models\PDM_Model;

class PDM_controller extends BaseController{

	protected $data;
	function __construct(){

		$this->session = \Config\Services::session();

		$this->data = new PDM_Model();

	}

	// dropdown for part in quality correction
	public function getCorrectionPart(){
        if($this->request->isAJAX()){
            //$output = $this->datas->getCorrectionPart();
            $output = $this->data->getRejectionPart();
            echo json_encode($output);
        }
    }

    // dropdown for shift in quality correction
    public function getCorrectShift(){
        if($this->request->isAJAX()){
            // $update['part'] = $this->request->getVar('part');
            // $get_date = $this->request->getVar('sdate');
            // $update['sdate'] = date("Y-m-d", strtotime($get_date));
            $output = $this->data->getShift();
            //$output = $this->datas->getCorrectShift($update);
            echo json_encode($output);
        }
    }

    // display the quality correction
     public function getCorrectionData(){
        if($this->request->isAJAX()){
            $update['partname'] = $this->request->getVar('partname');
            $update['shift_date'] = $this->request->getVar('shift_date');
            $update['shift'] = $this->request->getVar('shift');
            $output = $this->data->getCorrectionData($update);
            echo json_encode($output);
        }
    }


    // pencil click then display particular records
     public function getCorrectData(){
        if($this->request->isAJAX()){
            $ref['part_id'] = $this->request->getVar('partid');
            $ref['from_time'] = $this->request->getVar('from_time');
            $ref['date'] = $this->request->getVar('shift_date');
            $ref['shift'] = $this->request->getVar('shift');

            // $ref['shift'] = "C";
            // $ref['shift_date'] = "2022-05-06";
            // $ref['part_id']= "PT1001";
            // $ref['from_time']= "18:19:03";


            $output = $this->data->getCorrectPartData($ref);
            //$output['part'] = $this->datas->getPartData($ref['part_id']);
          //  $output['rejection'] = $this->datas->getRejectData($ref);
            // echo "<pre>";
            // print_r($output['correction']);
            echo json_encode($output);
            //return $output;
       }
    }


    // update the quality correction records
     public function updateCorrectData(){
        if($this->request->isAJAX()){
            $update['shift'] = $this->request->getVar('shift');
            $update['shift_date'] = $this->request->getVar('shift_date');
            $update['start_time'] = $this->request->getVar('start_time');
            $update['last_updated_by'] = $this->session->get('user_name');
            $update['notes'] = $this->request->getVar('note');
            $update['max_count'] = $this->request->getVar('max_count');
            $update['total_correction_value'] = $this->request->getVar('total_correction_value');
            // $updatepart['Max_Rejects'] = $this->request->getVar('max_count');
            // $updatepart['R_NO'] = $this->request->getVar('prno');
             
             $output = $this->data->updateCorrectData($update);
             echo json_encode($output);
            //print_r($updatepart);
        }
    }


    // quality rejection

    // quality rejection dropdown for partname
     public function getRejectionPart(){
        if($this->request->isAJAX()){
            $output = $this->data->getRejectionPart();
            echo json_encode($output);
        }
    }

    // quality rejection dropdown for shift
    public function getRejectShift(){
        if($this->request->isAJAX()){
            // $update['part'] = $this->request->getVar('part');
            // $get_date = $this->request->getVar('sdate');
            // $update['sdate'] = date("Y-m-d", strtotime($get_date));
           //echo json_encode($newDate);
            $output = $this->data->getShift();
            echo json_encode($output);
        }
    }

    // display the  quality rejection records
     public function getRejectionData(){
        if($this->request->isAJAX()){
            $update['shift'] = $this->request->getVar('shift');
            $update['shift_date'] = $this->request->getVar('shiftdate');
            $update['part_id'] = $this->request->getVar('partname');
            // $update['shift'] = "B";
            // $update['shift_date'] = "2022-05-17";
            // $update['partname'] = "PT1001";
            // $update['part_id']="PT1001";
            $output = $this->data->getRejectionData($update);
            // echo "<pre>";
            // print_r($output);
            echo json_encode($output);
        }
    } 

    // pencil icon click then after display the particular records
     public function getRejectData(){
        if($this->request->isAJAX()){
            $ref['part_id'] = $this->request->getVar('partid');
            $ref['from_time'] = $this->request->getVar('from_time');
            $ref['date'] = $this->request->getVar('shift_date');
            $ref['shift'] = $this->request->getVar('shift');

            //$output['reject'] = $this->datas->getRejectData($ref);
            // $output['part'] = $this->datas->getPartData($this->request->getVar('partid'));
            $output = $this->data->getCorrectData($ref);
            
            // $ref['shift'] = "C";
            // $ref['date'] = "2022-05-06";
            // $ref['part_id']= "PT1001";
            // $output['correction'] = $this->datas->getCorrectData($ref);
            // echo "<pre>";
            // print_r($output['correction']);
            echo json_encode($output);
        }
    }

    // quality rejection  dropdown for  reasons in quality reasons table
     public function Reject_retrive(){
        
        if ($this->request->isAJAX()) {
          // $site_id = $this->data['user_details'][0]['Site_ID'];
           //$site = $this->datas->getUserInfo($this->session->get('user_name'));
            
            //$site_id =  $site[0]['Site_ID'];
            //$output =  $this->datas->reject_dropdown($site_id);
            $output =  $this->data->reject_dropdown();
            echo json_encode($output);
        
        } 
    }

    // quality rejection for retrive the rejections previous submissions data
    public function reject_form_func(){
        
    	if ($this->request->isAJAX()) {
        // print_r($_POST);

	        $reject_reason = $this->request->getVar("reason");
	        $reject_count = $this->request->getVar("rcount");
	        $note = $this->request->getVar("note");

	        $shift = $this->request->getVar('shift');
	        $shift_date = $this->request->getVar('shift_date');
	        $start_time = $this->request->getVar('start_time');
	        $part_id = $this->request->getVar('partid');
	        $i = 0;
	        $test_arr = array();
	        foreach ($reject_reason as $reason) {
	                $test_arr[$i] = $reject_count[$i].$reason;
	                ++$i;
	        }
            $reject_r = implode('&&', $test_arr);
            $total_reject = array_sum($reject_count);
        // echo $total_reject; 
        //echo $reject_r;
            $update['Notes'] = $note;
            $update['Rejection_Reason'] = $reject_r;
            $update['Total_Rejects'] = $total_reject; 
            $update['last_updated_by'] = $this->session->get('user_name');

            $where['shift'] = $shift;
            $where['shift_date'] = $shift_date;
            $where['start_time'] = $start_time;
            $where['part_id'] = $part_id;

          
            $db_rejection = $this->data->getRejection_count($where);
           foreach($db_rejection as $data){
               $rejection = $data->rejections;
               $production_count = $data->production;
           }
        //    $rejection_count = (int)$rejection + (int)$total_reject;
           $correction_min = (int)$production_count - (int)$total_reject;
           // $update['rejection_count'] = $rejection_count;
           // $update['old_rejection'] = $rejection;
           // $update['new_rejection'] = $total_reject;
           $update['correction_min'] = $correction_min;
           //$update['reject_reason'] = $reject_r;
           //$update['production_count'] = $production_count;
          // $update['reject_count'] = $reject_count;
          // $update['where'] = $where;
           // echo "reasons:\t".$reasons."\nProduction count:\t".$production_count;
            $output = $this->data->updateRejectData($update,$where);
            echo json_encode($output);   
    	}
    
	}

	
    // 

}





 ?>