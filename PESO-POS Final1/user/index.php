<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_user'])) {
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

                 <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

                <!--<li><a href="sign-up.php">Sign Up</a></li>-->


                <li>
                  <a href="login.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="register-candidates.php">Register as Candidate</a></li>
                    <li><a href="register-company.php">Register as Company</a></li>
                  </ul>
                </li>

                <li>
                  <a href="login.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="login-candidates.php">Log-in as Candidate</a></li>
                    <li><a href="login-company.php">Log-in as Company</a></li>
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
                <li>
                  <a href="company/index.php"><?php echo $_SESSION['name']; ?></a>
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
      <div class="container" style="min-height: 526px;padding-bottom: 50px">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">

                <!-- Profile Picture ko -->

                <div class="thumbnail box-header"><center>
                <?php
                $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                ?>
                    <?php if($row['logo'] != "") { ?>
                  <img alt="Logo" src="../uploads/resume/<?php echo $row['logo']; ?>" class="img-responsive" style="max-height: 200px;border-radius: 5%">
                    <div class="text-center">
                     <h4><b><?php echo $_SESSION['name']; ?></b></h4>

                    </div>
                    <?php } ?>                    
                    <?php
                    }
                  }
                ?>  

                <!-- Job Title na nakuha mo -->

                            <?php
             $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]' AND apply_job_post.status='5'";
                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                    {     
            ?>

            <h5 class="text-green"><b><?php echo $row['jobtitle']; ?></b></h5>


          <?php } } ?>


                </div>


                <center><a href="print.php" class="btn btn-success">View Resume<a></center>
                <!-- Profile Picture ko -->

              </div>
              <div class="box-body no-padding">
               <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="index.php"><i class="fa fa-address-card-o"></i> My Applications</a></li>
                  <li><a href="edit-profile.php"><i class="fa fa-user"></i> Profile</a></li>
                  <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                  <li><a href="../jobs.php"><i class="fa fa-list-ul"></i> Jobs</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

            <center>
            <h2><i>Recent Applications</i></h2>

            <?php
            $sql1 = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
                  $result1 = $conn->query($sql1);

            if($result1->num_rows > 0) {
              while($row1 = $result1->fetch_assoc()) {

            ?>

                      <?php          if($row1['employed'] == 1) { ?>

                                    <div class="attachment-block clearfix padding-2">



                       

            <?php
             $sql = "SELECT * FROM company INNER JOIN job_post ON job_post.id_company=company.id_company INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]' AND apply_job_post.status='5'";
                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                    {     
            ?>


            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h1 class="">CONGRATULATIONS!</h1><br> <b></b>
            
           
          YOU HAVE BEEN HIRED BY:<br>
           <h2 class="text-red"><?php echo $row['companyname']; ?></h2><br>
           AS THEIR:
            <h2 class="text-green"><?php echo $row['jobtitle']; ?></h2>

</div>
          <?php } } ?>



                      </div>

                      <?php }  ?>   



            <p></p>
            </center>
            <?php
             $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]'";
                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                    {     
            ?>


          <?php          if($row1['employed'] != 1) { ?>


            <div class="attachment-block clearfix padding-2">
                <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a></h4>
                <div class="attachment-text padding-2">
                  <div class="pull-left"><i class="fa fa-calendar"></i> <?php echo $row['createdat']; ?></div>  
                  <?php 

                  if($row['status'] == 0) {
                    echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
                  } else if ($row['status'] == 1) {
                    echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
                  } else if ($row['status'] == 5) {
                    echo '<div class="pull-right"><strong class="text-blue">Hired</strong></div>';
                  } else if ($row['status'] == 2) {
                    echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div> ';
                  } else if ($row['status'] == 3) { ?>
                    <div class="pull-right col-md-12">
                    <strong class="text-yellow pull-right">You are being hired!</strong>
                    <div class="col-md-12 pull-right">
                    <a href="hire.php?id=<?php echo $row['id_company']; ?>&id_jobpost=<?php echo $row['id_jobpost']; ?>" class="btn btn-success col-md-2" style="margin-right: 22px">Accept?</a>
                    </div>
                    </div>
                  <?php } ?>
               <!--  <div class="col-sm-3 pull-left"><a class="btn btn-danger" href="cancelapply.php?id=<?php echo $row['id_jobpost']; ?>"><i class="fa fa-ban"></i> Cancel</a></div>    -->
                </div>

            </div>
    

            <?php }  ?>    

            <?php
              }
            }
            ?>

       <?php
        }
        }
        ?>
                
          </div>
        </div>
      </div>
</section>

    <footer class="main-footer bg-black" style="margin-left: 0px;position: absolute;width: 100%">
    <div class="text-center">
      <strong>Copyright &copy; 2018-2019 <a href="#">PESO-POS</a>.</strong> All rights
    reserved.
    </div>
  </footer>

  </div>
  <!-- /.content-wrapper -->



  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="bootstrap-3.3.7/assets/js/vendor/jquery.min.js"></script>
            <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
                <script src="bootstrap-3.3.7/assets/js/vendor/holder.min.js"></script>
                    <script src="bootstrap-3.3.7//assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
