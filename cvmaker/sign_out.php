<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	session_unset();
	header("location:sign_in.php");
	session_destroy(); 

	exit();
?>
