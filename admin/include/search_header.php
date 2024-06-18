<?php require_once('connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $link;?></title>
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/admin-style.css">

	<!-- Check password Confirmation -->
	<script src="js/check_pass.js"></script>
	<!--Active Link-->
	<script type="text/javascript" src="js/script.js"></script>
	<!-- Footer js -->
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../js/sidebar.js"></script>
	<script src="../js/ui.js"></script>

	<script>
		$(document).ready(function(){
			$(".side-nav > ul > li").click(function(e){
				e.stopPropagation()
			});
			$(".side-nav > ul > li > a").click(function(){
				$('.side-nav > ul > li > a').not(this).siblings('ul').slideUp();
				$(this).siblings('ul').toggle(500);
			});

			$(document).on('click', () => {
				$('.side-nav > ul > li > ul').slideUp();
			})
		});

	</script>
</head>
<body>
	
	<div class="page-area">
		<div class="left-side">
		
			<?php require_once('translate.php');?>
			
			<div class="logo">
				<h2><a href="index.php"><span>EU</span></a>Social Book</h2>
				</br>
				<p>	<span>Today is:&nbsp;</span><?php date_default_timezone_set("Asia/Dhaka");echo date("jS,F Y"); ?>
					<span><?php echo date("l");?></span>
				</p>	
			</div>
			<div class="side-nav">
				<ul>
					<li class="<?php if($link=='Home'){echo 'active';}else{echo 'non-active';} ?>">
						<a class="" href="index.php">Admin Home</a>
					</li>
					
					<li class="<?php if($link=='Student'){echo 'active';}else{echo 'non-active';} ?>">
						<a class="dropbtn drop-1">student Profile
							  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-content drop-content-1" id="myDropdown">
							<li >
								<a href="add_student.php">Add Student</a>
							</li>
							<li >
								<a href="all_students.php?students=APPROVED">Approved</a>
							</li>
							<li >
								<a href="all_students.php?students=BLOCKED">Blocked</a>
							</li>
							<li >
								<a href="all_students.php?students=PENDING">Pending</a>
							</li>
						</ul>
					</li>
					
					<li class="<?php if($link=='Teacher'){echo 'active';}else{echo 'non-active';} ?>">
						<a class="dropbtn drop-1">Teachers Profile
							  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-content drop-content-1" id="myDropdown">
							<li>
								<a href="add_teacher.php">Add Teacher</a>
							</li>
							<li>
								<a href="all_teacher.php?teachers=APPROVED">Approved</a>
							</li>
							<li>
								<a href="all_teacher.php?teachers=BLOCKED">Blocked</a>
							</li>
							<li>
								<a href="all_teacher.php?teachers=PENDING">Pending</a>
							</li>
						</ul>
					</li>
					<li class="<?php if($link=='Admin'){echo 'active';}else{echo 'non-active';} ?>">
						<a class="dropbtn drop-1">Admins Profile
							  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-content drop-content-1" id="myDropdown">
							<li><a href="all_admin.php?type=admin">All Admin</a></li>
							<li><a href="all_admin.php?type=sub_admin">Sub Admins</a></li>
							<li style="display:none;"><a href="make_admin.php">Make Admin</a></li>
						</ul>
					</li>
					
					<li class="<?php if($link=='Update'){echo 'active';}else{echo 'non-active';} ?>">
						<a class="dropbtn drop-2">Update
							  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-content drop-content-2" id="myDropdown">
							<li><a href="update_status.php">Update A new Status </a></li>
							<li><a href="add_Subject.php?subject=subject">Add Subject</a></li>
						</ul>
					</li>
					<li class="<?php if($link=='All Post'){echo 'active';}else{echo 'non-active';} ?>">
						<a href="all_post.php">All Post</a>
					</li>
					<li class="<?php if($link=='All User'){echo 'active';}else{echo 'non-active';} ?>">
						<a href="all_user.php?subject">All User</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="right-side">

			<div class="admin-menu">
				<ul>	
					<li class="dropdown">
						<div class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-envelope"></i> <span class="number-count">6</span></div>
						<ul class="dropdown-menu">
							 <li><a href="#">
								<img src="../image/1.jpg" alt="" />
								<p><span>Chayon</span> Update a status</p>
								<div class="time">10 Min ago</div>
							 </a></li>
							 <li><a href="#">
								<img src="../image/1.jpg" alt="" />
								<p><span>Chayon</span> Send a request</p>
								<div class="time">10 Min ago</div>
							 </a></li>
							 <li><a href="#">
								<img src="../image/1.jpg" alt="" />
								<p><span>Chayon</span> Delete a post</p>
								<div class="time">10 Min ago</div>
							 </a></li>
							 <li><a href="#">See All
							 </a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<div class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-bell"></i> <span class="number-count">10</span></div>
						<ul class="dropdown-menu">
<?php
						$query="SELECT * from student WHERE permission='pending' ORDER BY 1 DESC";
						$run= mysqli_query($connection,$query);
						while($row=mysqli_fetch_array($run)){
							
							$id = $row['student_id'];
							$name = $row['first_name'];
							$mobile = $row['mobile'];
							$sex = $row['sex'];
							$DOR=$row['dor'];
							$time=$row['time'];
							$image = $row['student_image'];
?>						
							 <li>
								<a href="single_student.php?view_student=<?php echo $id;?>">
									<img src="../image/student/<?php echo $image;?>"/>
									<p><span><?php echo $name;?></span> id: <?php echo $id;?></p>
									<div class="time"><span><?php echo $DOR;?></span> <?php echo $time;?></div>
								</a>
							 </li>
<?php }?>
							 <li>
								<a href="all_students.php?students=PENDING">See All</a>
							 </li>
	
						</ul>
					</li>
					
					<li><a href="../my project/index.php">View site</a></li>
					<li>
						<a href="single_admin.php?view_admin=<?php echo $_SESSION['admin_id'];?>">
							<?php echo $_SESSION['admin_name'].' ['; echo $_SESSION['admin_type'].']';?>
						</a>
					</li>
					<li><a href="log_out.php">Log Out</a></li>
				</ul>
			</div>
 
			<!--
			<div class="content-heading">
				<h3>Search Result</h3>
				<div class="search-option">
				<form action="search.php" method="GET">
					<input size="25" type="text" name="admin_search" />
					<button name="submit"><i class="fa fa-search"></i></button>
				</form>
				</div>
			</div>
			-->