
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Job<a href="#" class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#myModal">Mobile View</a>
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
	  
		<div class="col-md-6">
				
			<?php $job = $this->register->getJobInfo($id); 
				if(!empty($job)){
					
					$job = $job[0];
				}
			?>
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_event" data-toggle="tab">Job Details </a></li>
              <li><a href="#tab_organiser" data-toggle="tab">Organisation</a></li>
              <li><a href="#tab_eligible" data-toggle="tab">Requirements</a></li>
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
						  <?php echo $job['description'];?>
						</div>
					   
					  </div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Job Type: </b> &nbsp;<?php echo $job['type'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Sports: </b> &nbsp;<?php echo $job['sports'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Address Line1: </b> &nbsp;<?php echo $job['address1'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Address Line2: </b> &nbsp;<?php echo $job['address2'];?></h5>
					</div>
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>City: </b> &nbsp;<?php echo $job['city_name'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>State: </b> &nbsp;<?php echo $job['state_name'];?></h5>
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
						<h5 class="timeline-header no-border"><b>City: </b> &nbsp;<?php echo $job['city_org'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>State: </b> &nbsp;<?php echo $job['state_org'];?></h5>
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
						<h5 class="timeline-header no-border"><b>Work Experience: </b> &nbsp;<?php echo $job['work_experience']." Years";?></h5>
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
</section>

<style>
#text .inner{
    font-size: 15px;margin-left: 21px;
}
#container {
  height: 74px;
  width: 400px;
  position: relative;
}

#image {
  position: absolute;
  left: 0;
  top: 0;
}
#text {
  z-index: 100;
  position: absolute;
  color: white;
  
  left: 150px;
  top: 15px;
}

.detail {
   z-index: 100;
  color:  	#707070;
  top: -404px;
   left: 16px;
   position: relative;
}
</style>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="    width: 511px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Mobile View</h4>
      </div>
      <div class="modal-body">
		<img src="/jobheader.png"><br>
<div id="container">
<img src="/jobtitle.png" id="image" style="position: absolute;">
<p id="text">
   <span style="font-weight: bold; margin-left: 24px;"> <?php echo ucfirst($job['title']);?><br></span>
	<span class = "inner">
	<?php echo $job['organisation_name'];?>,<br>
	<label style="margin-left: 45px;"><?php echo $job['city_org'];?></label><br>
	<label style="font-size: 20px;    position: relative;    left: 135px;    top: 33px;">Job Posted 72 hours</label>
	
	
	</span>
	
  </p>
</div>
<div >
<img src="/jobdetail.png" style="position: static; margin-top: 77px;">
<p class="detail" style="font-size: 14px;  font-weight: bold;"><?php echo $job['description'];?></p>
  	<label for="type" class="detail" style="top: -354px;left: 60px;font-size: 18px;"><?php echo ucfirst($job['title']);?></label>
  	<label for="type" class="detail" style="top: -318px;left: -78px;font-size: 18px;"><?php echo $job['key_requirement'];?></label>
  	<label for="type" class="detail" style="top: -281px;left: -131px;font-size: 18px;"><?php echo $job['work_experience'];?></label>
  	<label for="type" class="detail" style="top: -248px;left: 18px;font-size: 18px;"><?php echo @$job['skill'];?></label>
  	<label for="type" class="detail" style="top: -170px;    left: 13px;    float: left;    font-size: 18px;"><?php echo $job['about'];?></label>
</div>
<img src="/jobbutton.png" style="margin: -220px 0 -90px 0px">
      </div>
      
    </div>
  </div>
</div>




