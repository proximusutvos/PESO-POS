<?php

session_start();

if(empty($_SESSION['id_user'])) {
	header("Location: index.php");
	exit();
}

require_once("../db.php");

if(isset($_GET)) {

	$sql = "DELETE FROM apply_job_post WHERE id_user='$_GET[id]'";
	if($conn->query($sql)) {
		$sql1 = "DELETE FROM apply_job_post WHERE id_jobpost='$_GET[id]'";
		if($conn->query($sql1)) {
		}
		header("Location: view-job-post.php");
		exit();
	} else {
		echo "Error";
	}
}