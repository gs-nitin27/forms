
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
  });

  </script>
 


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
 
</head>

<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Content List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th style="width: 10px">#</th>
                  <th>Job Title</th>
                  <th>Job Type</th>
                  <th>Sport</th>
                  <th>Location</th>
                  <th>Organisation</th>
                  <th style="width: 40px">Publish</th>
                  <th style="width: 40px">View</th>
                </tr>
                </thead>
                <tbody>
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
          <td>
          <?php if($job['publish']==0){?>
          <button class="badge bg-red" onclick="myfunction(<?php echo $job['infoId'];?>,1)"><?php echo "Activate";?></button>
          <?php }else{?> 
          <button class="badge bg-green" onclick="myfunction(<?php echo $job['infoId'];?>,0)"><?php echo "Deactivate";?></button>
          <?php } ?>
          </td>

					<td><a href = "<?php echo site_url('forms/viewJob/'.$job['infoId']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-eye-open"></i></a></td>
                </tr>
				<?php } } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Job Title</th>
                  <th>Job Type</th>
                  <th>Sport</th>
                  <th>Location</th>
                  <th>Organisation</th>
                  <th style="width: 40px">Publish</th>
                  <th style="width: 40px">View</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

  <div class="control-sidebar-bg"></div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>

<script>
  function myfunction(id,uid)
  {  
    var data1 = {
    "id"                      : id, 
    "publish"                 : uid
};
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = JSON.stringify(data1);
  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/StatusJob'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
      window.location.href = url+"/forms/getJob";

    }
});    
}

 
</script>















