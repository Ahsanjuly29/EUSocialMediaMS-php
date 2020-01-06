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
				header("location:add_social.php");
				die();
			}

			$icon = $_POST['icon'];
			// Start Of User Validation
			if (!empty($icon)){
				$iconvalue = $_POST['icon'];
			}//Condition empty Title ended 
			else{
				$_SESSION['icon_msg'] = "icon can't be empty";
				header("location:add_social.php");
				die();
			}
			
			//title ended

			$link = $_POST['link'];
			if (!empty($_POST['link'])) {
				// insert Query
				$linkvalue = $_POST['link'];
				$insert_query = "INSERT INTO social(social_name,icon_link,social_link) VALUES('$titlevalue','$iconvalue','$linkvalue')";
				if (mysqli_query($db,$insert_query)){
					header("location:social_list.php");
				}
				else{
					$_SESSION['link_msg'] = "failed to add this social";
					header("location:add_social.php");
				}
			}// empty image condition
			else{
				$_SESSION['link_msg'] = "link can't be empty";
				header("location:add_social.php");
				die();
			}
		}
	}
?>
<?php require_once('include/footer.php');?>