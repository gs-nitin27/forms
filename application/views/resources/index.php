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
              <h2 class="box-title"><b>Resource List</b></h2>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
               <tr>
                 <th style="width: 10px; background: #3c8dbc; color: #ffffff;">#</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Title<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Summary <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                <!--  <th>Description</th> -->
                  <th style="background: #3c8dbc; color: #ffffff;">Link <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Sport <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Location <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>

              <?php        
                 $data=$this->session->userdata('item');
                 $usertype=$data['userType']; 
                 {
                  if($usertype==101 || $usertype==102 )
                   {
                    ?>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Publish <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                    <?php }?>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">View</th>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Edit</th>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Delete</th>
                </tr>
                </thead>
				<tbody>
            <?php $i =1;
            if($usertype==101 || $usertype==102 )
           {
               $resources = $this->register->getResourceInfo();
           }
        else
           {      
            $data=$this->session->userdata('item');
            $userid=$data['userid']; 
            $resources = $this->register->getResourceInfo($userid);   
            }
              if(!empty($resources)){
                    foreach($resources as $resource){ ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $resource['title']; ?></td>
                    <td><?php echo substr($resource['summary'],0,170); ?></td>
				          <!-- 	<td><?php //echo substr($resource['description'],0,170); ?></td> -->
                    <td><?php echo $resource['url']; ?></td>
                    <td><?php echo $resource['sport']; ?></td>
                    <td><?php echo $resource['location']; ?></td>

              
          <?php
             if($usertype==101 || $usertype==102 )
                   {
                    ?>

                 <td>
                    <?php if($resource['status']==0){?>
                    <button class="badge bg-red" onclick="myfunction(<?php echo $resource['id'];?>,1)"><?php echo "Activate";?></button>
                    <?php }else{?> 
                    <button class="badge bg-green" onclick="myfunction(<?php echo $resource['id'];?>,0)"><?php echo "Deactivate";?></button>
                    <?php } ?>
                    </td>
                    <?php } ?>
                    <td><a href = "<?php echo site_url('forms/viewresources/'.$resource['id']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-eye-open"></i></a></td>
                    <td><a href = "<?php echo site_url('forms/editResources/'.$resource['id']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="Edit" ><i class="glyphicon glyphicon-edit"></i></a></td>
                    <td><a href = "<?php echo site_url('forms/deleteResources/'.$resource['id']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-default bs-tooltip" title="delete" ><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
                <?php } } ?>
                </tbody>
                <tfoot>
                 <tr>
                 <th style="width: 10px; background: #3c8dbc; color: #ffffff;">#</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Title</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Summary</th>
                <!--  <th>Description</th> -->
                  <th style="background: #3c8dbc; color: #ffffff;">Link</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Sport</th>
                  <th style="background: #3c8dbc; color: #ffffff;"">Location</th>

          <?php
             if($usertype==101 || $usertype==102 )
                   {
                    ?>

                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Publish</th>
                  <?php } } ?>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">View</th>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Edit</th>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Delete</th>
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
<script type="text/javascript">

  function myfunction(id,uid)
  { 
    var data1 = {
    "id"                      : id, 
    "status"                  : uid
  };
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = JSON.stringify(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/StatusResources'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
    window.location.href = url+"/forms/getResources";
    }
});    
}
</script>






