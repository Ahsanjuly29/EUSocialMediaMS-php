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
	if(isset($_GET['edit_post'])){
		
		$edit_id=$_GET['edit_post'];
		$query = "select * from posts where post_id='$edit_id'";
		$run=mysqli_query($connection,$query);
			while($row = mysqli_fetch_array($run)){
				date_default_timezone_set("Asia/Dhaka");
				$post_id = $row['post_id'];
				$headings=$row['post_headings'];
				$description=$row['post_description'];
				$author=$row['post_author'];
				$catagory=$row['post_catagory'];
				$image=$row['post_image'];
			}
	}
	
?>
<section class="">
	<div class="container">
		<div class="page-area edit-option-area">
			<div class="content-heading">
				<h3>Edit Post</h3>
			</div>
			<div class="content">
				<div class="add-student-area">
					<div class="edit-post-sign-in-area">
						<form action="update_info.php?edit_post=<?php echo $post_id;?>" enctype="multipart/form-data" method="POST">
							
							<div class="sign-input edit-post-heading">
								<label for="">Heading</label>
								<input style="display:none;" value="<?php echo $post_id; ?>" name="id"/>
								
								<textarea name="headings" id="" value="" cols="30" rows="10"><?php echo $headings; ?></textarea>
							</div>
							
							<div class="sign-input edit-post-description">
								<label for="">Description</label>
								<textarea name="description" value="" id="" cols="30" rows="10"><?php echo $description; ?></textarea>
							</div>
							<div class="sign-input edit-post-author">
								<label for="">Author Name</label>
								<textarea style="display:none;" name="author" cols="30" rows="10"><?php echo $author; ?></textarea>
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
								<label for="">Old Image</label>
								<img src="image/post/<?php echo $image; ?>"width="100" height="80" />
							</div>
							<div class="sign-input">
								<div class="edit-upload-image">
									<a href="">Upload Image</a>
									<input class="upload-image" type="file" name="image" accept="image/*"/>
								</div>
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
</section>
</div>
</div>
	
<?php include('include/blog_footer.php')?>
<?php } ?>