<?php
  global $CI;   //Global Variable for the Selected Tabing 
?>

<!doctype html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title><?php echo $page_title ; ?></title>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo base_url(); ?>">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">

    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <script>
      less = {
        env: "development",
        relativeUrls: false,
        rootpath: "../assets/"
      };
    </script>
    <link rel="stylesheet" href="assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.2.0/less.min.js"></script>

    <!--Modernizr-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!--jQuery -->
    <script src="assets/js/jquery.min.js"></script>

  </head>
  <body class="  ">
  <div class="bg-dark dk" id="wrap">
      <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
              <a href="index.html" class="navbar-brand">
                <img src="assets/img/logo.jpg" alt="" height="50px">
              </a> 
            </header>
            <div class="topnav">

              <div class="btn-group">
                <a href="javascript:;" onclick="window.location='<?php echo base_url(); ?>?loggedout=true'" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                  <i class="fa fa-power-off"></i>
                </a> 
              </div>

            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">

              <!-- .nav -->
              <ul class="nav navbar-nav">
                <li class="dashboard">
                  <a href="<?php echo base_url(); ?>dashboard">Dashboard</a> 
                </li>
                <li class="customer dropdown"> 
                  <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    Orders 
                    <b class="caret"></b> 
                  </a>
                  <ul class="dropdown-menu">
                    <li> <a href="<?php echo base_url(); ?>customer">All Orders</a>  </li>
                    <li> <a href="<?php echo base_url(); ?>customer/?s=uncompleted">Uncompleted Orders</a>  </li>
                  </ul>  
                </li>

              </ul><!-- /.nav -->
            </div>
          </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->
      <header class="head">
        <div class="main-bar">
          <h3>
	          <?php 
	          	$tab= $CI->router->class; 
	          	if(!empty($tab) && $tab=='dashboard'){ 
	          		$fa='dashboard'; 
	          	}else { $fa='table'; }
	          ?>
            <i class="fa fa-<?php echo $fa; ?>"></i>&nbsp; <?php echo $page_title ; ?></h3>
        </div><!-- /.main-bar -->
      </header><!-- /.head -->
    </div><!-- /#top -->
