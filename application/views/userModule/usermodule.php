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
                 <th style="width: 10px; background: #5262bc;color: #ffffff;"><img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px>#</img></th>
                  <th style="background: #5262bc;color: #ffffff;" >Email <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img> </th>
                  <th style="background: #5262bc;color: #ffffff;" >Name  <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></th>

                  <th style="background: #5262bc;color: #ffffff;" >Userid  <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></th>

                  <th style="background: #5262bc;">Profession <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px> </th>
                 <!--  <th style="background: #5262bc; color: #ffffff;">Usertype <img src="<?php// echo base_url('img/sort.png')?>" alt="" height=10px width=10px> </th> -->
                 <!--  <th style="width: 40px; background: #5262bc; color: #ffffff;"><img src="<?php //echo base_url('img/sort.png')?>" alt="" height=10px width=10px>Permission</th> -->

                  <th style="background: #5262bc;color: #ffffff;">View</th>
                 <!--  <th style="width: 40px; background: #5262bc; color: #ffffff;">Edit</th> -->
                  <th style="background: #5262bc;color: #ffffff;">Activate</th>
                </tr>
                </thead>
        <tbody>
                <?php 
                   $data = $this->session->userdata('item');
                    // print_r($data);die;
                $i =1;

                $users = $this->register->getUserInfo();  
                 if(!empty($users)){
                        foreach($users as $user){ ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['userid']; ?></td>
                    
                    
                    <td><?php echo $user['prof_name']; ?></td>
                    <!-- <td><?php// echo $user['userType']; ?></td> -->
                <!--  <td>
                    <?php //if($user['status']==0){?>
                    <button class="badge bg-red" onclick="myfunction(<?php// echo $user['userid'];?>,1)"><?php// echo "Activate";?></button>
                    <?php// }else{?> 
                    <button class="badge bg-green" onclick="myfunction(<?php //echo $user['userid'];?>,0)"><?php //echo "Deactivate";?></button>
                    <?php //} ?>
                    </td> -->
                        
                    <?php  $list=array('a' => 0,
                                'b' => 1,
                                'c' => 2,
                                'd' => 3,
                                'e' => 4,
                                'f' => 5,
                                'g' => 6,
                                'h' => 7,
                                'i' => 8,
                                'j' => 9);
                                 $num=$user['userid']; //your value
                                 $temp='';
                                 $arr_num=str_split ($num);
                                foreach($arr_num as $data)
                                {
                                $temp.=array_search($data,$list);
                                }
                                $num=$temp;
                                {  ?>

   

                     <td><a href = "<?php echo site_url('forms/userprofile/'.$num.'?module'); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-eye-open"></i></a></td>

                    <!-- <td><a href = "<?php// echo site_url('forms/edituserProfile/'.$user['userid']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-edit"></i></a></td>  -->

                    <!-- <td><a href = "<?php// echo site_url('forms/deleteUser/'.$user['userid']); ?>" onclick="return confirm('Are you sure you want to Deactivate this User?');" class="btn btn-xs btn-default bs-tooltip" title="delete" ><i class="glyphicon glyphicon-remove"></i></a></td>  -->
                      <?php }?>
                  <td>
                    <?php if($user['activeuser']==0){?>
                    <button class="badge bg-red" onclick="myfunction(<?php echo $user['userid'];?>,1)"><?php echo "Activate";?></button>
                    <?php }else{?> 
                    <button class="badge bg-green" onclick="myfunction(<?php echo $user['userid'];?>,0)"><?php echo "Deactivate";?></button>
                    <?php } ?>
                    </td>
                </tr>
                <?php } } 


                ?>
                </tbody>
                <tfoot>
               <tr>
                 <th style="width: 10px;background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;"> Email </th>
                  <th style="background: #5262bc; color: #ffffff;">Name  </th>
                   <th style="background: #5262bc; color: #ffffff;">Userid </th>
                  <th style="background: #5262bc; color: #ffffff;">Profession  </th>
                  <!-- <th style="background: #5262bc; color: #ffffff;">Usertype  </th> -->
                  <!-- <th style="width: 40px; background: #5262bc; color: #ffffff;">Permission</th> -->
                  <th style="background: #5262bc; color: #ffffff;">View</th>
                <!--   <th style="width: 40px; background: #5262bc; color: #ffffff;">Edit</th> -->
                  <th style="background: #5262bc; color: #ffffff;">Activate</th>
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
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->


<script>

    $(document).ready(function() {
    $('#example1').DataTable( {
        initComplete: function () {
          this.api().columns([4]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
                 
                column.data().unique().sort().each( function ( d, j ) {
                    //alert(d);
                    select.append( '<option value="'+d+'">'+d+'</option>' )
              
                } );

            } );
        }
    } );
} );


</script>

<script type="text/javascript">
function myfunction(id,activeuser)
{ 
    var data1 = {
    "userid"                  : id, 
    "activeuser"              : activeuser
};
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = JSON.stringify(data1);
    $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/ActivateUser'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
    window.location.href = url+"/forms/usermodule";
    }
});    
}

function myfunctionadmin(id,activeuser)
{ 
    var data1 = {
    "userid"                  : id, 
    "activeuser"              : activeuser
};
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = JSON.stringify(data1);
    $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/Activateadmin'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
    window.location.href = url+"/forms/usermodule";
    }
});    
}
</script>




