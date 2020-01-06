<?php
	
	require_once('conn/connection.php');
	session_start();
	if(!isset($_SESSION['user_id'])){
		
		header("location: sign_in.php");
	}
	else{
		$user_id=$_SESSION['user_id'];
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Booking Ticket </title>
</head>

<?php
if(isset($_POST['update'])) {
	
	$mobile=$_POST['mobile'];
	$frm =  $_POST['frm'];
	$too =  $_POST['too'];
	$type = $_POST['type'];
	$time = $_POST['time'];
	$ticket_no=$_POST['ticket_no'];
	$dates=$_POST['dates'];	
	$carriage=$_POST['carriage'];

/*	$fname= $_POST['fname'];
	$lname= $_POST['lname'];
	$email= $_POST['email'];
	$address=$_POST['address'];
	$password=$_POST['password'];
*/	
		$update= "UPDATE railway SET frm='$frm',too='$too',type='$type',time='$time',ticket_no='$ticket_no',dates='$dates',carriage='$carriage'
					WHERE user_id ='$user_id'";

		$result=mysqli_query($conn,$update);
			if(!$result)
			{
				die("Query failed".mysqli_error(""));
			}
			else{
					require('my_ticket.php');
				}
}
?>
</html>
<?php } ?>