<?php include("include/connection.php") ?>

<?php
if(isset($_GET['delete_admin'])){

	$delete_id=$_GET['delete_admin'];

	$delete_query="DELETE FROM admin
	where admin_id='$delete_id'";

	if(mysqli_query($connection,$delete_query)){
		
		echo "<script> alert('An Admin has been removed...')</script>";
		echo "<script>window.open('all_admin.php?type=admin','_self') </script>";
	}
	else{
		echo "<script> alert('An Admin Can not be removed...')</script>";	
	}
	exit;
}
?>
<?php
if(isset($_GET['delete_student'])){

	$delete_id=$_GET['delete_student'];

	$delete_query="DELETE FROM student 
	where student_id='$delete_id'";

	if(mysqli_query($connection,$delete_query)){
		
		echo "<script> alert('A Student has been removed...')</script>";
		echo "<script>window.open('all_students.php?deleted=Student has been deleted...','_self') </script>";
	}
	else{
		echo "<script> alert('This Student Can not be removed...')</script>";	
	}
	exit;
}
?>
<?php
if(isset($_GET['delete_teacher'])){

	$delete_id=$_GET['delete_teacher'];

	$delete_query="DELETE FROM teacher 
	where teacher_id='$delete_id'";

	if(mysqli_query($connection,$delete_query)){
		
		echo "<script> alert('A Teacher has been removed...')</script>";
		echo "<script>window.open('all_teacher.php?deleted=A teacher has been deleted...','_self') </script>";
	}
	else{
		echo "<script> alert('A Teacher Can not be removed...')</script>";	
	}
	exit;
}
?>
<?php
if(isset($_GET['delete_post'])){

	$delete_post=$_GET['delete_post'];

	$delete_query="DELETE FROM posts 
	where post_id='$delete_post'";

	if(mysqli_query($connection,$delete_query)){
		
		echo "<script>window.open('all_post.php?deleted=A Post has been deleted...','_self') </script>";
		echo "<script> alert('A Post has been removed...')</script>";

	}
	else{
		echo "<script> alert('A Post Can not be removed...')</script>";	
	}
	exit;
}

?>
<?php
if(isset($_GET['delete_comment'])){

	$delete_comment=$_GET['delete_comment'];

	$delete_query="DELETE FROM comment where id='$delete_comment'";

	if(mysqli_query($connection,$delete_query)){
		
		echo "<script>window.open('all_post.php?post_type=status','_self') </script>";
		echo "<script> alert('A Comment has been removed...')</script>";
	}
	else{
		echo "<script> alert('A Comment Can not be removed...')</script>";	
	}
	exit;
}

?>
