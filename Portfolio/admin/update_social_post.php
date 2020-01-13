<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_social'])) {
		
			$id = $_GET['id'];			
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

			//icon ended
			$icon = $_POST['icon'];
			if (!empty($icon)){
				$iconvalue = $icon;
			}//Condition empty Title ended 
			else{
				$_SESSION['icon_msg'] = "icon can't be empty";
				header("location:add_social.php");
				die();
			}
			//title ended

			$link = $_POST['link'];
			if (!empty($_POST['link'])) {
				$linkvalue = $_POST['link'];
				$colorvalue = $_POST['color'];

				// insert Query
				$update_query = "UPDATE social SET 
				social_name='$titlevalue',
				icon_link='$iconvalue',
				social_link='$linkvalue',
				social_color='$colorvalue'
				WHERE social_id='$id'";

				if (mysqli_query($db,$update_query)){
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