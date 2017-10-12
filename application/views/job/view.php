
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <?php $job = $this->register->getJobInfo($id); 
				if(!empty($job)){
					
					$job = $job[0];
				}


				$list=array('a' => 0,
                                'b' => 1,
                                'c' => 2,
                                'd' => 3,
                                'e' => 4,
                                'f' => 5,
                                'g' => 6,
                                'h' => 7,
                                'i' => 8,
                                'j' => 9);
                                 $num=$job['id']; //your value
                                 $temp='';
                                 $arr_num=str_split ($num);
                                foreach($arr_num as $data)
                                {
                                $temp.=array_search($data,$list);
                                }
                                $num=$temp;
                                { ?>
    <section class="content-header">
    <h1>
       View Job<!-- <a id="btnbbb" href="#" class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#myModal">Mobile View</a> -->
     <a href = "<?php echo site_url('forms/editjob/'.$num.'?job'); ?>" class="glyphicon glyphicon-edit fa-x"  name="Edit"  title="Edit"></a>
     </h1>	
     </section>
     <?php } ?>
      <section class="content"> 
        <div class="row">
		<div class="col-md-7">
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_event" class="tab" data-toggle="tab" id="JobDetails">Job Details </a></li>
              <li><a href="#tab_organiser" class="tab" data-toggle="tab" id="Organisation">Organisation</a></li>
              <li><a href="#tab_eligible" class="tab" data-toggle="tab" id="Requirements">Requirements</a></li>
             </ul> 	 
                <form role="form" action="" class="register">  
                <div class="tab-content">
                <div class="tab-pane active" id="tab_event">
			    <div class="box-header with-border">
                <h4>Job Details:</h4 > 	
				</div>
                <div class="box-body">
				<div class="timeline-item">
				<h5 class="timeline-header no-border"><b>Job Title: </b> &nbsp;<?php echo ucfirst($job['title']);?></h5>
				</div>
				<div class="timeline-item">
				<h5 class="timeline-header"><b href="#">Job Description: </b></h5>
				<div class="timeline-body">
				<?php echo htmlspecialchars_decode($job['description']);?>
				</div> 
				</div>
				<div class="timeline-item">
				<h5 class="timeline-header no-border"><b>Job Type: </b> &nbsp;<?php echo $job['type'];?></h5>
				</div>
				<div class="timeline-item">
				<h5 class="timeline-header no-border"><b>Sports: </b> &nbsp;<?php echo $job['sport'];?></h5>
				</div>
				<div class="timeline-item">
				<h5 class="timeline-header no-border"><b>Address Line1: </b> &nbsp;<?php echo $job['address1'];?></h5>
				</div>
				<div class="timeline-item">
				<h5 class="timeline-header no-border"><b>Address Line2: </b> &nbsp;<?php echo $job['address2'];?></h5>
				</div>
				<div class="timeline-item">
				<h5 class="timeline-header no-border"><b>City: </b> &nbsp;<?php echo $job['city'];?></h5>
				</div>
				
				<div class="timeline-item">
				<h5 class="timeline-header no-border"><b>Pin: </b> &nbsp;<?php echo $job['pin'];?></h5>
				</div>
				<!-- STATE IS ID BASED -->	
                </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_organiser">
			    <div class="box-header with-border">
                <h4>Organisation Details:</h4> 	
			    </div>
                <div class="box-body">
				<div class="timeline-item">
				<h5 class="timeline-header no-border"><b>Organisation Name: </b> &nbsp;<?php echo $job['organisation_name'];?></h5>
				</div>
				<div class="timeline-item">
				<h5 class="timeline-header"><b href="#">About Organisation: </b></h5>
				<div class="timeline-body">
				<?php echo $job['about'];?>
					</div>
				    </div>
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>Address Line1: </b> &nbsp;<?php echo $job['org_address1'];?></h5>
					</div>
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>Address Line2: </b> &nbsp;<?php echo $job['org_address2'];?></h5>
					</div>
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>City: </b> &nbsp;<?php echo $job['org_city'];?></h5>
					</div>
					
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>Pin: </b> &nbsp;<?php echo $job['org_pin'];?></h5>
					</div>
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>Email: </b> &nbsp;<?php echo $job['email'];?></h5>
					</div>
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>Contact No.: </b> &nbsp;<?php echo $job['contact'];?></h5>
					</div>
				</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_eligible">
			  <div class="box-header with-border">
                <h4>Requirements:</h4> 	
			  </div>
              <div class="box-body">
			  <div class="timeline-item">
			  <h5 class="timeline-header no-border"><b>Work Experience: </b> &nbsp;<?php echo $job['work_experience'];?></h5>
			  </div>
			  <div class="timeline-item">
			  <h5 class="timeline-header no-border"><b>Qualifications: </b> &nbsp;<?php echo $job['qualification'];?></h5>
			  </div>

			  <div class="timeline-item">
			  <h5 class="timeline-header no-border"><b>Desired Skills: </b> &nbsp;<?php echo $job['desired_skills'];?></h5>
			  </div>


			  <div class="timeline-item">
			  <h5 class="timeline-header no-border"><b>Key Requirement: </b> &nbsp;<?php echo $job['key_requirement'];?></h5>
			  </div>



			  <div class="timeline-item">
			  <h5 class="timeline-header no-border"><b>Gender: </b> &nbsp;<?php echo $job['gender'];?></h5>
			  </div>	
			  </div>
              </div>
              <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
              </div>
	          </div>
	       <div class="col-md-5">
           <div id="corner2">
           <!--   <div id="corner1"> -->
		   <div id="corner">

          <?php 
          	//print_r($job);

          if($job['image']) { ?>
		   <img style="display:block; border:2px"; width="244px" height="150px" src = "<?php  echo base_url()."uploads/job/".$job['image']; ?>">
            <?php } else { ?>
		   <img style="display:block; border:2px"; width="244px" height="150px" src = "<?php  echo base_url('img/no-image.jpg');?>">
          <?php } ?>

           <div class="nav-tabs-custom">
           <div class="tab-content">
           <div class="tab-pane active" id="tab_event1">
		   <div class="box-header with-border" style="text-align: center;background-color:#6cac29; height:41px;">
           <h5 style="color: #ffffff">Job Details:</h5> 	
		   </div>
           <div class="box-body">
		   <div class="timeline-item">
		   <h5 class="timeline-header no-border"><b>Job Title: </b> &nbsp;<?php echo ucfirst($job['title']);?></h5>
		   </div>
		   <div class="timeline-item">
		   <h5 class="timeline-header"><b href="#">Job Description: </b></h5>
		   <div class="timeline-body">
		   <?php  echo substr($job['description'],0,10);?>
		   </div>  
		   </div>
		   <div class="timeline-item">
		   <h5 class="timeline-header no-border"><b>Job Type: </b> &nbsp;<?php echo $job['type'];?></h5>
		   </div>
		   <div class="timeline-item">
		   <h5 class="timeline-header no-border"><b>Sports: </b> &nbsp;<?php echo $job['sport'];?></h5>
		   </div>
		   <div class="timeline-item">
		   <h5 class="timeline-header no-border"><b>Address Line1: </b> &nbsp;<?php echo $job['address1'];?></h5>
		   </div>
		   <div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Address Line2: </b> &nbsp;<?php echo $job['address2'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>City: </b> &nbsp;<?php echo $job['city'];?></h5>
					</div>
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Pin: </b> &nbsp;<?php echo $job['pin'];?></h5>
					</div>
					<!-- STATE IS ID BASED -->
              </div>
              </div>
              <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_organiser1">
			    <div class="box-header with-border" style="text-align: center;background-color:#6cac29; height:41px;">
                <h5 style="color: #ffffff;">Organisation Details:</h5> 	
			    </div>
                <div class="box-body">
				<div class="timeline-item">
				<h5 class="timeline-header no-border"><b>Organisation Name: </b> &nbsp;<?php echo $job['organisation_name'];?></h5>
					</div>
					<div class="timeline-item">
					<h5 class="timeline-header"><b href="#">About Organisation: </b></h5>
					<div class="timeline-body">
					<?php echo substr($job['about'],0,10);?>
					</div>
					</div>
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>Address Line1: </b> &nbsp;<?php echo $job['org_address1'];?></h5>
					</div>
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>Address Line2: </b> &nbsp;<?php echo $job['org_address2'];?></h5>
					</div>
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>City: </b> &nbsp;<?php echo $job['org_city'];?></h5>
					</div>
					
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>Pin: </b> &nbsp;<?php echo $job['org_pin'];?></h5>
					</div>
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>Email: </b> &nbsp;<?php echo $job['email'];?></h5>
					</div>
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>Contact No.: </b> &nbsp;<?php echo $job['contact'];?></h5>
					</div>
				</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_eligible1">
			   <div class="box-header with-border" style="text-align: center;background-color:#6cac29; height:41px;">
                <h5 style="color: #ffffff;">Requirements:</h5> 	
			</div>
                <div class="box-body">
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Work Experience: </b> &nbsp;<?php echo $job['work_experience'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Qualifications: </b> &nbsp;<?php echo $job['qualification'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Key Requirement: </b> &nbsp;<?php echo $job['key_requirement'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Gender: </b> &nbsp;<?php echo $job['gender'];?></h5>
					</div>
					
					
				</div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
			
			
          </div>
    </div>
    </div>
	</div>


	 
</div>

</div>


</section>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="    width: 511px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Mobile View</h4>
      </div>
      <div class="modal-body">
		




      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
	$('.tab').click(function(){
    var a=$(this).attr('id');
    
   if(a=='JobDetails')
   {
   	$("#tab_eligible1").removeClass("active");  // this deactivates the home tab
    $("#tab_organiser1").removeClass("active");  // this deactivates the home tab
    $("#tab_event1").addClass("active");  // this activates the profile tab
   }
   else if(a=='Organisation')
   {
    $("#tab_event1").removeClass("active");  // this deactivates the home tab
    $("#tab_eligible1").removeClass("active");  // this deactivates the home tab
    $("#tab_organiser1").addClass("active");  // this activates the profile tab
   }
   else if(a=='Requirements')
   {
    $("#tab_event1").removeClass("active");  // this deactivates the home tab
    $("#tab_organiser1").removeClass("active");  // this deactivates the home tab
    $("#tab_eligible1").addClass("active");  // this activates the profile tab
   }
});

</script>


<script>
	$('#myModal').click(function(){
		window.location.href='<?php echo site_url("forms/viewjob/$job[infoId]");?>';
	});	
	
	$('#btnbbb').click(function(){
//		alert("hi");
		$.ajax({
			method:"POST",
			data:{infoid:'<?php echo $job["infoId"];?>'},
			url: "<?php echo site_url('forms/mobileview'); ?>",
			success: function(result){
        		$(".modal-body").html(result);
    		}
			   });
	});
</script>
<style type="text/css">
	
#corner {
	background-color: #ffffff;
    padding:2px;
    border-radius: 10px;
	border: 2px solid #9565a2;
    width: 254px;
    height: 520px;    
}

#corner2 {
    border-radius: 20px;
    background-color:#272822;
    border: 4px solid #4e5056 ;
    padding: 10px; 
    width: 280px;
    height: 540px;    
}
/*#corner1 {

	
    border-radius: 20px;
    border: 4px solid #272822;
    padding: 10px; 
    width: 255px;
    height: 470px;    
}*/



	
	
</style>