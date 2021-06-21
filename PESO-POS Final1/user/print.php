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
    <link rel="icon" href=".bootstrap-3.3.7/favicon.ico">

  <title>PESO-POS | Resume</title>
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

  <script src="../js/tinymce/tinymce.min.js"></script>

  <script>tinymce.init({ selector:'#description', height: 300 });</script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">


<style type="text/css">
  
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}



</style>

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


      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid no-print">
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
                  <li><a href="index.php"><i class="fa fa-address-card-o"></i> My Applications</a></li>
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
            <div class="row margin-top-20">
              <div class="col-md-12">
              <?php
               $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";

                $result = $conn->query($sql);

                //If Job Post exists then display details of post
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) 
                  {

                ?>

                <center><table border="0">
                <tr>

                  <td><img class="col-md-6" style="width: 150px;height: 120px" src="../uploads/resume/<?php echo $row['logo']; ?>" alt="profile">

                   <td><h2><b><i><?php $string = $row['middlename']; echo $row['firstname'].' ' .$string[0]. '. ' .$row['lastname']; ?></i></b></h2>
                   <sup class="text-info text-justify"><b><i><?php echo $row['address']. ',<br>' .$row['city']. ', ' .$row['province'].' ' .$row['zip']; ?></i></b></sup><br>
                   <sup class="text-info"><b><i><?php echo $row['email']. '<br>' .$row['media']; ?></i></b></sup><br>
                   <sup class="text-info"><b><i><?php echo $row['contactno']; ?></i></b></sup>
                 </center>
                
                </tr>
                </table></center>




                <div class="clearfix"></div>
                <hr>
                <div>
                  <h3>Objective</h3>
                  <?php
                  echo $row['aboutme'];
                  ?>
                  <h3>Personal Informations</h3>
                  <?php
                    echo 'Birthday: '.$row['dob'];
                    echo '<br>';
                    echo 'Birthplace: '.$row['pob'];
                    echo '<br>';
                    echo 'Age: '.$row['age'];
                    echo '<br>';
                    echo 'Nationality: '.$row['nationality'];
                    echo '<br>';
                    echo 'Religion: '.$row['religion'];
                    echo '<br>';
                    echo 'Sex: '.$row['gender'];
                    echo '<br>';
                    echo 'Civil Status: '.$row['civilstatus'];
                  ?>
                  <h3>Educational Background</h3>
                  <?php
                  echo 'School: '.$row['school'];
                  echo '<br>';
                  echo 'Studied: '.$row['qualification'];
                  echo '<br>';
                  echo 'Graduated on: '.$row['passingyear'];
                  ?>

                </div>

                <hr class="no-print">
                <div class="col-md-12 no-print">
                <div class="pull-right no-print col-md-2">
                  <a href="index.php" class="btn btn-danger btn-lg btn-flat margin-top-20"></i>Back</a>
                </div>

                <div class="pull-right no-print col-md-2">
                  <input class="btn btn-success btn-lg btn-flat margin-top-20" type="button" value="Print" onClick="window.print()">
                </div>
                </div>

                <div>
                </div>
                <?php
                  }
                }
                ?>
              </div>
            </div>
            
          </div>
        </div>
      </div><br><br><br>
    </section>
  </section>


    
</div>
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
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

</body>
</html>

<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
