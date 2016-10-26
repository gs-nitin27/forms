
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Resource <a id="mobile" href="#" class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#myModal">Mobile View</a>
        
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
                <table class="table table-bordered">
				<tr><td>
              <div class="box-body">
					<div class="timeline-item">
						<h5 class="timeline-header no-border" style="color:rgb(0,0,255);opacity:0.6;"><b> Title: </b></h5> &nbsp;<?php echo ucfirst($resource['title']);?>
					</div>
					<div class="timeline-item">
                        <h5 class="timeline-header no-border" style="color:rgb(0,0,255);opacity:0.6;"><b> Link: </b></h5>&nbsp;
				    	<a href="<?php echo ucfirst($resource['url']);?>" target="_blank"><?php echo ucfirst($resource['url']);?></a>
					</div>

					<div class="timeline-item">
                        <h5 class="timeline-header no-border" style="color:rgb(0,0,255);opacity:0.6;"><b> Image: </b>&nbsp;</h5>
					</div>

					<div class="timeline-item">
						<h5 class="timeline-header" style="color:rgb(0,0,255);opacity:0.6;"><b href="#"> Summary: </b></h5>

						<div class="timeline-body">
						  <?php echo $resource['summary'];?>
						</div>
					   
				     </div>
					  <div class="timeline-item">
						<h5 class="timeline-header" style="color:rgb(0,0,255);opacity:0.6;"><b href="#"> Description: </b></h5>

						<div class="timeline-body">
						  <?php echo $resource['description'];?>
						</div>
					   
					  </div>
					
					
					
					
              </div>
			  </td>
			  <td style="width: 10px; height: 10px; ">
						

						<div >
                        <img style="display:block; border:2px solid SteelBlue"; width="220px" height="220px" src = "<?php  echo base_url()."uploads/resources/".$resource['image']; ?>">
				     </div>
			  
			  </td>
			  </tr>
			  </table>
              <!-- /.box-body -->

              
            
          </div>
	  </div>
	  
</div>
</div>
</section>

<!--  Mobile View  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="    width: 511px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Mobile View</h4>
      </div>
      <div class="modal-body">
     
      <div class="box-body">
					<div class="timeline-item">
						<h5 class="timeline-header no-border" style="color:rgb(0,0,255);opacity:0.6;"><b> Title: </b> &nbsp;</h5><?php echo ucfirst($resource['title']);?>
					</div>
					<div class="timeline-item">
                        <h5 class="timeline-header no-border" style="color: rgb(0,0,255);opacity:0.6"><b> Link: </b>&nbsp;
				    	<a href="<?php echo ucfirst($resource['url']);?>" target="_blank"><?php echo ucfirst($resource['url']);?></a></h5>
					</div>

					

					<div class="timeline-item">
						<h5 class="timeline-header" style="color: rgb(0,0,255);opacity:0.6"><b href="#"> Summary: </b></h5>

						<div class="timeline-body">
						  <?php echo $resource['summary'];?>
						</div>
					   
				     </div>
					  <div class="timeline-item">
						<h5 class="timeline-header" style="color: rgb(0,0,255);opacity:0.6"><b href="#"> Description: </b></h5>

						<div class="timeline-body">
						  <?php echo $resource['description'];?>
						</div>
					   
					  </div>
					
					
					
					
              </div>
      </div>
      
    </div>
  </div>
</div>



<script>
	$('#mobile').click(function(){
//		alert("hi");
		$.ajax({
			method:"POST",
			data:{infoid:'<?php echo $resource["infoId"];?>'},
			url: "<?php echo site_url('forms/mobileviewResources'); ?>",
			success: function(result){
        		$(".modal-body").html(result);
    		}
			   });
	});
</script>