<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_link'])) {

			$title = $_POST['title'];
			// Start Of User Validation
			if (!empty($title)){
				$titlevalue = $_POST['title'];
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "title can't be empty";
				// header("location:add_social.php");
				echo "<script>window.open('add_social.php','_self');</script>";
				die();
			}

			$icon = $_POST['icon'];
			// Start Of User Validation
			if (!empty($icon)){
				$iconvalue = $_POST['icon'];
			}//Condition empty Title ended 
			else{
				$_SESSION['icon_msg'] = "icon can't be empty";
				echo "<script>window.open('add_social.php','_self');</script>";
				die();
			}
			
			//title ended

			$link = $_POST['link'];
			if (!empty($_POST['link'])) {
				// insert Query
				$linkvalue = $_POST['link'];
				$colorvalue = $_POST['color'];

				$insert_query = "INSERT INTO social(social_name,icon_link,social_link,social_color) VALUES('$titlevalue','$iconvalue','$linkvalue','$colorvalue')";
				if (mysqli_query($db,$insert_query)){
					// header("location:social_list.php");
					echo "<script>window.open('social_list.php','_self');</script>";
				}
				else{
					$_SESSION['link_msg'] = "failed to add this social";
					echo "<script>window.open('add_social.php','_self');</script>";
				}
			}// empty image condition
			else{
				$_SESSION['link_msg'] = "link can't be empty";
				echo "<script>window.open('add_social.php','_self');</script>";
				die();
			}
		}
	}
?>
<?php require_once('include/footer.php');?>