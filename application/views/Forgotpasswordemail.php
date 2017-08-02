<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>

#form {
        border: 3px solid #f1f1f1;
        margin-left: 470px;
        margin-right: 541px;
        position: static;


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
<body>
<div style=" margin-top: 16%;">
<div style="color: red;text-align: center; " id="confirm-div" hidden="" ></div>
</div>
<div id="form">
<form action="<?php echo site_url('forms/Emailfind'); ?>" method="post" > 
    <div class="container" style="width:300px;">
   <input type="hidden" name="userid" value=""> 
   
    <input type="hidden" placeholder="Verification Code" name="Verification" required> 
    <label><b>Email Id</b></label>
    <input type="text" placeholder="Email Id" name="email" required>  
    <button type="submit">Submit</button>
  </div>

 
</form>
</div>

</body>
</html>

<script>
// assumes you're using jQuery
$(document).ready(function() {
$('#confirm-div').hide();
<?php if($this->session->flashdata('msg')){ ?>
$('#confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();
});
<?php } ?>
</script>
  