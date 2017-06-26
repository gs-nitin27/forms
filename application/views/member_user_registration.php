<!Doctype html>
<html>
<head>
<title>Getsporty</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">   <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.1/jquery-confirm.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.1/jquery-confirm.min.js"></script>
<link href="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.css" rel="stylesheet" />   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/reg.css'); ?>">
  </head>
<body style="background-color: #03a9f4">
 <div class="section"></div>
  <main>
    <div style="text-align: center;">
      <img class="responsive-img" style="width: 300px;height: 60px;" src="http://getsporty.in/img/logo.png" />
      <div class="section"></div>

    

      <div class="container">
        <div class="z-depth-4 grey lighten-4 row" style=" display: inline-block; padding: 4% 4% 4% 4%; border: 1px solid #EEE;">
<div class="row">

<h4> Register</h4>
          <div class="row">
          <form class="col s12">   
          <div class="row">
          <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>

          <input id="name" type="text" class="validate">
          <label for="name">Name</label>
        </div></div>
        <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" type="text" class="validate">
          <label for="email">Email</label>
        </div></div>
                 <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">phonelink_ring</i>
          <input id="phone_no" type="text" class="validate">
          <label for="phone_no">Phone No</label>
        </div></div>
                <div class="row">
                  <div class="input-field col s6">
                     <i class="material-icons prefix"></i> 
                      <?php  $sports = $this->register->getSport();?>
                      <select id="sport" name="sport">
                              <option value="" disabled selected>Choose your option</option>
                              <?php if(!empty($sports)){
                        foreach($sports as $sport){?>

                                <option  value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
                                  <?php   }
                           } 
                         ?>
                       </select>
                      <label>Choose sports</label>
                    </div>
                 <div class="input-field col s6">
          
          <input id="dob"  type="email" class="validate datepicker">
          <label for="dob" data-error="wrong" data-success="right">Date Of Birth</label>
        </div>
  </div>
      <div class="row">
      <div class="input-field col s6">
      <i class="material-icons prefix"></i> 
       <?php  $prof = $this->register->getprofession();?>
    <select id="profession"  name="profession">
      <option value="" disabled selected>Choose your option</option>
      <?php if(!empty($prof)){
                        foreach($prof as $prf){?>
       <option value ="<?php echo $prf['profession'];?>,<?php echo $prf['id'];?>"><?php echo $prf['profession'];?> </option>
       <?php   }
                           } 
                         ?>
    </select>
    <label>Choose profession</label>
  </div>
         <div class="input-field col s6">
     <select id="gender"  name="gender">
      <option value="" disabled selected>Choose your Gender</option>
                  <option id="male" value="Male">Male</option>
                  <option id="female" value="Female">Female</option>
    </select>
    <label>Gender</label>
  </div></div>
                 <div class="row">
                           <div class="input-field col s4">
                           <label style='float: right;'>
                <a class='pink-text' href='#!'><b>Already registered?</b></a>
              </label>
                          </div>

                          <div class="input-field col s8">
                            <button class="btn cyan waves-effect waves-light right" type="button"  id="save" name="action">Sign UP
                              
                            </button>
                          </div>
                        </div>
                    
                    </form>
                  </div>
        </div>
      </div>

    </div>

  </div>
  </main>
  </body>

<script type="text/javascript">
    
    $(document).ready(function() {
    $('select').material_select();
  });
    $('.datepicker').pickadate({  
    selectYears: 120,
    selectMonths: 12, // 
    format: 'dd/mm/yyyy',
    
    max: true,
    closeOnSelect: true,
    closeOnClear: true,
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
     dataType: 'JSON',        
     success:function(result)
     {
      alert(result.data);
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
