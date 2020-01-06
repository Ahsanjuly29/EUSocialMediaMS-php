<?php 
	$page='Profile';
	require_once('include/translate.php');
	date_default_timezone_set("Asia/Dhaka");
?>
<?php
	session_start();
	if(!isset($_SESSION['first_name'])){
		
		header("location: sign_in.php");
	}
	else{
		require_once("include/connection.php");
?>

<?php

	$user=$_SESSION['user1'];
	$id = $user.'_'.'id';
	$user_id=$_SESSION['user_id'];

	if(isset($_GET['view_user'])){
		
		$edit_id= $_GET['view_user'];
		$user=$_GET['user_type'];
	 	$id = $user.'_'.'id';
		
		$other_id=$_GET['other_id'];
		
		$query="SELECT * from $user WHERE $id='$edit_id'";
		
		$run= mysqli_query($connection,$query);
		$row=mysqli_fetch_array($run);
					$id = $row[$user.'_'.'id'];
					$fname = $row['first_name'];
					$lname = $row['last_name'];
					$email = $row['email'];

					$mobile = $row['mobile'];

					$sex = $row['sex'];
					$image=$row[$user.'_'.'image'];
					
					// or $user!='Admin' or $user!='ADMIN'
					if($user!='admin'){
						
						$home=$row['home'];
						$p_address=$row['p_address'];
						$religion=$row['religion'];
						$dob=$row['dob'];
						$dor=$row['dor'];
						$dept=$row['department'];
					}
					
?>
<?php require_once('include/blog_header.php'); ?>
	
	<section class="timeline-page" data-profile="another">
		<div class="container">
			<div class="page-area">
				<div class="row">


					<div class="col-sm-4 col-xs-12">
						<div class="page-left wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
							<div class="profile-activities">
<!---->
								<div class="my-image">
									<a href="image/<?php echo $user;?>/<?php echo $image;?>" class="thumbnail">
										<img src="image/<?php echo $user;?>/<?php echo $image;?>" alt="Image is not support" />
									</a>
								</div>
								<div class="profile-about another-profile-about-one">
									<div class="profile-title">
										<p>Contact Info</p>
									</div>
										<div class="contact-info">
											<div class="view-student-area">
												<ul>
													<li>Name:</li>
													<li><?php echo $fname,'  ',$lname; ?></li>
												</ul>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Email</li>
													<li><?php echo $email;?></li>
												</ul>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Phone Number</li>
													<li class="important"><?php echo $mobile;?></li>
												</ul>
											</div>
											
											<div class="profile-title">
												<p>Other Info</p>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Sex</li>
													<li><?php echo $sex;?></li>
												</ul>
											</div>
											
										<?php	
											// or $user!='Admin' or $user!='ADMIN'
											if($user!='admin'){ 
										?>
											<div class="view-student-area">
												<ul>
													<li>Depertment</li>
													<li><?php echo $dept;?></li>
												</ul>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Home Town</li>
													<li class="important"><?php echo $home;?></li>
												</ul>
												<ul>
													<li>Present Address</li>
													<li><?php echo $p_address;?></li>
												</ul>
											</div>
										<?php }?>	
										</div>
										<?php	
											// or $user!='Admin' or $user!='ADMIN'
											if($user!='admin'){ 
										?>
									<div class="profile-title">
										<p>Basic Info</p>
									</div>
									
									<div class="view-student-area">
										<ul>
											<li>religion</li>
											<li><?php echo $religion;?></li>
										</ul>
									</div>
									<div class="view-student-area">
										<ul>
											<li>Date Of Birth:</li>
											<li><?php echo $dob;?></li>
										</ul>
									</div>
								<?php }?>	
								</div>
								<?php	
									// or $user!='Admin' or $user!='ADMIN'
									if($user!='admin'){ 
								?>
									<?php }?>
							</div>
						</div>	<!-- page-left end-->
					</div>	<!-- col-md-8 col-sm-6 col-xs-12 end-->
		
					<div class="col-sm-8 col-xs-12">
						<div class="page-right wow fadeInUp" data-wow-offset="0" data-wow-delay="0.4s">

						
							<div class="my-profile-details">
								<div class="name-area">
									<div class="name_join">
										<h2 style="text-transform:Capitalize;"><?php echo $fname,'  ',$lname; ?></h2>
										
									<?php	
										// or $user!='Admin' or $user!='ADMIN'
										if($user!='admin'){ 
									?>
										<p>Joined at :<span><?php echo $dor?></span>, <span style="text-transform:Uppercase;"> <i class="fa fa-tag"></i><?php echo $dept?></span></p>
									</div>
									<p><i class="fa fa-map-marker"></i>From <?php echo $home ?></p>
									<?php }?>
								</div>

								<div class="profile-menu">
									<ul>
										<li class="timeline_button"><a><i class="fa fa-eye"></i>Timeline</a></li>
										<li class="about_button"><a><i class="fa fa-user"></i> About</a></li>
										<li style="display:none;"><a type="" data-toggle="modal" data-target="#myModal">Update Status</a></li>
									</ul>
								</div>
								<div class="profile-about another-profile-about-two">
									<div class="profile-title">
										<p>Contact Info</p>
									</div>
										<div class="contact-info">
											<div class="view-student-area">
												<ul>
													<li>Name:</li>
													<li><?php echo $fname,'  ',$lname; ?></li>
												</ul>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Email</li>
													<li><?php echo $email;?></li>
												</ul>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Phone Number</li>
													<li class="important"><?php echo $mobile;?></li>
												</ul>
											</div>
											
											<div class="profile-title">
												<p>Other Info</p>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Sex</li>
													<li><?php echo $sex;?></li>
												</ul>
											</div>
											
										<?php	
											// or $user!='Admin' or $user!='ADMIN'
											if($user!='admin'){ 
										?>
											<div class="view-student-area">
												<ul>
													<li>Depertment</li>
													<li><?php echo $dept;?></li>
												</ul>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Home Town</li>
													<li class="important"><?php echo $home;?></li>
												</ul>
												<ul>
													<li>Present Address</li>
													<li><?php echo $p_address;?></li>
												</ul>
											</div>
										<?php }?>	
										</div>
										<?php	
											// or $user!='Admin' or $user!='ADMIN'
											if($user!='admin'){ 
										?>
									<div class="profile-title">
										<p>Basic Info</p>
									</div>
									
									<div class="view-student-area">
										<ul>
											<li>religion</li>
											<li><?php echo $religion;?></li>
										</ul>
									</div>
									<div class="view-student-area">
										<ul>
											<li>Date Of Birth:</li>
											<li><?php echo $dob;?></li>
										</ul>
									</div>
								<?php }?>	
								</div>
<?php   
	}
	?>							
								
								<div class="profile-timeline">
									<div class="profile-timeline-inner">
		
<?php

		$query="SELECT * from posts where post_author='$other_id' ORDER BY 1 DESC LIMIT 3";
		$run= mysqli_query($connection,$query);
		while($row=mysqli_fetch_array($run)){

			$post_id = $row['post_id'];
			//$date = date('y-m-d');
			$headings=substr($row['post_headings'],0,20);								
			$description=substr($row['post_description'],0,200);								
			$author=$row['post_author'];
			$catagory=$row['post_catagory'];
			$post_type=$row['post_type'];
			$date=$row['post_date'];
			$post_time = $row['post_time'];
			$image=$row['post_image'];
			
?>		
									
									<div class="profile-timeline-content">

										<?php
											if($post_type=='Status' or $post_type=='status'){
												$page="read_more.php";
												$view="view_post";
											}
											else{
												$page="forum_more.php";
												$view="view_forum";
											}										
											if($image!="NULL"){

										?>
											<a class="more" href="<?php echo $page;?>?<?php echo $view;?>=<?php echo $post_id;?>">
												<img class="img-responsive" src="image/post/<?php echo $image;?>" alt="Image is not support"/>
											</a>
										<?php }	?>
										<h4>
											<a class="more" href="<?php echo $page;?>?<?php echo $view;?>=<?php echo $post_id;?>">
												<?php echo $headings;?>
											</a>	
										</h4>
										<div class="timeline-time"> <p><?php echo $date?><span> at <?php echo $post_time?></span></p><i class="fa fa-globe"></i><?php echo $catagory;?></div>
										<p><?php echo $description;?></p>
										<a class="more" href="<?php echo $page;?>?<?php echo $view;?>=<?php echo $post_id;?>">more..</a>
									<!--	
										<ul class="forum-edit">
											<li><a href="edit_post.php?edit_post=<?php echo $post_id;?>">Edit</a></li>
											<li>
												<a href="delete.php?delete_post=<?php echo $post_id;?>" onclick="return confirm('Are you sure you want to delete this item?');">
													Delete
												</a>
											</li>
										</ul>
									-->
										<div class="entry-meta view-list">
											<ul>
												<li>
													<span>
														<a class="like-btn" data-other-id="<?php echo $other_id; ?>" data-user-id="<?php echo $user_id;?>" data-vote="vote" data-post-id="<?php echo $post_id;?>" href="?vote&&user_id=<?php echo $user_id?>&&forum_no=<?php echo $post_id;?>&&view_user=<?php echo $other_id;?>&&other_id=<?php echo $other_id;?>&&user_type=<?php echo $user;?>">
														
														<?php
															$query = "SELECT * FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
															$result = mysqli_query($connection, $query);
															
																if(mysqli_num_rows($result) > 0){
																	$color='green';
																}
																else{
																	$color='gray';
																}
																
														?>
															<i class="fa fa-heart" style="color:<?php echo $color;?>"></i>
															<span class="like-count">
															<?php
																$query = "SELECT * FROM vote WHERE post_id='$post_id'";
																$result = mysqli_query($connection, $query);

																$count=mysqli_num_rows($result);
																echo $count;
															?></span> Likes
														</a>
													</span>
												</li>
												<li>
													<span><i class="fa fa-comment"></i><a class="more" href="<?php echo $page;?>?<?php echo $view;?>=<?php echo $post_id;?>">
														<span class="comment-count">
														<?php
															$query = "SELECT * FROM comment WHERE post_id='$post_id'";
															$result = mysqli_query($connection, $query);
																																							
															$count=mysqli_num_rows($result);
															echo $count;
														?></span>
															Comments</a>
													</span>
												</li>
												<li><span><i class="fa fa-eye"></i><a href="#"><span class="view-count"></span>100m view</a></span></li>
											</ul>
										</div> <!-- entry-meta end-->
									</div><!-- blog-content end-->
<?php   } ?>									
<?php
								// $user_id=$_SESSION['user_id'];
								// $user_id=$_SESSION['user_id'];
								// $user_id=$_SESSION['user_id'];
								// $user_id=$_SESSION['user_id'];
								if(isset($_GET['vote'])){
								
									$post_id = $_GET['forum_no'];
									$query = "SELECT * FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
									$result = mysqli_query($connection, $query);
									
										if(mysqli_num_rows($result) > 0){
											$query = "DELETE FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
											$result = mysqli_query($connection, $query);
											$color='green';
											
											
											
											echo "<script>window.open('?view_user=$other_id&&other_id=$other_id&&user_type=$user','_self')</script>";	
											
											// ?user=$user&&view_user=$user_id
										}
										else{
											$query = "INSERT INTO vote (post_id, user_id) VALUES ('$post_id', '$user_id')";
											$result = mysqli_query($connection, $query);
											$color='red';
											
											
											echo "<script>window.open('?view_user=$other_id&&other_id=$other_id&&user_type=$user','_self')</script>";	
											// echo "<script>window.open('?user=$user&&view_user=$user_id','_self')</script>";
										}
								}

?>										
										
									
									</div>
									<div class="loading-image">
										<img src="image/Others/loading.svg" alt="">
									</div>
									<div class="no-more">
										<p>End of result</p>
									</div>
								</div>
							</div>
						</div> <!-- page-right end-->
					</div> <!-- col-md-4 col-sm-6 col-xs-12 end-->
				</div> <!-- row end-->
			</div> <!-- page-area end-->
			
			
			
		</div> <!-- container end-->
	</section> <!-- content-section end-->
		
		<!-- end popup area-->
	
	<div class="user-contact profile-menu">
		<ul>
			<li><a href=""><i class="fa fa-envelope"></i>Message <span>(10)</span></a> </li>
			<li><a href=""><i class="fa fa-bell"></i>Notification <span>(10)</span></a> </li>
		<ul>
	</div>

<!--Footer area-->
	<?php require_once('include/blog_footer.php'); ?>
<!-- End of footer -->
	
</body>
</html>
<?php } ?>