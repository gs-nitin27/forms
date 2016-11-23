
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
         <section class="content"> 
      <div class="row">
	  
		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List</h3></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  
                  <th>Link</th>
                  <th>Content</th>
                  <th style="width: 40px">Publish</th>
                  <th style="width: 40px">Edit</th>
                </tr>
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
              </tbody></table>
            </div>
            
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
    url: '<?php echo site_url('forms/StatusContent'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
      window.location.href = url+"/forms/getContent";

    }
});    
}
</script>

