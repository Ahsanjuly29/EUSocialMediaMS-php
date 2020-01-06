<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['update_contact'])) {
		
			$id = $_GET['id'];			

			// details started
			$address = $_POST['address'];
			// Start Of User Validation
			if (!empty($address)){
				//values for database
				$addressval = $_POST['address'];
			}//Condition empty Title ended 
			else{
				$_SESSION['details_msg'] = "address can't be empty";
				header("location:edit_contact.php?id=$id");
				die();
			}
			// end details 

			// mail started
			$mail = $_POST['mail'];
			// Start Of User Validation
			if (!empty($mail)){
				//values for database
				$mailval = $_POST['mail'];
			}//Condition empty Title ended 
			else{
				$_SESSION['details_msg'] = "mail can't be empty";
				header("location:edit_contact.php?id=$id");
				die();
			}
			// end mail 


			$mobile = $_POST['mobile'];
			if (!empty($mobile)) {

				$mobileval = $_POST['mobile'];
				// Update Query
				$update_query = "UPDATE contact SET 
				con_address='$addressval',
				con_email='$mailval',
				con_mob='$mobileval'
				WHERE con_id='$id'";

				if (mysqli_query($db,$update_query)){
					header('location:contact.php');
				}
				else{
					$_SESSION['details_msg'] = "failed to add this service";
					header("location:edit_contact.php?id=$id");		
				}
			}// empty image condition

		}
	}
?>
<?php require_once('include/footer.php');?>