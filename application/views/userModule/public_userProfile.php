
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
                
               <?php if($value['user_image']) { ?> 
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $value['user_image'];?>" alt="User profile picture">
                 <?php } else { 
                    if($value['gender'] == 'Female') { ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php  echo base_url('img/female.jpg'); ?>" alt="User profile picture">   
                 <?php } else { ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php  echo base_url('img/user.jpg'); ?>" alt="User profile picture">        

                 <?php } }?>
                 <!--Image upload module -->
                 

                 <form id="form" action="" method="post" enctype="multipart/form-data">
                  

                    <label for="file-upload" class="custom-file-upload">
                   <i class="fa fa-pencil margin-r-5"></i>
                   </label>
                   <input id="file-upload" type="file" name="file" id="file" />


                    <!-- <label for="file">
                    <img src="<?php// echo base_url('img/image.png')?>" />
                    </label>

                   <input type="file" name="file" id="file" /> -->
              
                  
                  <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $value['userid']?>">

                <input style="margin-left: 41%;" class="btn btn-primary" id="button" type="submit" value="Upload">

                </form>
                <img src="<?php echo base_url("img/loader.gif");?>"  id="loader_img" hidden></img>

                <!--Image upload module end -->



              <h3 class="profile-username text-center"><?php echo $value['name'];?></h3>

              <p class="text-muted text-center"><?php echo $value['prof_name'];?></p>

              <input type="hidden" class="form-control" name="UserId"  id="uid" value="<?php echo $value['userid']; ?>">
              
              <ul class="list-group list-group-unbordered">

          
                
                <li class="list-group-item">
                <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
                <p><?php echo $value['email'];?></p>
                </li>

                <li class="list-group-item">
                <strong><i class="fa fa-venus-double margin-r-5"></i>Gender</strong>
                <p class="text-muted">
                <?php echo $value['gender'];?>
                </p>
                </li>

                <li class="list-group-item">
                <strong><i class="fa fa-mobile margin-r-5"></i>Contact No</strong>
                <p><?php echo $value['contact_no'];?></p>
                </li>

                 <li class="list-group-item">
                 <strong><i class="fa fa-futbol-o margin-r-5"></i>Sport</strong>
                 <p class="text-muted">
                 <?php echo $value['sport'];?>
                 </p>
                 </li>

                <!--  <li class="list-group-item">
                 <strong><i class="fa fa-calendar-check-o margin-r-5"></i>DOB</strong>
                 <p class="text-muted"><?php// echo $value['dob'];?></p>
                 </li> -->
              </ul>

               <!--  <button type="button" class="btn btn-success btn-block" id="module"><b>Save Module</b></button> -->
                    <?php  $list=array('a' => 0,
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
                                { ?> 
                <a href = "<?php echo site_url('forms/edituserProfile/'.$num); ?>" class="btn btn-success btn-block"  title="Edit Profile" ><i class="glyphicon glyphicon-edit"></i></a>
                  <?php   } ?>
             <!--  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
        
        </div>
        <!-- /.col -->
        <div class="row">
          <div class="col-md-3">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
              <p class="text-muted"><?php echo $value['address1'];?></p>
              <p class="text-muted"><?php echo $value['address2'];?></p>
               <p class="text-muted"><?php echo $value['location'];?></p>
              <p class="text-muted"><?php echo $value['address3'];?></p>
              <hr>
             <strong><i class="fa fa-file-text-o margin-r-5"></i>About Me</strong>
              <p><?php echo $value['about_me'];?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <?php }?>
          </div>

        






          <div class="col-md-5">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Activity</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Tournament</li>
                    <li><i class="fa fa-circle-o text-green"></i> JOB</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> Content</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Event</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Resources</li>
                   <!--  <li><i class="fa fa-circle-o text-gray"></i> Navigator</li> -->
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Cricket
                  <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                <li><a href="#">Football <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                </li>
                <li><a href="#">running
                  <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
              </ul>
            </div> -->
            <!-- /.footer -->
          </div>
          </div>

          <!-- <div class="row">
          <div class="col-md-4" style="margin-top: -13px;">

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
      </div> -->
    
          
      </div>
       
      </div>
      
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <div class="control-sidebar-bg"></div>
</div>


<script type="text/javascript">
  $(document).ready(function (e) {
  $("#form").on('submit',(function(e) {  
    var url = '<?php echo site_url();?>';
   $('#loader_img').show();
    e.preventDefault();
    $.ajax({
      url: "<?php echo site_url('forms/profileimage');?>",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      beforeSend : function()
      {
        $("#err").fadeOut();
      },
      success: function(data)
        {
           $('#loader_img').hide();
           window.location.href = url+"/forms/edituser";
              
        },
        error: function(e) 
        {
      
        }           
     });
  }));
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
        color: "green",
        highlight: "#00a65a",
        label: "Job"
      },
      {
        value: $('#tournament').val(),
        color: "#dd4b39",
        highlight: "#de5140",
        label: "Tournament"
      },
      {
        value: $('#resources').val(),
        color: "#5262bc",
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

<style type="text/css">
  input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>




  
  
   
  
 
