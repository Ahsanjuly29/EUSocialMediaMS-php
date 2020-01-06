<?php 
$link='All User';
include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['admin_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php include('include/header.php')?>
			<div class="admin-content-area">
				<div class="admin-content">
					<div class="content-heading">
						<h3>All Post</h3>
						<!--
						<div class="search-option">
						<form action="search.php" method="GET">
							<input size="25" type="text" name="search" />
							<button name="search" type="submit"><i class="fa fa-search"></i></button>
						</form>
						</div>
						-->
					</div>
					<div class="content">
						<div class="all-people">
							<table style="margin-bottom:10px;padding:0;">
								<tbody>
									<tr>
										<th style="border:1px solid black;background:rgba(26,187,156,0.5);padding:5px;"><a style="color:red; text-align:center;" href="all_user.php?user=student">Students</a></th>
										<th style="border:1px solid black;background:rgba(26,187,156,0.5);padding:5px;"><a style="color:red; text-align:center;" href="all_user.php?user=teacher">Teachers</a></th>
										<th style="border:1px solid black;background:rgba(26,187,156,0.5);padding:5px;"><a style="color:red; text-align:center;" href="all_user.php?admin=admin">Admins</a></th>
									</tr>
								</tbody>
							</table>
							

<?php							if(isset($_GET['user'])){
								$user=$_GET['user'];
?>
							<div class="content">
								<div class="all-people">
									<table>
										<tr>
											<th>Id</th>
											<th>Name</th>
											<th>Phone Number</th>
											<th>Sex</th>
											<th>Image</th>
											<th>Permission</th>
											<th>option</th>
										</tr>
<?php
									$query="SELECT * from $user ORDER BY 1 DESC";
									$run= mysqli_query($connection,$query);
									while($row=mysqli_fetch_array($run)){
									$id = $row[$user.'_'.'id'];
									$name = $row['first_name'];
									$mobile = $row['mobile'];
									$sex = $row['sex'];
									$image =$row[$user.'_'.'image'];
									$permission=$row['permission'];
?>
										<tr>
											<td><?php echo $id;?></td>
											<td><?php echo $name;?></td>
											<td><?php echo $mobile;?></td>
											<td><?php echo $sex;?></td>
											<td><img src="../image/<?php echo $user;?>/<?php echo $image;?>"width="50" height="50" alt="" /></td>
											<td><?php echo $permission;?></td>		
											<td>
												<ul class="option-area">
													<li>
														<a href="single_<?php echo $user?>.php?view_<?php echo $user?>=<?php echo $id;?>">More..</a>
													</li>
												</ul>
											</td>
										</tr>							  
					<?php 			}	
								}?>	
					
									</table>
								</div>
							</div>

					
<?php							if(isset($_GET['admin'])){			?>

							<div class="content">
								<div class="all-people">
									<table>
										<tr>
											<th>Id</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Phone Number</th>
											<th>Sex</th>
											<th>Image</th>
											<th>Admin_type</th>
											<th>option</th>
										</tr>
<?php
									$query="SELECT * from admin ORDER BY 1 DESC";
									$run= mysqli_query($connection,$query);
									while($row=mysqli_fetch_array($run)){
										$id = $row['admin_id'];
										$fname = $row['first_name'];
										$lname = $row['last_name'];
										$mobile = $row['mobile'];
										$sex = $row['sex'];
										$image = $row['admin_image'];
										$admin_type=$row['admin_type'];
?>
										<tr>
											<td><?php echo $id;?></td>
											<td><?php echo $fname;?></td>
											<td><?php echo $lname;?></td>
											<td><?php echo $mobile;?></td>
											<td><?php echo $sex;?></td>
											<td><img src="../image/admin/<?php echo $image;?>"width="50" height="50" alt="" /></td>
											<td><?php echo $admin_type;?></td>		
											<td>
												<ul class="option-area">
													<li>
														<a href="single_admin.php?view_admin=<?php echo $id;?>">More..</a>
													</li>
												</ul>
											</td>
										</tr>							  
					<?php 	}	}?>
									</table>
								</div>
							</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('include/footer.php')?>
<?php }?>