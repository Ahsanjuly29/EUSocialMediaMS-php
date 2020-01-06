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
	$query="SELECT * FROM personal where user_id=$user_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);{
		$p_user_id=$row['user_id'];
		$Objective=$row['Objective'];
	}	
		
?>			
				<div class="main-body">		
					<h3>
						<span>
							<i class="fas fa-user-circle"></i> Profile / Objective
						</span>
					<?php

						if($user_id!=$p_user_id){
							
					?>
						<a href="../edit_personal.php?add=<?php echo $user_id;?>" alt="edit">	
							<span class="add">
								<i class="fa fa-plus-circle" aria-hidden="true"></i>
							</span>					
						</a>	
					<?php
						}else{
					?>	
						<a href="../edit_personal.php?edit=<?php echo $user_id;?>">	
							<span class="add">
								<i class="fas fa-user-edit" aria-hidden="true"></i>
							</span>					
						</a>
					<?php
						}
						
					?>						
					</h3>
					<p><?php echo $Objective;?></p>
					
<?php 

?>					
					<h3><i class="fas fa-globe-asia"></i> Experience 
						<a href="#">
							<span class="add">
								<i class="fa fa-plus-circle" aria-hidden="true" width="5"></i>
							</span>	
						</a>	
						<a href="#">	
							<span class="add">
								<i class="fas fa-user-edit" aria-hidden="true"></i>
							</span>					
						</a>
					</h3>
					<table class="table ">
						<thead>
							<tr>
								<th>Title</th>	
								<th>Company</th>
								<th>Year</th>	
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>----</td>
								<td>----</td>
								<td>----</td>
							</tr>
						</tbody>
					</table>
<?php

?>
					
					<h3><i class="fas fa-poo"></i> References: 
						<a href="../edit_reference.php?add=<?php echo $user_id;?>">
							<span class="add">
								<i class="fa fa-plus-circle" aria-hidden="true" width="5"></i>
							</span>	
						</a>					
					</h3>
					<ul>
					<?php
							$query="SELECT * FROM reference where user_id=$user_id";
							$run= mysqli_query($connection,$query);
							while($row=mysqli_fetch_array($run)){
								$r_id=$row['r_id'];
								$r_user_id=$row['user_id'];
								$r_name=$row['name'];
								$r_organization=$row['Organization'];
								$r_designation=$row['Designation'];
								$r_address=$row['Address'];
								$r_mobile=$row['Mobile'];
								$r_email=$row['Email'];
								$r_gender=$row['Gender'];
					?>
						<hr />
						<a href="../edit_reference.php?edit=<?php echo $r_id;?>">	
							<span class="add">
								<i class="text-dark fas fa-user-edit" aria-hidden="true"></i>
							</span>					
						</a>
						<li>Name: <span><?php echo $r_name;?></span></li>
						<li>Organization: <span><?php echo $r_organization;?></span></li>
						<li>Designation: <span><?php echo $r_designation;?></span></li>
						<li>Gender: <span><?php echo $r_gender;?></span></li>
						<li>Address: <span><?php echo $r_address;?></span></li>
						<li>Mobile: <span><?php echo $r_mobile;?></span></li>
						<li>Email: <span><?php echo $r_email;?></span></li>
					<?php
						}
					?>	
					</ul>
				</div>
			</div>
			
			
<?php require_once('style_right_side_bar.php');?>	
<?php require_once('style_footer.php');?>	
<?php } ?>		 