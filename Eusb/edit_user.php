<?php 
$page='Profile';
include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['first_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php include('include/blog_header.php')?>

<?php
	if(isset($_GET['edit_user'])){
		$edit_id= $_GET['edit_user'];


		$user=$_SESSION['user1'];
		$id1 = $user.'_'.'id';
		$user_id=$_SESSION['user_id'];

		
		$query = "SELECT * from $user WHERE $id1='$edit_id'";
		
		$run=mysqli_query($connection,$query);
			while($row = mysqli_fetch_array($run)){
				
				$id = $row[$user.'_'.'id'];
				$fname = $row['first_name'];
				$lname = $row['last_name'];
				$email = $row['email'];
				$dob=$row['dob'];
				$dor=$row['dor'];
				$dept=$row['department'];
				$mobile = $row['mobile'];
				$home=$row['home'];
				$p_address=$row['p_address'];
				$religion=$row['religion'];
				$sex = $row['sex'];
				$password= $row['password'];
				$image=$row[$user.'_'.'image'];
			}
	}
	
?>

<section class="admin-content-area">
	<div class="container">
		<div class="admin-content edit-option-area">
			<div class="content-heading">
				<h3>Edit Your Profile:</h3>
			</div>
			<div class="content">
				<div class="add-student-area">
					<div class="edit-post-sign-in-area">
						<form class="form" method="POST" action="update_info.php?update_info=<?php echo $id; ?>" enctype="multipart/form-data">
							<div class="sign-input">
								<input style="display:none;" value="<?php echo $id1; ?>" name="id"/>
								<label for="">First Name</label>
								<input type="text" value="<?php echo $fname; ?>" name="fname"/>
							</div>
							<div class="sign-input">
								<label for="">Last Name</label>
								<input type="text" value="<?php echo $lname; ?>" name="lname"/>
							</div>
							<div class="sign-input">
								<label for="">Email</label>
								<input type="text" value="<?php echo $email; ?>" name="email"/>
							</div>
							<div class="sign-input">
								<label for="">Date Of Birth</label>
								<input type="date" value="<?php echo $dob; ?>" name="dob"/>
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
								<label for="">Phone Number</label>
								<input type="text" value="<?php echo $mobile; ?>" name="mobile"/>
							</div>
							<div class="sign-input">
								<label for="">Home Address</label>
								<input type="text" value="<?php echo $home; ?>" name="home"/>
							</div>
							<div class="sign-input">
								<label for="">Present Address</label>
								<input type="text" value="<?php echo $p_address; ?>" name="p_address"/>
							</div>
							<div class="sign-input">
								<label for="">religion</label>
								<select id="sex" value="<?php echo $religion?>" name="religion">
									
									<option value="Muslim">Muslim</option>
									<option value="Hindu">Hindu</option>
									<option value="other">Other</option>
								</select>
							</div><div class="sign-input">
								<label for="">Gender</label>
								<select id="sex" name="sex"value="<?php echo $sex?>">
									<option value="male">Male</option>
									<option value="female">Female</option>
									<option value="other">Other</option>
								</select>
							</div>
		
							<div class="sign-input">
								<label for="">Password</label>
								<input type="text" id="password" value="<?php echo $password; ?>" name="password" onkeyup='check();'/>
							</div>
							
							<div class="sign-input">
								<label for="">Re Enter Password</label>
								<b><span id='message'></span></b>
								<input type="text" name="confirm_password" id="confirm_password" placeholder="confirm_password"  onkeyup='check();' />
							</div>
							<div class="sign-input">
								<label for="">Old Image</label>
								<span ><img style="background:black; margin-bottom: 20px;" class="upload-image" width="15%" height="15%" src="image/<?php echo $user?>/<?php echo $image;?>"></span>
							</div>
							
							<div class="">
								<div class="edit-upload-image">
									<a href="">Upload Image</a>
									<input class="upload-image" type="file" name="image" accept="image/*"/>
									<input style="display:none;" class="upload-image" type="text" name="old_image" value="<?php echo $image;?>" accept="image/*">
								</div>
							</div>
							
							<div class="input-button">
								<input type="submit" name="update_user" value="Done" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
</div>
<?php include('include/blog_footer.php');?>
<?php }?>
