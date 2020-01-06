<?php
include("conn/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert new post</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		.form table tr td textarea{
			border:2px solid transparent;
		}
	</style>
</head>
<body>
	<div>	<?php 	include('include/header.php');?></div>
	<form class="form" method="post" action="insert_post.php" enctype="multipart/form-data" >
		<table align="center" border="10" width="600">
			<tr>
				<td align="center" colspan="5" bgcolor="#3dffd6">
					<h1>insert new post here</h1>
				</td>
			</tr>
			<tr>
				<td> Post Title </td>
				<td><input type="text" name="title" size="40"></td>				
			</tr>	
			<tr>	
				<td> Post Auther </td>
				<td><input type="text" name="author" ></td>
			</tr>	
			<tr>	
				<td> Post Image </td>
				<td><input type="file" name="image"></td>
			</tr>	
			<tr>	
				<td> Post Content </td>
				<td><textarea type="text" name="content" cols="30" rows="20"></textarea></td>
			</tr>	
			<tr>	
				<td align="center" colspan="5"><input type="submit" name="submit" value="publish">
			

<?php
	if(isset($_POST['submit'])){
	 	$title = $_POST['title'];
		$date = date('y-m-d');
	 	$author = $_POST['author'];
	 	$content = $_POST['content'];
		
	 	$image_name= $_FILES['image']['name'];
	 	$image_type= $_FILES['image']['type'];
	 	$image_size= $_FILES['image']['size'];
		$image_tmp= $_FILES['image']['tmp_name'];
	
	if($title=='' or $author=='' or $content==''){
		echo"<script>alert('any field is empty ')</script>";
		exit();
	}
	if($image_type=="image/jpeg" or $image_type=="image/png"){
		if($image_size<=8531370){
			move_uploaded_file($image_tmp,"images/tmp/$image_name");
		}
		else{
			echo "<script>alert('Upload Only 50mb File')</script>";
		}
	}
	else{
		echo "<script>alert('Invalid file.Upload only jpg/png')</script>";		
	}
	

	$query="insert into posts(post_title,post_date,post_author,post_image,post_content)
			values('$title','$date','$author','$image_name','$content')";
	
	if(mysqli_query($conn,$query)){
		echo"<script>alert('POST HAS BEEN PUBLISHED')</script>";
	}
	
 ?>
		<div id="button" href="index.php" ><a href="index.php">INDEX</a></div>
	</td>
</tr>
	
		</table>
	</form>
<?php } ?>


 
	<h4>this website is made by <a href="http://www.ahsanenterprize.com">Ahsan Enterprize</a></h4>
 
</body>


</html>
