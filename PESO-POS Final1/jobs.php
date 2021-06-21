<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
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

  <title>PESO-POS | Jobs</title>
    <link rel="icon" href="img/PESO_logo.png">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap-3.3.7/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">


  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->

</head>
<!-- NAVBAR
================================================== -->
  <body class="">
    
  <div class="content-wrapper" style="margin-left: 0px;">
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

              <a class="navbar-brand" href="#"><span><b>PESO </b><img src="img/PESO_logo.png" width="25px"> POS</span>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a>
                <li class="active"><a href="jobs.php">Jobs</a></li>
                <li><a href="announcement.php">Announcement</a></li>

                 <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company']) && empty($_SESSION['id_admin'])) { ?>

                <!--<li><a href="sign-up.php">Sign Up</a></li>-->

                <li>
                  <a href="login.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="register-candidates.php">Register as Job Seeker</a></li>
                    <li><a href="register-company.php">Register as Company</a></li>
                  </ul>
                </li>

                <li>
                  <a href="login.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="login-candidates.php">Log-in as Job Seeker</a></li>
                    <li><a href="login-company.php">Log-in as Company</a></li>
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



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;padding-top: 80px;">

    <section class="content-header">
      <div class="container">
        <div class="row">  

       <div class="jumbotron" style="background-image: url(img/job-search1.jpg);background-attachment: fixed;background-repeat:no-repeat;background-size: cover">
        <h1 class="text-center text-red">SEARCH JOB</h1> 
            <div class="input-group input-group-lg">
                <input type="text" id="searchBar" class="form-control" placeholder="Search job">
                <span class="input-group-btn">
                  <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button>
                </span>
            </div>
      </div>

   <!--       <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center">Search a Job</h1>  
            <div class="input-group input-group-lg">
                <input type="text" id="searchBar" class="form-control" placeholder="Search job">
                <span class="input-group-btn">
                  <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button>
                </span>
            </div>
          </div>
        -->

        </div>
      </div>
    </section>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border text-center">
                <h3 class="box-title">Filters</h3>
              </div>
              <div class="box-body no-padding" style="min-height: 500px">
                <ul class="nav nav-pills nav-stacked tree" data-widget="tree">
                  <li class="treeview menu-open">
                    <a href="#"><i class="fa fa-plane text-red"></i> Province <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
                      <li><a href="" class="provincesearch" data-target="Albay"><i class="fa fa-circle-o text-yellow"></i> Albay</a></li>
                      <li><a href="" class="provincesearch" data-target="Baguio"><i class="fa fa-circle-o text-yellow"></i> Baguio</a></li>
                      <li><a href="" class="provincesearch" data-target="Cebu"><i class="fa fa-circle-o text-yellow"></i> Cebu</a></li>
                      <li><a href="" class="provincesearch" data-target="Davao"><i class="fa fa-circle-o text-yellow"></i> Davao</a></li>
                      <li><a href="" class="provincesearch" data-target="Manila"><i class="fa fa-circle-o text-yellow"></i> Manila</a></li>
                      <li><a href="" class="provincesearch" data-target="Pangasinan"><i class="fa fa-circle-o text-yellow"></i> Pangasinan</a></li>
                      <li><a href="" class="provincesearch" data-target="Pampanga"><i class="fa fa-circle-o text-yellow"></i> Pampanga</a></li>
                      <li><a href=""  class="provincesearch" data-target="Tarlac"><i class="fa fa-circle-o text-yellow"></i> Tarlac</a></li>



                    </ul>
                  <!--</li>
                  <li class="treeview menu-open">
                    <a href="#"><i class="fa fa-plane text-red"></i> Experience <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
                      <li><a href="" class="experienceSearch" data-target='1'><i class="fa fa-circle-o text-yellow"></i> > 1 Year/s</a></li>
                      <li><a href="" class="experienceSearch" data-target='2'><i class="fa fa-circle-o text-yellow"></i> > 2 Year/s</a></li>
                      <li><a href="" class="experienceSearch" data-target='3'><i class="fa fa-circle-o text-yellow"></i> > 3 Year/s</a></li>
                      <li><a href="" class="experienceSearch" data-target='4'><i class="fa fa-circle-o text-yellow"></i> > 4 Year/s</a></li>
                      <li><a href="" class="experienceSearch" data-target='5'><i class="fa fa-circle-o text-yellow"></i> > 5 Year/s</a></li>
                      <li><a href="" class="experienceSearch" data-target='6'><i class="fa fa-circle-o text-yellow"></i> > 6 Year/s</a></li>
                      <li><a href="" class="experienceSearch" data-target='7'><i class="fa fa-circle-o text-yellow"></i> > 7 Year/s</a></li>
                      <li><a href="" class="experienceSearch" data-target='8'><i class="fa fa-circle-o text-yellow"></i> > 8 Year/s</a></li>
                      <li><a href="" class="experienceSearch" data-target='9'><i class="fa fa-circle-o text-yellow"></i> > 9 Year/s</a></li>
                      <li><a href="" class="experienceSearch" data-target='10'><i class="fa fa-circle-o text-yellow"></i> > 10 Year/s</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-9">

          <?php

          $limit = 6;

          $sql = "SELECT COUNT(id_jobpost) AS id FROM job_post";
          $result = $conn->query($sql);
          if($result->num_rows > 0)
          {
            $row = $result->fetch_assoc();
            $total_records = $row['id'];
            $total_pages = ceil($total_records / $limit);
          } else {


            $total_pages = 1;
          }

          ?>

          
            <div id="target-content">
              
            </div>
            <div class="text-center">
              <ul class="pagination text-center" id="pagination"></ul>
            </div> 



          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

      <!-- FOOTER -->

  <footer class="main-footer bg-black" style="margin-left: 0px;position: absolute;width: 100%">
    <div class="text-center">
      <strong>Copyright &copy; 2018-2019 <a href="#">PESO-POS </a>.</strong> All rights
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
<script src="js/adminlte.min.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>

    <script src="bootstrap-3.3.7//assets/js/ie10-viewport-bug-workaround.js"></script>

<script>
  function Pagination() {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        $("#target-content").html("loading....");
        $("#target-content").load("jobpagination.php?page="+page);
      }
    });
  }
</script>

<script>
  $(function () {
      Pagination();
  });
</script>

<script>
  $("#searchBtn").on("click", function(e) {
    e.preventDefault();
    var searchResult = $("#searchBar").val();
    var filter = "searchBar";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>


<script>
  $(".provincesearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "province";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  function Search(val, filter) {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        val = encodeURIComponent(val);
        $("#target-content").html("loading....");
        $("#target-content").load("search.php?page="+page+"&search="+val+"&filter="+filter);
      }
    });
  }
</script>


</body>
</html>
