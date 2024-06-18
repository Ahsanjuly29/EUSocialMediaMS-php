<?php 
	$page='All Notice';
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
					<div class="col-md-8 col-xs-12">
						<div class="page-left">

<?php
	//	if(isset($_GET['forum'])){
			
		$query="SELECT * from posts where post_type='notice' ORDER BY 1 DESC";
		$run= mysqli_query($connection,$query);
		while($row=mysqli_fetch_array($run)){

			$post_id = $row['post_id'];
			//$date = date('y-m-d');
			$post_date = $row['post_date'];
			$post_time = $row['post_time'];
			$headings=substr($row['post_headings'],0,100);								
			$description=substr($row['post_description'],0,300);								
			$author=$row['post_author'];
			$catagory=$row['post_catagory'];
			$date=$row['post_date'];
			$image=$row['post_image'];
?>						
							<div class="forum-item wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
								<div class="row">
									<div class="col-xs-4 col-sm-2 text-center">
										<div class="entry-meta forum-entry">
											<ul>
												<?php
													$query2="SELECT * from admin where admin_id=$author ORDER BY 1 DESC";
													
													$run2= mysqli_query($connection,$query2);
													$row2=mysqli_fetch_array($run2);
														$id=$row2['admin_id'];
														$name=$row2['first_name'];
														
												 ?>	
												<li>
													<span>
														<i class="fa fa-user"></i>
														<a href="another_profile.php?view_user=<?php echo $id;?>&&other_id=<?php echo $id;?>&&user_type=admin">	
															<?php echo $name;?>
														</a>
													</span>
													<!--
													<span>
														<a class="blog-person-name" href="another_profile.php?view_user=<?php echo $id;?>&&other_id=<?php echo $id;?>">
															<?php // echo $author;?>
														</a>
													</span>
													-->
												</li>

												<li><span><a href="#"><i class="fa fa-tags"></i><span class="tag-count"></span><?php echo $catagory;?></a></span></li>
												
											</ul>
										</div>
									</div>
										
									<div class="col-xs-12 col-sm-10 forum-content">
										<h4>
											<a class="more" href="notice_more.php?view_notice=<?php echo $post_id;?>" >
												<?php echo $headings;?>
											</a>
											<p>					
												<span id="publish_date"><?php echo $post_date;?> at <?php echo $post_time;?></span>
											</p>
											 
										</h4>
									</div><!-- blog-content end-->
								</div> <!-- row end-->
							</div>	<!-- blog-item end-->
		<?php }
		//} ?>
						</div>	<!-- page-left end-->
					</div>	<!-- col-md-8 col-sm-6 col-xs-12 end-->
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
<?php  } ?>