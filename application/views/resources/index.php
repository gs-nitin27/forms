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
            <h2 class="box-title"><b>Resource List</b></h2>
            </div>
            <div>
            <div id="error_text"><h3 style="text-align: center;color: green"><?php echo $this->session->flashdata('error'); ?></h2></div> 
            <form action="<?php echo site_url('forms/Csvfileupload'); ?>" method="post" enctype="multipart/form-data">
            Select CSV file :
             <input type="file" name="fileToUpload" id="fileToUpload">
             <input type="submit" value="Upload CSV" name="submit"> 
             </form>
             </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
               <tr>
                 <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Title<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Summary <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                <!--  <th>Description</th> -->
                 <!--  <th style="background: #5262bc; color: #ffffff; width:60px;">Link <img src="<?php// echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th> -->
                  <th style="background: #5262bc; color: #ffffff;">Sport <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Location <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>

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
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Edit</th>
                <?php   if($usertype==101)
                   {
                    ?>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Delete</th>
                   <?php }?>
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
            $resources = $this->register->getUserResourceInfo($userid);   
            }
              if(!empty($resources)){
                    foreach($resources as $resource){ ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $resource['title']; ?></td>
                    <td><?php echo substr($resource['summary'],0,170); ?></td>
				          <!-- 	<td><?php //echo substr($resource['description'],0,170); ?></td> -->
                   <!--  <td><?php// echo $resource['url']; ?></td> -->
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
                    <?php } $list=array( 'a' => 0,
                                'b' => 1,
                                'c' => 2,
                                'd' => 3,
                                'e' => 4,
                                'f' => 5,
                                'g' => 6,
                                'h' => 7,
                                'i' => 8,
                                'j' => 9);
                                 $num=$resource['id']; //your value
                                 $temp='';
                                 $arr_num=str_split ($num);
                                foreach($arr_num as $data)
                                {
                                $temp.=array_search($data,$list);
                                }
                                $num=$temp;
                                {  ?>
                    <td><a href = "<?php echo site_url('forms/viewresources/'.$num.'?resources'); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-eye-open"></i></a></td>
                    <td><a href = "<?php echo site_url('forms/editResources/'.$num.'?resources'); ?>" class="btn btn-xs btn-default bs-tooltip"  title="Edit" ><i class="glyphicon glyphicon-edit"></i></a></td>

                     <?php  if($usertype==101)
                   {
                    ?>
                    <td><a href = "<?php echo site_url('forms/deleteResources/'.$num); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-default bs-tooltip" title="delete" ><i class="glyphicon glyphicon-remove"></i></a></td>
                     <?php } }?>
                </tr>
                <?php } } ?>
                </tbody>
                <tfoot>
                 <tr>
                 <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Title</th>
                  <th style="background: #5262bc; color: #ffffff;">Summary</th>
                <!--  <th>Description</th> -->
                  <!-- <th style="background: #5262bc; color: #ffffff;">Link</th> -->
                  <th style="background: #5262bc; color: #ffffff;">Sport</th>
                  <th style="background: #5262bc; color: #ffffff;"">Location</th>
                  <?php
                   if($usertype==101 || $usertype==102 )
                         {
                          ?>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Publish</th>
                  <?php } } ?>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">View</th>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Edit</th>
                   <?php   if($usertype==101)
                   {
                    ?>
                   <th style="width: 40px; background: #5262bc; color: #ffffff;">Delete</th>
                   <?php }?>
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
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>">     </script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>">  </script>
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






