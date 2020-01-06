<?php require_once('include/login_head.php');?>

<?php

	session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['register'])) {

		// Start Of User Validation
		$username = $_POST['username'];
		if (!empty($username)){
			if (preg_match("/^[a-z]{3,10}[\d]{0,20}$/i",$username)){
				
			// end of user Validation
			
			// Start of Email Validation
			
				$email = $_POST['email'];
				if (!empty($email) ){
					if (filter_var($email, FILTER_VALIDATE_EMAIL)){
						
						$email_check = "SELECT email FROM users WHERE email = '$email'";
						$email_query = mysqli_query($db,$email_check);
						$assoc = mysqli_fetch_assoc($email_query);
						
						// print_r($assoc);
						if($assoc['email'] != $email){
							
							$password = $_POST['password'];
							$cpassword = $_POST['cpassword'];
						
							if ($password =='' || $cpassword =='' ) {
								$_SESSION['pass_msg'] = "password can not be empty";
								header("location:register.php");
							}
							else{
								$strongRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/i";
								if (preg_match($strongRegex, $password)){
									if ($password == $cpassword){
									 
										$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
										
										// insert Query
										$reg_query = "INSERT INTO users(username,email,password,image,role) VALUES('$username','$email','$password','user-default-image.png','1')";

										if (mysqli_query($db,$reg_query)){
											header('location:dashboard.php');
										}
										else{
											echo "Not inserted In DB";
											header("location:register.php");
										}
									}
									else{
										$_SESSION['conf_pass_msg'] = "password not match";
										header("location:register.php");
									}
								}
								else{
									$_SESSION['pass_msg'] = "Min 8 chars, at least 1 uppercase, 1 lowercase, 1 nummeric & 1 special char";
									header("location:register.php");
								}
							}
						}
						else{
							$_SESSION['email_msg'] = "This Email Already Exists";
							header("location:register.php");
						}
					}
					else{	
						$_SESSION['email_msg'] = "email Can't Be Invalid.";
						header("location:register.php");
					}
				}
				else{
					$_SESSION['email_msg'] = "email Can't Be Empty.";
					header("location:register.php");
				}

			}
			else{
				$_SESSION['username_msg'] = "username must be Alphanumeric between 3 to 10 charecters";
				header("location:register.php");
			}		
		}
		else{
			$_SESSION['username_msg'] = "username Can't Be Empty";
			header("location:register.php");
		}
	}
}
?>
<?php require_once('include/login_footer.php');?>