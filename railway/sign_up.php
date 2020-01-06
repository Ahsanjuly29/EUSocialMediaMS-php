<?php require_once('conn/connection.php');?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sign Up</title>
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
<?php
if (isset($_POST['signup'])){
	
	$fname= $_POST['fname'];
	$lname= $_POST['lname'];
	$mobile=$_POST['mobile'];
	$email= $_POST['email'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$DOR=date("Y-m-d");
	$password=$_POST['password'];
	

	$insert="INSERT INTO user(fname,lname,mobile,email,address,gender,dor,password)
			values('$fname','$lname','$mobile','$email','$address','$gender','$DOR','$password')";
		$result=mysqli_query($conn,$insert);
			if(!$result)
			{
				die("Query failed".mysqli_error(""));
			}
			else{
				
					session_start();
					$login_query = "select * from user
							WHERE email='$email'    AND password='$password'
							OR    mobile='$mobile'   AND password='$password'";

					$run=mysqli_query($conn,$login_query);

					$row=mysqli_fetch_array($run);{
						$_SESSION['first_name']=$row['fname'];
						$_SESSION['user_id']=$row['user_id'];
					}
					if(mysqli_num_rows($run)>0){
						echo "<script>alert('Successfully Completed The Registration')</script>";
						echo "<script>alert('Welcome')</script>";
						echo "<script>window.open('book_ticket.php','_self')</script>";
						
				}
			}
	}
?>		
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
								<li><a href="sign_in.php">sign In</a></li>
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
						
						<form action="" method="POST" class="form">
							<label for="fname">First Name</label>
							<input type="text" name="fname" required=""  placeholder="First Name" title="Minimum Three Alphabets"/>
							
							<label for="lname">Last Name</label>
							<input type="text" name="lname" required=""  placeholder="Last Name" title="Minimum Three Alphabets"/>
							<!-- pattern="[A-Za-z]{3,}" -->
							<label for="number">Phone Number</label>
							<input type="text" name="mobile" required="" placeholder="Phone Number" title="use valid Number" />
							<!--pattern="[0-9]{11}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'-->							
							<label for="">Gender</label>
								<br/><select name="gender" title="">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
								
							<span id="email">
								<label id="email" for="email">Email</label>
								<input type="email" name="email" required="" placeholder="example1234@example.com"  title="use valid email"/>
								<!--pattern="[a-z0-9._]+@[a-z.-]+\.[a-z]{2,3}$" -->
							</span>
							<label for="address">Address</label>
							<input type="text" name="address" required=""  placeholder="Address"/>
							
							<label for="password"> password </label>
							<input name="password" id="password" type="password" onkeyup='check();'/>
							<!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"-->
							<label>confirm password</label>
							<input type="password" name="confirm_password" id="confirm_password" placeholder="confirm_password"  onkeyup='check();' required="" /> 
							<span id='message'></span></br>
							
							<button type="submit" name="signup"> Submit </button>
							<p><br/> Already a member ? <a style="text-decoration:none" href="sign_in.php">Log in...</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/cascade-slider.js"></script>
        <script src="js/main.js"></script>
		<script>
			var check = function() {
			if (document.getElementById('password').value ==
			document.getElementById('confirm_password').value) {
			document.getElementById('message').style.color = 'green';
			document.getElementById('message').innerHTML = 'matching';
			} else {
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'not matching';
			}
			}
		</script>
		<script>
			$('#cascade-slider').cascadeSlider({
			  
			});
		</script>
    </body>
</html>
