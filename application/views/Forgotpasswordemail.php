<!DOCTYPE html>
<html>
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
<body>


<form action="<?php echo site_url('forms/Emailfind'); ?>" method="post" > 
    <div class="container" style="width:300px;">
   <input type="hidden" name="userid" value=""> 
   
    <input type="hidden" placeholder="Verification Code" name="Verification" required> 
    <label><b>Email Id</b></label>
    <input type="text" placeholder="Email Id" name="email" required>  
    <button type="submit">Submit</button>
  </div>

 
</form>
<div id="error_text"><h3 style="text-align: center;color: red"><?php echo $this->session->flashdata('error'); ?></h2></div> 
  <?php if(isset($mes)) {?>
<div><h3 style="text-align: center;color: green"><?php print_r($_POST); ?></h2></div>
<?php }?>
</body>
</html>
