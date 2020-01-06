<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user_id'])){
	
	header("location: ../sign_in.php");
}
else{
	require_once("functions.php");	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $first_name,' ',$last_name;?></title>

	<!-- cdn styles  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<!-- downloaded stylesheet -->
	<link rel="stylesheet" href="../css/bootstrap.css" />
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../css/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="../css/bootstrap-reboot.css" />
	<link rel="stylesheet" href="../css/bootstrap-reboot.min.css" />
	<!-- Own created style -->
	<link rel="stylesheet" href="../css/style.css"/>
	<style>
		.main-body h3{
			background-color:<?php echo $color;?>;
			text-align:center;
			color:white;
			font-weight: 600;
			line-height: 1.6;
			font-size:18px;
		}
		.add1 a{
			text-decoration:underline;
			color:black;
		}
		.add1 a:hover{
			text-decoration:none;
			color:#FB6F4C;
		}
		.add1 i{
			float:right;
			opacity:0.1;
			margin:0px;
			font-size: 15px;
			margin:-1px 0px 0px 0px;
		}
		.add1 i:hover{
			opacity:0.5;
			color:gray;
		}
		@media (min-width: 360px) {
			.form-inline input{
				margin: 0 auto;
			}
			.form-inline button{
				margin: 0 auto;
			}
		}
		
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="bg-danger col-md-12 col-sm-12 cover">
			</div>
		</div>
	</div>
				
	<div class="container">
		<div class="row">
			<div class="bg-light col-md-8 col-sm-8">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
						<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
							<li class="nav-item">
								<a class="nav-link" href="home.php">Home </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="personal.php">Personal info</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="education.php">Education</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="skill.php">Skills <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="other.php">Others</a>
							</li>
						</ul>
					</div>
				</nav>	

<?php } ?>				