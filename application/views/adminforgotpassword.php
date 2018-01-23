<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>



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
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
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
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #4344a0;
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
body {
  background: #5867be; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #5867be, #4c5dba);
  background: -moz-linear-gradient(right, #5867be, #4c5dba);
  background: -o-linear-gradient(right, #5867be, #4c5dba);
  background: linear-gradient(to left, #5867be, #4c5dba);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>
      

  
</head>

<body>


  
 
   
 
  
  
  <div class="login-page">
   <div class="form" style="margin-top: 12%;">
<form class="login-form" action="<?php echo site_url('forms/verifyadmin'); ?>" method="post"  onsubmit="return Emailcheak();" > 
    <div class="container" style="width:300px;">
    <input type="hidden" name="email" value="<?php echo $_GET['email'];?>">
  
    <input type="hidden" placeholder="Verification Code" name="Verification" required> 
    <label><b>New Password</b></label>
    <input type="password" placeholder="New Password"  name="Newpassword" id="Newpassword" required>
    <label><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="Confirmpassword" id="Confirmpassword" required>
    <button type="submit"  >Submit</button>
  </div>
</form>
</div>
</div>
<div id="error_text"><h3 style="text-align: center;color:red"><?php echo $this->session->flashdata('error');?></h2>
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
            $('#msg').text('Password Not Matched');
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
        
       $('#msg').text('Minimum length 6');
       return false;
    }
}
</script>
