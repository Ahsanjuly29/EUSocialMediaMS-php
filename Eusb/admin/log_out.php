<?php

	$link='LogOut';
	session_start();
	session_unset();
	header("location:sign_in.php");
	session_destroy(); 

	exit();
?>
