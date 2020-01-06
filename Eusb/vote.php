<?php 	$page='EUSB';require_once("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['first_name'])){
	
	header("location: sign_in.php");
}
else{

?>	
	<?php
		$user_id=$_SESSION['user_id'];
		if(isset($_GET['vote'])){
		
			$post_id = $_GET['forum_no'];
			$query = "SELECT * FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
			$result = mysqli_query($connection, $query);
			
				if(mysqli_num_rows($result) > 0){
					$query = "DELETE FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
					$result = mysqli_query($connection, $query);
					require_once('forum.php');
				}
				else{
					$query = "INSERT INTO vote (post_id, user_id) VALUES ('$post_id', '$user_id')";
					$result = mysqli_query($connection, $query);
				}
		}		
	?>
<?php
}
	?>	