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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PESO-POS | Mail</title>
      <link rel="icon" href="../img/PESO_logo.png">
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
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#description', height: 150 });</script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->

</head>
<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

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
      <div class="container">
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
                  <li><a href="index.php"><i class="fa fa-address-card-o"></i> My Applications</a></li>
                  <li><a href="edit-profile.php"><i class="fa fa-user"></i> Profile</a></li>
                  <li class="active"><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                  <li><a href="../jobs.php"><i class="fa fa-list-ul"></i> Jobs</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
          <form action="add-mail.php" method="post">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Compose New Message</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <select name="to" class="form-control" required>
                    <?php 
                    $sql = "SELECT * FROM apply_job_post INNER JOIN job_post ON apply_job_post.id_jobpost=job_post.id_jobpost INNER JOIN company ON apply_job_post.id_company=company.id_company WHERE apply_job_post.id_user='$_SESSION[id_user]' AND apply_job_post.status>'1'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo '<option value="'.$row['id_company'].'">'.$row['companyname'].' - ' .$row['jobtitle']. '</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" name="subject" placeholder="Subject:" required="">
                </div>
                <div class="form-group">
                  <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-right">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
                <a href="mailbox.php" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
              </div>
              <!-- /.box-footer -->
            </div>
          </form>
          </div>
        </div>
      </div>
    </section><br><br>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

    <footer class="main-footer bg-black" style="margin-left: 0px;position: absolute;width: 100%">
    <div class="text-center">
      <strong>Copyright &copy; 2018-2019 <a href="#">PESO-POS</a>.</strong> All rights
    reserved.
    </div>
  </footer>



</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable();
  })
</script>

</body>
</html>
