<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
</head>
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="text-align: center;">
              <h3 class="box-title"><b>User List</b></h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th style="width: 10px;background: #3c8dbc; color: #ffffff;"><img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px>#</img></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Userid <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img> </th>
                  <th style="background: #3c8dbc; color: #ffffff;">Name  <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></th>
                  <th style="background: #3c8dbc; color: #ffffff;">Proffession <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px> </th>
                  <th style="background: #3c8dbc; color: #ffffff;">Usertype <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px> </th>
                 <!--  <th style="width: 40px; background: #3c8dbc; color: #ffffff;"><img src="<?php //echo base_url('img/sort.png')?>" alt="" height=10px width=10px>Permission</th> -->
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Edit</th>
                  <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Delete</th>
                </tr>
                </thead>
        <tbody>
                <?php $i =1;
                $users = $this->register->getUserInfo();
                if(!empty($users)){
                        foreach($users as $user){ ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $user['userid']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['prof_id']; ?></td>
                    <td><?php echo $user['userType']; ?></td>
                <!--  <td>
                    <?php //if($user['status']==0){?>
                    <button class="badge bg-red" onclick="myfunction(<?php// echo $user['userid'];?>,1)"><?php// echo "Activate";?></button>
                    <?php// }else{?> 
                    <button class="badge bg-green" onclick="myfunction(<?php //echo $user['userid'];?>,0)"><?php //echo "Deactivate";?></button>
                    <?php //} ?>
                    </td> -->
                    <td><a href = "<?php echo site_url('forms/edituserProfile/'.$user['userid']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-edit"></i></a></td>
                    <td><a href = "<?php echo site_url('forms/deleteUser/'.$user['userid']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-default bs-tooltip" title="delete" ><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
                <?php } } ?>
                </tbody>
                <tfoot>
               <tr>
                 <th style="width: 10px;background: #3c8dbc; color: #ffffff;">#</th>
                  <th style="background: #3c8dbc; color: #ffffff;">Userid  </th>
                  <th style="background: #3c8dbc; color: #ffffff;">Name  </th>
                  <th style="background: #3c8dbc; color: #ffffff;">Proffession  </th>
                  <th style="background: #3c8dbc; color: #ffffff;">Usertype  </th>
                  <!-- <th style="width: 40px; background: #3c8dbc; color: #ffffff;">Permission</th> -->
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





