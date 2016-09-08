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
 public function login()
    {

      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $this->load->model('register');
      $res = $this->register->login($username, $password); 
      if($res != 0)
      {
      	$this->session->set_userdata('item',$res);
         $sessdata = $this->session->userdata('item');
         redirect('forms/home');
      }
      else
      { $res = array();
      	$res['message'] ='Invalid login credentials';
      	echo json_encode($res);
      }
    }
    public function home()
    {
    $data['middle'] = 'dashboard';
    $this->load->view('templates/template',$data);
    }
    public function CreateEvent()
	{
		
	    $data['middle'] = 'event/CreateEvent';

		$this->load->view('templates/template',$data);
    }
	public function CreateJob()
	{
     $data['middle'] = 'job/CreateJob';
	 $this->load->view('templates/template',$data);
	}
public function CreateTournament()
	{
	$data['middle'] = 'tournament/CreateTournament';
    $this->load->view('templates/template',$data);	
	}


public function event()
{

$data1 = json_decode($_REQUEST[ 'data' ]);
$item = new stdClass();
// echo ($data1->start_date); exit;
//strtotime()
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
$item->start_date         = @strtotime($data1->start_date);//strtotime();
$item->end_date           = @strtotime($data1->end_date);//strtotime($data1['end_date']);
$item->sport              = $data1->sport;
$item->entry_start_date   = @strtotime($data1->entry_start_date);//strtotime($data1['entry_start_date']);
$item->entry_end_date     = @strtotime($data1->entry_end_date);//strtotime($data1['entry_end_date']);
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

// public function imageupload()
// {   
// 	//$name =  $_POST['imagena'];
// 	$file = $_FILES['eventImage'];
// 	$temp_name = $file['tmp_name'];
// 	$location = base_url('assets/uploads/');
// move_uploaded_file($temp_name, $location);
// echo $location;
// }

public function saveTournament()
{

$data1 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 

$item->id                      = $data1->id;
$item->organizer_name          = $data1->organizer_name;
$item->tournament_level        = $data1->tournament_level;
$item->tournament_category        = $data1->catagory;
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
$item->start_date              = @strtotime($data1->start_date);//$data1['start_date'];
$item->end_date                = @strtotime($data1->end_date);//$data1['end_date'];
$item->entry_start_date        = @strtotime($data1->entry_start_date);//$data1['entry_start_date'];
$item->entry_end_date          = @strtotime($data1->entry_end_date);//$data1['entry_end_date'];
$item->file_name               = $data1->file_name;
$item->sport                   = $data1->sport;

$this->load->model('register');
$res = $this->register->saveTournament($item);
if($res == '1')
 {

 echo "Tournament Created";

 }
else
 echo "Tournament Not created";
}

public function saveJob()
{

$data1 = json_decode($_REQUEST['data']);
$item  = new stdClass(); 


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
	public function getStateByCity()
	{
		$key = $_POST['key'];
		$results = $this->register->getStateByKey($key);
		echo  json_encode($results);
	}
	
	public function getJob(){
		$data['middle'] = 'job/index';

		$this->load->view('templates/template',$data);
	}
	
	public function viewJob($id){
		$data['middle'] = 'job/view';
		$data['required'] = array(
									'id'=>$id	
								 );

		$this->load->view('templates/template',$data);
	}
	
	public function getEvent(){
		$data['middle'] = 'event/index';

		$this->load->view('templates/template',$data);
	}
	
	public function viewEvent($id){
		$data['middle'] = 'event/view';
		$data['required'] = array(
									'id'=>$id	
								 );

		$this->load->view('templates/template',$data);
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
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */