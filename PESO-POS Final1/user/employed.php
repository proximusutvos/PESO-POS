<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");


	

	//Update User Details Query
	$sql = "UPDATE users SET employed='1' WHERE id_user='$_SESSION[id_user]'";
	if($conn->query($sql) === TRUE) {
	header("Location: ./index.php");
	exit();
}

