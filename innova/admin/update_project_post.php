<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_project'])) {
		
			$id = $_GET['id'];			
			$title = $_POST['title'];
			// Start Of User Validation
			if (!empty($title)){
				$titlevalue = $_POST['title'];
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "title can't be empty";
				header("location:add_project.php");
				die();
			}
			//title ended

			// image Started
			if (empty($_FILES['image']['name'])) {
				// Update Query
				$update_query = "UPDATE projects SET pro_title='$titlevalue' WHERE pro_id='$id'";
				if (mysqli_query($db,$update_query)){
					header("location:project_list.php");
				}
				else{
					$_SESSION['title_msg'] = "failed to add this project";
					header("location:edit_project.php?id=$id");				
				}
			}// empty image condition

			// if image not empty
			else{
				//start of checking old file
				$select_query = mysqli_query($db, "SELECT pro_img FROM projects WHERE pro_id=$id");
				foreach ($select_query as $check) {
					if ($check['pro_img'] != 'default-image.jpg'){
						$img_loc = '../img/projects/'.$check['pro_img'];
						if (file_exists($img_loc)) {
							unlink($img_loc);
						}
						else{
							//do nothing
						}
					}//end of deleting old file 	
					else{
						//do nothing
					}					
				}//start of checking old file


				$img_explode = explode('.', $_FILES['image']['name']);
				$ext = end($img_explode);
				$format = array('jpg','PNG','gif');

				if (in_array( $ext, $format)) {
					if ($_FILES['image']['size'] < 1099999){
						$filename = $id.'.'.$ext;
						move_uploaded_file($_FILES['image']['tmp_name'], '../img/portfolio/'.$filename);
						$update_query = "UPDATE projects SET pro_title='$titlevalue', pro_img='$filename' WHERE pro_id='$id'";
						if (mysqli_query($db,$update_query)){
							header('location:project_list.php');
						}
						else{
							echo "string";
						}
					}
					else{
						$_SESSION['about_msg'] = "Image Size Shouldn't be less then 1mb";
						header("location:edit_project.php?id=$id;");
					}
				}
				else{
					$_SESSION['about_msg'] = "Only png, jpg and bmp is Supported";
					header("location:edit_project.php?id=$id;");
				}	
			}//end of else condition


		}
	}
?>
<?php require_once('include/footer.php');?>