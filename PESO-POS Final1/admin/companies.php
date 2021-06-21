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
    <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
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
                  <a href="admin/dasboard.php">Admin</a>
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
                <h3 class="box-title">Welcome <b>Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Active Jobs</a></li>
                  <li><a href="applications.php"><i class="fa fa-address-card-o"></i> Job Seekers</a></li>
                  <li class="active"><a href="companies.php"><i class="fa fa-building"></i> Employers</a></li>
                  <li><a href="adminpost.php"><i class="fa fa-file"></i> Create Post</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

            <h3>Employer</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Employer Name</th>
                      <th>Contact Person</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Phone</th>
                      <th>Country</th>
                      <th>Province</th>
                      <th>Municipality / City</th>
                      <th>Status</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM company";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row['companyname']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contactno']; ?></td>
                        <td><?php echo $row['phoneno']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['province']; ?></td>
                        <td><?php echo $row['city']; ?></td>

                        <td><p class="text-info">
                        <?php
                          if($row['active'] == '1') {
                            echo "Activated";
                          } else if($row['active'] == '2') {
                            ?>
                            <a href="reject-company.php?id=<?php echo $row['id_company']; ?>">Reject</a> <a href="approve-company.php?id=<?php echo $row['id_company']; ?>">Approve</a>
                            <?php
                          } else if ($row['active'] == '3') {
                            ?>
                              <a href="approve-company.php?id=<?php echo $row['id_company']; ?>">Reactivate</a>
                            <?php
                          } else if($row['active'] == '0') {
                            echo "Rejected";
                          }
                        ?>    </p>                      
                        </td>
                        <td><a class="text-danger" href="delete-company.php?id=<?php echo $row['id_company']; ?>">Delete</a></td>
                      </tr>  
                     <?php
                        }
                      }
                    ?>
                    </tbody>                    
                  </table>
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
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
