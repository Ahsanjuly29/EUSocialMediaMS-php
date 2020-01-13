<?php require_once('include/head.php');?>
<?php
	// session_start();
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$username = $_GET['username'];

		$password = password_hash('123456', PASSWORD_BCRYPT);

		$update = "UPDATE users SET password = '$password' WHERE user_id = '$id' ";
		$update_query = mysqli_query($db,$update);
		if ($update_query) {
			$_SESSION['deleted'] = "$username's Password Has been Reset";
			// header("location:user_data.php");
			echo "<script>window.open('user_data.php','_self');</script>";			
		} // End of $update_query
	}// End of isset

?>
<?php require_once('include/footer.php');?>
