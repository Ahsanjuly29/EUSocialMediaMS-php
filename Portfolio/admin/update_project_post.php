<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['update_project'])) {

			$id = $_GET['id'];

			$title = $_POST['title'];
			// Start Of User Validation
			if (!empty($title)){
				$titlevalue = mysqli_real_escape_string($db, $title);
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "title can't be empty";
				// header("location:edit_project.php?id=$id");
				echo "<script>window.open('edit_project.php?id=$id','_self');</script>";
				die();
			}
			//title ended
			$link = $_POST['link'];
			// Start Of User Validation
			if (!empty($link)){
				$linkvalue = mysqli_real_escape_string($db,$link);
			}//Condition empty Title ended 
			else{
				$_SESSION['link_msg'] = "link can't be empty";
				// header("location:edit_project.php?id=$id");
				echo "<script>window.open('edit_project.php?id=$id','_self');</script>";
				die();
			}
			//title ended
			$desc = $_POST['desc'];
			// Start Of User Validation
			if (!empty($desc)){
				$descvalue = mysqli_real_escape_string($db,$desc);
			}//Condition empty Title ended 
			else{
				$_SESSION['desc_msg'] = "desc can't be empty";
				// header("location:edit_project.php?id=$id");
				echo "<script>window.open('edit_project.php?id=$id','_self');</script>";
				die();
			}
			//title ended
			$type = $_POST['type'];			
			if (empty($_FILES['image']['name'])) {
				// insert Query
				$update_query = "UPDATE projects SET 
				pro_title='$titlevalue',
				pro_link='$linkvalue',
				pro_desc='$descvalue',
				pro_type='$type'
				WHERE pro_id='$id'";

				if (mysqli_query($db,$update_query)){
					// header("location:project_list.php");
					echo "<script>window.open('project_list.php','_self');</script>";
				}
				else{
					$_SESSION['details_msg'] = "failed to add this project";
					// header("location:edit_project.php?id=$id");
					echo "<script>window.open('edit_project.php?id=$id','_self');</script>";
				}
			}// empty image condition

			// if image not empty
			else{
				$img_explode = explode('.', $_FILES['image']['name']);
				$ext = end($img_explode);
				$format = array('jpg','png','gif','JPG','PNG','GIF');
				if (in_array( $ext, $format)) {
					if ($_FILES['image']['size'] < 1099999){
						$filename = $id.'.'.$ext;
						move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/work/'.$filename);
						$update_query = "UPDATE projects SET pro_img='$filename',pro_title='$titlevalue', pro_link='$linkvalue', pro_desc='$descvalue', pro_type='$type' WHERE pro_id='$id'";

						if (mysqli_query($db,$update_query)){
							header('location:project_list.php');
							echo "<script>window.open('project_list.php','_self');</script>";
						}
						else{
							$_SESSION['details_msg'] = "failed to Add this Image";
							// header("location:edit_project.php?id=$id");
							echo "<script>window.open('edit_project.php?id=$id','_self');</script>";
						}
					}
					else{
						$_SESSION['details_msg'] = "Only Image should be less then 1 mb";
						// header("location:edit_project.php?id=$id");
						echo "<script>window.open('edit_project.php?id=$id','_self');</script>";
					}						
				}
				else{
					$_SESSION['details_msg'] = "Only jpg , bmp and png is allowed";
					// header("location:edit_project.php?id=$id");
					echo "<script>window.open('edit_project.php?id=$id','_self');</script>";
				}
			}//end of else condition


		}
	}
?>
<?php require_once('include/footer.php');?>