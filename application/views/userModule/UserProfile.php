
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


<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
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
      $profile = $this->register->profile($id); 
     foreach ($profile as $value) 
      {
?>
            <!-- Profile Image -->
      <?php
              $event      = $this->register->event($value['userid']);
              $tournament = $this->register->tournament($value['userid']);
              $job        = $this->register->job($value['userid']);
              $resources  = $this->register->resources($value['userid']);
              $Content    = $this->register->content($value['userid']); 
             
              {
      ?>
       <input type="hidden" class="form-control" name="event"  id="event" value="<?php echo $event; ?>">
       <input type="hidden" class="form-control" name="tournament"  id="tournament" value="<?php echo $tournament; ?>">
       <input type="hidden" class="form-control" name="job"  id="job" value="<?php echo $job; ?>">
       <input type="hidden" class="form-control" name="resources"  id="resources" value="<?php echo $resources; ?>">
       <input type="hidden" class="form-control" name="Content"  id="Content" value="<?php echo $Content; ?>">
      <?php }?>
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
              <p class="text-muted text-center"><?php echo $value['prof_name'];?></p>
              <input type="hidden" class="form-control" name="UserId"  id="uid" value="<?php echo $value['userid']; ?>">
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
                                 $num=$value['userid']; //your value
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
              <li><a href="#statistics" data-toggle="tab">Statistics</a></li>
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
                 <input type="hidden" class="form-control" name="UserId"  id="euid" value="<?php echo $value['userid']; ?>">
                </div><div class="form-group">
                <input type="button" class="btn btn btn-primary" id="emailsave" onclick="" value="Update" name="Update">
                </div >
              </div>
            </div>
          </div>
          <?php }?>
          </div>
            <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">About Proffession</h3>
            </div>
            <div class="box-body">
            <strong><i class="fa fa-futbol-o margin-r-5"></i>Sport</strong>
            <p class="text-muted">
                <?php echo $value['sport'];?>
            </p>
            <hr>
            <strong><i class="fa fa-calendar-check-o margin-r-5"></i>DOB</strong>
            <p class="text-muted"><?php echo $value['dob'];?></p>
            <hr>
            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
            <p>
            <span class="label label-danger"><?php echo $value['prof_language'];?></span>
            <span class="label label-success"><?php echo $value['other_skill_name'];?></span>
            <span class="label label-info"><?php echo $value['other_skill_detail'];?></span>
               <!--  <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span> -->
            </p>
            <hr>
            <strong><i class="fa fa-file-text-o margin-r-5"></i>About Me</strong>
            <p><?php echo $value['about_me'];?></p>
            </div>
            </div>
            </div>
            </div> 
            </div>
          <div class="active tab-pane" id="statistics">
          <div class="row">
          <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="chart">
             <canvas id="areaChart" style="height:250px"></canvas>
          </div>
          <div  class="box box-primary" style="margin-top:-67%;">
            <div class="box-header with-border">
              <h3 class="box-title">Donut Chart</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            </div>
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


<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: $('#event').val(),
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Event"
      },
      {
        value: $('#job').val(),
        color: "#00a65a",
        highlight: "#00a65a",
        label: "Job"
      },
      {
        value: $('#tournament').val(),
        color: "#5262bc",
        highlight: "#5262bc",
        label: "Tournament"
      },
      {
        value: $('#resources').val(),
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "Resources"
      },
      {
        value: $('#Content').val(),
        color: "#e08e0b",
        highlight: "#e08e0b",
        label: "Content"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
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
    url: '<?php echo site_url('forms/Passwordreset'); ?>',
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
    url: '<?php echo site_url('forms/updateemail'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {

    if(result == 1){
        alert("Email has been Updated");
       window.location.href = url+"/forms/userprofile/" + id + "?module";
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





  
  
   
  
 
