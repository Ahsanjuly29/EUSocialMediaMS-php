<?php

include("include/connection.php");

session_start();
if(!isset($_SESSION['first_name'])){
	header("location: sign_in.php");
}
if( $_GET['page_name'] == 'my' ) {
	$user_id=$_SESSION['user_id'];
}else{
	$user_id=$_GET['user'];
}

$stat_limit = ($_GET['page'] * 3);
$post_per_load = 3;

$query="SELECT * from posts where post_author='$user_id' ORDER BY 1 DESC LIMIT $stat_limit, $post_per_load";
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
										<?php if($image!="NULL"){  ?>
											<a class="more" href="read_more.php?view_post=<?php echo $post_id;?>">
												<img class="img-responsive" src="image/post/<?php echo $image;?>" alt="Image is not support"/>
											</a>
										<?php }		?>
										
										<h4>
											<a class="more" style="color:black;" href="read_more.php?view_post=<?php echo $post_id;?>">	
												<?php echo $headings;?>
											</a>	
										</h4>
										<div class="timeline-time"> <p><?php echo $date?><span> at <?php echo $post_time?></span></p><i class="fa fa-globe"> </i> <?php echo $catagory;?> <a style="margin-left: 10px; text-decoration: underline;"><?php	echo $post_type;?></a></div>
										<p><?php echo $description;?> <a class="more" href="read_more.php?view_post=<?php echo $post_id;?>">more..</a></p>
										
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
													<span><i class="material-icons comment-icon">insert_comment</i> <a href="forum_more.php?view_forum=<?php echo $post_id;?>"> 
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
												<li><span><i class="material-icons review-icon">star</i>5</span></li>
											</ul>
										</div> <!-- view-list end-->
									</div><!-- blog-content end-->
<?php   } ?>