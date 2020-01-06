
	<?php
		session_start();
		if (!isset($_SESSION['email'])) {
			header('location:../login.php');
		}
		else{
			if ($_SESSION['role']!=2) {
				header('location:../login.php');
			}
		}

		if (!isset($_COOKIE['TestCookie'])) {
			header('location:../login.php');
		}		
	?>