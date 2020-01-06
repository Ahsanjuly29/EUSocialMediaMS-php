<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user_id'])){
	
	header("location: ../sign_in.php");
}
else{
?>

<?php require_once('style_head.php');?>	
<?php
	$query="SELECT * FROM education where user_id=$user_id";
	$run= mysqli_query($connection,$query);
?>	
				<div class="main-body">		
					<h3> <i class="fas fa-graduation-cap"></i> Education
						<a href="../edit_education.php?add=<?php echo $user_id;?>" target="blank">
							<span class="add">
								<i class="fa fa-plus-circle" aria-hidden="true" width="5"></i>
							</span>	
						</a>					
					</h3>
					<table class="table">
						<thead>
							<tr>
								<th>Title</th>	
								<th>subject</th>	
								<th>Institute</th>	
								<th>Year</th>	
							</tr>
						</thead>
						<tbody>
<?php
				while($row=mysqli_fetch_array($run)){
					$e_id=$row['e_id'];
					$e_user_id=$row['user_id'];
					$Title=$row['Title'];
					$Subject=$row['Subject'];
					$Institution=$row['Institution'];
					$start_Year=$row['start_Year'];
					$pass_year=$row['pass_year'];
?>						
							<tr>
								<td><?php echo $Title;?></td>
								<td><?php echo $Subject;?></td>
								<td><?php echo $Institution;?></td>
								<td><?php echo $start_Year,'-',$pass_year;?></td>
								<td>
									<a href="../edit_education.php?edit=<?php echo $e_id;?>" target="blank">	
										<span class="add">
											<i class="text-dark fas fa-user-edit" aria-hidden="true"></i>
										</span>					
									</a>
								</td>
							</tr>
<?php 
				} 
?>
						</tbody>
					</table>
				</div>
			</div>
	
<?php require_once('style_right_side_bar.php');?>	
<?php require_once('style_footer.php');?>	




<?php
	}
?>