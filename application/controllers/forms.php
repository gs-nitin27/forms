<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Forms extends CI_Controller {

public function __construct() {
        parent::__construct();
		$this->load->model('register');
		$this->load->library('session');	
    }
  
public function index()
{   
   $this->load->view('login');
}

public function home()
{
        $data['middle'] = 'dashboard';
        $this->load->view('templates/template',$data);
}

 public function gmaillogin()
 {
    $data=json_decode($_REQUEST['data']);
    $username=$data->email;
    $password=md5($data->email);
   // echo $username ."  ".$password;
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
//======================User ======================================

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
	      $data['required'] = array(
									'id'=>$id	
								 );
        $data['middle'] = 'userModule/public_userProfile';
		    $this->load->view('templates/template',$data);
}

public function saveuserModule()
{
$data = json_decode($_REQUEST['data']);
 foreach ($data as  $value) 
 {
 	if($value!=$data->id)
         $res[]=$value; 
 }
$commaList = implode(',',$res);
$this->load->model('register');
$res = $this->register->update_userModule($data->id,$commaList);
if($res == 1)
{
echo "Module Created";
}
else
{
echo "Module Creation Not Saved";
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
     //die;
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
	echo "Profile  Updated";
	//$this->varifyemail();
}
else {
	echo "Profile Not Updated";
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
else{
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

public function userprofile($str)
 { 
      $id = $this->stringtonumber($str);
 	    $data['middle'] = 'userModule/UserProfile';
		  $data['required'] = array(
									'id'=>$id	
								 );
		$this->load->view('templates/template',$data);
}


//======================== End User =========================


// ============================== Start Event==============================    
public function CreateEvent()
	{
		
	    $data['middle'] = 'event/CreateEvent';

		$this->load->view('templates/template',$data);
    }
  
  public function event()
{
$data1 = json_decode($_REQUEST[ 'data' ]);
$item = new stdClass();
// echo ($data1->start_date); exit;

$item->id                 = $data1->id;
$item->userid             = $data1->userid;
$item->type               = $data1->type;
$item->name               = $data1->name;
$item->address1           = $data1->address_line1;
$item->address2           = $data1->address_line2;
$item->city               = $data1->city;
$item->pin                = $data1->pin;
$item->description        = $data1->description;
$item->eligibility1       = $data1->eligibility1;
$item->eligibility2       = $data1->eligibility2;
$item->state              = $data1->state;
$item->tandc1             = $data1->terms_and_conditions1;
$item->tandc2             = $data1->terms_and_conditions2;
$item->organizer_name     = $data1->organizer_name;
$item->mobile             = $data1->mobile;
$item->org_address1       = $data1->organizer_address_line1;
$item->org_address2       = $data1->organizer_address_line2;
$item->organizer_city     = $data1->organizer_city;
$item->organizer_pin      = $data1->organizer_pin;
$item->organizer_state    = $data1->organizer_state;
$item->event_links        = $data1->event_links;
$item->start_date         = $data1->start_date;//strtotime();
$item->end_date           = $data1->end_date;//strtotime($data1['end_date']);
$item->sport              = $data1->sport;
$item->entry_start_date   = $data1->entry_start_date;//strtotime($data1['entry_start_date']);
$item->entry_end_date     = $data1->entry_end_date;//strtotime($data1['entry_end_date']);
$item->file_name          = $data1->file_name;
$item->email_app_collection     = $data1->email_app_collection;

$this->load->model('register');
$res = $this->register->saveEvent($item);

if($res == '1')
 {

 echo "Event Created";

 }
else
 echo "Event Not created";

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
	//$edata=$this->register->getEventInfo($data2->id);
 	//$this->register->addEventData($edata);
}
else{
//	$this->register->deletePublishEvent($data2->id);
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
$data1 = json_decode($_REQUEST['data']);

$item  = new stdClass(); 

//print_r($data1);die;

$item->id                    = $data1->id;
$item->userid                = $data1->userid;
$item->title                 = $data1->title;
$item->type                  = $data1->type;
$item->sports                = $data1->sports;
$item->gender                = $data1->gender;
$item->work_exp              = $data1->work_experience;
$item->desc                  = $data1->description;
$item->desiredskill          = $data1->desired_skills;
$item->qualification         = $data1->qualification;
$item->keyreq                = $data1->key_requirement;
$item->org_address1          = $data1->org_address1;
$item->org_address2          = $data1->org_address2;
$item->org_city              = $data1->org_city;
$item->org_state             = @$data1->org_state;
$item->org_pin               = $data1->org_pin;
$item->org_name              = $data1->organisation_name;
$item->about                 = $data1->about;
$item->address1              = $data1->address_line1; 
$item->address2              = $data1->address_line1; 
$item->state                 = $data1->state;
$item->city                  = $data1->city;
$item->pin                   = $data1->pin;  
$item->contact               = $data1->contact;
$item->image                 = $data1->image;
$item->email                 = $data1->email_app_collection;
//print_r($item);die();
$this->load->model('register');
$res = $this->register->create_job($item);
if($res == 1)
{
echo "Job Created";
}
else
{
echo "Job has not been saved";
}
}

public function getJob()
{
		$data['middle'] = 'job/index';
		$this->load->view('templates/template',$data);
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
          //$data['noheader'] = true;
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

  //  print_r($jdata);
	//$this->register->addJobData($jdata);
}
else{
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
//==================== End Job=================================================

//============================= Start Tournament===============================
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

//print_r($item);//die;
 
$this->load->model('register');
$res = $this->register->saveTournament($item);
if($res == '1')
 {
 echo "Tournament Created";
 }
else
 echo "Tournament Not created";
}


public function getTournament(){
		$data['middle'] = 'tournament/index';

		$this->load->view('templates/template',$data);
	}
public function viewTournament($id){
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
else{
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
{//die();
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
$item->url                   = $_REQUEST['url'];//$data2->url;
$item->status                = $_REQUEST['status'];//$data2->status;
$item->summary               = $_REQUEST['summary'];//mysql_real_escape_string($data2->summary);
$item->keyword               = $_REQUEST['keyword'];//$data2->keyword;
$item->description           = mysql_real_escape_string($_REQUEST['description']);//mysql_real_escape_string($data2->description);
$item->topic_of_artical      = $_REQUEST['topic_of_artical'];//$data2->topic_of_artical;
$item->sport                 = $_REQUEST['sport'];//$data2->sport;
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
$res = $this->register->saveResources($item);
echo json_encode(array('response' => $res));
}

public function deleteResources($str)
{
	      $id = $this->stringtonumber($str);
        $this->register->deleteResources($id);
        $data['middle'] = 'resources/index';
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
	//$rdata=$this->register->getResourceInfo($data2->id);
	//$this->register->addResourcesData($rdata);
	echo "Resources Is Activate";
}
else{
	echo "Resources Is Deactivate";
	//$this->register->deleteStatusResources($data2->id);
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
echo "Content Created";
}
else
{
echo "Content has not been saved";
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

public function varifyemail()
{

//  die;
$data=json_decode($_REQUEST['data']);
$name=$data->name;
$pass=md5($data->password);
$this->load->model('register');
$result=$this->register->Emailfind($data->email);

if($result)
{
	echo '1';
    //echo json_encode(array('response' => '1'));
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
$item->profile_status             =@$data->profile_status;
$item->prof_language              =@$data->prof_language;
$item->other_skill_name           =@$data->other_skill_name;
$item->other_skill_detail         =@$data->other_skill_detail;
$item->age_catered                =@$data->age_catered;
$item->device_id                  =@$data->device_id;
$item->about_me                   =@$data->about_me;

//$this->load->model('register');
$res= $this->register->updateProfile($item);
if($res)
{  
    $email = $data->email;
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
              $mail->Body = '<div style="font-family:HelveticaNeue-Light,Arial,sans-serif;background-color:#5666be;">

 <table align="center" border="4" cellpadding="4" cellspacing="3" style="max-width:440px" width="100%" class="" >
<tbody><tr>
<td align="center" valign="top">
<table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff;  border-bottom:2px solid #e5e5e5;border-radius:4px" width="100%">
<tbody><tr>

<td align="center" style="padding-right:20px;padding-left:20px" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td align="left" valign="top" style="padding-top:40px;padding-bottom:30px">
</td>
</tr>
<tr>
<td style="padding-bottom:20px" valign="top">
<h1 style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:28px;font-style:normal;font-weight:600;line-height:36px;letter-spacing:normal;margin:0;padding:0;text-align:left">Welcome To GetSporty.</h1>
</td>
</tr>
<tr>
<td style="padding-bottom:20px" valign="top">
<p style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left">To set Your email password, you MUST click the link below.<br><h2></br> <a href="'.$emailconform.''.$email.'">create password<br>
<p style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left"><br>Note:- If clicking the link does not work, you can copy and paste the link into your browser address window,or retype it there.<br><br><br><br><br>Thanks you for visiting</p></br><p>GetSporty Team</p> 

</td>
</tr>
<tr>
<td align="center" style="padding-bottom:60px" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td align="center" valign="middle">
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</div>'; 
               $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
               $mail->AltBody = $txt; 
               $mail->AddAddress($to);
               $mail->Send();
			   
			   echo '2';
         
}
else{
     return '3';
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

 //print_r($res['userType']);die;
      
  if($res)
  {
     if($res['userType'] == 101 || $res['userType'] == 102 || $res['userType'] == 103 )
     {
//print_r($emailid);die;
  //$emailid1 = $res['email'];
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
              $mail->Body = '<div style="font-family:HelveticaNeue-Light,Arial,sans-serif;background-color:#5666be;">

 <table align="center" border="4" cellpadding="4" cellspacing="3" style="max-width:440px" width="100%" class="" >
<tbody><tr>
<td align="center" valign="top">
<table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff;  border-bottom:2px solid #e5e5e5;border-radius:4px" width="100%">
<tbody><tr>

<td align="center" style="padding-right:20px;padding-left:20px" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td align="left" valign="top" style="padding-top:40px;padding-bottom:30px">
</td>
</tr>
<tr>
<td style="padding-bottom:20px" valign="top">
<h1 style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:28px;font-style:normal;font-weight:600;line-height:36px;letter-spacing:normal;margin:0;padding:0;text-align:left">Please reset your password.</h1>
</td>
</tr>
<tr>
<td style="padding-bottom:20px" valign="top">
<p style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left">To reset Your email password, you MUST click the link below.<strong><br><h1> Click here </br> <a href="'.$emailconform.''.$email.'">Reset<br></strong>
<p style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left"><br>Note:- If clicking the link does not work, you can copy and paste the link into your browser address window,or retype it there.<br><br><br><br><br>Thanks you for visiting</p></br><p>GetSporty Team</p> 

</td>
</tr>
<tr>
<td align="center" style="padding-bottom:60px" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td align="center" valign="middle">
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</div>'; 
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
 {     
  $newpath=$_POST['path'];

 // print_r($_FILES["file"]["name"]) ;//die;

     switch ($newpath) {
      case 'uploads/resources/':
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
      case 'uploads/job/':
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
            $newfilename1='res_'.time();
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
          // print_r($newfilename); //die;
        echo  $newfilename;  
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
   $id=$data['userid'];
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
              $mail = new PHPMailer();
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
              $mail->Body = '<div style="font-family:HelveticaNeue-Light,Arial,sans-serif;background-color:#5666be;">

 <table align="center" border="4" cellpadding="4" cellspacing="3" style="max-width:440px" width="100%" class="" >
<tbody><tr>
<td align="center" valign="top">
<table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff;  border-bottom:2px solid #e5e5e5;border-radius:4px" width="100%">
<tbody><tr>

<td align="center" style="padding-right:20px;padding-left:20px" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td align="left" valign="top" style="padding-top:40px;padding-bottom:30px">
</td>
</tr>
<tr>
<td style="padding-bottom:20px" valign="top">
<h1 style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:28px;font-style:normal;font-weight:600;line-height:36px;letter-spacing:normal;margin:0;padding:0;text-align:left">Please reset your password.</h1>
</td>
</tr>
<tr>
<td style="padding-bottom:20px" valign="top">
<p style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left">To reset Your email password, you MUST click the link below.<strong><br><h1> Click here </br> <a href="'.$emailconform.''.$email.'">Reset<br></strong>
<p style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left"><br>Note:- If clicking the link does not work, you can copy and paste the link into your browser address window,or retype it there.<br><br><br><br><br>Thanks you for visiting</p></br><p>GetSporty Team</p> 

</td>
</tr>
<tr>
<td align="center" style="padding-bottom:60px" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td align="center" valign="middle">
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</div>'; 
               $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
               $mail->AltBody = $txt; 
               $mail->AddAddress($to);
               $mail->Send();
          return 1;

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
              $mail = new PHPMailer();
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
              $mail->Body = '<div style="font-family:HelveticaNeue-Light,Arial,sans-serif;background-color:#5666be;">

 <table align="center" border="4" cellpadding="4" cellspacing="3" style="max-width:440px" width="100%" class="" >
<tbody><tr>
<td align="center" valign="top">
<table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff;  border-bottom:2px solid #e5e5e5;border-radius:4px" width="100%">
<tbody><tr>

<td align="center" style="padding-right:20px;padding-left:20px" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td align="left" valign="top" style="padding-top:40px;padding-bottom:30px">
</td>
</tr>
<tr>
<td style="padding-bottom:20px" valign="top">
<h1 style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:28px;font-style:normal;font-weight:600;line-height:36px;letter-spacing:normal;margin:0;padding:0;text-align:left">Please reset your password.</h1>
</td>
</tr>
<tr>
<td style="padding-bottom:20px" valign="top">
<p style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left">To reset Your email password, you MUST click the link below.<strong><br><h1> Click here </br> <a href="'.$emailconform.''.$email.'">Reset<br></strong>
<p style="color:#5666be;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left"><br>Note:- If clicking the link does not work, you can copy and paste the link into your browser address window,or retype it there.<br><br><br><br><br>Thanks you for visiting</p></br><p>GetSporty Team</p> 

</td>
</tr>
<tr>
<td align="center" style="padding-bottom:60px" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td align="center" valign="middle">
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</div>'; 
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
   
public function savequestion()
{
  //$data = json_decode($_POST['data']);

 // print_r($_POST); die;

  $item = new stdClass();

  $item->id                = $_POST['id'];
  $item->userid            = $_POST['userid'];
  $item->question          = $_POST['question'];
  $item->age_group         = $_POST['age_group'];
  $item->gender            = $_POST['gender'];
  $item->level             = $_POST['level'];
  $item->proffession       = $_POST['proffession'];   
  $item->publish           = 0;  

  $this->load->model('register');
  $res = $this->register->savequestion($item);
   
   if($res)
   {
      echo 1;
   }
   else
   {
     echo 0;
   }
   //print_r($res);
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

}
  