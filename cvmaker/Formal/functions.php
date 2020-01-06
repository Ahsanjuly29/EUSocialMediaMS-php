<?php  require_once("../include/connection.php");?>
<?php
if(!isset($_SESSION['user_id'])){
	
	header("location: sign_in.php");
}
else{
?>
<?php
	
	/*USER*/
	$user_id=$_SESSION['user_id'];
	$query="SELECT * FROM user where user_id=$user_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);
		$user_id=$row['user_id'];
		$first_name=$row['first_name'];
		$last_name=$row['last_name'];
		$mobile=$row['mobile'];
		$email=$row['email'];
		$color=$row['color'];
		// $password=$row['password'];
		$image=$row['image'];
	
	/*Personal*/	
	
	$query="SELECT * FROM Personal where user_id=$user_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);
		$p_user_id=$row['user_id'];
		$designation=$row['designation'];
		$Objective=$row['Objective'];
		$p_mobile=$row['mobile'];
		$father=$row['father'];
		$mother=$row['mother'];
		$dob=$row['dob'];
		$gender=$row['gender'];
		$relationship=$row['relationship'];
		$nationality=$row['nationality'];
		$religion=$row['religion'];
		$per_addr=$row['per_addr'];
		$cur_addr=$row['cur_addr'];

	/*Education*/	
	$query="SELECT * FROM education where user_id=$user_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);
		$e_id=$row['e_id'];
		$e_user_id=$row['user_id'];
		$Title=$row['Title'];
		$Subject=$row['Subject'];
		$Institution=$row['Institution'];
		$start_Year=$row['start_Year'];
		$pass_year=$row['pass_year'];

	/*Skill*/
	$query="SELECT * FROM skill where user_id=$user_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);
		$S_id=$row['s_id'];
		$s_user_id=$row['user_id'];
		$tech_skill=$row['tech_skill'];
		$soft_skill=$row['soft_skill'];
		$comp_skill=$row['comp_skill'];
		$language=$row['language'];
		$strentgh=$row['strentgh'];
		$Interest=$row['Interest'];
	/*Social*/
 	$query="SELECT * FROM social where user_id=$user_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);
		$So_id=$row['so_id'];
		$so_user_id=$row['user_id'];
		$social_name=$row['social_name'];
		$social_link=$row['social_link'];
	
	
	$query="SELECT * FROM reference where user_id=$user_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);
		$r_id=$row['r_id'];
		$r_user_id=$row['user_id'];
		$r_name=$row['name'];
		$r_organization=$row['Organization'];
		$r_designation=$row['Designation'];
		$r_address=$row['Address'];
		$r_mobile=$row['Mobile'];
		$r_email=$row['Email'];
		$r_gender=$row['Gender'];
		
?>
<?php 
	}
?>











