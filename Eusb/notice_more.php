<?php 
	$page='Notice';
	include("include/connection.php"); ?>
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
		if(isset($_GET['view_notice'])){
			
		$id1=$_GET['view_notice'];	
		$query="SELECT * from posts where post_id=$id1 ORDER BY 1 DESC";
		$run= mysqli_query($connection,$query);
		while($row=mysqli_fetch_array($run)){

			$id = $row['post_id'];
			//$date = date('y-m-d');
			$headings=substr($row['post_headings'],0,2000);								
			$description=substr($row['post_description'],0,2000);								
			$author=$row['post_author'];
			$catagory=$row['post_catagory'];
			$date=$row['post_date'];
			$post_time = $row['post_time'];
			$image=$row['post_image'];
?>	
					<div class="col-md-8 col-sm-10 col-xs-12">
						<div class="page-left">
							<div class="blog-item wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
								<div class="row">
									<div class="col-xs-12 col-sm-2 text-center">
									<?php
										// $user=$_SESSION['user1'];
										// $id = $user.'_'.'id';
										// $user_id=$_SESSION['user_id'];
										$query="SELECT * from admin where admin_id=$author ORDER BY 1 DESC";
										
										$run2= mysqli_query($connection,$query);
										$row2=mysqli_fetch_array($run2);
											$id = $row2['admin_id'];
											$fname = $row2['first_name'];
											$image_icon=$row2['admin_image'];
											
										 ?>
										<div class="entry-meta xs-entry-meta forum-entry">
											<ul>
												<li class="forum-person">
													<div class="">
														<a href="another_profile.php?view_user=<?php echo $id;?>&&other_id=<?php echo $id;?>&&user_type=admin">
															<img src="image/admin/<?php echo $image_icon;?>" style="height:50px; width:50px; object-fit: cover;"alt="" /><br>
															<?php echo $fname;?>
														</a>
													</div>
												</li>
												<!--
												<li><span>
														<a class="blog-person-name" href="another_profile.php?view_user=<?php echo $id;?>&&other_id=<?php echo $id;?>">
															<?php //echo $author;?>
														</a>
													</span>
												</li>
												<li><span id="publish_date"><?php// echo $date;?> at <?php// echo $post_time;?></span></li>
												-->
												<li><span><a href="#"><i class="fa fa-tags"></i><span class="tag-count"></span>&nbsp;<?php echo $catagory;?></a></span></li>
											</ul>
										</div>
									</div>
										
									<div class="col-xs-12 col-sm-10">
										<h4 style="line-height: 26px;"><?php echo $headings;?></h4>
										<p><?php echo $description;?></p>
										<?php
											if($image!=""){
										?>
											<img src="image/post/<?php echo $image;?>" alt="" />
										<?php	
											}
										?>
										<span id="publish_date" >
											<p style="color: #2196F3;"><?php echo $date;?> at <?php echo $post_time;?><hr /></p>
										</span>
									</div><!-- blog-content end-->
								</div> <!-- row end-->
							</div>	<!-- blog-item end-->
							
							
						</div>	<!-- page-left end-->
					</div>	<!-- col-md-8 col-sm-6 col-xs-12 end-->
		<?php } } ?>
					<div class="col-md-4 col-sm-2 col-xs-12">
						<div class="page-right">
							
						</div> <!-- page-right end-->
					</div> <!-- col-md-4 col-sm-6 col-xs-12 end-->
				</div> <!-- row end-->
			</div> <!-- page-area end-->
		</div> <!-- container end-->
	</section> <!-- content-section end-->
	
<?php require_once('include/blog_footer.php'); ?>
</body>
</html>
<?php } ?>