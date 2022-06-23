<?php

namespace App\Models;
use CodeIgniter\Model;

class Financial_Model extends Model{

	public function getDataRaw($FromDate,$FromTime,$ToDate,$ToTime)
	{
	    $db = \Config\Database::connect();
	    $query = $db->table('temp_mapping_table as t');
	    $query->select('t.machine_id,t.downtime_reason_id,t.tool_id,t.part_id,t.shift_date,t.start_time,t.end_time,t.split_duration,r.*');
	    $query->where('t.shift_date >=',$FromDate);
	    $query->where('t.shift_date <=',$ToDate);
	    $query->join('oui_downtime_reasons_default as r', 'r.downtime_reason_id = t.downtime_reason_id');
	    $res= $query->get()->getResultArray();
	    return $res;
	}

	public function getMachineRec($FromDate,$ToDate){
        $db = \Config\Database::connect();
        $query = $db->table('temp_mapping_table');
        $query->select('machine_id');
        $query->where('shift_date >=',$FromDate);
        $query->where('shift_date <=',$ToDate); 
        $res= $query->distinct()->get()->getResultArray();
        return $res;
    }
    public function getMachineRecActive()
    {
        $db = \Config\Database::connect();
        $query = $db->table('settings_machine_current');
        $query->select('machine_id'); 
        $res= $query->distinct()->get()->getResultArray();
        return $res;
    }

    public function getPartRec($FromDate,$ToDate){
         $db = \Config\Database::connect();
        $query = $db->table('temp_mapping_table');
        $query->select('part_id');
        $query->where('shift_date >=',$FromDate);
        $query->where('shift_date <=',$ToDate); 
        $res= $query->distinct('part_id')->get()->getResultArray();
        return $res;
    }

    public function getProductionRec($FromDate,$ToDate){
        $db = \Config\Database::connect();
        $query = $db->table('pdm_production_info');
        $query->select('*');
        $query->where('shift_date >=',$FromDate);
        $query->where('shift_date <=',$ToDate);
        $res= $query->get()->getResultArray();
        return $res;   
    }

    public function getShiftDate($FromDate,$ToDate)
    {
        $db = \Config\Database::connect();
        $query = $db->table('temp_mapping_table');
        $query->select('shift_date');
        $query->where('shift_date >=',$FromDate);
        $query->where('shift_date <=',$ToDate); 
        $res= $query->distinct()->get()->getResultArray();
        return $res;
    }

    public function settings_tools()
    {
        $db = \Config\Database::connect();
        // $query = $db->table('settings_part_current');
        // $query->select('*');
        // //$query->orderBy('Last_Updated_On', 'DESC');
        // $res = $query->get()->getResultArray();
        // return $res;


        $builder = $this->db->table("settings_part_current as s");
        $builder->select('s.*, t.tool_name');
        $builder->join('settings_tool_table as t', 't.tool_id = s.tool_id');
        $data = $builder->get()->getResult();
        return $data;
    }

    public function getMachineRecGraph()
    {
        $db = \Config\Database::connect();
        $query = $db->table('settings_machine_current');
        $query->select('machine_id,machine_name'); 
        // $query->where('status',1);
        $res= $query->distinct()->get()->getResultArray();
        return $res;
    }

    public function getGoalsFinancialData(){
        $db = \Config\Database::connect();
        $SFM = $db->table('settings_financial_metrics_goals');
        $SFM->orderBy('last_modified_on', 'DESC');
        $SFM->limit(1);
        $SFM->select('*');
        $query = $SFM->get()->getResultArray();
        return $query;
    }

    public function getShotCount($start,$end,$shiftDate,$machine)
    {
        $db = \Config\Database::connect();
        $query = $db->table('machine_data_new');
        $query->select('*');
        $query->where('date',$shiftDate);
        $query->where('machine_id',$machine);
        $res['start']= $query->where('time',$start)->get()->getResultArray();
        $res['end']= $query->where('time',$end)->get()->getResultArray();
        return $res;
    }

    public function downtimeReason(){
        $db = \Config\Database::connect();
        $query = $db->table('oui_downtime_reasons_default');
        $query->select('downtime_reason_id,downtime_reason');
        $res= $query->get()->getResultArray();
        return $res;
    }
    public function ReasonwiseData($fromTime,$toTime){
        //Code reference for group by with reference............
        // $db = \Config\Database::connect();
        // $query = $db->table('temp_mapping_table as t');
        // $query->select('t.downtime_reason_id,t.machine_id,SUM(split_duration),r.downtime_reason');
        // $query->join('oui_downtime_reasons_default as r', 'r.downtime_reason_id = t.downtime_reason_id');
        // $query->groupby('t.downtime_reason_id,t.machine_id');
        // $res= $query->get()->getResultArray();
        // return $res;

        $db = \Config\Database::connect();
        $query = $db->table('temp_mapping_table');
        $query->select('downtime_reason_id,machine_id,SUM(split_duration)');
        $query->groupBy('downtime_reason_id,machine_id');
        $query->orderBy('machine_id');
        $query->where('shift_date >=',$fromTime);
        $query->where('shift_date <=',$toTime);
        $res= $query->get()->getResultArray();
        return $res;
    }

    public function qualityReason(){
        $db = \Config\Database::connect();
        $query = $db->table('oui_quality_reasons');
        $query->select('*');
        $res= $query->get()->getResultArray();
        return $res;
    }

    public function getPartDetails(){
        $db = \Config\Database::connect();
        $query = $db->table('settings_part_current');
        $query->select('part_id,part_price,part_weight,material_price');
        $res= $query->get()->getResultArray();
        return $res;
    }
    public function PartDetails(){
        $db = \Config\Database::connect();
        $query = $db->table('settings_part_current');
        $query->select('part_id,part_price,NICT,part_name');
        $res= $query->get()->getResultArray();
        return $res;
    }
    public function getMachineDetails(){
        $db = \Config\Database::connect();
        $query = $db->table('settings_machine_current');
        $query->select('machine_id,rate_per_hour,machine_offrate_per_hour');
        $res= $query->get()->getResultArray();
        return $res;
    }
}




?>