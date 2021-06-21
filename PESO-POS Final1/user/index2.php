<?php

//To Handle Session Variables on This Page
session_start();
//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}


//Including Database Connection From db.php file to avoid rewriting in all files
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
<!-- NAVBAR
================================================== -->
  <body>

    <div class="jumbotron" style="padding-top: 60px">
      
                        <div class="col-md-12">

                  <div>
                    <img id="logongpaniqui" src="../img/paniquilogo.png" style="width: 100px;float: left;margin-left: 220px">
                  </div>

                  <div style="float: right;margin-right: 655px;">
                   <h4 align="left" style="color: black;font-family: Book Antigua;margin-bottom: -15px;letter-spacing: 2px">Republic of the Philippines</h4>
                   <hr align="left" style="border-color:black;width: 100%">
                   <h2 align="left" style="color: black;font-family: Book Antigua;padding-bottom: 30px;margin-top: -15px"><b>Municipality of Paniqui</b></h2>
                  </div>

                 </div>

    </div>
    
      <center><div class="content-wrapper" style="margin-left: 0px;margin-top: -80px">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-fixed-top text-center">
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
                <li class="active"><a href="index2.php">Home</a>
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
                          <li>
                  <a href="user/index.php"><?php echo $_SESSION['name']; ?></a>
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
                 <li>
                  <a href="admin/index.php">Admin</a>
                </li>
                <?php } ?>
                <li>
                  <a href="logout.php">Logout</a>
                </li>
                <?php } ?>

              </ul>

            </div>
          </div>
        </nav>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
   <div class="content-wrapper" style="margin-left: 0px;margin-top: -107px">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style=";margin-top: 108px;margin-bottom: -30px">
          <div class="jumbotron col-sm-12" style="background-image: url(../img/job-search1.jpg);background-attachment: fixed;background-size: cover">
      <!-- Indicators -->
      <center><div class="carousel-inner" role="listbox" style="width: 70%;">
        <div class="item active">
          <img class="first-slide bg-info" src="../img/jobsearch1.jpg" alt="First slide" style="height: 100%;max-height: 500px">
          <div class="container">
            <div class="carousel-caption">
            <h1 class="text-blue">Register and Search</h1>
            <p>Search, Apply, Interview</p>
            <p><a class="btn btn-success btn-lg" href="../jobs.php" role="button">Search Jobs</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide bg-info" src="../img/jobsearch2.jpg" alt="Second slide" style="height: 100%;max-height: 500px">
          <div class="container">
            <div class="carousel-caption">
              <h1 class="text-red">From Tambay to Apply.</h1>
              <p>Provide reintegration assistance services to returning Filipino migrant workers</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Register Job Seeker</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide bg-info" src="../img/jobsearch3.jpg" alt="Third slide" style="height: 100%;max-height: 500px">
          <div class="container">
            <div class="carousel-caption">
              <h1 class="text-green">Employment.</h1>
              <p>asdasdasdasdasdasdasd.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Register Employer</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
    </div>
<hr>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->



    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
            <h1 class="text-center">Most Recent Jobs</h1><br>        
            <?php 
          /* Show any 4 random job post
           * 
           * Store sql query result in $result variable and loop through it if we have any rows
           * returned from database. $result->num_rows will return total number of rows returned from database.
          */
          $sql = "SELECT * FROM job_post Order By id_jobpost DESC Limit 4";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
              $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
                {
             ?>
            <div class="attachment-block clearfix">
            <!--  <img class="attachment-img" src="img/photo1.png" alt="Attachment Image"> -->
            <img class="attachment-img" src="uploads/logo/<?php echo $row1['logo']; ?>" alt="Attachment Image">
              <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">₱<?php echo $row['maximumsalary']; ?>/Month</span></h4>
                <div class="attachment-text pull-left">
                    <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row1['city']; ?> | <?php echo $row1['province']; ?> | <?php echo $row['experience']; ?> Year/s Experience</strong></div>
                </div>
              </div>
            </div>
          <?php
              }
            }
            }
          }
          ?>

          </div>
        </div>
      </div>
    </section>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>Job Seeker</h1>
            <p>Finding a job just got easier. Create a profile and apply with single mouse click.</p><br>               
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
              <img src="img/browse.jpg" alt="Browse Jobs" style="height: 210px">
              <div class="caption">
                <h3 class="text-center">Browse Jobs</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
              <img src="img/interviewed.jpeg" alt="Apply & Get Interviewed" style="height: 210px">
              <div class="caption">
                <h3 class="text-center">Apply & Get Interviewed</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
              <img src="img/career.jpg" alt="Start A Career" style="height: 210px">
              <div class="caption">
                <h3 class="text-center">Start A Career</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="company" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>Employer</h1>
            <p>Hiring? Register your Agency/Company/Etc.. for free, browse our talented pool, post and track job applications</p><br>               
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail company-img">
              <img src="img/postjob.png" alt="Browse Jobs" style="height: 210px">
              <div class="caption">
                <h3 class="text-center">Post A Job</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail company-img">
              <img src="img/manage.jpg" alt="Apply & Get Interviewed" style="height: 210px">
              <div class="caption">
                <h3 class="text-center">Manage & Track</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail company-img">
              <img src="img/hire.png" alt="Start A Career" style="height: 210px">
              <div class="caption">
                <h3 class="text-center">Hire</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="statistics" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>Our Statistics</h1><br>   
          </div>
        </div>
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
             <?php
                      $sql = "SELECT * FROM job_post";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Job Offers</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                  <?php
                      $sql = "SELECT * FROM company WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Registered Company</p>
            </div>
            <div class="icon">
                <i class="ion ion-briefcase"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
             <?php
                      $sql = "SELECT * FROM apply_job_post WHERE status='5'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Hired</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-list"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
               <?php
                      $sql = "SELECT * FROM users WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Daily Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      </div>
    </section>

    <section id="about" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>About Us</h1><br>                     
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <img src="img/browse.jpg" class="img-responsive">
          </div>
          <div class="col-md-6 about-text margin-bottom-25">
            <p class="text-justify" style="margin-top: 20px">The Public Employment Service Office or PESO is a non-fee charging multi-employment service facility or entity established or accredited pursuant to Republic Act No. 8759 otherwise known as the PESO Act of 1999.
            </p>
            <p class="text-justify">
              To carry out full employment and equality of employment opportunities for all, and for this purpose, to strengthen and expand the existing employment facilitation service machinery of the government particularly at the local levels there shall be established in all capital towns of provinces, key cities, and other strategic areas a Public Employment Service Office, Hereinafter referred to as PESO, which shall be community-based and maintained largely by local government units (LGUs) and a number of non-governmental organizations (NGOs) or community-based organizations (CBOs) and state universities and colleges (SUCs). The PESOs shall be linked to the regional offices of the Department of Labor and Employment (DOLE) for coordination and technical supervision, and to the DOLE central office, to constitute the national employment service network.
              
            </p>
          </div>
        </div>
      </div>
    </section>



<br><br>
    <footer class="main-footer bg-black" style="margin-left: 0px;position: absolute; width: 100%">
    <div class="text-center">
      <strong>Copyright &copy; 2018-2019 <a href="#">PESO-POS </a>.</strong> All rights
    reserved.
    </div>
  </footer>
  </div>
  <!-- /.content-wrapper -->
      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="bootstrap-3.3.7/assets/js/vendor/jquery.min.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap-3.3.7/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7//assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>

  </body>
</html>
