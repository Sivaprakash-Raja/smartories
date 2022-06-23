<?php 

namespace App\Controllers;
use App\Models\User_Model;

class User_controller extends BaseController
{

	protected $data;
	function __construct(){
		 $this->session = \Config\Services::session();

        $this->data = new User_Model();
	}
	
	public function checkUser(){
      	if($this->request->isAJAX()){ 
            $user = $this->request->getVar('user_name');
			//$user = "admin@gmail.com";
            $existUser = $this->data->checkUser($user);
            return json_encode($existUser);
       	}
    }

    // get user role 
    public function getUserRole()
    {   
        if($this->request->isAJAX()){
            $user = $this->request->getVar('userRole');
            if($user == "Smart User"){
                $role = array(
                    "Financial_Drill_Down" => "2",
                    "Financial_Opportunity_Insights" => "2", 
                    "OEE_Drill_Down" => "2",
                    "Operator_User_Interface" => "1", 
                    "Production_Data_Management" => "1",
                    "Settings_Machine" => "1", 
                    "Settings_Parts" => "1",
                    "Settings_General" => "1", 
                    "Settings_User_Management" => "3"
                );
                return json_encode($role);
            }
            else if($user == "Site Admin"){
                $role = array(
                    "Financial_Drill_Down" => "3",
                    "Financial_Opportunity_Insights" => "3", 
                    "OEE_Drill_Down" => "3",
                    "Operator_User_Interface" => "3", 
                    "Production_Data_Management" => "3",
                    "Settings_Machine" => "3", 
                    "Settings_Parts" => "3",
                    "Settings_General" => "3", 
                    "Settings_User_Management" => "3"
                );
                return json_encode($role);
            }
            else{
            // elseif ($user == "Site User") {
                $role = array(
                    "Financial_Drill_Down" => "2",
                    "Financial_Opportunity_Insights" => "2", 
                    "OEE_Drill_Down" => "1",
                    "Operator_User_Interface" => "2", 
                    "Production_Data_Management" => "1",
                    "Settings_Machine" => "2", 
                    "Settings_Parts" => "2",
                    "Settings_General" => "1", 
                    "Settings_User_Management" => "0"
                );
                return json_encode($role);
            }
            // else{
            //     $role = array(
            //         "Operator_User_Interface" => "3", 
            //     );
            //     return json_encode($role);
            // }
        }
    }

    // get site
     public function getSite(){
       	if($this->request->isAJAX()){
        	
            $output = $this->data->getSite($this->request->getVar('Sname'));
            echo json_encode($output);
        }
    }

    // drop down get site name
    public function getSiteName(){
        if($this->request->isAJAX()){
            $user = $this->request->getVar('UserNameRef');
           $role = $this->request->getVar('UserRoleRef');
    	// $user = "admin@gmail.com";
    	// $role = "SmartAdmin";
            $output = $this->data->getSiteName($user,$role);
            //echo ($output);
            echo json_encode($output);
       }
    }

    // get department details 
    public function getdept(){
    	if ($this->request->isAJAX()) {
    		$output = $this->data->getdept();

    		echo json_encode($output);
    	}
    }

    // user record count management user
    public function userRecordCountMngt(){   
        $user = $this->data->userRecordCountMngt();  
        $user = $user + 1;
        if (!empty($user)) {
            $newId = 1000 + $user;
        }
        // else{
        //    $newId = 1000;
        //     //echo "some query problem";
        // }
        
        return $newId;

    }

// get site count for id generation
    public function getsite_count(){

        $count = $this->data->getsite_count(); 
        $count = $count + 1;
        if (!empty($count)) {
              $site_id = 1000 + $count;
          }  


          return $site_id;
    }

    // get location count
    public function getlocation_count(){
        $count = $this->data->getlocation_count();

        $count = $count + 1;

        if (!empty($count)) {
            $location_id = 1000 + $count;
        }
        return $location_id;
    }

    // user record count operator user
    public function userRecordCountOpr(){     
            $user = $this->data->userRecordCountOpr();
            $user = $user + 1;
            if (!empty($user)) {
                 $newId = 1000 + $user;
                // $id = explode("O",$user[0]['user_id']);
                // $newId = $id[1]+1;
            }
            // else{
            //     $newId = 1000;
            // }
            
            return  $newId;
    }

    // user email function 
    public function sendMail($uName,$uId,$fName,$lName,$role){
        $to = ''.$uName.'';
        $sub = 'Activate and Set Password';
        $message = 'Hi <b><i>'.$fName.' '.$lName.'</i></b>,
                    <br>Your account has been created successfully as a <b><i>'.$role.'</i></b>. Please click the button below to activate Your account and Set the Password as you want.
                    <br>
                        <a href="'.base_url().'/Login/createPassword/'.$uName.'" user_name="'.$uName.'" user_id="'.$uId.'">Activate and Set Password</a>
                    <br><b>Thank You!</b>';
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setFrom('Smartories.in');
        $email->setSubject($sub);
        $email->setMessage($message);
        if($email->send()){
            return true;
        }
        else{
            return false;
        }

    }

// opertor get data
    public function checkOperator(){
        if($this->request->isAJAX()){  
            $username = $this->request->getVar('User_ID');
            $siteRef = "Operator";
            //echo $userId;
            $updatemsg = $this->data->checkOperator($siteRef,$username);
            //print_r($updatemsg);
            return json_encode($updatemsg);
        }
    }



    // add user submission
      public function createNewUser(){
        if($this->request->isAJAX()){    

            $roles = $this->request->getVar('Role');
            // echo $roles;
            // $site_id
          //  if ($roles != 'Operator') {      
                //echo "User";
            
            $site = $this->request->getVar('User_Site_Name');
            if (strcmp($site,'new_site')) {
                
                 $record = $this->userRecordCountMngt();
                //echo $record;
                $newId = $record;
                $user['user_id'] = "UM".$newId."";
                $user['username'] = $this->request->getVar('User_Email');
                $user['first_name'] = $this->request->getVar('User_First_Name');
                $user['last_name'] = $this->request->getVar('User_Last_Name');
                $user['phone'] = $this->request->getVar('User_Phone');
                $user['designation'] = $this->request->getVar('User_Designation');
                $user['department'] = $this->request->getVar('User_Department');
                $user['role'] = $this->request->getVar('Role');
                $user['site_id'] = $this->request->getVar('User_Site_Name');
                $user['status'] = "1";
                $user['last_updated_by'] = $this->request->getVar('User_Ref');
                
                $user_credintials['user_id'] = $user['user_id'];
                $user_credintials['created_by'] = $this->request->getVar('User_Ref');
                $user_credintials['created_on'] = date('Y-m-d');
                $user_credintials['last_updated_by'] = $this->request->getVar('User_Ref');
                    
                

                $user_access['user_id'] = $user['user_id'];
                $user_access['site_id'] = $user['site_id'];
                $user_access['oee_financial_drill_down'] = $this->request->getVar('FDrillDown');
                $user_access['opportunity_insights'] = $this->request->getVar('Opportunityinsights');
                $user_access['oee_drill_down'] = $this->request->getVar('OEEDrillDown');
                $user_access['operator_user_interface'] = $this->request->getVar('OUI');
                $user_access['production_data_management'] = $this->request->getVar('PDM');
                $user_access['settings_machine'] = $this->request->getVar('SMachine');
                $user_access['settings_part'] = $this->request->getVar('SPart');
                $user_access['settings_general'] = $this->request->getVar('SGeneral');
                $user_access['settings_user_management'] = $this->request->getVar('SUser');
                $user_access['last_updated_by'] = $this->request->getVar('User_Ref');


                $res = $this->data->newUserAct($user,$user_credintials,$user_access);
                if ($res) {
                    return true;
                }else{
                    return false;
                }
                
                //echo "existing site";
            }else{
                $site_name = $this->request->getVar('new_site_name');
                $site_location = $this->request->getVar('new_site_location'); 

                $new_site_id = $this->getsite_count();
                $location_id = $this->getlocation_count();

                $site_base['site_id'] = "s".$new_site_id;
                $site_base['site_name'] = $site_name;
                $site_base['last_updated_by'] = $this->session->get('user_name');

                $location_base['location_id'] = "LO".$location_id;
                $location_base['location'] = $site_location;
                 $site_base['location_id'] = $location_base['location_id'];
                $site_res = $this->data->insert_site($site_base,$location_base);
                // site and location insertion
                if ($site_res == true) {
                    //echo "insertion success site and location";
                     $record = $this->userRecordCountMngt();
                    $user['user_id'] = "UM".$record."";
                    $user['username'] = $this->request->getVar('User_Email');
                    $user['first_name'] = $this->request->getVar('User_First_Name');
                    $user['last_name'] = $this->request->getVar('User_Last_Name');
                    $user['phone'] = $this->request->getVar('User_Phone');
                    $user['designation'] = $this->request->getVar('User_Designation');
                    $user['department'] = $this->request->getVar('User_Department');
                    $user['role'] = $this->request->getVar('Role');
                    $user['site_id'] = $site_base['site_id'];
                    $user['status'] = "1";
                    $user['last_updated_by'] = $this->request->getVar('User_Ref');
                
                    $user_credintials['user_id'] = $user['user_id'];
                    $user_credintials['created_by'] = $this->request->getVar('User_Ref');
                    $user_credintials['created_on'] = date('Y-m-d');
                    $user_credintials['last_updated_by'] = $this->request->getVar('User_Ref');
                        
                

                    $user_access['user_id'] = $user['user_id'];
                    $user_access['site_id'] = $user['site_id'];
                    $user_access['oee_financial_drill_down'] = $this->request->getVar('FDrillDown');
                    $user_access['opportunity_insights'] = $this->request->getVar('Opportunityinsights');
                    $user_access['oee_drill_down'] = $this->request->getVar('OEEDrillDown');
                    $user_access['operator_user_interface'] = $this->request->getVar('OUI');
                    $user_access['production_data_management'] = $this->request->getVar('PDM');
                    $user_access['settings_machine'] = $this->request->getVar('SMachine');
                    $user_access['settings_part'] = $this->request->getVar('SPart');
                    $user_access['settings_general'] = $this->request->getVar('SGeneral');
                    $user_access['settings_user_management'] = $this->request->getVar('SUser');
                    $user_access['last_updated_by'] = $this->request->getVar('User_Ref');

                     $res = $this->data->newUserAct($user,$user_credintials,$user_access);
                    if ($res) {
                        return true;
                    }else{
                        return false;
                    }

                }
               

               

               
            }
             
        }
    }

    // operator details insertion function
    public function createNewUser_op(){
        if ($this->request->isAJAX()) {
              // echo json_encode("ojk");
            $site = $this->request->getVar('User_Site_ID');
            // if (strcmp($site,"new_site")) {
                $record = $this->userRecordCountOpr();
                $newId = $record;
                $op_data['user_id'] = "UO".$newId."";
                $op_data['username'] = $this->request->getVar('userName');
                $op_data['first_name'] = $this->request->getVar('User_First_Name');
                $op_data['last_name'] = $this->request->getVar('User_Last_Name');
                $op_data['phone'] = $this->request->getVar('User_Phone');
                $op_data['designation'] = $this->request->getVar('User_Designation');
                $op_data['department'] = $this->request->getVar('User_Department');
                $op_data['role'] = $this->request->getVar('Role');
                $op_data['site_id'] = $this->request->getVar('User_Site_ID');
               // $op_data['Password'] = $this->request->getVar('User_Phone');
                //$update['IsPasswordChecked'] = "0";
                $op_data['status'] = "1";
                $op_data['last_updated_by'] = $this->request->getVar('user_id');

                $op_credintials['user_id'] = $op_data['user_id'];
                $op_credintials['created_by'] = $this->request->getVar('user_id');
                $op_credintials['created_on'] = date('Y-m-d');
                $op_credintials['last_updated_by'] = $this->request->getVar('user_id');
                $op_credintials['password'] = $this->request->getVar('pass');

                $res = $this->data->new_operator_insert($op_data,$op_credintials);

                echo json_encode($res);

                // echo "<pre>";
                // print_r($op_data);

                // echo "<pre>";
                // print_r($op_credintials);

             /*   //echo json_encode('existing site'); operator site creation is temporary hide
            }else{
                    $site_name = $this->request->getVar('new_site_name');
                    $site_location = $this->request->getVar('new_site_location'); 


                    $new_site_id = $this->getsite_count();
                    $location_id = $this->getlocation_count();

                    $site_base['site_id'] = "s".$new_site_id;
                    $site_base['site_name'] = $site_name;
                    $site_base['last_updated_by'] = $this->session->get('user_name');

                    $location_base['location_id'] = "LO".$location_id;
                    $location_base['location'] = $site_location;
                     $site_base['location_id'] = $location_base['location_id'];
                    $site_res = $this->data->insert_site($site_base,$location_base);
                    if ($site_res) {
                        //echo "new site AND NEW SITE CREATED";
                         $record = $this->userRecordCountOpr();
                        $newId = $record;
                        $op_data['user_id'] = "UO".$newId."";
                        $op_data['username'] = $this->request->getVar('userName');
                        $op_data['first_name'] = $this->request->getVar('User_First_Name');
                        $op_data['last_name'] = $this->request->getVar('User_Last_Name');
                        $op_data['phone'] = $this->request->getVar('User_Phone');
                        $op_data['designation'] = $this->request->getVar('User_Designation');
                        $op_data['department'] = $this->request->getVar('User_Department');
                        $op_data['role'] = $this->request->getVar('Role');
                        $op_data['site_id'] = $site_base['site_id'];
                       // $op_data['Password'] = $this->request->getVar('User_Phone');
                        //$update['IsPasswordChecked'] = "0";
                        $op_data['status'] = "1";
                        $op_data['last_updated_by'] = $this->request->getVar('user_id');

                        $op_credintials['user_id'] = $op_data['user_id'];
                        $op_credintials['created_by'] = $this->request->getVar('user_id');
                        $op_credintials['created_on'] = date('Y-m-d');
                        $op_credintials['last_updated_by'] = $this->request->getVar('user_id');


                        $res = $this->data->new_operator_insert($op_data,$op_credintials);

                       echo json_encode($res);
                   }
                //echo json_encode($site_id."".$location_base);
            }*/
            

        }
    }


    // retrive all user function
    public function getSiteUser(){
       if($this->request->isAJAX()){      

        $user['user_id'] = $this->request->getVar("SiteUserRef");
        $user['role'] = $this->request->getVar("role");
        $user['site_id'] = $this->request->getVar('sitename');
        // if ($user['site_id'] == "smartories") {
              
        //   }  
        $res = $this->data->getSiteUser($user);

        echo json_encode($res);
       }
    }

    // retrive particular user details a for edit user and info user
    public function getUserData(){
        if($this->request->isAJAX()){
            $user['user_id'] = $this->request->getVar('UserId');
            $user['role'] = $this->request->getVar('Role');
            $user['site_id'] = $this->request->getVar('Site_id');
            
            $output = $this->data->getUserDataInfo($user);
            echo json_encode($output);
            //echo json_encode($this->request->getVar('Role'));
        }
    }

    // retrive particular user details access control
     public function EditUserRoleMaster(){
        if($this->request->isAJAX()){ 
            $user = $this->request->getVar('userName');

            $UserRole = $this->data->EditUserRoleMaster($user);
            return json_encode($UserRole);
        }
    }

    // activate user  and deactivate user
    public function deactivateUser(){
        if($this->request->isAJAX()){
            $update['Last_Updated_By'] = $this->request->getVar('Updated_By');
            $update['User_ID'] = $this->request->getVar('User_Id');
            $update['Status'] = $this->request->getVar('Status_User');
            $update['Role'] = $this->request->getVar('Role');
            $output = $this->data->deactivateUser($update);
            echo json_encode($output);
        }
    }

    // get user data for edit modal
    // public function getUserData(){
    //     if($this->request->isAJAX()){
    //             $user['user_id'] =  $this->request->getVar('UserId');
    //             $user['role'] = $this->request->getVar('Role');
    //             $user['site_id'] = $this->request->getVar('Site_id');
            

    //         $output = $this->data->getUserDataInfo($user);
    //         echo json_encode($output);
    //         //echo json_encode($this->request->getVar('Role'));
    //     }
    // }

    // 
	

    // edit user details update function
    public function updateUserData(){
            if($this->request->isAJAX()){    

                $roles = $this->request->getVar('Role');
                 $site_id = $this->request->getVar('User_Site_Name');
            if (strcmp($site_id, "new_site")) {
              
                    $user['user_id'] = $this->request->getVar('user_id');    
                    $user['User_Name'] = $this->request->getVar('User_Email');
                    $user['First_Name'] = $this->request->getVar('User_First_Name');
                    $user['Last_Name'] = $this->request->getVar('User_Last_Name');
                    $user['Contact_NO'] = $this->request->getVar('User_Phone');
                    $user['Designation'] = $this->request->getVar('User_Designation');
                    $user['Department'] = $this->request->getVar('User_Department');
                    $user['Role'] = $this->request->getVar('Role');
                    $user['Site_ID'] = $this->request->getVar('User_Site_Name');
                    $user['Last_Updated_By'] = $this->request->getVar('Updated_By');

                    $access['user_id'] = $user['user_id'];
                    $access['site_id'] = $user['Site_ID'];
                    $access['Financial_Drill_Down'] = $this->request->getVar('FDrillDown');
                    $access['Financial_Opportunity_Insights'] = $this->request->getVar('Opportunityinsights');
                    $access['OEE_Drill_Down'] = $this->request->getVar('OEEDrillDown');
                    $access['Operator_User_Interface'] = $this->request->getVar('OUI');
                    $access['Production_Data_Management'] = $this->request->getVar('PDM');
                    $access['Settings_Machine'] = $this->request->getVar('SMachine');
                    $access['Settings_Parts'] = $this->request->getVar('SPart');
                    $access['Settings_General'] = $this->request->getVar('SGeneral');
                    $access['Settings_User_Management'] = $this->request->getVar('SUser');
                    $access['Last_Updated_By'] = $this->request->getVar('Updated_By');


                    $res = $this->data->updateUserData($user,$access);

                    echo json_encode($res);

                    //echo json_encode('existing site');



             }else{

                //echo json_encode('new site');
                    $site_name = $this->request->getVar('new_site_id');
                    $site_location = $this->request->getVar('new_location'); 

                    $new_site_id = $this->getsite_count();
                    $location_id = $this->getlocation_count();

                    $site_base['site_id'] = "s".$new_site_id;
                    $site_base['site_name'] = $site_name;
                    $site_base['last_updated_by'] = $this->session->get('user_name');

                    $location_base['location_id'] = "LO".$location_id;
                    $location_base['location'] = $site_location;
                     $site_base['location_id'] = $location_base['location_id'];
                    $site_res = $this->data->insert_site($site_base,$location_base);
                    if ($site_res == true) {
                         $user['user_id'] = $this->request->getVar('user_id');    
                    $user['User_Name'] = $this->request->getVar('User_Email');
                    $user['First_Name'] = $this->request->getVar('User_First_Name');
                    $user['Last_Name'] = $this->request->getVar('User_Last_Name');
                    $user['Contact_NO'] = $this->request->getVar('User_Phone');
                    $user['Designation'] = $this->request->getVar('User_Designation');
                    $user['Department'] = $this->request->getVar('User_Department');
                    $user['Role'] = $this->request->getVar('Role');
                    $user['Site_ID'] = $site_base['site_id'];
                    $user['Last_Updated_By'] = $this->request->getVar('Updated_By');

                    $access['user_id'] = $user['user_id'];
                    $access['site_id'] = $user['Site_ID'];
                    $access['Financial_Drill_Down'] = $this->request->getVar('FDrillDown');
                    $access['Financial_Opportunity_Insights'] = $this->request->getVar('Opportunityinsights');
                    $access['OEE_Drill_Down'] = $this->request->getVar('OEEDrillDown');
                    $access['Operator_User_Interface'] = $this->request->getVar('OUI');
                    $access['Production_Data_Management'] = $this->request->getVar('PDM');
                    $access['Settings_Machine'] = $this->request->getVar('SMachine');
                    $access['Settings_Parts'] = $this->request->getVar('SPart');
                    $access['Settings_General'] = $this->request->getVar('SGeneral');
                    $access['Settings_User_Management'] = $this->request->getVar('SUser');
                    $access['Last_Updated_By'] = $this->request->getVar('Updated_By');


                    $res = $this->data->updateUserData($user,$access);

                    echo json_encode($res);
                    }
             }
               
            }
    }


    // update data for operator update function
    public function updateUserData_op(){
        if ($this->request->isAJAX()) {
            $site_id = $this->request->getVar('User_Site_Name');
            if (strcmp($site_id, "new_site")) {
               // echo json_encode('existing site');
                 $user['user_id'] = $this->request->getVar('user_id');
                $user['username'] = $this->request->getVar('user_id_op');
                $user['User_First_Name'] = $this->request->getVar('User_First_Name');
                $user['User_Last_Name'] = $this->request->getVar('User_Last_Name');
                $user['User_Phone'] = $this->request->getVar('User_Phone');
                $user['User_Designation'] = $this->request->getVar('User_Designation');
                $user['Role'] = $this->request->getVar('Role');
                $user['site_id'] = $this->request->getVar('User_Site_Name');
                $user['User_Department'] = $this->request->getVar('User_Department');
                $user['Updated_By'] = $this->request->getVar('Updated_By');

                $res = $this->data->update_operator($user);

                echo json_encode($res);
            }else{

                $site_name = $this->request->getVar('new_site_id');
                $site_location = $this->request->getVar('new_location'); 

                $new_site_id = $this->getsite_count();
                $location_id = $this->getlocation_count();

                $site_base['site_id'] = "s".$new_site_id;
                $site_base['site_name'] = $site_name;
                $site_base['last_updated_by'] = $this->session->get('user_name');

                $location_base['location_id'] = "LO".$location_id;
                $location_base['location'] = $site_location;
                 $site_base['location_id'] = $location_base['location_id'];
                $site_res = $this->data->insert_site($site_base,$location_base);
                if ($site_res == true) {
                    $user['user_id'] = $this->request->getVar('user_id');
                    $user['username'] = $this->request->getVar('user_id_op');
                    $user['User_First_Name'] = $this->request->getVar('User_First_Name');
                    $user['User_Last_Name'] = $this->request->getVar('User_Last_Name');
                    $user['User_Phone'] = $this->request->getVar('User_Phone');
                    $user['User_Designation'] = $this->request->getVar('User_Designation');
                    $user['Role'] = $this->request->getVar('Role');
                    $user['site_id'] = $site_base['site_id'];
                    $user['User_Department'] = $this->request->getVar('User_Department');
                    $user['Updated_By'] = $this->request->getVar('Updated_By');

                    $res = $this->data->update_operator($user);

                }else{
                    return json_encode('false');
                }
               // echo json_encode('new site');

            }
           

        }
    }


    // reset password for site admin
    public function forgot_siteadmin_pass(){
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getVar("uid");
            $pass = $this->request->getVar("pass");
            $updated_by = $this->request->getVar('ref_id');
            $data['user_id'] = $user_id;
            $data['pass'] = $pass;
            $data['updated_by'] = $updated_by;
            $res = $this->data->forgot_site_admin_pass($data);
            echo $res;
        }else{
            echo "Data Not Found";
        }
    }

// user_id get lasupdated by for username only
/* temporary hidding for strategy
    public function getlast_updated_username(){
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getVar("user_id");

            $res = $this->data->get_last_updated_username($user_id);

            echo json_encode($res);
        }
    }
    */

/*
 public function dbimport()
{
    $res = $this->data->import_db();

    echo($res);

}
*/

}




?>