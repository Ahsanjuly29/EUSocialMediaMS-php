<?php 
		require_once('connection.php');
		date_default_timezone_set("Asia/Dhaka");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $link;?></title>
	<!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/bootstrap-3.css">
	<script src="js/jquery-library.js"></script>
	<script src="js/bootstrap-js.js"></script>

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
			<div class="logo">
				<h2><a href="index.php"><span>EU</span>Social Book</a></h2>
				</br>
				<p><span>Today is:&nbsp;</span><br /><?php echo date("jS,F y");?>
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
							<li><a href="all_admin.php?type=admin">Admins</a></li>
							<li><a href="all_admin.php?type=sub_admin">Sub Admins</a></li>
							<li style="display:none;"><a href="make_admin.php">Make Admin</a></li>
						</ul>
					</li>
					
					<li class="<?php if($link=='Update'){echo 'active';}else{echo 'non-active';} ?>">
						<a class="dropbtn drop-2">Update
							  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-content drop-content-2" id="myDropdown">
							<li><a href="update_status.php">Update A new Notice </a></li>
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
<?php 
						/////////////////////
						//E-mail Area//
						////////////////////
					$date = $DOR=date("Y-m-d");	
					$query="SELECT * from mail WHERE mail_type='user email' and date=$date ORDER BY 1 DESC LIMIT 0,5";
					$run= mysqli_query($connection,$query);
					$count=mysqli_num_rows($run);	
?>
					
					<li class="dropdown">
						<div class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-envelope"></i> <span class="number-count"><?php echo $count;?></span></div>
						<ul class="dropdown-menu">
<?php
						while($row=mysqli_fetch_array($run)){
							$subject = $row['subject'];
							$sender = $row['sender'];
							$date = $row['date'];
							$time = $row['time'];
?>							
							<li>
								<a href="#">
									<p><span><?php echo $sender;?></span> Sent A Mail.</p>
									<div class="time"><?php echo $date;?><span> at <?php echo $time;?></span></div>
								</a>
							</li> 
<?php }
				if($row==0){?>							 
							 <li>
								<a>Today No mail Received Yet</a>
								<a href="mail.php">Check Older mails ?</a>
							 </li>
<?php }
				else{?>							 
							 <li>
								<a href="mail.php">See All</a>
							 </li>
<?php 			}?>
						</ul>
					</li>					
<?php
						/* ///////////////////// */
						//Notification Area//
						////////////////////
						$query="SELECT * from student WHERE permission='pending' ORDER BY 1 DESC LIMIT 0,9";
						$run= mysqli_query($connection,$query);
						$count=mysqli_num_rows($run);
	
?>					
					<li class="dropdown">
						<div class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-bell"></i> <span class="number-count"><?php echo $count;?></span></div>
						<ul class="dropdown-menu">
<?php
								
						
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
<!--							<a href="permission.php?approve_student=<?php// echo $id;?>" title="Click here to Approve this person">
									<i class="fa fa-check"></i>
								</a>
								<a href="permission.php?block_student=<?php// echo $id;?>">
									<i class="fa fa-exclamation-triangle"></i>
								</a>-->								
							 </li>
<?php }?>
							 <li>
								<a href="all_students.php?students=PENDING">See All</a>
							 </li>
						</ul>
					</li>
					
					<li><a href="">View site</a></li>
					<li>
						<a href="single_admin.php?view_admin=<?php echo $_SESSION['admin_id'];?>">
						
							<?php echo $_SESSION['admin_name'].' ['; echo $_SESSION['admin_type'].']';?>
							<?php $_SESSION['user_type']; ?>
						</a>
					</li>
					<li><a href="log_out.php">Log Out</a></li>
					
				</ul>
			</div>
 