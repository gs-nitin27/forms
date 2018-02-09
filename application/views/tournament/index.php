<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  
</head>
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="text-align: center;">
            <h3 class="box-title"><b> Tournament List</b></h3>
            </div>
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                  <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Tournament Name <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Sport <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Level <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <!-- <th style="background: #5262bc; color: #ffffff;">Category <img src="<?php// echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th> -->
                  <th style="background: #5262bc; color: #ffffff;">Location <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Organiser <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Status <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>

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
                   <?php  if($usertype==101)
                   {
                    ?>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Delete</th>
                    <?php }?>
                </tr>
              </thead>
			      	<tbody>
              <?php 
              $i =1;
             if($usertype==101 || $usertype==102 )
               {
                   $tournaments = $this->register->getTournamentInfo();
               }
             else
              {
                $data=$this->session->userdata('item');
                $userid=$data['userid']; 
                $tournaments = $this->register->getUserTournamentInfo($userid);
               }

				       
		        		if(!empty($tournaments)){
				    		foreach($tournaments as $tournament){
                ?>
          <tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $tournament['name']; ?></td>
					<td><?php echo $tournament['sport']; ?></td>
					<td><?php echo $tournament['level']; ?></td>
					<!-- <td><?php //echo $tournament['category']; ?></td> -->
					<td><?php echo $tournament['location']; ?></td>
					<td><?php echo $tournament['organiser_name']; ?></td>										
					<td>
					<?php if(@strtotime($tournament['end_date']) < time()){?>
						<span class="badge bg-red"><?php echo "Expired";?></span>
					<?php }else{?> 
					<span class="badge bg-green"><?php echo "Active";?></span>
					<?php } ?>
					</td>
           <?php
             if($usertype==101 || $usertype==102 )
                   {
                    ?>
          <td>
          <?php if($tournament['publish']==0){?>
          <button class="badge bg-red" onclick="myfunction(<?php echo $tournament['id'];?>,1)"><?php echo "Activate";?></button>
          <?php }else{?> 
          <button class="badge bg-green" onclick="myfunction(<?php echo $tournament['id'];?>,0)"><?php echo "Deactivate";?></button>
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
                                 $num=$tournament['id']; //your value
                                 $temp='';
                                 $arr_num=str_split ($num);
                                foreach($arr_num as $data)
                                {
                                $temp.=array_search($data,$list);
                                }
                                $num=$temp;
                                {  ?>
					<td><a href = "<?php echo site_url('forms/viewtournament/'.$num.'?tournament'); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-eye-open"></i></a></td>
          <td><a href = "<?php echo site_url('forms/edittournament/'.$num.'?tournament'); ?>" class="btn btn-xs btn-default bs-tooltip"  title="Edit" ><i class="glyphicon glyphicon-edit"></i></a></td>
 
 <?php  if($usertype==101)
                   {
                    ?>

                <td><a href = "<?php echo site_url('forms/deleteTournament/'.$num.'?tournament'); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-default bs-tooltip" title="delete" ><i class="glyphicon glyphicon-remove"></i></a></td>

 <?php } }?>


                </tr>

				 <?php } } ?>
        
                </tbody>
                <tfoot>
                  <tr>
                  <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Tournament Name</th>
                  <th style="background: #5262bc; color: #ffffff;">Sport</th>
                  <th style="background: #5262bc; color: #ffffff;">Level</th>
                  <!-- <th style="background: #5262bc; color: #ffffff;">Category</th> -->
                  <th style="background: #5262bc; color: #ffffff;">Location</th>
                  <th style="background: #5262bc; color: #ffffff;">Organiser</th>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Status</th>

                    <?php
            if($usertype==101 || $usertype==102 )
                   {
                    ?>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">Publish</th>
                   <?php } }?>
                  <th style="width: 40px; background: #5262bc; color: #ffffff;">View</th>

                  <th style="background: #5262bc; color: #ffffff;">Edit</th>
                    <?php  if($usertype==101)
                   {
                    ?>
                  <th style="background: #5262bc; color: #ffffff;">Delete</th>
                  <?php } ?>
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
    url: '<?php echo site_url('forms/StatusTournament'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
      window.location.href = url+"/forms/gettournament?tournament";

    }
});    
}

 
</script>

