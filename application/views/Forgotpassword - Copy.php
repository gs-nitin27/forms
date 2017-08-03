<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<style>
form {
        border: 3px solid #f1f1f1;
        margin-left: 400px;
        margin-right: 590px;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

<form action="<?php echo site_url('forms/verifyuser'); ?>" method="post"  onsubmit="return Emailcheak();" > 
    <div class="container" style="width:300px;">
    <input type="hidden" name="userid" value="<?php echo $_GET['id'];?>">
  
    <input type="hidden" placeholder="Verification Code" name="Verification" required> 
    <label><b>New Password</b></label>
    <input type="password" placeholder="New Password"  name="Newpassword" id="Newpassword" required>
    <label><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="Confirmpassword" id="Confirmpassword" required>
    <button type="submit"  >Submit</button>
  </div>
</form>
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
