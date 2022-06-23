<?php 

namespace App\Models;
use CodeIgniter\Model;

class UserLogin extends Model{

    public function verifyUser($user)
    {
        $db = \Config\Database::connect('another_db');
        $query = $db->table('user');
        $query->select('*');
        $query->where('username', $user['userName']);
        // $query->where('Password', $user['password']);
        // $query->where('IsPasswordChecked', 1);
        $res = $query->get()->getResultArray();
        $user_id = $res[0]['user_id'];
        $site_id = $res[0]['site_id'];

        $build = $db->table('user_credintials');
        $build->select('user_id');
        $build->where('password',$user['password']);
        $build->where('user_id',$user_id);

        $output = $build->get()->getResult();

        foreach ($output as $row) {
            $userid = $row->user_id;
        }

        $build1 = $db->table('sites');
        $build1->select('*');
        $build1->where('site_id',$site_id); 
        $res1 = $build1->get()->getResultArray();

        $build2 = $db->table('location');
        $build2->select('*');
        $build2->where('location_id',$res1[0]['location_id']);

        $res3 = $build2->get()->getResultArray();

       
        $res_id_valid["users"] = $res;
        $res_id_valid["user_id"] = $userid;
        $res_id_valid['site_name'] = $res1[0]['site_name'];
        $res_id_valid['location'] = $res3[0]['location'];
        return $res_id_valid;
       
    }
    public function accessControl($user){
        $db = \Config\Database::connect('another_db');
        $query = $db->table('user_access_control');
        $query->select('*');
        $query->where('user_id', $user);
        $res = $query->get()->getResultArray();
        return $res;
    }
}



?>