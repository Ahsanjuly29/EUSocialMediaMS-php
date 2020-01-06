<?php 
$page='Log In';
require_once('include/connection.php')?>
<?php
	session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page;?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />	
</head>
<body>
	<!-- <header>		
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="sign_in.php"><h1><span>EU</span>Social Book</h1></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">

								<li role="presentation"><a href="sign_up.php">Sign Up</a></li>						
							</ul>
						</div>
					</div>						
				</div>
			</div>	
		</nav>		
	</header>
	<!--    -->
	<section class="sign-bg">
		<div class="container">
			
		<div class="admin-sign-in-position">
				<div class="admin-sign-in-area">
					<div class="admin-sign-in-header">
						<div class="admin-sign-in-header-image">
							<img src="image/defoult.png" alt="">
						</div>
					</div>
					<form action="sign_in.php" method="POST" >
						<div class="admin-sign-input">
							<div class="sign-in-main">
								<select name="user" id="religion">
									<option value="student">Student</option>
									<option value="teacher">Teacher</option>
								</select>
								<span class="sign-icon"><i class="fa fa-user"></i></span>
							</div>
						</div>
						<div class="admin-sign-input">
							<div class="sign-in-main">
								<input type="text" name="user_name" placeholder="email or mobile"/>
								<span class="sign-icon"><i class="fa fa-envelope"></i></span>
							</div>
						</div>
						<div class="admin-sign-input">
							<div class="sign-in-main">
								<input type="password" name="user_pass" placeholder="Password"/>
								<span class="sign-icon"><i class="fa fa-lock"></i></span>
							</div>
						</div>
										
						<div class="admin-input-button">
							<p>User
								<a href="sign_in.php" class="<?php if($page=='Log In'){echo 'form-page-link';}else{echo 'non-active';} ?>">log In</a><span> OR</span>
								<a href="sign_up.php" class="<?php if($page=='register'){echo 'form-page-link';}else{echo 'non-active';} ?>">Register</a>
							</p>
							<input type="submit" name="user_login" value="Login" />
						</div>
					</form>
					
				</div>
			</div>








			
			
<?php
if(isset($_POST['user_login'])){
	
	$user=$_POST['user'];//student or teacher
	$user_id=$user.'_'.'id';
	$user_name=mysqli_real_escape_string($connection,$_POST['user_name']);
	
	$user_pass=mysqli_real_escape_string($connection,$_POST['user_pass']);
	
	$encrypt= md5($user_pass);	

	//$who='$user_name' AND password='$user_pass'OR
	//$who = $_POST[$who.'_'.'id'];
	
	$login_query = "select * from $user
		WHERE $user_id='$user_name' AND password='$user_pass'
		OR	  email='$user_name'    AND password='$user_pass'
		OR    mobile='$user_name'   AND password='$user_pass'";
	
	$run=mysqli_query($connection,$login_query);
	
	$row=mysqli_fetch_array($run);
		$permission=$row['permission'];
	
	
	if(mysqli_num_rows($run)>0){
		
		if($permission=='APPROVED' or $permission=='approved' or $permission=='Approved'){
			
			$_SESSION['first_name']=$row['first_name'];		
			$_SESSION['user_id']=$row[$user.'_'.'id'];
			$_SESSION['user_type']=$row['user_type'];
			$_SESSION['department']=$row['department'];
			$_SESSION['user1']=$user;

			echo"<script>window.open('index.php','_self')</script>";
		}
		else{
			echo "<script>alert('You are a $permission User')</script>";
			echo "<div class='alert alert-danger'>Contact To The Admin For APPROVAL ..!!</div>";
		}		
	}
	else{
		echo"<script>alert('User Name or Password is Incorrect')</script>";
		
	}
}

?>			
			
			
		</div> <!-- container end-->
	</section> <!-- content-section end-->
	
	
<?php require_once('include/blog_footer.php'); ?>
</body>
</html>