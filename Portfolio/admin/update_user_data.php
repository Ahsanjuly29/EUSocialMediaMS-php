<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['update_user_data'])) {

		 $id = $_GET['id'];
		
		// Start Of User Validation
		$name = $_POST['name'];
		if (!empty($name)){
			if (preg_match("/^[A-Za-z]{0,30}[ ]{0,1}[A-Za-z]{3,30}$/i",$name)){
			// end of name Validation
			
			// Start of Email Validation
				$email = $_POST['email'];
				if (!empty($email)){
					if (filter_var($email, FILTER_VALIDATE_EMAIL)){
							// end of email Validation
						$mobile = $_POST['mobile'];
						if (empty($mobile) || preg_match("/^[0-9]{0,2}[0-9]{3}[0-9]{4}[0-9]{4}$/", $mobile)){
								
							$about = $_POST['about'];
							$length = strlen($about);
							if(empty($about) || $length > 1){
								$aboutval = htmlspecialchars($about, ENT_QUOTES);
								$role = $_POST['role'];
								if ($role == 0 || $role == 1 || $role == 2) {
									if (!empty($_FILES['image']['name'])) {
										$img_explode = explode('.', $_FILES['image']['name']);
										$ext = end($img_explode);
										$format = array('jpg','PNG','gif');
										if (in_array( $ext, $format)) {
											if ($_FILES['image']['size'] < 1099999 ) {
												//start of deleting old file
												$select_query = mysqli_query($db, "SELECT image FROM users WHERE user_id=$id");
												$check = mysqli_fetch_assoc($select_query);
												$img_loc = '../img/users/'.$check['image'];

												if ($check['image'] != 'user-default-image.png'){
													unlink($img_loc);
												}//end of deleting old file 
												// Update Query
												$update_query = "UPDATE users SET 
													name ='$name',
													email = '$email',
													mobile = '$mobile',
													role = '$role',
													about = '$aboutval'
													WHERE user_id = '$id'";
												if (mysqli_query($db,$update_query)){

													$filename = $id.'.'.$ext;
													move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/users/'.$filename);
													$update_query = "UPDATE users SET image='$filename' WHERE user_id=$id";
													if (mysqli_query($db,$update_query)){
														 
														header('location:user_data.php');
													}
												}// End of Database
												else{
												echo	$_SESSION['about_msg'] = "Not inserted In DB1";
													header("location:edit_user.php?id=$id;");
												}

											}// End of Image size Format
											else{
												$_SESSION['about_msg'] = "Image Size Shouldn't be less then 1mb";
												header("location:edit_user.php?id=$id;");
											}
										}// End of Ext Format
										else{
											$_SESSION['about_msg'] = "Only png, jpg and bmp is Supported";
											header("location:edit_user.php?id=$id;");
										}
									}
									else{
										$update_query = "UPDATE users SET 
											name ='$name',
											email = '$email',
											mobile = '$mobile',
											role = '$role',
											about = '$aboutval'
											WHERE user_id = '$id'";
											// die();
										if (mysqli_query($db,$update_query)){
											// echo "<script>window.open('user_data.php','_self')</script>";
											header('location:user_data.php');
										}
										else{
										echo	$_SESSION['about_msg'] = "Not inserted In DB2";
										// 	die();
											header("location:edit_user.php?id=$id;");
										}
									}		
								}// End of Role
								else{
									echo "Wrong Role Selected";
									header("location:edit_user.php?id=$id;");
								}
							}//end of about length chking  
							else{
								$_SESSION['about_msg'] = "Type Atleast 100 Charecters About you";
								header("location:edit_user.php?id=$id;");
							}//end of Else about length chking
						}
						else{
							$_SESSION['mobile_msg'] = "Invalid Mobile number";
							header("location:edit_user.php?id=$id;");
						}
					}
					else{	
						$_SESSION['email_msg'] = "email Can't Be Invalid.";
						header("location:edit_user.php?id=$id;");
					}
				}
				else{
					$_SESSION['email_msg'] = "email Can't Be Empty.";
					header("location:edit_user.php?id=$id;");
				}

			}
			else{
				$_SESSION['name_msg'] = "name must be between 3 to 30 charecters with only one space";
				header("location:edit_user.php?id=$id;");
			}		
		}
		else{
			$_SESSION['name_msg'] = "name Can't Be Empty";
			header("location:edit_user.php?id=$id;");
		}
	}
}
?>
<?php require_once('include/footer.php');?>