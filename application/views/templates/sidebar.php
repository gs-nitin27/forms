
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
        <div class="pull-left image">
          <img src="<?php echo base_url('/assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
        </div>

       <?php
          $data=$this->session->userdata('item');
          $name=$data['name'];
        {  ?>
       <div class="pull-left info">
          <p> <?php echo $name ;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        <?php
            $id=$data['userid'];
            $module = $this->register->usermoduleData($id);
            foreach ($module as $mod) {
           
               } }?>
      </div>
     
    <ul class="sidebar-menu">
        <li class="active treeview">
          <a href="<?php echo site_url('forms/home');?>">
            <i class="fa fa-dashboard"></i> <span><b>Dashboard</b></span>
          </a>
         
        </li>
    </ul>
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
            <li class="treeview">
            <a href="<?php echo $value->url;?>">
            <i class="glyphicon glyphicon-chevron-down"></i>
            <span><?php echo $value->name;?></span>
            <span class="pull-right-container">
            <!-- <span class="label label-primary pull-right">4</span> -->
            </span>
          </a>
      
        <ul id="<?php echo $value->url ?>" class="treeview-menu parent">
        <?php 
      foreach ($value->child as $key => $value1) {?>
        <li><a href="<?php echo site_url($value1->url);?>">
            <i class="glyphicon glyphicon-menu-right"></i>
            <span><b><?php echo $value1->name;?></b></span>
          </a></li>
          
      <?php  } ?></ul></li>
    <?php }  
  }
 }
}?>
       <!-- <ul class="treeview-menu">
       <li><a href="<?php //echo site_url($value4->url);?>">
            <i class="glyphicon glyphicon-menu-right"></i>
            <span><b><?php //echo $value->name;?></b></span>
          </a></li>  </ul>
          </li>
       -->
    <!--   <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?php //echo site_url('forms/home');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
         
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-chevron-down"></i>
            <span>EVENT</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="<?php //echo site_url('forms/createevent'); ?>"><i class="glyphicon glyphicon-menu-right"></i>Create Events</a></li>
            <li><a href="<?php //echo site_url('forms/getevent'); ?>"><i class="glyphicon glyphicon-menu-right"></i>View Events</a></li>
            </li>
          </ul>
        </li>
      <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-chevron-down"></i>
            <span>Tournaments</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php //echo site_url('forms/createtournament');?>"><i class="glyphicon glyphicon-menu-right"></i>Create Tournaments</a></li>
            <li><a href="<?php// echo site_url('forms/gettournament');?>"><i class="glyphicon glyphicon-menu-right"></i>View Tournaments</a></li>
          </ul></li>


          <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-chevron-down"></i>
            <span>Job</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php //echo site_url('forms/createjob');?>"><i class="glyphicon glyphicon-menu-right"></i>Create Job</a></li>
            <li><a href="<?php //echo site_url('forms/getjob');?>"><i class="glyphicon glyphicon-menu-right"></i>View Job</a></li>
          </ul></li>

          <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-chevron-down"></i>
            <span>Resources</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php //echo site_url('forms/createresources');?>"><i class="glyphicon glyphicon-menu-right"></i>Create Resources</a></li>
            <li><a href="<?php //echo site_url('forms/getresources');?>"><i class="glyphicon glyphicon-menu-right"></i>View Resources</a></li>
          </ul></li>
      
      <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-chevron-down"></i>
            <span>Content</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php //echo site_url('forms/createContent');?>"><i class="glyphicon glyphicon-menu-right"></i>Create Content</a></li>
            <li><a href="<?php // echo site_url('forms/getContent');?>"><i class="glyphicon glyphicon-menu-right"></i>List</a></li>
          </ul></li>

           <li class="treeview">
          <a href="<?php //echo site_url('forms/usermodule')?>">
            <i class="glyphicon glyphicon-menu-right"></i>
            <span>User Role Management</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>

            

          </li>
          </ul>
       -->
      

    </section>
    <!-- /.sidebar -->
  </aside>