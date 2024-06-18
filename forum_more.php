<?php 
	$page='Forum';
	require_once("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['first_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php require_once('include/blog_header.php'); ?>

	<section class="content-section">
		<div class="container">
			<div class="page-area">
				<div class="row">
<?php 
				$user_id=$_SESSION['user_id'];
	echo			$user_type=$_SESSION['user_type'];
				if(isset($_GET['vote'])){

					$post_id = $_GET['forum_no'];
					$query = "SELECT * FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
					$result = mysqli_query($connection, $query);
					
						if(mysqli_num_rows($result) > 0){
							$query = "DELETE FROM vote WHERE post_id='$post_id' AND user_id='$user_id'";
							$result = mysqli_query($connection, $query);
							// require_once("forum_more.php?view_forum=$post_id");
				echo "<script>window.open('forum_more.php?view_forum=$post_id','_self') </script>";
						}
						else{
							$query = "INSERT INTO vote (post_id, user_id) VALUES ('$post_id', '$user_id')";
							$result = mysqli_query($connection, $query);
							// require_once("forum_more.php?view_forum=$post_id");
							echo "<script>window.open('forum_more.php?view_forum=$post_id','_self') </script>";
							// _top
						}
				}		
?>				
<?php
				if(isset($_GET['view_forum'])){
					
				$post_id=$_GET['view_forum'];	
				$query="SELECT * from posts where post_id=$post_id ORDER BY 1 DESC";
				$run= mysqli_query($connection,$query);
				$row=mysqli_fetch_array($run);
				//while($row=mysqli_fetch_array($run)){
					
					// $post_id = $row['post_id'];
					//$date = date('y-m-d');
					$headings=$row['post_headings'];								
					$description=$row['post_description'];								
					$author=$row['post_author'];
					$catagory=$row['post_catagory'];
					$date=$row['post_date'];
					$post_time = $row['post_time'];
					$image=$row['post_image'];
					$user=$row['user_type'];
					 	
?>					<div class="col-md-8 col-sm-10 col-xs-12">
						<div class="page-left">
							<div class="blog-item wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
								<div class="row">
									<div class="col-xs-12 col-sm-2 text-center">
									<?php
										$id = $user.'_'.'id';
										$query="SELECT * from $user where $id=$author ORDER BY 1 DESC";
										
										$run2= mysqli_query($connection,$query);
										$row2=mysqli_fetch_array($run2);
											$id = $row2[$user.'_'.'id'];
											$fname = $row2['first_name'];
											$image_icon=$row2[$user.'_'.'image'];
											$user=$row2['user_type'];
											
										 ?>
										<?php
											if($user_id==$author){
												$profile="my_profile.php";
											}
											else{
												$profile="another_profile.php";
											}
										?>
										<div class="forum-person">
											<div class="forum-person-image">
												<img src="image/<?php echo $user;?>/<?php echo $image_icon;?>" alt="" />
											</div>
										</div>
									</div>
										
									<div class="col-xs-12 col-sm-10">
										<h4><?php echo $headings;?></h4>
										<p><?php echo $description;?></p>
										
										<div class="entry-meta view-list">
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
													<span><i class="fa fa-comment"></i> <a href="forum_more.php?view_forum=<?php echo $post_id;?>"> 
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
												<li><span><i class="fa fa-eye"></i><a href="##"><span class="view-count"></span>100 view</a></span></li>
											</ul>
										</div> <!-- entry-meta end-->
								<div class="do-comment">
									<h5>Write your comment.</h5>
 
									<form action="forum_more.php" method="POST" enctype="multipart/form-data">
									<!--	<textarea type="text" name="comment" ></textarea> -->
										<input type="text" name="user_id" value="<?php echo $user_id; ?>"style="display:none" />
										<input type="text" name="post_id" value="<?php echo $post_id;?>"style="display:none" />
										<input type="text" name="comment" value=""/>
										<div class="yourCustomDiv"/>
										<input type="submit" name="submit_comment" style="display:none"/>
									</form>
 
								</div>
<?php//     } ?>					
								<?php
									$query = "SELECT * FROM comment WHERE post_id='$post_id' ORDER BY 1 DESC";
									$run= mysqli_query($connection,$query);
									while($row=mysqli_fetch_array($run)){
										$comment_id=$row['id'];
										$user_id1=$row['user_id'];
										$post_id=$row['post_id'];
										$comment=$row['comment'];
										$date=$row['c_date'];
										$time=$row['c_time'];
										$user_type=$row['user_type']; /*end of Comment section*/
										
										/*Start of Commenter section*/
										$id = $user_type.'_'.'id';
										$query2="SELECT * from $user_type where $id=$user_id1 ORDER BY 1 DESC";
										$run2= mysqli_query($connection,$query2);
										$row2=mysqli_fetch_array($run2);
											// $id = $user_type.'_'.'id';
										$fname = $row2['first_name'];
										$image_icon=$row2[$user_type.'_'.'image'];
										
								?>	
								<div class="comment-area">
									<div class="single-comment">
										<div class="comment-person">
											<img src="image/<?php echo $user_type;?>/<?php echo $image_icon;?>" alt="" />
										</div>
										
										<div class="person-comment">
											<a href="#" class="comment-person-name"><?php echo $fname;?></a>
										<?php /*Condition start fot real Commenter*/
											if($user_id!=$user_id1){
												$show="none";
											}else{
										?>	
											<!-- <span title="edit" style="display:<?php echo $show;?>;">
												<a href="#" title="Coming Soon">
													Edit
												</a>
											</span> -->       <!-- <i class="fa fa-edit"></i> -->
											
											<span title="delete" style="display:<?php echo $show;?>;">
												<a href="?delete_comment&&comment_id=<?php echo $comment_id;?>&&post_id=<?php echo $post_id;?>" onclick="return confirm('Are you sure you want to delete this item?');">
													Delete
												</a>
											</span>         <!-- <i class="fa fa-eraser"></i> -->
									<?php   }?>
											<div class="time">
												<p><?php echo $date;?>
													<span class="bg-success"><?php echo $time;?></span>
												</p>
											</div>
											<p><?php echo $comment;?></p>
										</div>
										
									</div>
								</div>
							<?php   } ?>
										
									</div><!-- blog-content end-->
									
									<div class="col-xs-12 text-center">
									</div> <!-- col-xs-12 end-->
								</div> <!-- row end-->
							</div>	<!-- blog-item end-->
							
							
						</div>	<!-- page-left end-->
					</div>	<!-- col-md-8 col-sm-6 col-xs-12 end-->
<?php		//} ?>
<?php		    } ?>
<?php 
								if(isset($_POST['submit_comment'])){
									
									$user_id=$_POST['user_id'];
									$post_id=$_POST['post_id'];
									$comment=$_POST['comment'];
									$date = date('y-m-d');
									$time=date("h:i:sa");
									
									
									$query = "INSERT INTO comment (user_id,post_id,comment,c_date,c_time,user_type)
												VALUES ('$user_id','$post_id','$comment','$date','$time','$user_type')";
									$result = mysqli_query($connection, $query);
									
									echo "<script>window.open('forum_more.php?view_forum=$post_id','_self') </script>";
									// _top

								}		
?>	
<?php
								if(isset($_GET['delete_comment'])){
									
									$comment_id=$_GET['comment_id'];
									$post_id=$_GET['post_id'];
									
									$delete_query="DELETE FROM comment where id='$comment_id' ";
									$result = mysqli_query($connection, $delete_query);
									
									echo "<script>window.open('forum_more.php?view_forum=$post_id','_self') </script>";
								}
?>		
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="page-right">
							
						</div> <!-- page-right end-->
					</div> <!-- col-md-4 col-sm-6 col-xs-12 end-->
				</div> <!-- row end-->
			</div> <!-- page-area end-->
			
			
			
		</div> <!-- container end-->
	</section> <!-- content-section end-->
	
	<div class="user-contact profile-menu">
		<ul>
			<li><a href=""><i class="fa fa-envelope"></i>Message <span>(10)</span></a> </li>
			<li><a href=""><i class="fa fa-bell"></i>Notification <span>(10)</span></a> </li>
		<ul>
	</div>
	
<?php require_once('include/blog_footer.php'); ?>
</body>
</html>
<?php } ?>