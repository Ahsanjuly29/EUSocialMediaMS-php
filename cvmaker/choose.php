<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(!isset($_SESSION['user_id'])){
	
	header("location: sign_in.php");
}
else{
	require_once("include/connection.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">

	<!-- downloaded stylesheet -->
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-grid.css" />
	<link rel="stylesheet" href="css/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="css/bootstrap-reboot.css" />
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css" />
<!--
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
-->
	<title></title>
	<style type="text/css">
		.container{
			max-width:720px;
		}
		.theme{
			padding:5px ;
			margin:20px 10px ; 
		}
		.theme h2{
			
		}
		.theme img{
			height:200px;
			width:200px;
		}
	</style>
</head>
<body>
	<div class="container">

		<div class="row" align="center">
			<div class="col-sm-12">
				<div class="theme">
					<h2>Choose Your Theme</h2>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="theme">
					<a href="Formal/index.php">
						<img src="image/1_formal.png" alt="" />
						<p>Formal Style 1</p>
					</a>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="theme">
					<a href="Formal2/index.php">
						<img src="image/2_formal.png" alt="" />
						<p>Formal Style 2</p>
					</a>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="theme">
					<a href="stylish/home.php">
						<img src="image/1_Casual.png" alt="" />
						<p>Casual Style 1</p>
					</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>






<?php } ?>