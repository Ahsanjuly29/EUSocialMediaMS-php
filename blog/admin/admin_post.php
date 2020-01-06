<?php
/*
	$status = session_status();
	if($status == PHP_SESSION_DISABLED){
		//Sessions are not available
		header("location: log_in.php");
	}
	elseif($status == PHP_SESSION_ACTIVE){
		//Destroy current and start new one
		session_start();
	}

if(!isset($_SESSION)) { 
        session_start(); 
    } 
	session_start();
		if(!isset($_SESSION['user_name'])){
		header("location: log_in.php");
	}
	else{
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert new post</title>
	<style>
		.form table tr td textarea{
			border:2px solid transparent;
		}
	</style>
</head>
<body>
	<form class="form" method="post" action="post.php" enctype="multipart/form-data" >
		<table align="center" border="10" width="600">
			<tr>
				<td align="center" colspan="5" bgcolor="#3dffd6">
					<h1>insert new post here</h1>
				</td>
			</tr>
			<tr>
				<td> Post Title </td>
				<td><input type="text" name="title" size="40"></td>				
			</tr>	
			<tr>	
				<td> Post Auther </td>
				<td><input type="text" name="author" ></td>
			</tr>	
			<tr>	
				<td> Post Image </td>
				<td><input type="file" name="image"></td>
			</tr>	
			<tr>	
				<td> Post Content </td>
				<td><textarea type="text" name="content" cols="30" rows="20"></textarea></td>
			</tr>	
			<tr>	
				<td align="center" colspan="5"><input type="submit" name="submit" value="publish">
			


<?php //} ?>