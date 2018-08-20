<?php

		
class Register extends CI_Model
{

public function login_google($username,$password)
{
// $where = " email = '$username'  AND password = '$password'"; 
$this->db->where("email", $username);
$this->db->where("password", $password);
$qry = $this->db->get('user');
if($qry->num_rows() > 0)
{
    $q = $qry->row_array();
if(($q['userType']==104 || $q['userType']==103) && $q['activeuser'])
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


public function user_basic($id)
{  
  $this->db->where("userid",$id);
  $query = $this->db->get('user');
	  if($query->num_rows()>0)
	  {
	  	 $q = $query->row_array();
	     return $q;
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
	 $udata['userid'] = $q['userid'];
	 $udata['prof_id'] = $q['prof_id'];
	 
return $udata;
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
$data = array(
    'id'=> $item->id,
    'userid'=>$item->userid,
    'name'=>$item->name,
    'type'=>$item->type,
    'address_1'=>$item->address_line1,
    'address_2'=>$item->address_line2,
    'location'=>$item->city,
    'PIN'=>$item->pin,
    'description'=>$item->description,
    'state'=>$item->state,
    'organizer_name'=>$item->organizer_name,
    'mobile'=>$item->mobile,
    'organizer_address_line1'=>$item->organizer_address_line1,
    'organizer_address_line2'=>$item->organizer_address_line2,
    'organizer_city'=>$item->organizer_city,
    'organizer_pin'=>$item->organizer_pin, 
    'organizer_state'=>$item->organizer_state,
    'event_links'=>$item->event_links,
    'start_date'=>date("Y-m-d", strtotime($item->start_date)),
    'end_date'=>date("Y-m-d", strtotime($item->end_date)),
    'sport'=>$item->sport,
    'sport_name'=>$item->sport_name,
    'entry_start_date'=>date("Y-m-d", strtotime($item->entry_start_date)),
    'entry_end_date'=>date("Y-m-d", strtotime($item->entry_end_date)),
    'email_app_collection'=>$item->email_app_collection,
    'image'=>$item->image,
    'ticket_detail'=>$item->ticketdetails,
    'terms_cond1'=>$item->terms_and_conditions1,
    'eligibility1'=>$item->eligibility1,
    'dateCreated' => date('Y-m-d')

);

if($this->db->insert('gs_eventinfo', $data))
{
	return 1;
}
else
{
	return 0;
}
}



//STR_TO_DATE('$date', '%m/%d/%Y')
 
// $insert = "INSERT INTO `gs_eventinfo`(`id`, `userid`,`name`, `type`, `address_1`, `address_2`, `location`, `PIN`,`state` ,`description`, `sport`,`sport_name`,`eligibility1`,`terms_cond1`,  `organizer_name`, `mobile`,`organizer_address_line1`, `organizer_address_line2`, `organizer_city`, `organizer_pin`,`organizer_state` ,`event_links`, `start_date`, `end_date`, `entry_start_date`, `entry_end_date`, `email_app_collection`, `dateCreated`,`image`,`feetype`,`ticket_detail`)



//  VALUES ('$item->id','$item->userid','$item->name', '$item->type','$item->address1','$item->address2','$item->city','$item->pin','$item->state','$item->description','$item->sport','$item->sport_name','$item->eligibility1','$item->tandc1','$item->organizer_name','$item->mobile','$item->org_address1','$item->org_address2','$item->organizer_city','$item->organizer_pin','$item->organizer_state','$item->event_links',

//  STR_TO_DATE('$item->start_date','%m/%d/%Y'),STR_TO_DATE('$item->end_date','%m/%d/%Y'), STR_TO_DATE('$item->entry_start_date','%m/%d/%Y'),STR_TO_DATE('$item->entry_end_date','%m/%d/%Y'),'$item->email_app_collection',CURDATE(),'$item->image','$item->feetype','$item->ticket_detail') ON DUPLICATE KEY UPDATE `name` = '$item->name',`address_1` = '$item->address1' ,`address_2` = '$item->address2' ,`location` = '$item->city' ,`state` = '$item->state', `PIN` = '$item->pin' , `description` = '$item->description',`sport` = '$item->sport',`sport_name`='$item->sport_name',`eligibility1` = '$item->eligibility1' , `terms_cond1` = '$item->tandc1',  `organizer_name` = '$item->organizer_name' ,  `mobile` ='$item->mobile' ,`organizer_address_line1` = '$item->org_address1' , `organizer_address_line2` = '$item->org_address2' , `organizer_city` = '$item->organizer_city' , `organizer_pin` = '$item->organizer_pin', `organizer_state` = '$item->organizer_state' ,  `event_links` = '$item->event_links' , `start_date` = STR_TO_DATE('$item->start_date','%m/%d/%Y') ,`end_date` = STR_TO_DATE('$item->end_date','%m/%d/%Y') ,  `entry_start_date` =STR_TO_DATE('$item->entry_start_date','%m/%d/%Y') , `entry_end_date` = STR_TO_DATE('$item->entry_end_date','%m/%d/%Y') , `email_app_collection` = '$item->email_app_collection',`image`='$item->image',`ticket_detail`='$item->ticket_detail'";

// $query = $this->db->query($insert);

// if($query)
// {  
// // $id = mysql_insert_id();
// 	//$data =  "INSERT INTO `gs_activity_log`(`userid`, `module`,`creation_id`,`activity`, `date_created`) VALUES ('$item->userid','job','$id','create','".date("Y-m-d")."')";
// 	//$log  = $this->create_log($data,$item->userid);
//     // if($log == 1)
//     // {
//      return 1;
// }
// else
// {
//      return 0;
// }

// //}
// //else 
//      //return 0;
// }


 
public function saveTournament($item)
{
  $data = array (
    'id' =>$item->id,
    'userid' => $item->userid,
    'address_1' => $item->address_line1,
    'address_2' => $item->address_line2, 
    'name' => $item->tournament_name,
    'location' => $item->city,
    'pin' => $item->pin,
    'state' => $item->state,
    'description' => $item->description,
    'eligibility1' => $item->eligibility1,
    'eligibility2' => $item->eligibility2,
    'level' => $item->tournament_level,
    'gender' => $item->tournament_gender,
    'terms_and_cond1' => $item->terms_and_conditions1,
    'terms_and_cond2' => $item->terms_and_conditions2,
    'organiser_name' => $item->organizer_name,
    'mobile' => $item->mobile,
    'org_address1' => $item->organizer_address_line1,
    'org_address2' => $item->organizer_address_line2,
    'org_city' => $item->organizer_city,
    'org_pin' => $item->organizer_pin, 
    'tournaments_link' => $item->tournament_links,
    'start_date' =>date("Y-m-d", strtotime($item->start_date)),
    'end_date' => date("Y-m-d", strtotime($item->end_date)),
    'sport' => $item->sport,
    'event_entry_date' => date("Y-m-d", strtotime($item->entry_start_date)),
    'event_end_date' => date("Y-m-d", strtotime($item->entry_end_date)),
    'email' => $item->emailid,
    'age_group' => $item->tournament_ageGroup,
    'file_name' => $item->file_name,
    'image' => $item->image,
    'date_created' => date('Y-m-d'),
    'publish' => 0
);


if($this->db->insert('gs_tournament_info', $data))
{
  return 1;
}
else
{
  return 0;
}

} // End of function



public function edit_Tournament($item)
{
  
    $data = array (
    'address_1' => $item->address_line1,
    'address_2' => $item->address_line2, 
    'name' => $item->tournament_name,
    'location' => $item->city,
    'pin' => $item->pin,
    'state' => $item->state,
    'description' => $item->description,
    'eligibility1' => $item->eligibility1,
    'eligibility2' => $item->eligibility2,
    'level' => $item->tournament_level,
    'gender' => $item->tournament_gender,
    'terms_and_cond1' => $item->terms_and_conditions1,
    'terms_and_cond2' => $item->terms_and_conditions2,
    'organiser_name' => $item->organizer_name,
    'mobile' => $item->mobile,
    'org_address1' => $item->organizer_address_line1,
    'org_address2' => $item->organizer_address_line2,
    'org_city' => $item->organizer_city,
    'org_pin' => $item->organizer_pin, 
    'tournaments_link' => $item->tournament_links,
    'start_date' =>date("Y-m-d", strtotime($item->start_date)), 
    'end_date' =>date("Y-m-d", strtotime($item->end_date)), 
    'sport' => $item->sport,
    'event_entry_date' => date("Y-m-d", strtotime($item->entry_start_date)),
    'event_end_date' =>date("Y-m-d", strtotime($item->entry_end_date)),
    'email' => $item->emailid,
    'age_group' => $item->tournament_ageGroup,
    'file_name' => $item->file_name,
    'image' => $item->image,
    'date_updated' => date('Y-m-d'),
    'publish' => 0
);

$this->db->where('id',$item->id);
if($this->db->update('gs_tournament_info', $data))
{
  return 1;
}
else
{
  return 0;
}

} // End of function





// $insert = "INSERT INTO `gs_tournament_info`(`id`, `userid`, `name`, `address_1`, `address_2`, `location`,`state`, `pin`, `description`,`sport` ,`level`, `age_group`, `gender`, `eligibility1`,`eligibility2`, `terms_and_cond1`, `terms_and_cond2`, `organiser_name`, `mobile`, `email`, `org_address1`, `org_address2`, `org_city`, `org_pin`, `tournaments_link`, `start_date`, `end_date`, `event_entry_date`, `event_end_date`, `file_name`,`date_created`,`publish`,`image`) 
// VALUES ('$item->id','$item->userid','$item->type','$item->address_line1','$item->address_line2','$item->city','$item->state','$item->pin','$item->description','$item->sport','$item->tournament_level','$item->tournament_ageGroup','$item->tournament_gender','$item->eligibility1','$item->eligibility2','$item->terms_and_conditions1','$item->terms_and_conditions2','$item->organizer_name','$item->mobile','$item->emailid','$item->organizer_address_line1','$item->organizer_address_line2','$item->organizer_city','$item->organizer_pin','$item->tournament_links',STR_TO_DATE('$item->start_date','%m/%d/%Y'),STR_TO_DATE('$item->end_date','%m/%d/%Y'),STR_TO_DATE('$item->entry_start_date','%m/%d/%Y') ,STR_TO_DATE('$item->entry_end_date','%m/%d/%Y'),'$item->file_name',CURDATE(),'$item->publish','$item->image') ON DUPLICATE KEY UPDATE `name` = '$item->type', `address_1` = '$item->address_line1' , `address_2` = '$item->address_line2' , `location` = '$item->city' ,`state`='$item->state' ,`pin` = '$item->pin' , `description` = '$item->description',`sport`='$item->sport',`level` = '$item->tournament_level',`age_group`='$item->tournament_ageGroup',`gender` = '$item->tournament_gender',`eligibility1` = '$item->eligibility1' ,`eligibility2` = '$item->eligibility2', `terms_and_cond1` = '$item->terms_and_conditions1', `terms_and_cond2` = '$item->terms_and_conditions2',`organiser_name` = '$item->organizer_name' , `mobile` = '$item->mobile' , `email` = '$item->emailid' , `org_address1` = '$item->organizer_address_line1' , `org_address2` = '$item->organizer_address_line2' , `org_city` = '$item->organizer_city', `org_pin` = '$item->organizer_pin' , `tournaments_link` = '$item->tournament_links' ,`start_date` = STR_TO_DATE('$item->start_date','%m/%d/%Y') , `end_date` = STR_TO_DATE('$item->end_date','%m/%d/%Y') , `event_entry_date` = STR_TO_DATE('$item->entry_start_date','%m/%d/%Y') , `event_end_date` = STR_TO_DATE('$item->entry_end_date','%m/%d/%Y'),`publish`= '$item->publish',`image`='$item->image'";
 
// $query = $this->db->query($insert);

// if($query)
// {
//      return 1;
//  }
//  else
//  {
//      return 0;
//  }
 
// //}
// //else 
// //      return 0;
// }




public function create_job($item)
{
 $data = array(
         'id' => $item->id,
         'userid' => $item->userid,
         'title' => $item->title,
         'gender' => $item->gender,
         'sport' => $item->sports,
         'type' => $item->type,
         'work_experience' => $item->work_experience,
         'description' => $item->description,
         'desired_skills' => $item->desired_skills,
         'qualification' => $item->qualification,
         'key_requirement' => $item->key_requirement,
         'org_address1' => $item->org_address1,
         'org_address2' => $item->org_address2,
         'org_city' => $item->org_city,
         'org_state' => $item->org_state, 
         'org_pin' => $item->org_pin,
         'organisation_name' => $item->organisation_name,
         'about' => $item->about,
         'address1' => $item->address_line1,
         'address2' => $item->address_line2,
         'state' => $item->state,
         'city' => $item->city,
         'pin' => $item->pin,
         'contact' => $item->contact,
         'image' => $item->image,
         'email' => $item->email_app_collection,
         'job_link' => $item->job_links,
         'date_created' => date('Y-m-d'),
         'date_updated' => date('Y-m-d')
);


if($this->db->insert('gs_jobInfo', $data))
{
	return 1;
}else
{
	return 0;
}



// $insert = "INSERT INTO `gs_jobInfo`(`id`, `userid`, `title`, `gender`, `sport`, `type`, `work_experience`, `description`, `desired_skills`, `qualification`, `key_requirement`, `org_address1`, `org_address2`, `org_city`, `org_state`, `org_pin`, `organisation_name`, `about`, `address1`, `address2`, `state`, `city`, `pin`, `contact`, `image`,`email`,`job_link`, `date_created`) VALUES ('$item->id','$item->userid','$item->title','$item->gender','$item->sports','$item->type','$item->work_exp','$item->desc','$item->desiredskill','$item->qualification','$item->keyreq','$item->org_address1','$item->org_address2','$item->org_city','$item->org_state','$item->org_pin','$item->org_name','$item->about','$item->address1','$item->address2','$item->state','$item->city','$item->pin','$item->contact','$item->image','$item->email','$item->job_link',CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$item->title' , `sport` = '$item->sports',`gender` = '$item->gender' ,`type` = '$item->type' , `work_experience` = '$item->work_exp' , `description` = '$item->desc' , `desired_skills` = '$item->desiredskill' , `qualification` = '$item->qualification' , `key_requirement` = '$item->keyreq' , `organisation_name` = '$item->org_name' , `about` = '$item->about', `image` = '$item->image' , `contact` = '$item->contact' , `email` = '$item->email' , `date_created` = CURDATE(), `org_address1` = '$item->org_address1',`org_address2` = '$item->org_address2',`org_city` = '$item->org_city' , `org_pin` = '$item->org_pin' , `org_state`= '$item->org_state' , `address1`= '$item->address1' , `address2` = '$item->address2' , `city` = '$item->city' , `state` = '$item->state' , `publish` = 0, `pin` = '$item->pin',`job_link` = '$item->job_link'";
// $query = $this->db->query($insert);
// if($query)
// {
//      return 1;
// }
// else
// {
//      return 0;
// }

} 

public function Republish($id)
{

$data =  array('date_updated' => date('Y-m-d'));
$this->db->where('id',$id);
if($this->db->update('gs_jobInfo',$data))
{
	return 1;
}
else
{
	return 0;
}

}


public function save_Edit_Job($item)
{

$id = $item->id;

 $data = array(
         'userid' => $item->userid,
         'title' => $item->title,
         'gender' => $item->gender,
         'sport' => $item->sports,
         'type' => $item->type,
         'work_experience' => $item->work_experience,
         'description' => $item->description,
         'desired_skills' => $item->desired_skills,
         'qualification' => $item->qualification,
         'key_requirement' => $item->key_requirement,
         'org_address1' => $item->org_address1,
         'org_address2' => $item->org_address2,
         'org_city' => $item->org_city,
         'org_state' => $item->org_state, 
         'org_pin' => $item->org_pin,
         'organisation_name' => $item->organisation_name,
         'about' => $item->about,
         'address1' => $item->address_line1,
         'address2' => $item->address_line2,
         'state' => $item->state,
         'city' => $item->city,
         'pin' => $item->pin,
         'contact' => $item->contact,
         'image' => $item->image,
         'job_link' => $item->job_links,
         'email' => $item->email_app_collection,
         'date_created' => date('Y-m-d'),
         'date_updated' => date('Y-m-d')
);


$this->db->where('id',$id);
if($this->db->update('gs_jobInfo',$data))
{
	return 1;
}
else
{
	return 0;
}


}


// $insert = "INSERT INTO `gs_jobInfo`(`id`, `userid`, `title`, `gender`, `sport`, `type`, `work_experience`, `description`, `desired_skills`, `qualification`, `key_requirement`, `org_address1`, `org_address2`, `org_city`, `org_state`, `org_pin`, `organisation_name`, `about`, `address1`, `address2`, `state`, `city`, `pin`, `contact`, `image`,`email`, `date_created`) VALUES ('$item->id','$item->userid','$item->title','$item->gender','$item->sports','$item->type','$item->work_exp','$item->desc','$item->desiredskill','$item->qualification','$item->keyreq','$item->org_address1','$item->org_address2','$item->org_city','$item->org_state','$item->org_pin','$item->org_name','$item->about','$item->address1','$item->address2','$item->state','$item->city','$item->pin','$item->contact','$item->image','$item->email',CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$item->title' , `sport` = '$item->sports',`gender` = '$item->gender' ,`type` = '$item->type' , `work_experience` = '$item->work_exp' , `description` = '$item->desc' , `desired_skills` = '$item->desiredskill' , `qualification` = '$item->qualification' , `key_requirement` = '$item->keyreq' , `organisation_name` = '$item->org_name' , `about` = '$item->about', `image` = '$item->image' , `contact` = '$item->contact' , `email` = '$item->email' , `date_created` = CURDATE(), `org_address1` = '$item->org_address1',`org_address2` = '$item->org_address2',`org_city` = '$item->org_city' , `org_pin` = '$item->org_pin' , `org_state`= '$item->org_state' , `address1`= '$item->address1' , `address2` = '$item->address2' , `city` = '$item->city' , `state` = '$item->state' , `publish` = 0, `pin` = '$item->pin'";
// $query = $this->db->query($insert);
// if($query)
// {
// 	return 1;
// }
// else
// {
//    return 0;
// }
// }


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
{   $this->db->select('*');
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
 $data = array(
 		 'userid' => $item->userid,
         'title' => $item->title,
         'url' => $url,
         'description' => $item->description,
         'summary' => $item->summary,
         'image' => $item->image,
         'keyword' => $item->keyword,
         'topic_of_artical' => $item->topic_of_artical,
         'sport' => $item->sport,
		     'location' => $item->location,
         'token' => $item->token,
         'status' => $item->status,
         'date_created' => date('Y-m-d'),
         'video_link' => $video_url,

);

if($this->db->insert('gs_resources', $data))
{
	return 1;

}else
{
	return 0;
}


// $insert = "INSERT INTO `gs_resources`(`userid`,`title`, `url`, `description`,`summary`, `image`, `keyword`, `topic_of_artical`, `sport`,`location`,`token`,`status`,`date_created`,`video_link`) VALUES ('$item->userid','$item->title','$url','$item->description','$item->summary','$item->image','$item->keyword','$item->topic_of_artical','$item->sport','$item->location','$item->token','$item->status',CURDATE(),'$video_url')";
// $query = $this->db->query($insert);
// if($query)
// {
// 	return 1;
// }
// else
// {
//    return 0;
// }
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


 $data = array(
 	    //  'id'   => $item->id,
         'userid' => $item->userid,
         'title' => $item->title,
         'url' => $url,
         'description' => $item->description,
         'summary' => $item->summary,
         'image' => $item->image,
         'keyword' => $item->keyword,
         'topic_of_artical' => $item->topic_of_artical,
         'sport' => $item->sport,
		 'location' => $item->location,
         'token' => $item->token,
         'status' => $item->status,
         'video_link' => $video_url,
);

//print_r($data);//die;

$this->db->where('id',$item->id);
if($this->db->update('gs_resources', $data))
{
	return 1;
}else
{
	return 0;
}




//  $insert = "INSERT INTO `gs_resources`(`id`, `userid`,`title`, `url`,`video_link`,`description`,`summary`, `image`, `keyword`, `topic_of_artical`, `sport`,`location`,`token`,`status`,`date_created`) VALUES ('$item->id','$item->userid','$item->title','$url','$video_url','$item->description','$item->summary','$item->image','$item->keyword','$item->topic_of_artical','$item->sport','$item->location','$item->token','$item->status',CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$item->title' , `url` = '$url',`video_link` = '$video_url',`description` = '$item->description', `summary` = '$item->summary',`image` ='$item->image',`keyword` ='$item->keyword' , `topic_of_artical` ='$item->topic_of_artical',`sport` = '$item->sport',`status` ='$item->status',`location` ='$item->location'";

// $query = $this->db->query($insert);
// if($query)
// {
// 	return 1;
// }
// else
// {
//    return 0;
// }
}


public function edit_event($item)
{
 $data = array(
    
    'name'=>$item->name,
    'type'=>$item->type,
    'address_1'=>$item->address_line1,
    'address_2'=>$item->address_line2,
    'location'=>$item->city,
    'PIN'=>$item->pin,
    'description'=>$item->description,
    'state'=>$item->state,
    'organizer_name'=>$item->organizer_name,
    'mobile'=>$item->mobile,
    'organizer_address_line1'=>$item->organizer_address_line1,
    'organizer_address_line2'=>$item->organizer_address_line2,
    'organizer_city'=>$item->organizer_city,
    'organizer_pin'=>$item->organizer_pin, 
    'organizer_state'=>$item->organizer_state,
    'event_links'=>$item->event_links,
    'start_date'=>date("Y-m-d", strtotime($item->start_date)),
    'end_date'=>date("Y-m-d", strtotime($item->end_date)), 
    'sport'=>$item->sport,
    'sport_name'=>$item->sport_name,
    'entry_start_date'=>date("Y-m-d", strtotime($item->entry_start_date)),
    'entry_end_date'=>date("Y-m-d", strtotime($item->entry_end_date)), 
    'email_app_collection'=>$item->email_app_collection,
    'image'=>$item->image,
    'ticket_detail'=>$item->ticketdetails,
    'terms_cond1'=>$item->terms_and_conditions1,
    'eligibility1'=>$item->eligibility1,
    'date_updated' => date('Y-m-d')

  
);



$this->db->where('id',$item->id);

if($this->db->update('gs_eventinfo', $data))
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
public function StatusPropertyUpdate($item)
{
   $update = "UPDATE  `gs_prop_list` SET  `status` ='$item->publish' , `date_updated` = CURDATE() WHERE `id` = '$item->id' ";
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
public function StatusAdevrtismentUpdate($item)
{
   $update = "UPDATE  `gs_ad_feature` SET  `active_status` ='$item->publish' WHERE `id` = '$item->id' ";
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

    
            $this->db->select('*');
            $this->db->from('gs_admin_user');
            $this->db->where('userType','102');
            $query = $this->db->get();

           if($query->num_rows() > 0)
           {
            $row = $query->result_array();
            return $row;
           }
           else
           {
           	return 0;
           }

   // $query = $this->db->get('gs_admin_user');
   // $q = $query->result_array();
   // return $q;

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
     
  //  $this->db->where('id', $id);
   
  //  $this->db->delete('gs_jobInfo', array('image' => $image)); 
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
   // $this->db->where('id', $id);
   // $this->db->delete('gs_tournament_info', array('image' => $image)); 
}
public function removeadimage($id,$image)
{
    

    if(file_exists("uploads/advertisment/".$image))
     {
          unlink("uploads/advertisment/".$image);
     }
   // $this->db->where('id', $id);
   // $this->db->delete('gs_tournament_info', array('image' => $image)); 
}
public function removepropertyimage($id,$image)
{
    

    if(file_exists("uploads/property/".$image))
     {
          unlink("uploads/property/".$image);
     }
   // $this->db->where('id', $id);
   // $this->db->delete('gs_tournament_info', array('image' => $image)); 
}
public function verifyuserpassword($email,$password)
{
     $update = "UPDATE  `user` SET  `password` = '$password' ,`status` = '1' ,`userType` = '103' WHERE `email` = '".$email."' AND `userType` > 102";
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
	$insert = "INSERT INTO `user`(`name`,`userType`,`email`,`sport`,`gender`,`dob`,`location`,`prof_id`,`prof_name`,`contact_no`,`access_module`,`forget_code`) VALUES ('$item->name','$item->userType','$item->email','$item->sport','$item->gender','$item->dob','$item->location','$item->prof_id','$item->prof_name','$item->phone_no','$item->access_module','$item->forget_code')";
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
  
   $data = $this->prof_data($item->id);
   if($data == 0)
   {
   $data = array(
        'userid' => $item->id,
        'prof_id' =>$item->prof_id,
        'user_detail' => $item->userdata,
        'created_date'=> date("Y-m-d")
        );	
  

   $sql = $this->db->insert('gs_userdata', $data);
   }
   else
   {
    $data = array(
        'prof_id' =>$item->prof_id,
        'user_detail' => $item->userdata,
        'updated_date'=> date("Y-m-d")
        );	 
   
    $sql = $this->db->where('userid', $item->id);
           $this->db->update('gs_userdata', $data);

    }
	if($sql)
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


public function prof_data($userid)
{
   $this->db->select('user_detail');
   $this->db->from('gs_userdata');
   $this->db->where('userid',$userid);
   $query = $this->db->get();
   if($query->num_rows() > 0)
   {
        $row = $query->row_array();
        return $row;
   }else
   {
   	return 0;   
   }
}

public function getMessages($id)
 {    
	    $this->db->select('data');
	    $this->db->from('gs_message');
	    $this->db->where('reciever_id',$id);
	    $this->db->order_by('date_created', 'desc');
	    $this->db->limit('10');      
	    $query = $this->db->get();
	       if($query->num_rows() > 0){
	        foreach($query->result_array() as $row){
            $data[] = json_decode($row['data']);
	        }
	    return $data;   
	 }
else
	{
		return 0;
	}
}

public function user_update($item,$id)
{ 
 $update = "UPDATE `user` SET `name` = '$item->name' , `userType` = '$item->userType',`email`='$item->email',`sport` = '$item->sport',`gender`='$item->gender',`dob`='$item->dob',`location`='$item->location',`prof_id`='$item->prof_id'             ,`prof_name`= '$item->prof_name',`contact_no` = '$item->phone_no',`access_module`='$item->access_module',`forget_code` = '$item->forget_code' ,`date_updated` = CURDATE() WHERE `email` = '$item->email' AND `userid` = '$id'";
 $query = $this->db->query($update);
	if($query)
	{
	  // $id = mysql_insert_id();	 
      return $id;
	}
	else
	{ 
      return 0;
	}

}

public function update_user_profile($record,$userid)
{
  //echo "UPDATE `user` SET ".$record." WHERE `userid` = ".$userid;die;
  $update = "UPDATE `user` SET ".$record." WHERE `userid` = ".$userid;
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

//--------------------------------------------------- 
// Service function for registartion and login through 
// wep portal on site.
// 
// --------------------------------------------------


public function find_user_data($where)
{
  $query = "SELECT `userid`, `userType`, `status`, `name`, `email`, `contact_no`, `sport`, `gender`, `dob`, `prof_id`, `prof_name`, `user_image`, `location`, `device_id`, `date_created`, `date_updated`, `m_device_id`, `M_fb_id`, `L_fb_id`,`google_id` FROM `user` WHERE ".$where."";
  //echo $query;die;
  $sql = mysql_query($query);
  if(mysql_num_rows($sql)>0)
	{
		return mysql_fetch_assoc($sql);
	}
	else
	{
		return 0;
	}
}

public function update_user_data($update,$where)
 {

	$query = "UPDATE `user` SET  ".$update."  WHERE  ".$where." ";
	//echo $query;
	$sql = $this->db->query($query);
	//echo "dasadas";
	if($sql)
	{
		return $this->find_user_data($where);
	}else
	{
		return 0;
	}              

 }
public function create_new_user($data)
 {  
 	$userType = '103';//$_REQUEST['userType'];
 	$name  = $data->name;
 	$email = $data->email; //$_REQUEST['email'];
 	$contact_no = $data->phone_no;
 	$sport = $data->sport;//$_REQUEST['sport'];
 	$gender = $data->gender;// $_REQUEST['gender'];
 	$dob  = $data->dob;//$_REQUEST['dob'];
 	$prof_id = $data->prof_id;//$_REQUEST['prof_id'];
 	$prof_name = $data->prof_name;//$_REQUEST['prof_name'];
    $location = $data->location;
    if($data->user_info->loginType == 1)
    {
      $app_id_field = "`".$data->user_info->app."_fb_id`";
      $id = $data->user_info->data->id;
    }
    else if($data->user_info->loginType == 2)
    {
    	$app_id_field = "`google_id`";
    	$id = $data->user_info->data->id;
    } 
    else
    {
         return 0;
    	//die('Invalid Login');
    }
    // if($apptype != '')
    // {
    //   $fb_id = "`".$app_type."_fb_id`";
    // }
   $password = md5($email);
   $query = "INSERT INTO `user`(`userType`, `name`, `password`,`email`, `contact_no`, `sport`, `gender`, `dob`, `prof_id`, `prof_name`,`location`, `date_created`,".$app_id_field.") VALUES ('$userType','$name','$password','$email','$contact_no','$sport','$gender','$dob','$prof_id','$prof_name','$location',CURDATE(),'$id')";
   $sql = $this->db->query($query);
   $log_id = mysql_insert_id();
   if($sql)
   {

   	$where = "`userid` = '".$log_id."'";
   	return $this->find_user_data($where);
   }
   else
   {
   	return 0;
   }
}

    public function add_property($data)
    {
     $data = json_decode($data);
     $prop_data = array(
        'name' => $data->name,
        'address' => $data->address,
        'location' => $data->location,
        'type'=> $data->type,
        'coaches_info'=> json_encode($data->coaches_info),
        'residential'=>$data->residential,
        'hostel_available'=>$data->hostel,
        'schooling'=>$data->schooling,
        'sports'=>$data->sport,
        'level'=>$data->level,
        'fee'=>$data->fee,
        'email'=>$data->email,
        'phone'=>$data->phone,
        'status'=>'0',
        'image'=>$data->image
      );
     $query = $this->db->insert('gs_prop_list', $prop_data);
     if($query)
     {
        return true;
     }else
     {
        return false;
     }
    }

    public function get_academy_listing($id = false)
    {
       $this->db->select('*');
        $this->db->from('gs_prop_list GR');
        if($id > 0){
            $this->db->where('GR.id', $id);
        }else{
         $this->db->order_by("GR.id", "desc"); 
        }
        $query = $this->db->get();
        $q =  $query->result_array();
        return $q;

    }
    public function deletePropertyFunction($id)
    { 
        $this->property_remove_Image($id);
        $this->db->where('id',$id);
        $this->db->delete('gs_prop_list');
    } 
    public function property_remove_Image($id)
        {

        $this->db->from('gs_prop_list');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $q =  $query->result_array();
        if($q[0]['image'] != '' && file_exists("uploads/property/".$q[0]['image']))
        {
        unlink("uploads/property/".$q[0]['image']);
        }
        //return true;
        }
    public function update_property_data_function($data)
    { 
       $set = array(
        'name' => $data->name,
        'address' => $data->address,
        'location' => $data->location,
        'type'=> $data->type,
        'coaches_info'=> json_encode($data->coaches_info),
        'residential'=>$data->residential,
        'hostel_available'=>$data->hostel,
        'schooling'=>$data->schooling,
        'sports'=>$data->sport,
        'level'=>$data->level,
        'fee'=>$data->fee,
        'email'=>$data->email,
        'phone'=>$data->phone,
        'status'=>'0',
        'image'=>$data->image
        );
        $this->db->where('id', $data->id);
        $resp =  $this->db->update('gs_prop_list', $set);
        if($resp)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    public function create_ad_service($data)
    {    
        $set = array(
        'title' => $data->title,
        'module_data' => json_encode($data->module),
        'start_date' => $data->start_date,
        'end_date'=> $data->end_date,
        'active_status'=>'0',
        'date_created'=>date('Y-m-d H:i:s'),
        'duration'=>$data->duration,
        'image'=> $data->image,
        'app_type'=>$data->app_type
        );
     $query = $this->db->insert('gs_ad_feature', $set);
     if($query)
     {
        return true;
     }
     else
     {
        return false;
     }   
    }

    public function get_advertisement_listing($id = false)
    {
        $this->db->select('*');
        $this->db->from('gs_ad_feature GR');
        if($id > 0)
        {
            $this->db->where('GR.id', $id);
        }
        else
        {
            $this->db->order_by("GR.id", "desc"); 
        }
        $query = $this->db->get();
        $q =  $query->result_array();
        return $q;
    }
    
   public function isJSON($string)
   {
   return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
   }
   public function deleteadvertismentFunction($id)
    { 
        $this->advertisment_remove_Image($id);
        $this->db->where('id',$id);
        $this->db->delete('gs_ad_feature');
    }
    public function advertisment_remove_Image($id)
    {

        $this->db->from('gs_ad_feature');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $q =  $query->result_array();
        if($q[0]['image'] != '' && file_exists("uploads/advertisement/".$q[0]['image']))
        {
        unlink("uploads/advertisement/".$q[0]['image']);
        }
    //return true;
    } 
}

 ?>