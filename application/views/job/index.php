
   <script>
//document.domain = "getsporty.in";
$(document).ready(function(){
	//$("#example1").DataTable();
  $('#jcity').focusout(function(){
			var city_key = $('#jcity').val();
			$.ajax({
			    method: "POST",
			    url: '<?php echo site_url('forms/getStateByCity'); ?>',
				data: { key: city_key }
			}).done(function( html ) {
				var res = jQuery.parseJSON(html)
				$( "#jstate_value" ).val( res.state );
				$( "#jstate" ).val( res.id );
				
			  });
		});
		$('#orgcity').focusout(function(){
			var city_key = $('#orgcity').val();
			$.ajax({
			    method: "POST",
			    url: '<?php echo site_url('forms/getStateByCity'); ?>',
				data: { key: city_key }
			}).done(function( html ) {
				var res = jQuery.parseJSON(html)
				$( "#orgstate_value" ).val( res.state );
				$( "#orgstate" ).val( res.id );
				
			  });
		});

  
  /* $(function () {
    
    /* $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    }); */ 
  });

  </script>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
         <section class="content"> 
      <div class="row">
	  
		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Job List</h3></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Job Title</th>
                  <th>Job Type</th>
                  <th>Sport</th>
                  <th>Location</th>
                  <th>Organisation</th>
                  <th style="width: 40px">Action</th>
                </tr>
				<?php $i =1;
				$jobs = $this->register->getJobInfo();
				if(!empty($jobs)){
						foreach($jobs as $job){ ?>
                <tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $job['title']; ?></td>
					<td><?php echo $job['type']; ?></td>
					<td><?php echo $job['sports']; ?></td>
					<td><?php echo $job['city']; ?></td>
					<td><?php echo $job['organisation_name']; ?></td>
					<!--td><span class="badge bg-red">55%</span></td-->
					<td><a href = "<?php echo site_url('forms/viewJob/'.$job['infoId']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="fa fa-search"></i></a></td>
                </tr>
				<?php } } ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <!--div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div-->
          </div>
	  
</div>
</section>
</div>



