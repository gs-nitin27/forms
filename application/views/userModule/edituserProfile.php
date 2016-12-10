

<script>
//document.domain = "getsporty.in";
$(document).ready(function(){
 

$('#module').click(function(){

var data = {

    "id"                       : $("#uid").val(),
    "event"                    : $("#EVENT").val(),
    "tournament"               : $("#TOURNAMENT").val(),
    "job"                      : $("#JOB").val(), 
    "resources"                : $("#RESOURCES").val(), 
    "content"                  : $("#CONTENT").val(),
    "usermenu"                 : $("#USER_ROLE_MANAGEMENT").val()


};

console.log(JSON.stringify(data));
var data = JSON.stringify(data);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/saveuserModule'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
    $( "#msgdiv" ).show();
   $( "#msg" ).html(result);
    setTimeout(function() {
     $('#msgdiv').fadeOut('fast');
   }, 2000);
    }

});   
});});
</script>  


<script>
$(document).ready(function(){
             
  $('#save').click(function(){
    
var data1 = {

    "userid"                  : $("#uid").val(),
    "name"                    : $("#name").val(),
     "password"               : $("#Password").val(),
    "email"                   : $("#email").val(), 
    "prof_id"                 : $("#proftype").val(),
    "userType"                : $("#utype").val(),
    "contact_no"              : $("#contact").val(),
    "sport"                   : $("#sport").val(),
    "Gender"                  : $("#gen").val(), 
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
        $( "#msgdiv" ).show();
        $( "#msg" ).html(result);
        setTimeout(function() {
            $('#msgdiv').fadeOut('fast');
        }, 2000);
      window.location.href = url+"/forms/usermodule";
    }
});  
});});

  $(function() {
    $( "#dob" ).datepicker();
  });

  </script>
        
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="text-align: center;">
      <h1><b>
        Profile
        </b>
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
      <div class="col-md-12">

   
   <!-- json data in button for module  start -->

 <!-- <form >
<?php

$file// =base_url('/assets/menu.json');
//$data = file_get_contents($file);
//$array=json_decode($data);
?>
  <div class="container">
      <div class="row text-center" >
     <?php 
          //  foreach($array as $key => $mod){ 
          //      if(isset($mod->child)){
              ?>
            <label for="<?php// echo $mod->name;?>" class="btn btn-primary"><?php //echo $mod->name;?><input type="checkbox" name="<?php //echo $mod->name;?>" id="<?php //echo $key;?>" class="badgebox" value="0" ><span class="badge">&check;</span></label>&nbsp;&nbsp;&nbsp;
 //<?php   // }}?>


  </div>
 
  <button type="button" class="btn btn-success" id="module" style="margin-top:-6%;margin-left:88%"><b>Save Module</b></button>
</div>
  </form> -->

<!-- json data in button for module  start -->


<?php  $profile = $this->register->profile($id); 
            foreach ($profile as $value) 
              
              $module_list = $value['access_module'];
              $module_no = explode(',', $module_list); 
              {     
                 $usertype=$value['userType']; 
                  if($usertype==101 || $usertype==102 )
                   {
                    ?>
<div class="row text-center" style="margin-left: ;margin-top:">

<label for="USER_ROLE_MANAGEMENT" class="btn btn-danger">USER ROLE MANAGEMENT<input type="checkbox" id="USER_ROLE_MANAGEMENT" class="badgebox"><span class="badge">&check;</span></label>

</div>
<?php } ?>
<br>
       <div class="row text-center">

        <label for="EVENT" class="btn btn-info">Event  <input type="checkbox" id="EVENT" class="badgebox"><span class="badge">&check;</span></label>

        <label for="TOURNAMENT" class="btn btn-primary">Tournament  <input type="checkbox" id="TOURNAMENT" class="badgebox"  ><span class="badge">&check;</span></label>

        <label for="JOB" class="btn btn-info">job <input type="checkbox" id="JOB" class="badgebox"><span class="badge" >&check;</span></label>
        
        <label for="RESOURCES" class="btn btn-primary">Resources <input type="checkbox" id="RESOURCES" class="badgebox"><span class="badge">&check;</span></label>
       
        <label for="CONTENT" class="btn btn-warning">Content <input type="checkbox" id="CONTENT" class="badgebox"><span class="badge">&check;</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
  <button type="button" class="btn btn-success" id="module" style="margin-top:;margin-left:">Save Module</button>
  </div>
  </div> 
</div>  
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
                    <input type="text" class="form-control"  id="name" value="<?php echo $value['name']; ?>" disabled >
                    </div >

                   <div class="form-group">
                      <label for="name">Usertype</label>
                    <input type="text" class="form-control"  id="utype" value="<?php echo $value['userType']; ?>" >
                    </div >

                 <div class="form-group">
                      <label for="Password">password</label>
                    <input type="text" class="form-control"  id="Password" value="<?php echo $value['password']; ?>" >
                    </div >

                    <div class="form-group">
                    <label for="usertype">Proffession</label>
                        <select id="proftype" class="form-control">
                            <option><? echo $value['prof_id'];?></option>
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
                      <input type="text" class="form-control"  id="contact" placeholder="Enter Contact No" value="<?php echo $value['contact_no']; ?>" disabled>
                    </div >

                   <div class="form-group">
                    <label for="sports">Gender</label>
                        <select id="gen" class="form-control" value="<?php echo $value['Gender']; ?>" disabled>
                            <option><?php echo $value['Gender']; ?></option>
                            <option id="Male">Male</option>
                            <option id="Female">Female</option>
                            <option id="Transgender">Transgender</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="link">Date of Birth</label>
                      <input type="text" class="form-control"  id="dob" value="<?php echo $value['dob']; ?>" placeholder="Date Of Birth" disabled>
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
                      <input type="text" class="form-control"  id="add1" placeholder="Enter Address" value="<?php echo $value['address1']; ?>" disabled>
                    </div >
                    <div class="form-group">
                      <label for="address2">Address Line2</label>
                      <input type="text" class="form-control"  id="add2" value="<?php echo $value['address2']; ?>" placeholder="Enter Address" disabled>
                    </div >
                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" class="form-control"  id="city" value="<?php echo $value['location']; ?>" placeholder="Enter City" disabled>
                    </div >
                    <div class="form-group">
                      <label for="state">State</label>
                      <input type="text" class="form-control"  id="state" value="<?php echo $value['address3']; ?>" placeholder="Enter State" disabled>
                    </div >                    
                </div>
              </div>            
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            <div class="box-footer">
            <input type="button" class="btn btn-lg btn-primary" id="save" onclick="#" value="Save" name="Save">
            </div>
             </form>            
          </div>
          <?php }?>
      </div>
</section>
</div>

<script type="text/javascript">
$(document).ready(function(){

var module = '<?php echo $value['access_module']; ?>';
var mod = module.split(',');
window.onload = loadData();
function loadData(){

if(mod[0]==1 ){
 $('#EVENT').prop('checked',true);
 }
if(mod[1] ==2){
 $('#TOURNAMENT').prop('checked',true);
 }
 if(mod[2] ==3){
 $('#JOB').prop('checked',true);
 }
 if(mod[3] ==4){
 $('#RESOURCES').prop('checked',true);
 }
 if(mod[4] ==5){
 $('#CONTENT').prop('checked',true);
 }
 if(mod[5]==6 ){
 $('#USER_ROLE_MANAGEMENT').prop('checked',true);
 }
}

    $('#EVENT').val(mod[0]);
    $('#TOURNAMENT').val(mod[1]);
    $('#JOB').val(mod[2]);
    $('#RESOURCES').val(mod[3]);
    $('#CONTENT').val(mod[4]);
    $('#USER_ROLE_MANAGEMENT').val(mod[5]);

 });


$('#EVENT').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#EVENT").val(1);
               val=1;
          // alert(val);
        }
        else {
          var val=$("#EVENT").val(0);
               val=0;  
        }
    });

     $('#TOURNAMENT').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#TOURNAMENT").val(2);
               val=2;
           // alert(val);
        }
        else {
          var val=$("#TOURNAMENT").val(0);
               val=0;
            
        }
    });

      $('#JOB').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#JOB").val(3);
               val=3;
       //   alert(val);
        }
        else {
          var val=$("#JOB").val(0);
               val=0;
            
        }
    });
       $('#RESOURCES').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#RESOURCES").val(4);
               val=4;
        //  alert(val);
        }
        else {
          var val=$("#RESOURCES").val(0);
               val=0;
           //  alert(val);
        }
    });

        $('#CONTENT').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#CONTENT").val(5);
               val=5;
          //  alert(val);
        }
        else {
          var val=$("#CONTENT").val(0);
               val=0;
           
        }
    });

        $('#USER_ROLE_MANAGEMENT').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#USER_ROLE_MANAGEMENT").val(6);
               val=6;
                   }
        else {
          var val=$("#USER_ROLE_MANAGEMENT").val(0);
               val=0;
            
        }
    });
</script>
