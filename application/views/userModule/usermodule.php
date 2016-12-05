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
            <div class="box-header">




 <form >
    
   <div class="container">
   <div class="dropdown" style="margin-top:0%; margin-left: 0%">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">User Type
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">Super User</a></li>
      <li><a href="#">User</a></li>
      
    </ul>
  </div>

      <div class="row text-center" style="margin-left:-21% ;margin-top:-3%">
       
        <label for="event" class="btn btn-default">Event  <input type="checkbox" id="event" class="badgebox" value="1" checked><span class="badge">&check;</span></label>

        <label for="tournament" class="btn btn-primary">Tournament  <input type="checkbox" id="tournament" class="badgebox" value="1" checked><span class="badge">&check;</span></label>

        <label for="job" class="btn btn-info">job <input type="checkbox" id="job" class="badgebox" value="1" checked><span class="badge" >&check;</span></label>
        
        <label for="resources" class="btn btn-success">Resources <input type="checkbox" id="resources" class="badgebox" value="1" checked><span class="badge">&check;</span></label>
       
        <label for="content" class="btn btn-warning">Content <input type="checkbox" id="content" class="badgebox" value="0"><span class="badge">&check;</span></label>
        
       <!--  <label for="usermenu" class="btn btn-danger">User Menu <input type="checkbox" id="usermenu" class="badgebox" value="6"><span class="badge">&check;</span></label> -->
  
  </div>
 

  <button type="button" class="btn btn-success" id="save" style="margin-top:-6%;margin-left: 76%">Save</button>
</div>
  </form>



              <h3 class="box-title">User List</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th style="width: 10px">#</th>
                  <th>Userid  </th>
                  <th>Name  </th>
                  <th>Proffession  </th>
                  <th>Usertype  </th>
                  <th style="width: 40px">Permission</th>
                  <th style="width: 40px">Edit</th>
                  <th style="width: 40px">Delete</th>
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
                 <td>
                    <?php if($user['status']==0){?>
                    <button class="badge bg-red" onclick="myfunction(<?php echo $user['userid'];?>,1)"><?php echo "Activate";?></button>
                    <?php }else{?> 
                    <button class="badge bg-green" onclick="myfunction(<?php echo $user['userid'];?>,0)"><?php echo "Deactivate";?></button>
                    <?php } ?>
                    </td>
                    <td><a href = "<?php echo site_url('forms/edituserProfile/'.$user['userid']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-edit"></i></a></td>
                    <td><a href = "<?php echo site_url('forms/deleteUser/'.$user['userid']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-default bs-tooltip" title="delete" ><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
                <?php } } ?>
                </tbody>
                <tfoot>
                <tr>
                 <th style="width: 10px">#</th>
                  <th>Userid  </th>
                  <th>Name  </th>
                  <th>Proffession</th>
                  <th>Usertype  </th>
                  <th style="width: 40px">Permission</th>
                  <th style="width: 40px">Edit</th>
                  <th style="width: 40px">Delete</th>
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

    $('#tournament').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#tournament").val(1);
               val=1;
            
        }
        else {
          var val=$("#tournament").val(0);
               val=0;
            
        }
    });
     $('#job').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#job").val(1);
               val=1;
            
        }
        else {
          var val=$("#job").val(0);
               val=0;
            
        }
    });

      $('#event').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#event").val(1);
               val=1;
            
        }
        else {
          var val=$("#event").val(0);
               val=0;
            
        }
    });
       $('#resources').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#resources").val(1);
               val=1;
           
        }
        else {
          var val=$("#resources").val(0);
               val=0;
           
        }
    });

        $('#content').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#content").val(1);
               val=1;
            
        }
        else {
          var val=$("#content").val(0);
               val=0;
           
        }
    });

        $('#usermenu').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#usermenu").val(1);
               val=1;
                   }
        else {
          var val=$("#usermenu").val(0);
               val=0;
            
        }
    });
</script>




