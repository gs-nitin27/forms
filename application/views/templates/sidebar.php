

<?php
$file =base_url('/assets/menu.json');
$data = file_get_contents($file);
$array=json_decode($data);
?>
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">


 

  <!-- <div id="preview" ><img src="<?php //echo base_url('/assets/dist/img/user2-160x160.jpg'); ?>" /></div> -->
    
  <!-- <form id="form" action="#" method="post" enctype="multipart/form-data">
  <input id="uploadImage" type="file" accept="image/*" name="image" />
  <input id="button" type="submit" value="Upload">
  </form>
  <div id="err"></div> -->

  



 <div class="pull-left image">
          <img src="<?php echo base_url('/assets/dist/img/user2-160x160.jpg'); ?>" class="" alt="User Image">
        </div>
      <?php
          $data=$this->session->userdata('item');
          $name=$data['name'];
        {  
            $id=$data['userid'];
            $module = $this->register->usermoduleData($id);
            foreach ($module as $mod) {
           
               } }?>

     

      </div>

      <ul class="sidebar-menu">
      <li class="header">Dashboard</li>
      <?php 
       $module_list = $mod['access_module'];
       $module_no = explode(',', $module_list);
      
     //  $module_no =  explode(',', $mod['access_module'])
      // print_r($module_no);
        foreach ($module_no as $module_id) {
         // echo $module_id."nitin";        
       
        foreach($array as $key => $value){ 
             if($module_id == $key)
             {

          if(isset($value->child)){
           ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
        <li class="treeview">
          <a href="<?php echo $value->url;?>">
            <i class="<?php echo $value->class;?>"></i>
            <span><?php echo $value->name;?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <?php 
        foreach ($value->child as $key => $value1) {?>
            <li><a href="<?php echo site_url($value1->url);?>"><i class="fa fa-circle-o text-purple"></i><?php echo $value1->name;?></a></li>
    <?php  } ?>
          </ul>
        </li>
        
       <?php }  
  }
 }
}?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <script>

$(document).ready(function (e) {
  $("#form").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
          url: "<?php echo site_url('forms/profileimage')?>",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      beforeSend : function()
      {
        //$("#preview").fadeOut();
        $("#err").fadeOut();
      },
      success: function(data)
        {
        if(data=='invalid')
        {
          // invalid file format.
          $("#err").html("Invalid File !").fadeIn();
        }
        else
        {
          // view uploaded file.
          $("#preview").html(data).fadeIn();
          $("#form")[0].reset();  
        }
        },
        error: function(e) 
        {
        $("#err").html(e).fadeIn();
        }           
     });
  }));
});


</script>