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
 <link rel="stylesheet" href="<?php echo base_url('assets/css/loder.css');?>">
<style type="text/css">
  @font-face { font-family: GillSans; src: url('../../../font/GillSans.ttf'); } 
body{
  font-family: 'Gillsans',sans-serif;
}
.input-field input[type=date]:focus, .input-field input[type=text]:focus, .input-field input[type=email]:focus, .input-field input[type=password]:focus {
    border-bottom: 2px solid #03a9f4;
    box-shadow: none;
}
.input-field .prefix.active{
  color:#03a9f4;
}
.input-field input[type=text]:focus+label{
  color:#03a9f4;
}
.pink-text {
    color: #03a9f4 !important;
}
.dropdown-content li>a, .dropdown-content li>span {
   
    color: #03a9f4;
  }
  .grey.lighten-4 {
    background-color: #fffefe !important;
}
.cyan {
    background-color: #03a9f4 !important;
}
</style>
<body style="background-color: #03a9f4">
 <div class="section"></div>
 <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
  <main>
    <div style="text-align: center;">
      <img class="responsive-img" style="width: 300px;height: 60px;" src="http://getsporty.in/img/logo.png" />
      <div class="section"></div>

    

      <div class="container">
        <div class="z-depth-4 grey lighten-4 row" style=" width: 80%; display: inline-block; padding: 4% 4% 4% 4%; border: 1px solid #EEE;">
<div class="row">

<h4> Register</h4>
          <div class="row">
          <form class="col s12">   
          <div class="row">
          <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>

          <input id="name" type="text" class="validate" name="name">
          <label for="name">Name</label>
        </div></div>
        <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" type="email" class="validate" >
          <label for="email">Email</label>
        </div></div>
                 <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">phonelink_ring</i>
          <input id="phone_no" type="number" class="validate" >
          <label for="phone_no">Phone No</label>
        </div></div>
                <div class="row">
                  <div id="sports1" class="input-field col s6" >
                     <i class="material-icons prefix"></i> 
                      <?php  $sports = $this->register->getSport();
                                                  ?>
                      <select id ="sport" >
                              <option  value="" disabled selected >Choose your option </option>
                              <?php  if(!empty($sports))
                              {
                                foreach($sports as $sport){?>
                                <option  ><?php echo $sport['sports'];?>  </option> 
                                  <?php   }
                           } 
                         ?>
                       </select>
                      <label>Choose sports</label>
                    </div>
                 <div class="input-field col s6">
          
          <input  id="dob"  type="email" class="validate datepicker"  name="dob">
          <label for="dob" data-error="wrong" data-success="right">Date Of Birth</label>
        </div>
  </div>
      <div class="row">
      <div  id="profession1" class="input-field col s6">
      <i class="material-icons prefix"></i> 
       <?php  $prof = $this->register->getprofession();?>
    <select id="profession" >
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
         <div id="gender1" class="input-field col s6">
     <select id="gender"  name="gender">
      <option value="" disabled selected>Choose your Gender</option>
                  <option id="male" value="Male">Male</option>
                  <option id="female" value="Female">Female</option>
    </select>
    <label>Gender</label>
  </div></div>
                <div class="row">

                <div class="input-field col s4">
                <label style='margin-left: 18%;float: right;'>
                <a style="cursor: pointer;" class='pink-text' onclick="register1();"><b>Already registered?</b></a>
                </label>
                </div>
                <div class="input-field col s8">
                <button class="btn cyan waves-effect waves-light right" type="button"  id="save" name="action"  >REGISTER              
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


 function register1()
 {
 window.location.href = "https://getsporty.in/web/#/login";
 } 

  function register()
  {
   $.confirm({
        title: 'Sign In',
        boxWidth: '33%',
        useBootstrap: false,
        content: '' +
      '<hr class="colorgraph"><br>' +
      '<input type="text" class="form-control" id="username" name="username" placeholder="Username" required="" autofocus="" />' +
      '<input type="password" class="form-control" id="password" name="password" placeholder="Password" required=""/>',
        buttons: {
            formSubmit: {
                 text: 'Submit',
                 btnClass: 'btn-blue',
                 action: function(){

                $("#imagelodar").show();
                     
                 var data1 = {
                    "email"      : $("#username").val(),
                    "password"     : $("#password").val()
                   };

                  console.log(JSON.stringify(data1));
                  var profileurl = '<?php echo site_url();?>';
                  var data = JSON.stringify(data1);
                    $.ajax({ 
                     type: "POST",
                     url: "<?php echo site_url('forms/editRegiterUser');?>",                  
                     data:"data="+data,                        
                     dataType: 'JSON',        
                     success:function(result)
                     {
                         //alert(result.data.userid);
                         //return ;

                          if(result.data.userid)
                          {
                              $.confirm({
                              title: 'Thank You For Login!',
                              content: '<h3>Please Update Your Profile</h3>',
                              type: 'green',
                              typeAnimated: true,
                              boxWidth: '33%',
                              useBootstrap: false,
                              animationSpeed: 1500,
                              animationBounce: 3,
                              buttons: {
                                  tryAgain: {
                                      text: 'Thank You !',
                                      btnClass: 'btn-green',
                                      action: function(){

                                        localStorage.setItem('userid',result.data.userid);
                                        localStorage.setItem('prof_id',result.data.prof_id);
                                   // $.ajax({
                                   //  url: "http://testingapp.getsporty.in/userEdit.php?act=getUserProfile&userid=2&prof_id=2",
                                   //  type: "GET",
                                   //    success: function(resultData) {
                                              
                                   //            localStorage.setItem('userid',);
                                   //            localStorage.setItem('userid',)
                                   //        // localStorage.setItem('testObject',JSON.stringify(resultData));
                                   //        //alert(localStorage.getItem('testObject'));
                                   //      },
                                   //      error : function(jqXHR, textStatus, errorThrown) {
                                   //      },

                                   //      timeout: 120000,
                                   //  });
                                     
                                    //return;

                                    window.location.href = profileurl+ "/forms/editRegisterUserProfile";

                                      }
                                  },
                                  close: function () {

                                    localStorage.setItem('userid',result.data.userid);
                                    localStorage.setItem('prof_id',result.data.prof_id);

                                    window.location.href = profileurl+ "/forms/editRegisterUserProfile";
                                    // window.location.href = profileurl+ "/forms/editRegisterUserProfile" + result.data.userid + "," + result.data.userid;

                                   
                                  }
                              }
                          });

                          }
                          else
                          {
                            $.confirm({
                              title: 'Encountered an error!',
                              content: 'Something went Worng, this may be server issue.',
                              type: 'dark',
                              typeAnimated: true,
                              boxWidth: '33%',
                              useBootstrap: false,
                              animationSpeed: 1500,
                              animationBounce: 3,
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
            },
            cancel: function () {
               
            }
        }
    });
  }

    
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


$( "#img" ).hide();


function valname()
    {   


        var n=0;
         var email1=document.getElementById('email').value;
        var atpos = email1.indexOf("@");
        var dotpos = email1.lastIndexOf(".");
        if($('#name').val() == "")
        {
            $( '#name' ).addClass('invalid');
             n++;

        }
        else
        {
          $( '#name' ).addClass('valid');
                 
        }
        if($('#phone_no').val() == "")
        {
            $( '#phone_no' ).addClass('invalid');
             n++;
        }
        else
        {
           $( '#phone_no' ).addClass('valid');
                 
        }


        if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email1.length)
        {
            $( '#email' ).addClass('invalid');
             n++;
        }
        else
        {
          $( '#email' ).addClass('valid');
              
        }

        if($('#gender :selected').val() == "")
        {
           $( '#gender1 input' ).css("border-bottom","none"); 

            $( '#gender1 input' ).addClass('invalid');
              $( '#gender1 input' ).css("border-bottom","1px solid red"); 

             n++;

        }
        else
        {
            
            $( '#gender1 input' ).removeClass('invalid');
            $( '#gender1 input' ).addClass('valid');
            $( '#gender1 input' ).css("border-bottom","1px solid green");  
        }

       

         if($('#dob').val() == "")
        {  
            $( '#dob' ).addClass('invalid');
             n++;
        }
        else
        {
            $( '#dob' ).removeClass('invalid');
            $( '#dob' ).addClass('valid');

        }

        if($('#sport :selected').val() == "")
        {
             $( '#sports1 input' ).css("border-bottom","none");  
            $( '#sports1 input' ).addClass('invalid');
              $( '#sports1 input' ).css("border-bottom","1px solid red"); 

             n++;
              
        }
        else
        {
           $( '#sports1 input' ).removeClass('invalid');
            $( '#sports1 input' ).addClass('valid');
            $( '#sports1 input' ).css("border-bottom","1px solid green");       
        }

        if($('#profession :selected').val() == "")
        {
            $( '#profession1 input' ).css("border-bottom","none");
            $( '#profession1 input' ).addClass('invalid');
              $( '#profession1 input' ).css("border-bottom","1px solid red"); 
             n++;

        }
        else
        {
            $( '#profession1 input' ).removeClass('invalid');
             $( '#profession1 input' ).addClass('valid');
            $( '#profession1 input' ).css("border-bottom","1px solid green");             
        }


       if(n==0)
        {
            return true;
        }
        else
        {
            return false;
        }

    }


$("#save").click(function()
{
     if(!valname())
        {
            return false;
        }
        else
  {

  $("#imagelodar").show();
  var professions = $("#profession").val();
  var prof_data;
  var prof_id=null;
  var prof_name=null;
  
if(professions!=null)
{
  var prof_data = professions.split(",");
  var prof_id    = prof_data[1];
  var prof_name  = prof_data[0];
}
  else{
  prof_data = $("#profession").val();
  }

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
  var profileurl = '<?php echo site_url();?>';
  var data = JSON.stringify(data1);
    $.ajax({ 
     type: "POST",
     url: "<?php echo site_url('forms/user_register');?>",                  
     data:"data="+data,                        
     dataType: 'JSON',        
     success:function(result)
     {
       //alert(result.data);
       if(result.data == 3 || result.data == 4)
       { 
        $("#imagelodar").hide();

        $.confirm({
        title: 'You are Already Register With Us!',
        content: '<h3>Please Sign In .</h3>',
        type: 'green',
        boxWidth: '33%',
        useBootstrap: false,
        typeAnimated: true,
        animationSpeed: 1500,
        animationBounce: 3,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                   window.location.href = "https://getsporty.in/web/#/login";
                }
            },
            close: function () {
               window.location.href = "https://getsporty.in/web/#/login";
            }
        }
    });
    //     $.confirm({
    //     title: 'You are Already Register Please Sign In',
    //     boxWidth: '33%',
    //     useBootstrap: false,
    //     content: '' +
    //   '<hr class="colorgraph"><br>' +
    //   '<input type="text" class="form-control" id="username" name="username" placeholder="Username" required="" autofocus="" />' +
    //   '<input type="password" class="form-control" id="password" name="password" placeholder="Password" required=""/>',
    //     buttons: {
    //         formSubmit: {
    //              text: 'Submit',
    //              btnClass: 'btn-blue',
    //              action: function(){
    //               $("#imagelodar").show();
    //              var data1 = {
    //                 "email"      : $("#username").val(),
    //                 "password"     : $("#password").val()
    //                };
    //               console.log(JSON.stringify(data1));
    //               var profileurl = '<?php //echo site_url();?>';
    //               var data = JSON.stringify(data1);
    //                 $.ajax({ 
    //                 type: "POST",
    //                 url: "<?php //echo site_url('forms/editRegiterUser');?>",                  
    //                 data:"data="+data,                        
    //                 dataType: 'JSON',        
    //                 success:function(result)
    //                 {
    //                       if(result.data.userid)
    //                       {
    //                           $.confirm({
    //                           title: 'Thank You For Login!',
    //                           content: '<h3>Please Update Your Profile</h3>',
    //                           type: 'green',
    //                           typeAnimated: true,
    //                           boxWidth: '33%',
    //                           useBootstrap: false,
    //                           animationSpeed: 1500,
    //                           animationBounce: 3,
    //                           buttons: {
    //                               tryAgain: {
    //                                   text: 'Thank You !',
    //                                   btnClass: 'btn-green',
    //                               action: function(){


    //                                 //    $.ajax({

    //                                 // url: "http://testingapp.getsporty.in/userEdit.php?act=getUserProfile&userid=2&prof_id=2",

    //                                 //     type: "GET",

    //                                 //     contentType: 'application/json; charset=utf-8',
    //                                 //     success: function(resultData) {
    //                                 //         alert(resultData);

    //                                 //     },
    //                                 //     error : function(jqXHR, textStatus, errorThrown) {
    //                                 //     },

    //                                 //     timeout: 120000,
    //                                 // });
    //                                     var options = {
    //                                     origin: "http://www.getsporty.in"
    //                                     };
    //                                     // Storage = crossDomainStorage(options);
    //                                     // localStorage.setItem('userid',result.data.userid);
    //                                     // localStorage.setItem('prof_id',result.data.prof_id);

    //                                       //alert(localStorage.getItem('prof_id'));
    //                                       //alert(localStorage.getItem('userid'));



    //                                   window.location.href = profileurl+ "/forms/editRegisterUserProfile"; 
                                      
    //                                   }
    //                               },
    //                               close: function () {
    //                                     var options = {
    //                                     origin: "http://www.getsporty.in"
    //                                     };
    //                                 //Storage = crossDomainStorage(options);
    //                                    // localStorage.setItem('userid',result.data.userid);
    //                                    // localStorage.setItem('prof_id',result.data.prof_id);
    //                                 window.location.href = profileurl+ "/forms/editRegisterUserProfile";

                                   
    //                               }
    //                           }
    //                       });

    //                       }
    //                       else
    //                       {
    //                         $.confirm({
    //                           title: 'Encountered an error!',
    //                           content: 'Something went Worng, this may be server issue.',
    //                           type: 'dark',
    //                           typeAnimated: true,
    //                           boxWidth: '33%',
    //                           useBootstrap: false,
    //                           animationSpeed: 1500,
    //                           animationBounce: 3,
    //                           buttons: {
    //                               tryAgain: {
    //                                   text: 'Try again',
    //                                   btnClass: 'btn-dark',
    //                                   action: function(){
    //                                     $("#imagelodar").hide();
    //                                   }
    //                               },
    //                               close: function () {
    //                                 $("#imagelodar").hide();
    //                               }
    //                           }
    //                       });

    //                       }
    //                  }
    //                   });
    //           }
    //         },
    //         cancel: function () {
    //         }
    //     }
    // });  
       }
       else if(result.data == 0)
       {
              $.confirm({
              title: 'Encountered an error!',
              content: 'Something went Worng, this may be server issue.',
              type: 'dark',
              boxWidth: '33%',
              useBootstrap: false,
              typeAnimated: true,
              animationSpeed: 1500,
              animationBounce: 3,
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
       else
       {
    $.confirm({
        title: 'Congratulations!',
        content: '<h3>Registration is complete .</h3>',
        type: 'green',
        boxWidth: '33%',
        useBootstrap: false,
        typeAnimated: true,
        animationSpeed: 1500,
        animationBounce: 3,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                  window.location.href = profileurl+ "/forms/registrationprofile/" + result.data;
                }
            },
            close: function () {
              window.location.href = profileurl+ "/forms/registrationprofile/" + result.data;
            }
        }
    });
       }
     }
  });
}
});
$('.picker__day--infocus').click(function(){
  $('#dob').removeClass('invalid');
});
</script>
</html>
