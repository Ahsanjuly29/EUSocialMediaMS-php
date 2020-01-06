<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user_id'])){
	
	header("location: ../sign_in.php");
}
else{
	require_once("functions.php");	
?>
<?php 
	$user_id=$_SESSION['user_id'];
	$query="SELECT * FROM user where user_id=$user_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);
		$user_id=$row['user_id'];
		$first_name=$row['first_name'];
		$last_name=$row['last_name'];
		$mobile=$row['mobile'];
		$email=$row['email'];
		$color=$row['color'];
		// $password=$row['password'];
		$image=$row['image'];
?>			
			<div class="col-md-4 col-sm-4 p-0" style="background-color:<?php echo $color;?>;">
				<div class="rightside">
					<div class="title">
						<a href="../index.php" target="blank">
							<img src="../image/<?php echo $image?>" alt="" class="img-thumbnail rounded-circle" align="left" width="150" height="150">
						</a>
						<h3>
							<b><?php echo $first_name,' ',$last_name;?></b>
						</h3>
						<p class="text-secondary">
							<b><?php echo $designation;?>&nbsp;</b>
						</p>
					</div>
					
					<div class="details">
						<h3>Contact
							<span class="add1">
								<a href="../edit_user.php?edit=<?php echo $user_id;?>">
									<i class="fas fa-user-edit"></i>
								</a>
							</span>
						</h3>
							<p><a href=""><?php echo $cur_addr;?></a></p>
							<p><a href=""><?php echo $email;?></a></p>
							<p><a href="tel:<?php echo $mobile;?>"><?php echo $mobile;?></a></p>
						
<?php
 	$query="SELECT * FROM social where user_id=$user_id";
	$run= mysqli_query($connection,$query);
?>						
						<h3 class="p-2">Social
							<span class="add1">
								<a href="../edit_social.php?add=<?php echo $user_id;?>" align="right">
										<i class="fa fa-plus-circle" aria-hidden="true" width="5"></i>
								</a>
							</span>								
						</h3>
						<div class="">
							<div class="row">
	<?php
			while($row=mysqli_fetch_array($run)){
				$So_id=$row['so_id'];
				$so_user_id=$row['user_id'];
				$social_name=$row['social_name'];
				$social_link=$row['social_link'];
	?>						
								<div class="col-sm-6">
									<a href="<?php echo $social_link;?>">
										<span><?php echo $social_name;?></span>
									</a>
								</div>
								<div class="col-sm-6">
									<a href="../edit_social.php?edit=<?php echo $So_id;?>">	
										<span class="add">
											<i class="text-dark fas fa-user-edit" aria-hidden="true"></i>
										</span>					
									</a>		
								</div>
						<?php
							}
						?>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>