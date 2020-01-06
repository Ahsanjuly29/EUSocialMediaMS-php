<?php

include("include/connection.php"); \
session_start();
if(!isset($_SESSION['first_name'])){
	
	header("location: sign_in.php");
}
		
$user_id=$_SESSION['user_id'];
$stat_limit = ($_GET['page'] * 3);
$post_per_load = 3;

$query="SELECT * from posts where post_type='forum' ORDER BY 1 DESC LIMIT $stat_limit, $post_per_load";
$run= mysqli_query($connection,$query);
while($row=mysqli_fetch_array($run)){

	$post_id = $row['post_id'];
	//$date = date('y-m-d');
	$post_date = $row['post_date'];
	$post_time = $row['post_time'];
	$headings=substr($row['post_headings'],0,20);								
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
<?php	} ?>