<?php include("include/header.php");
 if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="sign_up.php" method="POST" enctype="multipart/form-data">
						<label for="">Your Id</label>
						<input type="id" name="user_id" class="form-control" placeholder="1434000" required />
						
						<label for="">First name</label>
						<input type="text" name="first_name" class="form-control" placeholder="Ahsan" required  />
						
						<label for="">Last name</label>
						<input type="text" name="last_name" class="form-control"placeholder="Ahmed" required />
						
						<div class="form-group">
							<label for="">Uplod Image</label>
							<input align="center" type="file" name="image" accept="image/*" class="form-control upload-image">
						</div>
						
						<label for="">mobile</label>
						<input type="text" name="mobile" class="form-control" placeholder="01777777777" required />
						
						<label for="">Email</label>
						<input type="email" name="email" class="form-control"placeholder="example@example.com"required />
						
						<label for="">Password</label>
						<input type="password" name="password" pattern="\d{4,}" class="form-control text-danger" placeholder="please give ur psswrd in number at least 4 ex.1234" required />
						
						<label for="">Chose Color</label>
						<input type="color" name="color" class="form-control" />
						
						<input class="btn" type="submit" name="submit" value="Submit"/>
						
					</form>
					<p class="text-danger pt-2">Already a member ?
						<span>
							<a href="sign_in.php" class="text-info">Click here</a>
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
<?php

	if(isset($_POST['submit'])){
		
		$user_id=$_POST['user_id'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$color=$_POST['color'];
		$password=$_POST['password'];
		
		
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
		$query="INSERT INTO user(user_id,first_name,last_name,mobile,email,password,image,color)
						VALUES('$user_id','$first_name','$last_name','$mobile','$email','$password','$image_name','$color')";
		if(mysqli_query($connection,$query)){
			
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			echo "<script>window.open('index.php','_self')</script>";
		}
		
	}	



?>
</html>