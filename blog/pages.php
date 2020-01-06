<?php include("conn/connection.php") ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dynamic Website with admin panel</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
<body>

<div>
	<?php
		include('include/header.php');
	?>
	<div class="post_body"> 
	<?php
	if(isset($_GET['id'])){
		$page_id=$_GET['id'];
		$query="select * from posts where post_id=$page_id";
		
		$run=mysqli_query($conn,$query);
		
		while($row = mysqli_fetch_array($run)){
		$title=$row['post_title'];
		$date=$row['post_date'];
		$author=$row['post_author'];
		$image=$row['post_image'];
		$content=$row['post_content'];
	}
	?>	
	<h2>
		<?php echo $title ?>
	</h2>
	<p> Published on:&nbsp;&nbsp;<?php echo $date?></p>
	
	<p  align="right">Posted by:&nbsp;&nbsp;<?php echo $author ?></p>
	<center>
		<img src="images/tmp/<?php echo $image;?>"width="600">
	</center>
	
	<p align="justify"><?php echo $content ?></p>
	
	<?php } ?>
	</div>	
	<?php
		include('include/footer.php');
	?>
</div>
</body>
</html>