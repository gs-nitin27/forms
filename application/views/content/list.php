
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
              <h3 class="box-title"><b>Content List</b></h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Title <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Link <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Content <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>

              <?php        
                 $data=$this->session->userdata('item');
              //   print_r($data);//die;
                 $usertype=$data['userType']; 
                 {
                  if($usertype==101 || $usertype==102 )
                   {
                    ?>
                  <th style="background: #5262bc; color: #ffffff;">Publish <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                   <?php }?>

				          <th style="width: 10px; background: #5262bc; color: #ffffff;">Edit</th>
                </tr>
                </thead>
                <tbody>
          <?php 
          $i =1;


      if($usertype==101 || $usertype==102 )
        {
              $content = $this->register->getContentInfo();
        }
        else
        {     
            $data=$this->session->userdata('item');
            $userid=$data['userid']; 
           // $content = $this->register->getContentInfo();
            $content = $this->register->getUserContentInfo($userid);
        }

				  if(!empty($content)){
						foreach($content as $contants){ ?>
          <tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $contants['title']; ?></td>
					<td><?php echo $contants['url']; ?></td>
					<td><?php echo $contants['content']; ?></td>

          <?php
             if($usertype==101 || $usertype==102 )
                   {
                    ?>
          <td>
          <?php if($contants['publish']==0){?>
          <button class="badge bg-red" onclick="myfunction(<?php echo $contants['id'];?>,1)"><?php echo "Activate";?></button>
          <?php }else{?> 
          <button class="badge bg-green" onclick="myfunction(<?php echo $contants['id'];?>,0)"><?php echo "Deactivate";?></button>
          <?php } ?>
          </td>
            <?php } 
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
                                 $num=$contants['id']; //your value
                                 $temp='';
                                 $arr_num=str_split ($num);
                                foreach($arr_num as $data)
                                {
                                $temp.=array_search($data,$list);
                                }
                                $num=$temp;
                                { ?> 
		  <td><a href = "<?php echo site_url('forms/editContent/'.$num.'?Content'); ?>" class="btn btn-xs btn-default bs-tooltip"  title="Edit" ><i class="glyphicon glyphicon-edit"></i></a></td>
                </tr>
		  <?php } } } ?>
                </tbody>
                <tfoot>
               <tr>
                  <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Title</th>
                  <th style="background: #5262bc; color: #ffffff;">Link</th>
                  <th style="background: #5262bc; color: #ffffff;">Content</th>

                  <?php
             if($usertype==101 || $usertype==102 )
                   {
                    ?>
                  <th style="background: #5262bc; color: #ffffff;">Publish</th>

                    <?php } }?>
                  <th style="width: 10px; background: #5262bc; color: #ffffff;">Edit</th>
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
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>

<!-- page script -->
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
    url: '<?php echo site_url('forms/StatusContent'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
      window.location.href = url+"/forms/getContent?Content";

    }
});    
}
</script>

