<?php require_once('include/connection.php')?>
<?php

	session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />	
	<style type="text/css">
		body{
			background-image:url("../image/gstar.jpg");
			background-repeat:no-repeat;
			background-size:cover;
/*			overflow:hidden; */
			color:white;
			color:#030305;
		}
		.sign-in-area form .sign-input input{	
			width:90%;
			height:auto;
			line-height:auto;
			text-align:center;
			padding:11px 2px;
			margin:20px 0px;
			border:none;
			border-radius:7px;
		}
		.sign-in-area h3{
			font-size:38px;
			font-weight:bold;
			margin:5px 0px;
		}
		.sign-in-area p{
			margin:15px 0px;
			font-weight:600;
		}
		.sign-in-area form{
			background-image:url("../image/form.jpg");
			background:white;
			opacity:0.9;
			background-repeat:no-repeat;
			background-size:cover;
			height:100%;
			color:white;
			color:#030305;
			margin:4% 0px;
			box-shadow: 5px 2px 5px 0 rgba(0,0,0,1.0),0 2px 10px 0 rgba(0,0,0,1.0);
			z-index:4px;
			display: inline-block;
			padding: 33px;
		}
		.sign-in-area form img{
			width: 64px;
			height: 64px;
			margin:10px;
			margin-top:-100px;
			position:relative;
		}
		.sign-in-area form .sign-input{
			border:1px solid black;
			margin: 5px 0px;
		}
		.sign-in-area form .sign-input input{
			border:1px solid black;
		}
		.sign-in-area form .input-button input{
			padding:10px 30px;
			background:#DE3E4C;
		}
</style>
</head>
<body>
<center>
	<section class="content-section">
		<div class="container">
			<div class="page-area">
				<div class="row">
					<div class="col-md-8 col-sm-6 col-xs-12">
						<div class="page-left">
							<div class="sign-in-area">
								<h3>Admin Log in</h3>
								<p>please put your email and correct passwords together to Enter HomePage</p>						
								<form action="sign_in.php" method="POST"  align="center">
									<img src="../image/logo.ico" alt="HTML5 Icon">
									<div class="sign-input">
										<label for="">Email</label>
										<input type="text" name="admin_id" placeholder="email,mobile,id"/>
									</div>
									<div class="sign-input">
										<label for="">Password</label>
										<input type="password" name="admin_pass" placeholder="Password"/>
									</div>
									<div class="input-button" >
										<input type="submit" name="admin_login" value="Login" />
									</div>
								</form>
							
							</div>
						</div>	<!-- page-left end-->
					</div>	<!-- col-md-8 col-sm-6 col-xs-12 end-->
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="page-right">
							
						</div> <!-- page-right end-->
					</div> <!-- col-md-4 col-sm-6 col-xs-12 end-->
				</div> <!-- row end-->
			</div> <!-- page-area end-->
<?php
if(isset($_POST['admin_login'])){
	
	$admin_id=mysqli_real_escape_string($connection,$_POST['admin_id']);
	
	$admin_pass=mysqli_real_escape_string($connection,$_POST['admin_pass']);
	
	$encrypt= md5($admin_pass);	
	/*  OR email='$admin_id' OR mobile='$admin_id' */	
	
	$login_query = "select * from admin
		WHERE admin_id='$admin_id' AND password='$admin_pass'
		OR 	  email='$admin_id'    AND password='$admin_pass'
		OR    mobile='$admin_id'   AND password='$admin_pass'";
	
	$run=mysqli_query($connection,$login_query);
	if(mysqli_num_rows($run)>0){
		
		$row=mysqli_fetch_array($run);
							   	
		$_SESSION['admin_name']=$row['first_name'];
		$_SESSION['admin_id']=$row['admin_id'];
		$_SESSION['user_type']=$row['user_type'];
		
   echo $_SESSION['admin_type']=$row['admin_type'];
		echo"<script>window.open('index.php','_self')</script>";
	}
	else{
		echo"<script>alert('User Name or Password is Incorrect')</script>";
		
	}
}

?>
			
			
			
		</div> <!-- container end-->
	</section> <!-- content-section end-->
</center>	
	
<?php require_once('include/footer.php'); ?>
</body>
</html>