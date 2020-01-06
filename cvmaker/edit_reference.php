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
	if(isset($_GET['add'])){
		$user_id= $_GET['add'];
		// $user_id= $_SESSION['user_id'];
?>			
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="" method="POST" enctype="multipart/form-data">
						
						<input type="text" name="r_id" value="<?php echo $user_id;?>" style="display: none;" required /> 
					
						<label for="">Name</label>
						<input type="text" name="name" value="" class="form-control" required  />
						
						<label for="">Gender</label>
						<input type="text" name="Gender" value="" class="form-control" required  />
						
						<label for="">Organization</label>
						<input type="text" name="Organization" value="" class="form-control" required  />
						
						<label for="">Designation</label>
						<input type="text" name="Designation" value="" class="form-control" required  />
						
						<label for="">Mobile</label>
						<input type="text" name="Mobile" value="" class="form-control" required  />

						<label for="">Email</label>
						<input type="text" name="Email" value="" class="form-control" required  />

						<input class="btn" type="submit" name="Submit" value="Submit"/>
					</form>
				</div>
			</div>
<?php   }?>			
<?php

	if(isset($_POST['Submit'])){
		
		// $r_id=$_POST['r_id'];
		
		$name=$_POST['name'];
		$Organization=$_POST['Organization'];
		$Designation=$_POST['Designation'];
		$Mobile=$_POST['Mobile'];
		$Email=$_POST['Email'];
		$Gender=$_POST['Gender'];

		 
		$query="INSERT INTO reference(user_id,name,Organization,Designation,Mobile,Email,Gender )
						VALUES('$user_id','$name','$Organization','$Designation','$Mobile','$Email','$Gender')";

		if(mysqli_query($connection,$query)){
			
			echo "<script>window.open('index.php','_self')</script>";
		}
	}		
?>			
<?php

	if(isset($_GET['edit'])){
		$edit_id= $_GET['edit'];
		$user_id= $_SESSION['user_id'];
	
	$query="SELECT * FROM reference WHERE r_id=$edit_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);{
			
		$name=$row['name'];
		$Organization=$row['Organization'];
		$Designation=$row['Designation'];
		$Mobile=$row['Mobile'];
		$Email=$row['Email'];
		$Gender=$row['Gender'];
	}
?>			
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="" method="POST" enctype="multipart/form-data">
						
						<input type="text" name="r_id" value="<?php echo $r_id;?>" style="display: none;" required /> 
					
						<label for="">name</label>
						<input type="text" name="name" value="<?php echo $name;?>" class="form-control" required  />
						
						<label for="">Gender</label>
						<input type="text" name="Gender" value="<?php echo $Gender;?>" class="form-control" required  />
						
						<label for="">Organization</label>
						<input type="text" name="Organization" value="<?php echo $Organization;?>" class="form-control" required  />
						
						<label for="">Designation</label>
						<input type="text" name="Designation" value="<?php echo $Designation;?>" class="form-control" required  />
						
						<label for="">Mobile</label>
						<input type="text" name="Mobile" value="<?php echo $Mobile;?>" class="form-control" required  />

						<label for="">Email</label>
						<input type="text" name="Email" value="<?php echo $Email;?>" class="form-control" required  />

						<input class="btn" type="submit" name="update" value="update"/>
					</form>
				</div>
			</div>
<?php   } ?>
		</div>
	</div>
</body>
<?php

	if(isset($_POST['update'])){
		
		$name=$_POST['name'];
		$Organization=$_POST['Organization'];
		$Designation=$_POST['Designation'];
		$Mobile=$_POST['Mobile'];
		$Email=$_POST['Email'];
		$Gender=$_POST['Gender'];
		
		
	
		$query1="UPDATE reference SET 
		r_id='$edit_id',
		user_id='$user_id',
		name='$name',
		Organization='$Organization',
		Designation='$Designation',
		Mobile='$Mobile',
		Email='$Email',
		Gender='$Gender'
		WHERE r_id='$edit_id'";
		
		$run=mysqli_query($connection,$query1);
		if($run){
			echo "<script>alert('Your Profile is Updated...!')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
	}	

?>
</html>
<?php
	}?>






