<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>

 <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
          

<style>

\@import url(https://fonts.googleapis.com/css?family=Roboto:300);
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 380px;
  margin: 0 auto 100px;
  padding: 25px 30px;
  
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #03a9f4;
  width: 40%;
  border: 0;
  padding: 9px 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
      border-radius: 2.5%;

}
.form button:hover,.form button:active,.form button:focus {
  background: #2cbcfd;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
@font-face { font-family: GillSans; src: url('../../../font/GillSans.ttf'); } 

body {
      background: #03a9f4;
 
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;  
  font-family: 'Gillsans',sans-serif;   
}
input[type=password]:not(.browser-default):focus:not([readonly]){
      border-bottom: 1px solid #03a9f4;
    box-shadow: 0 1px 0 0 #03a9f4;
}
input[type=password]:not(.browser-default):focus:not([readonly])+label{
      color: #03a9f4;
}

</style>
      

  
</head>

<body>


  
 <div style="text-align: center;">

<img style="    width: 238px; margin-top: 4%;"src="" >

 </div>
   
 
  
  
  <div class="login-page">
   <div class="form" style="margin-top: 4%;">
<form class="login-form" action="<?php echo site_url('forms/verifyuser'); ?>" method="post"  onsubmit="return Emailcheak();" > 
    <div class="container" style="width:300px;">
    <input type="hidden" name="email" value="<?php echo $_GET['email'];?>">
  
    <input type="hidden" placeholder="Verification Code" name="Verification" required> 
    <div><h2 style="        margin: 10px;margin-bottom: 25px; font-size: 1.5em; text-align: center;">Change Your Password</h2></div>
    <div class="input-field">
    <input type="password" class="validate"  name="Newpassword" id="Newpassword" required>
    <label for="Newpassword">New Password</label>
    </div>
    <div class="input-field">
    <input type="password"  class="validate" name="Confirmpassword" id="Confirmpassword" required>
      <label for="Confirmpassword">Confirm Password</label></div>
    <button type="submit"  >Submit</button>
  </div>
  <div id="error_text"><h3 style="text-align: center;color:red"><?php echo $this->session->flashdata('error');?></h3>
</div> 

<div style="    font-size: 15px; text-align: center; color: red" id="msg" ></div>

</form>
</div>
</div>
<div id="error_text"><h3 style="text-align: center;color:red"><?php echo $this->session->flashdata('error');?></h3>
</div> 

<div style="text-align: center; color: red" id="msg" ></div>



<script type="text/javascript">

              
function Emailcheak() 
{       
        var npass=$('#Newpassword').val();
        if(npass.length>5)
        { 
        if($('#Newpassword').val()!=$('#Confirmpassword').val())
        {
            $('#msg').text('Password does not matched');
            $('#Newpassword').removeClass('valid');
            $('#Newpassword').addClass('invalid');
            $('#Confirmpassword').removeClass('valid');
            $('#Confirmpassword').addClass('invalid');
            
            return false;
        }
         else
         {
            //alert('Email sent to your account please click on the link to reset your password');
           // $('#msg').text('Email sent to your account please click on the link to reset your password');
            return true;
         }
    }
    else
    {
        
       $('#msg').text('Minimum 6 character required');

            $('#Newpassword').removeClass('valid');
            $('#Newpassword').addClass('invalid');
            $('#Confirmpassword').removeClass('valid');
            $('#Confirmpassword').addClass('invalid');
       return false;
    }
}
</script>
