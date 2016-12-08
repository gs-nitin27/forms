

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
 
</head>

<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="text-align: center;">
              <h3 class="box-title"><b>Event List</b></h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px; background: #3c8dbc; color: #ffffff;">#<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Event Name <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Event Type <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Sport <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Location <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Organiser <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Status <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                   <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Publish <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">View</th>
                </tr>
                </thead>
				<tbody>
                <?php $i =1;
				$events = $this->register->getEventInfo();
      

				if(!empty($events)){
						foreach($events as $event){  ?>

                <tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $event['name']; ?></td>
					<td><?php echo $event['type']; ?></td>
					<td><?php echo $event['sports']; ?></td>
					<td><?php echo $event['city']; ?></td>
					<td><?php echo $event['organizer_name']; ?></td>
					
					<td>
					<?php if(@strtotime($event['end_date']) < time()){?>
						<span class="badge bg-red"><?php echo "Expired";?></span>
					<?php }else{?> 
					<span class="badge bg-green"><?php echo "Active";?></span>
					<?php } ?>
					</td>

          <td>
          <?php if($event['publish']==0){?>
          <button class="badge bg-red" onclick="myfunction(<?php echo $event['infoId'];?>,1)"><?php echo "Activate";?></button>
          <?php }else{?> 
          <button class="badge bg-green" onclick="myfunction(<?php echo $event['infoId'];?>,0)"><?php echo "Deactivate";?></button>
          <?php } ?>
          </td>

					<td><a href = "<?php echo site_url('forms/viewevent/'.$event['infoId']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-eye-open"></i></a></td>
                </tr>
				<?php } } ?>
                </tbody>
                <tfoot>
                 <tr>
                  <th style="width: 10px; background: #3c8dbc; color: #ffffff;">#</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Event Name</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Event Type</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Sport</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Location</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Organiser</th>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Status</th>
                   <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Publish</th>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">View</th>
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
    url: '<?php echo site_url('forms/StatusEvent'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
      alert(result);
      window.location.href = url+"/forms/getevent";

    }
});    
}

 
</script>

