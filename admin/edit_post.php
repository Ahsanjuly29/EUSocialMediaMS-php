<?php 
$link='Edit Post';
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
	if(isset($_GET['edit_post'])){
		date_default_timezone_set("Asia/Dhaka");
		$edit_id= $_GET['edit_post'];
		$query = "select * from posts where post_id='$edit_id'";
		$run=mysqli_query($connection,$query);
			while($row = mysqli_fetch_array($run)){
				
				$id1 = $row['post_id'];
				$headings=$row['post_headings'];
				$description=$row['post_description'];
				$author=$row['post_author'];
				$catagory=$row['post_catagory'];
				$image=$row['post_image'];
			}
	}
	
?>
		<div class="admin-content-area">
			<div class="admin-content">
				<div class="content-heading">
					<h3>Edit Post</h3>
				</div>
				<div class="content">
					<div class="add-student-area">
						<div class="sign-in-area">
							<form action="update_status.php?edit_post=<?php echo $id1; ?>" enctype="multipart/form-data" method="POST">
								
								<div class="sign-input edit-post-heading">
									<label for="">Heading</label>
									<input style="display:none;" value="<?php echo $id1; ?>" name="id"/>
									<textarea name="headings" id="" value="" cols="30" rows="10"><?php echo $headings; ?></textarea>
								</div>
								
								<div class="sign-input edit-post-description">
									<label for="">Description</label>
									<textarea name="description" value="" id="" cols="30" rows="10"><?php echo $description; ?></textarea>
								</div>
								<div class="sign-input edit-post-author">
									<label for="">Author Name</label>
									<textarea name="author" value="" id="" cols="30" rows="10"><?php echo $author; ?></textarea>
								</div>
								<div class="sign-input">
									<label for="">Catagory</label>
									<select name="catagory" id="" value="">
										<option value="bba">BBA</option>
										<option value="mba">MBA</option>
										<option value="cse">CSE</option>
										<option value="other">Other</option>
									</select>
								</div>
								<div class="sign-input">
									<label for="">Uplod Image</label>
									<input class="upload-image" type="file" name="image" accept="image/*">
									<input style="display:none;" class="upload-image" type="text" name="old_image" value="<?php echo $image;?>" accept="image/*">
									<img src="../image/post/<?php echo $image; ?>"width="100" height="80" />
								</div>
								<div class="input-button">
									<input type="submit" name="update_post" value="Done" />
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
<?php } ?>