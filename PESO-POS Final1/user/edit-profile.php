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
  <div class="content-wrapper" style="margin-left: 0px;padding-top: 80px;">

    <section id="candidates" class="content-header">
      <div class="container" style="min-height: 500px">
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
                  <li class="active"><a href="edit-profile.php"><i class="fa fa-user"></i> Profile</a></li>
                  <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                  <li><a href="../jobs.php"><i class="fa fa-list-ul"></i> Jobs</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2 class="text-center"><i>Edit Profile</i></h2>
            <form action="update-profile.php" method="post" enctype="multipart/form-data">
            <?php
            //Sql to get logged in user details.
            $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
            $result = $conn->query($sql);

            //If user exists then show his details.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
            ?>

              <div class="panel-group" id="accordion">

                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse0">
                      Account and Contact Details</a>
                    </h4>
                  </div>
                  <div id="collapse0" class="panel-collapse collapse">
                    <div class="panel-body">

                <div class="col-md-12 latest-job ">
                  <div class="form-group col-md-6">
                    <label for="contactno">Contact Number:</label>
                    <input type="text" class="form-control input-sm" id="contactno" name="contactno" minlength="11" maxlength="11" placeholder="None" value="<?php echo $row['contactno']; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="media">Social Media:</label>
                    <input type="text" class="form-control input-sm" id="media" name="media" placeholder="None" value="<?php echo $row['media']; ?>">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control input-sm" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                  </div>

                  <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-flat btn-success col-md-3 pull-right">Update Profile</button>
                  </div>

                </div>

                  </div>
                  </div>
                </div>

                <div class="panel panel-info">
                 <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                      Personal Information</a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                 
                  <div class="form-group col-md-6">

                    <label>Profile Picture:</label>
                    <div class="thumbnail col-md-10"><br>
                    <?php if($row['logo'] != "") { ?>
                    <img src="../uploads/resume/<?php echo $row['logo']; ?>" class="img-responsive" style="max-height: 150px; max-width: 150px;">
                    <?php } ?><br>
                    
                    <input type="file" name="image" class="btn btn-default col-md-12"><br>

                   <?php if(isset($_SESSION['uploadError'])) { ?>
                    <div class="row">
                    <div class="col-md-12 text-center text-danger">
                   <?php echo $_SESSION['uploadError']; ?>
                   </div>
                    </div>
                  <?php unset($_SESSION['uploadError']); } ?>
                  </div>
                  </div>

                  <div class="form-group col-md-3">
                     <label for="fname">First Name:</label>
                    <input type="text" class="form-control input-sm" id="fname" name="fname" placeholder="First Name" value="<?php echo $row['firstname']; ?>" required="">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control input-sm" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['lastname']; ?>" required="">
                  </div>
                  <div class="form-group col-md-3">
                     <label for="mname">Middle Name:</label>
                    <input type="text" class="form-control input-sm" id="mname" name="mname" placeholder="None" value="<?php echo $row['middlename']; ?>">
                  </div>
                  <div class="form-group col-md-3">
                     <label for="suffix">Suffix:</label>
                    <input type="text" class="form-control input-sm" id="suffix" name="suffix" placeholder="None" value="<?php echo $row['suffix']; ?>">
                  </div>


                 <div class="form-group col-md-3">
                   <label for="nationality">Nationality:</label>
                   <select class="form-control input-sm" id="nationality" name="nationality" required="">
                     <option selected="selected"><?php echo $row['nationality']; ?></option>
                    <option value="American">American</option>
                     <option value="Chinese">Chinese</option>
                     <option value="Filipino">Filipino</option>
                     <option value="Korean">Korean</option>
                     <option value="Japanese">Japanese</option>
                   </select>
                 </div>

                <div class="form-group col-md-3">
                   <label for="civilstatus">Civil Status:</label>
                   <select class="form-control input-sm" id="civilstatus" name="civilstatus" required="">
                     <option selected="selected"><?php echo $row['civilstatus']; ?></option>
                    <option value="Single">Single</option>
                     <option value="Married">Married</option>
                     <option value="Widowed">Widowed</option>
                     <option value="Separated">Separated</option>
                   </select>
                 </div>

                 <div class="form-group col-md-6">
                   <label for="religion">Religion:</label>
                   <select class="form-control input-sm" id="religion" name="religion" required="">
                    <option selected="selected"><?php echo $row['religion']; ?></option>
                    <option value="Atheist">Atheist</option>
                    <option value="Born Again">Born Again</option>
                    <option value="Church of Christ">Church of Christ</option>
                    <option value="Evangelicals">Evangelicals</option>
                    <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                    <option value="Islam">Islam</option>
                    <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>
                    <option value="Jewish">Jewish</option>
                    <option value="Roman Catholic">Roman Catholic</option>
                   </select>
                 </div>

                  <div class="form-group col-md-3">
                    <label for="dob">Date of Birth:</label>
                    <input type="text" class="form-control input-sm" id="dob" placeholder="Date of Birth" value="<?php echo $row['dob']; ?>" readonly>
                  </div>
                  <div class="form-group col-md-1">
                    <label for="age">Age:</label>
                    <input type="text" class="form-control input-sm" id="age" placeholder="Age" value="<?php echo $row['age']; ?>" readonly>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="gender">Sex:</label>
                    <input type="text" class="form-control input-sm" id="gender" placeholder="Gender" value="<?php echo $row['gender']; ?>" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="province">Province:</label>
                    <input type="text" class="form-control input-sm" id="province" name="province" placeholder="Province" value="<?php echo $row['province']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="city">Municipality / City:</label>
                    <input type="text" class="form-control input-sm" id="city" name="city" placeholder="Municipality / City" value="<?php echo $row['city']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="pob">Place of Birth:</label>
                    <input type="text" class="form-control input-sm" id="pob" name="pob" placeholder="None" value="<?php echo $row['pob']; ?>">
                  </div>
                  <div class="form-group col-md-8">
                    <label for="address">Residential Address:</label>
                    <textarea style="resize: none" id="address" name="address" class="form-control input-sm" rows="3" placeholder="Address"><?php echo $row['address']; ?></textarea>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="zip">Zip Code:</label>
                    <input type="text" class="form-control input-sm" id="zip" name="zip" placeholder="Zip code" value="<?php echo $row['zip']; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Skills</label>
                    <textarea style="resize: none" class="form-control input-sm" rows="4" name="skills"><?php echo $row['skills']; ?></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label>About Me</label>
                    <textarea style="resize: none" class="form-control input-sm" rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea><br>
                  </div>


                  <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-flat btn-success col-md-3 pull-right">Update Profile</button>
                  </div>
                

                  </div>
                  </div>
                </div>
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                      Educational Background</a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                  <div class="panel-body">
                  
                  <div class="col-md-12"><h4 class="panel-heading bg-primary">Primary Education</h4>
                  <div class="form-group col-md-12">
                    <label for="primaryschool">Name of School / University:</label>
                    <input type="text" class="form-control input-sm" id="primaryschool" name="primaryschool" placeholder="Name of School / University" value="<?php echo $row['primaryschool']; ?>">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="primarypassingyear">Year Graduated:</label>
                    <input type="date" class="form-control input-sm" id="primarypassingyear" name="primarypassingyear" placeholder="dd/mm/yyyy" value="<?php echo $row['primarypassingyear']; ?>">
                  </div>
                   <div class="form-group col-md-8">
                    <label for="primaryhonor">Academic Award Recieved:</label>
                    <input type="text" class="form-control input-sm" id="primaryhonor" name="primaryhonor" placeholder="none" value="<?php echo $row['primaryhonor']; ?>">
                  </div>
                  </div>


                  <div class="col-md-12"><h4 class="panel-heading bg-primary">Secondary Education</h4>

                  <div class="form-group col-md-12">
                    <label for="secondaryschool">Name of School / University:</label>
                    <input type="text" class="form-control input-sm" id="secondaryschool" name="secondaryschool" placeholder="Name of School / University" value="<?php echo $row['secondaryschool']; ?>">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="secondarypassingyear">Year Graduated:</label>
                    <input type="date" class="form-control input-sm" id="secondarypassingyear" name="secondarypassingyear" placeholder="dd/mm/yyyy" value="<?php echo $row['secondarypassingyear']; ?>">
                  </div>
                   <div class="form-group col-md-8">
                    <label for="secondaryhonor">Academic Award Recieved:</label>
                    <input type="text" class="form-control input-sm" id="secondaryhonor" name="secondaryhonor" placeholder="none" value="<?php echo $row['secondaryhonor']; ?>">
                  </div>
                  </div>



                  <div class="col-md-12"><h4 class="panel-heading bg-primary">Tertiary Education</h4>
                  <div class="form-group col-md-12">
                    <label for="school">Name of School / University</label>
                    <input type="text" class="form-control input-sm" id="school" name="school" placeholder="Name of School / University" value="<?php echo $row['school']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="passingyear">Year Graduated</label>
                    <input type="date" class="form-control input-sm" id="passingyear" name="passingyear" placeholder="dd/mm/yyyy" value="<?php echo $row['passingyear']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="qualification">Highest Level Completed:</label>
                    <input type="text" class="form-control input-sm" id="qualification" name="qualification" placeholder="e.g. Highschool, Course, Degree, etc..." value="<?php echo $row['qualification']; ?>">
                  </div>
                   <div class="form-group col-md-4">
                    <label for="honor">Academic Award Recieved:</label>
                    <input type="text" class="form-control input-sm" id="honor" name="honor" placeholder="none" value="<?php echo $row['honor']; ?>">
                  </div>
                  </div>


                  <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-flat btn-success col-md-3 pull-right">Update Profile</button>
                  </div>
                  </form>
                  </div>
                  </div>
                </div>
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                      Working Experience (most recent)</a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">

                  <div class="form-group col-md-12">
                    <label for="workexperiencecompany">Name of Company / Firm:</label>
                    <input type="text" class="form-control input-sm" id="workexperiencecompany" name="workexperiencecompany" placeholder="none" value="<?php echo $row['workexperiencecompany']; ?>">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="workexperiencejob">Position Held:</label>
                    <input type="text" class="form-control input-sm" id="workexperiencejob" name="workexperiencejob" placeholder="none" value="<?php echo $row['workexperiencejob']; ?>">
                  </div>

                  <div class="form-group col-md-3">
                    <label for="workexperienceyear">Year/s on Work:</label>
                    <input type="number" class="form-control input-sm" id="workexperienceyear" name="workexperienceyear" placeholder="How many Year/s" value="<?php echo $row['workexperienceyear']; ?>">
                  </div>

                  <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-flat btn-success col-md-3 pull-right">Update Profile</button>
                  </div>

                  </div>
                  </div>
                </div>
              </div>

              <?php
                }
              }
            ?>   
            </form>

                </section><br><br>
          </div>
        </div>
      </div>
      </div>

  <!-- /.content-wrapper -->
</div> 
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
