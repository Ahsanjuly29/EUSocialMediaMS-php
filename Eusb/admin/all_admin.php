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
<?php include('include/header.php');?>
			<div class="admin-content-area">
				<div class="admin-content">
					<div class="content-heading">
						<h3>All Admin</h3>
						<div class="search-option">
							<form action="search.php" method="GET">
								<input size="25" type="text" name="admin_search" />
								<button type="submit" name="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
<?php
	if(isset($_GET['type'])){
		$type=$_GET['type'];
?>
					<div class="content">
						<div class="all-people">
							<table>
							  <tr>
								<th>ID</th>
								<th>Name</th>
								<th>Phone Number</th>
								<th>Sex</th>
								<th>Image</th>
								<th>option</th>
								<th>$</th>
							  </tr>
<?php
		
		$i=1;
		$query="SELECT * from admin WHERE admin_type='$type' and permission!='DELETED' ORDER BY 1 DESC";
		$run= mysqli_query($connection,$query);
		while($row=mysqli_fetch_array($run)){

			$id = $row['admin_id'];
			$fname = $row['first_name'];
			$lname = $row['last_name'];
			$email = $row['email'];
			$mobile = $row['mobile'];
			$sex = $row['sex'];
			$image = $row['admin_image'];
			$permission =$row['permission'];
			
			
?>
							  <tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $fname;?></td>
								<td><?php echo $mobile;?></td>
								<td><?php echo $sex;?></td>
								<td><img src="../image/admin/<?php echo $image;?>"width="50" height="50"/></td>
								<td>
									<ul class="option-area">
									<?php	
									if($_SESSION['admin_type']=='Admin' OR $_SESSION['admin_type']=='admin' OR $_SESSION['admin_type']=='ADMIN'){
									?>
										<li title="edit">
											<a href="edit_admin.php?edit_admin=<?php echo $id;?>">
												<i class="fa fa-edit"></i>
											</a>
										</li>
										<li title="delete">
											<a href="permission.php?delete_admin=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete this item?');">
												<i class="fa fa-trash"></i>
											</a>
										</li>
									<?php
									}?>
										<li title="more">
											<a href="single_admin.php?view_admin=<?php echo $id;?>">More..</a>
										</li>
									</ul>
								</td>
								<td><?php echo $permission;?></td>
							  </tr>
<?php	}} ?>
							</table>
						</div>						
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
<?php include('include/footer.php');?>
<?php } ?>