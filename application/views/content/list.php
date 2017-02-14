
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
            <!-- /.box-header -->

   <!--  <div class="container">
    <div class="row">    
        <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled">  -->
                  <!-- don't give a name === doesn't send on POST/GET -->
               <!--  <span class="input-group-btn"> -->
                    <!-- image-preview-clear button -->
                    <!-- <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button> -->
                    <!-- image-preview-input -->
                   <!--  <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/>
                         -->
                         <!-- rename it -->
                   <!--  </div>
                     <input type="submit" class="btn btn-primary" value="Upload CSV" name="submit">
                </span> -->
            <!-- </div> --><!-- /input-group image-preview [TO HERE]--> 
        <!-- </div>
    </div>
</div>
 -->
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
      window.location.href = url+"/forms/getContent";

    }
});    
}
</script>

<style>
  .container{
    margin-top:20px;
}
.image-preview-input {
     position: relative;
     overflow: hidden;
     margin: 0px;    
     color: #333;
     background-color: #fff;
     border-color: #ccc;    
}
.image-preview-input input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
  </style>
  
  <script type="text/javascript">
    $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      

      //  alert(img[1]);
        var file = this.files[0];

       
        var reader = new FileReader();

        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);  
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
  </script>

 