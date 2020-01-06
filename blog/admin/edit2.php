<?php include("conn/connection.php") ?>

<?php 

	if(isset($_POST['update'])){
	
	$update_id = @$_GET['edit_form'];
	
	$title = $_POST['title'];
	$date = date('y-m-d');
	$author = $_POST['author'];
	$content =  $_POST['content'];
	
	$image_name = $_FILES['image']['name'];
	$image_type = $_FILES['image']['type'];
	$image_size = $_FILES['image']['size'];
	$image_tmp = $_FILES['image']['tmp_name'];

	move_uploaded_file($image_tmp,"../images/tmp/$image_name");
	
	
	$uquery = "UPDATE posts SET post_title='$title',post_date='$date',post_author='$author',post_image='$image_name',post_content='$content'
				WHERE post_id='$update_id' " ;
	
	$result=mysqli_query($conn,$uquery );
	
	if($result){
		echo "Updated ! Now";
	?>
	<span>	<a href="index.php?view=view" >Click here</a> To Index</span>;
	<?php
	}
	else{
		die("Query failed".mysqli_error(""));
	}
	
}

 ?>