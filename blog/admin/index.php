<?php include("conn/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['user_name'])){
	
	header("location: log_in.php");
}
else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panal </title>
	<link rel="stylesheet" stylie="text/css" href="admin_style.css">
</head>
<body>
	<div id="top">
		<marquee><p>Today is:&nbsp;&nbsp;
			<?php echo date("jS,F Y");?>
		</p></marquee>
	</div>
	<header class="header">
		<h1>
			<a href="index.php">My personal Blog's Admin Panel</a>
		</h1>
		
	</header>

<aside class="sidebar">
	<h1 class="profile">Welcome: <?php echo $_SESSION['user_name']; ?></h1>
	<h2>Manage contents</h2>
	<ul>
		<li><a href="index.php?view=view"> View Posts </a></li>
		<li><a href="index.php?insert=insert"> Insert new Post</a></li>
		<li><a href="index.php"> Anything else </a></li>
		<li><a href="log_out.php"> LogOut </a></li>
	</ul>
</aside>
<center>
	<h1>This is An Admin Panel</h1>
	<p>it can manage Website contents</p>
	
	<h1><?php echo @$_GET['deleted']; ?></h1>
	<?php
	if(isset($_GET['insert'])){
		include("admin_post.php");
	}?>
	
</center>

<?php
	
	if(isset($_GET['view'])){
?>
<center>
<table border="3">
	<tr>
		<td align="center" colspan="9" bgcolor="orange"> 
			<h1> View All Posts </h1>
		</td>
	</tr>
	<tr>
		<th>Post no: </th>
		<th>Post title: </th>
		<th>Post Date: </th>
		<th>Post Author: </th>
		<th>Post image: </th>
		<th>Post content: </th>
		<th>Edit </a></th>
		<th>remove post </th>
	</tr>
<?php		
		
		
		$i=1;
		$query = "select * from posts order by 1 DESC";
		$run = mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($run)){
			
			$id = $row['post_id'];
			$title = $row['post_title'];
			$date = $row['post_date'];
			$author = $row['post_author'];
			$image = $row['post_image'];
			$content =substr($row['post_content'],0,250);
?>
	<tr align="center">
		<td><?php echo $i++; ?> </td>
		<td><?php echo $title; ?> </td>
		<td><?php echo $date; ?> </td>
		<td><?php echo $author; ?> </td>
		<td><img src="../images/tmp/<?php echo $image; ?>"width="50" height="50"></td>
		<td><?php echo $content; ?> </td>
		
		<td><a href="edit.php?edit=<?php echo $id; ?>"> Edit </a></td>
		
		<td><a href="delete.php?del=<?php echo $id; ?>"> Remove </a></td>
	</tr>
	<?php
		}
	}
?>	
</table>
</center>

</body>
</html>
<?php } ?>