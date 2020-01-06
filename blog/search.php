<?php include("conn/connection.php") ;?>
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
		include('include/sidebar.php');
?>
<!--function _make_sounds_like($data){
	$sounds_like="";
	if (isset($data['submit'])){
	$sounds_like.=metaphone($data['search']).' ';
	}
}-->
	<div class="post_body">
		<?php 
		if (isset($_GET['submit'])){
			
			$search_title=$_GET['search'];
			$query="select * from posts where post_title like '%$search_title%'";
		
			$run=mysqli_query($conn,$query);
			/*
			if ($search_id =="Dropbox"){
				header('location:http://www.dropbox.com');
				echo "Sorry, there are no matching result for "."<b>".$search_id." </b>";
			}
			else {
				echo "<b> ".$search_id."</b>"." result found !";
			*/
			   while($row=mysqli_fetch_array($run)){
				/*while ($row = $run->fetch_assoc()) {   */
					$post_id = $row['post_id'];
					$post_title = $row['post_title'];
					$post_image = $row['post_image'];
					$post_content =substr($row['post_content'],0,5);
		
			   }
		?>
	<center>
		<h2><a href="pages.php?id=<?php echo $post_id?>"><?php echo $post_title ?></a></h2>
		<img src="images/tmp/<?php echo $post_image;?>"width="100" height="100">
		<p align="justify"><?php echo $post_content ?></p>

	</center>
		<?php  }	?>
	</div>

<?php  include('include/footer.php');?>

</div>

</body>
</html>