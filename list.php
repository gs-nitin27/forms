
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>"></script>

  
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
                  <th>Title</th>
                  <th>Link</th>
                  <th>Content</th>
                  <th>Publish</th>
				  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                 <?php $i =1;
				  $content = $this->register->getContentInfo();
				  if(!empty($content)){
						foreach($content as $contants){ ?>
          <tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $contants['title']; ?></td>
					<td><?php echo $contants['url']; ?></td>
					<td><?php echo $contants['content']; ?></td>
          <td>
          <?php if($contants['publish']==0){?>
          <button class="badge bg-red" onclick="myfunction(<?php echo $contants['id'];?>,1)"><?php echo "Activate";?></button>
          <?php }else{?> 
          <button class="badge bg-green" onclick="myfunction(<?php echo $contants['id'];?>,0)"><?php echo "Deactivate";?></button>
          <?php } ?>
          </td>
		  <td><a href = "<?php echo site_url('forms/editContent/'.$contants['id']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="Edit" ><i class="glyphicon glyphicon-edit"></i></a></td>
                </tr>
		  <?php } } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  <th>Link</th>
                  <th>Content</th>
                  <th>Publish</th>
				  <th>Edit</th>
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
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/fastclick/fastclick.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/dist/js/app.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
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
    url: '<?php echo site_url('forms/StatusContent'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
      window.location.href = url+"/forms/getContent";

    }
});    
}
</script>
