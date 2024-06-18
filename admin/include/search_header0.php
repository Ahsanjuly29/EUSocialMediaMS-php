
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Search</title>
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
</head>
<body>
	<div class="page-area">
		<div class="left-side">
			<div class="logo">
				<h2><span>EU</span>Social Book</h2>
				<p><span>Today is:&nbsp;</span><?php echo date("jS,F Y");?></p>			
			</div>
			<div class="side-nav">
				<ul>
					<li class=""><a href="index.php">Admin Home</a></li>
					<li>
						<a class="dropbtn drop-1">Profile
							  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-content drop-content-1" id="myDropdown">
							<li><a href="all_admin.php?">All Admin</a></li>
							<li><a href="all_students.php">All Students</a></li>
							<li><a href="all_teacher.php">All Teachers</a></li>
						</ul>
					</li>
					<li><a href="add_student.php">Add Student</a></li>
					<li><a href="add_teacher.php">Add Teacher</a></li>
					<li><a href="make_admin.php">Make Admin</a></li>
					<li>
						<a class="dropbtn drop-2">Update
							  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-content drop-content-2" id="myDropdown">
							<li><a href="update_status.php">Update Status</a></li>
							<li><a href="update_forum.php">Update Forum</a></li>
							<li><a href="add_catagory.php">Add Category</a></li>
							<li><a href="add_tag.php">Add Tag</a></li>
						</ul>
					</li>
					<li><a href="all_post.php">All Post</a></li>
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
								<img src="image/1.jpg" alt="" />
								<p><span>Chayon</span> Update a status</p>
								<div class="time">10 Min ago</div>
							 </a></li>
							 <li><a href="#">
								<img src="image/1.jpg" alt="" />
								<p><span>Chayon</span> Send a request</p>
								<div class="time">10 Min ago</div>
							 </a></li>
							 <li><a href="#">
								<img src="image/1.jpg" alt="" />
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
							 <li><a href="#">
								<img src="image/1.jpg" alt="" />
								<p><span>Chayon</span> hi i am ...</p>
								<div class="time">10 Min ago</div>
							 </a></li>
							 <li><a href="#">
								<img src="image/1.jpg" alt="" />
								<p><span>Chayon</span> hi i am ...</p>
								<div class="time">10 Min ago</div>
							 </a></li>
							 <li><a href="#">
								<img src="image/1.jpg" alt="" />
								<p><span>Chayon</span> hi i am ...</p>
								<div class="time">10 Min ago</div>
							 </a></li>
							 <li><a href="#">See All
							 </a></li>
						</ul>
					</li>
					<li><a href="">View site</a></li>
					<li><a href="">Name</a></li>
					<li><a href="">Log Out</a></li>
				</ul>
			</div>
			<div class="content-heading">
				<h3>Search Result</h3>
				<div class="search-option">
				<form action="search.php" method="GET">
					<input size="25" type="text" name="post_search" />
					<button name="submit"><i class="fa fa-search"></i></button>
				</form>
				</div>
			</div>