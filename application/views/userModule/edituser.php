
  <script>
$(document).ready(function(){
             

  $('#save').click(function(){
    
var data1 = {

    "userid"                  : $("#uid").val(),
    "name"                    : $("#name").val(),
    "password"                : $("#Password").val(),
    "status"                  : $("#status").val(),
    "email"                   : $("#email").val(), 
    "prof_id"                 : $("#prof_id").val(),
    "prof_name"               : $("#prof_name").val(),
    "userType"                : $("#utype").val(),
    "contact_no"              : $("#contact").val(),
    "sport"                   : $("#sport").val(),
    "gender"                  : $("#gen").val(), 
    "dob"                     : $("#dob").val(),
    "address1"                : $("#add1").val(),
    "address2"                : $("#add2").val(),    
    "address3"                : $("#state").val(),
    "location"                : $("#city").val()

    
};

console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>';
var data = JSON.stringify(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/profile'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {

     // alert(result);
      // $("#imagelodar").hide();
       if(result == '1')
         {

         $.confirm({
         title: 'Congratulations!',
         content: 'Profile is Update.',
         type: 'green',
         typeAnimated: true,
         buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                 window.location.href = url+"/forms/edituser";
                }
            },
            close: function () {
           window.location.href = url+"/forms/edituser";
            }
        }
    });
      }
      else
      { 
             $('#imagelodar').hide();
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

 
  $(function() {
    $( "#dob" ).datepicker();
   
    
    
  });

  </script>
        
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile<a id="btnbbb" href="#" class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#myModal">Change Password</a>
        
      </h1>
    </section>
         <section class="content"> 
      <div class="row">
      <div class="col-md-12">
       
         <?php  $profile = $this->register->profile($id); 
           // print_r($profile); 
            // print_r($id); 
            foreach ($profile as $value) 
              
            {?>
        <div class=" alert alert-success" id="msgdiv" style="display:none">
            <strong>Info! <span id = "msg"></span></strong> 
        </div>

            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_event" data-toggle="tab">Name </a></li>
              <li><a href="#tab_organiser" data-toggle="tab">Address</a></li>
            <!--   <li><a href="#tab_eligible" data-toggle="tab">Eligibility</a></li> -->
             </ul>   
             <form role="form" action="" class="register">  
            <div class="tab-content">
              <div class="tab-pane active" id="tab_event">
                
                <div class="box-header with-border">
                    <h4>Name And Details:</h4 >        
                </div>
                <div class="box-body">
                <div class="form-group">
                  
                  <input type="hidden" class="form-control" name="UserId"  id="uid" value="<?php echo $value['userid']; ?>">
                </div>
                     <div class="form-group">
                      <label for="name">Name</label>
                    <input type="text" class="form-control"  id="name" value="<?php echo $value['name']; ?>" >
                    </div >
                    <div class="form-group">
                    <input type="hidden" class="form-control"  id="Password" value="<?php echo $value['password']; ?>" >
                    </div >

                    
                     
                    <input type="hidden" class="form-control"  id="utype" value="<?php echo $value['userType']; ?>" disabled >
                   <input type="hidden" class="form-control"  id="status" value="<?php echo $value['status']; ?>" disabled >
                   <div class="form-group">
                    <label for="usertype">Profession</label>
                    <input type="input" class="form-control"  id="prof_name" value="<?php echo $value['prof_name']; ?>" disabled >

                    <input type="hidden" class="form-control"  id="prof_id" value="<?php echo $value['prof_id']; ?>" disabled >
                    </div>

                    
                   <!--  <div class="form-group">
                    <label for="usertype">Proffession</label>
                        <select id="proftype" class="form-control" disabled="">
                            <option><?// echo $value['prof_id'];?></option>
                            <option id="Coach">Athletes</option>
                            <option id="player">Coach</option>
                            <option id="Coach">Dietician</option>
                            <option id="player">Event Organiser</option>
                            <option id="Coach">Job Creator</option>
                            <option id="player">Player</option>
                            <option id="Coach">Parent</option>
                            <option id="player">Physio</option>
                            <option id="Coach">Refree</option>
                            <option id="player">Scouts</option>
                            <option id="Coach">Trainer</option>
                            <option id="player">Tournament Organiser</option>
                            <option id="player">Referee</option>
                        </select>
                    </div>
 -->
                    <div class="form-group">
                        <?php  $sports = $this->register->getSport();
                            
                        ?>
                      <label for="sports">Sport</label>
                        <select id="sport" class="form-control" >
                        <option ><?php echo $value['sport']; ?></option> 
                            <?php if(!empty($sports)){
                                    foreach($sports as $sport){?>
                                <option value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
                            <?php   }
                                  } 
                            ?>
                        </select>
                    </div >

                    <div class="form-group">
                      <label for="Email">Email Id</label>
                      <input type="text" class="form-control"  id="email" placeholder="Enter Email Id" value="<?php echo $value['email']; ?>" disabled>
                    </div >
                    <div class="form-group">
                      <label for="contact">Contact No</label>
                      <input type="text" class="form-control"  id="contact" placeholder="Enter Contact No" value="<?php echo $value['contact_no']; ?>">
                    </div >

                   <div class="form-group">
                    <label for="sports">Gender</label>
                        <select id="gen" class="form-control" value="<?php echo $value['gender']; ?>" >
                            <option><?php echo $value['gender']; ?></option>
                            <option id="Male">Male</option>
                            <option id="Female">Female</option>
                            <option id="Transgender">Transgender</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="link">Date of Birth</label>
                      <input type="text" class="form-control"  id="dob" value="<?php echo $value['dob']; ?>" placeholder="Date Of Birth">
                    </div >

                   
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
                      <input type="text" class="form-control"  id="add1" placeholder="Enter Address" value="<?php echo $value['address1']; ?>">
                    </div >
                    <div class="form-group">
                      <label for="address2">Address Line2</label>
                      <input type="text" class="form-control"  id="add2" value="<?php echo $value['address2']; ?>" placeholder="Enter Address">
                    </div >
                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" class="form-control"  id="city" value="<?php echo $value['location']; ?>" placeholder="Enter City">
                    </div >
                    <div class="form-group">
                      <label for="state">State</label>
                      <input type="text" class="form-control"  id="state" value="<?php echo $value['address3']; ?>" placeholder="Enter State">
                    </div >
                    
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
          <?php }?>
      </div>

</section>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="col-md-4">
    <div class="modal-content" style="width: 511px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="text-align:center;" id="myModalLabel">Password Change</h4>
      </div>
         <div class=" alert alert-success" id="msgdiv1" style="display:none">
          <strong> <span id = "msg1"></span></strong> 
        </div>
         <div class=" alert alert-danger" id="msgdiv2" style="display:none">
          <strong> <span id = "msg2"></span></strong> 
        </div>
         <div class="form-group">
        <label style="margin-left: 2%;" for="oldpassword">Old Password</label>
        <input type="password" class="form-control"  id="oldpassword">
        </div>
         <div class="form-group">
        <label style="margin-left: 2%;" for="newpassword">New Password</label>
        <input type="password" class="form-control"  id="newpassword">
        </div>
         <div class="form-group">
        <label style="margin-left: 2%;" for="confirmpassword">Confirm Password</label>
        <input type="password" class="form-control"  id="confirmpassword"> 
        </div>
        <br>
      <button class="btn btn-lg btn-primary btn-block"  name="Submit" onclick="passwordchange();">Save</button>
       
    </div>
    </div>
  </div>
</div>


<script>
function passwordchange()
{
  

var pass1= $("#newpassword").val();
var pass2= $("#confirmpassword").val();

if(pass1.length<5)
{
        $( "#msgdiv1" ).hide();
        $( "#msgdiv2" ).show();
        $( "#msg2" ).html("Password length Atleast 6 Charactor");

}
else
{
if(pass1==pass2)
{
var data=  {
   
   "userid"           :$("#uid").val(),
   "oldpassword1"     :$("#Password").val(),
   "oldpassword"      :$("#oldpassword").val(),
   "newpassword"      :$("#newpassword").val(),
   "confirmpassword"  :$("#confirmpassword").val()
};

console.log(JSON.stringify(data));
var data=JSON.stringify(data);
var url='<?php echo site_url();?>';

$.ajax({
  type     : "POST",
   url      :'<?php echo site_url('forms/passwordchange')?>',
   data     :"data="+data,
  dataType : "json",
  success :function(result){
  // alert(result.response);

   if(result.response == '1')
      {
        $("#msgdiv2" ).hide();
        $( "#msgdiv1" ).show();
        $( "#msg1" ).html("Successfully update password");
        setTimeout(function() {
           $('#msgdiv1').fadeOut('fast');
       }, 1000);
       window.location.href = url+"/forms/edituser";
      }
      else if(result.response == '2')
      {
        $("#msgdiv2" ).hide();
        $( "#msgdiv1" ).show();
        $( "#msg1" ).html("Password Not updated");

      }
       else
       {
        $("#msgdiv2" ).hide();
        $("#msgdiv1" ).show();
        $("#msg1" ).html("Old Password is Not Currect");
       }   
  }
});
}

 else{
    $("#msgdiv2" ).hide();
    $( "#msgdiv1" ).show();
    $( "#msg1" ).html('Password Not Match');
 }
}
}
</script>
