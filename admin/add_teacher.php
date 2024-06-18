<?php 
$link='Teacher';
include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['admin_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php include('include/header.php')?>

<div class="admin-content-area">
	<div class="admin-content">
		<div class="content-heading">
			<h3>Add teacher</h3>
		</div>
		<div class="content">
			<div class="add-student-area">
				<div class="sign-in-area">
					<form action="add_teacher.php" method="POST" enctype="multipart/form-data">
						<div class="sign-input">
							<label for="">Your ID</label>
							<input type="text" name="id" pattern="[0-9]{9,10}" placeholder="Ex.143400016"/>
						</div>
						<div class="sign-input">
							<label for="">First Name</label>
							<input type="text" name="first_name" required placeholder="Muhammad Mahfuz " />
						</div>
						
						<div class="sign-input">
							<label for="">Last Name</label>
							<input type="text" name="last_name" required placeholder="Hasan" />
						</div>
						
						<div class="sign-input">
							<label for="">Email</label>
							<input type="text" name="email" placeholder="mhasan@easternuni.edu.bd" pattern="[a-z0-9._]+@[a-z.-]+\.[a-z]{2,3}$" required />
						</div>
						
						<div class="sign-input">
							<label for="">Date Of Birth</label>
							<input required type="date" name="dob" placeholder=" "/>
						</div>
						
						<div class="sign-input">
							<label for="">Phone Number</label>
							<input  type="text"name="mobile" placeholder="9677523" />
						</div>
						
						<div class="sign-input">
							<label for="">Home Address</label>
							<input required type="text" name="home" placeholder="Dhaka,Bangladesh" />
						</div>
						
						<div class="sign-input">
							<label for="">Current Address</label>
							<input required type="text" name="p_address"  placeholder="Dhaka,Bangladesh"/>
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
							<label for="">Sex</label>
							<select name="sex" id="sex">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="other">Other</option>
							</select>
						</div>

						<div class="sign-input">
							<label for="password">Password</label>
							<!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
								-->
							<input name="password"  pattern="(?=.*\d).{8,}" placeholder="***************************" required id="password" type="password"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup='check();'/>
						</div>

						<div class="sign-input">
							<label for="">Re Enter Password</label>
							<!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
								-->
							<b><span id='message'></b></span>
							<input name="confirm_password" pattern="(?=.*\d).{8,}" placeholder="***************************" required type="password" id="confirm_password" placeholder="confirm_password"  onkeyup='check();' />
							
						</div>
						
						<div class="sign-input">
							<label for="">Uplod Image</label>
							<input class="upload-image" type="file" name="image" accept="image/*">
						</div>
						
						<div class="sign-input">
							<label for="">Designation</label>
							<input type="text"name="designation" />
						</div>
						<div class="sign-input" style="display:none">
							<input type="text" name="permission" value="PENDING">
						</div>
						
						<div class="input-button">
							<input type="submit" name="submit" value="Submit" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



<?php
	if(isset($_POST['submit'])){
		
		date_default_timezone_set("Asia/Dhaka");
		$teacher_id=$_POST['id'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$email=$_POST['email'];
		
		$DOB=$_POST['dob'];
		$DOR=date("Y-m-d");
		$time=date("h:i:sa");
		
		$mobile=$_POST['mobile'];
		$home=$_POST['home'];
		$dept=$_POST['dept'];
		
		$p_address=$_POST['p_address'];
		$Religion=$_POST['religion'];
		$Sex=$_POST['sex'];
		$password=$_POST['password'];
		$cpassword=$_POST['confirm_password'];
		
		$designation=$_POST['designation'];
		if($password!=$cpassword){
			echo "<script>alert('Could Not Register - Password Did Not Match')</script>";
			exit();
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
					$image_tmp= $_FILES['image']['tmp_name'];
					move_uploaded_file($image_tmp,"../image/teacher/$image_name");
				}
				else{
					echo "<script>alert('Upload Only 5mb File')</script>";
				}
			}
			else{
				echo "<script>alert('Invalid file.Upload only jpg/png')</script>";		
			}
		}	
		$query="INSERT INTO teacher(first_name,last_name,email,dob,dor,mobile,home,p_address,religion,sex,password,teacher_image,permission,designation,user_type)
			VALUES('$first_name','$last_name','$email','$DOB','$$DOR','$mobile','$home','$p_address','$Religion','$Sex','$password','$image_name','APPROVED','$designation','teacher')";
		
		if(mysqli_query($connection,$query)){
			echo"<script>alert('TEACHER HAS BEEN ADDED')</script>";
		}
		
		}
	}
	else {
		die();
	}
?>
<?php include('include/footer.php')?>
<?php }?>