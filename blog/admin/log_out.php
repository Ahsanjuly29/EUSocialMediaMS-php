<?php

	session_start();
	session_unset();
	header("location:log_in.php");
	session_destroy(); 

	exit();
?>
