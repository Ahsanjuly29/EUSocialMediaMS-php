<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'cit_crud';

	$db = mysqli_connect($host, $user, $password, $db);
	if (!$db) {
		die('Not Connected');

	}
?>