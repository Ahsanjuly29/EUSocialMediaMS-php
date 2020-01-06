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
			
				<div class="main-body">		
					<h3>Personal Interest
						<a href="../edit_skill.php?add=<?php echo $user_id;?>">
							<span class="add">
								<i class="fa fa-plus-circle" aria-hidden="true" width="5"></i>
							</span>	
						</a>						
					</h3>
					<ul>
					<!--USe while -->
					<?php
						$query="SELECT * FROM skill where user_id=$user_id";
						$run= mysqli_query($connection,$query);
						while($row=mysqli_fetch_array($run)){
							$S_id=$row['s_id'];
							$Interest=$row['Interest'];
							if($Interest!=""){
					?>
						<li>
							<?php echo $Interest;?>
							<span>
								<a href="../edit_skill.php?edit=<?php echo $S_id;?>">	
									<span class="add">
										<i class="text-dark fas fa-user-edit" aria-hidden="true"></i>
									</span>					
								</a>
							</span>
						</li>
					<?php
							}}
					?>	
					</ul>

<?php
	$query="SELECT * FROM personal where user_id=$user_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);
		$p_user_id=$row['user_id'];
		$designation=$row['designation'];
		$Objective=$row['Objective'];
		$p_mobile=$row['mobile'];
		$father=$row['father'];
		$mother=$row['mother'];
		$dob=$row['dob'];
		$gender=$row['gender'];
		$relationship=$row['relationship'];
		$nationality=$row['nationality'];
		$religion=$row['religion'];
		$per_addr=$row['per_addr'];
		$cur_addr=$row['cur_addr'];
?>					
					<h3>Personal information:</h3>
					<ul>
						<li>Father's Name: <span><?php echo $father;?></span></li>
						<li>Mother's Name: <span><?php echo $mother;?></span></li>
						<li>Date of Birth: <span><?php echo $dob;?></span></li>
						<li>Gender: <span><?php echo $gender;?></span></li>
						<li>Marital Status: <span><?php echo $relationship;?></span></li>
						<li>Nationality: <span><?php echo $nationality;?></span></li>
						<li>Religion: <span><?php echo $religion;?></span></li>
						<li>Permanent Address: <span><?php echo $per_addr;?></span></li>
						<li>Current Location: <span><?php echo $cur_addr;?></span></li>
					</ul>
				</div>
			</div>
			
<?php require_once('style_right_side_bar.php');?>	
<?php require_once('style_footer.php');?>	
<?php } ?>














