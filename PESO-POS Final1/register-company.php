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
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/PESO_logo.png">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <script src="bootstrap-3.3.7/assets/js/ie-emulation-modes-warning.js"></script>
    <link href="css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <link rel="stylesheet" href="../css/custom.css">


  <title>PESO-POS | Register Employer</title>
      <link rel="icon" href="img/PESO_logo.png">


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
  <div class="content-wrapper" style="margin-left: 0px;">
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

              <a class="navbar-brand" href="#"><span><b>PESO </b><img src="img/PESO_logo.png" width="25px"> POS</span>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a>
                <li><a href="jobs.php">Jobs</a></li>
                <li><a href="announcement.php">Announcement</a></li>

                 <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

                <!--<li><a href="sign-up.php">Sign Up</a></li>-->


                <li class="active">
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
  <div class="content-wrapper" style="margin-left: 0px;padding-top: 80px">
               <div class="jumbotron" style="background-image: url(img/career.jpg);background-attachment: fixed;background-repeat:no-repeat;background-size: cover">
        <h1 class="text-center text-red">Register Employer</h1> 
      </div>

   <section class="content-header">
      <div class="container bg-info">
        <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
          <h1 class="text-center margin-bottom-20"></h1>
          <form method="post" id="registerCompanies" action="addcompany.php" enctype="multipart/form-data">
            <div class="col-md-6 latest-job ">
              <div class="col-md-12 text-center bg-primary"><h5><b>Employer Information:</b></h5></div>

              <div class="form-group col-md-12">
              <br><label>Employer Name:</label>
                <input class="form-control input-sm" type="text" name="companyname" placeholder="e.g. Establishment Name, Acronym, Abbreviation, etc." required>
              </div>

              <div class="form-group col-md-6">
              <br><label>Contact Person:</label>
                <input class="form-control input-sm" type="text" name="name" placeholder="Full Name" required>
              </div>

              <div class="form-group col-md-6">
              <br><label>Position:</label>
                <input class="form-control input-sm" type="text" name="position" placeholder="e.g. employer, recruiter, etc." required>
              </div>

              <div class="form-group col-md-6">
              <br><label>Mobile No:</label>
                <input class="form-control input-sm" type="text" name="contactno" placeholder="" minlength="10" maxlength="10" autocomplete="off" onkeypress="return validatePhone(event);" required>
              </div>

              <div class="form-group col-md-6">
              <br><label>Phone No:</label>
                <input class="form-control input-sm" type="text" name="phoneno" placeholder="" minlength="6" maxlength="20" autocomplete="off" onkeypress="return validatePhone(event);" required>
              </div>

                <div class="form-group col-md-4">
                <br><label>Employer Location:</label>
                <select class="form-control  input-sm" id="country" name="country" required>
                <option selected disabled="" value="">Select Country</option>
                <?php
                  $sql="SELECT * FROM countries";
                  $result=$conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='".$row['name']."' data-id='".$row['id']."'>".$row['name']."</option>";
                    }
                  }
                ?>
                  
                </select>
              </div>  
              <div class="form-group col-md-4">
              <br><label>Province:</label>
                <input class="form-control input-sm" type="text" name="province" id="province" placeholder="" required>
              </div> 
              <div class="form-group col-md-4">
              <br><label>Municipality / City:</label>
                <input class="form-control input-sm" type="text" name="city" id="city" placeholder="" required>
              </div> 

              <div class="form-group col-md-12">
                <label>Address:</label>
                <input type="text" class="form-control input-sm" rows="4" id="address" name="address" placeholder="e.g. Company St. address, etc.." style="resize: none"></textarea>
              </div>

              <div class="form-group col-md-12">
              <label>About the Employer:</label>
                <textarea class="form-control input-sm" rows="6" name="aboutme" placeholder="Brief info about your company" style="resize: none;"></textarea>
              </div>




              <?php 
              //If Company already registered with this email then show error message.
              if(isset($_SESSION['registerError'])) {
                ?>
                <div>
                  <p class="text-center" style="color: red;">Email Already Exists! Choose A Different Email!</p>
                </div>
              <?php
               unset($_SESSION['registerError']); }
              ?> 
              <?php 
              if(isset($_SESSION['uploadError'])) {
                ?>
                <div>
                  <p class="text-center" style="color: red;"><?php echo $_SESSION['uploadError']; ?></p>
                </div>
              <?php
               unset($_SESSION['uploadError']); }
              ?> 
            </div>

            <div class="col-md-6 latest-job ">
              <div class="col-md-12 text-center bg-primary"><h5><b> Account and Security Details:</b></h5></div>

              <div class="form-group col-md-12">
              <br><label>Email-Address:</label>
                <input class="form-control input-sm" type="text" name="email" placeholder="Email*" required>
              </div>


              <div class="form-group col-md-6">
              <br><label>Password:</label>
                <input class="form-control input-sm" type="password" name="password" placeholder="Password*" required>
              </div>
              <div class="form-group col-md-6">
              <br><label>&nbsp</label>
                <input class="form-control input-sm" type="password" name="cpassword" placeholder="Confirm Password*" required>
              </div>

              <div class="form-group col-md-12">
              <br><label>Employer Website:</label>
                <input class="form-control input-sm" type="text" name="website" placeholder="https://www.yourcompany.com">
              </div>


   <!--            <div id="passwordError" class="btn btn-flat btn-danger hide-me" >
                    Password Mismatch!! 
                  </div>
    -->


              <div class="col-md-12 text-center bg-primary"><h5><b>Attachments:</b></h5></div>

              <div class="form-group col-md-12" style="padding-bottom: 100px">
                <br><label>Employer Logo:</label>
                <input type="file" name="image" class="form-control input-sm" required>
              </div>


              <div>
                            <div class="form-group checkbox col-md-12">
                <label><input type="checkbox" required=""> I accept terms & conditions</label>
              </div>
              <div class="form-group col-md-6">
              <button class="btn btn-flat btn-success col-md-12">Register</button>
              </div>
              <div class="form-group col-md-6">
              <a href="index.php" class="btn btn-danger btn-flat col-md-12">Cancel</a>
              </div>
              </div>

            </div>
          </form>
          
        </div>
      </div>
      <br><br>  
    </section>

   

  </div>
  <!-- /.content-wrapper -->

    <footer class="main-footer bg-black" style="margin-left: 0px;position: absolute; width: 100%">
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
<script src="js/adminlte.min.js"></script>

<script type="text/javascript">
  function validatePhone(event) {

    //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
    //event.which will return key for mouse events and other events like ctrl alt etc. 
    var key = window.event ? event.keyCode : event.which;

    if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
      // 8 means Backspace
      //46 means Delete
      // 37 means left arrow
      // 39 means right arrow
      return true;
    } else if( key < 48 || key > 57 ) {
      // 48-57 is 0-9 numbers on your keyboard.
      return false;
    } else return true;
  }
</script>

<script>
  $("#country").on("change", function() {
    var id = $(this).find(':selected').attr("data-id");
    $("#province").find('option:not(:first)').remove();
    if(id != '') {
      $.post("province.php", {id: id}).done(function(data) {
        $("#province").append(data);
      });
      $('#ProvinceDiv').show();
    } else {
      $('#ProvinceDiv').hide();
      $('#cityDiv').hide();
    }
  });
</script>

<script>
  $("#province").on("change", function() {
    var id = $(this).find(':selected').attr("data-id");
    $("#city").find('option:not(:first)').remove();
    if(id != '') {
      $.post("city.php", {id: id}).done(function(data) {
        $("#city").append(data);
      });
      $('#cityDiv').show();
    } else {
      $('#cityDiv').hide();
    }
  });
</script>
<script>
  $("#registerCompanies").on("submit", function(e) {
    e.preventDefault();
    if( $('#password').val() != $('#cpassword').val() ) {
      $('#passwordError').show();
    } else {
      $(this).unbind('submit').submit();
    }
  });
</script>
</body>
</html>
