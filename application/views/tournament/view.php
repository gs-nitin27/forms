
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Event
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
	  
		<div class="col-md-9">
				
			<?php $event = $this->register->getTournamentInfo($id); 
			// _pr($event);
				if(!empty($event)){
					
					$event = $event[0];
				}
			?>
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#tab_event" data-toggle="tab">Tournament Details </a></li>
              <li><a href="#tab_info" data-toggle="tab">Tournament Info</a></li>
              <li><a href="#tab_organiser" data-toggle="tab">Organiser Details</a></li>
              <li><a href="#tab_eligible" data-toggle="tab">Eligibility Criteria</a></li>
             </ul> 	 
             <form role="form" action="" class="register">  
            <div class="tab-content">
              <div class="tab-pane active" id="tab_event">
			   <div class="box-header with-border">
                <h4>Job Details:</h4 > 	
				</div>
                <div class="box-body">
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Event Title: </b> &nbsp;<?php echo ucfirst($event['name']);?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header"><b href="#">Event Description: </b></h5>

						<div class="timeline-body">
						  <?php echo $event['description'];?>
						</div>
					   
					  </div>
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Sports: </b> &nbsp;<?php echo $event['sports'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Level: </b> &nbsp;<?php echo $event['level'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Category: </b> &nbsp;<?php echo $event['category'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Age Group: </b> &nbsp;<?php echo $event['age_group']. " Years ";?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Start Date: </b> &nbsp;<?php echo @date('d-m-Y', strtotime($event['start_date']));?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>End Date: </b> &nbsp;<?php echo @date('d-m-Y', strtotime($event['end_date']));?></h5>
					</div>
					
					
					<!-- STATE IS ID BASED -->
					
					
              </div>
              </div>
				<div class="tab-pane" id="tab_info">
			   <div class="box-header with-border">
                <h4>Tournament Info:</h4> 	 	
			  </div>
                <div class="box-body">
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Address Line1: </b> &nbsp;<?php echo $event['address_1'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Address Line2: </b> &nbsp;<?php echo $event['address_2'];?></h5>
					</div>
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>City: </b> &nbsp;<?php echo $event['city_name'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>State: </b> &nbsp;<?php echo $event['state_name'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Pin: </b> &nbsp;<?php echo $event['pin'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Tournament Link: </b> &nbsp;<?php echo $event['tournaments_link'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Entry Start Date: </b> &nbsp;<?php echo @date('d-m-Y', strtotime($event['event_start_date']));?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Entry End Date: </b> &nbsp;<?php echo @date('d-m-Y', strtotime($event['event_end_date']));?></h5>
					</div>
					 
					
				</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_organiser">
			   <div class="box-header with-border">
                <h4>Organisation Details:</h4> 	
			  </div>
                <div class="box-body">
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Organiser Name: </b> &nbsp;<?php echo $event['organiser_name'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Email: </b> &nbsp;<?php echo $event['email'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Contact No.: </b> &nbsp;<?php echo $event['mobile'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Address Line1: </b> &nbsp;<?php echo $event['org_address1'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Address Line2: </b> &nbsp;<?php echo $event['org_address2'];?></h5>
					</div>
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>City: </b> &nbsp;<?php echo $event['org_city'];?></h5>
					</div>
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Pin: </b> &nbsp;<?php echo $event['org_pin'];?></h5>
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
						<h5 class="timeline-header no-border"><b>Criteria 1: </b> &nbsp;<?php echo $event['eligibility1']." Years";?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Criteria 2: </b> &nbsp;<?php echo $event['eligibility2'];?></h5>
					</div>
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>T & C 1: </b> &nbsp;<?php echo $event['terms_and_cond1'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>T & C 2: </b> &nbsp;<?php echo $event['terms_and_cond2'];?></h5>
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


