<?php


class Api_model extends CI_Model
{
/**
    * function to check the existing user while registration
 
     * @param in variable $where
     
     * @return results data in array form on success and 0 on failure..

     * @access public  

     */ 
public  function userVarify($where)
{
	$query  = "SELECT `userid`,`location` ,`name`, `prof_id` FROM `user` ".$where."";

	$query1 = mysql_query($query);

	if(mysql_num_rows($query1)>0)
		{
		  while($row = mysql_fetch_assoc($query1))
		{
	 $data[] = $row;
	}
	return $data;

	}
	 else 
	 {
	 return 0;
	 }

}
/**

     * function For User Registration
 
     * @param in variable in $data array
     
     * @return results 1 on success and 0 on failure..

     * @access public  

     */ 
		public function createUser($data)
		{
		$name     =  $data['name'];
		$email    =  $data['email'];
		$password =  $data['password'];
		$phone    =  $data['phone'];
		$gender   =  $data['gender'];
		$prof     =  $data['prof'];
		$sport    =  $data['sport'];
		$location =  $data['location'];
		$token    =  $data['token'];

		$query = mysql_query("INSERT into `user`(`name`,`email`,`password`,`contact_no`,`Gender`,`prof_id`,`sport`,`location`,`device_id`) values('$name','$email','$password','$phone','$gender','$prof','$sport','$location','$token')");

		if($query)
		{

		  return 1;

		}
		else
		  
		  return 0;

		}


}