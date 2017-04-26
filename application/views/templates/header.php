<head><script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome.min.css');?>">

<link rel="stylesheet" href="<?php echo base_url('assets/css/loder.css');?>">

<link rel="stylesheet" href="<?php echo base_url('assets/ionicons.min.css');?>">
<script src="<?php echo base_url('assets/plugins/chartjs/Chart.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/morris/morris.min.js')?>"></script>
 <script src="<?php echo base_url('assets/jquery-ui.min.js'); ?>"></script> 
<style type="text/css">
  #example1_filter label{
  float:right!important;
  padding-right:2px;
} 
</style>
</head>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<?php

if($this->session->userdata('item')==''){
  redirect('forms');
}

 ?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('forms/home');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>g</b>s</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Getsporty</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
  
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->

         <?php
          $data=$this->session->userdata('item');
          $id=$data['userid'];

          $module = $this->register->usermoduleData($id);

          foreach ($module as $mod) {
           
               }
           //print_r($mod['name']);die;
          $name=$mod['name'];
          $prof=$mod['prof_name'];
          $image=$mod['user_image'];
        { 
       ?>


          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <?php if($image) { ?>
               <img src="<?php  echo base_url()."uploads/profile/".$image; ?>" class="user-image" alt="User Image">
               <?php } else { 
                  if($mod['gender'] == 'Female') { ?>
                <img src="<?php  echo base_url('img/female.jpg');?>" class="user-image" alt="User Image">
               <?php }
                else
                   {  ?>
                     <img src="<?php  echo base_url('img/user.jpg');?>" class="user-image" alt="User Image">
                    <?php  }  } ?>

              <span class="hidden-xs"><?php echo $name ;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                 <?php if($image) { ?>
                <img src="<?php  echo base_url()."uploads/profile/".$image; ?>" class="img-circle" alt="User Image">
                  <?php } else {
                  if($mod['gender'] == 'Female') { ?>
                <img src="<?php  echo base_url('img/female.jpg');?>" class="user-image" alt="User Image">
               <?php }
                else
                   {  ?>
                     <img src="<?php  echo base_url('img/user.jpg');?>" class="user-image" alt="User Image">
                     
                  <?php } } ?>
                <p>
                 <?php echo $name ;?> - <?php echo $prof ;?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
               <?php }?>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
                 
              <li class="user-footer">
                <div class="pull-left">
                 <a href="<?php echo site_url('forms/edituser')?>" class="btn btn-default btn-flat">Profile</a>                 <!--  <a href="<?php //echo site_url('forms/editContent/'.$contants['id']); ?>" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('forms/signout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

   