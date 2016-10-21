
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
         <section class="content"> 
      <div class="row">
      
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Resource List</h3></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Summary</th>
                  <th>Link</th>
                  <th>Keyword</th>
                  <th>Sport</th>
                  <th>Location</th>
                  <th>Topic</th>
                  <th style="width: 40px">View</th>
                  <th style="width: 40px">Edit</th>
                </tr>
                <?php $i =1;
                $resources = $this->register->getResourceInfo();
                if(!empty($resources)){
                        foreach($resources as $resource){ ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $resource['title']; ?></td>
                    <td><?php echo word_limiter($resource['summary'], 5); ?></td>
                    <td><?php echo word_limiter($resource['description'], 5); ?></td>
                    <td><?php echo $resource['url']; ?></td>
                    <td><?php echo $resource['keyword']; ?></td>
                    <td><?php echo $resource['sport']; ?></td>
                    <td><?php echo $resource['location']; ?></td>
                     <td><?php echo $resource['topic_of_artical']; ?></td>
                    <td><a href = "<?php echo site_url('forms/viewresources/'.$resource['id']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-eye-open"></i></a></td>
                    <td><a href = "<?php echo site_url('forms/editResources/'.$resource['id']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-edit"></i></a></td>
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



