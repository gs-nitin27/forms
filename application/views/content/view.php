
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Content List
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
	  
		<div class="col-md-6">
				
			<?php $content = $this->register->getContentInfo($id); 
				if(!empty($content)){
					
					$content = $content[0];
				}
				
			?>
			

			<div class="box box-primary">
       
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b> Title: </b> &nbsp;<?php echo ucfirst($content['title']);?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b> Link: </b> &nbsp;<?php echo ucfirst($content['url']);?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header"><b href="#"> Content: </b></h5>

						<div class="timeline-body">
						  <?php echo $content['content'];?>
						</div>
					   
				     </div>
					  
					
					
					
              </div>
              <!-- /.box-body -->

              
            
          </div>
	  </div>
	  
</div>
</div>
</section>


