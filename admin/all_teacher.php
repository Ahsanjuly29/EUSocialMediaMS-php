<?php 
$link='Teacher';
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
					<?php $permission=$_GET['teachers'];{?>
						<h3><?php echo $permission?> Teachers</h3>
						<div class="search-option">
							<form action="search.php" method="GET">
								<input size="25" type="text" name="teacher" />
								<button type="submit" name="teacher_search"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
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
						$i=1;
						$query="SELECT * from teacher WHERE permission='$permission' ORDER BY 1 DESC";
						$run= mysqli_query($connection,$query);
						while($row=mysqli_fetch_array($run)){
							
							$id = $row['teacher_id'];
							$name = $row['first_name'];
							$mobile = $row['mobile'];
							$sex = $row['sex'];
							$image = $row['teacher_image'];
			
?>
							  <tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $name;?></td>
								<td><?php echo $mobile;?></td>
								<td><?php echo $sex;?></td>
								<td><img src="../image/teacher/<?php echo $image;?>"width="50" height="50" alt="" /></td>
								<td>
									<?php echo $permission;?>
									<ul class="option-area">
									<?php
										if($permission=="BLOCKED"){
									?>
											<li title="Click here to Approve this person">
												<a href="permission.php?approve_teacher=<?php echo $id;?>" onclick="return confirm('Are you sure you want to approve this item?');" >
													<i class="fa fa-exclamation-triangle"></i>
												</a>
											</li>
									<?php
										}
										else if($permission=="APPROVED"){
									?>		
											<li title="Click here to Block this person">
												<a href="permission.php?block_teacher=<?php echo $id;?>" onclick="return confirm('Are you sure you want to block this item?');">
													<i class="fa fa-check"></i>
													
												</a>
											</li>
									<?php }
										else if($permission=="PENDING"){ ?>
									
										<li title="Click here to Approve this person">
											<a href="permission.php?approve_teacher=<?php echo $id;?>" onclick="return confirm('Are you sure you want to approve this item?');">
												<i class="fa fa-check"></i>
											</a>
										</li>
										<li title="Click here to Block this person">
											<a href="permission.php?block_teacher=<?php echo $id;?>" onclick="return confirm('Are you sure you want to block this item?');">
												<i class="fa fa-exclamation-triangle"></i></li>
											</a>
									<?php }?>
									</ul>
								</td>		
								<td>
									<ul class="option-area">		
										<li>
											<a href="permission.php?delete_teacher=<?php echo $id;?>" onclick="return confirm('Are you sure you want delete this item?');">
												<i class="fa fa-trash"></i>
											</a>
										</li>
										<li>
											<a href="single_teacher.php?view_teacher=<?php echo $id;?>">More..</a>
										</li>
									</ul>
								</td>
							  </tr>
<?php }} ?>							  
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('include/footer.php')?>
<?php } ?>