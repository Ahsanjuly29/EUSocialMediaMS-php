<?php
	$host = 'portfolio.ahsanenterprize.com';
	$user = 'ahsanent_admin';
	$password = 'Ahsan143400016';
	$db = 'ahsanent_portf';
	$db = mysqli_connect($host, $user, $password, $db);
	if (!$db) {
		die('Not Connected');
		
	}	
?>
