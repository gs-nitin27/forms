
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
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/dist/img/user4-128x128.jpg');?>" alt="User profile picture">
              <h3 class="profile-username text-center"><?php echo $value['name'];?></h3>

              <p class="text-muted text-center"><?php echo $value['prof_id'];?></p>

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
              </ul>
                <button type="button" class="btn btn-success btn-block" id="module"><b>Save Module</b></button>
             <!--  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <?php } ?>
          <!-- /.box -->

          <!-- About Me Box -->
          
          <!-- /.box -->
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
              <div class="active tab-pane" id="activity">

            <div class="row">
           
          <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-venus-double margin-r-5"></i>Gender</strong>
                
              <p class="text-muted">
                <?php echo $value['Gender'];?>
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

              <p><?php echo $value['email'];?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <?php }?>
          </div>
         <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Proffession</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-futbol-o margin-r-5"></i>Sport</strong>
                
              <p class="text-muted">
                <?php echo $value['sport'];?>
              </p>

              <hr>
  
              <strong><i class="fa fa-calendar-check-o margin-r-5"></i>DOB</strong>

              <p class="text-muted"><?php echo $value['dob'];?></p>

              <!-- <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i>Gender</strong>

              <p class="text-muted"><?//php echo $value['Gender'];?></p> -->

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
            <!-- /.box-body -->
          </div>
          </div>

          
      </div>
                <!-- Post -->
               <!--  <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?//php echo base_url('assets/dist/img/user1-128x128.jpg');?>" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                 <!-  <!- /.user-block -->
                  <!-- <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p> -->
                 <!--  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul> -->
<!-- 
                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div> -->
                <!-- /.post -->

                <!-- Post -->
               <!--  <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?//php echo base_url('assets/dist/img/user7-128x128.jpg');?>" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div> -->
                  <!-- /.user-block -->
                <!--   <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Response">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>
                </div> -->
                <!-- /.post -->

                <!-- Post -->
               <!--  <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?//php echo base_url('assets/dist/img/user6-128x128.jpg');?>" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div> -->
                  <!-- /.user-block -->
                  <!-- <div class="row margin-bottom">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="<?//php echo base_url('assets/dist/img/photo1.png');?>" alt="Photo">
                    </div> -->
                    <!-- /.col -->
                    <!-- <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="<?//php echo base_url('assets/dist/img/photo2.png');?>" alt="Photo">
                          <br>
                          <img class="img-responsive" src="<?//php echo base_url('assets/dist/img/photo3.jpg');?>" alt="Photo">
                        </div> -->
                        <!-- /.col -->
                        <!-- <div class="col-sm-6">
                          <img class="img-responsive" src="<?//php echo base_url('assets/dist/img/photo4.jpg');?>" alt="Photo">
                          <br>
                          <img class="img-responsive" src="<?//php echo base_url('assets/dist/img/photo1.png');?>" alt="Photo">
                        </div> -->
                        <!-- /.col -->
                      <!-- </div> -->
                      <!-- /.row -->
                   <!--  </div> -->
                    <!-- /.col -->
                <!--   </div> -->
                  <!-- /.row -->

                 <!--  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div> -->
                <!-- /.post -->
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
      </div>
      </div>


              <!-- /.tab-pane -->
              <!-- <div class="tab-pane" id="timeline"> -->
                <!-- The timeline -->
               <!--  <ul class="timeline timeline-inverse"> -->
                  <!-- timeline time label -->
                 <!--  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li> -->
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <!-- <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <!-- <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                  <!-- timeline item -->
                 <!--  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                 <!--  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li> -->
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <!-- <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                 <!--  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div> -->
              <!-- /.tab-pane -->

         <div class="" id="settings"> 
         <!-- <div class="row">
        <div class="col-md-6">
          <!- DONUT CHART -->
         <!-- <div class="chart">
             <canvas id="areaChart" style="height:250px"></canvas>
          </div>
          <div  class="box box-danger" style="margin-top:-59%;">
      
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
            </div> -->
            <!-- /.box-body -->
         <!--  </div> -->
          <!-- /.box -->

       <!--  </div> -->
       
   <!--    </div>  -->
      
               <!--  <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form> -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
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






  
  
   
  
 
