<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_service'])) {
		
			$id = $_GET['id'];			
			$title = $_POST['title'];
			// Start Of User Validation
			if (!empty($title)){
				$titlevalue = $_POST['title'];
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "title can't be empty";
				header("location:add_service.php");
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
				$_SESSION['title_msg'] = "title can't be empty";
				header("location:add_service.php");
				die();
			}

			if (empty($_FILES['image']['name'])) {
				// Update Query
				$update_query = "UPDATE service SET ser_title='$titlevalue', ser_details='$detailsvalue' WHERE ser_id='$id'";
				if (mysqli_query($db,$update_query)){
					header("location:service_list.php");
				}
				else{
					$_SESSION['title_msg'] = "failed to add this service";
					header("location:edit_service.php?id=$id");				}
			}// empty image condition

			// if image not empty
			else{
				//start of checking old file
				$select_query = mysqli_query($db, "SELECT ser_img FROM service WHERE ser_id = $id");
				foreach ($select_query as $check) {
					if ($check['ser_img'] != 'default-image.jpg'){
						$img_loc = '../img/services/'.$check['ser_img'];
						if (file_exists($img_loc)) {
							echo "string";
							unlink($img_loc);
						}
					}//end of deleting old file 					 
				}//start of checking old file

				$img_explode = explode('.', $_FILES['image']['name']);
				$ext = end($img_explode);
				$format = array('jpg','PNG','gif');

				if (in_array( $ext, $format)) {
					if ($_FILES['image']['size'] < 1099999){
						$filename = $id.'.'.$ext;
						move_uploaded_file($_FILES['image']['tmp_name'], '../img/services/'.$filename);
						$update_query = "UPDATE service SET ser_title='$titlevalue', ser_img='$filename', ser_details='$detailsvalue'WHERE ser_id='$id'";
						if (mysqli_query($db,$update_query)){
							header('location:service_list.php');
						}
					}
				}
				
			}//end of else condition


		}
	}
?>
<?php require_once('include/footer.php');?>