<?php 
$page='all';
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
					<div class="col-md-8 col-sm-6 col-xs-12">
						<div class="page-left">
							
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
	<?php require_once('include/blog_footer.php'); ?>
</body>
</html>
<?php } ?>