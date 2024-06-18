<?php include("include/connection.php");
	  session_start();
?>
<?php
if(isset($_GET['delete_post'])){

	$delete_post=$_GET['delete_post'];
	
	$user=$_SESSION['user1'];
	$id = $user.'_'.'id';
	$user_id=$_SESSION['user_id'];

	$delete_query="DELETE FROM posts 
	where post_id='$delete_post' ";

	if(mysqli_query($connection,$delete_query)){
		
		echo "<script> alert('A Post has been removed...')</script>";
			/**/
			
		echo "<script>window.open('my_profile.php?user=$user&&view_user=$user_id','self') </script>";
		
		
		
		
		
		
		//echo "<script>window.open('all_post.php?deleted=teacher has been deleted...','self') </script>";
	}
	else{
		echo "<script> alert('An Admin Can not be removed...')</script>";	
	}
}
else{
	echo "failed";
}
?>
