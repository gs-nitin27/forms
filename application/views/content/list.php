
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
                  <th style="width: 40px">Action</th>
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
					<td><a href = "<?php echo site_url('forms/viewcontent/'.$contants['id']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="fa fa-search"></i></a></td>
                </tr>
				<?php } } ?>
              </tbody></table>
            </div>
            
          </div>
	  
</div>
</section>
</div>



