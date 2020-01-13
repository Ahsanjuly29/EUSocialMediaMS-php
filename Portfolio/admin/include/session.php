<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    //SESSION CHECK
	if (!isset($_SESSION['email'])) {
		echo "<script>window.open('login.php','_self');</script>";
	}
	else{
		if ($_SESSION['role']!=2) {
			echo "<script>window.open('login.php','_self');</script>";
		}
    }
    
    
    
    // COOKIE CHECK		
        // if (!isset($_COOKIE["AEportfolio"])) {
        // echo 'cook';
        //header('location:login.php');
        // echo "<script>window.open('login.php','_self');</script>";
        //error_reporting(E_ALL);}
?>