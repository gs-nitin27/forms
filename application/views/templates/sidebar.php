<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?php echo site_url('forms/home');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
         <!--  <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>EVENTS</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('forms/createevent'); ?>"><i class="fa fa-circle-o"></i>Create Events</a></li>
            <li><a href="<?php echo site_url('forms/getevent'); ?>"><i class="fa fa-circle-o"></i>View Events</a></li>
            </li>
          </ul>
        </li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Tournaments</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('forms/createtournament');?>"><i class="fa fa-circle-o"></i>Create Tournaments</a></li>
            <li><a href="<?php echo site_url('forms/gettournament');?>"><i class="fa fa-circle-o"></i>View Tournaments</a></li>
          </ul></li>


          <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Job</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('forms/createjob');?>"><i class="fa fa-circle-o"></i>Create Job</a></li>
            <li><a href="<?php echo site_url('forms/getjob');?>"><i class="fa fa-circle-o"></i>View Job</a></li>
          </ul></li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Resources</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('forms/createresources');?>"><i class="fa fa-circle-o"></i>Create Resources</a></li>
            <li><a href="<?php echo site_url('forms/getresources');?>"><i class="fa fa-circle-o"></i>View Resources</a></li>
          </ul></li>
		  
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Content</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('forms/createContent');?>"><i class="fa fa-circle-o"></i>Create Content</a></li>
            <li><a href="<?php echo site_url('forms/getContent');?>"><i class="fa fa-circle-o"></i>List</a></li>
          </ul></li></ul>
		  
		  

    </section>
    <!-- /.sidebar -->
  </aside>