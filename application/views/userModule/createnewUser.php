
  <script>
$(document).ready(function(){
             

$('#save').click(function(){

   $("#imagelodar").show();  
//alert($("#proftype").val());

var prof_data = $("#proftype").val();

 var mod = prof_data.split(',');
 //alert(mod[1]);

 
var data1 = {

    "userid"                  : 0,
    "name"                    : $("#name").val(),
    "status"                  : 0,
    "password"                : $("#Password").val(),
    "email"                   : $("#email").val(), 
    "prof_id"                 : mod[1],
    "prof_name"               : mod[0], 
    "userType"                : $("#utype").val(),
    "contact_no"              : $("#contact").val(),
    "sport"                   : $("#sport").val(),
    "gender"                  : $("#gen").val(), 
    "dob"                     : $("#dob").val(),
    "address1"                : $("#add1").val(),
    "address2"                : $("#add2").val(),    
    "address3"                : $("#state").val(),
    "access_module"           : '1,2,3,4,5,6',
    "location"                : $("#city").val()

    
};
 
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>';
var data = JSON.stringify(data1);

  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/admin_registration'); ?>',
    data: "data="+data,
    dataType: "JSON",
    success: function(result) 
    {
     // alert(result.response);
       
      if(result.response== 1)
      {
        $("#imagelodar").hide();  

         $.confirm({
         title: 'Exits',
         content: 'User already registered!',
         type: 'red',
         typeAnimated: true,
         buttons: {
            tryAgain: {
                text: 'OK',
                btnClass: 'btn-red',
                action: function(){
               // window.location.href = url+"/forms/usermodule";
                }
            },
            close: function () {
          // window.location.href = url+"/forms/usermodule";
            }
        }
    });
        // $( "#msgdiv" ).show();
        //  $( "#msg" ).html('');
        
      }
      else if(result.response == 2)
      {
        
        $.confirm({
         title: 'Congratulations!',
         content: 'User is created.',
         type: 'green',
         typeAnimated: true,
         buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                window.location.href = url+"/forms/usermodule?module";
                }
            },
            close: function () {
           window.location.href = url+"/forms/usermodule?module";
            }
        }
    });
      
      }
      else 
      {
          $("#imagelodar").hide();   
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
                      }
                  },
                  close: function () {
                  }
              }
          });
        
    }
      }


});

    
});});

 
$(function(){
    $("#dob").datepicker(); 
  });
 
  </script>
        
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        
      </h1>
     
    </section>
    <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
         <section class="content"> 
      <div class="row">
      <div class="col-md-12">
       
         
        <div class=" alert alert-success" id="msgdiv" style="display:none">
            <strong><span id = "msg"></span></strong> 
        </div>

            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_event" data-toggle="tab">Name </a></li>
              <li><a href="#tab_organiser" data-toggle="tab">Address</a></li>
             </ul>   
             <form role="form" action="" class="register">  
            <div class="tab-content">
              <div class="tab-pane active" id="tab_event">
                <div class="box-header with-border">
                    <h4>Name And Details:</h4 >        
                </div>
                <div class="box-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="UserId"  id="uid" >
                </div>
                     <div class="form-group">
                      <label for="name">Name</label>
                    <input type="text" class="form-control"  id="name" placeholder="Enter Name" >
                    </div >
                   <div class="form-group">
                    <input type="hidden" class="form-control"  id="Password" placeholder="Enter Password">
                    </div>  
                    <input type="hidden" class="form-control"  id="utype" value="102">
                      <div class="form-group">
                        <?php  $profession = $this->register->getproffession(); 
                             // print_r($proffession);
                        ?>
                      <label for="Proffession">Profession</label>
                        <select id="proftype" class="form-control" >
                        <option >-select-</option> 
                            <?php if(!empty($profession)){
                                    foreach($profession as $prof){?>
                                <option value ="<?php echo $prof['profession'];?>,<?php echo $prof['id'];?>"><?php echo $prof['profession'];?> </option>
                            <?php   }
                                  } 
                            ?>
                        </select>
                    </div >                
                  
                    <div class="form-group">
                        <?php  $sports = $this->register->getSport(); 
                        ?>
                      <label for="sports">Sport</label>
                        <select id="sport" class="form-control" >
                        <option >-select-</option> 
                            <?php if(!empty($sports)){
                                    foreach($sports as $sport){?>
                                <option value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
                            <?php   }
                                  } 
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="Email">Email Id</label>
                      <input type="text" class="form-control"  id="email" placeholder="Enter Email Id"  >
                    </div>
                    <div class="form-group">
                      <label for="contact">Contact No</label>
                      <input type="text" class="form-control"  id="contact" placeholder="Enter Contact No" >
                    </div>
                   <div class="form-group">
                    <label for="sports">Gender</label>
                        <select id="gen" class="form-control"  >
                            <option>-select-</option>
                            <option id="Male">Male</option>
                            <option id="Female">Female</option>
                            <option id="Transgender">Transgender</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="link">Date of Birth</label>
                    <input type="text" class="form-control"  id="dob"  placeholder="Date Of Birth">
                    </div>
                    </div>
                    </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_organiser">
              <div class="box-header with-border">
                <h4>Address Details:</h4 >    
            </div>
                <div class="box-body">
                    <div class="form-group">
                      <label for="address1">Address Line1</label>
                      <input type="text" class="form-control"  id="add1" placeholder="Enter Address">
                    </div >
                    <div class="form-group">
                      <label for="address2">Address Line2</label>
                      <input type="text" class="form-control"  id="add2" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" class="form-control"  id="city"  placeholder="Enter City">
                    </div>
                    <div class="form-group">
                      <label for="state">State</label>
                      <input type="text" class="form-control"  id="state"  placeholder="Enter State">
                    </div>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            <div class="box-footer">
            <input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Save" name="Save">
            </div>
             </form>
          </div>
      </div>
</section>
</div>