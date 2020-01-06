<?php 
$link='Read More';
include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['admin_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php require_once('include/header.php'); ?>
	
	<section class="content-section">
		<div class="container">
			<div class="page-area">
				<div class="row">
<?php
		if(isset($_GET['view_post'])){
			
		$id1=$_GET['view_post'];	
		$query="SELECT * from posts where post_id=$id1 ORDER BY 1 DESC";
		$run= mysqli_query($connection,$query);
		while($row=mysqli_fetch_array($run)){

			$id = $row['post_id'];
			//$date = date('y-m-d');
			$post_date = $row['post_date'];
			$headings=$row['post_headings'];								
			$description=$row['post_description'];								
			$author=$row['post_author'];
			$catagory=$row['post_catagory'];
			$post_type=$row['post_type'];
			$user_type=$row['user_type'];
			 
			$image=$row['post_image'];
?>
					<div class="col-md-8 col-sm-6 col-xs-12">
						<div class="page-left">
							<div class="blog-item wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
								<div class="row">
									<div class="col-xs-12 blog-content read-more-content full-blog-content">
										
										<?php
										
											$user=$user_type;
											$id = $user.'_'.'id';
											$query="SELECT * from $user where $id=$author ORDER BY 1 DESC";
											
											$run2= mysqli_query($connection,$query);
											$row2=mysqli_fetch_array($run2);
												$id = $row2[$user.'_'.'id'];
												$fname = $row2['first_name'];
												$image_icon=$row2[$user.'_'.'image'];
											
										 ?>
										 
										<img src="../image/<?php echo $user;?>/<?php echo $image_icon;?>" style="height:50px; width:50px;"alt="" />
										<h3><?php echo $fname;?></h3>
										<a href=""><img class="img-responsive" src="../image/post/<?php echo $image;?>" style="height:350px; width:auto;" alt="Image is not support"/></a>
										<h4><?php echo $headings;?></h4>
										<div class="time">
											<p><?php echo $post_date?></p>
										</div>
										<p><?php echo $description;?></p>
									</div><!-- blog-content end-->
								</div> <!-- row end-->
								
								
								<div class="do-comment" style="margin-top:10px;height:350px; width:350px;">
									<h5>All comments</h5>
									
								</div>
								
								
							</div>	<!-- blog-item end-->
							
						</div>	<!-- page-left end-->
					</div>	<!-- col-md-8 col-sm-6 col-xs-12 end-->
	<?php   }   } ?>					
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="page-right">
							
						</div> <!-- page-right end-->
					</div> <!-- col-md-4 col-sm-6 col-xs-12 end-->
				</div> <!-- row end-->
			</div> <!-- page-area end-->
		</div> <!-- container end-->
	</section> <!-- content-section end-->

	
	<?php require_once('include/footer.php'); ?>
</body>
</html>
<?php } ?>