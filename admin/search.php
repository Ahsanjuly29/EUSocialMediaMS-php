<?php 
$link='Search';
include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['admin_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php include('include/search_header.php');?>

<?php 

 if (isset($_GET['submit'])){

	$search_item=$_GET['admin_search'];	
	$query= "SELECT * FROM admin WHERE 
		first_name LIKE '%$search_item%' OR 
		email LIKE '%$search_item%' OR 
		admin_id LIKE '%$search_item%'";
		
	$run=mysqli_query($connection,$query);
	while($row=mysqli_fetch_array($run)){
		$admin_id=$row['admin_id'];
		$name=$row['name'];
		$email=$row['email'];
		$image = $row['admin_image'];
	
?>

<!--=============================
Admin design kor
==============================-->
<div>
	<h2><a href="pages.php?id=<?php echo $admin_id;?>">
			<?php echo $name;?>
		</a>
	</h2>
	<p align="justify"><?php echo $email; ?></p>
	<img style="width:20%;height:20%;" src="../image/admin/<?php echo $image;?>">
</div>
<!--=============================

==============================-->

 <?php }}else	?>

<?php
 if (isset($_GET['post_search'])){
	 
	$search_item=$_GET['post'];
	$query= "SELECT * FROM posts WHERE
			post_headings LIKE '%$search_item%' OR 
			post_author LIKE '%$search_item%' OR 
			post_catagory LIKE '%$search_item%'";
			
	$run=mysqli_query($connection,$query);
	while($row=mysqli_fetch_array($run)){
		$post_id = $row['post_id'];
		$post_headings=$row['post_headings'];
		$post_catagory = $row['post_catagory'];
		$post_author = $row['post_author'];
		$post_image = $row['post_image'];
		$post_content =substr($row['post_description'],0,15);
	
?>
<!--=============================
post design kor
==============================-->
<div>
	<h2><a href="pages.php?id=<?php echo $post_id;?>">
			<?php echo $post_headings; ?>
		</a>
	</h2>
	<p align="justify">
		<?php echo $post_catagory; ?><span align="justify">
		<?php echo $post_author; ?></span>
	</p>
	<img style="width:20%;height:20%;" src="../image/post/<?php echo $post_image;?>">
	<p align="justify"><?php echo $post_content;?></p>
</div>
<!--=============================
////Admin design kor
==============================-->	
	<?php  }}else ?>
<?php
 if (isset($_GET['student_search'])){
	
	$search_item=$_GET['student'];
	
	$query= "SELECT * FROM student WHERE 
	first_name LIKE '%$search_item%' OR 
	email LIKE '%$search_item%'OR
	student_id LIKE '%$search_item%'";	

	$run=mysqli_query($connection,$query);
	while($row=mysqli_fetch_array($run)){
		
		$student_id = $row['student_id'];
		$name=$row['first_name'];
		$email = $row['email'];
		$religion=$row['religion'];
		$sex = $row['sex'];
		$image = $row['student_image'];
	
?>
<div>
	<h2>
		<a href="pages.php?id=<?php echo $student_id;?>">
			<?php echo $name; ?>
		</a>
	</h2>
	<p align="justify"><?php echo $email; ?>
	<p align="justify"><?php echo $sex; ?></p>
	<p align="justify"><?php echo $religion; ?></p>
	<p><?php echo 'Dept' ?></p>
	<a href="pages.php?id=<?php echo $student_id;?>">
		<img style="width:20%;height:20%;" src="../image/student/<?php echo $image;?>">
	</a>
</div>
	<?php } }else ?>	
<?php
 if (isset($_GET['teacher_search'])){
	
		$search_item=$_GET['teacher'];
		$query= "SELECT * FROM teacher WHERE 
		first_name LIKE '%$search_item%' OR 
		email LIKE '%$search_item%'OR
		teacher_id LIKE '%$search_item%'";

		$run=mysqli_query($connection,$query);
		while($row=mysqli_fetch_array($run)){
			
			$teacher_id = $row['teacher_id'];
			$name=$row['first_name'];
			$email = $row['email'];
			$sex = $row['sex'];
			$image = $row['teacher_image'];

	?>
<div>
		<h2>
			<a href="pages.php?id=<?php echo $teacher_id;?>">
				<?php echo $name; ?>
			</a>
		</h2>
		<p align="justify"><?php echo $email; ?>
		<p align="justify"><?php echo $sex; ?></p>
		<p><?php echo 'Dept' ?></p>
		<a href="pages.php?id=<?php echo $teacher_id;?>">
			<img style="width:20%;height:20%;" src="../image/teacher/<?php echo $image;?>">
		</a>
</div>		
 <?php  }
	}
	else
		if(mysqli_num_rows($run) == 0){
		require('404.php');
	}
 ?>


<?php include('include/footer.php');?>
<?php  }	?>