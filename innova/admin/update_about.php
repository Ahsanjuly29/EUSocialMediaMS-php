<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['update_about'])) {
		
			$id = $_GET['id'];			

			// details started
			$about = $_POST['about'];
			// Start Of User Validation
			if (!empty($about)){
				//values for database
				// $aboutval =  htmlspecialchars($_POST['about'], ENT_QUOTES);
				$aboutval =  mysqli_real_escape_string($db, $_POST['about']);
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "about can't be empty";
				header("location:edit_about.php?id=$id");
				die();
			}

			if (empty($_FILES['image']['name'])) {
				// Update Query
				$update_query = "UPDATE about SET about='$aboutval' WHERE about_id='$id'";
				if (mysqli_query($db,$update_query)){
					header('location:about.php');
				}
				else{
					$_SESSION['title_msg'] = "failed to add this service";
					header("location:edit_about.php?id=$id");				
				}
			}// empty image condition

			// if image not empty
			else{
				//start of checking old file
				$select_query = mysqli_query($db, "SELECT about_img FROM about WHERE about_id=$id");
				foreach ($select_query as $check) {
					if ($check['about_img'] != 'default-image.jpg'){
						$img_loc = '../img/services/'.$check['about_img'];
						if (file_exists($img_loc)) {
							// echo "string";
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
						move_uploaded_file($_FILES['image']['tmp_name'], '../img/'.$filename);
						$update_query = "UPDATE about SET about='$aboutval', about_img='$filename' WHERE about_id='$id'";
						if (mysqli_query($db,$update_query)){
							header('location:about.php');
						}
					}
				}
				
			}//end of else condition


		}
	}
?>
<?php require_once('include/footer.php');?>