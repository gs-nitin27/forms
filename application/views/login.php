<?php session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Getsporty</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/default.css'); ?>">
   <script src="<?php echo base_url('assets/jquery-ui.min.js'); ?>"></script>
   <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"></head>
<script src="https://apis.google.com/js/platform.js <?php //echo base_url('assets/platform.js'); ?>" async defer></script>
<meta name="google-signin-scope" content="profile email">

<meta name="google-signin-client_id" content="<?php echo GOOGLE_APP_ID; ?>">
 <style type="text/css">
   .btn-google {
    background-color: #dd4b39;
    background-image: url(http://vagnersantana.com/social-signin-btns/img/google.svg);
}.btn-si {
    background-position: 1em;
    background-repeat: no-repeat;
    background-size: 2em;
    border-radius: 0.5em;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 1em;
    height: 4em;
    line-height: 1em;
    padding: 0 2em 0 4em;
    text-decoration: none;
    transition: all 0.5s;
}
.social_login{
border: 0.5px solid #ccc;
    padding: 28px 27px 21px 37px;
    /* align-items: center; */
    /* float: inherit; */
    /* vertical-align: middle; */
    /* margin-left: 0%; */
    position: relative;
    left: 130%;


}
 </style>    


<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=<?php echo FACEBOOK_APP_ID; ?>';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
 <div class="pre-loader">
        <div class="load-con" style="text-align: center;">
            <img src="<?php echo base_url('img/logo.png');?>" class="animated fadeInDown" style="width: 296px;height: auto;" alt=""> 
        </div> 
    </div>
  <div class = "container">
	<div class="wrapper" style="position:fixed; margin-top:2%;">
   <!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button> --><!-- <div class="fb-login-button" data-width="30" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="true" data-onsuccess="login" data-auto-logout-link="false" data-use-continue-as="true"></div> --><!-- <div class="fb-login-button" data-width="30" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="true" data-onsuccess="login"  onlogin="checkLoginState()" data-auto-logout-link="false" data-use-continue-as="true"></div> -->
  <!-- <div id="status"></div><div style="margin-left: 45%;"> -->
 <div class="social_login"><!-- <button class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="true" onlogin="checkLoginState()" style="min-width:254px;"></button> --><div class="fb-login-button" data-width="254" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false" onlogin="checkLoginState()"></div><!-- </div> -->
 <!-- <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" <h3>Click to login</h3></div> --> <br><br><br>
<!-- <button class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" style="width:254px;">Sign in with Google</button></div> -->
<div class="g-signin2" data-onsuccess="onSignIn" style="width:254px;"></div>
<!-- <button type="button" class="btn btn-gplus"><i class="fa fa-google-plus left"></i> Google +</button>
<button type="button" class="btn btn-fb"><i class="fa fa-facebook left"></i> Facebook</button> -->

  <!-- <button class="btn btn-lg btn-primary btn-block" data-onsuccess="onSignIn" data-theme="dark"><img src="<?php //echo base_url('img/google-login-button.png');?>"></button> --><!-- </form>  -->
</div> 
  <div id="error_text"><h3 style="text-align: center;color: red"><?php echo $this->session->flashdata('error'); ?></h3></div>	
  <div id="test" hidden>
  <h3 style="text-align: center;color: red;">You are not authorize to loging</h3>
  </div>

	</div>
</div>
</body>
</html>

<script type="text/javascript">
var app_id = '<?php echo FACEBOOK_APP_ID; ?>';
var app_version = '<?php echo FACEBOOK_VERSION; ?>';

function checkLoginState(){
FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });}
function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    if (response.status === 'connected') {
      testAPI();
    } else {
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }
function testAPI() {
  console.log('Welcome!  Fetching your information.... ');
  FB.api('/me?fields=id,email,first_name,last_name',function(response) {
        var email = response.email;
        login(email,response)
        console.log('Successful login for: ' + response.name);
     //   document.getElementById('status').innerHTML = "<img src='"+response.picture.data.url+"'>";
      }, {scope:'email'});
  }

 $(document).ready(function(){
/*  gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });*/
        localStorage.clear();
       // console.log(email+nitin);
       $('.g-signin2').click(function(){
        localStorage.setItem("count", 2);
       });
      });
</script>
<script type="text/javascript">
function login(emailid,user_data)
  {
   var data1 = {
     "email"    : emailid,
     "password" : emailid,
     "data"     : user_data
     };
     
var url = '<?php echo site_url();?>';
console.log(JSON.stringify(data1));
var data = JSON.stringify(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/gmaillogin'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
      var result  = JSON.parse(result);
      //alert(result.status);
      if(result.status==3){
       alert(result.msg);
     /*return;*/window.location.href = 'https://play.google.com/store/apps/details?id=getsportylite.darkhoprsesport.com.getsportylite&hl=en';//url+"/forms/home";
    }
    if(result.status==1){//alert(1);
      localStorage.setItem('userdata',JSON.stringify(data1));
     window.location.href = url+"/forms/new_registration";
    }
    else if(result.status==0) 
    {//alert(2);//return;
      localStorage.setItem('userdata',JSON.stringify(data1));
     window.location.href = url+"/forms/new_registration";
    }
   }
});
  }
  function onSignIn(googleUser) {

   // alert("hii");
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
        
        if( localStorage.getItem("count") == 2)
        {
         var email = profile.getEmail();
         var user_data = {"name":profile.getName(),"image":profile.getImageUrl(),"Email":profile.getEmail()};
        //alert(JSON.stringify(data2));return;
         //localStorage.setItem('data2',data2);
         login(email,user_data);
         }
         else
         {
          return false;
         }
      };


window.fbAsyncInit = function() {
    FB.init({
      appId      : "'"+app_id+"'",
      cookie     : true,
      xfbml      : true,
      version    : "'"+app_version+"'"
    });
      FB.AppEvents.logPageView();
      FB.api('/me', function(response) {
   });
};

(function(d, s, id){
   // alert("dsdsssdssd");
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


