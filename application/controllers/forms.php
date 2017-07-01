<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Forms extends CI_Controller
{
public function __construct() 
{
    parent::__construct();
		$this->load->model('register');
		$this->load->library('session');	
    include('assets/emailtemplate/simple_html_dom.php');
}  
         
public function index()
{   
   //$this->load->view('login');  viewJob
     $this->adminlogin();
}

public function home()
{
   $data['middle'] = 'dashboard';
   $this->load->view('templates/template',$data);
}


public function userhome()
{

  $data['middle'] = 'userdashboard';
  $this->load->view('templates/template',$data);
}


 public function gmaillogin()
 {
    $data=json_decode($_REQUEST['data']);
    $username=$data->email;
    $password=md5($data->email);
    $this->load->model('register');
    $emailid = $this->register->Emailfind($data->email);
    if($emailid!=" ")
    {   
    $res = $this->register->login_google($username, $password); 
    if($res != 0)
    { 
      $this->session->set_userdata('item',$res);
      $sessdata = $this->session->userdata('item');
       echo  "1";
       }
     }
    else
    {
      echo "2";
     }
}

public function newadmin()
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $this->load->model('register');
    $emailid = $this->register->admin_Emailfind($username);
    if($emailid)
    {
      $pass = $this->register->adminpasswordfind($username);   
      if($pass)
      {
        $this->session->set_flashdata('error','Please Activate your account a link is sent to your mail account.');
         redirect('forms/adminlogin','refresh');
      }
      else
       {
      $res = $this->register->adminlogin($username, $password); 
     // print_r($res); die();
      if($res != 0)
      {
         $this->session->set_userdata('item',$res);
         $sessdata = $this->session->userdata('item');
         redirect('forms/home');
      }
      else
      { 
         $this->session->set_flashdata('error','Please give the correct  password.');
         redirect('forms/adminlogin','refresh');
        //echo $res['message'] ='Invalid login credentials';
       // $res['message'] ='Invalid login credentials';
       // $this->load->view('login',$res);
      }
  }
    }
    else {
        $this->session->set_flashdata('error','Invalid User.');
          redirect('forms/adminlogin','refresh');
    }

}

//======================User =====================

public function adminlogin()
{
  $this->load->view('adminlogin');
}

public function editRegiterUser()
{
   $data = json_decode($_REQUEST['data']);
   $this->load->model('register');

   $res = $this->register->editRegisterUser($data->email,md5($data->password));
   if($res != 0)
   {
     echo json_encode($data = array("data" => $res));
   }
   else
   {
    echo json_encode($data = array("data" => 0));
   }
}

public function login()
{
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $this->load->model('register');
      $emailid = $this->register->Emailfind($username);
      if($emailid)
      {
            $pass = $this->register->passwordfind($username);   
            if($pass)
            {
             $this->session->set_flashdata('error','Please Activate your account a link is sent to your mail account.');
             redirect('forms/index','refresh');
            }
      else
      {
      $res = $this->register->login($username, $password); 
      if($res != 0)
      {   

      	 $this->session->set_userdata('item',$res);
         $sessdata = $this->session->userdata('item');
         redirect('forms/userhome');
      }
      else
      { 
      	 $this->session->set_flashdata('error','Please give the correct  password.');
         redirect('forms/index','refresh');
      	//echo $res['message'] ='Invalid login credentials';
       // $res['message'] ='Invalid login credentials';
       // $this->load->view('login',$res);
      }
  }
    }
    else {
    	  $this->session->set_flashdata('error','Invalid User.');
          redirect('forms/index','refresh');
    }
    }

public function usermodule()
{
	   $data['middle'] = 'userModule/usermodule';
		$this->load->view('templates/template',$data);
}

public function edituser()
{
	      $data=$this->session->userdata('item');
        $id=$data['userid'];
	      $data['required'] = array('id'=>$id	);
        $data['middle'] = 'userModule/public_userProfile';
		    $this->load->view('templates/template',$data);
}

public function adminedituser()
{
  $data = $this->session->userdata('item');
  $id = $data['adminid'];
  $data['required'] = array('id'=>$id);
  $data['middle'] = 'userModule/admin_profile_edit';
  $this->load->view('templates/template',$data);
}


public function saveuserModule()
{
  $data = json_decode($_REQUEST['data']);
 // $res=[];
  $i =0;
 foreach ($data as  $value) 
 {
   if($i==0)
   {
    $i = $i+1; 
   }
   else
   {
    $res[]=$value; 
   }
  //  print_r($data);
  //if($value->id)
  //{}else{
  //$res[]=$value; }
 }
$commaList = implode(',',$res);
$this->load->model('register');
//print_r($commaList);die;
$res = $this->register->update_userModule($data->id,$commaList);
if($res == 1)
{
echo "1";
}
else
{
echo "0";
}
}

public function saveadminmodule()
{
  $data = json_decode($_REQUEST['data']);
   $i =0;
 foreach ($data as  $value) 
 {
   if($i==0)
   {
    $i = $i+1; 
   }
   else
   {
    $res[]=$value; 
   }
 }
  $commaList = implode(",", $res);
  $this->load->model('register');
  $res = $this->register->update_admin_module($data->id,$commaList);
  if($res)
  {
    echo "1";
  }
  else
  {
    echo "0";
  }
}



public function signout()
{
     $newdata = array(
                'name'  =>'',
                'email' => '',
                'logged_in' => FALSE,
               );
     $this->session->unset_userdata($newdata);
     $this->session->sess_destroy();
     $this->index();
}

 public function admin_profile()
 {

 }

public function profile()
{
$data=json_decode($_REQUEST['data']);
$name=$data->name;
$pass=md5($data->password);
$item= new stdClass();
$item->userid                     =$data->userid;
$item->name                       =$name;
$item->password                   =$pass;
$item->status                     =$data->status;
$item->email                      =$data->email;
$item->prof_id                    =$data->prof_id;
$item->prof_name                  =$data->prof_name;
$item->userType                   =$data->userType;
$item->contact_no                 =$data->contact_no;
$item->sport                      =$data->sport;
$item->gender                     =$data->gender;
$item->dob                        =$data->dob;
$item->address1                   =$data->address1;
$item->address2                   =$data->address2;
$item->address3                   =$data->address3;
$item->location                   =$data->location;
$item->user_image                 =@$data->user_image;
$item->profile_status             =@$data->profile_status;
$item->prof_language              =@$data->prof_language;
$item->other_skill_name           =@$data->other_skill_name;
$item->other_skill_detail         =@$data->other_skill_detail;
$item->age_catered                =@$data->age_catered;
$item->device_id                  =@$data->device_id;
$item->about_me                   =@$data->about_me;
$this->load->model('register');
$res= $this->register->updateProfile($item);
if($res)
{
	echo "1";
}
else 
{
	echo "0";
}
}

public function edituserProfile($str)
{    
     $id = $this->stringtonumber($str);
     $data['middle'] = 'userModule/edituser';
		 $data['required'] = array(
									'id'=>$id	
								 );
		$this->load->view('templates/template',$data);
}

public function ActivateUser()
{
$data2 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 
$item->userid                = $data2->userid;
$item->activeuser            = $data2->activeuser;
$this->load->model('register');
$res = $this->register->ActivateUser($item);
if($res)
{
	echo "User Is Activate";
}
else
{
	echo "User Is Deactivate";
}
}


public function Activateadmin()
{
$data2 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 
$item->userid                = $data2->userid;
$item->activeuser            = $data2->activeuser;
$this->load->model('register');
$res = $this->register->Activateadmin($item);
if($res)
{
  echo "User Is Activate";
}
else
{
  echo "User Is Deactivate";
}
}


// public function deleteUser($id,$activate)
// {
//    $this->register->deleteUser($id,$activate);
//    $data['middle']='userModule/usermodule';
//    $this->load->view('templates/template',$data);
    
  
// } 

public function createNewUser()
{
 	 $data['middle']='userModule/createnewUser';
 	 $this->load->view('templates/template',$data);
}

public function registrationprofile($str)
{ 
      $data = array( 'id' => $str);
      $this->load->view('RegistrationProfile',$data);
}

public function editRegisterUserProfile($str)
{
   $data = array('id' => $str);
   $this->load->view('updateRegistarUser',$data);

}

public function userprofile($str)
{ 
      $id = $this->stringtonumber($str);
 	    $data['middle'] = 'userModule/UserProfile';
		  $data['required'] = array('id'=>$id	);
	  	$this->load->view('templates/template',$data);
}

public function admin_module_assign($str)
{
   $id = $this->stringtonumber($str);
   $data['middle'] = 'userModule/admin_module_assign';
   $data['required'] = array('id' => $id);
   $this->load->view('templates/template',$data);

}

//======================== End User =========================


// ============================== Start Event==============================    
public function CreateEvent()
	{
	  $data['middle'] = 'event/CreateEvent';
		$this->load->view('templates/template',$data);
  
  }

  public function editEvent($str)
  {
      $id = $this->stringtonumber($str);
      $data['middle'] = 'event/editEvent';
      $data['required'] = array( 'id' => $id ); 
      $this->load->view('templates/template',$data);
  }

  public function deleteEvent($str)
  {
     $id = $this->stringtonumber($str);
     $this->load->model('register');
     $this->register->deleteEvent($id);
     $data['middle'] = 'event/index';
     $this->load->view('templates/template',$data);

  }
public function userCreateEvent()
{
    $this->load->view('event/CreateEvent');
  
}  
  
public function event()
{
$item = new stdClass();
$item->id                        = $_POST['id'];
$item->userid                    = $_POST['userid'];
$item->feetype                   = mysql_real_escape_string($_POST['etypes']);
//$item->fee                       = $_POST['price'];
$item->ticket_detail             = mysql_real_escape_string($_POST['ticketdetails']);
//$item->no_of_ticket              = $_POST['noofticket']; 
$item->type                      = $_POST['type'];
$item->name                      = mysql_real_escape_string($_POST['name']);
$item->address1                  = mysql_real_escape_string($_POST['address_line1']);
$item->address2                  = mysql_real_escape_string($_POST['address_line2']);
$item->city                      = $_POST['city'];
$item->pin                       = $_POST['pin'];
$item->description               = mysql_real_escape_string($_POST['description']);
$item->eligibility1              = mysql_real_escape_string($_POST['eligibility1']);
$item->eligibility2              = mysql_real_escape_string($_POST['eligibility2']);
$item->state                     = $_POST['state'];
$item->tandc1                    = mysql_real_escape_string($_POST['terms_and_conditions1']);
$item->tandc2                    = mysql_real_escape_string($_POST['terms_and_conditions2']);
$item->organizer_name            = mysql_real_escape_string($_POST['organizer_name']);
$item->mobile                    = $_POST['mobile'];
$item->org_address1              = mysql_real_escape_string($_POST['organizer_address_line1']);
$item->org_address2              = mysql_real_escape_string($_POST['organizer_address_line2']);
$item->organizer_city            = $_POST['organizer_city'];
$item->organizer_pin             = $_POST['organizer_pin'];
$item->organizer_state           = $_POST['organizer_state'];
$item->event_links               = mysql_real_escape_string($_POST['event_links']);
$item->start_date                = $_POST['start_date'];//strtotime();
$item->end_date                  = $_POST['end_date'];//strtotime($data1['end_date']);
$item->sport                     = $_POST['sport'];
$item->sport_name                = $_POST['sport_name'];
$item->entry_start_date          = $_POST['entry_start_date'];//strtotime($data1['entry_start_date']);
$item->entry_end_date            = $_POST['entry_end_date'];//strtotime($data1['entry_end_date']);
$item->file_name                 = $_POST['file_name'];
$item->email_app_collection      = $_POST['email_app_collection'];
$item->image                     = $_POST['image']; 
 
$this->load->model('register');
$res = $this->register->saveEvent($item);

if($res == '1')
 {
    $event_type = $this->register->cheakeventtype($item->type);
  //  print_r($event_type);
    if(!$event_type)
    {
          $new_type = $this->register->CreateEventType($item->type);  
    } 

echo "1";

 }
else
 echo "0";

}

public function usergetEvent(){

       // $data['middle'] = 'event/index'; 
        $this->load->view('event/index');
     // $this->load->view('templates/template');
  }

public function getEvent(){

	    	$data['middle'] = 'event/index'; 
	    	$this->load->view('templates/template',$data);
     // $this->load->view('templates/template');
	}
	
public function viewEvent($str)
{
          $id = $this->stringtonumber($str);
	      	$data['middle'] = 'event/view';
	      	$data['required'] = array(
									                 'id'=>$id	
							                    	 );
	       	$this->load->view('templates/template',$data);
	}

public function Eventmobileview()
{
	  $event = $this->register->getEventInfo($_POST['infoid']); 
	  $data['required'] = array(
									'event'=>$event	
								 );
	  $this->load->view('event/mobile_view', $data);		
}	

public function StatusEvent()
{
$data2 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 

$item->id                    = $data2->id;
$item->publish               = $data2->publish;

$this->load->model('register');
//$res1 = $this->register->addStatusData($data2->id);
$res = $this->register->StatusEvent($item);
if($data2->publish==1)
{
	$edata=$this->register->getEventInfo($data2->id);
 	$this->register->addEventData($edata);
}
else{
	$this->register->deletePublishEvent($data2->id);
}
}
// ============================ End Event==================================   


// ============================= Start Job=================================
public function CreateJob()
	{
     $data['middle'] = 'job/CreateJob';
	 $this->load->view('templates/template',$data);
	}

public function saveJob()
{

$item  = new stdClass(); 

$item->id                    = $_POST['id'];
$item->userid                = $_POST['userid'];
$item->title                 = mysql_real_escape_string($_POST['title']);
$item->type                  = $_POST['type'];
$item->sports                = $_POST['sports'];
$item->gender                = $_POST['gender'];
$item->work_exp              = mysql_real_escape_string($_POST['work_experience']);
$item->desc                  = mysql_real_escape_string($_POST['description']);
$item->desiredskill          = mysql_real_escape_string($_POST['desired_skills']);
$item->qualification         = mysql_real_escape_string($_POST['qualification']);
$item->keyreq                = mysql_real_escape_string($_POST['key_requirement']);
$item->org_address1          = mysql_real_escape_string($_POST['org_address1']);
$item->org_address2          = mysql_real_escape_string($_POST['org_address2']);
$item->org_city              = mysql_real_escape_string($_POST['org_city']);
$item->org_state             = mysql_real_escape_string($_POST['org_state']);
$item->org_pin               = $_POST['org_pin'];
$item->org_name              = $_POST['organisation_name'];
$item->about                 = mysql_real_escape_string($_POST['about']);
$item->address1              = mysql_real_escape_string($_POST['address_line1']); 
$item->address2              = $_POST['address_line1'];
$item->state                 = $_POST['state'];
$item->city                  = $_POST['city'];
$item->pin                   = $_POST['pin'];
$item->contact               = $_POST['contact'];
$item->image                 = $_POST['image'];
$item->email                 = $_POST['email_app_collection'];
$item->job_link              = $_POST['job_links'];
$this->load->model('register');
$res = $this->register->create_job($item);
if($res == 1)
{
echo "1";
}
else
{
echo "0";
}
}


public function getJob()
{
		$data['middle'] = 'job/index';
		$this->load->view('templates/template',$data);
}


public function saveEditJob()
{
$item  = new stdClass(); 
$item->id                    = $_POST['id'];
$item->userid                = $_POST['userid'];
$item->title                 = mysql_real_escape_string($_POST['title']);
$item->type                  = $_POST['type'];
$item->sports                = $_POST['sports'];
$item->gender                = $_POST['gender'];
$item->work_exp              = mysql_real_escape_string($_POST['work_experience']);
$item->desc                  = mysql_real_escape_string($_POST['description']);
$item->desiredskill          = mysql_real_escape_string($_POST['desired_skills']);
$item->qualification         = mysql_real_escape_string($_POST['qualification']);
$item->keyreq                = mysql_real_escape_string($_POST['key_requirement']);
$item->org_address1          = mysql_real_escape_string($_POST['org_address1']);
$item->org_address2          = mysql_real_escape_string($_POST['org_address2']);
$item->org_city              = mysql_real_escape_string($_POST['org_city']);
$item->org_state             = mysql_real_escape_string($_POST['org_state']);
$item->org_pin               = $_POST['org_pin'];
$item->org_name              = $_POST['organisation_name'];
$item->about                 = mysql_real_escape_string($_POST['about']);
$item->address1              = mysql_real_escape_string($_POST['address_line1']); 
$item->address2              = $_POST['address_line1'];
$item->state                 = $_POST['state'];
$item->city                  = $_POST['city'];
$item->pin                   = $_POST['pin'];
$item->contact               = $_POST['contact'];
$item->image                 = $_POST['image'];
$item->email                 = $_POST['email_app_collection'];
//$item->job_link              = $_POST['job_links'];
$this->load->model('register');
$res = $this->register->save_Edit_Job($item);
if($res == 1)
{
echo "1";
}
else
{
echo "0";
}
}









public function usercreatejob()
{
    $this->load->view('job/CreateJob');
}
	

public function stringtonumber($str)
{
$list=array('0' => 'a','1' => 'b','2' => 'c','3' => 'd','4' => 'e','5' => 'f','6' => 'g','7' => 'h','8' => 'i','9' => 'j');
 $num=$str; //your value
 $temp='';
 $arr_num=str_split ($num);
foreach($arr_num as $data)
{
$temp.=array_search($data,$list);
}
$num=$temp;
$id=$num;
return $id;
}

public function viewJob($str)
{  
	 $id=$this->stringtonumber($str);
		$data['middle'] = 'job/view';
		$data['required'] = array(
									'id'=>$id
								 );
   $this->load->view('templates/template',$data);
}


public function mobileview()
{	
      $job = $this->register->getJobInfo($_POST['infoid']); 
    	$data['required'] = array(
									'job'=>$job	
								 );
		  //$data['noheader'] = false;
	  	//$data['middle'] = 'job/mobile_view';
		  $this->load->view('job/mobile_view', $data);
		
		
	}



public function StatusJob()
{
$data2 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 
$item->id                    = $data2->id;
$item->publish               = $data2->publish;
$this->load->model('register');
$res = $this->register->StatusJob($item);
if($data2->publish==1)
{    
	//$jdata=$this->register->getJobInfo($data2->id);
    $data = array('status' => 1, "msg" =>"Activated");
    echo json_encode($data);
	//$this->register->addJobData($jdata);
}
else{
	 $data = array('status' => 0, "msg" =>"Deactivated");
    echo json_encode($data);
	//$this->register->deletePublishJob($data2->id);
}
}

public function editjob($str)
{
	    $id= $this->stringtonumber($str); 
		$data['middle']="job/Editjob";
		$data['required']= array(
			                     'id' => $id 
			                     );
		$this->load->view('templates/template',$data);
}



//==================== End Job==============================

//================ Start Tournament==============


public function CreateTournament()
	{
	$data['middle'] = 'tournament/CreateTournament';
    $this->load->view('templates/template',$data);	
	}

public function saveTournament()
{
$data1 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 
$item->id                      = $data1->id;
$item->organizer_name          = $data1->organizer_name;
$item->tournament_level        = $data1->tournament_level;
$item->tournament_category     = $data1->catagory;
$item->tournament_ageGroup     = $data1->tournament_ageGroup;
$item->tournament_gender       = $data1->tournament_gender;
$item->userid                  = $data1->userid;
$item->type                    = $data1->tournament_name;
$item->address_line1           = $data1->address_line1;
$item->address_line2           = $data1->address_line2;
$item->city                    = $data1->city;
$item->state                   = $data1->state;
$item->pin                     = $data1->pin;
$item->description             = $data1->description;
$item->eligibility1            = $data1->eligibility1;
$item->eligibility2            = $data1->eligibility2;
$item->terms_and_conditions1   = $data1->terms_and_conditions1;
$item->terms_and_conditions2   = $data1->terms_and_conditions2;
$item->organizer_name          = $data1->organizer_name;
$item->mobile                  = $data1->mobile;
$item->emailid                 = $data1->emailid;
$item->organizer_address_line1 = $data1->organizer_address_line1;
$item->organizer_address_line2 = $data1->organizer_address_line2;
$item->organizer_city          = $data1->organizer_city;
$item->organizer_state         = $data1->organizer_state;
$item->organizer_pin           = $data1->organizer_pin;
$item->tournament_links        = $data1->tournament_links;
$item->start_date              = $data1->start_date;//$data1['start_date'];
$item->end_date                = $data1->end_date;//$data1['end_date'];
$item->entry_start_date        = $data1->entry_start_date;//$data1['entry_start_date'];
$item->entry_end_date          = $data1->entry_end_date;//$data1['entry_end_date'];
$item->file_name               = $data1->file_name;
$item->sport                   = $data1->sport;
$item->publish                 = 0;
$item->image                   = $data1->image;  

$this->load->model('register');
$res = $this->register->saveTournament($item);
if($res == '1')
 {
 echo "1";
 }
else
 echo "0";
}

public function usercreateTournament(){
    $this->load->view('tournament/CreateTournament');
  }

public function getTournament(){
		$data['middle'] = 'tournament/index';

		$this->load->view('templates/template',$data);
	}
public function viewTournament($str)
{
    $id= $this->stringtonumber($str);
		$data['middle'] = 'tournament/view';
		$data['required'] = array(
									'id'=>$id	
								 ); 
		$this->load->view('templates/template',$data);
	}

public function Tournamentmobileview()
{
	  $tournament = $this->register->getTournamentInfo($_POST['infoid']); 
	  $data['required'] = array(
									'tournament'=>$tournament	
								 );
	  $this->load->view('tournament/mobile_view_tournament', $data);		
}	

public function StatusTournament()
{
$data2 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 

$item->id                    = $data2->id;
$item->publish               = $data2->publish;

$this->load->model('register');
$res = $this->register->Statustournament($item);
if($data2->publish==1)
{    
	//$tdata=$this->register->getTournamentInfo($data2->id);
	//$this->register->addTournamentData($tdata);
}
else
{
	//$this->register->deletePublishTournament($data2->id);
}
}
public function edittournament($str)
{
	    $id= $this->stringtonumber($str); 
		$data['middle']="tournament/editTournament";
		$data['required']= array(
			                     'id' => $id 
			                     );
		$this->load->view('templates/template',$data);
}
//==============================End Tournament==================================



//================== Start Resources===========================

public function getResources()
{
		$data['middle'] = 'resources/index';
		$this->load->view('templates/template',$data);
}
	
public function createresources()
{	
		$data['middle'] = 'resources/createResource';
		$this->load->view('templates/template',$data);
}

public function shareResources()
{	
		$data['middle'] = 'resources/shareResources';
		$this->load->view('templates/template',$data);
}


public function SavecreateResources()
{
$item  = new stdClass(); 
$item->id                    = $_POST['id'];//$data2->id;
$item->userid                = $_POST['userid'];//$data2->userid;
$item->title                 = mysql_real_escape_string($_POST['title']);//mysql_real_escape_string($data2->title);
$item->url                   = $_POST['url'];//$data2->url;
$item->status                = $_POST['status'];//$data2->status;
$item->summary               = mysql_real_escape_string($_POST['summary']);//mysql_real_escape_string($data2->summary);
$item->keyword               = $_POST['keyword'];//$data2->keyword;
$item->description           = mysql_real_escape_string($_POST['description']);//mysql_real_escape_string($data2->description);
$item->topic_of_artical      = $_POST['topic_of_artical'];//$data2->topic_of_artical;
$item->sport                 = $_POST['sport'];//$data2->sport;
$item->location              = $_POST['location'];//$data2->location;
$item->image                 = $_POST['image'];//$data2->image;
$item->token                 = $_POST['token'];//$data2->token;
$item->date_created          = $_POST['date_created'];//$data2->date_created;

$this->load->model('register');
$res = $this->register->saveResources($item);
echo json_encode(array('response' => $res));
}



public function SaveshareResources()
{
$item  = new stdClass(); 
$item->id                    = $_REQUEST['id'];
$item->userid                = $_REQUEST['userid'];//$data2->userid;
$item->title                 = mysql_real_escape_string($_REQUEST['title']);//mysql_real_escape_string($data2->title);
$item->url                   = mysql_real_escape_string($_REQUEST['url']);//$data2->url;
$item->status                = $_REQUEST['status'];//$data2->status;
$item->summary               = mysql_real_escape_string($_REQUEST['summary']);//mysql_real_escape_string($data2->summary);
$item->keyword               = $_REQUEST['keyword'];//$data2->keyword;
$item->description           = mysql_real_escape_string($_REQUEST['description']);//mysql_real_escape_string($data2->description);
$item->topic_of_artical      = $_REQUEST['topic_of_artical'];//$data2->topic_of_artical;
$item->sport                 = mysql_real_escape_string($_REQUEST['sport']);//$data2->sport;
$item->location              = $_REQUEST['location'];//$data2->location;
$item->image                 = $_REQUEST['image'];//$data2->image;
$item->token                 = $_REQUEST['token'];//$data2->token;
$item->date_created          = $_REQUEST['date_created'];//$data2->date_created;


$this->load->model('register');
$res = $this->register->saveResources($item);
echo json_encode(array('response' => $res));
//die;
}
public function viewResources($str)
{
	    $id = $this->stringtonumber($str);
		$data['middle'] = 'resources/view';
		$data['required'] = array(
									'id'=>$id	
								 );
        $this->load->view('templates/template',$data);
}
	//=============harshvardhan==(Edit Resources)==============

public function editResources($str)
{
	    $id = $this->stringtonumber($str);
		$data['middle'] = 'resources/editResources';
		$data['required'] = array(
									'id'=>$id	
								 );
		$this->load->view('templates/template',$data);
}

public function saveEditResources()
{
$item  = new stdClass(); 
//print_r($_POST);//die;
$item->id                    = $_POST['id'];//$data2->id;
$item->userid                = $_POST['userid'];//$data2->userid;
$item->title                 = mysql_real_escape_string($_POST['title']);//mysql_real_escape_string($data2->title);
$item->url                   = $_POST['url'];//$data2->url;
$item->summary               = mysql_real_escape_string($_POST['summary']);//mysql_real_escape_string($data2->summary);
$item->description           = mysql_real_escape_string($_POST['description']);//mysql_real_escape_string($data2->description);
$item->topic_of_artical      = $_POST['topic_of_artical'];//$data2->topic_of_artical;
$item->sport                 = $_POST['sport'];//$data2->sport;
$item->location              = $_POST['location'];//$data2->location;
$item->image                 = $_POST['image'];//$data2->image;
$item->status                = $_POST['status'];//$data2->status;
$item->keyword               = $_POST['keyword'];//$data2->keyword;
$item->token                 = $_POST['token'];//$data2->token;
$item->date_created          = @$_POST['date_created'];//$data2->date_created;

$this->load->model('register');
$res = $this->register->saveEditResources($item);
echo json_encode(array('response' => $res));
}

public function deleteResources($str)
{
	      $id = $this->stringtonumber($str);
        $this->register->deleteResources($id);
        $data['middle'] = 'resources/index';
	    	$this->load->view('templates/template',$data);
}

public function deleteJob($str)
{
        $id = $this->stringtonumber($str);
        $this->register->deleteJob($id);
        $data['middle'] = 'job/index';
        $this->load->view('templates/template',$data);
}

public function deleteTournament($str)
{
        $id = $this->stringtonumber($str);
        $this->register->deleteTournament($id);
        $data['middle'] = 'tournament/index';
        $this->load->view('templates/template',$data);
}







public function mobileviewResources()
{
    $resources = $this->register->getResourceInfo($_POST['infoid']); 
	  $data['required'] = array(
									'resources'=>$resources	
								 );	
  	$this->load->view('resources/mobile_viewResources', $data);	
}

public function shareresource()
{
      $data['middle']='resources/shareResources';
      $this->load->view('templates/template',$data);

}

public function StatusResources()
{
$data2 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 

$item->id                    = $data2->id;
$item->status                = $data2->status;

$this->load->model('register');
//$res1 = $this->register->addStatusData($data2->id);
$res = $this->register->StatusResources($item);
if($data2->status==1)
{
	$rdata=$this->register->getResourceInfo($data2->id);
  $this->register->addResourcesData($rdata);	
  echo "Resources Is Activate";
}

else
{
	echo "Resources Is Deactivate";
	$this->register->deleteStatusResources($data2->id);
}
}

//============================= End Resources ===================================	

//======================= Start Content=======================================

public function createContent()
{
		$data['middle'] = 'content/create_content';
		$this->load->view('templates/template',$data);
}

  public function getContent(){
		$data['middle'] = 'content/list';
		$this->load->view('templates/template',$data);
	}

public function viewContent($id){
		$data['middle'] = 'content/view';
		$data['required'] = array(
									'id'=>$id	
								 );
		$this->load->view('templates/template',$data);
	}

public function editContent($str)
{
         $id = $this->stringtonumber($str);

		$data['middle'] = 'content/editcontent';
	//	$data1=$this->register->editcontent($id);
        //$this->load->view('content/editcontent',$data1);
		$data['required'] = array(
									'id'=>$id	
								 );
		$this->load->view('templates/template',$data);
	}

public function saveContent()
{
$data12 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 
$item->id                    = $data12->id;
$item->userid                = $data12->userid;
$item->title                 = $data12->title;
$item->url                   = $data12->url;
$item->content               = $data12->content;
$item->publish               = $data12->publish;
$item->date_created          = @strtotime($data12->date_created);
$item->date_updated          = @strtotime($data12->date_updated);
//print_r($item);die();
$this->load->model('register');
$res = $this->register->create_content($item);
if($res == 1)
{
echo "1";
}
else
{
echo "0";
}
}

public function saveEditContent()
{

$data2 = json_decode($_REQUEST['data']);

$item  = new stdClass(); 
//echo $item->id;die;
$item->id                    = $data2->id;
$item->userid                = $data2->userid;
$item->title                 = $data2->title;
$item->url                   = $data2->url;
$item->content               = $data2->content;
$item->publish               = $data2->publish;
$item->date_created          = @strtotime($data2->date_created);
$item->date_updated          = @strtotime($data2->date_updated);

//print_r($item);die();
$this->load->model('register');
$res = $this->register->create_content($item);
echo json_encode(array('response' => "Content Updated"));
}




public function StatusContent()
{
$data2 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 

$item->id                    = $data2->id;
$item->publish               = $data2->publish;

$this->load->model('register');
$res = $this->register->StatusContent($item);
if($data2->publish==1)
{    
	//$jdata=$this->register->getContentInfo($data2->id);
  //  print_r($jdata);
	//$this->register->addContentData($jdata);
}
else{
	//$this->register->deletePublishContent($data2->id);

}
}
// =============================== End Content==============================

//==================================Start Email=============================

public function edit_admin()
{
$data=json_decode($_REQUEST['data']);
$item= new stdClass();
$item->userid                     =$data->userid;
$item->name                       =$data->name;
$item->contact_no                 =$data->contact_no;
$item->gender                     =$data->gender;
$item->dob                        =$data->dob;
$item->email                      =$data->email;
$item->address1                   =$data->address1;
$item->address2                   =$data->address2;
$item->address3                   =$data->address3;
$item->location                   =$data->location;
$item->status                     =@$data->status;
$item->userType                   =@$data->userType;
$item->password                   = $data->password;
$item->access_module              = $data->access_module;

$res= $this->register->admin_registration($item);
if($res)
{
  echo  "1";
}
else
{
echo"0";
}
}


public function admin_registration()
{
$data=json_decode($_REQUEST['data']);
$name=$data->name;
$pass=md5($data->password);
$this->load->model('register');
$result=$this->register->admin_Emailfind($data->email);
if($result)
{
    echo json_encode(array('response' => '1'));
}
else
{
$item= new stdClass();
$item->userid                     =$data->userid;
$item->name                       =$name;
$item->password                   =$pass;
$item->status                     =$data->status;
$item->email                      =$data->email;
$item->prof_id                    =$data->prof_id;
$item->prof_name                  =$data->prof_name;
$item->userType                   =$data->userType;
$item->contact_no                 =$data->contact_no;
$item->sport                      =$data->sport;
$item->gender                     =$data->gender;
$item->dob                        =$data->dob;
$item->address1                   =$data->address1;
$item->address2                   =$data->address2;
$item->address3                   =$data->address3;
$item->location                   =$data->location;
$item->user_image                 =@$data->user_image;
$item->access_module              = $data->access_module;
$item->device_id                  =@$data->device_id;
$item->about_me                   =@$data->about_me;

$res= $this->register->admin_registration($item);

if($res)
{  
    echo json_encode(array('response' => '2'));
    $email = $data->email;
  require('class.phpmailer.php');
              $mail = new PHPMailer();
              $to=$email;
              $from="info@darkhorsesports.in";
              $from_name="Getsporty";
              $subject="Email varification ";
             // $emailconform="http://staging.getsporty.in/index.php/forms/forgotpassword?email=";
              //$emailconform  ="testingapp.getsporty.in/getSportyLite/activation.php?email=";
              $emailconform  =  site_url().'/forms/adminforgotpassword?email=';
              //global $error;
              $mail = new PHPMailer();  // create a new object
              $mail->IsSMTP(); // enable SMTP
              $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
              $mail->SMTPAuth = true;  // authentication enabled
              $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
              $mail->Host = 'smtp.gmail.com';
              //$mail->Host = 'smtp.gmail.com';
              $mail->Port = 465; 
              $mail->Username ="info@darkhorsesports.in";  
              $mail->Password = "2016Darkhorse";           
              $mail->SetFrom($from, $from_name);
              $mail->Subject = $subject;
              $mail->Body = '<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="x-apple-disable-message-reformatting">  
  <title></title> 
    <style>
        html,
        body {
          margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
        
        }
        table table table {
            table-layout: auto;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
        *[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
        }
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
        }
        .a6S {
          display: none !important;
          opacity: 0.01 !important;
        }
        img.g-img + div {
          display:none !important;
      }
        .button-link {
            text-decoration: none !important;
        }

       
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { 
            .email-container {
                min-width: 375px !important;
            }
        }

    </style>

    <style>
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }
            .fluid {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            .stack-column-center {
                text-align: center !important;
            }
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
      .email-container p {
        font-size: 17px !important;
        line-height: 22px !important;
      }
        }
    </style>
</head>
<body width="100%" bgcolor="#fff" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; text-align: left;">
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
          <tr>
        <td bgcolor="#5766BE">
          <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="180" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; background: #5766BE; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
        </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 40px 40px 20px;">
                    <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;">Hello</h1>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 10px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">Hi,Greetings! You are just a step away from accessing your getsporty account.Just click on the link below to reset your password.
                    </p>
                </td>
            </tr>
      <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;"><a style="color:#5766BE;" href="'.$emailconform.''.$email.'">Reset Your Password</a></p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">You will need to enter this new password whenever you sign in to your Get Sporty account in future.</p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#000000" align="center" valign="top" style="padding: 10px;">
                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0">
                                   
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="120" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"  style="float: right;padding-right: 10px;display: inline-block;">
                                    
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <ul>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/f.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/go.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/ln.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/t.png"></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                        </tr>

                    </table><hr style="width: 90%;margin-top:0">
                </td>
            </tr>
            <!-- 2 Even Columns : END -->
            


        <!-- Email Footer : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
            <tr>
                <td style="background:#000000;padding: 10px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;" class="x-gmail-data-detectors">
                    <webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">Lorem ipsum dolor sit amet</webversion>
                    <br><br>
                    Company Name<br>consectetur adipiscing elit. In quis fermentum<br>(123) 456-7890
                    <br><br>
                    <unsubscribe style="color:#888888; text-decoration:underline;">unsubscribe</unsubscribe>
                </td>
            </tr>
        </table>
        <!-- Email Footer : END -->

    </center>
</body>
</html>'; 
               $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
               $mail->AltBody = $txt; 
               $mail->AddAddress($to);
               $mail->Send();
			   
			   //echo '2';
			  // echo json_encode(array('response' => '2'));
         
}
else
{

    echo json_encode(array('response' => '3'));
}
}
}


public function emailsearch()
{
	$this->load->view('Forgotpasswordemail');
}

public function Emailfind()
{
  $item= new stdClass();
  $email=$_POST['email'];
  $item->email =$_POST['email'];
  $this->load->model('register');
  $res=$this->register->Emailfind($item->email);
  if($res)
  {
    if($res['userType'] == 101 || $res['userType'] == 102 || $res['userType'] == 103 )
    {
  $id=$res['userid'];
   require('class.phpmailer.php');
              $mail = new PHPMailer();
              $to=$email;
              $from="info@darkhorsesports.in";
              $from_name="Getsporty";
              $subject="Email varification ";
             // $emailconform="http://staging.getsporty.in/index.php/forms/forgotpassword?email=";
              //$emailconform  ="testingapp.getsporty.in/getSportyLite/activation.php?email=";
              $emailconform  =  site_url().'/forms/forgotpassword?email=';
              //global $error;
              $mail = new PHPMailer();  // create a new object
              $mail->IsSMTP(); // enable SMTP
              $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
              $mail->SMTPAuth = true;  // authentication enabled
              $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
              $mail->Host = 'smtp.gmail.com';
              //$mail->Host = 'smtp.gmail.com';
              $mail->Port = 465; 
              $mail->Username ="info@darkhorsesports.in";  
              $mail->Password = "2016Darkhorse";           
              $mail->SetFrom($from, $from_name);
              $mail->Subject = $subject;
              $mail->Body = '<html lang="en">
   <head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="x-apple-disable-message-reformatting">  
  <title></title> 
    <style>
        html,
        body {
          margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
        
        }
        table table table {
            table-layout: auto;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
        *[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
        }
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
        }
        .a6S {
          display: none !important;
          opacity: 0.01 !important;
        }
        img.g-img + div {
          display:none !important;
      }
        .button-link {
            text-decoration: none !important;
        }

       
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { 
            .email-container {
                min-width: 375px !important;
            }
        }

    </style>

    <style>
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }
            .fluid {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            .stack-column-center {
                text-align: center !important;
            }
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
      .email-container p {
        font-size: 17px !important;
        line-height: 22px !important;
      }
        }
    </style>
</head>
<body width="100%" bgcolor="#fff" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; text-align: left;">
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
          <tr>
        <td bgcolor="#5766BE">
          <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="180" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; background: #5766BE; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
        </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 40px 40px 20px;">
                    <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;">Hello</h1>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 10px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">Hi,Greetings! You are just a step away from accessing your getsporty account.Just click on the link below to reset your password.
                    </p>
                </td>
            </tr>
      <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;"><a style="color:#5766BE;" href="'.$emailconform.''.$email.'">Reset Your Password</a></p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">You will need to enter this new password whenever you sign in to your Get Sporty account in future.</p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#000000" align="center" valign="top" style="padding: 10px;">
                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0">
                                   
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="120" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"  style="float: right;padding-right: 10px;display: inline-block;">
                                    
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <ul>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/f.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/go.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/ln.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/t.png"></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                        </tr>

                    </table><hr style="width: 90%;margin-top:0">
                </td>
            </tr>
            <!-- 2 Even Columns : END -->
            


        <!-- Email Footer : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
            <tr>
                <td style="background:#000000;padding: 10px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;" class="x-gmail-data-detectors">
                    <webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">Lorem ipsum dolor sit amet</webversion>
                    <br><br>
                    Company Name<br>consectetur adipiscing elit. In quis fermentum<br>(123) 456-7890
                    <br><br>
                    <unsubscribe style="color:#888888; text-decoration:underline;">unsubscribe</unsubscribe>
                </td>
            </tr>
        </table>
        <!-- Email Footer : END -->

    </center>
</body>
</html>'; 
               $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
               $mail->AltBody = $txt; 
               $mail->AddAddress($to);
               $mail->Send();
 


     // $mes['message'] ='Email sent to your account please reset your password';
     // $this->load->view('login',$res);
    echo '<h3 style="color: green;text-align: center; "> Email sent to your account please reset your password</h3>';
   //  $mes="Email sent to your account please reset your password";
    // $this->session->set_flashdata('Welcome To GetSporty ');
     $this->emailsearch();
    // $this->load->view('Forgotpasswordemail',$mes);
 }else
 {
       $this->session->set_flashdata('msg', 'You are not authorize to login');
       redirect('forms/emailsearch');

 }
 }
 else
 {
      $this->session->set_flashdata('msg', 'Email Id is Not Found');
      redirect('forms/emailsearch');
   // $this->session->set_flashdata('error','Email Id is Not Found');
    //redirect('forms/emailsearch','refresh');
 }

}
//==================================End Email================================= 
 public function imageupload()
 {    // print_r($_POST);die; 
             $newpath=$_POST['path'];
          if(isset($_POST['file_name']) && $_POST['file_name'] != '')
               {
               $image_file =implode('_',explode(" ",$_POST['file_name']));  
               $filename1 = preg_replace('/[^ \w]+/', '', $image_file);
               }else
               {
                $filename1 = '';
               }

     switch ($newpath) {
      case 'uploads/resources/':
            $prename = 'resources';
            if ($_POST['oldimageid'])
                  {
            if($_POST['oldimage'])
            {
                $id = $_POST['oldimageid'];
                  $image = $_POST['oldimage'];
                $temp= $this->register->removeimage($id,$image);
                
            }
              }
        break;
      case 'uploads/tournament/':
              $prename = 'tournament';
              if ($_POST['oldimageid'])
                     {
            if($_POST['oldimage'])
            {
                $id = $_POST['oldimageid'];
                  $image = $_POST['oldimage'];
                $temp= $this->register->removetournamentimage($id,$image);
                  }
              }
        break;
          case 'uploads/job/':
          $prename = 'job';
              if ($_POST['oldimageid'])
                     {
            if($_POST['oldimage'])
            {
                $id = $_POST['oldimageid'];
                  $image = $_POST['oldimage'];
                $temp= $this->register->removejobimage($id,$image);
                  }
              }
        break;
         case 'uploads/event/':
         $prename = 'event';
              if ($_POST['oldimageid'])
                     {
            if($_POST['oldimage'])
            {
                $id = $_POST['oldimageid'];
                  $image = $_POST['oldimage'];
                $temp= $this->register->removeeventimage($id,$image);
                  }
              }
        break;
      default:
         throw new Exception('Unknown image path.');
        break;
}
           $mime=$_FILES['file']['type'];
           switch ($mime) {
             case 'image/jpeg':
                    $ftype = 'imagecreatefromjpeg';
                    break;
             case 'image/png':
                    $ftype = 'imagecreatefrompng';
                    break;
             default: 
                    throw new Exception('Unknown image type.');
}
            $temp = explode(".", $_FILES["file"]["name"]);
            date_default_timezone_set("Asia/Kolkata");
            if($filename1 == '')
            {
              $newfilename1=$prename."_".time();
            }
            else
            {
              $newfilename1=$filename1;}
            $newfilename = $newfilename1. '.' . end($temp);


            move_uploaded_file($_FILES["file"]["tmp_name"], $newpath. $newfilename);
  //===================image size fix ==============================================================
            $uploadimage = $newpath.$newfilename;
            $newname = $newfilename;


           // Set the resize_image name
            $resize_image = $newpath.$newname; 
            $actual_image = $newpath.$newname;
           // It gets the size of the image
            list( $width,$height ) = getimagesize( $uploadimage );
          // It makes the new image width of 350
            $newwidth =$_POST['width'];
          // It makes the new image height of 350
            $newheight =$_POST['height'];
          // It loads the images we use jpeg function you can use any function like imagecreatefromjpeg
            $thumb = imagecreatetruecolor( $newwidth, $newheight );
           
            $source = $ftype( $resize_image );
          // Resize the $thumb image.
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
          // It then save the new image to the location specified by $resize_image variable
            imagejpeg( $thumb, $resize_image, 100 ); 
          // 100 Represents the quality of an image you can set and ant number in place of 100.
            $out_image=file_get_contents($resize_image);      
//=================================end image size fix ==================================================
            $filename = $this->compress_image($uploadimage, $uploadimage, 80);

       //  print_r($uploadimage); die;
        echo  $newfilename;  

}

function compress_image($source_url, $destination_url, $quality) 
{
      // print_r($source_url);die;

      $info = getimagesize($source_url);

          if ($info['mime'] == 'image/jpeg')
          $image = imagecreatefromjpeg($source_url);

          elseif ($info['mime'] == 'image/gif')
          $image = imagecreatefromgif($source_url);

          elseif ($info['mime'] == 'image/png')
          $image = imagecreatefrompng($source_url);

          imagejpeg($image, $destination_url, $quality);
          return $destination_url;
}

public function getStateByCity()
{
		$key = $_POST['key'];
		$results = $this->register->getStateByKey($key);
		echo  json_encode($results);
}

public function getCityName()
{
		 $keyword = $this->input->post('term');
         $data['response'] = 'false'; //Set default response
         $query = $this->register->getCityName($keyword); //Model DB search
         if($query->num_rows() > 0){
         $data['response'] = 'true'; //Set response
         $data['message'] = array(); //Create array
         foreach($query->result() as $row){
	     $data['message'][] = array('value'=> $row->city); //Add a row to array
   }
}
         echo json_encode($data);
}

public function subsection()
{
	$keyword = $this->input->post('term');
         $data['response'] = 'false'; //Set default response
         $query = $this->register->getsubsection($keyword); //Model DB search
         if($query->num_rows() > 0){
         $data['response'] = 'true'; //Set response
         $data['message'] = array(); //Create array
         foreach($query->result() as $row){
	     $data['message'][] = array('value'=> $row->subsection); //Add a row to array
   }
}
         echo json_encode($data);
}

public function passwordchange()
{
    $data=json_decode($_REQUEST['data']);
    $pass1=$data->oldpassword1;
    $pass2=md5($data->oldpassword);
    $userid=$data->userid;
    $newpass=md5($data->newpassword);
    if($pass1==$pass2)
      {
        $this->load->model('register');
        $res = $this->register->changepassword($userid,$newpass);
        if($res)
          { 
            echo json_encode(array('response' =>'1'));
          }
        else
          {
          	echo json_encode(array('response' => '2'));
          }
      }
    else{
            echo json_encode(array('response' => '3'));
        }
}

public function adminchange_password()
{
   $data = json_decode($_REQUEST['data']);
   $pass1 = $data->oldpassword1;
   $pass2 = md5($data->oldpassword);
   $adminid = $data->userid;
   $newpass = md5($data->newpassword);
  
 //  print_r($pass2);
  // echo json_encode(array('response' =>$pass2));
  // echo json_encode(array('response' =>$pass1));
   //print_r($pass1);
 //  die;

   if($pass1 == $pass2)
   {
    $this->load->model('register');
    $res = $this->register->adminchange_password($adminid,$newpass);
    if($res)
    {
     echo json_encode(array('response' =>'1'));
    }else{
      echo json_encode(array('response' => '2'));
    }
   }else
   {
    echo json_encode(array('response' => '3'));
   }


}

public function Csvfileupload()
{
  
   $temp = explode(".", $_FILES["input-file-preview"]["name"]);
   if($_FILES["input-file-preview"]["name"] && end($temp)=='csv')
   {
   $data=$_FILES["input-file-preview"]["name"];
   $temp=$data;
   move_uploaded_file($_FILES["input-file-preview"]["tmp_name"], "uploads/".'csv'."/".$data);
   $file =base_url('/uploads/csv/'.$data);
   $file = fopen($file,"r");
   $data=$this->session->userdata('item');

   // $id=$data['userid'];

    if($data['userType'] == 101 || $data['userType'] == 102)
    {
        $id=$data['adminid'];
    }else
    {
        $id=$data['userid'];
    }
   $i=0;
   while(! feof($file))
   { 
    $data=fgetcsv($file);
    $this->load->model('register');
    $row[] = $data;
    if($i!=0){
    $res= $this->register->Csvfileupload($data,$id);
    $csvresourcesid[]=$res;
    }
    $i=$i+1;
}
fclose($file);
$path='uploads/csv/'.$temp;

@unlink($path);
    $CI = get_instance();
    $CI->load->library('session');
    $CI->session->set_flashdata('csvresourcesid',$csvresourcesid);
    redirect("forms/upload_photo");
}
else{
	$this->session->set_flashdata('error','Please Upload CSV file.');
    redirect('forms/getResources','refresh'); 
}
}


public function upload_photo()
{
	$resourcesArray=$this->session->flashdata('csvresourcesid');
	$data['middle']='resources/upload_photo';
    $data['required']= array(
    	                     'resourcesArray' => $resourcesArray
    	                    );
 	$this->load->view('templates/template',$data);
}



public function uploadimg()
{  

 $resourceid = $_POST['resid'];
 
if(!empty($_FILES['image'])){
$mime=$_FILES['image']['type'] ;
switch ($mime) 
      {
        case 'image/jpeg':
                    $ftype = 'imagecreatefromjpeg';
                    break;
        case 'image/png':
                    $ftype = 'imagecreatefrompng';
                    break;
        default: 
                    throw new Exception('Unknown image type.');
            }
            $temp = explode(".", $_FILES["image"]["name"]);
            date_default_timezone_set("Asia/Kolkata");
            $newfilename1='res_'.time();
            $newfilename = $newfilename1. '.' . end($temp);
            move_uploaded_file($_FILES["image"]["tmp_name"], 'uploads/resources/'.$newfilename);
  //===================image size fix ==============================================================
            $uploadimage =  "uploads/resources/".$newfilename;
            $newname = $newfilename;
           // Set the resize_image name
            $resize_image =  "uploads/resources/".$newname; 
            $actual_image =  "uploads/resources/".$newname;
           // It gets the size of the image
            list( $width,$height ) = getimagesize( $uploadimage );
          // It makes the new image width of 350
            $newwidth = 1115;
          // It makes the new image height of 350
            $newheight =640;
          // It loads the images we use jpeg function you can use any function like imagecreatefromjpeg
            $thumb = imagecreatetruecolor( $newwidth, $newheight );
           
            $source = $ftype( $resize_image );
          // Resize the $thumb image.
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
          // It then save the new image to the location specified by $resize_image variable
            imagejpeg( $thumb, $resize_image, 100 ); 
          // 100 Represents the quality of an image you can set and ant number in place of 100.
            $out_image=file_get_contents($resize_image);      
//=================================end image size fix ==================================================
     
             $this->load->model('register');
             $this->register->saveCSVImage($resourceid,$newname);

             echo  $newfilename;  
       }
       else
       {
         echo "Image Is Empty";
}

}

public function forgotpassword()
{
	//$this->load->view('login');
	$this->load->view('Forgotpassword');
}

public function adminforgotpassword()
{
   $this->load->view('adminforgotpassword');

}


public function verifyuser()
{
$item  = new stdClass(); 

$item->email              = $_POST['email'];
$item->password            = md5($_POST['Newpassword']);

$this->load->model('register');
$res = $this->register->verifyuserpassword($item->email,$item->password);
if($res)
{
     $this->session->set_flashdata('error','Welcome To GetSporty ');
      redirect('forms/index','refresh');
     // echo "Created";
}
else
{
	echo "Not Created";
}
}


public function verifyadmin()
{
   

   $email      = $_POST['email'];
   $password   = md5($_POST['Newpassword']);
   
   $this->load->model('register');
   $res = $this->register->verifyadminpassword($email,$password);
   if($res)
   {
      $this->session->set_flashdata('error','Welcome To Getsporty Admin');
      redirect('forms/index','refresh');
   }
   else
   {
      echo " Not Created";
   } 
}

function logincall()
{

            $data['middle'] = 'dashboard';
           $this->load->view('login-callback',$data);

}


public function profileimage()
{  
        // print_r($_FILES);
       //  die;
         

           $userid=$_POST['id'];

           $mime=$_FILES['file']['type'];
           switch ($mime) {
             case 'image/jpeg':
                    $ftype = 'imagecreatefromjpeg';
                    break;
             case 'image/png':
                    $ftype = 'imagecreatefrompng';
                    break;
             default: 
                    throw new Exception('Unknown image type.');
}
            $temp = explode(".", $_FILES["file"]["name"]);
            date_default_timezone_set("Asia/Kolkata");
            $newfilename1='profile_'.time();
            $newfilename = $newfilename1. '.' . end($temp);
            move_uploaded_file($_FILES["file"]["tmp_name"], 'uploads/profile/'. $newfilename);
  //===================image size fix ==============================================================
            $uploadimage =  "uploads/profile/".$newfilename;
            $newname = $newfilename;
           // Set the resize_image name
            $resize_image =  "uploads/profile/".$newname; 
            $actual_image =  "uploads/profile/".$newname;
           // It gets the size of the image
            list( $width,$height ) = getimagesize( $uploadimage );
          // It makes the new image width of 350
            $newwidth = 420;
          // It makes the new image height of 350
            $newheight =420;
          // It loads the images we use jpeg function you can use any function like imagecreatefromjpeg
            $thumb = imagecreatetruecolor( $newwidth, $newheight );
           
            $source = $ftype( $resize_image );
          // Resize the $thumb image.
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
          // It then save the new image to the location specified by $resize_image variable
            imagejpeg( $thumb, $resize_image, 100 ); 
          // 100 Represents the quality of an image you can set and ant number in place of 100.
            $out_image=file_get_contents($resize_image);   
//=================================end image size fix ==================================================
          // print_r($newfilename); //die;

             $this->load->model('register');
             $this->register->profileimage($userid,$newfilename);

            $this->session->set_userdata('user_image', $newfilename);
            
        echo  $newfilename;  

}

public function Passwordreset()
{
   $data = json_decode($_REQUEST['data']);
   $email = $data->email;
              require('class.phpmailer.php');
              $mail = new PHPMailer(true);
              $to=$email;
              $from="info@darkhorsesports.in";
              $from_name="Getsporty";
              $subject="Email varification ";

             // $emailconform="http://staging.getsporty.in/index.php/forms/forgotpassword?email=";
              $emailconform  =  site_url().'/forms/forgotpassword?email=';
              //global $error;
               // create a new object
              $mail->IsSMTP(); // enable SMTP
             // $mail->addReplyTo("reply@yourdomain.com", "Reply");

              $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
              $mail->SMTPAuth = true;  // authentication enabled
              $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
              $mail->Host = 'smtp.gmail.com';
              //$mail->Host = 'smtp.gmail.com';
              $mail->Port = 465; 
              $mail->Username ="info@darkhorsesports.in";  
              $mail->Password = "2016Darkhorse";           
              $mail->SetFrom($from, $from_name);
              $mail->Subject = $subject;
              $mail->Body = '<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="x-apple-disable-message-reformatting">  
  <title></title> 
    <style>
        html,
        body {
          margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
        
        }
        table table table {
            table-layout: auto;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
        *[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
        }
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
        }
        .a6S {
          display: none !important;
          opacity: 0.01 !important;
        }
        img.g-img + div {
          display:none !important;
      }
        .button-link {
            text-decoration: none !important;
        }

       
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { 
            .email-container {
                min-width: 375px !important;
            }
        }

    </style>

    <style>
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }
            .fluid {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            .stack-column-center {
                text-align: center !important;
            }
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
      .email-container p {
        font-size: 17px !important;
        line-height: 22px !important;
      }
        }
    </style>
</head>
<body width="100%" bgcolor="#fff" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; text-align: left;">
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
          <tr>
        <td bgcolor="#5766BE">
          <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="180" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; background: #5766BE; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
        </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 40px 40px 20px;">
                    <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;">Hello</h1>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 10px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">Hi,Greetings! You are just a step away from accessing your getsporty account.Just click on the link below to reset your password.
                    </p>
                </td>
            </tr>
      <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;"><a style="color:#5766BE;" href="'.$emailconform.''.$email.'">Reset Your Password</a></p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">You will need to enter this new password whenever you sign in to your Get Sporty account in future.</p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#000000" align="center" valign="top" style="padding: 10px;">
                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0">
                                   
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="120" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"  style="float: right;padding-right: 10px;display: inline-block;">
                                    
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <ul>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/f.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/go.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/ln.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/t.png"></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                        </tr>

                    </table><hr style="width: 90%;margin-top:0">
                </td>
            </tr>
            <!-- 2 Even Columns : END -->
            


        <!-- Email Footer : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
            <tr>
                <td style="background:#000000;padding: 10px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;" class="x-gmail-data-detectors">
                    <webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">Lorem ipsum dolor sit amet</webversion>
                    <br><br>
                    Company Name<br>consectetur adipiscing elit. In quis fermentum<br>(123) 456-7890
                    <br><br>
                    <unsubscribe style="color:#888888; text-decoration:underline;">unsubscribe</unsubscribe>
                </td>
            </tr>
        </table>
        <!-- Email Footer : END -->

    </center>
</body>
</html>'; 
               $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
               $mail->AltBody = $txt; 
               $mail->AddAddress($to);
               $mail->Send();
          return 1;

}


public function adminPasswordreset()
{
   $data = json_decode($_REQUEST['data']);
   $email = $data->email;
              require('class.phpmailer.php');
              $mail = new PHPMailer(true);
              $to=$email;
              $from="info@darkhorsesports.in";
              $from_name="Getsporty";
              $subject="Email varification ";

             // $emailconform="http://staging.getsporty.in/index.php/forms/forgotpassword?email=";
              $emailconform  =  site_url().'/forms/adminforgotpassword?email=';
              //global $error;
               // create a new object
              $mail->IsSMTP(); // enable SMTP
             // $mail->addReplyTo("reply@yourdomain.com", "Reply");

              $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
              $mail->SMTPAuth = true;  // authentication enabled
              $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
              $mail->Host = 'smtp.gmail.com';
              //$mail->Host = 'smtp.gmail.com';
              $mail->Port = 465; 
              $mail->Username ="info@darkhorsesports.in";  
              $mail->Password = "2016Darkhorse";           
              $mail->SetFrom($from, $from_name);
              $mail->Subject = $subject;
              $mail->Body = '<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="x-apple-disable-message-reformatting">  
  <title></title> 
    <style>
        html,
        body {
          margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
        
        }
        table table table {
            table-layout: auto;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
        *[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
        }
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
        }
        .a6S {
          display: none !important;
          opacity: 0.01 !important;
        }
        img.g-img + div {
          display:none !important;
      }
        .button-link {
            text-decoration: none !important;
        }

       
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { 
            .email-container {
                min-width: 375px !important;
            }
        }

    </style>

    <style>
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }
            .fluid {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            .stack-column-center {
                text-align: center !important;
            }
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
      .email-container p {
        font-size: 17px !important;
        line-height: 22px !important;
      }
        }
    </style>
</head>
<body width="100%" bgcolor="#fff" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; text-align: left;">
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
          <tr>
        <td bgcolor="#5766BE">
          <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="180" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; background: #5766BE; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
        </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 40px 40px 20px;">
                    <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;">Hello</h1>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 10px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">Hi,Greetings! You are just a step away from accessing your getsporty account.Just click on the link below to reset your password.
                    </p>
                </td>
            </tr>
      <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;"><a style="color:#5766BE;" href="'.$emailconform.''.$email.'">Reset Your Password</a></p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">You will need to enter this new password whenever you sign in to your Get Sporty account in future.</p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#000000" align="center" valign="top" style="padding: 10px;">
                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0">
                                   
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="120" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"  style="float: right;padding-right: 10px;display: inline-block;">
                                    
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <ul>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/f.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/go.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/ln.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/t.png"></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                        </tr>

                    </table><hr style="width: 90%;margin-top:0">
                </td>
            </tr>
            <!-- 2 Even Columns : END -->
            


        <!-- Email Footer : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
            <tr>
                <td style="background:#000000;padding: 10px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;" class="x-gmail-data-detectors">
                    <webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">Lorem ipsum dolor sit amet</webversion>
                    <br><br>
                    Company Name<br>consectetur adipiscing elit. In quis fermentum<br>(123) 456-7890
                    <br><br>
                    <unsubscribe style="color:#888888; text-decoration:underline;">unsubscribe</unsubscribe>
                </td>
            </tr>
        </table>
        <!-- Email Footer : END -->

    </center>
</body>
</html>'; 
               $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
               $mail->AltBody = $txt; 
               $mail->AddAddress($to);
               $mail->Send();
          return 1;

}

public function updateadminemail()
{
   $data=json_decode($_REQUEST['data']);
   $email = $data->email;
   $result=$this->register->admin_Emailfind($data->email);
if($result) 
{
   echo "0";
}else
{

             $this->load->model('register');
             $this->register->updateadminemail($data->userid,$data->email);
        
              echo "1";

              require('class.phpmailer.php');
              $mail = new PHPMailer(true);
              $to=$email;
              $from="info@darkhorsesports.in";
              $from_name="Getsporty";
              $subject="Email varification ";
             // $emailconform="http://staging.getsporty.in/index.php/forms/forgotpassword?email=";
              $emailconform  =  site_url().'/forms/adminforgotpassword?email=';
              //global $error;
              $mail = new PHPMailer();  // create a new object
              $mail->IsSMTP(); // enable SMTP
              $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
              $mail->SMTPAuth = true;  // authentication enabled
              $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
              $mail->Host = 'smtp.gmail.com';
              //$mail->Host = 'smtp.gmail.com';
              $mail->Port = 465; 
              $mail->Username ="info@darkhorsesports.in";  
              $mail->Password = "2016Darkhorse";           
              $mail->SetFrom($from, $from_name);
              $mail->Subject = $subject;
              $mail->Body = '<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="x-apple-disable-message-reformatting">  
  <title></title> 
    <style>
        html,
        body {
          margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
        
        }
        table table table {
            table-layout: auto;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
        *[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
        }
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
        }
        .a6S {
          display: none !important;
          opacity: 0.01 !important;
        }
        img.g-img + div {
          display:none !important;
      }
        .button-link {
            text-decoration: none !important;
        }

       
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { 
            .email-container {
                min-width: 375px !important;
            }
        }

    </style>

    <style>
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }
            .fluid {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            .stack-column-center {
                text-align: center !important;
            }
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
      .email-container p {
        font-size: 17px !important;
        line-height: 22px !important;
      }
        }
    </style>
</head>
<body width="100%" bgcolor="#fff" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; text-align: left;">
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
          <tr>
        <td bgcolor="#5766BE">
          <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="180" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; background: #5766BE; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
        </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 40px 40px 20px;">
                    <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;">Hello</h1>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 10px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">Hi,Greetings! You are just a step away from accessing your getsporty account.Just click on the link below to reset your password.
                    </p>
                </td>
            </tr>
      <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;"><a style="color:#5766BE;" href="'.$emailconform.''.$email.'">Reset Your Password</a></p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">You will need to enter this new password whenever you sign in to your Get Sporty account in future.</p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#000000" align="center" valign="top" style="padding: 10px;">
                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0">
                                   
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="120" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"  style="float: right;padding-right: 10px;display: inline-block;">
                                    
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <ul>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/f.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/go.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/ln.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/t.png"></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                        </tr>

                    </table><hr style="width: 90%;margin-top:0">
                </td>
            </tr>
            <!-- 2 Even Columns : END -->
        <!-- Email Footer : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
            <tr>
                <td style="background:#000000;padding: 10px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;" class="x-gmail-data-detectors">
                    <webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">Lorem ipsum dolor sit amet</webversion>
                    <br><br>
                    Company Name<br>consectetur adipiscing elit. In quis fermentum<br>(123) 456-7890
                    <br><br>
                    <unsubscribe style="color:#888888; text-decoration:underline;">unsubscribe</unsubscribe>
                </td>
            </tr>
        </table>
        <!-- Email Footer : END -->

    </center>
</body>
</html>'; 
               $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
               $mail->AltBody = $txt; 
               $mail->AddAddress($to);
               $mail->Send();

              




}

}

public function updateemail()
{
   $data=json_decode($_REQUEST['data']);
   $email = $data->email;
   $result=$this->register->Emailfind($data->email);
if($result) 
{
   echo "0";
}else
{
              require('class.phpmailer.php');
              $mail = new PHPMailer(true);
              $to=$email;
              $from="info@darkhorsesports.in";
              $from_name="Getsporty";
              $subject="Email varification ";
             // $emailconform="http://staging.getsporty.in/index.php/forms/forgotpassword?email=";
              $emailconform  =  site_url().'/forms/forgotpassword?email=';
              //global $error;
              $mail = new PHPMailer();  // create a new object
              $mail->IsSMTP(); // enable SMTP
              $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
              $mail->SMTPAuth = true;  // authentication enabled
              $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
              $mail->Host = 'smtp.gmail.com';
              //$mail->Host = 'smtp.gmail.com';
              $mail->Port = 465; 
              $mail->Username ="info@darkhorsesports.in";  
              $mail->Password = "2016Darkhorse";           
              $mail->SetFrom($from, $from_name);
              $mail->Subject = $subject;
              $mail->Body = '<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="x-apple-disable-message-reformatting">  
  <title></title> 
    <style>
        html,
        body {
          margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
        
        }
        table table table {
            table-layout: auto;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
        *[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
        }
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
        }
        .a6S {
          display: none !important;
          opacity: 0.01 !important;
        }
        img.g-img + div {
          display:none !important;
      }
        .button-link {
            text-decoration: none !important;
        }

       
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { 
            .email-container {
                min-width: 375px !important;
            }
        }

    </style>

    <style>
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }
            .fluid {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            .stack-column-center {
                text-align: center !important;
            }
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
      .email-container p {
        font-size: 17px !important;
        line-height: 22px !important;
      }
        }
    </style>
</head>
<body width="100%" bgcolor="#fff" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; text-align: left;">
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
          <tr>
        <td bgcolor="#5766BE">
          <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="180" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; background: #5766BE; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
        </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 40px 40px 20px;">
                    <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;">Hello</h1>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 10px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">Hi,Greetings! You are just a step away from accessing your getsporty account.Just click on the link below to reset your password.
                    </p>
                </td>
            </tr>
      <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;"><a style="color:#5766BE;" href="'.$emailconform.''.$email.'">Reset Your Password</a></p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">You will need to enter this new password whenever you sign in to your Get Sporty account in future.</p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#000000" align="center" valign="top" style="padding: 10px;">
                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0">
                                   
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="120" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"  style="float: right;padding-right: 10px;display: inline-block;">
                                    
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <ul>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/f.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/go.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/ln.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/t.png"></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                        </tr>

                    </table><hr style="width: 90%;margin-top:0">
                </td>
            </tr>
            <!-- 2 Even Columns : END -->
            


        <!-- Email Footer : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
            <tr>
                <td style="background:#000000;padding: 10px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;" class="x-gmail-data-detectors">
                    <webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">Lorem ipsum dolor sit amet</webversion>
                    <br><br>
                    Company Name<br>consectetur adipiscing elit. In quis fermentum<br>(123) 456-7890
                    <br><br>
                    <unsubscribe style="color:#888888; text-decoration:underline;">unsubscribe</unsubscribe>
                </td>
            </tr>
        </table>
        <!-- Email Footer : END -->

    </center>
</body>
</html>'; 
               $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
               $mail->AltBody = $txt; 
               $mail->AddAddress($to);
               $mail->Send();

              $this->load->model('register');
              $this->register->updateemail($data->userid,$data->email);
        
              echo "1";




}

}

public function createquestion()
{
  
   $data['middle'] = 'Performance/createquestion';
   $this->load->view('templates/template' , $data);

}

public function getquestion()
{
     $data['middle'] = 'Performance/viewquestion';
     $this->load->view('templates/template' , $data);

}

public function viewanalytics()
{
  $data['middle'] = 'Performance/viewanalytics';
  $this->load->view('templates/template',$data);
}

public function createanalytics()
{
	$data['middle'] = 'Performance/createanalytics';
	$this->load->view('templates/template',$data);
}
   
public function savequestion()
{

  $item = new stdClass();

  $item->id                = $_POST['id'];
  $item->userid            = $_POST['userid'];
  $item->question          = $_POST['question'];
  $item->age_group         = $_POST['age_group'];
  $item->gender            = $_POST['gender'];
  $item->sport             = $_POST['sport'];
  $item->proffession       = $_POST['proffession'];   
  $item->publish           = 0;  

  $this->load->model('register');
  $res = $this->register->savequestion($item);   
   if($res)
   {
      echo "1";
   }
   else
   {
      echo "0";
   }
   //print_r($res);
}


public function analyticsdata()
{

   $this->load->model('register');
   $result = $this->register->searchanalytics($_POST['id']); 

   $data = array('gender' => $result[0]['gender'] , 'age_group' => $result[0]['age_group'] , 'sport' =>$result[0]['sport'],'section'=> $result[0]['section']);

    echo json_encode($data);
}

public function saveanalytics()
{
	 //die;
    $analytics = implode(",",$_POST['section']);

    //print_r($_POST);


     $item = new stdClass(); 
    
     $item->id         = $_POST['id'];
     $item->sport      = $_POST['sport'];
     $item->section    = mysql_real_escape_string($analytics);
     $item->gender     = $_POST['gender'];
     $item->agegroup   = $_POST['agegroup'];

     $this->load->model('register');

    $temp = $this->register->searchanalytics($item->id);
    if($temp)
    {
       //print_r($temp);
        echo  "2";
    }
    else
    {
     $res = $this->register->saveanalytics($item);
     if($res)
     {
     	echo "1";
     }
     else
     {
     	echo "0";
     }
 }
}

public function Statusquestion()
{
$data2 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 

$item->id                    = $data2->id;
$item->publish               = $data2->publish;

$this->load->model('register');
$res = $this->register->Statusquestion($item);
if($data2->publish==1)
{    
  //$jdata=$this->register->getContentInfo($data2->id);
  //  print_r($jdata);
  //$this->register->addContentData($jdata);
}
else{
  //$this->register->deletePublishContent($data2->id);

}
}
public function editquestion($str)
{
    $id = $this->stringtonumber($str);
    $data['middle'] = 'Performance/editquestion';
    $data['required'] = array(
                  'id'=>$id 
                 );
    $this->load->view('templates/template',$data);
}


public function editanalytics($str)
{
   $id = $this->stringtonumber($str);
   $data['middle'] = 'Performance/editanalytics';
   $data['required'] =  array('id' => $id);
   $this->load->view('templates/template',$data);
   
}

public function searchsection()
{
	$data = json_decode($_REQUEST['data']);
    $this->load->model('register');
    $res =  $this->register->searchsection($data->id);
    
    //print_r();

    if($res)
    {
        $section = explode(',', $res[0]['section']);	
        echo json_encode($section);
    }else
     {    
     	$section = 0;
	    echo json_encode($section);
     }
}

public function searchagegroup()
{

	    $data = json_decode($_REQUEST['data']);
        $this->load->model('register');
        $res =  $this->register->getstate($data->gender);
        echo json_encode($res);
}

public function update_analytics()
{
$analytics = implode(",",$_POST['section']);
$item = new stdClass();

$item->id        = $_POST['id'];
$item->section   = $analytics;

$this->load->model('register');
$res = $this->register->update_analytics($item->id, $item->section);
if($res == 1)
{
echo "1";
}
else
{
echo "0";
}
}

public function viewquestions($str)
{
    $id = $this->stringtonumber($str);
    $data['middle'] = 'Performance/displayquestions';
    $data['required'] =  array('id' => $id);
    $this->load->view('templates/template' , $data);
}

public function updatequestion()
{
  // print_r($_POST);die;

  $item = new stdClass();

  $item->id                = $_POST['id'];
  $item->question          = $_POST['question'];
 

  $this->load->model('register');
  $res = $this->register->updatequestion($item);   
   if($res)
   {
      echo "1";
   }
   else
   {
      echo "0";
   }
   //print_r($res);
}


public function getQuestions_data()
{
    // print_r($_POST['id']);
	  $this->load->model('register');
	  $quest = $this->register->getQuestions($_POST['id']); 
	  echo json_encode($quest[0]);
}

public function  new_registration()
{
	$this->load->view('member_user_registration');
}

public function user_register()
{
  $data = json_decode($_REQUEST['data']);
  
 // print_r($_REQUEST['data']);die;


  $item = new stdClass();
  
  $item->userType        = 103;
  $item->name            = $data->name;
  $item->email           = $data->email;
  $item->phone_no        = $data->phone_no;
  $item->forget_code     = mt_rand(1000,10000);
  $item->dob             = $data->dob;
  $item->sport           = $data->sport;
  $item->prof_name       = $data->prof_name;
  $item->prof_id         = $data->prof_id;
  $item->gender          = $data->gender;
  $item->access_module   = "1,2,3";


  $this->load->model('register');
 
  $emailid = $this->register->Emailfind($data->email);
  if($emailid)
  {
       $pass = $this->register->passwordfind($data->email);   
         if($pass)
          {

          	  $this->sendmail($data->email);
              echo json_encode(array('data' =>4 ,'message' =>'You are already register with us. Please Activate your acount with mail !'));

           }
           else 
           {
             echo json_encode(array('data' =>3 ,'message' =>'User is already register please loging'));    
           }

  }
  else
  {
      $res = $this->register->user_register($item);
      if($res)
      {  

      	// $this->sendmail($data->email);
         echo json_encode(array('data' =>$res , 'message' =>'User register Sucessfull'));
      }
      else
      {
       echo json_encode(array('data' => 0,'message' => 'Sorry resgistration in not done' ));
      }

  }

}


public function sendmail($email)
{
	            require('class.phpmailer.php');
              $mail = new PHPMailer(true);
              $to=$email;
              $from="info@darkhorsesports.in";
              $from_name="Getsporty";
              $subject="Email varification ";

             // $emailconform="http://staging.getsporty.in/index.php/forms/forgotpassword?email=";
              $emailconform  =  site_url().'/forms/forgotpassword?email=';
              //global $error;
               // create a new object
              $mail->IsSMTP(); // enable SMTP
              $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
              $mail->SMTPAuth = true;  // authentication enabled
              $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
              $mail->Host = 'smtp.gmail.com';
              //$mail->Host = 'smtp.gmail.com';
              $mail->Port = 465; 
              $mail->Username ="info@darkhorsesports.in";  
              $mail->Password = "2016Darkhorse";           
              $mail->SetFrom($from, $from_name);
              $mail->Subject = $subject;
              $mail->Body = '<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="x-apple-disable-message-reformatting">  
  <title></title> 
    <style>
        html,
        body {
          margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
        
        }
        table table table {
            table-layout: auto;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
        *[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
        }
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
        }
        .a6S {
          display: none !important;
          opacity: 0.01 !important;
        }
        img.g-img + div {
          display:none !important;
      }
        .button-link {
            text-decoration: none !important;
        }

       
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { 
            .email-container {
                min-width: 375px !important;
            }
        }
    </style>
    <style>
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }
            .fluid {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            .stack-column-center {
                text-align: center !important;
            }
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
      .email-container p {
        font-size: 17px !important;
        line-height: 22px !important;
      }
        }
    </style>
</head>
<body width="100%" bgcolor="#fff" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; text-align: left;">
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
          <tr>
        <td bgcolor="#5766BE">
          <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="180" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; background: #5766BE; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
        </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 40px 40px 20px;">
                    <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;">Hello</h1>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 10px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">Hi,Greetings! You are just a step away from accessing your getsporty account.Just click on the link below to reset your password.
                    </p>
                </td>
            </tr>
      <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;"><a style="color:#5766BE;" href="'.$emailconform.''.$email.'">Reset Your Password</a></p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                    <p style="margin: 0;">You will need to enter this new password whenever you sign in to your Get Sporty account in future.</p>
                </td>
            </tr>
            <tr>
                <td bgcolor="#000000" align="center" valign="top" style="padding: 10px;">
                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0">
                                   
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <img src="http://getsporty.in/emailimages/logo.png" aria-hidden="true" width="120" height="" alt="alt_text" border="0" align="center" style="margin:0 0 0 15px;height: auto; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                            <!-- Column : BEGIN -->
                            <td class="stack-column-center">
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"  style="float: right;padding-right: 10px;display: inline-block;">
                                    
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <ul>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/f.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/go.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/ln.png"></a></li>
                                                <li style="list-style:none;display:inline-block;"><a href=""><img style="width:30px" src="http://getsporty.in/emailimages/t.png"></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                        </tr>

                    </table><hr style="width: 90%;margin-top:0">
                </td>
            </tr>
            <!-- 2 Even Columns : END -->
            


        <!-- Email Footer : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
            <tr>
                <td style="background:#000000;padding: 10px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;" class="x-gmail-data-detectors">
                    <webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">Lorem ipsum dolor sit amet</webversion>
                    <br><br>
                    Company Name<br>consectetur adipiscing elit. In quis fermentum<br>(123) 456-7890
                    <br><br>
                    <unsubscribe style="color:#888888; text-decoration:underline;">unsubscribe</unsubscribe>
                </td>
            </tr>
        </table>
        <!-- Email Footer : END -->

    </center>
</body>
</html>'; 
               $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
               $mail->AltBody = $txt; 
               $mail->AddAddress($to);
               $mail->Send();
          return 1;
}


public function test()
{
     $data['middle'] = 'Performance/index';
     $this->load->view('templates/template' , $data);
}

public function createguidelines()
{
     $data['middle'] = 'Performance/createguidelines';
     $this->load->view('templates/template',$data);
}
public function performanceguide()
{
     $item = new stdClass();
     $item->id          = $_POST['id'];
     $item->userid      = $_POST['userid'];
     $item->guidelines  = $_POST['guidelines'];
     $item->age_group   = $_POST['age_group'];
     $item->sport       = $_POST['sport'];
     $item->gender      = $_POST['gender'];

     $this->load->model('register');
     $res =  $this->register->performanceguide($item);
     if($res)
     {
      echo "1";
     }
     else {
       echo "0";
          }
}
public function listguidelines()
{
   $data['middle'] = 'Performance/listguidelines';
   $this->load->view('templates/template',$data);
}
public function editguidelines($str)
{
  $id = $this->stringtonumber($str);
  $data['middle'] = 'Performance/editguidelines';
  $data['required'] =  array('id' => $id);
  $this->load->view('templates/template',$data);
}

public function Statusperformanceguidelines()
{
$data2 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 

$item->id                    = $data2->id;
$item->publish               = $data2->publish;

$this->load->model('register');
$res = $this->register->Statusperformanceguidelines($item);
if($data2->publish==1)
{    
  //$jdata=$this->register->getContentInfo($data2->id);
  //  print_r($jdata);
  //$this->register->addContentData($jdata);
}
else{
  //$this->register->deletePublishContent($data2->id);
}
}

public function eventbugmail()
{
     $this->load->model('register');
     $useremail =  $this->register->getuseremail($_POST['userid']);
     if(!$useremail)
     {
     }
     else
     {
      $email = $useremail[0]['email'];
      $name  = $useremail[0]['name'];
      $subject="Event Bug List";
      $this->bugemail($email,$_POST['buglist'],$subject ,$name);
     }
}
public function bugemail($email,$buglist,$subject,$name)
{          

              $html ="";
              $buglist = json_decode($buglist);
              $i =1;
              foreach ($buglist as $key => $value) {

               $html .=  '<p class="setting"><span><b>'.$i.' :  </b>'.$value.'</span></p>';
               $i = $i+1;
              }
               $data =  file_get_contents("assets/emailtemplate/forgotpassword.php"); 
             require('class.phpmailer.php');
              $mail = new PHPMailer(true);
              $to=$email;
              $from="info@darkhorsesports.in";
              $from_name="Getsporty";
              $subject=$subject;
              $mail->IsSMTP(); // enable SMTP
              $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
              $mail->SMTPAuth = true;  // authentication enabled
              $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
              $mail->Host = 'smtp.gmail.com';
              $mail->Port = 465; 
              $mail->Username ="info@darkhorsesports.in";  
              $mail->Password = "2016Darkhorse";           
              $mail->SetFrom($from, $from_name);
              $mail->Subject = $subject;
              $mail->Body =  $data;
               $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
               $mail->AltBody = $txt; 
               $mail->AddAddress($to);
               $mail->Send();
             
             print_r($data);
              echo "1";
}

public function job()
{
  $this->load->model('register');
  $job = $this->register->user_dashboard_job(58);
  $event = $this->register->user_dashboard_tournamnet(58);
  $tournament = $this->register->user_dashboard_tournamnet(58);
  
  $res = array("job" =>$job , "event" => $event , "tournament" => $tournament);

  echo  json_encode($res);

}

public function angulartest()
{            

         // print_r($_REQUEST);die;
	      $username       =  $_REQUEST['email'];
		  $password       =  md5($_REQUEST['password']); 
		  
         $this->load->model('register');
         $res = $this->register->angulartest($username, $password);
         
          $data = array("data" =>$res);		 
		 
         echo json_encode($res);
}

public function contentangular()
{
	$this->load->model('register');
	$res= $this->register->getContentInfo();
    echo json_encode($res); 
}


public function Registration_userdata()
{

$data2 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 

//print_r($data2);die;

$item->id                    = $data2->id;
$item->userdata              = $data2->userdata;
$item->prof_id               = 1;

$this->load->model('register');
$res = $this->register->Registration_userdata($item);

if($res)
{
    echo $res; 

}
else
{
    echo $res;
}

}


public function editRegistrationData()
{
   

}

}
  