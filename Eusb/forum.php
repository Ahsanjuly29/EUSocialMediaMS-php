<?php 
	$page='Forum';
	include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['first_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php require_once('include/blog_header.php'); ?>
	
	<section class="content-section forum-page">
		<div class="container">
			
			
			<div class="page-area">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-8">
						<div class="page-left small-device-page-left">

<?php
	//	if(isset($_GET['forum'])){
			
		$user_id=$_SESSION['user_id'];
		if(isset($_GET['vote'])){
		
			$post_id = $_GET['forum_no'];
			$query = "SELECT * FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
			$result = mysqli_query($connection, $query);
			
				if(mysqli_num_rows($result) > 0){
					$query = "DELETE FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
					$result = mysqli_query($connection, $query);
					$color='green';
				}
				else{
					$query = "INSERT INTO vote (post_id, user_id) VALUES ('$post_id', '$user_id')";
					$result = mysqli_query($connection, $query);
					$color='red';
				}
		}		
		$query="SELECT * from posts where post_type='forum' ORDER BY 1 DESC LIMIT 3";
		$run= mysqli_query($connection,$query);
		while($row=mysqli_fetch_array($run)){

			$post_id = $row['post_id'];
			//$date = date('y-m-d');
			// $post_date = $row['post_date'];
			// $post_time = $row['post_time'];
			$post_date = date('F d, Y', strtotime($row['post_date']) );
			$post_time = date('h:mA', strtotime($row['post_time']) );
			$headings=substr($row['post_headings'],0,90);								
			$description=substr($row['post_description'],0,200);								
			$author=$row['post_author'];
			$catagory=$row['post_catagory'];
			$date=$row['post_date'];
			$image=$row['post_image'];
			$user=$row['user_type'];
?>						
							<div class="forum-item">
										



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
												


									<div class="forum-content">
										<div class="forum-person">
											<div class="forum-person-image">
												<img src="image/<?php echo $user;?>/<?php echo $image_icon;?>" alt="" />
											</div>
										</div>
										<div class="forum-content-text">
											<div class="forum-heading-area">
												<div class="forum-heading">
													<h4>
														<a class="" href="forum_more.php?view_forum=<?php echo $post_id;?>" >
															<?php echo $headings;?>
														</a>
													</h4>
													<span id="publish_date"><?php echo $post_date;?> at <?php echo $post_time;?></span>
												</div>
												
												<div class="view-list">
													<ul>
														<li><span><i class="material-icons review-icon">star</i>5</span></li>
														<li>
															<span>
																<a class="like-btn" data-user-id="<?php echo $user_id;?>" data-vote="vote" data-post-id="<?php echo $post_id;?>" href="?vote&&user_id=<?php echo $user_id?>&&forum_no=<?php echo $post_id;?>">
																
																<?php
																	$query = "SELECT * FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
																	$result = mysqli_query($connection, $query);
																	
																		if(mysqli_num_rows($result) > 0){
																			$color='green';
																		}else{
																			$color='gray';
																		}
																		
																?>
																<i class="material-icons" style="color:<?php echo $color;?>">thumb_up</i>
																	<span class="like-count">
																	<?php
																		$query = "SELECT * FROM vote WHERE post_id='$post_id'";
																		$result = mysqli_query($connection, $query);

																		$count=mysqli_num_rows($result);
																		echo $count;
																	?></span>
																</a>
															</span>
														</li>
		 	
														<li>
															<span><i class="material-icons comment-icon">insert_comment</i> <a href="forum_more.php?view_forum=<?php echo $post_id;?>"> 
																<span class="comment-count">
																<?php
																	$query = "SELECT * FROM comment WHERE post_id='$post_id'";
																	$result = mysqli_query($connection, $query);
																																									
																	$count=mysqli_num_rows($result);
																	echo $count;
																?></span>
																	</a>
															</span>
														</li>
													</ul>
												</div> <!-- entry-meta end-->






											</div>
												<p><?php echo $description;?>
													<a class="more" href="forum_more.php?view_forum=<?php echo $post_id;?>" >More...</a>
												</p>
											
												

											<ul class="forum-author">
												<li class="forum-authot-name">
													<span>
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
															<?php echo $fname;?>
														</a>
													</span>
												</li>
												<?php 
													if($user=="student"){
											?>		
												<li>
													<span>
														<a class="blog-person-name" href="<?php echo $profile;?>?view_user=<?php echo $id;?>&&other_id=<?php echo $id;?>&&user_type=<?php echo $user;?>">
															ID: <?php echo $author;?>
														</a>
													</span>
												</li>
											<?php   }?>
										
												<li>
													<span><a href="#"><i class="fa fa-tags"></i> <span class="tag-count"></span><?php echo $catagory;?></a></span>
												</li>
											</ul>




										</div>
										
										
										
										<?php 
											if($user_id==$author){
										?>
										
										<ul class="">
											<li><a href="edit_post.php?edit_post=<?php echo $post_id;?>">
													Edit
												</a>
											</li>
											<li>
												<a href="delete.php?delete_post=<?php echo $post_id;?>" onclick="return confirm('Are you sure you want to delete this item?');">
													Delete
												</a>
											</li>
											
										</ul>
											<?php }?>
										
										
										
										
									</div><!-- forum-content end-->

									



							</div>	<!-- forum-item end-->
							<?php } ?>
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
	
		<?php require_once('include/blog_footer.php'); ?>
</body>
</html>
<?php  } ?>