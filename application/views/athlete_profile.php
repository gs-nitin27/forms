<?php //print_r($user_data);//die; ?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">
<?php   
//print_r($data);
/*$con      = mysql_connect('localhost','root','');
mysql_select_db('getsport_staging');
$userid   = $_REQUEST['userid'];
$prof_id  = $_REQUEST['prof_id'];
$query    = mysql_query("SELECT  *FROM `user` WHERE userid =$userid ");
$user_row      = mysql_fetch_assoc($query);
*/
$user_row      = $user_info;
$user_image  =  $user_row['user_image'];
$name        =  $user_row['name'];
$email        =  $user_row['email'];
$mobile_no        =  $user_row['contact_no'];
//print_r($user_row);die;
/*$query1        = mysql_query("SELECT * FROM `gs_userdata` WHERE userid=$userid AND prof_id=$prof_id");
$data_row     = mysql_fetch_assoc($query1);
*/
$data = json_decode($user_data['user_detail']/*$data_row['user_detail']*/);
//print_r($data);
$awards       = $data->Achivement->awards;

$bestResult   = $data->Achivement->bestResult;



$LatestResults   = $data->LatestResults;




/*              Bio Information                 */

$clubOrAcademy      = $data->Bio->clubOrAcademy;
$coachName          = $data->Bio->coachName;
$dob                = $data->Bio->dob;
$height             = $data->Bio->height;
$styleOrTypeOfPlay  = $data->Bio->styleOrTypeOfPlay;
$weight             = $data->Bio->weight;

/*              Header Information                 */

$description      = $data->Header->description;
$level            = $data->Header->level;
$location         = $data->Header->location;
$name             = $data->Header->name;
$rank             = $data->Header->rank;








?>
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="<?php echo $user_image ?>" style="width:100% " alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo $name ?></h2>
          </div>
        </div>
        <div class="w3-container">
          
          <p><i class="fa fa-blind fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $styleOrTypeOfPlay; ?></p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $location  ?></p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $email?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $mobile_no ?></p>

          <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-large w3-text-teal" aria-hidden="true"></i><?php echo $dob  ?></p>

          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Header</b></p>
          <p><?php echo $description ?></p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:0%">0</div>
          </div>
          <p><?php echo $level  ?></p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:0%">0
              <div class="w3-center w3-text-white"></div>
            </div>
          </div>
          <p><?php echo $rank  ?></p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:0%">0</div>
          </div>
          <p>  </p>
         
          <br>

          
         
       
         
        
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>



    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16 " ><img src ="img/Tournaments.png" width="5%" > Achivement</h2>
        <div class="w3-container w3-card w3-white w3-margin-bottom ">
          
          <h5 class="w3-opacity"><b> Awards</b></h5>
          <?php  

           // foreach ($awards as $key => $awards) {
for ($i=0; $i <count($awards) ; $i++) 
{
if(isset($awards[$i]->date))
{
$date          = $awards[$i]->date;
}
if (isset($awards[$i]->description)) 
{

$description   = $awards[$i]->description; 
}

if (isset($awards[$i]->nameOfAward)) 
{
 $nameOfAward   = $awards[$i]->nameOfAward; 
}
 

?>
          <div class="w3-container w3-card w3-white w3-margin-bottom ">
            <h6 class="w3-text-teal" align="center" ><u>Awards <?php echo ++$i ?></u></h6>
          <h6 class="w3-text-teal"> Date :</h6>  <span class=""><?php echo $date?></span> </br>
          <p><h6 class="w3-text-teal"> Description :</h6> <?php echo $description; ?>.</p>
          <p><h6 class="w3-text-teal"> Name Of Award :</h6> <?php echo $nameOfAward; ?>.</p>

          <hr>
        </div>


<?php
}

?>

        </div>







        <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h5 class="w3-opacity"><b>Best Result</b></h5>


<?php 
for ($i=0; $i <count($bestResult) ; $i++) 
{

if(isset($bestResult[$i]->date))
{

$date   = $bestResult[$i]->date;
}
if(isset($bestResult[$i]->nameComptation))
{

$nameComptation   = $bestResult[$i]->nameComptation;
}

if(isset($bestResult[$i]->result))
{

$result   = $bestResult[$i]->result; 
}

if(isset($bestResult[$i]->rounds))
{
$rounds   = $bestResult[$i]->rounds; 
}
?>


           <h6 class="w3-text-teal"> Date :</h6>  <span class=""><?php echo $date ?></span> </br>
          <p><h6 class="w3-text-teal"> Name of Comptation :</h6> <?php echo $nameComptation; ?>.</p>
          <p><h6 class="w3-text-teal"> Result :</h6> <?php echo $result; ?>.</p>
          <p><h6 class="w3-text-teal"> Rounds :</h6> <?php echo $rounds; ?>.</p>
<hr>
        </div>

        <?php
      }
      ?>
        
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>LatestResults</h2>
        <div class="w3-container">

          

                    

                      

<?php 
for ($i=0; $i <count($LatestResults) ; $i++) 
{
if(isset($LatestResults[$i]->dateOfCompetation))
{
$dateOfCompetation  = $LatestResults[$i]->dateOfCompetation;
$detail             = $LatestResults[$i]->detail;
$opponent           = $LatestResults[$i]->opponent;
$result             = $LatestResults[$i]->result;
$round              = $LatestResults[$i]->round;
$score              = $LatestResults[$i]->score;
}

?>
<div class="w3-container w3-card w3-white w3-margin-bottom ">

            <h6 class="w3-text-teal" align="center" ><u><?php echo $dateOfCompetation ?></u></h6>
          <h6 class="w3-text-teal"> detail :</h6>  <span class=""><?php echo $detail?></span> </br>
          <p><h6 class="w3-text-teal"> opponent  :</h6> <?php echo $opponent; ?>.</p>
          <p><h6 class="w3-text-teal"> result :</h6> <?php echo $result; ?>.</p>
 <p><h6 class="w3-text-teal"> round :</h6> <?php echo $round; ?>.</p>
  <p><h6 class="w3-text-teal"> score :</h6> <?php echo $score; ?>.</p>
          <hr>
        </div>
<?php
}
?>


      
        </div>

        </div>
      
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p></p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p> Design By    Dark Horse Sports  <a href="https://getsporty.in/index.html" target="_blank"></a></p>
</footer>

</body>
</html>