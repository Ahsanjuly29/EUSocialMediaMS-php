 <?php
	session_start();
	require('conn/connection.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sign In</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<!--fonts-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Raleway:400,500,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
		
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
	<header class="headaer-bg">
		<div class="container">
			<div class="header-area">
				<div class="row">
					<div class="col-sm-2">
						<figure>
							<a href="index.php" ><img src="image/logo.png" alt="logo"></a>
						</figure>
					</div>
					<div class="col-sm-10">
						<nav>
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="sign_up.php">sign up</a></li>
								<li><a href="about.php">About Us</a></li>
								
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	
	<section class="about-area ">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="about-deatails sign-in-form">
						<p>Please log in with<br/>Phone Number and password</p>
						<form action="sign_in.php" method="POST">
							<label for="mobile">Phone Number</label>
							<input type="text" name="mobile" required=""  placeholder="Phone Number"/>
							<label for="password">Password</label>
							<input type="password" name="password" required=""  placeholder="Password"/>
							<button name="login"=>Log In</button>
							<p>not a member ? </p>
							<p>Create an Account <a style="text-decoration:none" href="sign_up.php"> here...</a><p>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</section>
  <?php
 if (isset($_POST['login'])) {
	 
	 	$mobile=$_POST['mobile'];
	 	$password=$_POST['password'];

		$login="SELECT * FROM user WHERE mobile='$mobile' and password='$password'";
		$result=mysqli_query($conn,$login);
		$row = mysqli_fetch_array($result);{
			$_SESSION['first_name']=$row['fname'];
			$_SESSION['user_id']=$row['user_id'];
		}		  
		  
	      $count = mysqli_num_rows($result);
		/*Condition To Success Log_in */
	      if($count == 1) {
			echo "<script>alert('Welcome')</script>";
			echo "<script>window.open('book_ticket.php','_self')</script>";
	      }
		  else {
	      	$login_error="Number or password is incorrect!";
			echo "<script>alert('Number or password is incorrect...!!')</script>";
			
			/*echo" Error";*/
		}
 }
  ?>
	

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/cascade-slider.js"></script>
        <script src="js/main.js"></script>
		
		
		 <script>
			$('#cascade-slider').cascadeSlider({
			  
			});
		  </script>
    </body>
</html>
