<?php


class Register extends CI_Model
{


public function login($username,$password)
{

// $where = " email = '$username'  AND password = '$password'";
$this->db->where("email", $username);
$this->db->where("password", $password);
$qry = $this->db->get('user');

if($qry->num_rows() > 0)
{
$q =  $qry->row_array();
return $q;
}
else
return 0;
}


public function saveEvent($item)
{

$insert =    "INSERT INTO `gs_eventinfo`(`id`, `userid`,`name`, `type`, `address_1`, `address_2`, `location`, `PIN`,`state` ,`description`, `sport`,`eligibility1`,`eligibility2`, `terms_cond1`, `terms_cond2`, `organizer_name`, `mobile`,`organizer_address_line1`, `organizer_address_line2`, `organizer_city`, `organizer_pin`,`organizer_state` ,`event_links`, `start_date`, `end_date`, `entry_start_date`, `entry_end_date`, `file_name`, `email_app_collection`, `dateCreated`) VALUES ('$item->id','$item->userid','$item->name', '$item->type','$item->address1','$item->address2','$item->city','$item->pin','$item->state','$item->description','$item->sport','$item->eligibility1','$item->eligibility2','$item->tandc1','$item->tandc2','$item->organizer_name','$item->mobile','$item->org_address1','$item->org_address2','$item->organizer_city','$item->organizer_pin','$item->organizer_state','$item->event_links',FROM_UNIXTIME ('$item->start_date'),FROM_UNIXTIME ('$item->end_date'),FROM_UNIXTIME ('$item->entry_start_date'),FROM_UNIXTIME ('$item->entry_end_date'),'$item->file_name','$item->email_app_collection',CURDATE()) ON DUPLICATE KEY UPDATE `name` = '$item->name',`address_1` = '$item->address1' ,`address_2` = '$item->address2' ,`location` = '$item->city' ,`state` = '$item->state', `PIN` = '$item->pin' , `description` = '$item->description',`sport` = '$item->sport',`eligibility1` = '$item->eligibility1',`eligibility2` = '$item->eligibility2'  , `terms_cond1` = '$item->tandc1', `terms_cond2` = '$item->tandc2' , `organizer_name` = '$item->organizer_name' ,  `mobile` ='$item->mobile' ,`organizer_address_line1` = '$item->org_address1' , `organizer_address_line2` = '$item->org_address2' , `organizer_city` = '$item->organizer_city' , `organizer_pin` = '$item->organizer_pin', `organizer_state` = '$item->organizer_state' ,  `event_links` = '$item->event_links' , `start_date` = FROM_UNIXTIME ('$item->start_date') ,`end_date` = FROM_UNIXTIME ('$item->end_date') ,  `entry_start_date` = FROM_UNIXTIME ('$item->entry_start_date') , `entry_end_date` = FROM_UNIXTIME ('$item->entry_end_date') , `file_name` = '$item->file_name',`email_app_collection` = '$item->email_app_collection'";


$query = $this->db->query($insert);

if($query)
{

return 1;

}
else 
return 0;
}

public function saveTournament($item)
{

$insert = "INSERT INTO `gs_tournament_info`(`id`, `userid`, `name`, `address_1`, `address_2`, `location`,`state`, `pin`, `description`,`sport` ,`level`, `age_group`, `gender`, `eligibility1`,`eligibility2`, `terms_and_cond1`, `terms_and_cond2`, `organiser_name`, `mobile`, `email`, `org_address1`, `org_address2`, `org_city`, `org_pin`, `tournaments_link`, `start_date`, `end_date`, `event_entry_date`, `event_end_date`, `file_name`,`date_created`) VALUES ('$item->id','$item->userid','$item->type','$item->address_line1','$item->address_line2','$item->city','$item->state','$item->pin','$item->description','$item->sport','$item->tournament_level','$item->tournament_ageGroup','$item->tournament_gender','$item->eligibility1','$item->eligibility2','$item->terms_and_conditions1','$item->terms_and_conditions2','$item->organizer_name','$item->mobile','$item->emailid','$item->organizer_address_line1','$item->organizer_address_line2','$item->organizer_city','$item->organizer_pin','$item->tournament_links',FROM_UNIXTIME ('$item->start_date'),FROM_UNIXTIME ('$item->end_date'),FROM_UNIXTIME('$item->entry_start_date') ,FROM_UNIXTIME ('$item->entry_end_date'),'$item->file_name',CURDATE()) ON DUPLICATE KEY UPDATE `name` = '$item->type', `address_1` = '$item->address_line1' , `address_2` = '$item->address_line2' , `location` = '$item->city' ,`state`='$item->state' ,`pin` = '$item->pin' , `description` = '$item->description',`sport`='$item->sport',`level` = '$item->tournament_level',`age_group`='$item->tournament_ageGroup',`gender` = '$item->tournament_gender',`eligibility1` = '$item->eligibility1' ,`eligibility2` = '$item->eligibility2', `terms_and_cond1` = '$item->terms_and_conditions1', `terms_and_cond2` = '$item->terms_and_conditions2' ,`organiser_name` = '$item->organizer_name' , `mobile` = '$item->mobile' , `email` = '$item->emailid' , `org_address1` = '$item->organizer_address_line1' , `org_address2` = '$item->organizer_address_line2' , `org_city` = '$item->organizer_city', `org_pin` = '$item->organizer_pin' , `tournaments_link` = '$item->tournament_links' ,`start_date` = FROM_UNIXTIME ('$item->start_date') , `end_date` = FROM_UNIXTIME ('$item->end_date') , `event_entry_date` = FROM_UNIXTIME ('$item->entry_start_date') , `event_end_date` = FROM_UNIXTIME ('$item->entry_end_date')";

$query = $this->db->query($insert);

if($query)
{


return 1;

}
else 
return 0;



}

public function create_job($item)
{

$insert = "INSERT INTO `gs_jobInfo`(`id`, `userid`, `title`, `gender`, `sport`, `type`, `work_experience`, `description`, `desired_skills`, `qualification`, `key_requirement`, `org_address1`, `org_address2`, `org_city`, `org_state`, `org_pin`, `organisation_name`, `about`, `address1`, `address2`, `state`, `city`, `pin`, `contact`, `email`, `date_created`) VALUES ('$item->id','$item->userid','$item->title','$item->gender','$item->sports','$item->type','$item->work_exp','$item->desc','$item->desiredskill','$item->qualification','$item->keyreq','$item->org_address1','$item->org_address2','$item->org_city','$item->org_state','$item->org_pin','$item->org_name','$item->about','$item->address1','$item->address2','$item->state','$item->city','$item->pin','$item->contact','$item->email',CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$item->title' , `sport` = '$item->sports',`gender` = '$item->gender' ,`type` = '$item->type' , `work_experience` = '$item->work_exp' , `description` = '$item->desc' , `desired_skills` = '$item->desiredskill' , `qualification` = '$item->qualification' , `key_requirement` = '$item->keyreq' , `organisation_name` = '$item->org_name' , `about` = '$item->about', `contact` = '$item->contact' , `email` = '$item->email' , `date_created` = CURDATE(), `org_address1` = '$item->org_address1',`org_address2` = '$item->org_address2',`org_city` = '$item->org_city' , `org_pin` = '$item->org_pin' , `org_state`= '$item->org_state' , `address1`= '$item->address1' , `address2` = '$item->address2' , `city` = '$item->city' , `state` = '$item->state' , `pin` = '$item->pin'";
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
	public function getEventType($id = false){
		$qry = $this->db->get('gs_eventType');
		return $qry->result_array();
	}
	#Function for Get all the Sport
	public function getSport($id = false){
		$qry = $this->db->get('gs_sports');
		return $qry->result_array();
	}
	#Function for Get State By Enter City
	public function getStateByKey($key){
		$this->db->where('city', $key);
		$qry = $this->db->get('location');
		$q =  $qry->row_array();
		return $q;
	}
	#Function for Get all the Level
	public function getLevel(){
		$qry = $this->db->get('gs_level');
		$q =  $qry->result_array();
		return $q;
	}
	#Function for Get all the Level
	public function getTournamentCategory(){
		$qry = $this->db->get('gs_tournament_category');
		$q =  $qry->result_array();
		return $q;
	}
}

 ?>