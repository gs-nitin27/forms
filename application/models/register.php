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
$q = $qry->row_array();
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

$insert = "INSERT INTO `gs_tournament_info`(`id`, `userid`, `category`, `name`, `address_1`, `address_2`, `location`,`state`, `pin`, `description`,`sport` ,`level`, `age_group`, `gender`, `eligibility1`,`eligibility2`, `terms_and_cond1`, `terms_and_cond2`, `organiser_name`, `mobile`, `email`, `org_address1`, `org_address2`, `org_city`, `org_pin`, `tournaments_link`, `start_date`, `end_date`, `event_entry_date`, `event_end_date`, `file_name`,`date_created`) VALUES ('$item->id','$item->userid','$item->tournament_category','$item->type','$item->address_line1','$item->address_line2','$item->city','$item->state','$item->pin','$item->description','$item->sport','$item->tournament_level','$item->tournament_ageGroup','$item->tournament_gender','$item->eligibility1','$item->eligibility2','$item->terms_and_conditions1','$item->terms_and_conditions2','$item->organizer_name','$item->mobile','$item->emailid','$item->organizer_address_line1','$item->organizer_address_line2','$item->organizer_city','$item->organizer_pin','$item->tournament_links',FROM_UNIXTIME ('$item->start_date'),FROM_UNIXTIME ('$item->end_date'),FROM_UNIXTIME('$item->entry_start_date') ,FROM_UNIXTIME ('$item->entry_end_date'),'$item->file_name',CURDATE()) ON DUPLICATE KEY UPDATE `name` = '$item->type', `address_1` = '$item->address_line1' , `address_2` = '$item->address_line2' , `location` = '$item->city' ,`state`='$item->state' ,`pin` = '$item->pin' , `description` = '$item->description',`sport`='$item->sport',`level` = '$item->tournament_level',`age_group`='$item->tournament_ageGroup',`gender` = '$item->tournament_gender',`eligibility1` = '$item->eligibility1' ,`eligibility2` = '$item->eligibility2', `terms_and_cond1` = '$item->terms_and_conditions1', `terms_and_cond2` = '$item->terms_and_conditions2' ,`organiser_name` = '$item->organizer_name' , `mobile` = '$item->mobile' , `email` = '$item->emailid' , `org_address1` = '$item->organizer_address_line1' , `org_address2` = '$item->organizer_address_line2' , `org_city` = '$item->organizer_city', `org_pin` = '$item->organizer_pin' , `tournaments_link` = '$item->tournament_links' ,`start_date` = FROM_UNIXTIME ('$item->start_date') , `end_date` = FROM_UNIXTIME ('$item->end_date') , `event_entry_date` = FROM_UNIXTIME ('$item->entry_start_date') , `event_end_date` = FROM_UNIXTIME ('$item->entry_end_date')";

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
	
	public function getJobInfo($id = false){
		$this->db->select('*, JI.id as infoId, L.city as city_name, L.state as state_name, LM.state as state_org, LM.city as city_org');
		$this->db->from('gs_jobInfo JI');
		$this->db->join('gs_sports SP', 'SP.id = JI.sport', "left");
		$this->db->join('location L', 'JI.state = L.id', "left");
		$this->db->join('location LM', 'JI.org_state = LM.id', "left");
		if($id > 0){
			$this->db->where('JI.id', $id);
		}else{
		 $this->db->order_by("JI.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		return $q;
	}
	
	public function getEventInfo($id = false){
		$this->db->select('*, EI.id as infoId, L.city as city_name, L.state as state_name, LM.state as state_org, LM.city as city_org');
		$this->db->from('gs_eventinfo EI');
		$this->db->join('gs_sports SP', 'SP.id = EI.sport', "left");
		$this->db->join('location L', 'EI.state = L.id', "left");
		$this->db->join('location LM', 'EI.organizer_state = LM.id', "left");
		$this->db->join('gs_eventType ET', 'ET.id = EI.type', "left");
		if($id > 0){
			$this->db->where('EI.id', $id);
		}else{
		 $this->db->order_by("EI.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		
		return $q;
	}
	
	public function getTournamentInfo($id = false){
		$this->db->select('*, TI.id as infoId, L.city as city_name, L.state as state_name');
		$this->db->from('gs_tournament_info TI');
		$this->db->join('gs_level LVL', 'LVL.id = TI.level', "left");
		$this->db->join('gs_tournament_category TC', 'TC.id = TI.category', "left");
		$this->db->join('gs_sports SP', 'SP.id = TI.sport', "left");
		$this->db->join('location L', 'TI.state = L.id', "left");

		if($id > 0){
			$this->db->where('TI.id', $id);
		}else{
		 $this->db->order_by("TI.id", "desc"); 
		}
		$query = $this->db->get();
		$q =  $query->result_array();
		
		return $q;
	}
	public function getResourceInfo($id = false){
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
	}
	
	public function addResource($data, $id=false){

		//print_r($data);die();
		$this->db->insert('gs_resources', $data);
		 return $this->db->insert_id();
	}
	
	public function updateResourceImage($img){
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

public function saveResources($item)
{

  $insert = "INSERT INTO `gs_resources`(`id`, `user_id`,`title`, `url`, `description`,`summary`, `image`, `keyword`, `topic_of_artical`, `sport`,`location`,`date_created`) VALUES ('$item->id','$item->user_id','$item->title','$item->url','$item->description','$item->summary','$item->image','$item->keyword','$item->topic_of_artical','$item->sport','$item->location',CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$item->title' , `url` = '$item->url',`description` = '$item->description',`summary` = '$item->summary',`keyword` ='$item->keyword' , `topic_of_artical` ='$item->topic_of_artical',`sport` = '$item->sport',`location` ='$item->location', `date_created` = CURDATE()";

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


	public function getContentInfo($id = false){
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

  $insert = "INSERT INTO `cms_content`(`id`, `title`, `url`, `content`, `date_created`, `date_updated`) VALUES ('$item->id','$item->title','$item->url','$item->content',CURDATE(),CURDATE()) ON DUPLICATE KEY UPDATE `title` ='$item->title' , `url` = '$item->url',`content` = '$item->content', `date_updated` = CURDATE()";
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

public function updateProfile($item)
{


  $insert ="INSERT INTO `user`(`userid`,`name`,`password`,`email`,`contact_no`,`sport`,`Gender`,   `address1`, `address2`, `address3`, `dob`,`prof_id`,`user_image`,`profile_status`, `location`, `prof_language`, `other_skill_name`, `other_skill_detail`, `age_catered`, `device_id`,`about_me`)  VALUES ('$item->userid','$item->name','$item->password','$item->email','$item->contact_no','$item->sport','$item->Gender','$item->address1','$item->address2','$item->address3','$item->dob','$item->prof_id','$item->user_image','$item->profile_status','$item->location','$item->prof_language','$item->other_skill_name','$item->other_skill_detail','$item->age_catered','$item->device_id','$item->about_me' )  ON DUPLICATE KEY UPDATE `name` ='$item->name', `contact_no` = '$item->contact_no',`sport` = '$item->sport' ,`Gender` = '$item->Gender' ,`address1` = '$item->address1' ,`address2` = '$item->address2' , `address3` = '$item->address3' , `dob` = '$item->dob' , `prof_id` = '$item->prof_id' , `location` = '$item->location'";

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


public function getCityName($keyword){
		 
		$this->db->select('city');
        $this->db->from('location');
         $this->db->where('city', 0);
         $this->db->like('city', $keyword);

     // $this->db->where("city LIKE '%$keyword%'")->get();       

      //  $this->db->limit(0, 6);
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $data[] = $row;
        }   
        return $query;

	}
}

 ?>