<?php include('conn/connection.php')?>
<!DOCTYPE HTML>
<html>
<head><title>Delete Data</title>
	<style>
		body{
			text-align:center
		}
	</style>
</head>

<body>			
	<form action="cancel_booking.php" method="POST">
		<input type="number" name="delete" required="" placeholder=" Ex.01682243105 ">
		<button>Cancel Your Ticket</button>
	</form>
<?php

?>
<?php	
/*
	$item=$_POST['delete'];
	if($item){
*/
		if (isset($_POST['delete'])){
/*		UPDATE table SET field = NULL WHERE something = something*/
		
		$mobile=$_POST['mobile'];
		$del ="UPDATE railway SET frm='NULL',too='NULL',type='NULL',time='NULL',ticket_no='NULL',dates='NULL',carriage='NULL'
					WHERE mobile='$mobile'";
	
		$res = mysqli_query($conn,$del);
		if(!$res){
			die("failed to delete");
		}
		else{
			echo "deleted";
	}}
	else{
		die("Need valid item");
	}
?>
</body>
</html>