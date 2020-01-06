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
		$user_id=$_GET['add'];
		// $user_id= $_SESSION['user_id'];
?>			
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="" method="POST" enctype="multipart/form-data">
						
						<input type="text" name="r_id" value="<?php echo $user_id;?>" style="display: none;" required /> 
					
						<label for="">social_name</label>
						<input type="text" name="social_name" value="" class="form-control" required  />
						
						<label for="">social_link</label>
						<input type="text" name="social_link" value="" class="form-control" required  />

						<input class="btn" type="submit" name="Submit" value="Submit"/>
					</form>
				</div>
			</div>
<?php   }?>			
<?php

	if(isset($_POST['Submit'])){
		
		// $s_id=$_POST['s_id'];
		
		$social_name=$_POST['social_name'];
		$social_link=$_POST['social_link'];

		 
		$query="INSERT INTO social(user_id,social_name,social_link)
						VALUES('$user_id','$social_name','$social_link')";

		if(mysqli_query($connection,$query)){
			
			echo "<script>window.open('index.php','_self')</script>";
		}
	}		
?>			
<?php

	if(isset($_GET['edit'])){
		$edit_id= $_GET['edit'];
		$user_id= $_SESSION['user_id'];
		
	$query="SELECT * FROM social WHERE so_id=$edit_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);{
			
		$social_name=$row['social_name'];
		$social_link=$row['social_link'];
 
	}
?>			
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="" method="POST" enctype="multipart/form-data">
						
						<input type="text" name="r_id" value="<?php echo $s_id;?>" style="display: none;" required /> 
					
						<label for="">social_name</label>
						<input type="text" name="social_name" value="<?php echo $social_name;?>" class="form-control" required  />
						
						<label for="">social_link</label>
						<input type="text" name="social_link" value="<?php echo $social_link;?>" class="form-control" required  />

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
		
		$social_name=$_POST['social_name'];
		$social_link=$_POST['social_link'];
		
		$query1="UPDATE social SET 
		so_id='$edit_id',
		user_id='$user_id',
		social_name='$social_name',
		social_link='$social_link'
		WHERE so_id='$edit_id'";
		
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





