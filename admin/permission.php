<?php include("include/connection.php") ?>
<?php
if(isset($_GET['delete_admin'])){

	$delete_id=$_GET['delete_admin'];

	$delete_query="UPDATE admin SET permission='DELETED'
	where admin_id='$delete_id' ";

	if(mysqli_query($connection,$delete_query)){
		
		echo "<script>window.open('all_admin.php?type=admin','self') </script>";
		echo "<script> alert('An Admin has been removed...')</script>";
	}
	else{
		echo "<script> alert('An Admin Can not be removed...')</script>";	
	}
}
?>
<?php
 if(isset($_GET['approve_student'])){
	
	$student_id= @$_GET['approve_student'];
	$approve_query="UPDATE student SET permission='APPROVED' 
					WHERE student_id='$student_id'";
	if(mysqli_query($connection,$approve_query)){
		
		echo "<script> alert('Student has been Appoved...')</script>";
		echo "<script>window.open('all_students.php?students=APPROVED','self') </script>";
	}
}

?>
<?php
 if(isset($_GET['block_student'])){
	
	$student_id= @$_GET['block_student'];
	$approve_query="UPDATE student SET permission='BLOCKED' 
					WHERE student_id='$student_id'";
	if(mysqli_query($connection,$approve_query)){
		
		echo "<script> alert('Student has been Blocked...')</script>";
		echo "<script>window.open('all_students.php?students=BLOCKED','self') </script>";
	}
}

?>
<?php
 if(isset($_GET['delete_student'])){
	
	$student_id= @$_GET['delete_student'];
	$approve_query="UPDATE student SET permission='DELETED' 
					WHERE student_id='$student_id'";
	if(mysqli_query($connection,$approve_query)){
		
		echo "<script> alert('Student has been Deleted...')</script>";
		echo "<script>window.open('all_students.php?students=pending','self') </script>";
	}
}

?>
<?php
 if(isset($_GET['approve_teacher'])){
	
	$teacher_id= @$_GET['approve_teacher'];
	$approve_query="UPDATE teacher SET permission='APPROVED' 
					WHERE teacher_id='$teacher_id'";
	if(mysqli_query($connection,$approve_query)){
		
		echo "<script> alert('A teacher has been Appoved...')</script>";
		echo "<script>window.open('all_teacher.php?teachers=APPROVED','self') </script>";
	}
}

?>
<?php
 if(isset($_GET['block_teacher'])){
	
	$teacher_id= @$_GET['block_teacher'];
	$approve_query="UPDATE teacher SET permission='BLOCKED' 
					WHERE teacher_id='$teacher_id'";
	if(mysqli_query($connection,$approve_query)){
		
		echo "<script> alert('A teacher has been Blocked...')</script>";
		echo "<script>window.open('all_teacher.php?teachers=BLOCKED','self') </script>";
	}
}

?>
<?php
 if(isset($_GET['delete_teacher'])){
	
	$teacher_id= @$_GET['delete_teacher'];
	$approve_query="UPDATE teacher SET permission='DELETED' 
					WHERE teacher_id='$teacher_id'";
	if(mysqli_query($connection,$approve_query)){
		
		echo "<script> alert('teacher has been Deleted...')</script>";
		echo "<script>window.open('all_teacher.php?teachers=PENDING','self') </script>";
	}
}

?>