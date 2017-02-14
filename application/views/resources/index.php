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
<div class="container">
    <div class="row">
       <!--  <label class="col-md-3 text-right" style="line-height: 2.5em;">License Or Certificate</label> -->
        <div class="col-xs-12 col-md-4 " style=" margin-left: -1%; position: relative; top:-137%;">  
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" placeholder="Upload CSV File" > <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                     <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Choose File</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                    </div>
                   <input type="submit" class="btn btn-primary" value="Upload CSV" name="submit"> 
                </span>
                
            </div>
            
        </div>
       
    </div>
    </div>





             <!--  <div style="margin-left: 78%; margin-top: -4%;">    
              <label  for="fileToUpload" class="custom-file-upload">
              <i class="fa fa-cloud-upload"></i> Select CSV
              </label>
              <input id="fileToUpload" name="fileToUpload" type="file"/>
              </div> -->
              <!-- </div> -->
             <!--  Select CSV file :
             <input type="file" name="fileToUpload" id="fileToUpload"> -->
             <!-- <div style="margin-left: 90%; margin-top: -4%;">
             <input type="submit" class="btn btn-primary" value="Upload CSV" name="submit"> 
              </div> -->
             </form>
           <!--  </div> -->
             </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
               <tr>
                 <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Title<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff; width: 70px;">Image <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                <!--  <th>Description</th> -->
                 <!--  <th style="background: #5262bc; color: #ffffff; width:60px;">Link <img src="<?php// echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th> -->
                  <th style="background: #5262bc; color: #ffffff;">Topic of article <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
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
                    <td><?php echo $resource['title']; ?>
                      <input type="hidden"  id="<?php echo $resource['id'];?>" value="<?php echo $resource['image']?>" >

                    </td>
                    <td>
                        <?php if($resource['image']){?>
                      <img style="width: 50px;height: 50px; border: 2px solid #5262bc;" src="<?php echo base_url().'uploads/resources/'.$resource['image'] ;?>">
                    <?php } else { ?>
                     <img style="width: 50px;height: 50px; border: 2px solid red; " src="<?php echo base_url('img/no-image.jpg');?>">
                     <?php }?>


                    </td>
				          <!-- 	<td><?php //echo substr($resource['description'],0,170); ?></td> -->
                   <!--  <td><?php// echo $resource['url']; ?></td> -->
                    <td><?php echo $resource['topic_of_artical']; ?></td>
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
                  <th style="background: #5262bc; color: #ffffff; width: 70px;">Image</th>
                <!--  <th>Description</th> -->
                  <!-- <th style="background: #5262bc; color: #ffffff;">Link</th> -->
                  <th style="background: #5262bc; color: #ffffff;">Topic of article</th>
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

   var imageid = '#' + id;
    if($(imageid).val() == "")
    {
      alert("Please Upload Image for Activate");
    }
  else{

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

        //alert(img);
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
        }        
        reader.readAsDataURL(file);
    });  
});
  </script>







