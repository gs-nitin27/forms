
<script>
$(document).ready(function(){
 
$('#module').click(function(){

var data = {

    "id"                       : $("#uid").val(),
    "event"                    : $("#EVENT").val(),
    "tournament"               : $("#TOURNAMENT").val(),
    "job"                      : $("#JOB").val(), 
    "resources"                : $("#RESOURCES").val(), 
    "content"                  : $("#CONTENT").val(),
    "performace"               : $("#PERFORMANCE").val(),
    "usermenu"                 : $("#USER_ROLE_MANAGEMENT").val()
};
console.log(JSON.stringify(data));
var data = JSON.stringify(data);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/saveadminmodule'); ?>',
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


<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        Admin Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
      <div class=" alert alert-success" id="msgdiv" style="display:none">
            <strong>Info! <span id = "msg"></span></strong> 
        </div>
        <div class="col-md-3">

       
    
<?php  
      $profile = $this->register->admin_user_module($id); 
     foreach ($profile as $value) 
      {
?>
     
          <div class="box box-primary">
            <div class="box-body box-profile">
             <?php 
                    if($value['user_image']) {
             ?>
           <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()."uploads/profile/".$value['user_image'];?>" alt="User profile picture">
             <?php } else { if($value['gender'] == 'Female') { ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('img/female.jpg');?>" alt="User profile picture">
           <?php } else { ?>
           <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('img/user.jpg');?>" alt="User profile picture">
            <?php } } ?>

              <h3 class="profile-username text-center"><?php echo $value['name'];?></h3>
              <p class="text-muted text-center"><?php echo "Admin";?></p>
              <input type="hidden" class="form-control" name="UserId"  id="uid" value="<?php echo $value['adminid']; ?>">
              <ul class="list-group list-group-unbordered">
              <?php 
               $module_list = $value['access_module'];
               $module_no = explode(',', $module_list); 
              {     
                 $usertype=$value['userType']; 
                  if($usertype==101 || $usertype==102 )
                   {
                    ?>
              <li class="list-group-item">
              <label for="USER_ROLE_MANAGEMENT" class="btn btn-danger">USER ROLE MANAGEMENT<input type="checkbox" id="USER_ROLE_MANAGEMENT" class="badgebox"><span class="badge">&check;</span></label>
              </li>
               <li class="list-group-item">

                 <label for="PERFORMANCE" class="btn btn-warning">PERFORMANCE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="PERFORMANCE" class="badgebox"><span class="badge">&check;</span></label>

                </li>
           <?php } ?>
              <li class="list-group-item">
                 <label for="JOB" class="btn btn-info">job &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="JOB" class="badgebox"><span class="badge" >&check;</span></label>
                </li>
                <li class="list-group-item">
                <label for="EVENT" class="btn btn-info">Event &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="EVENT" class="badgebox"><span class="badge">&check;</span></label>
                 <!--  <b>Followers</b> -->  <!-- <a class="pull-right">1,322</a> -->
                </li>
                <li class="list-group-item">

                 <label for="CONTENT" class="btn btn-warning">Content &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="CONTENT" class="badgebox"><span class="badge">&check;</span></label>

                </li>
                <li class="list-group-item">
                 <label for="RESOURCES" class="btn btn-primary">Resources &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="RESOURCES" class="badgebox"><span class="badge">&check;</span></label>
                 <!--  <b>Friends</b> <a class="pull-right">13,287</a> -->
                </li>
                <li class="list-group-item">
                <label for="TOURNAMENT" class="btn btn-primary">Tournament &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="TOURNAMENT" class="badgebox"  ><span class="badge">&check;</span></label>
                 <!--  <b>Following</b> <a class="pull-right">543</a> -->
                </li>
              <!-- </ul> -->
               <li class="list-group-item">
              <button type="button" class="btn btn-success btn-block" id="module"><b>Save Module</b></button></li>
              <li class="list-group-item">
              <?php $list=array('a' => 0,
                                'b' => 1,
                                'c' => 2,
                                'd' => 3,
                                'e' => 4,
                                'f' => 5,
                                'g' => 6,
                                'h' => 7,
                                'i' => 8,
                                'j' => 9);
                                 $num=$value['adminid']; //your value
                                 $temp=''; 
                                 $arr_num=str_split ($num);
                                foreach($arr_num as $data)
                                {
                                $temp.=array_search($data,$list);
                                }
                                $num=$temp;
                                {  ?>
                    <input type="hidden" class="form-control" name="string_userid"  id="string_userid" value="<?php echo $num; ?>">
                    <?php }?>
                  <?php $email = $value['email'];
                  { ?>
              <button class="btn btn-success btn-block" onclick="myfunction('<?php echo $email;?>');"><?php echo "Password Reset";?></button>
               <?php } ?>
                </li>
                </ul>
            </div>
          </div>
          <?php } ?>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
            <!--   <li><a href="#statistics" data-toggle="tab">Statistics</a></li> -->
              <!-- <li><a href="#timeline" data-toggle="tab">Timeline</a></li> -->
             <!--  <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="activity">
            <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <div class="box-body">
              <strong><i class="fa fa-venus-double margin-r-5"></i>Gender</strong>
              <p class="text-muted">
                <?php echo $value['gender'];?>
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
              <p class="text-muted"><?php echo $value['address1'];?></p>
              <p class="text-muted"><?php echo $value['address2'];?></p>
               <p class="text-muted"><?php echo $value['location'];?></p>
              <p class="text-muted"><?php echo $value['address3'];?></p>
              <hr>
              <strong><i class="fa fa-mobile margin-r-5"></i>Contact No</strong>
               <p><?php echo $value['contact_no'];?></p>
              <hr>
              <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
              <button style="margin-left: 71%;" id="ebutton"><i class="fa fa-pencil margin-r-5"></i></button>
              <p><?php echo $value['email'];?></p>
              <script>
              $(document).ready(function(){
                  // alert("sdg");
                 $("#activity").addClass('active');
                $("#newemail").hide();
                $("#ebutton").click(function(){
                $("#newemail").toggle();
                });
              });
               </script>
               <div id="newemail">
                <div class="form-group">
                <input type="text" class="form-control" id="updateemail" placeholder="Enter Email">
                 <input type="hidden" class="form-control" name="UserId"  id="euid" value="<?php echo $value['adminid']; ?>">
                </div><div class="form-group">
                <input type="button" class="btn btn btn-primary" id="emailsave" onclick="" value="Update" name="Update">
                </div >
              </div>
            </div>
          </div>
          <?php }?>
          </div>
            </div> 
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>
            </div>
  <div class="control-sidebar-bg"></div>
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
 $('#PERFORMANCE').prop('checked',true);
 }
 if(mod[6]==7 ){
 $('#USER_ROLE_MANAGEMENT').prop('checked',true);
 }
}

    $('#EVENT').val(mod[0]);
    $('#TOURNAMENT').val(mod[1]);
    $('#JOB').val(mod[2]);
    $('#RESOURCES').val(mod[3]);
    $('#CONTENT').val(mod[4]);
    $('#PERFORMANCE').val(mod[5]);
    $('#USER_ROLE_MANAGEMENT').val(mod[6]);

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
     $('#PERFORMANCE').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#PERFORMANCE").val(6);
               val=6;
           // alert(val);
        }
        else {
          var val=$("#PERFORMANCE").val(0);
               val=0;
            
        }
    });
     
        $('#USER_ROLE_MANAGEMENT').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#USER_ROLE_MANAGEMENT").val(7);
               val=7;
                   }
        else {
          var val=$("#USER_ROLE_MANAGEMENT").val(0);
               val=0;
            
        }
    });
</script>




<script type="text/javascript">
function myfunction(email)
{ 
    //alert(email); 

    var id = $("#string_userid").val();
   // alert(email); 
    var data1 = {
    "email"                  :  email

};
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = JSON.stringify(data1);
    $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/adminPasswordreset'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
      alert("Mail has been sent");
   // window.location.href = url+"/forms/userprofile/" + id + "?module";
    }
});    
}
</script>


<script type="text/javascript">
$("#emailsave").click(function(){

var id = $("#string_userid").val();
if($("#updateemail").val())
{
var data23 = {

   "userid"  : $("#euid").val(),
   "email"   : $("#updateemail").val()
};


console.log(JSON.stringify(data23));
var url = '<?php echo site_url();?>'
var data = JSON.stringify(data23);
    $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/updateadminemail'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
           alert(result);
    if(result == "1"){
        alert("Email has been Updated");
       window.location.href = url+"/forms/admin_user_module/" + id + "?module";
    }else {
      alert("Email is already registered");
    }
  }
});   
}
else
{

  alert("please enter the email");
} 

});
</script>





  
  
   
  
 
