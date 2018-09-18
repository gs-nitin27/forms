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
              <h3 class="box-title"><b>Advertisement List</b></h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px; background: #5262bc; color: #ffffff;">#<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Title<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">App<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Image<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff;">Status<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                  <th style="background: #5262bc; color: #ffffff; min-width:7%">User<img src="<?php echo base_url('img/sort.png')?>" alt="" height="10px" width="10px"></img></th>
                  <?php
                 $data=$this->session->userdata('item');
                 $usertype=$data['userType']; 
                 {
                 if($usertype==101 || $usertype==102 )
                   {
                    ?>
                   <th style="width: 40px; background: #5262bc; color: #ffffff;">Publish<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
                    <?php } else {?>
                   <th style="width: 40px; background: #5262bc; color: #ffffff;">Activate<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
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
            $events = $this->register->get_advertisement_listing();

            //$user_type = $user_type->usertype;
            //print_r($events);die;
         }
        else
         {      
            $data=$this->session->userdata('item');
            $userid=$data['userid']; 
            $events = $this->register->getAdvertismentInfo($userid);
         }
				if(!empty($events)){
						foreach($events as $event)
                                      { $module = ($event['module_data']);
                                         if ($this->register->isJSON($module)) 
                                            { 
                                              $module = json_decode($module);
                                              $user_type = $module->usertype;
                                            }
                                            else
                                            {
                                              $user_type = '';	
                                            }
                                      	     
         ?>
        <tr>
		  <td><?php echo $i++; ?></td> 
		  <td><?php echo $event['title']; ?></td>
		  <td><?php echo $event['app_type']; ?></td>
          <td>
                        <?php if($event['image']){?>

                      <ul class="enlarge">
                     <li><img src="<?php echo $event['image'] ;?>" width="50px" height="50px" alt="Dechairs" /><span><img src="<?php echo $event['image']; ?>" width="450px" height="400px" alt="Deckchairs" /></span></li>
                      </ul>
                    <?php } else { ?>
                     <img style="width: 50px;height: 50px; border: 2px solid red; margin-left: 39%; " src="<?php echo base_url('img/no-image.jpg');?>">
                     <?php }?>
                    </td>
                    <td>
          <?php if(@strtotime($event['end_date']) >= strtotime(date('m/d/Y',  time()))){ $active = 1;?>
          <span class="badge bg-green"><?php echo "Active";?></span>
          <?php }else{ $active=0;?> 
           <span class="badge bg-red"><?php echo "Expired";?></span>
          <?php } ?>
          </td>
					<td><?php echo $user_type; ?></td>
				<?php
           if($usertype==101 || $usertype==102 )
            {
            ?>
          <td>
          <?php if($event['active_status'] ==0){?>
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
                                 $arr_num=str_split($num);
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
               <td><a href = "<?php echo site_url('forms/delete_Ad/'.$num.'?event'); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-default bs-tooltip" title="delete" ><i class="glyphicon glyphicon-remove"></i></a></td>
              
                    <?php } }?>


                </tr>
		
    <?php } } ?>


                </tbody>
                <tfoot>
                 <tr>
                  <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Title</th>
                  <th style="background: #5262bc; color: #ffffff;">App</th>
                  <th style="background: #5262bc; color: #ffffff;">Image</th>
                  <th style="background: #5262bc; color: #ffffff;">Status</th>
                  <th style="background: #5262bc; color: #ffffff; width: 70px;">User<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
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
    url: '<?php echo site_url('forms/StatusAd'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
    //  alert(result);
      window.location.href = url+"/forms/load_ad_list_view";

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
  $(document).ready(function(){
    var active = '<?php echo $active; ?>';
  });
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

  <style type="text/css" media="screen">
    ul.enlarge{
    list-style-type:none; /*remove the bullet point*/
    margin-left:0;
    }
    ul.enlarge li{
    display:inline-block; /*places the images in a line*/
    position: relative;
    z-index: 0; /*resets the stack order of the list items - later we'll increase this*/
    margin:10px 40px 0 20px;
    }
    ul.enlarge img{
    background-color:#eae9d4;
    padding: 6px;
    -webkit-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
    -moz-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
    box-shadow: 0 0 6px rgba(132, 132, 132, .75);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    }
    ul.enlarge span{
    position:absolute;
    left: -9999px;
    background-color:#eae9d4;
    padding: 10px;
    font-family: 'Droid Sans', sans-serif;
    font-size:.9em;
    text-align: center;
    color: #495a62;
    -webkit-box-shadow: 0 0 20px rgba(0,0,0, .75));
    -moz-box-shadow: 0 0 20px rgba(0,0,0, .75);
    box-shadow: 0 0 20px rgba(0,0,0, .75);
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius:8px;
    }
    ul.enlarge li:hover{
    z-index: 50;
    cursor:pointer;
    }
    ul.enlarge span img{
    padding:2px;
    background:#ccc;
    }
    ul.enlarge li:hover span{
    top: -200px; /*the distance from the bottom of the thumbnail to the top of the popup image*/
    left: -20px; /*distance from the left of the thumbnail to the left of the popup image*/
    }
    ul.enlarge li:hover:nth-child(2) span{
    left: -100px;
    }
    ul.enlarge li:hover:nth-child(3) span{
    left: -200px;
    }
    /**IE Hacks - see http://css3pie.com/ for more info on how to use CS3Pie and to download the latest version**/
    ul.enlarge img, ul.enlarge span{
    behavior: url(pie/PIE.htc);
    }
    </style>
