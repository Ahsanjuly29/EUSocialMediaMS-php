<?php
$page='Register';
require_once('include/connection.php');?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page;?></title>
	<style type="text/css">
		.content-section{
			padding:50px 0px;
			background-image: url(image/blur-image-12.jpg);
			background-repeat: no-repeat;
			background-size: cover;	
		}
	</style>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />	
	<script src="js/check_pass.js"></script>
</head>
<body>

	<section class="content-section">
		<div class="container">
			<div class="page-area">
				<div class="row">
					<div class="col-md-8 col-sm-6 col-xs-12">
						<div class="page-left">
							<h3 class="sign-in-heading" align="center">User
								<a href="sign_in.php" class="<?php if($page=='login'){echo 'form-page-link';}else{echo 'non-active';} ?>">log In</a><span> OR</span>
								<a href="sign_up.php" class="<?php if($page=='Register'){echo 'form-page-link';}else{echo 'non-active';} ?>">Register</a>
							</h3>
							<div class="sign-in-area">
								<form action="sign_up.php" method="POST" enctype="multipart/form-data">
									
									<div class="sign-input">
										<label for="">Choose Who You are</label>
										<select name="user" id="religion">
											<option value="student">Student</option>
											<option value="teacher">Teacher</option>
										</select>
									</div>
									
									<div style="display:none;" class="sign-input">
										<label for="">Your ID</label>
										<input type="text" name="user_id" value=""/>
									</div>
									
									<div class="sign-input">
										<label for="">First Name</label>
										<input type="text" name="first_name"/>
									</div>
									
									<div class="sign-input">
										<label for="">Last Name</label>
										<input type="text" name="last_name"/>
									</div>
									
									<div class="sign-input">
										<label for="">Email</label>
										<input type="text" name="email" pattern="[a-z0-9._]+@[a-z.-]+\.[a-z]{2,3}$" />
									</div>
									
									<div class="sign-input">
										<label for="">Date Of Birth</label>
										<input type="date" name="dob" pattern="[0-9]+-[0-9]+-[0-9]{2,2}$" />
									</div>
									
									<div class="sign-input">
										<label for="">Phone Number</label>
										<input type="text"name="mobile" pattern="[0-9]{11}" />
									</div>
									
									<div class="sign-input">
										<label for="">Home Address</label>
										<input type="text" name="h_address" />
									</div>
									
									<div class="sign-input">
										<label for="">Current Address</label>
										<input type="text"name="p_address" />
									</div>
									
									<div class="sign-input">
									
									<label for="">Religion</label>
										<select name="religion" id="religion">
											<option value="muslim">Muslim</option>
											<option value="hindu">Hindu</option>
											<option value="Cristian">Cristian</option>
											<option value="Other">Other</option>
										</select>
									</div>

									<div class="sign-input">
										<label for="">Gender</label>
										<select name="Gender" id="Gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="other">Other</option>
										</select>
									</div>
									<div class="sign-input">
										<?php
											$query="select * from catagory Group By Department";
												$run= mysqli_query($connection,$query);
										?>
										<label for="">Department</label>
										<select name="department" id="department">
										<?php
											while($catagory=mysqli_fetch_array($run)){
												$department= $catagory['department'];
											?>
											<option value="<?php echo $department;?>"><?php echo $department;?></option>
											<?php } ?>
										</select>
									</div>

									<div class="sign-input">
										<label for="password">Password</label>
										<!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
											-->
										<input name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required type="password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup='check();'/>
									</div>

									<div class="sign-input">
										<label for="">Re Enter Password</label>
										<b><span id='message'></b></span>
										<input name="confirm_password"  required type="password" id="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="confirm_password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup='check();' />
										
									</div>
									
									<div class="sign-input">
										<label for="">Uplod Image</label>
										<input class="upload-image" type="file" name="image" accept="image/*">
									</div>
									
									<div class="sign-input" style="display:none">
										<input type="text" name="permission" value="PENDING">
									</div>
									
									<div class="input-button">
										<input type="submit" name="submit" value="Submit" />
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
			
			
			
		</div> <!-- container end-->
	</section> <!-- content-section end-->
	<?php
	if(isset($_POST['submit'])){
		
		date_default_timezone_set("Asia/Dhaka");
		$user=$_POST['user'];
		
		$user_id=$_POST['user_id'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$email=$_POST['email'];
		
		$DOB=$_POST['dob'];
		$DOR=date("Y-m-d");
		$time=date("h:i:sa");
		

		$mobile=$_POST['mobile'];
		$home=$_POST['h_address'];
		$p_address=$_POST['p_address'];
		$Religion=$_POST['religion'];
		$Gender=$_POST['Gender'];
		$password=$_POST['password'];
		$cpassword=$_POST['confirm_password'];
		$dept=$_POST['department'];
		
		if($password=="" or $cpassword==""){
			echo "Your Password is empty";
			echo "<script>alert('Your Password is empty')</script>";
			echo "<script>alert('Please Give Your Password')</script>";
			//exit();
		}
		else{
			if($password!=$cpassword ){
				echo "<script>alert('Your Password Did not Matched ')</script>";
				echo "<script>window.open('sign_up.php') </script>";
				//exit();
			}
			else{
				$image_type=$_FILES['image']['type'];
				$image_size=$_FILES['image']['size'];
				
				if(empty($_FILES['image']['name'])){
					$image_name = "default-profile-picture.jpg";
				}	
				else{
					if($image_type=="image/jpeg" or $image_type=="image/png"){
						if($image_size < 5*1048576){
							$image_name=$_FILES['image']['name'];
							$image_type=$_FILES['image']['type'];
							$image_size=$_FILES['image']['size'];
							$image_tmp= $_FILES['image']['tmp_name'];
							
							move_uploaded_file($image_tmp,"image/$user/$image_name");
						}
						else{
							echo "<script>alert('Upload Only 5mb File')</script>";
						}
					}
					else{
						echo "<script>alert('Invalid file.Upload only jpg/png')</script>";		
					}	
				}
				if($user=='student'){
				/*
				$query="INSERT INTO student(student_id,first_name,last_name,email,dor,time,dob,mobile,home,p_address,religion,sex,password,student_image,permission,department )
					VALUES('$student_id','$first_name','$last_name','$email','$DOR','$time','$DOB','$mobile','$home','$p_address','$Religion','$Gender','$password','$image_name','APPROVED','$dept')";
				
				*/	$query="INSERT INTO $user(first_name,last_name,email,dor,time,dob,mobile,home,p_address,religion,sex,password,student_image,permission,student_id,department,user_type)
						VALUES('$first_name','$last_name','$email','$DOR','$time','$DOB','$mobile','$home','$p_address','$Religion','$Gender','$password','$image_name','PENDING','$user_id','$dept','$user')";
					
				}
				else if($user=='teacher'){
					$query="INSERT INTO teacher(first_name,last_name,email,dob,dor,mobile,home,p_address,religion,sex,password,teacher_image,permission,teacher_id,designation,department)
					VALUES('$first_name','$last_name','$email','$DOB','$$DOR','$mobile','$home','$p_address','$Religion','$Gender','$password','$image_name','PENDING','user_id','Teacher','$dept','$user')";
				}
			 	
					
				if(mysqli_query($connection,$query)){
					echo"<script>alert('REGISTRATION HAS BEEN COMPLETED')</script>";
					echo "<script>window.open('index.php')</script>";
					
				}
				else{
					die();
				}
			}
		}
	}
	else{
		echo"<script>alert('Complete All the Feilds to REGISTER ')</script>";
	}
	
?>
	<?php require_once('include/blog_footer.php'); ?>
</body>
</html>