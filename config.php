<?php
$con = mysql_connect('localhost','root','');
if($con){
$selected = mysql_select_db('getsport_staging') or die("Could not select databasename");
}else{

echo "could not connect";
} 
?>