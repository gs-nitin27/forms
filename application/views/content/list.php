
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
            <div class="box-header" style="text-align: center;">
              <h3 class="box-title"><b>Content List</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px; background: #3c8dbc; color: #ffffff;">#</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Title <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Link <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Content <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>

              <?php        
                 $data=$this->session->userdata('item');
                 $usertype=$data['userType']; 
                 {
                  if($usertype==101 || $usertype==102 )
                   {
                    ?>
                  <th style="background: #3c8dbc; color: #ffffff;">Publish <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                   <?php }?>

				          <th style="width: 10px; background: #3c8dbc; color: #ffffff;">Edit</th>
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

          <?php
             if($usertype==101 || $usertype==102 )
                   {
                    ?>
          <td>
          <?php if($contants['publish']==0){?>
          <button class="badge bg-red" onclick="myfunction(<?php echo $contants['id'];?>,1)"><?php echo "Activate";?></button>
          <?php }else{?> 
          <button class="badge bg-green" onclick="myfunction(<?php echo $contants['id'];?>,0)"><?php echo "Deactivate";?></button>
          <?php } ?>
          </td>
            <?php } ?>
		  <td><a href = "<?php echo site_url('forms/editContent/'.$contants['id']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="Edit" ><i class="glyphicon glyphicon-edit"></i></a></td>
                </tr>
		  <?php } } ?>
                </tbody>
                <tfoot>
               <tr>
                  <th style="width: 10px; background: #3c8dbc; color: #ffffff;">#</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Title</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Link</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Content</th>

                  <?php
             if($usertype==101 || $usertype==102 )
                   {
                    ?>
                  <th style="background: #3c8dbc; color: #ffffff;">Publish</th>

                    <?php } }?>
                  <th style="width: 10px; background: #3c8dbc; color: #ffffff;">Edit</th>
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

<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>



<!-- page script -->
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
    url: '<?php echo site_url('forms/StatusContent'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
      window.location.href = url+"/forms/getContent";

    }
});    
}
</script>
