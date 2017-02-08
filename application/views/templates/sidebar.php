

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

 <?php
          $data=$this->session->userdata('item');
          $name=$data['name'];
          
        {  
            $id=$data['userid'];
            $module = $this->register->usermoduleData($id);
            foreach ($module as $mod) {
           
               } }?>

 <div class="pull-left image">
          <img src="<?php  echo base_url()."uploads/profile/".$mod['user_image']; ?>" class="" alt="User Image">
        </div>
     
     

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

          //  $string= explode(" ",$str)
         
           ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
                 
        <li class="treeview" id="<?php echo $value->id;?>">
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
            <li><a href="<?php echo site_url($value1->url);?>"  id="<?php echo $value1->id;?>"><i class="fa fa-circle-o text-purple"></i><?php echo $value1->name;?></a></li>
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
$(document).ready(function() {

var url      = window.location.href;
var fields = url.split('?');
var temp = '#'+ fields[1];
$(temp).addClass('active');

//alert(temp);

var pathname = window.location.pathname;
var fields1 = pathname.split('/');
//alert(fields1);
var temp1 = '#' + fields1[4];


$(temp1).css('color', '#ffffff');

});
</script>