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
<?php include('include/header.php')?>

<?php
	if(isset($_GET['edit_admin'])){
		$edit_id= $_GET['edit_admin'];
		$query = "select * from admin where admin_id='$edit_id'";
		$run=mysqli_query($connection,$query);
			while($row = mysqli_fetch_array($run)){
				
				$id1 = $row['admin_id'];
				$fname = $row['first_name'];
				$lname = $row['last_name'];
				$email = $row['email'];
				$mobile = $row['mobile'];
				$sex = $row['sex'];
				$password = $row['password'];
				$image = $row['admin_image'];
			}
	}
	
?>

<div class="admin-content-area">
	<div class="admin-content">
		<div class="content-heading">
			<h3>Edit</h3>
		</div>
		<div class="content">
			<div class="add-student-area">
				<div class="sign-in-area">
					<form class="form" method="POST" action="update_info.php?edit_form=<?php echo $id1;?>" enctype="multipart/form-data">
						<div class="sign-input">
						<!--	<label for="">ID</label> -->
							<input style="display:none;" value="<?php echo $id1; ?>" name="id"/>
							
							<label for="">first_name</label>
							<input style="display:block;" type="text" value="<?php echo $fname; ?>" name="first_name"/>
							
							<label for="">last_name</label>
							<input style="display:block;" type="text" value="<?php echo $lname; ?>" name="last_name"/>
						</div>
						<div class="sign-input">
							<label for="">Email</label>
							<input style="display:block;" type="text" value="<?php echo $email; ?>" name="email"/>
						</div>
						<div class="sign-input">
							<label for="">Phone Number</label>
							<input style="display:block;" type="text" value="<?php echo $mobile; ?>" name="mobile"/>
						</div>
						<div class="sign-input">
							<label for="">Sex</label>
							<select id="sex" value="<?php echo $sex?>" name="sex">
								<option value="male">Male</option>
								<option value="female">Female</option>
								<option value="other">Other</option>
							</select>
						</div>
						<div class="sign-input">
							<label for="">Password</label>
							<input type="text" name="password" id="password" value="<?php echo $password;?>" onkeyup='check();'/>
						</div>
						
						<div class="sign-input">
							<label for="">Re Enter Password</label>
							<b><span id='message'></b></span>
							<input type="text" name="confirm_password" id="confirm_password" value="<?php echo $password;?>" placeholder="confirm_password"  onkeyup='check();' />
						</div>
						
						<div class="sign-input">
							<label for="">Uplod Image</label>
							
							<input class="upload-image" type="file" name="image" value="<?php echo $image;?>"  accept="image/*">
							
							<input style="display:none;" class="upload-image" type="text" name="old_image" value="<?php echo $image;?>" accept="image/*">
							
							<span><img width="10%" height="10%" src="../image/admin/<?php echo $image;?>"></span>										
						</div>
						
						<div class="input-button">
							<input type="submit" name="update_admin" value="Done" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php include('include/footer.php');?>
<?php }?>
