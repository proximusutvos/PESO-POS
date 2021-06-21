<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
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

  <title>PESO-POS | Profile</title>
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

                 <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

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
                          <li class="active">
                  <a href="./index.php"><?php echo $_SESSION['name']; ?></a>
                </li>
                <?php
                } else if(isset($_SESSION['id_company'])) { 
                ?>        
                <li class="active">
                  <a href="./index.php"><?php echo $_SESSION['name']; ?></a>
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
  <div class="content-wrapper" style="margin-left: 0px;padding-top: 80px; padding-bottom: 50px">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">

              <!-- Profile Picture ko -->

                <div class="thumbnail box-header"><center>
                <?php
                $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                ?>
                    <?php if($row['logo'] != "") { ?>
                  <img alt="Logo" src="../uploads/logo/<?php echo $row['logo']; ?>" class="img-responsive" style="max-height: 200px; border-radius: 5%">
                    <div class="text-center">
                     <h4><b><?php echo $_SESSION['name']; ?></b></h4>
                   
                    </div>
                    <?php } ?>                    
                    <?php
                    }
                  }
                ?>  
                </div>
                <!-- Profile Picture ko -->
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li class="active"><a href="edit-company.php"><i class="fa fa-tv"></i> Profile</a></li>
                  <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Job Post</a></li>
                  <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Job Post</a></li>
                  <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Job Application</a></li>
                  <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>

                  <li><a href="resume-database.php"><i class="fa fa-user"></i> Applicant Database</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Employer Profile</i></h2>
            <form action="update-company.php" method="post" enctype="multipart/form-data">
                <?php
                $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                ?>
            <p>In this section you can change your Employer details</p>
            


              <div class="panel-group" id="accordion">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                  Account and Contact Details</a>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="form-group col-md-6">
                     <label>Contact Person:</label>
                    <input type="text" class="form-control input-sm" name="name" value="<?php echo $row['name']; ?>" required="">
                  </div>

                 <div class="form-group col-md-6">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control input-sm" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                  </div>


                  <div class="form-group col-md-6">
                    <label for="phoneno">Phone No.:</label>
                    <input type="text" class="form-control input-sm" id="phoneno" name="phoneno" placeholder="Phone No." value="<?php echo $row['phoneno']; ?>">
                  </div>


                  <div class="form-group col-md-6">
                    <label for="contactno">Mobile No.:</label>
                    <input type="text" class="form-control input-sm" id="contactno" name="contactno" placeholder="Contact No." value="<?php echo $row['contactno']; ?>">
                  </div>

                  <div class="form-group col-md-12">
                     <label>Website:</label>
                    <input type="text" class="form-control input-sm" name="website" value="<?php echo $row['website']; ?>">
                  </div>

                                    <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-flat btn-success pull-right">Update Profile</button>
                  </div>


              </div>
              </div>
            </div>
            <div class="panel panel-info">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                  Employer Details</a>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">


                  <div class="form-group col-md-12">
                     <label>Employer Name:</label>
                    <input type="text" class="form-control input-sm" name="companyname" value="<?php echo $row['companyname']; ?>" required="">
                  </div>


                  <div class="form-group col-md-4">
                    <label for="country">Country:</label>
                    <input type="text" class="form-control input-sm" id="country" name="country" value="<?php echo $row['country']; ?>" placeholder="country" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="province">Province:</label>
                    <input type="text" class="form-control input-sm" id="province" name="province" value="<?php echo $row['province']; ?>" placeholder="province" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="city">City / Municipality:</label>
                    <input type="text" class="form-control input-sm" id="city" name="city" placeholder="city" value="<?php echo $row['city']; ?>" readonly>
                  </div>
   
                  <div class="form-group col-md-12">
                    <label>About Us</label>
                    <textarea class="form-control input-sm" rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                  </div>

                  <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-flat btn-success pull-right">Update Profile</button>
                  </div>

              </div>
              </div>
            </div>
            <div class="panel panel-info">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                  Other</a>
                </h4>
              </div>
              <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">

                                    <div class="form-group col-md-12">

                   <center> <label>Change Employer Logo</label>
                    <input type="file" name="image" class="btn btn-default">
                    <?php if($row['logo'] != "") { ?>
                    <img src="../uploads/logo/<?php echo $row['logo']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;">
                    <?php } ?>

                                      <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-flat btn-success pull-right">Update Profile</button>
                  </div>
                  
                </div>

                </div>
              </div>
            </div>
          </div>


              
                <div class="col-md-12 latest-job ">

               


                    <?php
                    }
                  }
                ?>  


                  </div>


              </form>
            
            <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php unset($_SESSION['uploadError']); } ?>
            
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
