<?php require("constants.php");?>

<?php	
	$conn= mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	if(!$conn)
	{
		die("database selection failed".mysqli_error(""));
	} 
	
	$db_select= mysqli_select_db($conn,DB_NAME);
	if(!$db_select)
	{
		die("database selection failed".mysqli_error(""));
	}
	 else
	/*echo "database selected";	*/
?>
