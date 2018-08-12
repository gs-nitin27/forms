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
              <h3 class="box-title"><b>Academy List</b></h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px; background: #5262bc; color: #ffffff;">#<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Name <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Location<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Image<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff; min-width:7%">Sport <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff; min-width: 8%;">Type<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <?php
                 $data=$this->session->userdata('item');
                 $usertype=$data['userType']; 
                 {
                 if($usertype==101 || $usertype==102 )
                   {
                    ?>
                   <th style="width: 40px; background: #5262bc; color: #ffffff;">Publish <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                    <?php } else {?>
                   <th style="width: 40px; background: #5262bc; color: #ffffff;">Activate <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                   <?php } ?>
                  <!-- <th style="width: 40px; background: #5262bc; color: #ffffff;">View</th> -->
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Edit</th>
                <?php  if($usertype==101)
                   {
                    ?>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Delete</th>
                  <?php } ?>
                </tr>
                </thead>
				<tbody>
        <?php 
        $i =1;
        if($usertype==101 || $usertype==102 )
         {
            $events = $this->register->get_academy_listing();
         }
        else
         {      
            $data=$this->session->userdata('item');
            $userid=$data['userid']; 
            $events = $this->register->getUserEventInfo($userid);
         }
				if(!empty($events)){
						foreach($events as $event)
        { 
         ?>
        <tr>
				  <td><?php echo $i++; ?></td> 
					<td><?php echo $event['name']; ?></td>
					<td><?php echo $event['location']; ?></td>
          <td>
                        <?php if($event['image']){?>

                      <ul class="enlarge">
                     <li><img src="<?php echo base_url().'uploads/property/'.$event['image'] ;?>" width="50px" height="50px" alt="Dechairs" /><span><img src="<?php echo base_url().'uploads/property/'.$event['image'] ;?>" width="450px" height="400px" alt="Deckchairs" /></span></li>
                    </ul>
                    <?php } else { ?>
                     <img style="width: 50px;height: 50px; border: 2px solid red; margin-left: 39%; " src="<?php echo base_url('img/no-image.jpg');?>">
                     <?php }?>
                    </td>
					<td><?php echo $event['sports']; ?></td>
					<td><?php echo $event['type']; ?></td>
				<?php
           if($usertype==101 || $usertype==102 )
            {
            ?>
          <td>
          <?php if($event['status'] ==0){?>
          <button class="badge bg-red" onclick="myfunction(<?php echo $event['id'];?>,1)"><?php echo "Activate";?>
          </button>
          <?php }else{?> 
          <button class="badge bg-green" onclick="myfunction(<?php echo $event['id'];?>,0)"><?php echo "Deactivate";?></button>
          <?php } ?>
          </td>
  <?php } else
  {
  ?>
   <td>
     <?php if($event['status'] == 0){?>
          <button class="badge bg-red" onclick="myfunction(<?php echo $event['id'];?>,1)"><?php echo "Activate";?>
          </button>
          <?php }else{?> 
          <button class="badge bg-green" onclick="myfunction(<?php echo $event['id'];?>,0)"><?php echo "Deactivate";?></button>
          <?php } ?>
          </td>
<?php  }
                    $list=array('a' => 0,
                                'b' => 1,
                                'c' => 2,
                                'd' => 3,
                                'e' => 4,
                                'f' => 5,
                                'g' => 6,
                                'h' => 7,
                                'i' => 8,
                                'j' => 9);
                                 $num=$event['id']; //your value
                                 $temp='';
                                 $arr_num=str_split ($num);
                                foreach($arr_num as $data)
                                {
                                $temp.=array_search($data,$list);
                                }
                                $num=$temp;
                                {  ?>
				      	<!-- <td><a href = "<?php //echo site_url('forms/viewevent/'.$num.'?event'); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-eye-open"></i></a></td> -->
               
                 <td><a href = "<?php echo site_url('forms/editProperty/'.$num.'?event'); ?>" class="btn btn-xs btn-default bs-tooltip"  title="Edit" ><i class="glyphicon glyphicon-edit"></i></a></td>

                  <?php  if($usertype==101)
                   {
                    ?>
                <td><a href = "<?php echo site_url('forms/deleteProperty/'.$num.'?event'); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-default bs-tooltip" title="delete" ><i class="glyphicon glyphicon-remove"></i></a></td>
              
                    <?php } }?>


                </tr>
		
    <?php } } ?>


                </tbody>
                <tfoot>
                 <tr>
                  <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Name</th>
                  <th style="background: #5262bc; color: #ffffff;">Location</th>
                  <th style="background: #5262bc; color: #ffffff; width: 70px;">Image <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Sports</th>
                  <th style="background: #5262bc; color: #ffffff;">type</th>
                <?php 
                    if($usertype==101 || $usertype==102 )
                   {
                    ?>
                   <th style="width: 40px; background: #5262bc; color: #ffffff;">Publish</th>
                 <?php } else{ ?>
                    
                    <th style="width: 40px; background: #5262bc; color: #ffffff;">Acivate</th>
              
                  <?php
                  } }?>

                 <!--  <th style="width: 40px; background: #5262bc; color: #ffffff;">View</th> -->
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Edit</th>
                  <?php  if($usertype==101)
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
    url: '<?php echo site_url('forms/StatusProperty'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
    //  alert(result);
      window.location.href = url+"/forms/getPropListView";

    }
});    
}

 
</script>

