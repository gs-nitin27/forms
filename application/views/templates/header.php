<head><script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="<?php echo base_url('assets/jquery-ui.min.js'); ?>"></script></head>
<?php

if($this->session->userdata('item')==''){
  redirect('forms');
}

 ?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('forms/home');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Getsporty</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
  
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->

         <?php
          $data=$this->session->userdata('item');
          $name=$data['name'];
        {  ?>


          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('/assets/dist/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $name ;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('/assets/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $name ;?> - Web Developer
                  <small>Member since Nov. 2012</small>
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

   