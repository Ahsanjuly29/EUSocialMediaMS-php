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
				$_SESSION['add_msg'] = "address can't be empty";
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
				$_SESSION['mail_msg'] = "mail can't be empty";
				header("location:edit_contact.php?id=$id");
				die();
			}
			// end mail 


			$mobile = $_POST['mobile'];
			if (!empty($mobile)) {

				$mobileval = $_POST['mobile'];
				$mobileval2 = $_POST['mobile2'];

				// Update Query
				$update_query = "UPDATE contact SET 
				con_address='$addressval',
				con_email='$mailval',
				con_mob='$mobileval',
				con_mob2='$mobileval2'
				WHERE con_id='$id'";

				if (mysqli_query($db,$update_query)){
					header('location:contact.php');
				}
				else{
					$_SESSION['details_msg'] = "failed to add this service";
					header("location:edit_contact.php?id=$id");		
				}
			}// empty mobile condition
			else{
				$_SESSION['mobile_msg'] = "mobile can't be empty";
				header("location:edit_contact.php?id=$id");
				die();
			}
		}
	}
?>
<?php require_once('include/footer.php');?>