<?php 
$link='Update';
include('include/connection.php')?>
<!-- Update Admin Info-->
<?php
	if(isset($_POST['update_admin'])){
		
		$update_id = @$_GET['edit_form'];
		
		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$sex = $_POST['sex'];
		$password = trim($_POST['password'],' ');
		$cpassword =trim($_POST['confirm_password'],' ');
		$old_image=$_POST['old_image'];
		
		// $password = trim($password,' ');
		// $cpassword = trim($cpassword,' ');
		
		if($fname=="" or $lname=="" or $email=="" or $mobile=="" or $password=="" or $cpassword==""){
			echo "<script>alert('Your Left A Feild Empty')</script>";
			echo "<script>window.open('edit_admin.php?edit_admin=$update_id;','_self') </script>";
			exit();
		}
		else{
			if($password!=$cpassword){
				echo "<script>alert('Your Password Did Not Match')</script>";
				echo "<script>window.open('edit_admin.php?edit_admin=$update_id;','_self') </script>";
				exit();
			}
			else{
				$image_type=$_FILES['image']['type'];
				$image_size=$_FILES['image']['size'];
				

				if(empty($_FILES['image']['name'])){
					$image_name = "$old_image";
				}	
				else
					if($image_type=="image/jpeg" or $image_type=="image/png"){
						if($image_size < 5*1048576){
							$image_name=$_FILES['image']['name'];
							$image_tmp= $_FILES['image']['tmp_name'];
							move_uploaded_file($image_tmp,"../image/admin/$image_name");
						}
						else{
							echo "<script>alert('Upload Only 5mb File')</script>";
						}
					}
					else{
						echo "<script>alert('Invalid file.Upload only jpg/png')</script>";		
					}
				
				$query= "UPDATE admin SET admin_id='$update_id',first_name='$fname',last_name='$lname',email='$email',mobile='$mobile',sex='$sex',password='$password',admin_image='$image_name' 
							WHERE admin_id='$update_id'";
				
				$run=mysqli_query($connection,$query);
				if(!$run){
					die(mysqli_error($connection));
				}
				else{
					echo "<script>Your Profile is Updated ! </script>";

					echo "<script>window.open('single_admin.php?view_admin=$update_id','self') </script>";
				}
			}	
		}	
	}
	
?>

<!-- Update USER Info-->
<?php
/*
		if(isset($_POST['update_user'])){
		$update_id = @$_GET['update_info'];

		$first_name=$_POST['fname'];
		$last_name=$_POST['lname'];
		$email=$_POST['email'];
		
		$old_image=$_POST['old_image'];
		
		$DOB=$_POST['dob'];
		$DOR=date("Y-m-d");
		$time=date("h:i:sa");
		
		$mobile=$_POST['mobile'];
		$home=$_POST['home'];
		$p_address=$_POST['p_address'];
		$Religion=$_POST['religion'];
		$sex=$_POST['sex'];
		$password=$_POST['password'];
		$cpassword=$_POST['confirm_password'];
		
		if($password!=$cpassword or $password=="" or $cpassword==""){
			
			echo "<script>alert('Your Password is empty')</script>";
			echo "<script>window.open('edit_user.php?edit_user=$user_id','self')</script>";
			exit();
		}
		else{

		if(empty($_FILES['image']['name'])){
			$image_name = "$old_image";
		}	
		else{
			$image_type=$_FILES['image']['type'];
			$image_size=$_FILES['image']['size'];
			if($image_type=="image/jpeg" or $image_type=="image/png"){
				if($image_size < 5*1048576){
					$image_type=$_FILES['image']['type'];
					$image_size=$_FILES['image']['size'];
					$image_name=$_FILES['image']['name'];
					$image_tmp= $_FILES['image']['tmp_name'];
					move_uploaded_file($image_tmp,"../image/$user/$image_name");
				}
				else{
					echo "<script>alert('Upload Only 5mb File')</script>";
				}
			}
			else{
				echo "<script>alert('Invalid file..! Upload only jpg/png')</script>";		
			}	
		}			
			$query="UPDATE $user SET 
				$id1='$update_id',
				first_name='$first_name',last_name='$last_name',
				email='$email',
				dor='$DOR',time='$time',DOB='$DOB',
				mobile='$mobile',
				home='$home',p_address='$p_address',
				Religion='$Religion',sex='$sex',
				password='$password',
				$user_image='$image_name' 
			WHERE $id1='$update_id'";
		
		$run=mysqli_query($connection,$query);
		if($run){
			echo "<script>alert('Your Profile is Updated...!')</script>";
			echo "<script>window.open('my_profile.php?user=$user1&&view_user=$user_id','self')</script>";
			
			
 		}
		else{
			die();
		}
		}
	}		
*/
?>
</script>