<?php 
$link='Update';
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
				<h3>Edit Post</h3>
			</div>
			<div class="content">
				<div class="add-student-area">
					<div class="sign-in-area">
						<form action="update_status.php" method="POST" enctype="multipart/form-data">
							
							<div class="sign-input edit-post-author">
								<span style="color:#1ABB9C;"><label for=""><?php echo $_SESSION['admin_name'];?></label></span>
								
								<!---->
								<textarea style="display:none;"  value=""  name="author" id="" cols="30" rows="10"><?php echo $_SESSION['admin_id'];?></textarea>
								
							
							</div>
							<div class="sign-input edit-post-heading">
								<label for="">Heading</label>
								<textarea name="headings" id="" cols="30" rows="10" pattern="[A-Za-z]{3,}"  ></textarea>
							</div>
							<div class="sign-input edit-post-description">
								<label for="">Description</label>
								<textarea name="description" id="" cols="30" rows="10" pattern="[A-Za-z]{3,}" ></textarea>
							</div>

							<div class="sign-input">
								<?php
									$query="select * from catagory Group By Department";
										$run= mysqli_query($connection,$query);
								?>
								<label for="">Department</label>
								<select name="catagory" id="Catagory">
								<?php
									while($catagory=mysqli_fetch_array($run)){
										$department= $catagory['department'];
									?>
									<option value="<?php echo $department;?>"><?php echo $department;?></option>
									<?php } ?>
								</select>
							</div>							

							<div class="sign-input">
								<label for="">Post Type</label>
								<select name="post_type" id="Catagory"  >
									<option value="notice">notice</option>
									<option value="Status">Status</option>
									<option value="Forum">Forum</option>
								</select>
							</div>
						
							
							<div class="sign-input">
								<label for="">Uplod Image</label>
								<input class="upload-image" type="file" name="image" accept="image/*"/>
							</div>
							
							<div class="input-button">
								<input type="submit" name="submit" value="update-status" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php
	if(isset($_POST['submit'])){

		if(empty($_FILES['image']['name'])){
			$image_name = "default-profile-picture.jpg";
		}	
		else{
			$image_type=$_FILES['image']['type'];
			$image_size=$_FILES['image']['size'];
			if($image_type=="image/jpeg" or $image_type=="image/png"){
			if($image_size < 5*1048576){
				$image_name=$_FILES['image']['name'];
				$image_tmp= $_FILES['image']['tmp_name'];
				
				move_uploaded_file($image_tmp,"../image/post/$image_name");
			}
			else{
				echo "<script>alert('Upload Only 5mb File')</script>";
			}
			}
		else{
			echo "<script>alert('Invalid file.Upload only jpg/png')</script>";		
		}}
		
		$headings=$_POST['headings'];
		$description=$_POST['description'];
		$author=$_POST['author'];
		$catagory=$_POST['catagory'];
		$post_type=$_POST['post_type'];
		$date = date('y-m-d');
		$time=date("h:i:sa");
		$user_type=$_SESSION['user_type'];
		
		if($headings=='' or $description==''){
		
			echo"<script>alert('Please Fill The Blank Feild..!!')</script>";
			exit();
		}
		
		$query="INSERT INTO posts(post_headings,post_description,post_author,post_catagory,post_image,post_type,post_date,post_time,user_type)
				VALUES('$headings','$description','$author','$catagory','$image_name','$post_type','$date','$time','$user_type')";
		if(mysqli_query($connection,$query)){
			echo"<script>alert('POST HAS BEEN PUBLISHED')</script>";
		}
		else{
			echo"<script>alert('FAILED TO PUBLISH')</script>";
		}
	}
	else{
	
?>
<!-- Update Admin POST Info-->
<?php
		if(isset($_POST['update_post'])){
			$update_id = @$_GET['edit_post'];
			
			
			$headings=$_POST['headings'];
			$description=$_POST['description'];
			$author=$_POST['author'];
			$catagory=$_POST['catagory'];
			$id1 = $_POST['id'];
			$old_image=$_POST['old_image'];
			$image_type=$_FILES['image']['type'];
			$image_size=$_FILES['image']['size'];
			
			$date = date('y-m-d');
			$time=date("h:i:sa");
						
			if(empty($_FILES['image']['name'])){
				$image_name = "$old_image";
			}	
			else
				if($image_type=="image/jpeg" or $image_type=="image/png"){
					if($image_size < 5*1048576){
						$image_type=$_FILES['image']['type'];
						$image_size=$_FILES['image']['size'];
						$image_name=$_FILES['image']['name'];
						$image_tmp= $_FILES['image']['tmp_name'];
						move_uploaded_file($image_tmp,"../image/post/$image_name");
					}
					else{
						echo "<script>alert('Upload Only 5mb File')</script>";
					}
				}
				else{
					echo "<script>alert('Invalid file.Upload only jpg/png')</script>";		
				}

				$query="UPDATE posts SET post_time='$time',post_date='$date',post_id='$id1',post_headings='$headings',post_description='$description',post_author='$author',post_catagory='$catagory',post_image='$image_name'
					WHERE post_id='$id1'";
			
			$run=mysqli_query($connection,$query);
			if($run){
				echo "<script>alert('Your Post is Updated...!')</script>";
				echo "<script>window.open('all_post.php')</script>";
			}
			else{
				die(mysqli_error($connection));
			}
			
		}
		else{
			die();
		}
	}
?>
<?php	

?>
<?php include('include/footer.php')?>
<?php }?>