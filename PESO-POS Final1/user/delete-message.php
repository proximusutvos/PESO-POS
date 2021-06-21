<?php

session_start();

if(empty($_SESSION['id_user'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");

if(isset($_GET)) {

	$sql = "DELETE FROM mailbox WHERE id_mailbox='$_GET[id]'";
	if($conn->query($sql)) {
		$sql1 = "DELETE FROM reply_mailbox WHERE id_reply='$_GET[id]'";
		if($conn->query($sql1)) {
		}
		header("Location: mailbox.php");
		exit();
	} else {
		echo "Error";
	}
}