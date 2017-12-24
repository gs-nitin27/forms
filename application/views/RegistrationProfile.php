<?php if(!$this->session->userdata('useritem'))
{header("Location: https://getsporty.in");
  }else{print_r($this->session->userdata('useritem'));die;}

   ?>
<!DOCTYPE html>
<html>
<head>
<title>Getsportykj</title>
 <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
 <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.1/jquery-confirm.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.1/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<link rel="shortcut icon" href="<?php echo base_url('../favicon.ico');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/normalize.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('fonts/font-awesome-4.2.0/css/font-awesome.min.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/demo.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/loder.css');?>">
<script src="<?php echo base_url('js/classie.js');?>"></script>
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
</head>
<script>
function saveUserProfile(userjson)
{
$("#imagelodar").show();
var data = {

    "id"                       : $("#uid").val(),
    "userdata"                 : userjson,
    "prof_id"                  : $("#prof_id").val()
};
console.log(JSON.stringify(data));
var data = JSON.stringify(data);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/Registration_userdata'); ?>',
    data: data,
    dataType: "text",
    success: function(result) {
     //alert(result);
      if(result == '1')
      {
         
        $.confirm({
        title: 'Congratulations!',
        content: 'Profile is Updated.',
        type: 'green',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                  $("#imagelodar").hide();
                 //window.location.href = url+"/forms/getContent?Content";
                }
            },
            close: function () {
              $("#imagelodar").hide();
             //window.location.href = url+"/forms/getContent?Content";
            }
        }
    });
      }
      else
      {
             // $("#imagelodar").hide();
             $.confirm({
              title: 'Encountered an error!',
              content: 'Something went Worng, this may be server issue.',
              type: 'dark',
              typeAnimated: true,
              buttons: {
                  tryAgain: {
                      text: 'Try again',
                      btnClass: 'btn-dark',
                      action: function(){
                        $("#imagelodar").hide();
                      }
                  },
                  close: function () {
                    $("#imagelodar").hide();
                  }
              }
          });
      }
    }
});   
}
</script>  

<?php  
      $profile = $this->register->profile($id); 
     foreach ($profile as $value) 
      {
      }
      // print_r($value);
      ?>

      <header>
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark navbar-fixed-top scrolling-navbar double-nav navv">
            <!-- Breadcrumb-->
            <ul class="navbar-nav mr-auto">
                <li class="">
                       <a class="nav-link navbar-brand" href="https://getsporty.in">
                            <div class="hj-logo"><img src="http://getsporty.in/img/logo.png" style="    max-width: 180px;"></div>
                        </a>
                </li>                                
            </ul>       
            <ul class="nav navbar-nav ml-auto flex-row ulclass">
                <li class="nav-item">
                    <a id="link-2" class="nav-link liclass" href="<?php echo site_url('forms/guestsignout');?>"><!-- <span class="glyphicon glyphicon-off"> -->Logout</a>
                </li>                              
            </ul>
            <ul class="nav navbar-nav ml-auto flex-row ulclass">
                <li class="nav-item">
                    <a id="link-2" class="nav-link liclass" href="<?php echo site_url('forms/show_user_profile');?>"><!-- <span class="glyphicon glyphicon-user"> -->View Profile</a>
                </li>                              
            </ul>       
            <ul class="nav navbar-nav ml-auto flex-row ulclass">
                <li class="nav-item">
                    <a id="link-2" class="nav-link liclass" href="javascript:void(0)" data-toggle="collapse" data-target="#message" style="float:right;" onclick="getmessage()"><!-- <span></span> -->Messages</a>
                </li>
            </ul>
             <ul class="nav navbar-nav ml-auto flex-row ulclass">
                <li class="nav-item">
                    <a id="link-2" class="nav-link liclass" href="<?php echo site_url('forms/editRegisterUserProfile'); ?>"><!-- <span class="glyphicon glyphicon-off"> -->Home</a>
                </li>                              
             </ul> 
        </nav>
        <!-- /.Navbar -->
    </header>


<div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
<div class="wrapper" style="background-color: #efefef; margin-top: 50px;">
<div class="content-wrapper">
<div class="container">
<div class="row">
<div class="col-lg-11 col-sm-11">
    <div class="card hovercard">
        <div class="card-background">
             <img class="card-bkimg" alt="" src="<?php echo base_url('img/background.jpg');?>" alt="User profile picture">
        </div>
        <div class="useravatar">
          <?php 
          if($value['user_image']) {
          ?>
        <img class="card-bkimg" alt="" src="<?php echo $value['user_image'];?>" alt="User profile picture">
        <?php } else { if($value['gender'] == 'Female') { ?>
        <img class="card-bkimg" alt="" src="<?php echo base_url('img/female.jpg');?>" alt="User profile picture">
        <?php } else { ?>
        <img class="card-bkimg" alt="" src="<?php echo base_url('img/user.jpg');?>" alt="User profile picture">
        <?php } } ?>
       
        </div>
        <div class="card-info">
         <label style="margin-left:8%;margin-bottom: 3.5%;" for="file-upload" class="custom-file-upload" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil margin-r-5" style="font-size:24px;color: black;"></i></label></div>

        <div class="card-info"><span class="card-title"><?php echo $value['name'];?></span></div>
      <?php if($value['prof_name']) {?>
         <div class="card-name" ><span ><b><?php echo $value['prof_name'];?></b></span></div>
         <?php }?>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
          <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <div class="hidden-xs">Education</div>
          </button>
        </div>
        <div class="btn-group" role="group">
        <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
        <div class="hidden-xs">Experience</div>
        </button>
        </div>
        <div class="btn-group" role="group">
        <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        <div class="hidden-xs">Others</div>
        </button>
        </div>
    </div>
    <div class="tab-content">
    <div class="tab-pane fade in active" id="tab1">


    
<!-- <div class="checkbox col-sm-10"><label><input type="checkbox" id="checkbox" data-toggle="collapse" data-target="#formaledu_colaps" aria-expanded="false" aria-controls="collapse3rdParty">Till Date</label></div>

<div class="collapse in" id="formaledu_colaps">

  <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name"></div> -->


  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Profile Image</h4>
        </div>
        <div class="modal-body">
        

         <form id="form" action="" method="post" enctype="multipart/form-data">
            <div class="container">
            <div class="row">    
            <div class="col-xs-6 col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-2" style="float: left;margin-left: -1%;">
            <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
            <span class="input-group-btn">
            <!-- image-preview-clear button -->
            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
            <span class="glyphicon glyphicon-remove"></span> Clear
            </button>
            <!-- image-preview-input -->
            <div class="btn btn-default image-preview-input">
            <span class="glyphicon glyphicon-folder-open"></span>
            <span class="image-preview-input-title">Browse</span>
            <input type="file" accept="image/png, image/jpeg, image/gif" id="Nimage" name="file"/>
            </div>
            <input id="button" type="submit" class="btn btn-danger" value="Upload Image" name="submit">
            </span>
            </div>
            </div>
            </div>
            </div>
            <div class="form-group">
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $value['userid'];?>">
            <input type="hidden" class="form-control" name="file_name"  id="file_name" value="">
            </div>
            </form>
            <input type="hidden" class="form-control" name="photo" id="photo_url"> 
            <div id="mess" hidden>Image Uploded</div>
            <div id="mess1" style="color:red;" hidden>Please Select the Image.</div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary" style="margin-top:5%;">
  <div class="box-body box-profile">
  <input type="hidden" name="userid" id="uid" value="<?php echo $value['userid']; ?>">
  <div class="panel panel-primary">
  <div class="panel-heading clearfix">
  <div>
  <h4 class="panel-title" style="font-weight: bold;font-size: 17px;">Sports Education</h4>
  </div>
  <div> 
  <div class="box-header with-border">
  <div id="SportTicket" >
  </div>
  </div>
  </div>
  <div class="btn-group pull-right">
  <input type="button" id="addSportEdu" class="btn btn-danger btn1" value="Add Sport Education"/>
  </div>
  </div>
  </div>             
  <div class="panel panel-primary">
  <div class="panel-heading clearfix">
  <div>
  <h4 class="panel-title" style="font-weight: bold;font-size: 17px;">Formal Education</h4>
  </div>
  <div>
      <div class="box-header with-border">
      <div id="FormalEducation" ></div>
      </div>
      </div>   
      <div class="btn-group pull-right">
      <input type="button" id="addSportFormal" class="btn btn-danger btn1" value="Add Formal Education" />
      </div>
      </div>
      </div>
               
               
 <div class="panel panel-primary">
    <div class="panel-heading clearfix">
    <div>
    <h4 class="panel-title" style="font-weight: bold;font-size: 17px;">Certification</h4>
    </div>
    <div>
    <div class="box-header with-border">  
    <div id="OtherEducation" ></div>
    </div>
    </div>
    <div class="btn-group pull-right">
    <input type="button" id="addothereducation" class="btn btn-danger btn1" value="Add Certification" />
    </div>
    </div>
    </div>  
    </div>
    </div>
</div>
    </div>
      </div>
      <div class="tab-pane fade in" id="tab2">
      <div class="row"> 
      <div class="col-md-12">
      <div class="box box-primary" style="margin-top:5%;">
      <div class="box-header with-border">
      <div class="panel panel-primary">
      <div class="panel-heading clearfix">
      <div>
      <h4 class="panel-title" style="font-weight: bold;font-size: 17px;">Work Experience</h4>
      </div>
      <div id="workexpericence"></div>
      <div class="btn-group pull-right">
      <input type="button" id="workexp" class="btn btn-danger btn1" value="Add Work Experience" />
      </div>
      </div>
      </div>
      <?php if($value['prof_id'] == 2 || $value['prof_id'] == 8) {?>
      <div class="panel panel-primary">
      <div class="panel-heading clearfix">
      <div>
      <h4 class="panel-title" style="font-weight: bold;font-size: 17px;">Experience as a Player</h4>
      </div>
      <div id="playerexp"></div>
      <div class="btn-group pull-right">
      <input type="button" id="asplayerexp" class="btn btn-danger btn1" value="Add Experience as player" />
      </div>
      </div>
      </div>  
      <?php } ?>

      </div>
      </div>
      </div>      
      </div>       
      </div>
      <div class="tab-pane fade in" id="tab3">
      <div class="row"> 
      <div class="col-md-12">
      <div class="box box-primary" style="margin-top:5%;">
      <div class="box-header with-border">
      <div class='box-body'  style='background-color: white; border-color: black; border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'>
      <div>
      <span class="input input--hoshi">  
      <input type="text" class='input__field input__field--hoshi' name="dob" id="dob" value="<?php echo $value['dob'];?>" disabled>
      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="dob"><span class="input__label-content input__label-content--hoshi">Date Of Birth</span></label>
      </span>
      </div>
      <div>
      <span class="input input--hoshi">  
      <input type="text" class='input__field input__field--hoshi' name="prof_language" id="prof_language" value="<?php echo $value['prof_language'];?>"  >
      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="prof_language"><span class="input__label-content input__label-content--hoshi">Language Known</span></label>
      </span>
      </div>
      <div>
      <span class="input input--hoshi"> 
      <input type="text" class='input__field input__field--hoshi' name="rurl" id="rurl" >
      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="exampleInputEmail1"><span class="input__label-content input__label-content--hoshi">Age Group Coach</span></label>
      </span>
      </div>
      <div>
      <span class="input input--hoshi">  
      <input type="text" class='input__field input__field--hoshi' name="prof_name" id="prof_name" value="<?php echo $value['prof_name'];?>" disabled>
      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="prof_name"><span class="input__label-content input__label-content--hoshi">Profession</span></label>
      </span>
      </div>
      <div>
      <span class="input input--hoshi">  
      <input type="text" class='input__field input__field--hoshi' name="sport" id="sport" value="<?php echo $value['sport'];?>"  disabled>
      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="sport"><span class="input__label-content input__label-content--hoshi">Sport</span></label>
      </span>
      </div>
      <div>
      <span class="input input--hoshi">     
      <input type="text" class='input__field input__field--hoshi' name="gender" id="gender" value="<?php echo $value['gender'];?>"  disabled>
      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="gender"><span class="input__label-content input__label-content--hoshi">Gender</span></label>
      </span>
      </div>
      <div>
      <span class="input input--hoshi"> 
      <input type="text" class='input__field input__field--hoshi' name="rurl" id="rurl" >
      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="exampleInputEmail1"><span class="input__label-content input__label-content--hoshi">Link to personal Website</span></label>
      </span>
      </div>
      <div>
      <span class="input input--hoshi">  
      <input type="text" class='input__field input__field--hoshi' name="academy_name" id="academy_name" >
      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="academy_name"><span class="input__label-content input__label-content--hoshi">Academy / Business Name</span></label>
      </span>
      </div>
      <div>
      <span class="input input--hoshi"> 
      <input type="text" class='input__field input__field--hoshi' value="<?php echo $value['location'];?>" name="Location" id="location" >
      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="location"><span class="input__label-content input__label-content--hoshi">Location</span></label>
      </span>
      </div>
      <div>
      <span class="input input--hoshi"> 
      <input type="text" class='input__field input__field--hoshi' name="Description" id="description" >
      <input type="hidden" class='input__field input__field--hoshi' name="Prof" id="prof_name" value="<?php echo $value['prof_name'];?>">
      <input type="hidden" name="prof_id" id="prof_id" value="<?php echo $value['prof_id'];?>">
      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="description"><span class="input__label-content input__label-content--hoshi">Description</span></label>
      </span>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>  
      </div>
      </div>
      <div class="box-footer">
      <input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Submit" name="Submit">
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
    <script type="text/javascript">
        $(document).ready(function() {
        $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
        $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
document.getElementById("addSportEdu").onclick = function() 
{
  var form     = document.getElementById("SportTicket");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='background-color: white;border-color: black;border-radius: 4px;padding: 60px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='nameofsporteducation"+ window.sportsticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='nameofsporteducation'><span class='input__label-content input__label-content--hoshi'>Name Of Sport Education</span></label></span></div><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='sport_inst_org"+ window.sportsticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='sport_inst_org'><span class='input__label-content input__label-content--hoshi'>Institution/Organisation Name</span></label></span></div><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='sport_stream_spel"+ window.sportsticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='sport_stream_spel'><span class='input__label-content input__label-content--hoshi'>Stream /Specialisation</span></label></span></div><label style='margin:7px;color: #333;font-weight: 100;'  for='link'>Period</label><div></div><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='input__field input__field--hoshi'   id='sport_from_date"+ window.sportsticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='from_period'><span class='input__label-content input__label-content--hoshi'>From</span></label><div style='background-color: transparent;border: none;' class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div><div class='collapse in' id='sportedu_colaps"+ window.sportsticket +"'><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='input__field input__field--hoshi' id='sport_to_date"+ window.sportsticket +"' class='form-control'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='from_period'><span class='input__label-content input__label-content--hoshi'>To</span></label><div style='background-color: transparent;border: none;' class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div></div><div class='checkbox col-sm-10'><label style='color:black;'><input type='checkbox' id='sportedu_cheak"+window.sportsticket+"' data-toggle='collapse' data-target='#sportedu_colaps"+ window.sportsticket +"' aria-expanded='false' aria-controls='sportedu_colaps"+ window.sportsticket +"'>Till Date</label></div></div>"; 
    form.appendChild(newDiv);
    window.sportsticket++;
}
document.getElementById("addSportFormal").onclick = function() 
{
  var form     = document.getElementById("FormalEducation");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='background-color: white;border-color: black;border-radius: 4px;padding: 60px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='formal_education"+  window.formalticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='formal_education'><span class='input__label-content input__label-content--hoshi'>Name of Formal Education</span></label></span></div><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='formal_inst_org"+ window.formalticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='formal_inst_org'><span class='input__label-content input__label-content--hoshi'>Institution / Organisation Name</span></label></span></div><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='formal_stream"+ window.formalticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='formal_stream'><span class='input__label-content input__label-content--hoshi'>Stream /Specialisation</span></label></span></div><label style='margin:7px;color: #333;font-weight: 100;'  for='link'>Period</label><div></div><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='input__field input__field--hoshi'   id='formal_from_date"+ window.formalticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='from_period'><span class='input__label-content input__label-content--hoshi'>From</span></label><div style='background-color: transparent;border: none;' class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div><div class='collapse in' id='formaledu_colaps"+ window.formalticket +"'><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='input__field input__field--hoshi' id='formal_to_date"+  window.formalticket +"' class='form-control'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='from_period'><span class='input__label-content input__label-content--hoshi'>To</span></label><div style='background-color: transparent;border: none;' class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div></div><div class='checkbox col-sm-10'><label style='color:black;'><input type='checkbox' id='formaledu_cheak"+ window.formalticket +"' data-toggle='collapse' data-target='#formaledu_colaps"+ window.formalticket +"' aria-expanded='false' aria-controls='formaledu_colaps"+ window.formalticket +"'>Till Date</label></div></div>"; 
    form.appendChild(newDiv);
    window.formalticket++;
}
document.getElementById("addothereducation").onclick = function() 
{
  var form     = document.getElementById("OtherEducation");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='    background-color: white;border-color: black;border-radius: 4px;padding: 60px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='certi_name"+  window.ohterticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='certi_name'><span class='input__label-content input__label-content--hoshi'>Name of Certificate</span></label></span></div><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='certi_inst_org"+ window.ohterticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='certi_inst_org'><span class='input__label-content input__label-content--hoshi'>Institution / Organisation Name</span></label></span></div><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='certi_stream"+window.ohterticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='certi_stream'><span class='input__label-content input__label-content--hoshi'>Stream /Specialisation</span></label></span></div><label style='margin:7px;color: #333;font-weight: 100;'  for='link'>Period</label><div></div><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='input__field input__field--hoshi'   id='certi_from_date"+ window.ohterticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='from_period'><span class='input__label-content input__label-content--hoshi'>From</span></label><div style='background-color: transparent;border: none;' class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div><div class='collapse in' id='other_colaps"+ window.ohterticket +"'><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='input__field input__field--hoshi' id='certi_to_date"+ window.ohterticket +"' class='form-control'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='from_period'><span class='input__label-content input__label-content--hoshi'>To</span></label><div style='background-color: transparent;border: none;' class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div></div><div class='checkbox col-sm-10'><label style='color:black;'><input type='checkbox' id='otheredu_cheak"+window.ohterticket+"' data-toggle='collapse' value='1' data-target='#other_colaps"+ window.ohterticket +"' aria-expanded='false' aria-controls='other_colaps"+ window.ohterticket +"'>Till Date</label></div></div>"; 
    form.appendChild(newDiv);
    window.ohterticket++;
}
document.getElementById("workexp").onclick = function() 
{
  var form     = document.getElementById("workexpericence");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='    background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='work_exp_name"+ window.workexpticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='work_exp_inst_org'><span class='input__label-content input__label-content--hoshi'>Designation</span></label></span></div><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='work_exp_inst_org"+ window.workexpticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='work_exp_inst_org'><span class='input__label-content input__label-content--hoshi'>Institution / Organisation Name</span></label></span></div><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='work_exp_desc"+ window.workexpticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='work_exp_desc'><span class='input__label-content input__label-content--hoshi'>Description</span></label></span></div><label style='margin:7px;color: #333;font-weight: 100;'  for='link'>Period</label><div></div><div class='collapse in' id='workexp_colaps"+ window.workexpticket +"'><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='input__field input__field--hoshi'   id='work_from_date"+ window.workexpticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='from_period'><span class='input__label-content input__label-content--hoshi'>From</span></label><div style='background-color: transparent;border: none;' class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div><div class='collapse in' id='workexp_colaps"+ window.workexpticket +"'><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='input__field input__field--hoshi' id='work_to_date"+ window.workexpticket +"'  class='form-control'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='from_period'><span class='input__label-content input__label-content--hoshi'>To</span></label><div style='background-color: transparent;border: none;' class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div></div><div class='checkbox col-sm-10'><label style='color:black;'><input type='checkbox' id='workexp_cheak"+ window.workexpticket +"' data-toggle='collapse' data-target='#workexp_colaps"+ window.workexpticket +"' aria-expanded='false' aria-controls='workexp_colaps"+ window.workexpticket +"'>Till Date</label></div>"; 
    form.appendChild(newDiv);
    window.workexpticket++;
}
document.getElementById("asplayerexp").onclick = function() 
{
  var form     = document.getElementById("playerexp");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='    background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='exp_asplayer_name"+ window.asplayerticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='asplayer_name'><span class='input__label-content input__label-content--hoshi'>Best Result</span></label></span></div><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='exp_asplayer_inst_org"+ window.asplayerticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='exp_asplayer_inst_org'><span class='input__label-content input__label-content--hoshi'>Tournament / Competition Name</span></label></span></div><div><span class='input input--hoshi'><input type='text' class='input__field input__field--hoshi' id='exp_asplayer_desc"+ window.asplayerticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='exp_asplayer_desc'><span class='input__label-content input__label-content--hoshi'>Level</span></label></span></div><label style='margin:7px;color: #333;font-weight: 100;'  for='link'>Date</label><div></div><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='input__field input__field--hoshi'   id='exp_asplayer_from_date"+ window.asplayerticket +"'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='from_period'><span class='input__label-content input__label-content--hoshi'>From</span></label><div style='background-color: transparent;border: none;' class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div><div class='input-group date' style='margin:5px; overflow: hidden;display:none;' data-provide='datepicker'><input type='text' class='input__field input__field--hoshi' id='exp_asplayer_to_date"+ window.asplayerticket +"'  class='form-control'><label class='input__label input__label--hoshi input__label--hoshi-color-1' for='from_period'><span class='input__label-content input__label-content--hoshi'></span></label><div style='background-color: transparent;border: none;' class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div></div>"; 
    form.appendChild(newDiv);
    window.asplayerticket++;
}
function formatDate(date) 
{
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;
    return [year, month, day].join('-');
}
$("#save").click(function()
{
 var sportArray = [];
 var formalArray = [];
 var otherArray = [];
 var workArray = [];
 var asplayerArray = [];
 var finalArray = [];

  for(var i =0; i <window.sportsticket; i++)
  {
  var fromdate = formatDate($("#sport_from_date"+i).val());
  if($("#sportedu_cheak"+i).is(':checked'))
  {
    var todate = "Till Date";
    var tilldate = '1';
  }
  else
  {
   var todate = formatDate($("#sport_to_date"+i).val());
   var tilldate = '0';
  }
    var temp = {"degree":$("#nameofsporteducation"+i).val(),"organisation":$("#sport_inst_org"+i).val(),"stream":$("#sport_stream_spel"+i).val(),"dateFrom":fromdate, "dateTo":todate,"tillDate":tilldate};
      sportArray.push(temp);
  }


for(var i =0; i <window.formalticket; i++)
{
  var fromdate = formatDate($("#formal_from_date"+i).val());
  if($("#formaledu_cheak"+i).is(':checked'))
  {
    var todate = "Till Date";
    var tilldate = '1';
  }
  else
  {
   var todate = formatDate($("#formal_to_date"+i).val());
   var tilldate = '0';
  }
  var temp = {"degree":$("#formal_education"+i).val(),"organisation":$("#formal_inst_org"+i).val(),"stream":$("#formal_stream"+i).val(),"dateFrom":fromdate, "dateTo":todate,"tillDate":tilldate};
      formalArray.push(temp);
}
for(var i =0; i <window.ohterticket; i++)
{
  var fromdate = formatDate($("#certi_from_date"+i).val());
  if($("#otheredu_cheak"+i).is(':checked'))
  {
    var todate = "Till Date";
    var tilldate = '1';
  }
  else
  {
    var todate = formatDate($("#certi_to_date"+i).val());
   var tilldate = '0';
  }

  var temp = {"degree":$("#certi_name"+i).val(),"organisation":$("#certi_inst_org"+i).val(),"stream":$("#certi_stream"+i).val(),"dateFrom":fromdate, "dateTo":todate, "tillDate":tilldate};
      otherArray.push(temp);
  }

for(var i =0; i <window.workexpticket; i++)
{
  var fromdate = formatDate($("#work_from_date"+i).val());
   if($("#workexp_cheak"+i).is(':checked'))
  {
    var todate = "Till Date";
    var tilldate = '1';
  }
  else
  {
    var todate = formatDate($("#work_to_date"+i).val());
   var tilldate = '0';
  }
  //var todate = formatDate($("#work_to_date"+i).val());
  var temp = {"designation":$("#work_exp_name"+i).val(),"organisationName":$("#work_exp_inst_org"+i).val(),"description":$("#work_exp_desc"+i).val(),"dateFrom":fromdate,"dateTo":todate,"tillDate":tilldate};
      workArray.push(temp);
}
for(var i =0; i <window.asplayerticket; i++)
{
  var fromdate = formatDate($("#exp_asplayer_from_date"+i).val());
  var todate = formatDate($("#exp_asplayer_to_date"+i).val());
  var temp = {"designation":$("#exp_asplayer_name"+i).val(),"organisationName":$("#exp_asplayer_inst_org"+i).val(),"description":$("#exp_asplayer_desc"+i).val(),"dateFrom":fromdate,"dateTo":todate,"tillDate":'0'};
      asplayerArray.push(temp);
  }
  var ftemp = {"Education":{"formalEducation" : formalArray,"otherCertification":otherArray,"sportEducation":sportArray},"Experience":{"experienceAsPlayer":asplayerArray,"workExperience":workArray},"HeaderDetails":{"acamedy":$("#academy_name").val() ,"description":$("#description").val() ,"designation":$("#prof_name").val() ,"location":$("#location").val()}};
var totalftemp = JSON.stringify(ftemp);
//alert(totalftemp); 
saveUserProfile(totalftemp);
});
</script>               
<script>
      (function() {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
          (function() {
            // Make sure we trim BOM and NBSP
            var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
            String.prototype.trim = function() {
              return this.replace(rtrim, '');
            };
          })();
        }

        [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
          // in case the input is already filled..
          if( inputEl.value.trim() !== '' ) {
            classie.add( inputEl.parentNode, 'input--filled' );
          }

          // events:
          inputEl.addEventListener( 'focus', onInputFocus );
          inputEl.addEventListener( 'blur', onInputBlur );
        } );

        function onInputFocus( ev ) {
          classie.add( ev.target.parentNode, 'input--filled' );
        }

        function onInputBlur( ev ) {
          if( ev.target.value.trim() === '' ) {
            classie.remove( ev.target.parentNode, 'input--filled' );
          }
        }
      })();
    </script>

<!-- 
    <script type="text/javascript">
    function showPreview(objFileInput) {
      alert(objFileInput)
      hideUploadOption();
      if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
          $("#targetLayer").html('<img src="'+e.target.result+'" width="200px" height="200px" class="upload-preview" />');
          $("#targetLayer").css('opacity','0.7');
          $(".icon-choose-image").css('opacity','0.5');
        }
        fileReader.readAsDataURL(objFileInput.files[0]);
      }
    }
    function showUploadOption(){
      alert("fdas");
      $("#profile-upload-option").css('display','block');
    }

    function hideUploadOption(){
      $("#profile-upload-option").css('display','none');
    }

    $(document).ready(function (e) {
      $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
          url: "upload.php",
          type: "POST",
          data:  new FormData(this),
          beforeSend: function(){$("#body-overlay").show();},
          contentType: false,
          processData:false,
          success: function(data)
          {
          $("#targetLayer").css('opacity','1');
          setInterval(function() {$("#body-overlay").hide(); },500);
          },
          error: function() 
          {
          }           
         });
      }));
    });
    </script>
  -->
 
<script type="text/javascript">
  $(document).ready(function (e) {
  $("#form").on('submit',(function(e) {  
    var url = '<?php echo site_url();?>';
   $('#imagelodar').show();
    e.preventDefault();
    $.ajax({
      url: "<?php echo site_url('forms/profileimage');?>",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      beforeSend : function()
      {
        $("#err").fadeOut();
      },
      success: function(data)
        {
           $('#myModal').modal('toggle');
            location.reload();
           $('#imagelodar').hide();
          
        },
        error: function(e) 
        {   
        }           
     });
  }));
});
</script>



<style>
.container{
    margin-top:20px;
}
.image-preview-input {
    position: relative;
  overflow: hidden;
  margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
  </style>
  <script type="text/javascript">
    
    $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'top'
    });
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    });
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });    
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});

</script>





</html>
    