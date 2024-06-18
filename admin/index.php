<?php 
$link='Home';

include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['admin_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php include('include/header.php');?>
			<div class="admin-content-area">
				<div class="admin-content">
					<div class="content-heading">
						<h3>Admin Panel</h3>
						<p style="color:#1ABB9C;text-align:right;">Now&nbsp;<span style="color:#DE5190">Time is:&nbsp;</span><?php echo date("h:i:sa");?></p>
					</div>
					<div class="content">
						<div class="admin-home-content">

							<a href="single_admin.php?view_admin=<?php echo $_SESSION['admin_id'];?>">
								<div class="content-image">
									<p>My Profile</p>
									<i class="fa fa-user"></i>
								</div>
							</a>
					
							<a href="mail.php">
								<div class="content-image">
									<p>Contact</p>
									<i class="fa fa-envelope"></i>
								</div>
							</a>
							<a href="">
								<div class="content-image">
									<p>Admin Activities</p>
									<i class="fa fa-street-view"></i>
								</div>
							</a>
							<a href="update_status.php">
								<div class="content-image">
									<p>Update Status</p>
									<i class="fa fa-lock"></i>
								</div>
							</a>
							<a href="">
								<div class="content-image">
									<p>Group Activities</p>
									<i class="fa fa-users"></i>
								</div>
							</a>
							<a href="">
								<div class="content-image">
									<p>Not Identify</p>
									<i class="fa fa-book"></i>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--
<marquee>
	<p style="color:#1ABB9C;text-align:left;">Now&nbsp;<span style="color:#DE5190">Time is:&nbsp;</span><?php echo date("h:i:sa");?></p>
</marquee>
-->
<?php include('include/footer.php')?>
<?php } ?>