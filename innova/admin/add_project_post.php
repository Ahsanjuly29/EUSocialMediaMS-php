<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_project'])) {

			$title = $_POST['title'];
			// Start Of User Validation
			if (!empty($title)){
				$title_check = "SELECT pro_title FROM projects";
				$title_query = mysqli_query($db,$title_check);
				foreach ($title_query as $titlevalue){
					$titlevalue = $titlevalue['pro_title'];
					if($titlevalue != $title){
						$titlevalue = $_POST['title'];
					}// condition Exist or not
					else{
						$_SESSION['title_msg'] = "this title is already Added";
						header("location:add_project.php");
						die();
					}
				}//For condition Ended
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "title can't be empty";
				header("location:add_project.php");
				die();
			}
			//title ended

			if (empty($_FILES['image']['name'])) {
				$image = "default-image.jpg";
				// insert Query
				$insert_query = "INSERT INTO projects(pro_img,pro_title) VALUES('$image','$titlevalue')";
				if (mysqli_query($db,$insert_query)){
					header("location:project_list.php");
				}
				else{
					$_SESSION['details_msg'] = "failed to add this project";
					header("location:add_project.php");
				}
			}// empty image condition

			// if image not empty
			else{

				$insert_query = "INSERT INTO projects(pro_title) VALUES('$titlevalue')";
				if (mysqli_query($db,$insert_query)){
					$img_explode = explode('.', $_FILES['image']['name']);
					$ext = end($img_explode);
					$format = array('jpg','PNG','gif');

					if (in_array( $ext, $format)) {
						if ($_FILES['image']['size'] < 1099999){
							$last_id = mysqli_insert_id($db);
							$filename = $last_id.'.'.$ext;
							move_uploaded_file($_FILES['image']['tmp_name'], '../img/portfolio/'.$filename);
							$update_query = "UPDATE projects SET pro_img='$filename' WHERE pro_id = $last_id";
							if (mysqli_query($db,$update_query)){
								header('location:project_list.php');
							}
						}
					}
				}
			}//end of else condition


		}
	}
?>
<?php require_once('include/footer.php');?>