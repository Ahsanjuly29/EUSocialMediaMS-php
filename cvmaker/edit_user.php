<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(!isset($_SESSION['user_id'])){
	
	header("location: sign_in.php");
}
else{
	include("include/header.php");
?>
<?php
if(isset($_GET['edit'])){
		$edit_id= $_GET['edit'];
}
$query="SELECT * FROM user WHERE user_id=$edit_id";
$run= mysqli_query($connection,$query);
$row=mysqli_fetch_array($run);{
	$first_name=$row['first_name'];
	$last_name=$row['last_name'];
	$mobile=$row['mobile'];
	$email=$row['email'];
	$color=$row['color'];
	$password=$row['password'];
	$image=$row['image'];
}
?>
 
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="" method="POST" enctype="multipart/form-data">
					<!--	<input type="text" name="user_id" value="<?php echo $edit_id;?>" style="display:  ;"   /> 
					-->
						<label for="">First name</label>
						<input type="text" name="first_name" value="<?php echo $first_name;?>" class="form-control"    />
						
						<label for="">Last name</label>
						<input type="text" name="last_name" value="<?php echo $last_name;?>" class="form-control"  />
						
						<div class="form-group">
							<img src="image/<?php echo $image;?>" alt="" width="50" height="50" align=""/>
							<label for="">Uplod Image</label>
							<input class="form-control upload-image" type="file" name="image" accept="image/*" \>
							<input class="form-control upload-image" type="text" name="old_image" value="<?php echo $image;?>" accept="image/*" style="display:none;" \>
						</div>
						
						<label for="">mobile</label>
						<input type="text" name="mobile" value="<?php echo $mobile;?>" class="form-control"  />
						
						<label for="">Email</label>
						<input type="email" name="email" value="<?php echo $email;?>" class="form-control"  />
						
						<label for="">color</label>
						<input type="color" name="color" value="<?php echo $color;?>" class="form-control"  />
						
						<label for="">Password</label>
						<input type="password" name="password" value="<?php echo $password;?>" pattern="\d{4,}" class="form-control text-danger" placeholder="please Provide Your password in number at least 4 ex.1234"  />
						
						<input class="btn" type="submit" name="submit" value="Submit"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<?php

	if(isset($_POST['submit'])){
		
		// $user_id=$_POST['user_id'];
		$user_id=$edit_id;
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$color=$_POST['color'];
		$password=$_POST['password'];
		$old_image=$_POST['old_image'];

		$image_type=$_FILES['image']['type'];
		$image_size=$_FILES['image']['size'];
		if(empty($_FILES['image']['name'])){
			$image_name = "$old_image";
		}	
		else{
			if($image_type=="image/png" or $image_type=="image/jpg" or $image_type=="image/jpeg"){
				if($image_size < 5*1048576){
					$image_name=$_FILES['image']['name'];
					$image_type=$_FILES['image']['type'];
					$image_size=$_FILES['image']['size'];
					$image_tmp= $_FILES['image']['tmp_name'];
					
					move_uploaded_file($image_tmp,"image/$image_name");
				}
				else{
					echo "<script>alert('Upload Only 5mb File')</script>";
				}
			}
			else{
				echo "<script>alert('Invalid file.Upload only jpg/png')</script>";		
			}
		
		}
		
		$query="UPDATE user SET 
				user_id='$user_id',
				first_name='$first_name',
				last_name='$last_name',
				email='$email',
				mobile='$mobile',
				password='$password',
				image='$image_name',
				color='$color'
			WHERE user_id='$user_id'";
		if(mysqli_query($connection,$query)){
			
			echo "<script>window.open('index.php','_self')</script>";
		}
	}	



?>
</html>
<?php 
	}
?>