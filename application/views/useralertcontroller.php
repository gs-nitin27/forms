<?php
include('config.php');
include('searchdataservice.php');
include('userdataservice.php');
include('getAlertsDataService.php');

if($_POST['act'] == "getSubscribedAlerts")
{

$userid = urldecode($_POST['user_id']);
$module = urldecode($_POST['type']);

$req = new getAlertsDataService();
$res = $req->getAlerts($userid ,  $module);

if($res != 0)
{

$data = array('data'=>$res, 'status'=>'1');

}
else
{

$data = array('data'=>$res, 'status' => $res);

}
echo json_encode($data);
}

// if($_POST['act'] == "testimage")
// {

// $userid = urldecode($_POST['userid']);

// $fwhere = "WHERE us.`userid` = '16' ";

// $page = "";

// $req = new searchdataservice();
// $res = $req->gensearch($fwhere, $page);
// print_r($res);
// }



 ?>