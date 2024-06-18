<?php
	
	include("include/connection.php");
	session_start();
	
	$stat_limit = ($_GET['page'] * 3);
	$post_per_load = 3;

	$i=1;
	$query="SELECT * from posts where post_type='status' ORDER BY 1 DESC LIMIT $stat_limit, $post_per_load";
	$run= mysqli_query($connection,$query);
	while($row=mysqli_fetch_array($run)){

		$post_id = $row['post_id'];
		//$post_date = date('y-m-d');
		$post_date = $row['post_date'];
		$headings=substr($row['post_headings'],0,20);								
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