<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_project'])) {

			$title = $_POST['title'];
			// Start Of User Validation
			if (!empty($title)){
				$title_check = "SELECT pro_title FROM projects";
				$title_query = mysqli_query($db,$title_check);
				foreach ($title_query as $titleval){
					if($titleval['pro_title'] != $title){
						$titlevalue = mysqli_real_escape_string($db, $title);
					}// condition Exist or not
					else{
						$_SESSION['title_msg'] = "this title is already Added";
						// header("location:add_project.php");
						echo "<script>window.open('add_project.php','_self');</script>";
						die();
					}
				}//For condition Ended
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "title can't be empty";
				echo "<script>window.open('add_project.php','_self');</script>";
				die();
			}
			//title ended
			$link = $_POST['link'];
			// Start Of User Validation
			if (!empty($link)){
				$link_check = "SELECT pro_link FROM projects";
				$link_query = mysqli_query($db, $link_check);
				foreach ($link_query as $linkvalue){
					$linkvalue = $linkvalue['pro_link'];
					if($linkvalue != $link){
						// $org_link = "<a href=$link;>$link;</a>";
						$linkvalue = mysqli_real_escape_string($db,$link);
					}// condition Exist or not
					else{
						$_SESSION['link_msg'] = "this link is already Added";
						echo "<script>window.open('add_project.php','_self');</script>";
						die();
					}
				}//For condition Ended
			}//Condition empty Title ended 
			else{
				$_SESSION['link_msg'] = "link can't be empty";
				echo "<script>window.open('add_project.php','_self');</script>";
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
				echo "<script>window.open('add_project.php','_self');</script>";
				die();
			}
			//title ended
			if (empty($_FILES['image']['name'])) {
				$image = "default-image.jpg";
				$type = $_POST['type'];
				// insert Query
				$insert_query = "INSERT INTO projects(pro_img,pro_title,pro_link,pro_desc,pro_type) VALUES('$image','$titlevalue','$linkvalue','$descvalue','$type')";
				if (mysqli_query($db,$insert_query)){
					// header("location:project_list.php");
					echo "<script>window.open('project_list.php','_self');</script>";
				}
				else{
					$_SESSION['details_msg'] = "failed to add this project";
					echo "<script>window.open('add_project.php','_self');</script>";
				}
			}// empty image condition

			// if image not empty
			else{
				$type = $_POST['type'];
				// insert Query
			echo	$insert_query = "INSERT INTO projects(pro_title,pro_link,pro_desc,pro_type) VALUES('$titlevalue','$linkvalue','$descvalue','$type')";
				// die();
				if (mysqli_query($db,$insert_query)){
					$img_explode = explode('.', $_FILES['image']['name']);
					$ext = end($img_explode);
					$format = array('jpg','png','gif','JPG','PNG','GIF');
					if (in_array( $ext, $format)) {
						if ($_FILES['image']['size'] < 1099999){
							$last_id = mysqli_insert_id($db);
							$filename = $last_id.'.'.$ext;
							move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/work/'.$filename);
							$update_query = "UPDATE projects SET pro_img='$filename' WHERE pro_id = $last_id";
							if (mysqli_query($db,$update_query)){
								// header('location:project_list.php');
								echo "<script>window.open('project_list.php','_self');</script>";
							}
							else{
								$_SESSION['details_msg'] = "failed to Add this Image";
								echo "<script>window.open('add_project.php','_self');</script>";
							}
						}
						else{
							$_SESSION['details_msg'] = "Only Image should be less then 1 mb";
							echo "<script>window.open('add_project.php','_self');</script>";
						}						
					}
					else{
						$_SESSION['details_msg'] = "Only jpg , bmp and png is allowed";
						echo "<script>window.open('add_project.php','_self');</script>";
					}
				}
				else{
					$_SESSION['details_msg'] = "failed to add this project";
					echo "<script>window.open('add_project.php','_self');</script>";
				}
			}//end of else condition


		}
	}
?>
<?php require_once('include/footer.php');?>