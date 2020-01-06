<?php 
$link='Admin';
include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['admin_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php include('include/header.php');?>

<div class="admin-content-area">
	<div class="admin-content">
		<div class="content-heading">
			<h3>Make Admin</h3>
		</div>
		<div class="content">
			<div class="add-student-area">
				<div class="sign-in-area">
					<form action="make_admin.php" method="POST" enctype="multipart/form-data" >
						
						<div class="sign-input">
							
							<label for="">first_name</label>
							<input type="text" value="<?php echo $fname; ?>" name="first_name"/>
							
							<label for="">last_name</label>
							<input type="text" value="<?php echo $lname; ?>" name="last_name"/>
						</div>
						
						
						
						<div class="sign-input">
							<label for="">Email</label>
							<input type="text" name="email" />
						</div>
						<div class="sign-input">
							<label for="">Phone Number</label>
							<input type="text" name="mobile" />
						</div>
						<div class="sign-input">
							<label for="">Gender</label>
							<select name="sex" id="sex">
								<option value="male">Male</option>
								<option value="female">Female</option>
								<option value="antu">Antu</option>
								<option value="other">Other</option>
							</select>
						</div>
						
						<div class="sign-input">
							<label for="">Permission</label>
							<input type="text" name="permission"/>
						</div>
						<div class="sign-input">
							<label for="">Password</label>
							<input id="password" type="password" name="password" required title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup='check();'  />
						</div>
						<div class="sign-input">
							
							<label for="">Re Enter Password</label>
							<b><span id='message'></b></span>
							<input name="confirm_password"  required type="password" id="confirm_password" placeholder="confirm_password"  onkeyup='check();' />
							
						</div>
						<div class="sign-input">
							<label for="">Uplod Image</label>
							<input class="upload-image" type="file" name="image" accept="image/*">
						</div>
						<div class="input-button">
							<input type="submit" name="submit" value="Done" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<?php

	if(isset($_POST['submit'])){
		
		$fname = $row['first_name'];
		$lname = $row['last_name'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$sex=$_POST['sex'];
		$password=$_POST['password'];
		$catagory=$_POST['department'];
		$user_type=$_POST['user_type'];
		
		$image_type=$_FILES['image']['type'];
		$image_size=$_FILES['image']['size'];

		
		if(empty($_FILES['image']['name'])){
			$image_name = "default-profile-picture.jpg";
			move_uploaded_file($image_tmp,"../image/admin/$image_name");
		}	
		else
			if($image_type=="image/jpeg" or $image_type=="image/png"){
				if($image_size < 5*1048576){
					$image_name=$_FILES['image']['name'];
					
					$image_tmp=$_FILES['image']['tmp_name'];
					
					move_uploaded_file($image_tmp,"image/admin/$image_name");
				}
				else{
					echo "<script>alert('Upload Only 5mb File')</script>";
				}
			}
			else{
				echo "<script>alert('Invalid file.Upload only jpg/png')</script>";
			}

		$query="INSERT INTO admin(name,email,mobile,sex,Permission,password,admin_image,user_type)
						VALUES('$name','$email','$mobile','$sex','sub_admin','$password','$image_name','sub-admin')";
		if(	mysqli_query($connection,$query)){
			echo"<script>alert('ADMIN HAS BEEN INSERTED')</script>";
		}
		
	}
	else {
		die();
	}

?>
<?php include('include/footer.php');?>
<?php }?>