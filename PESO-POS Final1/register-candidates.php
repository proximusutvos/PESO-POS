<?php

session_start();

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


    <title>PESO-POS | Register Job Seeker</title>
         <link rel="icon" href="img/PESO_logo.png">


  </head>
<!-- NAVBAR
================================================== -->
  <body>
    
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

  <div class="content-wrapper" style="margin-left: 0px;padding-top: 80px">

           <div class="jumbotron" style="background-image: url(img/career.jpg);background-attachment: fixed;background-repeat:no-repeat;background-size: cover">
        <h1 class="text-center text-red">Register Job Seeker</h1> 
      </div>

    <section class="content-header">
      <div class="container bg-danger">
        <div class="row latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center margin-bottom-20"></h1>
          <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">
            <div class="col-md-6 latest-job ">
              <div class="col-md-12 text-center bg-primary"><h5><b>Personal Information:</b></h5></div>

              <div class="form-group col-md-4">
                <br><label>Your Name:</label>
                <input class="form-control input-sm" type="text" id="fname" name="fname" placeholder="First Name *" required>
              </div>

              <div class="form-group col-md-4">
                <br><label>&nbsp</label>
                <input class="form-control input-sm" type="text" id="mname" name="mname" placeholder="Middle Name " required>
              </div>

              <div class="form-group col-md-4">
                <br><label>&nbsp</label>
                <input class="form-control input-sm" type="text" id="lname" name="lname" placeholder="Last Name *" required>
              </div>

              <div class="form-group col-md-4">
                <label>Date Of Birth:</label>
                <input class="form-control input-sm" type="date" id="dob" min="1960-01-01" max="2001-02-02" name="dob" placeholder="Date Of Birth">
              </div>

              <div class="form-group col-md-4">
                <label>Age:</label>
                <input class="form-control input-sm" type="text" id="age" name="age" placeholder="0" readonly>
              </div>

              <div class="form-group col-md-4">
                <label for="gender">Sex:</label>
                <select class="form-control input-sm" id="gender" name="gender">
                  <option selected disabled>Choose Sexuality</option>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>
              </div>

              <div class="form-group col-md-12">
                <label>About Yourself:</label>
                <textarea class="form-control input-sm" rows="4" id="aboutme" name="aboutme" placeholder="Tell us why should employers hire you.*" style="resize: none" required></textarea>
              </div>


              <div class="form-group col-md-6">
                <label>Province:</label>
                <input class="form-control input-sm" type="text" id="province" name="province" placeholder="Province">
              </div>

              <div class="form-group col-md-6">
                <label>Municipality / City:</label>
                <input class="form-control input-sm" type="text" id="city" name="city" placeholder="Municipality / City">
              </div>

             <div class="form-group col-md-12">
              <label>Address:</label>
                <textarea class="form-control input-sm" rows="4" id="address" name="address" placeholder="e.g. House No.,  Street,  Subdivision, etc.." style="resize: none"></textarea>
              </div>

              <div class="form-group col-md-6">
                <label>Year Graduated / Last Attended:</label>
                <input class="form-control input-sm" type="date" id="passingyear" name="passingyear" placeholder="Passing Year">
              </div>       
              <div class="form-group col-md-6">
                <label>Highest Level Completed:</label>
                <input class="form-control input-sm" type="text" id="qualification" name="qualification" placeholder="e.g. Highschool, Course, Degree, etc...">
              </div>
              <div class="form-group col-md-12">
                <label>Name of School / University:</label>
                <input class="form-control input-sm" type="text" id="school" name="school" placeholder="School / University">
              </div>   


              <div class="form-group col-md-12">
                <label>Skills:</label>
                <textarea class="form-control input-sm" rows="4" id="skills" name="skills" placeholder="e.g. Programming, Marketing, etc." style="resize: none"></textarea>
              </div> 



              <?php 
              //If User already registered with this email then show error message.
              if(isset($_SESSION['registerError'])) {
                ?>
                <div class="form-group">
                  <label style="color: red;">Email Already Exists! Choose A Different Email!</label>
                </div>
              <?php
               unset($_SESSION['registerError']); }
              ?> 

              <?php if(isset($_SESSION['uploadError'])) { ?>
              <div class="form-group">
                  <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
              </div>
              <?php unset($_SESSION['uploadError']); } ?>     

            </div>      

            <div class="col-md-6 latest-job ">
              <div class="col-md-12 text-center bg-primary"><h5><b>Account and Security Details:</b></h5></div>

              <div class="form-group col-md-12">
                <br><label>Email-Address:</label>
                <input class="form-control input-sm" type="text" id="email" name="email" placeholder="Email *" required>
              </div>

         <!--     <div id="passwordError" class="alert alert-danger hide-me col-md-12" >
                   <h6 class="text-center"> Password Mismatch!!  </h6>
                  </div>
-->
              <div class="form-group col-md-6">
                <label>Password:</label>
                <input class="form-control input-sm" type="password" id="password" name="password" placeholder="Password *" required>
              </div>

              <div class="form-group col-md-6">
                <label>&nbsp</label>
                <input class="form-control input-sm" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password *" required>
              </div>



              <div class="form-group col-md-6">
                <label>Mobile No. :</label>
                <input class="form-control input-sm" type="text" id="contactno" name="contactno" minlength="11" maxlength="11" onkeypress="return validatePhone(event);" placeholder="09000000000">
              </div>

              <div class="form-group col-md-6">
                <label>Social Media:</label>
                <input class="form-control input-sm" type="text" id="media" name="media" placeholder="https://www.facebook.com/yourname">
              </div>

              <div class="col-md-12 text-center bg-primary"><h5><b>Attachments:</b></h5></div>

              <div class="form-group col-md-12" style="padding-bottom: 280px">
                <br><label>Profile Picture: &nbsp</label><label style="color: red;">.png and .jpg File Format Only!</label>
                <input type="file" name="image" class="form-control input-sm" required>
              </div>

                            <div class="form-group checkbox col-md-12">
                <label><input type="checkbox" required=""> I accept terms & conditions.</label>
              </div>
              <div class="form-group col-md-6">
              <button class="btn btn-flat btn-success col-md-12">Register</button>
              </div>
              <div class="form-group col-md-6">
              <a href="index.php" class="btn btn-danger btn-flat col-md-12">Cancel</a>
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
      <strong>Copyright &copy; 2018-2019 <a href="#">PESO-POS </a>.</strong> All rights
    reserved.
    </div>
  </footer>

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

<script type="text/javascript">
  $('#dob').on('change', function() {
    var today = new Date();
    var birthDate = new Date($(this).val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();

    if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }

    $('#age').val(age);
  });
</script>
<script>
  $("#registerCandidates").on("submit", function(e) {
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
