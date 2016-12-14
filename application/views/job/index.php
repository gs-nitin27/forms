
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
 
 
</head>

<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="text-align: center;">
              <h3 class="box-title"><b> Job List</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Job Title <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Job Type <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Sport <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Location <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Organisation <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>

             <?php        
                 $data=$this->session->userdata('item');
                 $usertype=$data['userType']; 
                 {
                  if($usertype==101 || $usertype==102 )
                   {
                    ?>

                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Publish <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>

                    <?php }?>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">View</th>
                </tr>
                </thead>
                <tbody>
         <?php 
         $i =1;

        if($usertype==101 || $usertype==102 )
        {
				    $jobs = $this->register->getJobInfo();
        }
        else
        {
                
            $data=$this->session->userdata('item');
            $userid=$data['userid']; 
            // $jobs = $this->register->getJobInfo($userid);
            $jobs = $this->register->getUserJobInfo($userid);
        }
			  if(!empty($jobs))
        {
					 foreach($jobs as $job)
        { ?>
          <tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $job['title']; ?></td>
					<td><?php echo $job['type']; ?></td>
					<td><?php echo $job['sports']; ?></td>
					<td><?php echo $job['city']; ?></td>
					<td><?php echo $job['organisation_name']; ?></td>
          <?php
             if($usertype==101 || $usertype==102 )
              {
            ?>
          <td>
          <?php if($job['publish']==0){?>
          <button class="badge bg-red" onclick="myfunction(<?php echo $job['infoId'];?>,1)"><?php echo "Activate";?></button>
          <?php }else{?> 
          <button class="badge bg-green" onclick="myfunction(<?php echo $job['infoId'];?>,0)"><?php echo "Deactivate";?></button>
          <?php } ?>
          </td>
           <?php } ?>
					<td><a href = "<?php echo site_url('forms/viewJob/'.$job['infoId']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-eye-open"></i></a></td>
                </tr>
				<?php } } ?>
                </tbody>
                <tfoot>
                 <tr>
                 <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Job Title</th>
                  <th style="background: #5262bc; color: #ffffff;">Job Type</th>
                  <th style="background: #5262bc; color: #ffffff;">Sport</th>
                  <th style="background: #5262bc; color: #ffffff;">Location</th>
                  <th style="background: #5262bc; color: #ffffff;">Organisation</th>

                  <?php
             if($usertype==101 || $usertype==102 )
                   {
                    ?>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Publish</th>
                  <?php } } ?>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">View</th>
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















