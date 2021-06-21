<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

//if user Actually clicked update profile button
if(isset($_POST)) {

	//Escape Special Characters
	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
	$middlename = mysqli_real_escape_string($conn, $_POST['mname']);
	$suffix = mysqli_real_escape_string($conn, $_POST['suffix']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$province = mysqli_real_escape_string($conn, $_POST['province']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
	$school = mysqli_real_escape_string($conn, $_POST['school']);
	$passingyear = mysqli_real_escape_string($conn, $_POST['passingyear']);
	$honor = mysqli_real_escape_string($conn, $_POST['honor']);
	$media = mysqli_real_escape_string($conn, $_POST['media']);
	$aboutme = mysqli_real_escape_string($conn, $_POST['aboutme']);
	$skills = mysqli_real_escape_string($conn, $_POST['skills']);
	$nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
	$civilstatus = mysqli_real_escape_string($conn, $_POST['civilstatus']);
	$zip = mysqli_real_escape_string($conn, $_POST['zip']);
	$pob = mysqli_real_escape_string($conn, $_POST['pob']);
	$religion = mysqli_real_escape_string($conn, $_POST['religion']);
	$primaryschool = mysqli_real_escape_string($conn, $_POST['primaryschool']);
	$primarypassingyear = mysqli_real_escape_string($conn, $_POST['primarypassingyear']);
	$primaryhonor = mysqli_real_escape_string($conn, $_POST['primaryhonor']);
	$secondaryschool = mysqli_real_escape_string($conn, $_POST['secondaryschool']);
	$secondarypassingyear = mysqli_real_escape_string($conn, $_POST['secondarypassingyear']);
	$secondaryhonor = mysqli_real_escape_string($conn, $_POST['secondaryhonor']);
	$workexperiencecompany = mysqli_real_escape_string($conn, $_POST['workexperiencecompany']);
	$workexperiencejob = mysqli_real_escape_string($conn, $_POST['workexperiencejob']);
	$workexperienceyear = mysqli_real_escape_string($conn, $_POST['workexperienceyear']);

	$uploadOk = true;

	if(is_uploaded_file ( $_FILES['image']['tmp_name'] )) {

		$folder_dir = "../uploads/resume/";

		$base = basename($_FILES['image']['name']); 

		$imageFileType = pathinfo($base, PATHINFO_EXTENSION); 

		$file = uniqid() . "." . $imageFileType; 

		$filename = $folder_dir .$file;  

		if(file_exists($_FILES['image']['tmp_name'])) { 
			
			if($imageFileType == "jpg" || $imageFileType == "png")  {

				if($_FILES['image']['size'] < 5000000) {  // File size is less than 5MB

					move_uploaded_file($_FILES["image"]["tmp_name"], $filename);

				} else {
					$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
					header("Location: edit-profile.php");
					exit();
				}
			} else {
				$_SESSION['uploadError'] = "Wrong Format. Only jpg & png Allowed";
				header("Location: edit-profile.php");
				exit();
			}
		}
	} else {
		$uploadOk = false;
	}

	

	//Update User Details Query
	$sql = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', address='$address', province='$province', city='$city', contactno='$contactno', qualification='$qualification', school='$school', skills='$skills', aboutme='$aboutme', passingyear='$passingyear', honor='$honor', media='$media',  aboutme='$aboutme', skills='$skills', nationality='$nationality', civilstatus='$civilstatus', zip='$zip', pob='$pob', religion='$religion', primaryschool='$primaryschool', primarypassingyear='$primarypassingyear', primaryhonor='$primaryhonor', secondaryschool='$secondaryschool', secondarypassingyear='$secondarypassingyear', secondaryhonor='$secondaryhonor', workexperiencecompany='$workexperiencecompany', workexperiencejob='$workexperiencejob', workexperienceyear='$workexperienceyear'";

	if($uploadOk == true) {
		$sql .= ", logo='$file'";
	}

	$sql .= " WHERE id_user='$_SESSION[id_user]'";

	if($conn->query($sql) === TRUE) {
		$_SESSION['name'] = $firstname.' '.$lastname;
		//If data Updated successfully then redirect to dashboard
		header("Location: edit-profile.php");
		exit();
	} else {
		echo "Error ". $sql . "<br>" . $conn->error;
	}
	//Close database connection. Not compulsory but good practice.
	$conn->close();

} else {
	//redirect them back to dashboard page if they didn't click update button
	header("Location: edit-profile.php");
	exit();
}