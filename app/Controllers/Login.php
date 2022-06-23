<?php 

namespace App\Controllers;
use App\Models\MainModel;
use App\Models\UserLogin;

class Login extends BaseController
{
	protected $session;
	function __construct(){
       	//$data;
        $this->datas = new MainModel();
        $this->datasLog = new UserLogin();
        //$session = \Config\Services::session();
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function index(){
    	return view('User_Login');
    }
	public function createPassword($user_Name){
		$this->session->set('user_name', $user_Name);
		$checkIsPass = $this->datas->checkIsPass($user_Name);
		$val =  $checkIsPass[0]['IsPasswordChecked'];
        if ($val == 0) {
        	return view('Create_Password');
        }
        else{
        	echo "Session Expired!!";
        	//$this->verifyUser();
        }
    }
    public function updatePassword(){
    	//$data =  "Mani";
    	//return view('user_login');
    	//return view('Create_Password');
    }
    public function check(){
    	if (isset($_POST["submit"])) {
    		//$userName = $this->data;
    		$userName = $this->session->get('user_name');
		    $pass = $_POST["newPassword"];
		    $up = $this->datas->updatePass($userName,$pass);
		    if($up){
		    	//echo $this->data ;
		    	return view('User_Login');
		    }
		}
    }
    public function verifyUser(){
    	helper(['form']);
        if($_POST['Login_Verify'] ){
        	$rules = [
                'userName' => 'required',
                'UserPassword' => 'required',
            ];
            if ($this->validate($rules)) {
            	$verify['userName'] = $this->request->getVar('userName');
                $verify['password']= $this->request->getVar('UserPassword');
                $verifyUser = $this->datasLog->verifyUser($verify);
                
                // echo "<pre>";
                // print_r($verifyUser);
                // echo "</pre>";
                if (!empty($verifyUser)) {
                	//print_r($verifyUser);
                    
                    $this->session->set('user_name', $verifyUser["user_id"]);
                    $this->session->set('site_name',$verifyUser['site_name']);
                	$access = $this->datasLog->accessControl($this->session->get('user_name'));
                	$this->session->set('access_control', $access);
                    $this->session->set('user_details', $verifyUser['users']);
                    $this->session->set('location',$verifyUser['location']);
                 //    echo "<pre>";
                	// print_r($this->session->get('access_control'));
                 //    echo "</pre>";
                	return redirect()->to('Home/dashboard///');
                }
                else{
                	echo "User Not Exist!";
                }
                
            }
            else{
            	return view('User_Login', [
                	'validation' => $this->validator
            	]);
            }
        }
        // $this->session->get('name');
    }
}








?>