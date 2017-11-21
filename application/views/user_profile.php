<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css'); ?>">

<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>

<body class="w3-light-grey">
        <div class="tab-pane fade in" id="tab2">




<div class="w3-light-grey">
<div class="w3-content w3-margin-top" style="max-width:1400px;">
<div class="w3-row-padding">
  

    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-container">
          <br>
              <strong><i class="fa fa-venus-double margin-r-5"></i>Gender</strong>
              <p class="text-muted">
               gender
              </p>
              <hr>
              <strong>
              <i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">address1</p>
              <p class="text-muted">address2</p>
               <p class="text-muted">location</p>
              <p class="text-muted">address3</p>
              <hr>
            <strong><i class="fa fa-mobile margin-r-5"></i>Contact No</strong>
            <p>contact_no</p>
            <hr>

          <strong><i class="fa fa-futbol-o margin-r-5"></i>Sport</strong>
          <p class="text-muted">
                sport
            </p>
            <hr>
            <strong><i class="fa fa-calendar-check-o margin-r-5"></i>DOB</strong>
            <p class="text-muted">dob</p>
            <hr>
            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
            <p>
            <span class="label label-danger">prof_language</span>
            <span class="label label-success">other_skill_name</span>
            <span class="label label-info">other_skill_detail</span>
               <!--  <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span> -->
            </p>
            <hr>
            <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
            <button style="margin-left: 71%;" id="ebutton"><i class="fa fa-pencil margin-r-5"></i></button>
            <p>email</p>


            <hr>
            <strong><i class="fa fa-file-text-o margin-r-5"></i>About Me</strong>
            <p>about_me</p>
        </div>
      </div><br>
    <!-- End Left Column -->
    </div>
    <!-- Right Column -->
    <div class="w3-twothird">

<?php 
$prof_data = $this->register->prof_data(2);
     // print_r($prof_data);
//die;
if($prof_data)
{
  /// die;
$profiledata = json_decode($prof_data['user_detail']);
 
if( 103)
{

 ?>
  <div class="w3-container w3-card w3-white w3-margin-bottom">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Header Details</h2>
<?php 
    foreach ($profiledata->HeaderDetails as $key => $value) 
    {
    ?>
    <h5 class="w3-opacity"><b><?php echo $key ;?> - </b><?php echo $value; ?></h5>
    <?php     
    }
?>
</div>
<?php 
    foreach($profiledata->Education as $key => $value) 
    {
       
   ?>

  
  <div class="w3-container w3-card w3-white">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i><?php echo $key ?></h2>
 <?php
      foreach ($value as $key1 => $value1) 
      { ?>

      <div class="w3-container">
      <h5 class="w3-opacity"><b>Organisation : </b></h5><p><?php echo $value1->organisation; ?></p>
      <h5 class="w3-opacity"><b>Degree : </b></h5><p><?php echo $value1->degree; ?></p>
      <h5 class="w3-opacity"><b>Stream : </b></h5><p><?php echo $value1->stream; ?></p>   
      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo 
        $value1->courseDuration ;?></h6>
      <hr>
      </div>

        <?php 
        }
      ?>
       </div>
       <br>
      <?php
      }

      foreach ($profiledata->Experience as $key => $value) 
      {
      ?> 
      <div class="w3-container w3-card w3-white w3-margin-bottom">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i><?php echo $key;?></h2>

      <?php
        foreach ($value as $key1 => $value1) {
?>

      <div class="w3-container">
      <h5 class="w3-opacity"><b>Organisation Name : </b></h5><p><?php echo $value1->organisationName ;?></p> 

      <h5 class="w3-opacity"><b>Designation : </b></h5><p><?php echo $value1->designation ;?></p> 

      <h5 class="w3-opacity"><b>Description : </b></h5><p><?php echo $value1->description ;?></p> 


      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $value1->dateFrom; ?> -  <span class="w3-tag w3-teal w3-round"><?php echo $value1->dateTo; ?></span></h6>

      <hr>
      </div>


<?php 
    }
  ?>
  </div>
  <?php 
}
}
else if(104)
{
if($profiledata)
{ ?>
<div class="w3-container w3-card w3-white">
<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Header Details</h2>
<div class="w3-container">
 <?php 
foreach ($profiledata->Header as $key => $value) 
{
?>
<h5 class="w3-opacity"><b><?php echo $key; ?> : </b></h5><p><?php echo $value; ?></p>
<?php } ?>
 <hr>
</div>
</div>
<br>
<?php 
foreach ($profiledata->Achivement as $key => $value) 
  {
 if($key =='awards'){
?>
  <div class="w3-container w3-card w3-white">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Best Awards</h2>
 <?php
foreach ($value as $key1 => $value1) 
  { 
  ?>

      <div class="w3-container">
      <h5 class="w3-opacity"><b>Name Of Award : </b></h5><p><?php echo $value1->nameOfAward; ?></p>
      <h5 class="w3-opacity"><b>Description : </b></h5><p><?php echo $value1->description; ?></p>
      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo 
        $value1->date ;?></h6>
      <hr>
      </div> 
        <?php 
        }
      
      ?>
       </div>
       <br>

<?php  } else if($key =='bestResult'){ 

  ?>
  <div class="w3-container w3-card w3-white">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Best Result</h2>
 <?php
      foreach ($value as $key1 => $value1) 
      { 
        ?>
      <div class="w3-container">
      <h5 class="w3-opacity"><b>Name Of Comptation: </b></h5><p><?php echo $value1->nameComptation; ?></p>
      <h5 class="w3-opacity"><b>Rounds : </b></h5><p><?php echo $value1->rounds; ?></p>
      <h5 class="w3-opacity"><b>Result : </b></h5><p><?php echo $value1->result; ?></p>   
      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo 
        $value1->date ;?></h6>
      <hr>
      </div> 
        <?php 
        }
      
      ?>
       </div>
       <br>
<?php
}
}
?>
<div class="w3-container w3-card w3-white">
<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Bio</h2>
<div class="w3-container">
<?php 
foreach ($profiledata->Bio as $key => $value) 
{
?>
<h5 class="w3-opacity"><b><?php echo $key; ?> : </b></h5><p><?php echo $value; ?></p>
<?php 
}
?>
 <hr>
</div>
</div>
<br>
  <div class="w3-container w3-card w3-white">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Latest Result</h2>
 <?php
      foreach ($profiledata->LatestResults as $key => $value1) 
      {
        ?>
  <div class="w3-container">
      <h5 class="w3-opacity"><b>Name Of Competation : </b></h5><p><?php echo $value1->nameOfCompetation;?></p> 
        <h5 class="w3-opacity"><b>Detail : </b></h5><p><?php echo $value1->detail;?></p> 
      <h5 class="w3-opacity"><b>Opponent : </b></h5><p><?php echo $value1->opponent; ?></p>
      <h5 class="w3-opacity"><b>Round : </b></h5><p><?php echo $value1->round; ?></p> 
      <h5 class="w3-opacity"><b>Score : </b></h5><p><?php echo $value1->score; ?></p>  
      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo 
        $value1->dateOfCompetation ;?></h6> 
   <hr> 
      </div> 
        <?php 
           }
      ?>
       </div>
       <br>

<?php 
}
?>
    </div>
  </div>
</div>
</div>

<?php
}
?>

<!--  <div class="row">  -->
<!--         <div class="col-md-6">
            <div class="box box-primary" style="margin-top:5%;">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <div class="box-body">
              <strong><i class="fa fa-venus-double margin-r-5"></i>Gender</strong>
              <p class="text-muted">
                <?php// echo $value['gender'];?>
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
              <p class="text-muted"><?php// echo $value['address1'];?></p>
              <p class="text-muted"><?php// echo $value['address2'];?></p>
               <p class="text-muted"><?php// echo $value['location'];?></p>
              <p class="text-muted"><?php/// echo $value['address3'];?></p>
              <hr>
              <strong><i class="fa fa-mobile margin-r-5"></i>Contact No</strong>
               <p><?php //echo $value['contact_no'];?></p>
              <hr>
              <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
              <button style="margin-left: 71%;" id="ebutton"><i class="fa fa-pencil margin-r-5"></i></button>
              <p><?php// echo $value['email'];?></p>
              
              <script>
              $(document).ready(function(){
                  // alert("sdg");
                 $("#activity").addClass('active');
                $("#newemail").hide();
                $("#ebutton").click(function(){
                $("#newemail").toggle();
                });
              });
               </script>
               <div id="newemail">
                <div class="form-group">
                <input type="text" class="form-control" id="updateemail" placeholder="Enter Email">
                 <input type="hidden" class="form-control" name="UserId"  id="euid" value="<?php //echo $value['userid']; ?>">
                </div><div class="form-group">
                <input type="button" class="btn btn btn-primary" id="emailsave" onclick="" value="Update" name="Update">
                </div >
              </div>
            </div>
          </div> -->
          <?php 
        }
        else { ?>
             


  

<!--     <div class="w3-third">-->
    
  <div class="w3-container w3-card w3-white">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>No Details Is Present</h2>

<!--   <div class="w3-container">
      <h5 class="w3-opacity"><b>Name Of Competation : </b></h5><p><?php //echo $value1->nameOfCompetation;?></p> 
        <h5 class="w3-opacity"><b>Detail : </b></h5><p><?php //echo $value1->detail;?></p> 
      <h5 class="w3-opacity"><b>Opponent : </b></h5><p><?php //echo $value1->opponent; ?></p>
      <h5 class="w3-opacity"><b>Round : </b></h5><p><?php// e//cho $value1->round; ?></p> 
      <h5 class="w3-opacity"><b>Score : </b></h5><p><?php// echo $value1->score; ?></p>  
     
   <hr> 
      </div>  -->
       </div>


<!-- </div>-->
        <?php 
      }



          ?>
         <!--  </div> -->

           <!--  <div class="col-md-6">
            <div class="box box-primary" style="margin-top:5%;">
            <div class="box-header with-border">
            <h3 class="box-title">About Proffession</h3>
            </div>
            <div class="box-body">
            <strong><i class="fa fa-futbol-o margin-r-5"></i>Sport</strong>
            <p class="text-muted">
                <?php// echo $value['sport'];?>
            </p>
            <hr>
            <strong><i class="fa fa-calendar-check-o margin-r-5"></i>DOB</strong>
            <p class="text-muted"><?php //echo $value['dob'];?></p>
            <hr>
            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
            <p>
            <span class="label label-danger"><?php// echo $value['prof_language'];?></span>
            <span class="label label-success"><?php// echo $value['other_skill_name'];?></span>
            <span class="label label-info"><?php// echo $value['other_skill_detail'];?></span>
            </p>
            <hr>
            <strong><i class="fa fa-file-text-o margin-r-5"></i>About Me</strong>
            <p><?php// echo $value['about_me'];?></p>
            </div>
            </div>
            </div>
 -->

           <!--  </div> -->



             
        </div>
</body>
</html>
