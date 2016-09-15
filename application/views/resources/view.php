
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Resource
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
	  
		<div class="col-md-6">
				
			<?php $resource = $this->register->getResourceInfo($id); 
				if(!empty($resource)){
					
					$resource = $resource[0];
				}
				
			?>
			

			<div class="box box-primary">
       
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b> Title: </b> &nbsp;<?php echo ucfirst($resource['title']);?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b> Link: </b> &nbsp;<?php echo ucfirst($resource['url']);?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header"><b href="#"> Summary: </b></h5>

						<div class="timeline-body">
						  <?php echo $resource['summary'];?>
						</div>
					   
				     </div>
					  <div class="timeline-item">
						<h5 class="timeline-header"><b href="#"> Description: </b></h5>

						<div class="timeline-body">
						  <?php echo $resource['description'];?>
						</div>
					   
					  </div>
					
					
					
					
              </div>
              <!-- /.box-body -->

              
            
          </div>
	  </div>
	  
</div>
</div>
</section>





