<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Restapi extends CI_Controller
{
	
	function __construct()
	{
		 parent :: __construct();
         $this->load->model('api_model');
      
	}
	public function register()
	{
	 
		 $name       =  urldecode($_POST ['name']);
		 $email      =  urldecode($_POST ['email']);
		 $password1  =  md5(urldecode($_POST ['password']));
		 $phone      =  urldecode($_POST ['phone']);
		 $gender     =  urldecode($_POST ['gender']);
		 $prof       =  urldecode($_POST ['prof']);
		 $sport      =  urldecode($_POST ['sport']);
		 $location   =  urldecode($_POST ['location']);
		 $token      =  urldecode($_POST ['token']);
		 $where = "WHERE `email` = '".$email."'";
		 $res = $this->api_model->userVarify($where);
		 $data   = array('name'=>$name,'email'=>$email,'password'=> $password1,'phone'=>$phone,'gender'=>$gender,'prof'=>$prof,'sport'=>$sport,'location'=>$location,'token'=>$token);

		 if($res != 0)
		  {
			$status = array('status' => 0, 'message' => 'user already exists');
			echo json_encode($status); 
		  }
		 else
			{
			    $req1 = new userdataservice();
			    $res1 = $req1->createUser($data);
			if($res1 == '1')
			{
		    	$res2 = $req2->userVarify($where);
			if($res2 != 0)
			{
      			$res3 = array('data' => $res2,'status' => 1);
	     		echo json_encode($res3);  
			}
			}
			else
			{
			    $res3 = array('data' => 'record not saved','status' => 0);
			    echo json_encode($res3);  
			}
			}
	}

	public function login()
	{
     $status   = array('sucess' => 1, 'failure'=>0);
	 $email    = urldecode($_POST['email']);
	 $pass     = md5(urldecode($_POST['password']));
	 $username = mysql_real_escape_string($email);
	 $password = mysql_real_escape_string($pass);
	 $token    = urldecode($_POST ['token']);
	    
	    $where = "WHERE `username` = ".$username." AND `password` = ".$password."";
		$res = $this->api_model->userVarify($where);
		print_r($res);
    }

}

?>