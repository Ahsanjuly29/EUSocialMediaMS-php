<?php include("index.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panal </title>
</head>
<body>
<?php

	$edit_id= $_GET['edit'];
	$query = "select * from posts where post_id='$edit_id'";
	$run=mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($run)){
			
			$edit_id1 = $row['post_id'];
			$title = $row['post_title'];
			$date = $row['post_date'];
			$author = $row['post_author'];
			$image = $row['post_image'];
			$content = $row['post_content'];
		}
		
?>
<form class="form" method="post" action="edit2.php?edit_form=<?php echo $edit_id1; ?>" enctype="multipart/form-data" >
	<table align="center" border="10" width="600">
		<tr>
			<td align="center" colspan="5" bgcolor="#3dffd6">
				<h1>Update data here</h1>
			</td>
		</tr>
		<tr>
			<td> Post Title </td>
			<td><input type="text" name="title" size="40" value="<?php echo $title; ?>"></td>				
		</tr>	
		<tr>	
			<td> Post Auther </td>
			<td><input type="text" name="author" value="<?php echo $author; ?>"  ></td>
		</tr>	
		<tr>	
			<td> Post Image </td>
			<td>
				<input type="file" name="image">
				<img src="../images/tmp/<?php echo $image; ?>"width="100" height="80" />
				<span> previous image</span>				
			</td>
		</tr>	
		<tr>	
			<td> Post Content </td>
			<td><textarea type="text" name="content" cols="30" rows="20"><?php echo $content; ?> </textarea></td>
		</tr>	
		<tr>	
			<td align="center" colspan="5"><input type="submit" name="update" value="Update now"> </td>
		</tr>
	</table>
</form>
</body>
</html>
















