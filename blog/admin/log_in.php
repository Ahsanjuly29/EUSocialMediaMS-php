<?php include("conn/connection.php") ?>
<?php
session_start();
?>
<html>
	<head>
		<title>Admin Log In</title>
		<link rel="stylesheet" href="#">
	</head>
	<body>
		<form action="log_in.php" method="post">
			<table width="400" align="center" border="20">
				<tr>
					<td colspan="5" align="center" bgcolor="gray">
						<h1>Admin Log in</h1>
					</td>
				</tr>
				<tr>
					<td align="right">User name:</td>
					<td><input type="text" name="user_name" placeholder=""/></td>
				</tr>
				<tr>
					<td align="right">User Password</td>
					<td><input type="password" name="user_password" placeholder=""/></td>
				</tr>
				<tr>
					<td align="center" colspan="5" ><input type="submit" name="login" value="login"/> </td>
				</tr>
			</table>
		
		
		</form>
	
	
	
	
	
	</body>
</html>

<?php
if(isset($_POST['login'])){
	
	$user_name=mysqli_real_escape_string($conn,$_POST['user_name']);
	
	$user_pass=mysqli_real_escape_string($conn,$_POST['user_password']);
	
	$encrypt= md5($user_pass);	
		
	$login_query="select * from admin_login
	where user_name='$user_name' AND 
	user_password='$user_pass'";
	
	$run=mysqli_query($conn,$login_query);
	if(mysqli_num_rows($run)>0){
		
		$_SESSION['user_name']=$user_name;
		
		echo"<script>window.open('index.php','_self')</script>";
	}
	else{
		echo"<script>alert('User Name or Password is Incorrect')</script>";
		
	}
}

?>




