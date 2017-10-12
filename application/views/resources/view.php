
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Resource <!-- <a id="mobile" href="#" class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#myModal">Mobile View</a> -->
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
	  
		<div class="col-md-12">
				
			<?php $resource = $this->register->getResourceInfo($id); 
				if(!empty($resource))
				{
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
					<?php if(!empty(ucfirst($resource['url']))) 
					{
							?>	

					<div class="timeline-item">
                        <h5 class="timeline-header no-border" style="color:rgb(0,0,255);opacity:0.6;">
                        <b> Link: </b></h5>&nbsp;
				    	<a href="<?php echo ucfirst($resource['url']);?>" target="_blank"><?php echo ucfirst($resource['url']);?></a>
					</div>

				<?php 	} ?>


					<div class="timeline-item">
						<h5 class="timeline-header" style="color:rgb(0,0,255);opacity:0.6;"><b href="#"> Summary: </b></h5>

						<div class="timeline-body">
						  <?php echo $resource['summary'];?>
						</div>
					   
				     </div>
				     <?php if(!empty($resource['description'])) { ?>

					  <div class="timeline-item">
						<h5 class="timeline-header" style="color:rgb(0,0,255);opacity:0.6;"><b href="#"> Description: </b></h5>

						<div class="timeline-body">
						  <?php echo $resource['description'];?>
						</div>
					   
					  </div>		
              </div>
              <?php } ?>
			  </td>
			  <td style="width: 10px; height: 10px; ">
						
                          <?php if($resource['image']) { ?>
						<div>
                        <img style="display:block; border:2px solid SteelBlue"; width="300px" height="220px" src = "<?php  echo base_url()."uploads/resources/".$resource['image']; ?>">
				        </div>
				        <?php } else { ?>
                        <div>
                        <img style="display:block; border:2px solid SteelBlue"; width="300px" height="220px" src = "<?php  echo base_url('img/no-image.jpg'); ?>">
				        </div>
				         <?php } ?>

			  
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
<!-- <div id="corner"> -->
    <div class="modal-content" style="width: 350px;">

      <div class="modal-header" style="background-color:#4657b7;">
       
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      
      <div class="modal-body">
      <div class="box-body">
                    <div>
                     <img style="display:block; border:2px solid SteelBlue"; width="300px" height="220px" src = "<?php  echo base_url()."uploads/resources/".$resource['image']; ?>">
				    </div>

					<div class="timeline-item">
						<h5 class="timeline-header no-border" style="color:rgb(0,0,255);opacity:0.6;"><b></b> &nbsp;</h5><h5 style="text-align: center;"><b><?php echo ucfirst($resource['title']);?></b></h5>
					</div>

					<!-- <div class="timeline-item">
                        <h5 class="timeline-header no-border" style="color: rgb(0,0,255);opacity:0.6"><b> Link: </b>&nbsp;
				    	<a href="<?php// echo ucfirst($resource['url']);?>" target="_blank"><?php //echo ucfirst($resource['url']);?></a></h5>
					</div> -->
					<div class="timeline-item">
						<h5 class="timeline-header" style="color: rgb(0,0,255);opacity:0.6"> Summary: </h5>

						<div class="timeline-body">
						  <h5><?php echo $resource['summary'];?></h5>
						</div>
					   
				     </div>
					 <!--  <div class="timeline-item">
						<h5 class="timeline-header" style="color: rgb(0,0,255);opacity:0.6"><b href="#"> Description: </b></h5>

						<div class="timeline-body">
						  <?php// echo $resource['description'];?>
						</div>
					  </div> -->
					  <div  class="timeline-item">
                        <h5 class="timeline-header no-border" style="color: rgb(0,0,255);opacity:0.6"><b> Link: </b>&nbsp;
				    	<a href="<?php echo ucfirst($resource['url']);?>" target="_blank"><?php echo ucfirst($resource['url']);?></a></h5>
					</div>
					
              </div>
      </div>
    <!--  </div> -->
    </div>
  </div>
</div>

<!-- <style> 
#corner {
    padding:2px;
    border-radius: 10px;
	border: 4px solid #e5e5e5;
    width: 520px;
    height: 590px;    
}

#corner2 {
    border-radius: 20px;
    border: 1px solid #e5e5e5;
    padding: 10px; 
    width: 235px;
    height: 390px;    
}
</style> -->
<!-- <script>
	$('#mobile').click(function(){
//		alert("hi");
		$.ajax({
			method:"POST",
			data:{infoid:'<?php //echo $resource["infoId"];?>'},
			url: "<?php //echo site_url('forms/mobileviewResources'); ?>",
			success: function(result){
        		$(".modal-body").html(result);
    		}
			   });
	});
</script> -->