<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['update_skill'])) {
		
			$id = $_GET['id'];			
			$title = $_POST['title'];
			// Start Of User Validation
			if (!empty($title)){
				$titlevalue = $_POST['title'];
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "title can't be empty";
				header("location:edit_skill.php?id='$id'");
				die();
			}
			//title ended

			// details started
			$ser_details = $_POST['ser_details'];
			// Start Of User Validation
			if (!empty($ser_details)){
				//values for database
				$detailsvalue = htmlspecialchars($_POST['ser_details'], ENT_QUOTES);
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "percent can't be empty";
				header("location:edit_skill.php?id='$id'");
				die();
			}

 
				// Update Query
			  	$update_query = "UPDATE skills SET title='$titlevalue',percent='$detailsvalue' WHERE skill_id='$id'";
			 
				if (mysqli_query($db,$update_query)){
					header("location:add_skill.php");
				}
				else{
					// die();
					// mysql_error($db);
					// die();
					$_SESSION['title_msg'] = "failed to Update this service";
					header("location:edit_skill.php?id=$id");				
				}
 


		}
	}
?>
<?php require_once('include/footer.php');?>