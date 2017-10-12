<?php

include('config.php');
include('userdataservice.php');
include('searchdataservice.php');



				$req  = new searchdataservice();
				$res  = $req->sendalert();
				$size = sizeof($res);
//print_r($res);die();
for($i = 0; $i< $size ; $i++)
{                

				$fwhere = $res[$i]['search_para'];

				if($res[$i]['Moudule'] == '4' || $res[$i]['Moudule'] == '5')
				{
						$req1  = new searchdataservice();
						$res1  = $req1->gensearch($fwhere,$page);
				}
				else if ($res[$i]['Moudule'] == '1') 
				{
						$req1 = new userdataservice();
						$res1 = $req1->jobsearch($fwhere);
				}
				else if ($res[$i]['Moudule'] == '2') 
				{
						$req1 = new userdataservice();
						$res1 = $req1->eventsearch($fwhere);
				}
				else if ($res[$i]['Moudule'] == '3') 
				{
						$req1 = new userdataservice();
						$res1 = $req1->tournamentsearch($fwhere);
				} 

				$updates = sizeof($res1) - $res[$i]['count'];
				//echo $updates;
				if($updates > 0)
				{

					$id = $res[$i]['userid'];


					$getTokenObj = new userdataservice();
					$getToken    = $getTokenObj->getdeviceid($id);

				if($res[$i]['Moudule'] == '1')
				{
				$prof = 'Job';
				}
				else if($res[$i]['Moudule'] == '2')
				{
				$prof = 'Event';	
				}
				else if($res[$i]['Moudule'] == '3')
				{
				$prof = 'Tournament';	
				}
				else if($res[$i]['Moudule'] == '4')
				{
				$prof = 'Coach';	
				}
				else if($res[$i]['Moudule'] == '5')
				{
				$prof = 'Trainer';	
				}
				//print_r($getToken);
				$registatoin_ids = $getToken['device_id'];
				$message = $updates." "."New Record found for your ".$prof." Search"; 
                if($registatoin_ids != ''){
				$alertObj = new userdataservice();
				$alertVar = $alertObj->sendPushNotificationToGCM($registatoin_ids, $message); 
				echo $alertVar;

				//$date = 'CURDATE()';
                $userid = $id ;
                $title  = $prof; 
                $applicantId = '';
				$req2 = new userdataservice();
				$res = $req2->savealert( $userid,$message, $applicantId ,$title) ;
}
}
}



// $state = 'dsedsdsd';
// $con = 'fjklfhjkldhwrl';
 
//  $query = mysql_query("INSERT INTO `location` (`id`, `city` , `state`) VALUES('', '$state' , '$con')");
//  if($query)
//  	return 1;
//  else 
//  	return 0;







 ?>