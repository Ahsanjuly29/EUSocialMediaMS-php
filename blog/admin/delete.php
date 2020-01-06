<?php include("conn/connection.php") ?>

<?php
if(isset($_GET['del'])){

	$delete_id=$_GET['del'];

	$delete_query="delete from posts 
	where post_id='$delete_id' ";

	if(mysqli_query($conn,$delete_query)){
		echo "<script> alert('A post has been deleted...')</script>";
		echo "<script>window.open('index.php?deleted=A post has been deleted...','self') </script>";
	}
}
?>