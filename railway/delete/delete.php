<!DOCTYPE HTML>
<?php include('conn/connection.php')?>
<html 
style="text-align:center";>
	<head><title>Delete Data</title>
<body>
<?php
	$item=$_POST['delete'];
	if($item){
		$del ="DELETE FROM railway where mobile='$item'";
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
</div>
</table>
</body>
</html>