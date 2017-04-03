<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Getsporty | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/default.css'); ?>">
   <script src="<?php echo base_url('assets/jquery-ui.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/plugins/daterangepicker/moment.min.js'); ?>"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.1/jquery-confirm.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.1/jquery-confirm.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css'); ?>">
</head>
<style type="text/css">
  /* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>

<body>
 <div class="pre-loader">
        <div class="load-con" style="text-align: center;">
            <img src="<?php echo base_url('img/logo.png');?>" class="animated fadeInDown"  alt=""> 
        </div>
    </div>

<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <hr class="colorgraph">
      <div class="form-group">
      <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Enter Name">
      </div>
      <div class="form-group">
      <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email">
      </div>
      <div class="form-group">
        <input type="text" name="phone_no" id="phone_no" class="form-control input-lg" placeholder="Phone No" >
      </div>
      <!-- <div class="form-group">
        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
      </div> -->
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
           <?php  $sports = $this->register->getSport();?>
                <select id="sport" class="form-control" name="sport">
                <option >-select Sport -</option> 
                <?php if(!empty($sports)){
                        foreach($sports as $sport){?>
                <option value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
                <?php   }
                           } 
                         ?>
                </select>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" class="form-control"  id="dob" placeholder="Date of Birth">
          </div>
        </div>
         <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <?php  $prof = $this->register->getprofession();?>
                <select id="profession" class="form-control" name="profession">
                <option >-select Profession -</option> 
                <?php if(!empty($prof)){
                        foreach($prof as $prf){?>
                <option value ="<?php echo $prf['profession'];?>,<?php echo $prf['id'];?>"><?php echo $prf['profession'];?> </option>
                <?php   }
                           } 
                         ?>
                </select>
          </div>
        </div>
         <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <select id="gender" class="form-control" name="gender">
                  <option>-Select Gender-</option>
                  <option id="male" value="Male">Male</option>
                  <option id="female" value="Female">Female</option>
                  </select>
          </div>
        </div>
      </div>
      
      <hr class="colorgraph">
      <div class="form-group">
        <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" id="save">
      </div>
  </div>
</div>
</div>
</body>

<script type="text/javascript">

$(document).ready(function(){
  $("#dob").datepicker();
});


$("#save").click(function()
{

  var professions = $("#profession").val();
  var prof_data = professions.split(",");

  var prof_id    = prof_data[1];
  var prof_name  = prof_data[0];



  var data1 = {
    "name"      : $("#name").val(),
    "email"     : $("#email").val(),
    "phone_no"  : $("#phone_no").val(),
    "dob"       : $("#dob").val(),
    "sport"     : $("#sport").val(),
    "prof_name" : prof_name,
    "prof_id"   : prof_id,
    "gender"    : $("#gender").val()
  };
  console.log(JSON.stringify(data1));
  var data = JSON.stringify(data1);
    $.ajax({ 
     type: "POST",
     url: "<?php echo site_url('forms/user_register');?>",                  
     data:"data="+data,                        
     dataType: 'text',        
     success:function(result)
     {
      alert(result);
       if(result.data == 1)
       {
        $.confirm({
        title: 'Congratulations!',
        content: '<h3>Registration is complete.</h3>',
        type: 'green',
        typeAnimated: true,
        animationSpeed: 1500,
        animationBounce: 3,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                }
            },
            close: function () {
             
            }
        }
    });
       }
       else if(result.data == 0)
       {
              $.confirm({
              title: 'Encountered an error!',
              content: 'Something went Worng, this may be server issue.',
              type: 'dark',
              typeAnimated: true,
              animationSpeed: 1500,
              animationBounce: 3,
              buttons: {
                  tryAgain: {
                      text: 'Try again',
                      btnClass: 'btn-dark',
                      action: function(){
                      }
                  },
                  close: function () {
                  }
              }
          });


       }
       else
       {
        $.confirm({
        title: 'Sorry!',
        content: '<h3>User is already register please loging.</h3>',
        type: 'red',
        typeAnimated: true,
        animationSpeed: 1500,
        animationBounce: 3,
        buttons: {
            tryAgain: {
                text: 'OK !',
                btnClass: 'btn-red',
                action: function(){
                }
            },
            close: function () {
             
            }
        }
    });


       }


     }
  });


});

</script>
</html>
