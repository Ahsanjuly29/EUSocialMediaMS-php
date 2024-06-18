<?php

require_once("include/connection.php"); 

session_start();

if(!isset($_SESSION['first_name'])){
	header("location: sign_in.php");
}else{
	if( isset($_GET['vote']) ) {

		$post_id = $_GET['forum_no'];
		$query = "SELECT * FROM vote WHERE post_id='$post_id'";
		$result = mysqli_query($connection, $query);
		
		echo mysqli_num_rows($result);
	}
}

?>