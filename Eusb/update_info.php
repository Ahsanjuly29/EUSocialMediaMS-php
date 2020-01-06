<?php include('include/connection.php');
	  session_start();
?>
<?php
		date_default_timezone_set("Asia/Dhaka");
		$user1=$_SESSION['user1'];
		$user_id=$_SESSION['user_id'];
		
		
		$user=$_SESSION['user1'];
		$id1 = $user.'_'.'id';
		$user_id=$_SESSION['user_id'];
		
		$user_image=$user.'_'.'image';

?>
<!-- Update USER Info-->
<?php
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
			echo "<script>window.open('edit_user.php?edit_user=$user_id','_self')</script>";
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
					move_uploaded_file($image_tmp,"image/$user/$image_name");
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
			echo "<script>window.open('my_profile.php?user=$user1&&view_user=$user_id','_self')</script>";
			
			
 		}
		else{
			die();
		}
		}
	}	
	
?>
<!-- Update POST Info-->
<?php
	if(isset($_POST['update_post'])){
		$update_id = @$_GET['edit_post'];
		
		$post_id = $_POST['id'];
		$headings=$_POST['headings'];
		$description=$_POST['description'];
		$author=$_POST['author'];
		$catagory=$_POST['catagory'];
		
		$date=date("Y-m-d");
		$time=date("h:i:sa");
		$old_image=$_POST['old_image'];
		
		
		if($headings=="" or $description==""){
			
			echo "<script>alert('Your Password is empty')</script>";
			echo "<script>window.open('edit_post.php?edit_post=$post_id','_self')</script>";
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
					move_uploaded_file($image_tmp,"image/post/$image_name");
				}
				else{
					echo "<script>alert('Upload Only 5mb File')</script>";
				}
			}
			else{
				echo "<script>alert('Invalid file.Upload only jpg/png')</script>";		
			}	
		}
			$query="UPDATE posts SET 
				post_id='$post_id',
				post_headings='$headings',
				post_description='$description',
				post_author='$author',
				post_catagory='$catagory',
				post_image='$image_name',

				post_date='$date',
				post_time='$time'
			WHERE post_id='$post_id'";
		
		$run=mysqli_query($connection,$query);
		if($run){
			echo "<script>alert('Your Profile is Updated...!')</script>";
			echo "<script>window.open('my_profile.php?user=$user1&&view_user=$user_id','_self') </script>";
		}
		else{
			die();
		}
	}
	}
	else{
		die();
	}
?>