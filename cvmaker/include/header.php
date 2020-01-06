<?php
require_once("connection.php");
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>CV Maker</title>

	<!-- cdn styles  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

	<!-- downloaded stylesheet -->
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-grid.css" />
	<link rel="stylesheet" href="css/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="css/bootstrap-reboot.css" />
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css" />
	<!-- Own created style -->
	<link rel="stylesheet" href="css/style1.css"/>
	<style>

	</style>
</head>
<body class="body bg-light">
	<div class="container bg-white">
		<div class="row">
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group border m-2 mt-3 mb-3 p-2 bg-light" >
					<h3>
						<a href="#" class="text-info">CV</a>
						<a href="#" class="text-success">Maker</a>
					</h3>
				</div>	
			</div>			