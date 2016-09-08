
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Job
        
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



