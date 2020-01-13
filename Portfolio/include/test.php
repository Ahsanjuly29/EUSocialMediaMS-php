<?php
	$host = 'sql313.epizy.com';
	$user = 'epiz_24251364';
	$password = 'Mushroom379';
	$db = 'epiz_24251364_portfolio';


	$db = mysqli_connect($host, $user, $password, $db);
    printf("MySQL server version: %s\n", mysqli_get_server_info($db));
	if (!$db) {
		die('Not Connected');
	}

?>