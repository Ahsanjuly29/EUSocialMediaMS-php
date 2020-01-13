<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_user_data'])) {

			$username = $_POST['username'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];
			$pass = "123456";
			$password = password_hash($pass , PASSWORD_BCRYPT);
			$about = $_POST['about'];
			$role = $_POST['role'];


			// Start Of User Validation
			if (!empty($username)){
				if (preg_match("/^[A-Za-z0-9]{3,10}[\d]{0,20}$/i",$username)){
					$username_check = "SELECT username FROM users WHERE username = '$username'";
					$username_query = mysqli_query($db,$username_check);
					$usernameassoc = mysqli_fetch_assoc($username_query);
					
					if($usernameassoc['username'] != $username){
											
						if (!empty($name)){
							if (preg_match("/^[A-Za-z]{0,30}[ ]{0,1}[A-Za-z]{3,30}$/i",$name)){
							// end of name Validation

							// Start of Email Validation
								
								if (!empty($email)){
									if (filter_var($email, FILTER_VALIDATE_EMAIL)){
									// end of email Validation
										$email_check = "SELECT email FROM users WHERE email = '$email'";
										$email_query = mysqli_query($db,$email_check);
										$assoc = mysqli_fetch_assoc($email_query);
										
										// print_r($assoc);
										if($assoc['email'] != $email){									
										
											if (empty($mobile) || preg_match("/^[0-9]{0,2}[0-9]{3}[0-9]{4}[0-9]{4}$/", $mobile)){
												$length = strlen($about);
												if(empty($about) || $length > 1){
													$aboutval = htmlspecialchars($about, ENT_QUOTES);

													if (!empty($_FILES['image']['name'])) {
														$img_explode = explode('.', $_FILES['image']['name']);
														$ext = end($img_explode);
														$format = array('jpg','png','gif','JPG','PNG','GIF');

														if (in_array( $ext, $format)) {
															if ($_FILES['image']['size'] < 1099999 ) {

																if ($role == 0 || $role == 1 || $role == 2) {
																	// insert Query
																	$insert_query = "INSERT INTO users(username,name,email,mobile,password,about,role) VALUES('$username','$name','$email','$mobile','$password','$aboutval','$role')";
																	if (mysqli_query($db,$insert_query)){
																		
																		$last_id = mysqli_insert_id($db);
																		$filename = $last_id.'.'.$ext;
																		move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/users/'.$filename);
																		$update_query = "UPDATE users SET image='$filename' WHERE user_id=$last_id";
																		if (mysqli_query($db,$update_query)){
																			// header('location:user_data.php');
																			 echo "<script>window.open('user_data','_self');</script>";
																		}
																	}
																	else{
																		echo "Not inserted In DB";
																		// header("location:add_user.php");
																		echo "<script>window.open('add_user.php','_self');</script>";
																	}
																}
																else{
																	echo "Wrong Role Selected";
																	echo "<script>window.open('add_user.php','_self');</script>";
																}
															}
															else{
																$_SESSION['about_msg'] = "Image Size Shouldn't be less then 1mb";
																echo "<script>window.open('add_user.php','_self');</script>";
															}
														}
														else{
															$_SESSION['about_msg'] = "Only png, jpg and bmp is Supported";
															echo "<script>window.open('add_user.php','_self');</script>";
														}
													}
													else{
														$image = "user-default-image.png";
														// $_SESSION['img_msg'] = "image is empty";
														$insert_query = "INSERT INTO users(username,name,email,mobile,password,image,about,role) VALUES('$username','$name','$email','$mobile','$password','$image','$aboutval','$role')";
														if (mysqli_query($db,$insert_query))			
														{	
															// header('location:user_data.php');
															echo "<script>window.open('user_data','_self');</script>";
														}
														else
														{
															echo "string";
														}
													}
												}
												else{
													$_SESSION['about_msg'] = "Type Atleast 100 Charecters About you";
													echo "<script>window.open('add_user.php','_self');</script>";
												}
											}
											else{
												$_SESSION['mobile_msg'] = "Invalid Mobile number";
												echo "<script>window.open('add_user.php','_self');</script>";
											}
										}
										else{
											$_SESSION['email_msg'] = "This Email Already Exists";
											echo "<script>window.open('add_user.php','_self');</script>";
										}
									}
									else{	
										$_SESSION['email_msg'] = "email Can't Be Invalid.";
										echo "<script>window.open('add_user.php','_self');</script>";
									}
								}
								else{
									$_SESSION['email_msg'] = "email Can't Be Empty.";
									echo "<script>window.open('add_user.php','_self');</script>";
								}

							}
							else{
								$_SESSION['name_msg'] = "name must be between 3 to 30 charecters";
								echo "<script>window.open('add_user.php','_self');</script>";
							}		
						}
						else{
							$_SESSION['name_msg'] = "name Can't Be Empty";
							echo "<script>window.open('add_user.php','_self');</script>";
						}
					}
					else{
						$_SESSION['username_msg'] = "This username Already Exists";
						echo "<script>window.open('add_user.php','_self');</script>";
					}								
				}
				else{
					$_SESSION['username_msg'] = "username must be between 3 to 30 charecters";
					echo "<script>window.open('add_user.php','_self');</script>";
				}		
			}
			else{
				$_SESSION['username_msg'] = "username Can't Be Empty";
				echo "<script>window.open('add_user.php','_self');</script>";
			}
		}
	}
?>
<?php require_once('include/footer.php');?>