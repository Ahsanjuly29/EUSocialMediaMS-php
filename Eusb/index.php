<?php 
	$page='home';
	include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['first_name'])){
	
	header("location: sign_in.php");
}
else{
	$department=$_SESSION['department'];
?>
<?php require_once('include/blog_header.php'); ?>
	<section class="content-section<?php if($page){ echo ' '. $page; } ?>">
		<div class="container">
			<div class="page-area">
				<div class="row">
					<div class="col-md-8 col-sm-7 col-xs-12">
						<div class="page-left small-device-page-left">
							<?php
								// $query="select * from catagory Group By Department";
									// $run= mysqli_query($connection,$query);
							?>	
						<h2 class="status-related-dept">Status Relates Dept:
							<span style="text-decoration: underline; cursor:pointer;"><?php echo $department;?></span>
							<span>
								<?php
									// while($catagory=mysqli_fetch_array($run)){
										// $department= $catagory['department'];
										// echo '| '.$department;
									// }	
								?>
							</span>
						</h2>
<?php
	
	
	$i=1;
	$query="SELECT * from posts where post_type='status' AND post_catagory='$department' ORDER BY 1 DESC LIMIT 3";
	$run= mysqli_query($connection,$query);
	while($row=mysqli_fetch_array($run)){

		$post_id = $row['post_id'];
		//$post_date = date('y-m-d');
		$post_date = $row['post_date'];
		$headings=substr($row['post_headings'],0,35);								
		$description=substr($row['post_description'],0,200);								
		
		$author=$row['post_author'];
		$user=$row['user_type'];
		
		$catagory=$row['post_catagory'];
		$image=$row['post_image'];
		
?>							
							<div class="blog-item wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
								<div class="row athor-row">
									<div class="col-xs-12 col-sm-3 col-md-2 text-center athor-col-one">
										<div class="entry-meta">
											<ul>
												
												
												<li><span id="publish_date"><?php echo $post_date?></span></li>
												
												<?php
													$id = $user.'_'.'id';
													$user_id=$_SESSION['user_id'];
													$query="SELECT * from $user where $id=$author ORDER BY 1 DESC";
													
													$run2= mysqli_query($connection,$query);
													$row2=mysqli_fetch_array($run2);
														$id = $row2[$user.'_'.'id'];
														$fname = $row2['first_name'];
														$image_icon=$row2[$user.'_'.'image'];
													
												 ?>
												 
												<li>
													<span style="text-transform:Capitalize;">
														<i class="fa fa-user"></i>
														<?php
															if($user_id==$author){
																$profile="my_profile.php";
															}
															else{
																$profile="another_profile.php";
															}
														?>
														<a href="<?php echo $profile;?>?view_user=<?php echo $id;?>&&other_id=<?php echo $id;?>&&user_type=<?php echo $user;?>">
															<?php echo $fname,'-',$user;?>
														</a>
													</span>
												</li>
												<?php 
													if($user=="student"){
												?>
												<li>
													<span>
														<a class="blog-person-name" href="<?php echo $profile;?>?view_user=<?php echo $id;?>&&other_id=<?php echo $id;?>&&user_type=<?php echo $user;?>">
															<?php echo $author;?>
														</a>
													</span>
												</li>
											<?php   }?>
												<li><a class="blog-person-name" href="<?php echo $profile;?>?view_user=<?php echo $id;?>&&other_id=<?php echo $id;?>&&user_type=<?php echo $user;?>">
														<img src="image/<?php echo $user;?>/<?php echo $image_icon;?>" alt="" />
													</a>
												</li>
												<li>
													<span>
														<!--
														<a href="read_more?vote&&user_id=<?php echo $user_id;?>&&forum_no=<?php echo $post_id;?>">
														-->
														<a class="like-btn" href="#" data-user-id="<?php echo $user_id;?>" data-vote="vote" data-post-id="<?php echo $post_id;?>">
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
																?>
															</span> Likes
														</a>
													</span>
												</li>
												<li>
													<span><i class="fa fa-comment"></i> <a href="read_more.php?view_post=<?php echo $post_id;?>"> 
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
												<li><span><i class="fa fa-tags"></i><a href="#"><span class="tag-count"></span><?php echo $catagory;?></a></span></li>
											<!--	
												<li><span><i class="fa fa-eye"></i><a href="#"><span class="view-count"></span>100 view</a></span></li>
											-->
											</ul>
										</div>
									</div>
										
									<div class="col-xs-12 col-sm-9 col-md-10 blog-content athor-col-two">
										<?php if($image!="NULL"){  ?>
										<a href="read_more.php?view_post=<?php echo $post_id;?>">
											<img class="img-responsive" src="image/post/<?php echo $image;?>" alt="Image is not support"/>
										</a>
										<?php }		?>
										<h4>
											<a href="read_more.php?view_post=<?php echo $post_id;?>">
												<?php echo $headings;?>
											</a>
										</h4>
										<p><?php echo $description;?></p>
										<a class="btn btn-primary readmore" href="read_more.php?view_post=<?php echo $post_id;?>" target="_blank">more <i class="fa fa-angle-right"> </i></a>
									
									</div><!-- blog-content end-->
								</div> <!-- row end-->
							</div>	<!-- blog-item end-->
						<?php	} ?>
						
						</div>	<!-- page-left end-->
						<div class="loading-image">
							<img src="image/Others/loading.svg" alt="">
						</div>
						<div class="no-more">
							<p>End of result</p>
						</div>
					</div>	<!-- col-md-8 col-sm-6 col-xs-12 end-->
					
					<div class="col-xs-12 col-sm-5 col-md-4 small-device-page-right">
						<div class="page-right home-page-right">
						


							
							<div class="map-area">
								<h3>Eastern university google Map</h3>
								<div class="eu-google-map">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.1391899004093!2d90.37839801537588!3d23.74241539499728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b68c81771d%3A0x51899dd265f582d7!2sEastern+University!5e0!3m2!1sen!2sbd!4v1535875331900" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</div>



							<!--********************-->
						<!--********************-->
						<!--*****Notice Area****-->
						<!--********************-->
						<!--********************-->



							<div class="profile-activities">
								<div class="recent-post">
									<div class="profile-title">
										<a href="all.php">
											<h3 class="admin-notice-heading">Admin-Notice</h3>
										</a>
									</div>
									<?php
										$query="SELECT * from posts where post_type='notice' ORDER BY 1 DESC LIMIT 0,5";
										$run= mysqli_query($connection,$query);
										while($row=mysqli_fetch_array($run)){

											$post_id = $row['post_id'];
											
											$post_date = $row['post_date'];
											$post_time = $row['post_time'];
											
											$headings=substr($row['post_headings'],0,100);								
											$description=substr($row['post_description'],0,200);								
											$author=$row['post_author'];
											$catagory=$row['post_catagory'];
											$image=$row['post_image'];
									
									?>
									<div class="">
										<div class="post-heading" >
											<div class="admin-notice-item">
												<p title="Click to see Notice">
													<a href="notice_more.php?view_notice=<?php echo $post_id;?>" target="_blank">
														<?php echo $headings;?>
													</a>
												</p>
												<span class="time"><?php echo $post_date;?> at <?php echo $post_time;?></span>
											</div>
										</div>
									</div>
									<?php }?>
									<div class="post-article-area">
										<div class="post-heading">
											<h2><a style="color: #fff;display: block;margin-top: 16px;text-align: center;padding: 12px 0;background: #23527C;" href="all.php">See All</a></h2>
										</div>
									</div>





							<div class="team-slider">
								<h3>EUSB Team</h3>
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">

								    <!-- Wrapper for slides -->
								    <div class="carousel-inner">
								      <div class="item active">
								        <div class="my-slider-area slider-bg-2"></div>
								      </div>
									
								      <div class="item">
								        <div class="my-slider-area slider-bg-1"></div>
								      </div>

								      <div class="item">
								        <div class="my-slider-area slider-bg-2"></div>
								      </div>
								    
								      <div class="item">
								        <div class="my-slider-area slider-bg-3"></div>
								      </div>
								      <div class="item">
								        <div class="my-slider-area slider-bg-4"></div>
								      </div>
								      <div class="item">
								        <div class="my-slider-area slider-bg-5"></div>
								      </div>
								      <div class="item">
								        <div class="my-slider-area slider-bg-6"></div>
								      </div>
								    </div>

								    <!-- Left and right controls -->
								    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
								      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
								      <span class="sr-only">Previous</span>
								    </a>
								    <a class="right carousel-control" href="#myCarousel" data-slide="next">
								      <span class="carousel-control-next-icon" aria-hidden="true"></span>
								      <span class="sr-only">Next</span>
								    </a>
								  </div>
                            </div>






								</div>
							</div>
						</div> <!-- page-right end-->
					</div> <!-- col-md-4 col-sm-6 col-xs-12 end-->
				</div> <!-- row end-->
			</div> <!-- page-area end-->
			
			
			
		</div> <!-- container end-->
	</section> <!-- content-section end-->

	<div class="footer">
		<div class="container">
			<div class="footer-icon">
				<span class="footer-fix">
					<i class="material-icons">speaker_notes</i>
				</span>
				<span class="footer-close">
					<!-- <i class="material-icons">close</i> -->
					<i class="material-icons">speaker_notes</i>
				</span>
			</div>
		</div>
	</div>
	
	<div class="user-contact profile-menu">
	<?php
	/*
		$sql="SELECT post_id FROM posts ";
		if ($result=mysqli_query($connection,$sql)){
			
			// Return the number of rows in result set
			$rowcount=mysqli_num_rows($result);
			//printf("Result set has %d rows.\n",$rowcount);
			// Free result set
			mysqli_free_result($result);
		}

		mysqli_close($connection);
		*/

	?>
	
	
		<ul>
			<li><a href=""><i class="fa fa-envelope"></i>Message <span>(10)</span></a> </li>
			<li><a href=""><i class="fa fa-bell"></i>Notification (7<span><?php// echo $rowcount?></span>)</a> </li>
		<ul>
	</div>
	
<?php require_once('include/blog_footer.php'); ?>
<?php } ?>	