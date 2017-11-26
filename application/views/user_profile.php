<!DOCTYPE html>
<html>
<title>Getsporty::Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css'); ?>">
 <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>

<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}


/*#fixme {

  position:fixed;
  top:0px;

}*/
</style>

<script>

// $(window).scroll(function(){
//     $("#fixme").css("top",Math.max(-900,2-$(this).scrollTop()));

  
// });

</script>


<body class="w3-light-grey">

<?php 
  $userdata = $this->session->userdata('item');
  $profile = $this->register->profile($userdata['userid']); 
  // print_r($profile[0]['userType']);
  // print_r($profile);
  $user_image  =  $profile[0]['user_image'];
  $user_gender =  $profile[0]['gender'];
if(($user_image == '' || $user_image == null)  && ($user_gender != 'Female'))
{
  $user_image = 'https://freedom.press/static/images/anonymous-avatar.svg';
}
else if(($user_image == '' || $user_image == null) && ($user_gender == 'Female'))
{
  $user_image = 'https://cdn1.rojelab.com/asset/images/avatars/404.jpg'; 
}

?>

<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
 <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.1/jquery-confirm.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.1/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css'); ?>">

   

<script type="text/javascript" src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<link rel="shortcut icon" href="<?php echo base_url('../favicon.ico');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/normalize.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/demo.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/loder.css');?>">
    <script src="<?php echo base_url('assets/js/classie.js');?>"></script>
 <script type="text/javascript">
   window.sportsticket = 0;
   window.formalticket = 0; 
   window.ohterticket = 0; 
   window.workexpticket =0;
   window.asplayerticket = 0; 
 </script>
<style type="text/css">

  .jconfirm-box jconfirm-hilight-shake jconfirm-type-green jconfirm-type-animated{
    margin-top : 150px; 
  }
 .card {
    margin-top: 20px; 
    padding: 30px;
    background-color: rgba(214, 224, 226, 0.2);
    -webkit-border-top-left-radius:5px;
    -moz-border-top-left-radius:5px;
    border-top-left-radius:5px;
    -webkit-border-top-right-radius:5px;
    -moz-border-top-right-radius:5px;
    border-top-right-radius:5px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: #fff;
    background-color: rgba(255, 255, 255, 1);
       background-color: #efefef;
}
.card.hovercard .card-background {
    height: 130px;

}
.card-background img {
    -webkit-filter: blur(25px);
    -moz-filter: blur(25px);
    -o-filter: blur(25px);
    -ms-filter: blur(25px);
    filter: blur(25px);
    margin-left: -100px;
    margin-top: -200px;
    min-width: 130%;
}
.card.hovercard .useravatar {
    position: absolute;
    top: 15px;
    left: 0;
    right: 0;

}
.card.hovercard .useravatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255, 255, 255, 0.5);
}
.card.hovercard .card-info {
    position: absolute;
    bottom: 14px;
    left: 0;
    right: 0;
}
.card.hovercard .card-name {
    position: absolute;
    bottom: 0px;
    left: 0;
    right: 0;
    top :140px;
}
.card.hovercard .card-info .card-title {
    padding:0 5px;
    font-size: 20px;
    line-height: 1;
    color: #262626;
    background-color: rgba(255, 255, 255, 0.1);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.card.hovercard .card-info {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}
.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}
.btn-pref .btn {
    -webkit-border-radius:0 !important;
}
.input {
  position: relative;
  z-index: 1;
  display: inline-block;
  margin: 5px;
  width: calc(100% - 2em);
  vertical-align: top;
}

.input__field {
  position: relative;
  display: block;
  float: right;
  padding: 0.8em;
  width: 60%;
  border: none;
  border-radius: 0;
  background: #f0f0f0;
  color: #aaa;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  -webkit-appearance: none; /* for box shadows to show on iOS */
}

.input__field:focus {
  outline: none;
}

.input__label {
  display: inline-block;
  float: right;
  padding: 0 1em;
  width: 40%;
  color: #717070;
  font-weight: 100;
  font-size: 70.25%;
  -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  font-size: 14px;
}

.input__label-content {
  position: relative;
  display: block;
  padding: 1.6em 0;
  width: 100%;
}

.graphic {
  position: absolute;
  top: 0;
  left: 0;
  fill: none;
}

.icon {
  color: #ddd;
  font-size: 150%;
}
/* Hoshi */
.input--hoshi {
  overflow: hidden;
 
}

.input__field--hoshi {
  margin-top: 1em;
  padding: 0.85em 0.15em;
  width: 100%;   
  background: transparent;
  color: #312a2a;
   font-size: 19.5px;
}

.input__label--hoshi {
  position: absolute;
  bottom: 0;
  left: 0;
  padding: 0 0.25em;
  width: 100%;
  height: calc(100% - 1em);
  text-align: left;
  pointer-events: none;
  font-size: 14px;
}

.input__label-content--hoshi {
  position: absolute;
}

.input__label--hoshi::before,
.input__label--hoshi::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: calc(100% - 10px);
  border-bottom: 1px solid #B9C1CA;
}

.input__label--hoshi::after {
  
  border-bottom: 1px solid red;
  -webkit-transform: translate3d(-100%, 0, 0);
  transform: translate3d(-100%, 0, 0);
  -webkit-transition: -webkit-transform 0.3s;
  transition: transform 0.3s;
}

.input__label--hoshi-color-1::after {
  border-color: #5f5d5d;
}


.input__field--hoshi:focus + .input__label--hoshi::after,
.input--filled .input__label--hoshi::after {
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);

}

.input__field--hoshi:focus + .input__label--hoshi .input__label-content--hoshi,
.input--filled .input__label-content--hoshi {
  -webkit-animation: anim-1 0.3s forwards;
  animation: anim-1 0.3s forwards;
}

@-webkit-keyframes anim-1 {
  50% {
    opacity: 0;
    -webkit-transform: translate3d(1em, 0, 0);
    transform: translate3d(1em, 0, 0);
  }
  51% {
    opacity: 0;
    -webkit-transform: translate3d(-1em, -40%, 0);
    transform: translate3d(-1em, -40%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: translate3d(0, -40%, 0);
    transform: translate3d(0, -40%, 0);
  }
}

@keyframes anim-1 {
  50% {
    opacity: 0;
    -webkit-transform: translate3d(1em, 0, 0);
    transform: translate3d(1em, 0, 0);
  }
  51% {
    opacity: 0;
    -webkit-transform: translate3d(-1em, -40%, 0);
    transform: translate3d(-1em, -40%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: translate3d(0, -40%, 0);
    transform: translate3d(0, -40%, 0);
  }
}
.btn-default {
    color: white;
    background-color: #2bb1ee;
    border-color: #efefef;
}
.btn-default:hover{
  color: white;
    background-color: #2bb1ee;
    border-color: #efefef;
}



.btn-primary {
    color: white;
    background-color: #ffc107;
    border-color: #ffc107;
    outline-color: transparent;
}
.btn-primary:hover {
    color: #2bb1ee;
    background-color: #ffc107;
    border-color: #ffc107;
    outline-color: transparent;
}
.btn-primary.active, .btn-primary:active, .open>.dropdown-toggle.btn-primary {
    color: white;
    background-color: #ffc107;
    border-color: #ffc107;
    outline-color: transparent;
}
.btn-primary.focus,.btn-default:focus, .btn-primary:focus {
    color: white;
    background-color: #ffc107;
    border-color: #ffc107;
    outline-color: transparent;
}
.btn-default.focus, .btn-default:focus {
    color: white;
    background-color: #ffc107;
    border-color: #ffc107;
    outline-color: transparent;
}
.btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary:active.focus, .btn-primary:active:focus, .btn-primary:active:hover,.btn-default:active:hover .open>.dropdown-toggle.btn-primary.focus, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover {
    color: white;
    background-color: #ffc107;
    border-color: #ffc107;
    outline-color: transparent;
}
  .btn-primary:active:focus {
    color: white;
    background-color: #ffc107;
    border-color: #ffc107;
    outline-color: transparent;
}
.btn-default:active:hover{
    color: #2bb1ee;
    background-color: #ffc107;
    border-color: #ffc107;
    outline-color: transparent;
}


.navv{
  max-height: 70px;
    background-color: #03a9f4;
    padding-bottom: 18px;
    border-radius: 0px;
    webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    color: #fff;
  
    margin-bottom: 0px;
}
.navbar-nav{
  list-style: none;
}
.ulclass{
      float: right;
    list-style: none;
    padding-top: 10px;
    padding-right: 25px;
}
.liclass{
  font-size: 18px;
    color: #fff;
    -webkit-transition: .35s;
    transition: .35s;
    padding-right: 20px;
    position: relative;
    cursor: pointer;
    overflow: hidden;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
   
    background: transparent !important ;
}
.liclass:hover, .liclass:focus{
  color:#333;
}
.liclass:active,.licalss:visited{
  color:white;
}

@media (max-width: 768px){
.navbar-nav>li>a {
    padding-top: 0px;
    
}
}
.box-footer{
  margin-bottom: 30px;
}
.panel{
  border-radius: 2px;
}
.btn1,.btn1:active,.btn1:focus,.btn1:focus:active{
      background-color: #f1bc1d;;
    border-radius: 2px;
    border-color: #f1bc1d;;
}
.btn1:hover{
      background-color: #ffc107;
    border-radius: 2px;
    border-color: #ffc107;
}
.panel-primary {
    border-color: #03a9f4;
}
.panel-primary>.panel-heading {
    color: #fff;
    background-color: #03a9f4;
    border-color: #03a9f4;
}
.subbtn{
      background-color: #03a9f4;
    color: white;
    padding: 7px 16px;
    border-radius: 5px;
}
.subbtn,.subbtn:active,.subbtn:focus,.subbtn:focus:active{
      background-color: #14b0f7;
}

@font-face { font-family: GillSans; src: url('../../../font/GillSans.ttf'); } 
body{
  font-family: 'Gillsans',sans-serif;
}
</style>
<header>
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark navbar-fixed-top scrolling-navbar double-nav navv">
            <!-- Breadcrumb-->
            <ul class="navbar-nav mr-auto">
                <li class="">
                       <a class="nav-link navbar-brand" href="<?php echo site_url('forms/editRegisterUserProfile');?>">
                            <div class="hj-logo"><img src="http://getsporty.in/img/logo.png" style="max-width: 180px;"></div>
                        </a>
                </li>                                
            </ul>
            <ul class="nav navbar-nav ml-auto flex-row ulclass">
                <li class="nav-item">
                    <a id="link-2" class="nav-link liclass" href="<?php echo site_url('forms/show_user_profile');?>"><span class="glyphicon glyphicon-user"></a>
                </li>                              
            </ul>       
            <ul class="nav navbar-nav ml-auto flex-row ulclass">
                <li class="nav-item">
                    <a id="link-2" class="nav-link liclass" href="<?php echo site_url('forms/guestsignout');?>"><span class="glyphicon glyphicon-off"></a>
                </li>                              
            </ul>
            <ul class="nav navbar-nav ml-auto flex-row ulclass">
                <li class="nav-item">
                    <a id="link-2" class="nav-link liclass" href="javascript:void(0)" data-toggle="collapse" data-target="#message"><span class="glyphicon glyphicon-envelope" onclick="getmessage()"></span></a>
                    <ul class="list-group collapse" id="message">
                    </ul>
            </nav>
        <!-- /.Navbar -->
    </header>
<br><br><br>

<div class="w3-light-grey">
<div class="w3-content w3-margin-top" style="max-width:1400px;">
<div class="w3-row-padding">

      <div class="w3-third">
      <div class="w3-white w3-text-grey w3-card-4" id="fixme">
      <div class="w3-display-container">
      <img src="<?php echo $user_image  ?>" style="width:100%" alt="Avatar">
      <div class="w3-display-bottomleft w3-container w3-text-black">
      <h2>  <?php echo $profile[0]['name']; ?></h2>
      </div>
      </div>
      <div class="w3-container">
        <br>
              <strong><i class="fa fa-venus-double margin-r-5"></i>Gender</strong>
              <p class="text-muted">
               <?php echo $profile[0]['gender']; ?>
              </p>
              <hr>
              <strong>
              <i class="fa fa-map-marker margin-r-5"></i> Location</strong>
              <p class="text-muted"><?php echo $profile[0]['address1']; ?></p>
              <p class="text-muted"><?php echo $profile[0]['address2']; ?></p>
               <p class="text-muted"><?php echo $profile[0]['location']; ?></p>
              <p class="text-muted"><?php echo $profile[0]['address3']; ?></p>
              <hr>
            <strong><i class="fa fa-mobile margin-r-5"></i>Contact No</strong>
            <p>  <?php echo $profile[0]['contact_no']; ?></p>
            <hr>
          <strong><i class="fa fa-futbol-o margin-r-5"></i>Sport</strong>
          <p class="text-muted"><?php echo $profile[0]['sport']; ?>  </p>
            <hr>
            <strong><i class="fa fa-calendar-check-o margin-r-5"></i>DOB</strong>
            <p class="text-muted"><?php echo date("M jS, Y", strtotime($profile[0]['dob']));?> </p>
            <hr>
            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
            <p>
            <span class="label label-danger"><?php echo $profile[0]['prof_language']; ?></span>
            <span class="label label-success"><?php echo $profile[0]['other_skill_name']; ?></span>
            <span class="label label-info"><?php echo $profile[0]['other_skill_detail']; ?></span>
            </p>
            <hr>
            <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
            <p><?php echo $profile[0]['email']; ?></p>
            <hr>

  
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Header Details</h2>
            <div class="w3-container">
            <h5 class="w3-opacity"><b>Academy: </b></h5><p id="academy"></p>
             <hr>
             <h5 class="w3-opacity"><b>Description : </b></h5><p id="description"></p>
             <hr>
             <h5 class="w3-opacity"><b>Designation : </b></h5><p id="designation"></p>
             <hr>
             <h5 class="w3-opacity"><b>Location : </b></h5><p id="location"></p>
             <hr>
            </div>




<!--             <strong><i class="fa fa-file-text-o margin-r-5"></i>About Me</strong>
            <p><?php// echo $profile[0]['about_me']; ?></p> -->
        </div>
      </div><br>
    <!-- End Left Column -->
    </div>
    <!-- Right Column -->
    <div class="w3-twothird">

<?php 
$prof_data = $this->register->prof_data($profile[0]['userid']);
if($prof_data)
{
$profiledata = json_decode($prof_data['user_detail']);
 
if($profile[0]['userType'] == 103)
{

 ?>
 <!--  <div class="w3-container w3-card w3-white w3-margin-bottom">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Header Details</h2> -->
<?php 
    foreach ($profiledata->HeaderDetails as $key => $value) 
    {
    ?>
   <input type="hidden"  id="<?php echo $key.'1';?>" value="<?php echo $value; ?>">
    <?php     
    }
?>
<!-- </div> -->
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

    <!--   <h5 class="w3-opacity"><b>Description : </b></h5><p><?php// echo $value1->description ;?></p>  -->


      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo date("M jS, Y", strtotime($value1->dateFrom));?> -  <span class="w3-tag w3-teal w3-round"><?php echo date("M jS, Y", strtotime($value1->dateTo));?></span></h6>

      <hr>
      </div>


<?php 
    }
  ?>
  </div>
  <?php 
}
}
else if($profile[0]['userType'] == 104)
{
if($profiledata)
{ ?>


 <?php 
foreach ($profiledata->Header as $key => $value) 
{
?>
    <input type="text"  id="<?php echo $key.'1';?>" value="<?php echo $value; ?>">
<?php } ?>
 <hr>


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
      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php  echo date("M jS, Y", strtotime($value1->date));?></h6>
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
      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php 
        echo date("M jS, Y", strtotime($value1->date));?></h6>
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
      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo date("M jS, Y", strtotime($value1->dateOfCompetation ))
        ;?></h6> 
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
          <?php 
        }
        else { ?>
             
    
  <div class="w3-container w3-card w3-white">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>No Details Is Present</h2>
       </div>
        <?php 
      }
  ?>
</body>

<script type="text/javascript">
  
  $(document).ready(function(){

    var acamedy = $("#acamedy1").val();
    $("#academy").text(acamedy);

     var description = $("#description1").val();
    $("#description").text(description);

     var designation = $("#designation1").val();
    $("#designation").text(designation);

     var location = $("#location1").val();
    $("#location").text(location);

   
  });

</script>

</html>
