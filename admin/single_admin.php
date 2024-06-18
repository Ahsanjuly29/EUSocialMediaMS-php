<?php 
$link='Admin';
include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['admin_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php include('include/header.php')?>
<?php
	if(isset($_GET['view_admin'])){
		
		$edit_id= $_GET['view_admin'];
		$query = "select * from admin where admin_id='$edit_id'";
		$run=mysqli_query($connection,$query);
			while($row = mysqli_fetch_array($run)){
				
				$id = $row['admin_id'];
				$fname = $row['first_name'];
				$lname = $row['last_name'];
				$email = $row['email'];
				$mobile = $row['mobile'];
				$sex = $row['sex'];
				$password = $row['password'];
				$type = $row['admin_type'];
				$image = $row['admin_image'];
				$password=$row['password'];
			}
	}
?>
			<div class="admin-content-area">
				<div class="admin-content">
					<div class="content-heading">
						<h3>View Admin</h3>
					</div>
					<div class="content">
						<div class="view-student">
							<div class="view-student-area">
								<img src="../image/admin/<?php echo $image; ?>" alt="" />
							</div>
							<div class="view-student-area">
								<ul>
									<li>ID:</li>
									<li><?php echo $id; ?></li>
								</ul>
							</div>
							<div class="view-student-area">
								<ul>
									<li>Name:</li>
									<li><?php echo $fname,' ',$lname; ?></li>
								</ul>
							</div>
							<div class="view-student-area">
								<ul>
									<li>Email</li>
									<li><?php echo $email; ?></li>
								</ul>
							</div>
							<div class="view-student-area">
								<ul>
									<li>Phone Number</li>
									<li><?php echo $mobile; ?></li>
								</ul>
							</div>
							<div class="view-student-area">
								<ul>
									<li>Gender</li>
									<li><?php echo $sex; ?></li>
								</ul>
							</div>
							<div class="view-student-area">
								<ul>
									<li>Designation</li>
									<li><?php echo $type; ?></li>
								</ul>
							</div>
						<?php	
							if($_SESSION['admin_type']=='Admin' OR $_SESSION['admin_type']=='admin' OR $_SESSION['admin_type']=='ADMIN'){
								
							?>	
							<div class="view-student-area">
								<ul>
									<li>Currtent password</li>
									<li><?php echo $password; ?></li>
								</ul>
							</div>
							<div class="view-student-area">
							<!--	<a href="edit_admin.php?edit_admin=<?php echo $id;?>">
									--><a href="edit_admin.php?edit_admin=<?php echo $id;?>" title="Coming Soon">
									<i class="fa fa-edit">Edit profile</i>
								</a>
							</div>
					<?php   }?>
							<!--
						
							<div class="view-student-area">
								<a href="edit_admin.php?edit_admin=<?php// echo $_SESSION['admin_id'];?>">
									<i class="fa fa-edit">Edit profile</i>
								</a>
							</div>

-->						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('include/footer.php')?>
<?php }?>