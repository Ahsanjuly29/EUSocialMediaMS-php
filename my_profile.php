<?php 
$page='Profile';
include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['first_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php require_once('include/blog_header.php'); ?>
	
	<section class="content-section timeline-page" data-profile="my">
		<div class="container">
			<div class="page-area">
				<div class="row">


					<div class="col-sm-4 col-xs-12">
						<div class="page-left wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
							<div class="profile-activities">
<?php
		$user=$_SESSION['user1'];
		$id = $user.'_'.'id';
		$user_id=$_SESSION['user_id'];
		$department=$_SESSION['department'];

	if(isset($_GET['view_user'])){
		$edit_id= $_GET['view_user'];
		$user=$_SESSION['user1'];
		$id = $user.'_'.'id';
		$user_id=$_SESSION['user_id'];
		
		$query="SELECT * from $user WHERE $id='$edit_id'";
		//$query="SELECT * from $user WHERE $user_id='view_user' ORDER BY 1 DESC";
		$run= mysqli_query($connection,$query);
		$row=mysqli_fetch_array($run);{
					$id = $row[$user.'_'.'id'];
					$fname = $row['first_name'];
					$lname = $row['last_name'];
					$email = $row['email'];
					$dob=$row['dob'];
					$time=$row['time'];
					$dor=$row['dor'];
					$dept=$row['department'];
					$mobile = $row['mobile'];
					$home=$row['home'];
					$permission=$row['permission'];
					$p_address=$row['p_address'];
					$religion=$row['religion'];
					$sex = $row['sex'];
					$image=$row[$user.'_'.'image'];
					if($user=='teacher'){
						$designation=$row['designation'];
					}
		}		
?>
								<div class="my-image">
									<a href="image/<?php echo $user;?>/<?php echo $image;?>" class="thumbnail">
										<img src="image/<?php echo $user;?>/<?php echo $image;?>" alt="Image is not support" />
									</a>
								</div>




								<div class="profile-about profile-about-one" Style="text-transform:Capitalize;">
									<div class="profile-title">
										<p>Contact Info</p>
									</div>
										<div class="contact-info">
											<div class="view-student-area">
												<ul>
													<li>Your ID:</li>
													<li><?php echo $id; ?></li>
												</ul>
											</div>
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
													<li>Joining Date and Time</li>
													<li><?php echo $dor,' at ',$time;?></li>
												</ul>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Phone Number</li>
													<li class="important"><?php echo $mobile;?></li>
												</ul>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Depertment</li>
													<li><?php echo $dept;?></li>
												</ul>
											</div>
										
										<?php if($user=='teacher'){?>
										 
											<div class="view-student-area">
												<ul>
													<li>Designation</li>
													<li><?php echo $designation;?></li>
												</ul>
											</div>
											 
										<?php } ?>
											<div class="profile-title">
												<p>Other Info</p>
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
											<div class="view-student-area">
												<ul>
													<li>Gender</li>
													<li><?php echo $sex;?></li>
												</ul>
											</div>
										</div>
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
											<li>Member Type:</li>
											<li><?php echo $permission;?></li>
										</ul>
									</div>
									<div class="view-student-area">
										<a href="edit_user.php?edit_user=<?php echo $id;?>">
											<i class="fa fa-edit"></i> Edit profile</a>
									</div>
									
								</div>






							</div>
						</div>	<!-- page-left end-->
					</div>	<!-- col-md-4 col-sm-6 col-xs-12 end-->
		
					<div class="col-sm-8 col-xs-12">
						<div class="page-right">

						
							<div class="my-profile-details">
								<div class="name-area">
									<div class="name_join">
										<h2 style="text-transform:Capitalize;"><?php echo $fname,'  ',$lname; ?></h2>
										<p>
											Joined :<span><?php echo $dor?></span> at <?php echo $time?> <span style="text-transform:Uppercase; margin-left: 5px;"><i class="fa fa-globe"></i><?php echo $dept?></span>
										</p>
									</div>
									
									<p><i class="fa fa-map-marker"></i>From <?php echo $home ?></p>
								</div>
								<div class="profile-menu">
									<ul>
										<li class="timeline_button"><a><i class="fa fa-eye"></i>Timeline</a></li>
										<li class="about_button"><a><i class="fa fa-user"></i> About</a></li>
										<li><a type="" data-toggle="modal" data-target="#myModal">Update Status</a></li>
									</ul>
								</div>
								


								




								<div class="profile-about profile-about-two" Style="text-transform:Capitalize;">
									<div class="profile-title">
										<p>Contact Info</p>
									</div>
										<div class="contact-info">
											<div class="view-student-area">
												<ul>
													<li>Your ID:</li>
													<li><?php echo $id; ?></li>
												</ul>
											</div>
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
													<li>Joining Date and Time</li>
													<li><?php echo $dor,' at ',$time;?></li>
												</ul>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Phone Number</li>
													<li class="important"><?php echo $mobile;?></li>
												</ul>
											</div>
											<div class="view-student-area">
												<ul>
													<li>Depertment</li>
													<li><?php echo $dept;?></li>
												</ul>
											</div>
										
										<?php if($user=='teacher'){?>
										 
											<div class="view-student-area">
												<ul>
													<li>Designation</li>
													<li><?php echo $designation;?></li>
												</ul>
											</div>
											 
										<?php } ?>
											<div class="profile-title">
												<p>Other Info</p>
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
											<div class="view-student-area">
												<ul>
													<li>Gender</li>
													<li><?php echo $sex;?></li>
												</ul>
											</div>
										</div>
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
											<li>Member Type:</li>
											<li><?php echo $permission;?></li>
										</ul>
									</div>
									<div class="view-student-area">
										<a href="edit_user.php?edit_user=<?php echo $id;?>">
											<i class="fa fa-edit"></i> Edit profile</a>
									</div>
									
								</div>












<?php   }?>							
								
								<div class="profile-timeline">
									<div class="profile-timeline-inner">
		
									<?php

											$query="SELECT * from posts where post_author='$user_id' ORDER BY 1 DESC LIMIT 3";
											$run= mysqli_query($connection,$query);
											while($row=mysqli_fetch_array($run)){

												$post_id = $row['post_id'];
												//$date = date('y-m-d');
												$headings=substr($row['post_headings'],0,100);								
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
											<a class="" href="<?php echo $page;?>?<?php echo $view;?>=<?php echo $post_id;?>">
												<img class="img-responsive" src="image/post/<?php echo $image;?>" alt="Image is not support"/>
											</a>
										<?php }		?>
										
										<h4>
											<a class="more" href="<?php echo $page;?>?<?php echo $view;?>=<?php echo $post_id;?>">
												<?php echo $headings;?>
											</a>	
										</h4>
										<div class="timeline-time"> <p><?php echo $date?><span> at <?php echo $post_time?></span></p><i class="fa fa-globe"> </i> <?php echo $catagory;?> <a style="margin-left: 10px; text-decoration: underline;"><?php	echo $post_type;?></a></div>
										<p><?php echo $description;?> <a class="more" href="<?php echo $page;?>?<?php echo $view;?>=<?php echo $post_id;?>">more..</a></p>
										
										<ul class="edit-delete-option">
											<li><a href="edit_post.php?edit_post=<?php echo $post_id;?>">Edit</a></li>
											<li>
												<a href="delete.php?delete_post=<?php echo $post_id;?>" onclick="return confirm('Are you sure you want to delete this item?');">
													Delete
												</a>
											</li>
										</ul>
										
										<div class="timeline-view-list">
											<ul>
												<li>
													<span>
														<a class="like-btn" data-user-id="<?php echo $user_id;?>" data-vote="vote" data-post-id="<?php echo $post_id;?>" href="?vote&&user_id=<?php echo $user_id?>&&forum_no=<?php echo $post_id;?>">
														
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
													<span><i class="material-icons comment-icon">insert_comment</i> 
														<a class="" href="<?php echo $page;?>?<?php echo $view;?>=<?php echo $post_id;?>">
															<span class="comment-count">
																<?php
																	$query = "SELECT * FROM comment WHERE post_id='$post_id'";
																	$result = mysqli_query($connection, $query);
																																									
																	$count=mysqli_num_rows($result);
																	echo $count;
																?>
															</span>
															Comments
														</a>
													</span>
												</li>
												<li><span><i class="material-icons review-icon">star</i>5</span></li>
											</ul>
										</div> <!-- view-list end-->
									</div><!-- blog-content end-->
<?php   } ?>
<?php
								// $user_id=$_SESSION['user_id'];
								if(isset($_GET['vote'])){
								
									$post_id = $_GET['forum_no'];
									$query = "SELECT * FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
									$result = mysqli_query($connection, $query);
									
										if(mysqli_num_rows($result) > 0){
											$query = "DELETE FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
											$result = mysqli_query($connection, $query);
											$color='green';
											echo "<script>window.open('my_profile.php?user=$user&&view_user=$user_id','_self')</script>";
											
										}
										else{
											$query = "INSERT INTO vote (post_id, user_id) VALUES ('$post_id', '$user_id')";
											$result = mysqli_query($connection, $query);
											$color='red';
											echo "<script>window.open('my_profile.php?user=$user&&view_user=$user_id','_self')</script>";
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
	
	
	
		  <!-- boottrap  Modal -->
		  <!-- popup area-->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Update Your Status</h4>
					</div>
					
					<form action="my_profile.php" method="POST" enctype="multipart/form-data">
						<div class="timeline-post">
						<!--
							<div class="timeline-input">
								<?php
									$query="select * from catagory Group By Department";
										$run= mysqli_query($connection,$query);
								?>
								<label for="">Post Catagory</label>
								<select name="post_catagory" id="Catagory">
								<?php
									while($catagory=mysqli_fetch_array($run)){
										$department= $catagory['department'];
									?>
									<option value="<?php echo $department;?>"><?php echo $department;?></option>
									<?php } ?>
								</select>
							</div>	
							-->
							<div class="timeline-input timeline-input-heading">
								<textarea placeholder="Heading" name="headings" id="" cols="30" rows="10"  ></textarea>
							</div>
							<div class="timeline-input timeline-input-heading">
								<textarea style="display:none;"  value="author" name="author" id="" cols="30" rows="10"><?php echo $_SESSION['user_id'];?></textarea>
							</div>
							<div class="timeline-input timeline-input-text">
								<textarea placeholder="Write Your post" name="description" id="" cols="30" rows="10"></textarea>
							</div>
							<div class="timeline-input">
								<select name="post_type" id="Catagory">
									<option value="Status">Home Page Status</option>
									<option value="Forum">Forum Status</option>
								</select>
							</div>
												
							<div class="input-image-area">
									<div class="upload-image-one">
										<a href="">Upload Image</a>
										<input class="upload-image" type="file" name="image" accept="image/*"/>
									</div>
									
								<span class='label label-info' id="upload-file-info"></span>
								<button type="submit" name="submit" value="update-status" >Upload Status</button>
								
							</div>
												
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<!-- end popup area-->
<?php
	if(isset($_POST['submit'])){
		
		if(empty($_FILES['image']['name'])){
			$image_name = "NULL";
		}
		else{
			$image_type=$_FILES['image']['type'];
			$image_size=$_FILES['image']['size'];
			
			if($image_type=="image/jpeg" or $image_type=="image/png"){
				if($image_size < 5*1048576){
					$image_name=$_FILES['image']['name'];
					$image_tmp= $_FILES['image']['tmp_name'];
					
					move_uploaded_file($image_tmp,"image/post/$image_name");
				}
				else{
					echo "<script>alert('Upload Only 5mb File')</script>";
				}
			}else{
				echo "<script>alert('Invalid file.Upload only jpg/png')</script>";		
			}
		}
		
		// $edit_id= $_GET['view_user'];
		//$user_type=$_SESSION['user_type'];
		// $post_catagory=$dept;
		
		$user=$_SESSION['user1'];
		$id = $user.'_'.'id';
		$user_id=$_SESSION['user_id'];
		$department=$_SESSION['department'];
		
		$headings=$_POST['headings'];
		$description=$_POST['description'];
		$author=$_POST['author'];
		$post_type=$_POST['post_type'];
		$date = date('y-m-d');
		$time=date("h:i:sa");
		
		if($headings=='' or $description==''){
		
			echo"<script>alert('Please Fill The Blank Feild..!!')</script>";
			echo "<script>window.open('my_profile.php?user=$user&&view_user=$user_id','_self')</script>";
			exit();
		}
		
		$query="INSERT INTO posts(post_headings,post_description,post_author,post_catagory,post_image,post_type,post_date,post_time,user_type)
				VALUES('$headings','$description','$author','$department','$image_name','$post_type','$date','$time','$user')";
		if(mysqli_query($connection,$query)){
			echo "<script>window.open('my_profile.php?user=$user&&view_user=$user_id','_self')</script>";
			echo"<script>alert('POST HAS BEEN PUBLISHED')</script>";

		}
	}else{
		// die();
	}
?>	
<!--
	<div class="user-contact profile-menu">
		<ul>
			<li><a href=""><i class="fa fa-envelope"></i>Message <span>(10)</span></a> </li>
			<li><a href=""><i class="fa fa-bell"></i>Notification <span>(10)</span></a> </li>
		<ul>
	</div>
-->
<!--Footer area-->
	<?php require_once('include/blog_footer.php'); ?>
<!-- End of footer -->
		
	
</body>
</html>
<?php } ?>