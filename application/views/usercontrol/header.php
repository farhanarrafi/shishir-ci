<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $title;?></title>

    <link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/signin.css" rel="stylesheet">

  </head>
  <body>

  <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>">Shishir : The Online Shop</a>
    </div>
  
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-right navbar-collapse navbar-ex1-collapse ">
      <ul class="nav navbar-nav">
        <?php if($login_action=="Login") { ?>
          <li><a href="<?php echo base_url();?>index.php/usercontrol/user/registration">Registration</a></li>
        <?php } else if($login_action=="Registration"){ ?>
          <li><a href="<?php echo base_url();?>index.php/usercontrol/user/login">Login</a></li>
        <?php } else { ?>
          <li><a href="<?php echo base_url();?>index.php/usercontrol/user/logout">Logout</a></li>
        <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>