<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files  
require_once("../db.php");


$sql = "UPDATE apply_job_post SET status='5' WHERE id_user='$_SESSION[id_user]' AND id_company='$_GET[id]'AND id_jobpost='$_GET[id_jobpost]'";
if($conn->query($sql) === TRUE) {



$sql = "UPDATE users SET employed='1' WHERE id_user='$_SESSION[id_user]'";
if($conn->query($sql) === TRUE) {
	header("Location: index.php");

	}

$sql = "DELETE FROM apply_job_post WHERE id_user='$_SESSION[id_user]' AND status='3' OR status='2'";
if($conn->query($sql)) {
		$sql1 = "DELETE FROM apply_job_post WHERE id_user='$_SESSION[id_user]' AND status='3' OR status='2'";
		if($conn->query($sql1)) {
		}
		header("Location: index.php");
		exit();
	} else {
		echo "Error";

	}
}

?>