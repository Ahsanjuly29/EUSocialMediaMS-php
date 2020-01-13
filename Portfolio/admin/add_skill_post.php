<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_skill'])) {

			$title = $_POST['title'];
			// Start Of User Validation
			if (!empty($title)){
				$title_check = "SELECT title FROM skills";
				$title_query = mysqli_query($db,$title_check);
				foreach ($title_query as $titlevalue){
					$titlevalue = $titlevalue['title'];
					if($titlevalue != $title){
						$titlevalue = $title;
					}// condition Exist or not
					else{
						$_SESSION['title_msg'] = "this title is already Added";
						// header("location:add_skill.php");
						echo "<script>window.open('add_skill.php','_self');</script>";
						die();
					}
				}//For condition Ended
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "title can't be empty";
				echo "<script>window.open('add_skill.php','_self');</script>";
				die();
			}
			//title ended

			// details started
			$percent = $_POST['percent'];
			// Start Of User Validation
			if (!empty($percent)){
				//values for database
				$detailsvalue = htmlspecialchars($_POST['percent'], ENT_QUOTES);
			}//Condition empty Title ended 
			else{
				$_SESSION['details_msg'] = "Description can't be empty";
				echo "<script>window.open('add_skill.php','_self');</script>";
				die();
			}
			// insert Query
				$insert_query = "INSERT INTO skills(title,percent) VALUES('$titlevalue','$detailsvalue')";
 
			if (mysqli_query($db,$insert_query)){
				echo "<script>window.open('add_skill.php','_self');</script>";
			}
			else{
				$_SESSION['details_msg'] = "failed to add this service";
				echo "<script>window.open('add_skill.php','_self');</script>";
			}

		}
	}
?>
<?php require_once('include/footer.php');?>