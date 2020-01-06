<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_service'])) {

			$title = $_POST['title'];
			// Start Of User Validation
			if (!empty($title)){
				$title_check = "SELECT ser_title FROM service";
				$title_query = mysqli_query($db,$title_check);
				foreach ($title_query as $titlevalue){
					$titlevalue = $titlevalue['ser_title'];
					if($titlevalue != $title){
						$titlevalue = $_POST['title'];
					}// condition Exist or not
					else{
						$_SESSION['title_msg'] = "this title is already Added";
						header("location:add_service.php");
						die();
					}
				}//For condition Ended
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
				$_SESSION['details_msg'] = "Description can't be empty";
				header("location:add_service.php");
				die();
			}

			if (empty($_FILES['image']['name'])) {
				$image = "default-image.jpg";
				// insert Query
				$insert_query = "INSERT INTO service(ser_title,ser_img,ser_details) VALUES('$titlevalue','$image','$detailsvalue')";
				if (mysqli_query($db,$insert_query)){
					header("location:service_list.php");
				}
				else{
					$_SESSION['details_msg'] = "failed to add this service";
					header("location:add_service.php");
				}
			}// empty image condition

			// if image not empty
			else{

				$insert_query = "INSERT INTO service(ser_title,ser_details) VALUES('$titlevalue','$detailsvalue')";
				if (mysqli_query($db,$insert_query)){
					$img_explode = explode('.', $_FILES['image']['name']);
					$ext = end($img_explode);
					$format = array('jpg','PNG','gif');

					if (in_array( $ext, $format)) {
						if ($_FILES['image']['size'] < 1099999){
							$last_id = mysqli_insert_id($db);
							$filename = $last_id.'.'.$ext;
							move_uploaded_file($_FILES['image']['tmp_name'], '../img/services/'.$filename);
							$update_query = "UPDATE service SET ser_img='$filename' WHERE ser_id = $last_id";
							if (mysqli_query($db,$update_query)){
								header('location:service_list.php');
							}
						}
					}
				}
			}//end of else condition


		}
	}
?>
<?php require_once('include/footer.php');?>