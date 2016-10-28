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
      	echo $res['message'] ='Invalid login credentials';
      	$this->index();
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
        $data['noheader'] = true;
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
	
	public function getResources(){
		
		$data['middle'] = 'resources/index';
		$this->load->view('templates/template',$data);
	}
	

	public function createResources(){
		if(isset($_POST) && !empty($_POST)){
		//	ini_set('display_errors',1);
		   //print_r($_POST);die();
			unset($_POST['_wysihtml5_mode']);
			$rid = $this->register->addResource($_POST);
			//print_r($rid);die();
			$img = 'resource_'.$rid.".jpg";
			if(!empty($_FILES)){
				$target_dir = "uploads/resources/";
				// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$target_file = $target_dir . $img;
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				
				
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo $imageFileType;
					$data['msg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
						//echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
						$v= $this->register->updateResourceImage($img);
						if($v){
							$data['msg'] = "Resource Added.";

						}
						$this->getResources();
						
					} else {
						$data['msg'] = "Sorry, there was an error uploading your file.";
					}
				}
			}		
		 }
		
		$data['middle'] = 'resources/createResource';
		$this->load->view('templates/template',$data);
	}



	public function viewResources($id){
		
		$data['middle'] = 'resources/view';
		$data['required'] = array(
									'id'=>$id	
								 );

		$this->load->view('templates/template',$data);
	}


	//=============harshvardhan==(Edit Resources)==============

      public function editResources($id){
		
		$data['middle'] = 'resources/editResources';
		$data['required'] = array(
									'id'=>$id	
								 );

		$this->load->view('templates/template',$data);
	}


public function saveEditResources()
{
$data2 = json_decode($_REQUEST['data']);

$item  = new stdClass(); 

$item->id                    = $data2->id;
$item->user_id               = $data2->user_id;
$item->title                 = $data2->title;
$item->url                   = $data2->url;
$item->summary               = $data2->summary;
$item->description           = $data2->description;
$item->keyword               = $data2->keyword;
$item->topic_of_artical      = $data2->topic_of_artical;
$item->sport                 = $data2->sport;
$item->location              = $data2->location;
$item->image                 = @$data2->image;
$item->date_created          = @$data2->date_created;


$this->load->model('register');
$res = $this->register->saveResources($item);
}


public function mobileviewResources(){
		// echo"hiiiiiiiiiii";
    $resources = $this->register->getResourceInfo($_POST['infoid']); 
	$data['required'] = array(
									'resources'=>$resources	
								 );
		
		 $this->load->view('resources/mobile_viewResources', $data);
		
		
	}


//================================================================
		
	public function mobileview(){
		
		 $job = $this->register->getJobInfo($_POST['infoid']); 
	$data['required'] = array(
									'job'=>$job	
								 );
		
	//echo "sagar"; exit;
		//$data['noheader'] = false;
		//$data['middle'] = 'job/mobile_view';
		
		 $this->load->view('job/mobile_view', $data);
		
		
	}
	public function shareresource()
	{
      $data['middle']='resources/shareResources';
      $this->load->view('templates/template',$data);

	}

//	=======================// harshvardhan

	public function createContent(){
			
		$data['middle'] = 'content/create_Content';
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
         // print_r($data);die();
		$this->load->view('templates/template',$data);
	}

	 public function editContent($id){
		
		$data['middle'] = 'content/editcontent';
		$data1=$this->register->editcontent($id);
        //$this->load->view('content/editcontent',$data1);
		$data['required'] = array(
									'id'=>$id	
								 );

		$this->load->view('templates/template',$data);
		//print_r($data1);
	}

public function saveContent()
{
$data12 = json_decode($_REQUEST['data']);

$item  = new stdClass(); 

$item->id                    = $data12->id;
$item->title                 = $data12->title;
$item->url                   = $data12->url;
$item->content               = $data12->content;
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
//print_r($data2);
$item  = new stdClass(); 
//echo $item->id;die;
$item->id                    = $data2->id;
$item->title                 = $data2->title;
$item->url                   = $data2->url;
$item->content               = $data2->content;
$item->date_created          = @strtotime($data2->date_created);
$item->date_updated          = @strtotime($data2->date_updated);

//print_r($item);die();
$this->load->model('register');
$res = $this->register->create_content($item);
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
		 // print_r($data);
		  //   die();
         //echo "$id";
        $data['middle'] = 'userModule/edituser';

		//  print_r($data);
		$this->load->view('templates/template',$data);

}



public function saveuserModule()
{
$data = json_decode($_REQUEST['data']);
//print_r($data);
$item  = new stdClass(); 

$item->id                      = $data->id;
$item->event                   = $data->event;
$item->tournament              = $data->tournament;
$item->job                     = $data->job;
$item->resources               = $data->resources;
$item->content                 = $data->content;



$this->load->model('register');
$res = $this->register->create_userModule($item);
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

      redirect('forms');

 }

public function profile()
{
$data=json_decode($_REQUEST['data']);

//print_r($data);die;
$item= new stdClass();

$item->userid                     =$data->userid;
$item->name                       =$data->name;
$item->email                      =$data->email;
$item->prof_id                    =$data->prof_id;
$item->contact_no                 =$data->contact_no;
$item->sport                      =$data->sport;
$item->Gender                     =$data->Gender;
$item->dob                        =$data->dob;
$item->address1                   =$data->address1;
$item->address2                   =$data->address2;
$item->address3                   =$data->address3;
$item->location                   =$data->location;
$item->password                   =@$data->password;
$item->user_image                 =@$data->user_image;
$item->profile_status             =@$data->profile_status;
$item->prof_language              =@$data->prof_language;
$item->other_skill_name           =@$data->other_skill_name;
$item->other_skill_detail         =@$data->other_skill_detail;
$item->age_catered                =@$data->age_catered;
$item->device_id                  =@$data->device_id;
$item->about_me                   =@$data->about_me;

//print_r($data);
$this->load->model('register');
$res= $this->register->updateProfile($item);
if($res==1)
{
		//$this->session->set_userdata('item',$data->name);
      // $sessdata = $this->session->userdata('item');
	echo "Profile  Updated";
}
else {
	echo "Profile Not Updated";
}
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


 }
