
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
         <section class="content"> 
      <div class="row">
	  
		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tournament List</h3></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Tournament Name</th>
                  <th>Sport</th>
                  <th>Level</th>
                  <th>Category</th>
                  <th>Location</th>
                  <th>Organiser</th>
                  <th style="width: 40px">Status</th>
                  <th style="width: 40px">Publish</th>
                  <th style="width: 40px">View</th>
                </tr>
				<?php $i =1;
				$tournaments = $this->register->getTournamentInfo();

          

				if(!empty($tournaments)){
						foreach($tournaments as $tournament){
             ?>
                <tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $tournament['name']; ?></td>
					<td><?php echo $tournament['sports']; ?></td>
					<td><?php echo $tournament['level']; ?></td>
					<td><?php echo $tournament['category']; ?></td>
					<td><?php echo $tournament['city_name']; ?></td>
					<td><?php echo $tournament['organiser_name']; ?></td>
					
					
					<td>
					<?php if(@strtotime($tournament['end_date']) < time()){?>
						<span class="badge bg-red"><?php echo "Expired";?></span>
					<?php }else{?> 
					<span class="badge bg-green"><?php echo "Active";?></span>
					<?php } ?>
					</td>

          <td>
          <?php if($tournament['publish']==0){?>
          <button class="badge bg-red" onclick="myfunction(<?php echo $tournament['infoId'];?>,1)"><?php echo "Activate";?></button>
          <?php }else{?> 
          <button class="badge bg-green" onclick="myfunction(<?php echo $tournament['infoId'];?>,0)"><?php echo "Deactivate";?></button>
          <?php } ?>
          </td>


					<td><a href = "<?php echo site_url('forms/viewtournament/'.$tournament['infoId']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-eye-open"></i></a></td>
                </tr>
				<?php } } ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <!--div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div-->
          </div>
	  
</div>
</section>
</div>

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
      window.location.href = url+"/forms/gettournament";

    }
});    
}

 
</script>

