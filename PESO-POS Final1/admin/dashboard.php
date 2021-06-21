<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

  <title>PESO-POS | <?php echo $_SESSION['name']; ?></title>
    <link rel="icon" href="../img/PESO_logo.png">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap-3.3.7/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/assets/js/ie-emulation-modes-warning.js"></script>

     <link href="css/carousel.css" rel="stylesheet">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">

              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand" href="#"><span><b>PESO </b><img src="../img/PESO_logo.png" width="25px"> POS</span>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="../index.php">Home</a>
                <li><a href="../jobs.php">Jobs</a></li>
                <li><a href="../announcement.php">Announcement</a></li>

                 <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company']) && empty($_SESSION['id_admin'])) { ?>

                <!--<li><a href="sign-up.php">Sign Up</a></li>-->


                <li>
                  <a href="login.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="register-candidates.php">Register as Job Seeker</a></li>
                    <li><a href="register-company.php">Register as Employer</a></li>
                  </ul>
                </li>

                <li>
                  <a href="login.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="login-candidates.php">Log-in as Job Seeker</a></li>
                    <li><a href="login-company.php">Log-in as Employer</a></li>
                  </ul>
                </li>

                <?php } else { 

                if(isset($_SESSION['id_user'])) { 

                ?>

                  <a href="./index.php"><?php echo $_SESSION['name']; ?></a>
                </li>
                <?php
                } else if(isset($_SESSION['id_company'])) { 
                ?>        
                <li>
                  <a href="company/index.php"><?php echo $_SESSION['name']; ?></a>
                </li>
                <?php
                } else if(isset($_SESSION['id_admin'])) { 
                ?>
                 <li class="active">
                  <a href="dashboard.php">Admin</a>
                </li>
                <?php } ?>

                <li>
                  <a href="../logout.php">Logout</a>
                </li>
                <?php } ?>

              </ul>

            </div>
          </div>
        </nav>

      </div>
    </div>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;padding-top: 80px">

    <section id="candidates" class="content-header">
      <div class="container" style="min-height: 600px">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b>Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Active Jobs</a></li>
                  <li><a href="applications.php"><i class="fa fa-address-card-o"></i> Job Seekers</a></li>
                  <li><a href="companies.php"><i class="fa fa-building"></i> Employers</a></li>
                  <li><a href="adminpost.php"><i class="fa fa-file"></i> Create Post</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

            <h3>PESO-POS Statistics</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-red"><i class="ion ion-briefcase"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Active Employer Registered</span>
                    <?php
                      $sql = "SELECT * FROM company WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>                
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-red"><i class="ion ion-briefcase"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Pending Employer Approval</span>
                    <?php
                      $sql = "SELECT * FROM company WHERE active='2'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                    
                  </div>
                </div>                
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Registered Job Seeker</span>
                    <?php
                      $sql = "SELECT * FROM users WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Pending Job Seeker Confirmation</span>
                    <?php
                      $sql = "SELECT * FROM users WHERE active='0'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-aqua"><i class="ion ion-person-add"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Job Posts</span>
                    <?php
                      $sql = "SELECT * FROM job_post";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-yellow"><i class="ion ion-ios-browsers"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Applications</span>
                    <?php
                      $sql = "SELECT * FROM apply_job_post";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
                <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-blue"><i class="ion ion-ios-browsers"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Hired</span>
                    <?php
                      $sql = "SELECT * FROM apply_job_post WHERE status=5";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

        <footer class="main-footer bg-black" style="margin-left: 0px;position: absolute;width: 100%">
    <div class="text-center">
      <strong>Copyright &copy; 2018-2019 <a href="#">PESO-POS</a>.</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
