<?php 



namespace App\Models;
use CodeIgniter\Model;

class PDM_Model extends Model{

	//protected $db_name;
    protected $site_connection;
    public function __construct($db_name =null){

        // $db_name = $this->db_name;
       
        // echo($db_name);
        $this->site_creation = [
                    'DSN'      => '',
                    'hostname' => 'localhost',
                    'username' => 'root',
                    'password' => '',
                    'database' => 'S1001',
                    // 'database' => 'dub',
                    'DBDriver' => 'MySQLi',
                    'DBPrefix' => '',
                    'pConnect' => false,
                    'DBDebug'  => (ENVIRONMENT !== 'production'),
                    'charset'  => 'utf8',
                    'DBCollat' => 'utf8_general_ci',
                    'swapPre'  => '',
                    'encrypt'  => false,
                    'compress' => false,
                    'strictOn' => false,
                    'failover' => [],
                    'port'     => 3306,
                ];
    }

    // quality rejection for parts dropdown
    public function getRejectionPart(){
        $db1 = \Config\Database::connect($this->site_creation);
        $builder = $db1->table('settings_part_current');
        $builder->select('part_id');
        $builder->where('status !=',0);
        $query = $builder->select('part_name')->distinct()->get()->getResultArray();
        return $query;
    } 


    // dropdown shift for quality correction
    public function getShift(){

        $db = \Config\Database::connect($this->site_creation);
       // return $sdate;
        $build = $db->table('settings_shift_management');
        $build->select('*');
        // $build->like('last_updated_by',$sdate,'after');
        $build->orderby('last_updated_on','desc');
        $build->limit(1);
        $res = $build->get()->getResultArray();
        $output['duration'] = $res;
        if ($res !="") {
            $shift_id = $res[0]['shift_log_id'];

            // $builder = $db->table($shift_id);
             $temp =explode("f", $shift_id);

            $sql = "SELECT * FROM `settings_shift_table` WHERE `Shifts` REGEXP '$temp[1]$'";
            $builder = $db->query($sql);

            $output['shift'] = $builder->getResultArray();

            /*
            $builder = $db->table("sf01");
            $builder->select('*');
            $output['shift'] = $builder->get()->getResultArray();
            */
            return $output;
        }else{
            return false;
        }

        // $db = \Config\Database::connect();
        // $builder = $db->table('shift_management');



        // $builder->select('Shift');
        // $array = array('Shift_Date' => $update['sdate'], 'Part_Name' => $update['part']);
        // //if ($update['sdates'] != "all") {
        //     $builder->where($array);
        // //}
        // //$array = array('Shift_Date' => $update['sdates']);
        // $query=$builder->distinct()->get()->getResultArray();
        // return $query;
    }


    // quality correction for display records
     public function getCorrectionData($update)
     {
         $db = \Config\Database::connect($this->site_creation);
 
         $shift = $update['shift'];
         $shift_date = $update['shift_date'];
         $partname = $update['partname'];
 
         // $query = $db->table('pdm_production_info');
         // $query->select('*');
         // $query->where('shift_id',$shift);
         // $query->where('shift_date',$shift_date);
         // $query->where('part_id',$partname);
         // $res = $query->get()->getResultArray();
         // return $res;

            $query = $db->table('pdm_production_info as rs');
          $query->select('rs.* , parts.part_name');
           $query->where('rs.shift_id',$shift);
          $query->where('rs.shift_date',$shift_date);
          $query->where('rs.part_id',$partname);
          $query->join('settings_part_current as parts','rs.part_id = parts.part_id');
          $res = $query->get()->getResultArray();
          return $res;
     }


     // edit pencil button click then after display particular records
      public function getCorrectPartData($data)
     {
         $db = \Config\Database::connect($this->site_creation);
         $query = $db->table('pdm_production_info');
         $query->select('*');
         $query->where('shift_id',$data['shift']);
         $query->where('shift_date',$data['date']);
         $query->where('part_id',$data['part_id']);
         $query->where('start_time',$data['from_time']);
         $res = $query->get()->getResultArray();
         $data['correction'] = $res;
         if ($res[0]['last_updated_by'] == null) {
            $data['last_updated_by'] = "empty";
         }else{
            $data['last_updated_by'] = $this->get_last_updated_username($res[0]['last_updated_by']);
            
         }
         return $data;
         
     }


	//its getting user id for particular user name
	 public function get_last_updated_username($user_id){
       $db = \Config\Database::connect("another_db");

       $build = $db->table('user');
       $build->select('first_name , last_name');
       $build->where('user_id',$user_id);

       $res = $build->get()->getResultArray();

       return $res;
    } 


    // update the quality correction records
     public function updateCorrectData($update){
        $db = \Config\Database::connect($this->site_creation);
        $SFM = $db->table('pdm_production_info');
        $SFM->set('correction_notes', $update['notes']);
        $SFM->set('corrections', $update['total_correction_value']);
        $SFM->set('rejection_max_counts', $update['max_count']);
        $SFM->set('last_updated_by',$update['last_updated_by']);
        $SFM->where('shift_id', $update['shift']);
        $SFM->where('shift_date', $update['shift_date']);
        $SFM->where('start_time', $update['start_time']);
        if ($SFM->update()) {
            return true;
        }else{
            return $update;
        }

        // if($SFM->update()){
        //     //print_r($updatepart);
        //     $SFM1 = $db->table('quality_rejects');
        //     $SFM1->set('Max_Rejects', $updatepart['Max_Rejects']);
        //     $SFM1->where('R_NO', $updatepart['R_NO']);
        //     if($SFM1->update()){
        //          return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }
        // else{
        //     return false;
        // }
    }


    // display quality rejection records 
    public function getRejectionData($update)
  {
      $db = \Config\Database::connect($this->site_creation);
      $shift = $update['shift'];
      $shiftdate = $update['shift_date'];
      $partname = $update['part_id'];
      $query = $db->table('pdm_production_info as rs');
      $query->select('rs.* , parts.part_name');
      $query->where('rs.shift_id',$shift);
      $query->where('rs.shift_date',$shiftdate);
      $query->where('rs.part_id',$partname);
      $query->join('settings_part_current as parts','rs.part_id = parts.part_id');
      $res = $query->get()->getResultArray();
      return $res;
  }

  // display the particular quality rejection records
  public function getCorrectData($data)
  {
      $db = \Config\Database::connect($this->site_creation);
      $query = $db->table('pdm_production_info');
      $query->select('*');
      $query->where('shift_date',$data['date']);
      $query->where('shift_id',$data['shift']);
      $query->where('part_id',$data['part_id']);
      $query->where('start_time',$data['from_time']);

      //$query->where('Part_ID',$data);
      $res = $query->get()->getResultArray();
      $data["rejection"] = $res;
      if ($res[0]['last_updated_by'] == null) {
          $data['last_updated_by'] = "empty";

      }else{
        $data['last_updated_by'] = $this->get_last_updated_username($res[0]['last_updated_by']);
      }
      return $data;
  }

  // quality rejection dropdown for quality reasons
   public function  reject_dropdown(){
        //echo "ok database";
        $db = \Config\Database::connect($this->site_creation);
        $builder = $db->table('settings_quality_reasons');
        $builder->select('quality_reason_name');
        //status should be added in the table
        $builder->where('Status !=',0);
        //$builder->where('Site_id',$site_id);
        $query   = $builder->get()->getResultArray();
        // $output = "";
        // foreach ($query->getResult() as $row) {
        //     $output .=  "<option value=".$row->Downtime_Reason.">". $row->Downtime_Reason."</option>";
           
        //     return $output;
        // }

        return $query;

    }

    // retrive calculation based up on the quality rejection
      public function getRejection_count($data){
        $db = \Config\Database::connect($this->site_creation);
        $build = $db->table('pdm_production_info');
        $build->select('rejections,production');
        $build->where('shift_id',$data['shift']);
        $build->where('shift_date',$data['shift_date']);
        $build->where('start_time',$data['start_time']);
        $build->where('part_id',$data['part_id']);

        $res = $build->get()->getResult();

        return $res;
    }

    // update quality rejection data
	public function updateRejectData($update,$where){
        $db = \Config\Database::connect($this->site_creation);
        $SFM = $db->table('pdm_production_info');
        $SFM->set('rejections_notes', $update['Notes']);
        $SFM->set('rejections', $update['Total_Rejects']);
        $SFM->set('reject_reason', $update['Rejection_Reason']);
        $SFM->set('correction_min_counts', $update['correction_min']);
        $SFM->set('last_updated_by',$update['last_updated_by']);
        $SFM->where('shift_id', $where['shift']);
        $SFM->where('shift_date', $where['shift_date']);
        $SFM->where('start_time', $where['start_time']);
        $SFM->where('part_id', $where['part_id']);

        if($SFM->update()){
           return true;
        }
        else{
            return false;
        }
    }







}







 ?>