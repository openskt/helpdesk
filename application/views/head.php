<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $page_title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- ChartJS 1.0.1 -->
  <script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes)
  <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard2.js"></script> -->
  <!-- AdminLTE for demo purposes
  <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script> -->
  
  </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>HD</b>T</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HD</b>Ticket</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown notifications-menu">
              <a href="/ticket/my_picked">
                <i class="glyphicon glyphicon-send"></i>
                <span class="label label-warning"><?php echo $count_my_pticket; ?></span>
              </a>
            </li>
            <li class="dropdown notifications-menu">
              <a href="/ticket/my_alert">
                <i class="fa fa-bell-o"></i>
                <span class="label label-danger">10</span>
              </a>
            </li>

            <li class="dropdown notifications-menu">
              <a href="ticket/my_active">
                <i class="fa fa-inbox"></i>
                <span class="label label-success">20</span>
              </a>
            </li>


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php
                echo base_url();
                echo $this->session->userdata('picture');
               ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php
                echo $this->session->userdata('fname');
                echo " ";
                echo $this->session->userdata('lname');
              ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php
                    echo base_url();
                  echo $this->session->userdata('picture');
                 ?>" class="img-circle" alt="User Image">

                <p>
                  <?php
                    echo $this->session->userdata('fname');
                    echo " ";
                    echo $this->session->userdata('lname');
                  ?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= site_url('home/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        -->
        </ul>
      </div>

    </nav>
  </header>
