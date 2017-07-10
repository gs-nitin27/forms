<?php

		
class Register extends CI_Model
{

public function login_google($username,$password)
{
// $where = " email = '$username'  AND password = '$password'"; 
$this->db->where("email", $username);
$this->db->where("google_password", $password);
$qry = $this->db->get('user');
if($qry->num_rows() > 0)
{
$q = $qry->row_array();
if(($q['userType']==101 || $q['userType']==102 || $q['userType']==103 ) && $q['activeuser'])
{
return $q;
}
}
else
return 0;
}
 

public function adminlogin($username,$password)
{  
  // print_r($username);die;	
  $this->db->where("email",$username);
  $this->db->where("password",$password);
  $query = $this->db->get('gs_admin_user');
  if($query->num_rows()>0)
  {
  	 $q = $query->row_array();
  	// print_r($q);die;

  	 if($q['userType'] == 101 || $q['userType'] ==102)
  	 {
       return $q;
  	 }
  	 else
  	 {
  	 	return 0;
  	 }
  }
  else
  {
  	return 0;
  }
} 


public function editRegisterUser($username,$password)
{
$this->db->where("email", $username);
$this->db->where("password", $password);
$qry = $this->db->get('user');

if($qry->num_rows() > 0)
{
$q = $qry->row_array();
if($q['userType']== 103)
{
return $q['userid'];
}
}
else
return 0;
}

public function login($username,$password)
{
$this->db->where("email", $username);
$this->db->where("password", $password);
$qry = $this->db->get('user');

if($qry->num_rows() > 0)
{
$q = $qry->row_array();
if($q['userType']== 103)
{
return $q;
}
}
else
return 0;
}


public function saveEvent($item)
{
//STR_TO_DATE('$date', '%m/%d/%Y')
 
$insert = "INSERT INTO `gs_eventinfo`(`id`, `userid`,`name`, `type`, `address_1`, `address_2`, `location`, `PIN`,`state` ,`description`, `sport`,`sport_name`,`eligibility1`,`eligibility2`, `terms_cond1`, `terms_cond2`, `organizer_name`, `mobile`,`organizer_address_line1`, `organizer_address_line2`, `organizer_city`, `organizer_pin`,`organizer_state` ,`event_links`, `start_date`, `end_date`, `entry_start_date`, `entry_end_date`, `file_name`, `email_app_collection`, `dateCreated`,`image`,`feetype`,`ticket_detail`)



 VALUES ('$item->id','$item->userid','$item->name', '$item->type','$item->address1','$item->address2','$item->city','$item->pin','$item->state','$item->description','$item->sport','$item->sport_name','$item->eligibility1','$item->eligibility2','$item->tandc1','$item->tandc2','$item->organizer_name','$item->mobile','$item->org_address1','$item->org_address2','$item->organizer_city','$item->organizer_pin','$item->organizer_state','$item->event_links',


 STR_TO_DATE('$item->start_date','%m/%d/%Y'),STR_TO_DATE('$item->end_date','%m/%d/%Y'), STR_TO_DATE('$item->entry_start_date','%m/%d/%Y'),STR_TO_DATE('$item->entry_end_date','%m/%d/%Y'),


 '$item->file_name','$item->email_app_collection',CURDATE(),'$item->image','$item->feetype','$item->ticket_detail') ON DUPLICATE KEY UPDATE `name` = '$item->name',`address_1` = '$item->address1' ,`address_2` = '$item->address2' ,`location` = '$item->city' ,`state` = '$item->state', `PIN` = '$item->pin' , `description` = '$item->description',`sport` = '$item->sport',`sport_name`='$item->sport_name',`eligibility1` = '$item->eligibility1',`eligibility2` = '$item->eligibility2'  , `terms_cond1` = '$item->tandc1', `terms_cond2` = '$item->tandc2' , `organizer_name` = '$item->organizer_name' ,  `mobile` ='$item->mobile' ,`organizer_address_line1` = '$item->org_address1' , `organizer_address_line2` = '$item->org_address2' , `organizer_city` = '$item->organizer_city' , `organizer_pin` = '$item->organizer_pin', `organizer_state` = '$item->organizer_state' ,  `event_links` = '$item->event_links' , `start_date` = STR_TO_DATE('$item->start_date','%m/%d/%Y') ,`end_date` = STR_TO_DATE('$item->end_date','%m/%d/%Y') ,  `entry_start_date` =STR_TO_DATE('$item->entry_start_date','%m/%d/%Y') , `entry_end_date` = STR_TO_DATE('$item->entry_end_date','%m/%d/%Y') , `file_name` = '$item->file_name',`email_app_collection` = '$item->email_app_collection',`image`='$item->image',`ticket_detail`='$item->ticket_detail'";
$query = $this->db->query($insert);
if($query)
{   $id = mysql_insert_id();
	$data =  "INSERT INTO `gs_activity_log`(`userid`, `module`,`creation_id`,`activity`, `date_created`) VALUES ('$item->userid','job','$id','create','".date("Y-m-d")."')";
	$log  = $this->create_log($data,$item->userid);
     if($log == 1)
     {
     return 1;
     }else
     {
     return 0;
     }
}
else 
     return 0;
}

public function saveTournament($item)
{
	
$insert = "INSERT INTO `gs_tournament_info`(`id`, `userid`, `name`, `address_1`, `address_2`, `location`,`state`, `pin`, `description`,`sport` ,`level`, `age_group`, `gender`, `eligibility1`,`eligibility2`, `terms_and_cond1`, `terms_and_cond2`, `organiser_name`, `mobile`, `email`, `org_address1`, `org_address2`, `org_city`, `org_pin`, `tournaments_link`, `start_date`, `end_date`, `event_entry_date`, `event_end_date`, `file_name`,`date_created`,`publish`,`image`) VALUES ('$item->id','$item->userid','$item->type','$item->address_line1','$item->address_line2','$item->city','$item->state','$item->pin','$item->description','$item->sport','$item->tournament_level','$item->tournament_ageGroup','$item->tournament_gender','$item->eligibility1','$item->eligibility2','$item->terms_and_conditions1','$item->terms_and_conditions2','$item->organizer_name','$item->mobile','$item->emailid','$item->organizer_address_line1','$item->organizer_address_line2','$item->organizer_city','$item->organizer_pin','$item->tournament_links',STR_TO_DATE('$item->start_date','%m/%d/%Y'),STR_TO_DATE('$item->end_date','%m/%d/%Y'),STR_TO_DATE('$item->entry_start_date','%m/%d/%Y') ,STR_TO_DATE('$item->entry_end_date','%m/%d/%Y'),'$item->file_name',CURDATE(),'$item->publish','$item->image') ON DUPLICATE KEY UPDATE `name` = '$item->type', `address_1` = '$item->address_line1' , `address_2` = '$item->address_line2' , `location` = '$item->city' ,`state`='$item->state' ,`pin` = '$item->pin' , `description` = '$item->description',`sport`='$item->sport',`level` = '$item->tournament_level',`age_group`='$item->tournament_ageGroup',`gender` = '$item->tournament_gender',`eligibility1` = '$item->eligibility1' ,`eligibility2` = '$item->eligibility2', `terms_and_cond1` = '$item->terms_and_conditions1', `terms_and_cond2` = '$item->terms_and_conditions2',`organiser_name` = '$item->organizer_name' , `mobile` = '$item->mobile' , `email` = '$item->emailid' , `org_address1` = '$item->organizer_address_line1' , `org_address2` = '$item->organizer_address_line2' , `org_city` = '$item->organizer_city', `org_pin` = '$item->organizer_pin' , `tournaments_link` = '$item->tournament_links' ,`start_date` = STR_TO_DATE('$item->start_date','%m/%d/%Y') , `end_date` = STR_TO_DATE('$item->end_date','%m/%d/%Y') , `event_entry_date` = STR_TO_DATE('$item->entry_start_date','%m/%d/%Y') , `event_end_date` = STR_TO_DATE('$item->entry_end_date','%m/%d/%Y'),`publish`= '$item->publish',`image`='$item->image'";
 
$query = $this->db->query($insert);
if($query)
{
	$id = mysql_insert_id();
	$data =  "INSERT INTO `gs_activity_log`(`userid`, `module`,`creation_id`,`activity`, `date_created`) VALUES ('$item->userid','job','$id','create','".date("Y-m-d")."')";
	$log  = $this->create_log($data,$item->userid);
     if($log == 1)
     {
     return 1;
     }else
     {
     return 0;
     }
}
else 
      return 0;
}


public function create_job($item)
{

$insert = "INSERT INTO `gs_jobInfo`(`id`, `userid`, `title`, `gender`, `sport`, `type`, `work_experience`, `description`, `desired_skills`, `qualification`, `key_requirement`, `org_address1`, `org_address2`, `org_city`, `org_state`, `org_pin`, `organisation_name`, `about`, `address1`, `address2`, `state`, `city`, `pin`, `contact`, `image`,`email`,`job_link`, `date_created`) VALUES ('$item->id','$item->userid','$item->title','$item->gender','$item->sports','$item->type','$item->work_exp','$item->desc','$item->desiredskill','$item->qualification','$item->keyreq','$item->org_address1','$item->org_address2','$item->org_city','$item->org_state','$item->org_pin','$item->org_name','$item->about','$item->address1','$item->address2','$item->state','$item->city','$item->pin','$item->contact','$item->image','$item->email','$item->job_link',CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$item->title' , `sport` = '$item->sports',`gender` = '$item->gender' ,`type` = '$item->type' , `work_experience` = '$item->work_exp' , `description` = '$item->desc' , `desired_skills` = '$item->desiredskill' , `qualification` = '$item->qualification' , `key_requirement` = '$item->keyreq' , `organisation_name` = '$item->org_name' , `about` = '$item->about', `image` = '$item->image' , `contact` = '$item->contact' , `email` = '$item->email' , `date_created` = CURDATE(), `org_address1` = '$item->org_address1',`org_address2` = '$item->org_address2',`org_city` = '$item->org_city' , `org_pin` = '$item->org_pin' , `org_state`= '$item->org_state' , `address1`= '$item->address1' , `address2` = '$item->address2' , `city` = '$item->city' , `state` = '$item->state' , `publish` = 0, `pin` = '$item->pin',`job_link` = '$item->job_link'";
$query = $this->db->query($insert);
if($query)
{
	$id = mysql_insert_id();
	$data =  "INSERT INTO `gs_activity_log`(`userid`, `module`,`creation_id`,`activity`, `date_created`) VALUES ('$item->userid','job','$id','create','".date("Y-m-d")."')"; 
	$log  = $this->create_log($data,$item->userid);
     if($log == 1)
     {
     return 1;
     }else
     {
     return 0;
     }
}
else
{
   return 0;
}
} 


public function save_Edit_Job($item)
{

$insert = "INSERT INTO `gs_jobInfo`(`id`, `userid`, `title`, `gender`, `sport`, `type`, `work_experience`, `description`, `desired_skills`, `qualification`, `key_requirement`, `org_address1`, `org_address2`, `org_city`, `org_state`, `org_pin`, `organisation_name`, `about`, `address1`, `address2`, `state`, `city`, `pin`, `contact`, `image`,`email`, `date_created`) VALUES ('$item->id','$item->userid','$item->title','$item->gender','$item->sports','$item->type','$item->work_exp','$item->desc','$item->desiredskill','$item->qualification','$item->keyreq','$item->org_address1','$item->org_address2','$item->org_city','$item->org_state','$item->org_pin','$item->org_name','$item->about','$item->address1','$item->address2','$item->state','$item->city','$item->pin','$item->contact','$item->image','$item->email',CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$item->title' , `sport` = '$item->sports',`gender` = '$item->gender' ,`type` = '$item->type' , `work_experience` = '$item->work_exp' , `description` = '$item->desc' , `desired_skills` = '$item->desiredskill' , `qualification` = '$item->qualification' , `key_requirement` = '$item->keyreq' , `organisation_name` = '$item->org_name' , `about` = '$item->about', `image` = '$item->image' , `contact` = '$item->contact' , `email` = '$item->email' , `date_created` = CURDATE(), `org_address1` = '$item->org_address1',`org_address2` = '$item->org_address2',`org_city` = '$item->org_city' , `org_pin` = '$item->org_pin' , `org_state`= '$item->org_state' , `address1`= '$item->address1' , `address2` = '$item->address2' , `city` = '$item->city' , `state` = '$item->state' , `publish` = 0, `pin` = '$item->pin'";
$query = $this->db->query($insert);
if($query)
{
	return 1;
}
else
{
   return 0;
}
}


















	#Function for Get all the event type
public function getEventType($id = false)
{
		$qry = $this->db->get('gs_eventType');
		return $qry->result_array();
}
	#Function for Get all the Sport
public function getSport($id = false)
{
		$qry = $this->db->get('gs_sports');
		return $qry->result_array();
}
	#Function for Get State By Enter City
public function getStateByKey($key)
{
		$this->db->where('city', $key);
		$qry = $this->db->get('location');
		$q =  $qry->row_array();
		return $q;
}
	#Function for Get all the Level
public function getLevel()
{
		$qry = $this->db->get('gs_level');
		$q =  $qry->result_array();
		return $q;
}
	#Function for Get all the Level
public function getTournamentCategory()
{
		$qry = $this->db->get('gs_tournament_category');
		$q =  $qry->result_array();
		return $q;
}
	
public function getJobInfo($id = false)
{       $this->db->select('*');
		$this->db->from('gs_jobInfo GR');
		if($id > 0){
			$this->db->where('GR.id', $id);
		}else{
		 $this->db->order_by("GR.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		return $q;
	// $this->db->select('*, JI.id as infoId, L.city as city_name, L.state as state_name, LM.state as state_org, LM.city as city_org');
 //    $this->db->from('gs_jobInfo JI');
	// $this->db->join('gs_sports SP', 'SP.id = JI.sport', "left");
	// $this->db->join('location L', 'JI.state = L.id', "left");
	// $this->db->join('location LM', 'JI.org_state = LM.id', "left");
	// if($id > 0){
	// 	$this->db->where('JI.id', $id);
	// }else{
	// 	 $this->db->order_by("JI.id", "desc"); 
	// }
	// $query = $this->db->get();
	// $q =  $query->result_array();
	// return $q;
}
	
public function getEventInfo($id = false)
{
     $this->db->select('*');
		$this->db->from('gs_eventinfo GR');
		if($id > 0){
			$this->db->where('GR.id', $id);
		}else{
		 $this->db->order_by("GR.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		return $q;

	 //    $this->db->select('*, EI.id as infoId, L.city as city_name, L.state as state_name, LM.state as state_org, LM.city as city_org');
		// $this->db->from('gs_eventinfo EI');
		// $this->db->join('gs_sports SP', 'SP.id = EI.sport', "left");
		// $this->db->join('location L', 'EI.state = L.id', "left");
		// $this->db->join('location LM', 'EI.organizer_state = LM.id', "left");
		// $this->db->join('gs_eventType ET', 'ET.id = EI.type', "left");
		// if($id > 0){
		// 	$this->db->where('EI.id', $id);
		// }else{
		// 	 $this->db->where("publish =1 OR publish=2");
		//      $this->db->order_by("EI.id", "desc"); 
		// }
		// $query = $this->db->get();
		// $q =  $query->result_array();
		
		// return $q;
}
	
public function getTournamentInfo($id = false)
{
	//print_r($id);die;
		$this->db->select('*');
		$this->db->from('gs_tournament_info');
		if($id > 0){
			$this->db->where('id', $id);
		}else{
		 $this->db->order_by("id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		
		return $q;
	}


public function getTournament($id)
{
		   $this->db->select('*');
		   $this->db->from('gs_tournament_info');
		   $this->db->where('id',$id);
		   $query = $this->db->get();
		   $q = $query->result_array();
		   return $q;
}

public function getResourceInfo($id = false)
{
        $this->db->select('*');
		$this->db->from('gs_resources GR');
		if($id > 0){
			$this->db->where('GR.id', $id);
		}else{
		 $this->db->order_by("GR.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		return $q;

        // $other_db= $this->load->database('other', TRUE);
		// $other_db->select('*');
		// $other_db->from('gs_resources GR');
		// if($id > 0){
		// 	$other_db->where('GR.id', $id);
		// }else{
		//  $other_db->order_by("GR.id", "desc"); 
		// }
		// $query = $other_db->get();
		// $q =  $query->result_array();
		// return $q;
}
	
public function addResource($data, $id=false)
{
		$this->db->insert('gs_resources', $data);
		 return $this->db->insert_id();
}
	
public function updateResourceImage($img)
{
		list($label, $id) = explode("_",$img);
		$data['image'] = $img;
		$this->db->where('id', $id);
		$this->db->update('gs_resources', $data);
		return true;
}

   //==================harshvardhan========================

// public function getResourceInfo($id = false){
// 		$this->db->select('*, JI.id as infoId, L.city as city_name, L.state as state_name, LM.state as state_org, LM.city as city_org');
// 		$this->db->from('gs_jobInfo JI');
// 		$this->db->join('gs_sports SP', 'SP.id = JI.sport', "left");
// 		$this->db->join('location L', 'JI.state = L.id', "left");
// 		$this->db->join('location LM', 'JI.org_state = LM.id', "left");
// 		if($id > 0){
// 			$this->db->where('JI.id', $id);
// 		}else{
// 		 $this->db->order_by("JI.id", "desc"); 
// 		}
// 		$query = $this->db->get();
// 		$q =  $query->result_array();
// 		return $q;
// 	}

public function editresources($id)
{
	  $this->db->select('*');
      $this->db->from('gs_resources gs ');
      $this->db->where('gs.id', $id);
      $query = $this->db->get();
	  $data =  $query->result_array();
	  return $data;
}


public function deleteResources($id)
{
  $this ->db-> where('id', $id);
  $this ->db-> delete('gs_resources');
}


public function deleteJob($id)
{
  $this ->db-> where('id', $id);
  $this ->db-> delete('gs_jobInfo');
}

public function deleteTournament($id)
{
  $this ->db-> where('id', $id);
  $this ->db-> delete('gs_tournament_info');
}




public function saveResources($item)
{   

   if($item->token == 2)
	{
        $video_url = $item->url; 
	    $url = "";
	}
	else
	{
		$video_url = "";
		$url = $item->url;
	}
 $insert = "INSERT INTO `gs_resources`(`userid`,`title`, `url`, `description`,`summary`, `image`, `keyword`, `topic_of_artical`, `sport`,`location`,`token`,`status`,`date_created`,`video_link`) VALUES ('$item->userid','$item->title','$url','$item->description','$item->summary','$item->image','$item->keyword','$item->topic_of_artical','$item->sport','$item->location','$item->token','$item->status',CURDATE(),'$video_url')";

$query = $this->db->query($insert);
if($query)
{
	return 1;
}
else
{
   return 0;
}
}


public function saveEditResources($item)
{
	if($item->token == 2)
	{
        $video_url = $item->url; 
	    $url = "";
	}
	else
	{
		$video_url = "";
		$url = $item->url;
	}
 $insert = "INSERT INTO `gs_resources`(`id`, `userid`,`title`, `url`,`video_link`,`description`,`summary`, `image`, `keyword`, `topic_of_artical`, `sport`,`location`,`token`,`status`,`date_created`) VALUES ('$item->id','$item->userid','$item->title','$url','$video_url','$item->description','$item->summary','$item->image','$item->keyword','$item->topic_of_artical','$item->sport','$item->location','$item->token','$item->status',CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$item->title' , `url` = '$url',`video_link` = '$video_url',`description` = '$item->description', `summary` = '$item->summary',`image` ='$item->image',`keyword` ='$item->keyword' , `topic_of_artical` ='$item->topic_of_artical',`sport` = '$item->sport',`status` ='$item->status',`location` ='$item->location'";

$query = $this->db->query($insert);
if($query)
{
	return 1;
}
else
{
   return 0;
}
}








public function getContentInfo($id = false)
{
      //  $this->load->database('other', TRUE);
		$this->db->select('*');
		$this->db->from('cms_content GR');
		if($id > 0){
			$this->db->where('GR.id', $id);
		}else{
		 $this->db->order_by("GR.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		//_pr($q);
		return $q;
	}
     
public function editcontent($id)
    {
      $this->db->select('*');
      $this->db->from('cms_content cm ');
      $this->db->where('cm.id', $id);
      $query = $this->db->get();
	  $data =  $query->result_array();
	  return $data;
    }

public function create_content($item)
{
  $insert = "INSERT INTO `cms_content`(`id`,`userid`, `title`, `url`, `content`, `publish`, `date_created`, `date_updated`) VALUES ('$item->id','$item->userid','$item->title','$item->url','$item->content','$item->publish',CURDATE(),CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$item->title' , `url` = '$item->url',`content` = '$item->content', `publish` = '$item->publish', `date_updated` = CURDATE()";

$query = $this->db->query($insert);
if($query)
{
	return 1;
}
else
{
   return 0;
}
}

public function create_userModule($item)
{ 
 $insert ="INSERT INTO `gs_usermodule`(`id`, `event`, `tournament`, `job`, `resources`, `content`) VALUES ('$item->id','$item->event','$item->tournament','$item->job','$item->resources','$item->content') ON DUPLICATE KEY UPDATE `event` ='$item->event' , `tournament` = '$item->tournament',`job` = '$item->job',`resources` = '$item->resources',`content` = '$item->content'";

    $query = $this->db->query($insert);
    if($query)
     {
	    return 1;
     }
     else
     {
        return 0;
     }   
}

public function profile($id)
{   
      $this->db->select('*');
      $this->db->from('user u');
      $this->db->where('u.userid', $id);
      $query = $this->db->get();
	  $data =  $query->result_array();
	  return $data;
}


public function admin_registration($item)
{
	if($item->dob)
	{
		$date =  date('Y-m-d', strtotime($item->dob));
	}
	else
	{
		$date =0;
	}
   $insert = "INSERT INTO `gs_admin_user`(`adminid`,`name`,`userType`,`status`,`password`,`email`,`contact_no`,`gender`,`address1`,`address2`,`address3`,`dob`,`location`,`access_module`,`date_created`) VALUES('$item->userid','$item->name','$item->userType','$item->status','$item->password','$item->email','$item->contact_no','$item->gender','$item->address1','$item->address2','$item->address3','$date','$item->location','$item->access_module',CURDATE()) ON DUPLICATE KEY UPDATE `name`='$item->name' ,`status`='$item->status',`contact_no` ='$item->contact_no',`gender`='$item->gender',`address1`='$item->address1',`address2`='$item->address2',`address3`='$item->address3',`dob`='$date',`userType` = '$item->userType',`location`='$item->location',`date_updated`=CURDATE() ,`password`='$item->password'";

   $query = $this->db->query($insert);
   if($query)
   {
   
   	return 1;
   }
   else
   {
   	return 0;
   }
}

public function updateProfile($item)
{
  $insert ="INSERT INTO `user`(`userid`,`name`,`status`,`password`,`email`,`contact_no`,`sport`,`gender`, `address1`, `address2`, `address3`, `dob`,`prof_id`,`prof_name`,`userType`,`user_image`,`profile_status`, `location`, `prof_language`, `other_skill_name`, `other_skill_detail`, `age_catered`, `device_id`,`about_me`)  VALUES ('$item->userid','$item->name','$item->status','$item->password','$item->email','$item->contact_no','$item->sport','$item->gender','$item->address1','$item->address2','$item->address3','$item->dob','$item->prof_id','$item->prof_name','$item->userType','$item->user_image','$item->profile_status','$item->location','$item->prof_language','$item->other_skill_name','$item->other_skill_detail','$item->age_catered','$item->device_id','$item->about_me' )  ON DUPLICATE KEY UPDATE `name` ='$item->name', `status` = '$item->status',`contact_no` = '$item->contact_no',`sport` = '$item->sport' ,`gender` = '$item->gender' ,`address1` = '$item->address1' ,`address2` = '$item->address2' , `address3` = '$item->address3' , `dob` = '$item->dob' , `prof_id` = '$item->prof_id' , `userType` = '$item->userType', `location` = '$item->location'";

  $query = $this->db->query($insert);
  if($query)
  {

  	$id = mysql_insert_id();
	return $id;
  }
  else
  {
    return 0;
   }
}

public function getCityName($keyword)
{
		$this->db->distinct();
		$this->db->select('city');
        $this->db->from('location');
        $this->db->where('city', 0);
        $this->db->like('city', $keyword);
         //$this->db->order_by("city", "asc");
        $this->db->limit('10');      
      //  $this->db->limit(0, 6);
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $data[] = $row;
        }   
        return $query;
	}

public function getsubsection($keyword)
{
	    $this->db->distinct();
		$this->db->select('subsection');
        $this->db->from('gs_assess_question');
        $this->db->where('subsection', 0);
        $this->db->like('subsection', $keyword);
         //$this->db->order_by("city", "asc");
        $this->db->limit('10');      
      //  $this->db->limit(0, 6);
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $data[] = $row;
        }   
        return $query;
}


public function StatusResources($item)
{
    $update = "UPDATE  `gs_resources` SET  `status` ='$item->status' , `date_updated` = CURDATE() WHERE `id` = '$item->id' ";
    $query = $this->db->query($update);
    if($query)
    {
	  return 1;
    }
    else
    {
      return 0;
    }
}	

public function addResourcesData($item)
{
     $id=$item[0]['id'];
     $user_id=$item[0]['userid'];
     $title= mysql_real_escape_string($item[0]['title']);
     $description= mysql_real_escape_string($item[0]['description']);
     $summary= mysql_real_escape_string($item[0]['summary']);
     $url=$item[0]['url'];
     $image=$item[0]['image'];
     $keyword=$item[0]['keyword'];
     $topic_of_artical=$item[0]['topic_of_artical'];
     $sport=$item[0]['sport'];
     $location=$item[0]['location'] ;
     $date_created=$item[0]['date_created'];
     $token=$item[0]['token'];
     $status= 0;//$item[0]['status'];

     $other_db= $this->load->database('default', TRUE);

     $insert = "INSERT INTO `gs_resources`(`id`, `userid`,`title`, `url`, `description`,`summary`, `image`,`keyword`, `topic_of_artical`, `sport`,`location`,`token`,`status`,`date_created`) VALUES ('$id','$user_id', '$title', '$url', '$description', '$summary', '$image', '$keyword', '$topic_of_artical', '$sport', '$location', '$token', '$status' , '$date_created') ON DUPLICATE KEY UPDATE `title` ='$title' , `url` = '$url',`description` = '$description', `summary` = '$summary',`image` ='$image',`topic_of_artical` ='$topic_of_artical',`sport` = '$sport',`location` ='$location'";

    $query = $other_db->query($insert);
       if($query)
       {
	      return 1;
       }
       else
       {
         return 0;
       }	 
}

public function deleteStatusResources($id)
{
       $other=$this->load->database('default',TRUE);
       $other->where('id', $id);
       $other->delete('gs_resources');
}

public function StatusEvent($item)
{
   $update = "UPDATE  `gs_eventinfo` SET  `publish` ='$item->publish' , `date_updated` = CURDATE() WHERE `id` = '$item->id' ";
   $query = $this->db->query($update);
   if($query)
    {
	  return 1;
    }
   else
    {
      return 0;
    }
}

// public function addEventData($item)
// {
//      $id=$item[0]['infoId'];
//      $userid=$item[0]['userid'];
//      $name=$item[0]['name'];
//      $type=$item[0]['type'];
//      $address_1=$item[0]['address_1'];
//      $address_2=$item[0]['address_2'];
//      $location=$item[0]['location'];
//      $PIN=$item[0]['PIN'];
//      $state=$item[0]['state'];
//      $sport=$item[0]['sport'];
//      $description=$item[0]['description'] ;
//      $eligibility1=$item[0]['eligibility1'];
//      $eligibility2=$item[0]['eligibility2'];
//      $terms_cond1=$item[0]['terms_cond1'];
//      $terms_cond2=$item[0]['terms_cond2'];
//      $organizer_name=$item[0]['organizer_name'];
//      $mobile=$item[0]['mobile'];
//      $organizer_address_line1=$item[0]['organizer_address_line1'];
//      $organizer_address_line2=$item[0]['organizer_address_line2'];
//      $organizer_city=$item[0]['organizer_city'];
//      $organizer_pin=$item[0]['organizer_pin'];
//      $organizer_state=$item[0]['organizer_state'];
//      $event_links=$item[0]['event_links'];
//      $start_date=$item[0]['start_date'];
//      $end_date=$item[0]['end_date'] ;
//      $entry_start_date=$item[0]['entry_start_date'];
//      $entry_end_date=$item[0]['entry_end_date'];
//      $file_name=$item[0]['file_name'];
//      $publish=$item[0]['publish'] ;
//      $email_app_collection=$item[0]['email_app_collection'];
//      $dateCreated=$item[0]['dateCreated'];
     
//      $other_db= $this->load->database('default', TRUE);

//      $insert = "INSERT INTO `gs_eventinfo`(`id`, `userid`,`name`, `type`, `address_1`, `address_2`, `location`, `PIN`,`state` ,`description`, `sport`,`eligibility1`,`eligibility2`, `terms_cond1`, `terms_cond2`, `organizer_name`, `mobile`,`organizer_address_line1`, `organizer_address_line2`, `organizer_city`, `organizer_pin`,`organizer_state` ,`event_links`, `start_date`, `end_date`, `entry_start_date`, `entry_end_date`, `file_name` , `publish`, `email_app_collection`, `dateCreated`) VALUES('$id','$userid','$name', '$type','$address_1','$address_2','$location','$PIN','$state','$description','$sport','$eligibility1','$eligibility2','$terms_cond1','$terms_cond2','$organizer_name','$mobile','$organizer_address_line1','$organizer_address_line2','$organizer_city','$organizer_pin','$organizer_state','$event_links','$start_date','$end_date','$entry_start_date','$entry_end_date','$file_name','$publish','$email_app_collection',CURDATE()) ON DUPLICATE KEY UPDATE `name` = '$name',`address_1` = '$address_1' ,`address_2` = '$address_2' ,`location` = '$location' ,`state` = '$state', `PIN` = '$PIN' , `description` = '$description',`sport` = '$sport',`eligibility1` = '$eligibility1',`eligibility2` = '$eligibility2'  , `terms_cond1` = '$terms_cond1', `terms_cond2` = '$terms_cond2' , `organizer_name` = '$organizer_name' ,  `mobile` ='$mobile' ,`organizer_address_line1` = '$organizer_address_line1' , `organizer_address_line2` = '$organizer_address_line2' , `organizer_city` = '$organizer_city' , `organizer_pin` = '$organizer_pin', `organizer_state` = '$organizer_state' ,  `event_links` = '$event_links' , `start_date` = FROM_UNIXTIME ('$start_date') ,`end_date` = FROM_UNIXTIME ('$end_date') ,  `entry_start_date` = FROM_UNIXTIME ('$entry_start_date') , `entry_end_date` = FROM_UNIXTIME ('$entry_end_date') , `file_name` = '$file_name',`email_app_collection` = '$email_app_collection'";

//      $query = $other_db->query($insert);
//      if($query)
//       {
// 	    return 1;
//       }
//      else
//       {
//         return 0;
//       }	 
// }

// public function deletePublishEvent($id)
// {
//        $other=$this->load->database('default',TRUE);
//        $other->where('id', $id);
//        $other->delete('gs_eventinfo');
// }

public function Statustournament($item)
{

   $update = "UPDATE  `gs_tournament_info` SET  `publish` ='$item->publish' , `date_updated` = CURDATE() WHERE `id` = '$item->id' ";
   $query = $this->db->query($update);
   if($query)
   {
	   return 1;
   }
   else
   {
       return 0;
   }
}

// public function addTournamentData($item)
// {
//      $id=$item[0]['infoId'];
//      $userid=$item[0]['userid'];
//      $name=$item[0]['name'];
//      $category=$item[0]['category'];
//      $address_1=$item[0]['address_1'];
//      $address_2=$item[0]['address_2'];
//      $location=$item[0]['location'];
//      $pin=$item[0]['pin'];
//      $state=$item[0]['state'];
//      $sport=$item[0]['sport'];
//      $description=$item[0]['description'] ;
// 	 $level=$item[0]['level'];
//      $age_group=$item[0]['age_group'];
//      $eligibility1=$item[0]['eligibility1'];
//      $eligibility2=$item[0]['eligibility2'];
// 	 $gender=$item[0]['gender'];
// 	 $terms_and_cond1=$item[0]['terms_and_cond1'];
//      $terms_and_cond2=$item[0]['terms_and_cond2'];
//      $organiser_name=$item[0]['organiser_name'];
//      $mobile=$item[0]['mobile'];
//      $email=$item[0]['email'];
//      $org_address1=$item[0]['org_address1'];
//      $org_address2=$item[0]['org_address2'];
//      $org_city=$item[0]['org_city'];
// 	 $org_pin=$item[0]['org_pin'];
//      $tournaments_link=$item[0]['tournaments_link'];
//      $start_date=$item[0]['start_date'];
//      $end_date=$item[0]['end_date'] ;
//      $event_entry_date=$item[0]['event_entry_date'];
//      $event_end_date=$item[0]['event_end_date'];
// 	 $file_name=$item[0]['file_name'];
//      $publish=$item[0]['publish'] ;
//      $date_created=$item[0]['date_created'];
       
//      $other_db= $this->load->database('default', TRUE);

//      $insert = "INSERT INTO `gs_tournament_info`(`id`, `userid`, `name`, `category`, `address_1`, `address_2`, `location`,`state`, `pin`, `description`,`sport` ,`level`, `age_group`, `gender`, `eligibility1`,`eligibility2`, `terms_and_cond1`, `terms_and_cond2`, `organiser_name`, `mobile`, `email`, `org_address1`, `org_address2`, `org_city`, `org_pin`, `tournaments_link`, `start_date`, `end_date`, `event_entry_date`, `event_end_date`, `file_name`, `publish`,`date_created`) VALUES ('$id','$userid','$name','$category','$address_1','$address_2','$location','$state','$pin','$description','$sport','$level','$age_group','$gender','$eligibility1','$eligibility2','$terms_and_cond1','$terms_and_cond2','$organiser_name','$mobile','$email','$org_address1','$org_address2','$org_city','$org_pin','$tournaments_link','$start_date','$end_date','$event_entry_date' ,'$event_end_date','$file_name','$publish',CURDATE()) ON DUPLICATE KEY UPDATE `name` = '$name', `address_1` = '$address_1' , `address_2` = '$address_2' , `location` = '$location' ,`state`='$state' ,`pin` = '$pin' , `description` = '$description',`sport`='$sport',`level` = '$level',`age_group`='$age_group',`gender` = '$gender',`eligibility1` = '$eligibility1' ,`eligibility2` = '$eligibility2', `terms_and_cond1` = '$terms_and_cond1', `terms_and_cond2` = '$terms_and_cond2' ,`organiser_name` = '$organiser_name' , `mobile` = '$mobile' , `email` = '$email' , `org_address1` = '$org_address1' , `org_address2` = '$org_address2' , `org_city` = '$org_city', `org_pin` = '$org_pin' , `tournaments_link` = '$tournaments_link' ,`start_date` = FROM_UNIXTIME ('$start_date') , `end_date` = FROM_UNIXTIME ('$end_date') , `event_entry_date` = FROM_UNIXTIME ('$event_entry_date') , `event_end_date` = FROM_UNIXTIME ('$event_end_date')";

//      $query = $other_db->query($insert);
//      if($query)
//       {
// 	    return $id;
//       }
//      else
//       {
//         return 0;
//       }	 
// }

// public function deletePublishTournament($id)
// {
//        $other=$this->load->database('default',TRUE);
//        $other->where('id', $id);
//        $other->delete('gs_tournament_info');
// }

public function StatusJob($item)
{
       $update = "UPDATE  `gs_jobInfo` SET  `publish` ='$item->publish' , `date_updated` = CURDATE() WHERE `id` = '$item->id' ";
       $query = $this->db->query($update);
       if($query)
       {
	     return 1;
       }
       else
       {
         return 0;
       }
}	

// public function addJobData($item)
// {
//      $id=$item[0]['infoId'];
//      $userid=$item[0]['userid'];
//      $title=$item[0]['title'];
//      $gender=$item[0]['gender'];
//      $type=$item[0]['type'];
//      $work_experience=$item[0]['work_experience'];
//      $desired_skills=$item[0]['desired_skills'];
//      $qualification=$item[0]['qualification'];
//      $key_requirement=$item[0]['key_requirement'];
//      $state=$item[0]['state'];
//      $sport=$item[0]['sport'];
//      $description=$item[0]['description'] ;
//      $org_address1=$item[0]['org_address1'];
//      $org_address2=$item[0]['org_address2'];
//      $org_state=$item[0]['org_state'];
//      $org_city=$item[0]['org_city'];
// 	 $org_pin=$item[0]['org_pin'];
//      $organisation_name=$item[0]['organisation_name'];
//      $about=$item[0]['about'];
//      $address1=$item[0]['address1'] ;
//      $address2=$item[0]['address2'];
//      $city=$item[0]['city'];
// 	 $pin=$item[0]['pin'];
//      $publish=$item[0]['publish'] ;
//      $contact=$item[0]['contact'];
//      $email=$item[0]['email'];
//      $date_created=$item[0]['date_created'];

//      $other_db= $this->load->database('default', TRUE);

//      $insert = "INSERT INTO `gs_jobInfo`(`id`, `userid`, `title`, `gender`, `sport`, `type`, `work_experience`, `description`, `desired_skills`, `qualification`, `key_requirement`, `org_address1`, `org_address2`, `org_city`, `org_state`, `org_pin`, `organisation_name`, `about`, `address1`, `address2`, `state`, `city`, `pin`, `publish`, `contact`, `email`, `date_created`) VALUES ('$id','$userid','$title','$gender','$sport','$type','$work_experience','$description','$desired_skills','$qualification','$key_requirement','$org_address1','$org_address2','$org_city','$org_state','$org_pin','$organisation_name','$about','$address1','$address2','$state','$city','$pin','$publish','$contact','$email',CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$title' , `sport` = '$sport',`gender` = '$gender' ,`type` = '$type' , `work_experience` = '$work_experience' , `description` = '$description' , `desired_skills` = '$desired_skills' , `qualification` = '$qualification' , `key_requirement` = '$key_requirement' , `organisation_name` = '$organisation_name' , `about` = '$about', `contact` = '$contact' , `email` = '$email' , `date_created` = CURDATE(), `org_address1` = '$org_address1',`org_address2` = '$org_address2',`org_city` = '$org_city' , `org_pin` = '$org_pin' , `org_state`= '$org_state' , `address1`= '$address1' , `address2` = '$address2' , `city` = '$city' , `state` = '$state' , `pin` = '$pin'";

//      $query = $other_db->query($insert);
//      if($query)
//        {
// 	     return 1;
//        }
//      else
//        {
//          return 0;
//        }	 
// }

// public function deletePublishJob($id)
// {
//        $other=$this->load->database('default',TRUE);
//        $other->where('id', $id);
//        $other->delete('gs_jobInfo');
// }

public function StatusContent($item)
{
     $update = "UPDATE  `cms_content` SET  `publish` ='$item->publish' , `date_updated` = CURDATE() WHERE `id` = '$item->id' ";
     $query = $this->db->query($update);
     if($query)
       {
	     return 1;
       }
     else
       {
         return 0;
       }
}	

// public function addContentData($item)
// {
//      $id=$item[0]['id'];
//      $userid=$item[0]['userid'];
//      $title=(string)$item[0]['title'];
//      $content=(string)$item[0]['content'];
//      $url=$item[0]['url'];
//      $date_created=$item[0]['date_created'];
//      $date_updated=$item[0]['date_updated'];
//      $publish=$item[0]['publish'];

//      $other_db= $this->load->database('default', TRUE);

//      $insert = "INSERT INTO `cms_content`(`id`,`userid`, `title`, `url`, `content`, `publish`, `date_created`, `date_updated`) VALUES ('$id','$userid','$title','$url','$content','$publish',CURDATE(),CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$title' , `url` = '$url',`content` = '$content', `date_updated` = CURDATE()";

//      $query = $other_db->query($insert);
//      if($query)
//        {
// 	     return 1;
//        }
//      else
//        {
//          return 0;
//        }	 
// }

// public function deletePublishContent($id)
// {
//        $other=$this->load->database('default',TRUE);
//        $other->where('id', $id);
//        $other->delete('cms_content');
// }

public function removeimage($id,$image)
{	 
        
		    if(file_exists("uploads/resources/".$image))
		    {   // echo "uploads/resources/".$image;die;
		    	 unlink("uploads/resources/".$image);
		    }
         $update = "UPDATE  `gs_resources` SET  `image` =' ' WHERE `userid` = '$id' ";
         $query = $this->db->query($update);
         if($query)
         {
	       return 1;
         }
         else
         {
         return 0;
         }
}

public function getUserInfo($id=false)
{
    $qry = $this->db->get('user');
    $q =  $qry->result_array();
	return $q;
}

public function getadminUserInfo($id=false)
{
   $query = $this->db->get('gs_admin_user');
   $q = $query->result_array();
   return $q;

}

public function ActivateUser($item)
{
 $update = "UPDATE  `user` SET  `activeuser` ='$item->activeuser' WHERE `userid` = '$item->userid' ";
 $query = $this->db->query($update);
 if($query)
 {
	return 1;
 }
 else
 {
    return 0;
 }
}

public function Activateadmin($item)
{
 $update = "UPDATE  `gs_admin_user` SET  `activeuser` ='$item->activeuser' WHERE `adminid` = '$item->userid' ";
 $query = $this->db->query($update);
 if($query)
 {
	return 1;
 }
 else
 {
    return 0;
 }
}
// public function deleteUser($id,$item)
// {
// 	$this->db->where('userid',$id);
// 	$this->db->delete('user');
// }

public function usermoduleData($id){

      $this->db->select('*');
      $this->db->from('user u');
      $this->db->where('u.userid', $id);
      $query = $this->db->get();
	  $data =  $query->result_array();
	  return $data;
} 

public function admin_user_module($id)
{
	  $this->db->select('*');
	  $this->db->from('gs_admin_user ad');
	  $this->db->where('ad.adminid',$id);
	  $query =$this->db->get();
	  $data = $query->result_array();
	  return $data;
}

public function update_userModule($id,$item)
{
    $update = "UPDATE  `user` SET  `access_module` ='$item' WHERE `userid` = '$id' ";
    $query = $this->db->query($update);
    if($query)
       {
	     return 1;
       }
     else
       {
         return 0;
       }
}

public function update_admin_module($id,$item)
{
	$update = "UPDATE `gs_admin_user` SET `access_module` = '$item' WHERE `adminid` = '$id'";
	$query = $this->db->query($update);
	if($query)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}

public function getUserJobInfo($id)
{      
       $this->db->select('*, JI.id as infoId, L.city as city_name, L.state as state_name, LM.state as state_org, LM.city as city_org');
		$this->db->from('gs_jobInfo JI');
		$this->db->join('gs_sports SP', 'SP.id = JI.sport', "left");
		$this->db->join('location L', 'JI.state = L.id', "left");
		$this->db->join('location LM', 'JI.org_state = LM.id', "left");
		if($id > 0){
			$this->db->where('JI.userid', $id);
			$this->db->order_by("JI.id", "desc");
		}else{
		 $this->db->order_by("JI.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		//echo $query;
		
		return $q;
}

public function getUserResourceInfo($id)
{
        $this->db->select('*');
		$this->db->from('gs_resources GR');
		if($id > 0){
			$this->db->where('GR.userid',$id);
			$this->db->order_by("GR.id", "desc"); 
		}else{
		 $this->db->order_by("GR.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		
		return $q;

        // $other_db= $this->load->database('other', TRUE);
		// $other_db->select('*');
		// $other_db->from('gs_resources GR');
		// if($id > 0){
		// 	$other_db->where('GR.userid', $id);
		// }else{
		//  $other_db->order_by("GR.id", "desc"); 
		// }
		// $query = $other_db->get();
		// $q =  $query->result_array();
		
		// return $q;
}
public function getUserTournamentInfo($id)
{
		$this->db->select('*, TI.id as infoId, L.city as city_name, L.state as state_name');
		$this->db->from('gs_tournament_info TI');
		$this->db->join('gs_level LVL', 'LVL.id = TI.level', "left");
		$this->db->join('gs_tournament_category TC', 'TC.id = TI.category', "left");
		$this->db->join('gs_sports SP', 'SP.id = TI.sport', "left");
		$this->db->join('location L', 'TI.state = L.id', "left");
		if($id > 0){
			$this->db->where('TI.userid', $id);
			$this->db->order_by("TI.id", "desc");
		}else{
		 $this->db->order_by("TI.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		
		return $q;
}

public function getUserEventInfo($id)
{
	    $this->db->select('*');
		$this->db->from('gs_eventinfo EI');
		if($id > 0){

			$this->db->where('EI.userid', $id);
			$this->db->order_by("EI.id", "desc");
		}else{
		 $this->db->order_by("EI.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		
		return $q;
}

public function getUserContentInfo($id)
{
		$this->db->select('*');
		$this->db->from('cms_content GR');
		if($id > 0){
			$this->db->where('GR.userid', $id);
			$this->db->order_by("GR.id", "desc"); 
		}else{
		 $this->db->order_by("GR.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		return $q;
}

public function adminchange_password($id,$pass)
{
  $update = "UPDATE `gs_admin_user` SET `password` = '$pass' WHERE `adminid` = '$id'";
  $query = $this->db->query($update);
  if($query)
  {
   return 1;
  }	else
  {
  	return 0;
  }
}
public function changepassword($id,$password)
{
   $update="UPDATE `user` SET `password`='$password' WHERE `userid`='$id'";
   $query=$this->db->query($update);
   if($query)
   {
   	return 1;
   }
   else
   {
   	return 0;
   }
}

public function Csvfileupload($item,$userid)
{
 //echo json_encode($item[0]);
 // echo  $item[3];
 // return 1;
    // $user_id=$item[0];
     $title= mysql_real_escape_string($item[2]);
    // $description= mysql_real_escape_string($item[0]);
     $summary= mysql_real_escape_string($item[6]);
     $url=$item[4];
     //$image=$item[0];
    // $keyword=$item[0];
     $topic_of_artical=$item[3];
     $sport=$item[1];
     $location=$item[5] ;
    // $date_created='CUR';
    // $token=$item[0];
    // $status=$item[0];

$insert = "INSERT INTO `gs_resources`(`title`,`userid`, `url`,`summary`, `topic_of_artical`,`location`, `sport`,`date_created`) VALUES ( '$title','$userid', '$url', '$summary', '$topic_of_artical', '$location', '$sport',CURDATE()) ";
  // echo $insert ;die;
      $query = $this->db->query($insert);
       if($query)
       {
       	   $id = mysql_insert_id();
	      return $id;
       }
       else
       {
         return 0;
       }	 
}
  
public function saveCSVImage($id,$image)
{
   $update = "UPDATE  `gs_resources` SET  `image` = '$image' WHERE `id` = '$id' ";
   $query = $this->db->query($update);
   if($query)
    {
	    return 1;
    }
    else
    {
        return 0;
    }
}


public function removejobimage($id,$image)
{
	if(file_exists("uploads/job/".$image))
     {
		  unlink("uploads/job/".$image);
     }
    $this->db->where('id', $id);
   
    $this->db->delete('gs_jobInfo', array('image' => $image)); 
}


public function removeeventimage($id,$image)
{

	if(file_exists("uploads/event/".$image))
     {
		 unlink("uploads/event/".$image);
     }
    $this->db->where('id', $id);
   
    $this->db->delete('gs_jobInfo', array('image' => $image)); 
}

public function removetournamentimage($id,$image)
{
    

    if(file_exists("uploads/tournament/".$image))
     {
		  unlink("uploads/tournament/".$image);
     }
    $this->db->where('id', $id);
    $this->db->delete('gs_tournament_info', array('image' => $image)); 
}

public function verifyuserpassword($email,$password)
{
     $update = "UPDATE  `user` SET  `password` = '$password' ,`status` = '1'  WHERE `email` = '".$email."'";
     $query = $this->db->query($update);
     if($query)
       {
	     return 1;
       }
     else
       {
         return 0;
       }
}

public function verifyadminpassword($email,$password)
{
  $query = "UPDATE `gs_admin_user` SET `password` = '$password' WHERE `email` = '$email'";
  $qry = $this->db->query($query);
  if($qry)
  {
   return 1;
  }
  else
  {
   return 0;
  }



}

public function Emailfind($email)
{
      $this->db->select('*');
      $this->db->from('user u');
      $this->db->where('u.email', $email);
      $query = $this->db->get();
	  $data =  $query->result_array();
	  if($data)
	  {
	    return $data[0];
      }
      else
      {
         return $data;
      }
}

public function admin_Emailfind($email)
{
   $this->db->select('adminid');
   $this->db->from('gs_admin_user ad');
   $this->db->where('ad.email',$email);
   $query = $this->db->get();
   $data = $query->result_array();
   if($data)
   {
      return $data[0];
   }else
   {
     return 0;
   }


}

public function passwordfind($email)
{   
	  $this->db->select('password');
      $this->db->from('user u');
      $this->db->where('u.email', $email);
      $query = $this->db->get();
	  $data =  $query->result_array();
	  $test="";
	  $test1=md5($test);
	  if($data[0]['password']==$test1)
	  {
	    return 1;
	  }
      else
      {
        return 0;
      }   
}

public function adminpasswordfind($email)
{
	$this->db->select('password');
	$this->db->from('gs_admin_user ad');
	$this->db->where('ad.email', $email);
	$query = $this->db->get();
	$data = $query->result_array();
	$test = "";
	$test1 = md5($test);
	if($data[0]['password'] == $test1)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}

public function event($id)
{
	$this->db->from('gs_eventinfo');
	$this->db->where('userid', $id);
    $query = $this->db->get();
    $rowcount = $query->num_rows();
    return $rowcount;
}

public function deleteEvent($id)
{ $this->remove_Image($id);
  $this->db->where('id',$id);
  $this->db->delete('gs_eventinfo');
} 
public function remove_Image($id)
{

$this->db->from('gs_eventinfo');
$this->db->where('id',$id);
$query = $this->db->get();
$q =  $query->result_array();
if($q[0]['image'] != '' && file_exists("uploads/tournament/".$q[0]['image']))
{
unlink("uploads/event/".$q[0]['image']);
}
//return true;
}
public function resources($id)
{
	$this->db->from('gs_resources');
	$this->db->where('userid', $id);
    $query = $this->db->get();
    $rowcount = $query->num_rows();
    return $rowcount;
}
public function tournament($id)
{
	$this->db->from('gs_tournament_info');
	$this->db->where('userid', $id);
    $query = $this->db->get();
    $rowcount = $query->num_rows();
    return $rowcount;
}
public function job($id)
{
	$this->db->from('gs_jobInfo');
	$this->db->where('userid', $id);
    $query = $this->db->get();
    $rowcount = $query->num_rows();
    return $rowcount;
}
public function content($id)
{
	$this->db->from('cms_content');
	$this->db->where('userid', $id);
    $query = $this->db->get();
    $rowcount = $query->num_rows();
    return $rowcount;
}

public function profileimage($id,$image)
{
	//print_r($id);die;
     $update = "UPDATE  `user` SET  `user_image` = '$image'   WHERE `userid` = '$id' ";
     $query = $this->db->query($update);
     if($query)
       {
	     return 1;
       }
     else
       {
         return 0;
       }
}

public function updateemail($id,$email)
{

  $update ="UPDATE `user` SET  `email` = '$email' , `password` = '' WHERE `userid` = '$id' ";
  $query = $this->db->query($update);
  if($query)
  {
  	return 1;
  }
  else {
  	return 0 ;
  }
}

public function updateadminemail($id,$email)
{
    $update = "UPDATE `gs_admin_user` SET `email` = '$email' WHERE `adminid` = '$id'";
    $query = $this->db->query($update);
    if($query)
    {
    	return 1;
    }
    else
    {
    	return 0;
    }
}

public function getprofession()
{

        $this->db->select('*');
		$this->db->from('gs_profession GR');
	    $this->db->where('GR.profession_type ','P');
		
		$query = $this->db->get();
		$q =  $query->result_array();
		
		return $q;
}

public function savequestion($item)
{	
  $insert = "INSERT INTO `gs_assess_question`(`userid`,`id`,`question`,`age_group`,`gender`,`sport`,`publish`,`proffession`,`date_created`) VALUES('$item->userid','$item->id','$item->question','$item->age_group','$item->gender','$item->sport','$item->publish','$item->proffession',CURDATE())  ON DUPLICATE KEY UPDATE `question`= '$item->question',`age_group`='$item->age_group',`gender`='$item->gender', `publish`='$item->publish',`sport`='$item->sport',`proffession`='$item->proffession',`date_updated`=CURDATE()";

      $query = $this->db->query($insert);

	  if($query)
	  {
	     return 1;
	  }else
	  {
	  	return 0;
	  }

}

public function updatequestion($item)
{	

	//print_r($item);
  
    $update = "UPDATE  `gs_assess_question` SET  `question` ='$item->question' , `date_updated` = CURDATE() WHERE `id` = '$item->id' ";
    $query = $this->db->query($update);
    if($query)
    {
	  return 1;
    }
    else
    {
      return 0;
    }

}

public function getproffessioninfo($id = false)
{
		$this->db->select('id,sport,question,age_group,gender,proffession,publish');
		// $this->db->group_by('sport');
		$this->db->from('gs_assess_question GR');
		if($id > 0){
			$this->db->where('GR.id', $id);
		}else{
		 $this->db->order_by("GR.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		//_pr($q);
		return $q;
	}

public function Statusquestion($item)
{
    $update = "UPDATE  `gs_assess_question` SET  `publish` ='$item->publish' , `date_updated` = CURDATE() WHERE `id` = '$item->id' ";
    $query = $this->db->query($update);
    if($query)
    {
	  return 1;
    }
    else
    {
      return 0;
    }
}	

public function getproffession($id = false)
{
		$qry = $this->db->get('gs_profession');
		return $qry->result_array();
}

public function getanalytics($id = false)
{   
	   $this->db->select('*');
		// $this->db->group_by('sport');
		$this->db->from('gs_perf_analytics GR');
		if($id > 0)
		{
			$this->db->where('GR.id', $id);
		}else{
		 $this->db->order_by("GR.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		//_pr($q);
		return $q;
}

public function getQuestions($id=false)
{
        $this->db->select('*');
		$this->db->from('gs_assess_question GR');
		if($id > 0)
		{
			$this->db->where('GR.id', $id);
		}else{
		 $this->db->order_by("GR.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		//_pr($q);
		return $q;
}

public function searchanalytics($id)
{ 
    $query = "SELECT * FROM `gs_perf_analytics` WHERE `id`='$id'";
    $sql = $this->db->query($query);
    $result = $sql->result_array();
    return $result;
}
public function saveanalytics($item)
{

  $insert = "INSERT `gs_perf_analytics`(`id`,`sport`,`section`,`age_group`,`gender`,`date_created`) VALUES('$item->id','$item->sport','$item->section','$item->agegroup','$item->gender',CURDATE()) ";

$query = $this->db->query($insert);
if($query)
{
	return 1;
} 
else
{
	return 0;
}
}

public function searchsection($id)
{
    $sql="SELECT `section` FROM `gs_perf_analytics` WHERE `id` = '$id'";
    $query=$this->db->query($sql);
    $result=$query->result_array();
    return $result;
}

public function getstate($gender)
{
    $sql="SELECT * FROM `gs_age_group` WHERE `gender` = '$gender'";
    $query=$this->db->query($sql);
    $result=$query->result_array();
    return $result;
}
public function update_analytics($id,$section)
{
$update = "UPDATE `gs_perf_analytics` SET `section` = '$section' WHERE `id` = '$id'";

$query = $this->db->query($update);
if($query)
{
	return 1 ;
}
else {
	return 0;
}
}

public function user_register($item)
{
	$insert = "INSERT `user`(`name`,`userType`,`email`,`sport`,`gender`,`dob`,`prof_id`,`prof_name`,`contact_no`,`access_module`,`forget_code`) VALUES ('$item->name','$item->userType','$item->email','$item->sport','$item->gender','$item->dob','$item->prof_id','$item->prof_name','$item->phone_no','$item->access_module','$item->forget_code')";

	$query = $this->db->query($insert);
	if($query)
	{
	   $id = mysql_insert_id();	 
      return $id;
	}
	else
	{ 
      return 0;
	}
}


public function performanceguide($item)
 {
  $insert = "INSERT `gs_performance_guide`(`id`,`userid`,`guidelines`,`age_group`,`sport`,`gender`,`date_created`) VALUES('$item->id','$item->userid','$item->guidelines','$item->age_group','$item->sport','$item->gender',CURDATE()) ON DUPLICATE KEY UPDATE `guidelines` = '$item->guidelines' , `publish`='0',`date_updated` = CURDATE()";

  $query = $this->db->query($insert);
  if($query)
  {
  	return 1;
  }
  else
  {
  	return 0 ;
  }
}


public function getperformanceguideline($id = false)
{
    $this->db->select('*');
    $this->db->from('gs_performance_guide GR');
    if($id>0)
    {
       $this->db->where('GR.id',$id);
    }
    else
    {
       $this->db->order_by("GR.id","desc");
    }
    $query = $this->db->get();
    $q = $query->result_array();
    return $q;
}

public function Statusperformanceguidelines($item)
{

	$update = "UPDATE `gs_performance_guide` SET `publish` = '$item->publish' WHERE `id` = '$item->id'";

	$query = $this->db->query($update);
	if($query)
	{
          return 1;
	}
	else {
		  return 0;
	}
}

public function getrating($userid)
{
    $query = "SELECT `q1`,`q2`,`q3`,`q4`,`q5`,`total_rating` FROM `gs_rating` WHERE `entity_id`='$userid'";
    $sql = $this->db->query($query);
    $result = $sql->result_array();
    return $result;

    

}

public function cheakeventtype($type)
{
    $query = "SELECT `id`  FROM `gs_eventType` WHERE `type` = '$type'";
    $sql = $this->db->query($query);
    $result = $sql->result_array();
    return $result ;

}
public function CreateEventType($type)
{
   $insert = "INSERT `gs_eventType`(`type`) VALUES('$type')";
   $data = $this->db->query($insert);
   if($data)
   {
   	return 1;
   }
   else
   {
   	return 0;
   }

}

public function getuseremail($id)
{
   $query = "SELECT `email`,`name` FROM `user` WHERE `userid` = '$id'";
   $sql = $this->db->query($query);
   $result = $sql->result_array();
   return $result;
}
public function user_dashboard_event($userid)
{
    $query = "SELECT * FROM `gs_eventinfo` WHERE `userid` = '$userid' ORDER BY `id` desc  limit 3";
    $sql = $this->db->query($query);
    $result = $sql->result_array();
    return $result;
}

public function user_dashboard_tournamnet($userid)
{
   $query = "SELECT * FROM `gs_tournament_info` WHERE `userid` = '$userid' ORDER BY `id` desc limit 3";
   $sql = $this->db->query($query);
   $result = $sql->result_array();
   return $result;
}
 
 public function user_dashboard_job($userid)
 {
    $query = "SELECT * FROM `gs_jobInfo` WHERE `userid` = '$userid' ORDER BY `id` desc limit 3";
    $sql = $this->db->query($query);
    $result = $sql->result_array();
    return $result;
 }

 public function angulartest($username,$password)
{
$this->db->where("email", $username);
$this->db->where("password", $password);
$qry = $this->db->get('user');
if($qry->num_rows() > 0)
{
$q = $qry->row_array();	
 
$data['customer'] = $q['name'];
$data['customerId'] = $q['userType'];
$data['lxDrivePath'] =  $q['name'];
$data['name']     =  $q['name'];
$data['password'] =$q['password'];
$data['userId'] = $q['userid'];
$data['userName'] =$q['email'];
$data['imageUrl'] =$q['name'];

return $data;
}
else
{
return 0;
}

    //$query = "SELECT `id`,`city` FROM `location`  ORDER BY `id` desc limit 20";
    //$sql = $this->db->query($query);
    //$result = $sql->result_array();
   // return $result;
}
 
public function create_log($data,$userid)
 {  
	$query = $this->db->query($data);
		if($query)
			{   $res = mysql_query("SELECT COUNT(al.`activity`) AS creation, us.`device_id`  FROM `gs_activity_log` AS al LEFT JOIN `user` AS us ON us.`userid` = al.`userid` WHERE us.`userid` = '$userid' AND `activity` = 'create'");
				if(mysql_num_rows($res)>0)
				{

				$row  = mysql_fetch_assoc($res);
				{ $data = array('creation' => 1,'indicator'=>9,'message'=>'user creations' );
				  $registatoin_ids = $row['device_id'];
				  $message =  $data;
				  $send = $this->sendPushNotificationToGCM($registatoin_ids, $message);
				  //echo $send."nitin";
				}


				}   
				return 1;

			}
		else
			{
				return 0;
			}

}

public function sendPushNotificationToGCM($registatoin_ids, $message) 
{

  $device=(explode("|",$registatoin_ids));

  foreach ($device as $key => $value) {
    $registration_ids = $value;
    $google_api = "AIzaSyAF1SYN40Gf_JD2J6496-cLnfT_eX4gRt8";
   $this->sendNotification($registration_ids, $message,$google_api);
  //  return $Notification;
  }
 
    
} //End function


public function sendNotification($registration_ids, $message,$google_api)
{
   //Google cloud messaging GCM-API url
        $url = 'https://gcm-http.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registration_ids,
            'data' => $message,
        );
          $message = array('data1'=>$message);
          $data = array('data'=>$message,'to'=>$registration_ids);
          json_encode($data);

        //print_r($fields);
    // Google Cloud Messaging GCM API Key
        //define("GOOGLE_API", $google_api);    
        $headers = array(
            'Authorization: key=' .$google_api,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);       
        if ($result === FALSE) {
            //die('Curl failed: ' . curl_error($ch));
        return 0;
        }
        curl_close($ch);
       // return $result;
       return 1;
}

public function Registration_userdata($item)
{
   $insert = "INSERT `gs_userdata`(`userid`,`prof_id`,`user_detail`,`created_date`) VALUES('$item->id','$item->prof_id','$item->userdata',CURDATE()) ON DUPLICATE KEY UPDATE `user_detail` = '$item->userdata',`updated_date` = CURDATE() ";

	$query = $this->db->query($insert);
	if($query)
	{
      return 1;
	}
	else
	{ 
      return 0;
	}

}
 public function alter_DateFormat($date)
	{
	$oldDate = $date;
	$arr = explode('-', $oldDate);
	$newDate = $arr[1].'/'.$arr[2].'/'.$arr[0];
	return $newDate;
	}
}
 ?>