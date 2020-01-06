<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user_id'])){
	
	header("location: sign_in.php");
}
else{
?>
<?php require_once('functions.php');?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $first_name,' ',$last_name;?></title>
	<!-- cdn styles  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<!-- downloaded stylesheet -->
	<link rel="stylesheet" href="../css/bootstrap.css" />
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../css/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="../css/bootstrap-reboot.css" />
	<link rel="stylesheet" href="../css/bootstrap-reboot.min.css" />
	<!-- Own created style -->
	<link rel="stylesheet" href="../css/style.css"/>
	<style>
		.main-body h3{
			background-color:gray;
		}
		a{
			color:black; 
		}
		a:hover{
			color:white; 
		}
		.sign_out a{
			color:black; 
		}
		.sign_out a:hover{
			color:#17A2B8;
		}
		.add1 a{
			text-decoration:none;
			color:black;
		}
		.add1 a:hover{
			text-decoration:none;
			color:#17A2B8;
		}
		.img-thumbnail{
			position:relative;
		   margin: 0px 0px 0px 10px;	
		}
		.img-thumbnail:hover{
			opacity:0.8;
		}
		@media (min-width: 100px) {
		.img-thumbnail {
			margin:15px 178px 0px -5px;
			}
		}
		@media (min-width: 402px) {
		.img-thumbnail {
			margin:-180px 0px 0px 0px;
			}
		}
		@media (min-width: 767px) {
			.img-thumbnail {
				margin:15px 0px;
				}
			}
	</style>
</head>
<body class="bg-light">
	<div class="container">
		<div class="row bg-white" style="padding:30px 20px;border:2px solid black;border-bottom-width: 2px;border-top-width: 0px;border-left-width: 0px;border-right-width: 0px;">
			<div class="bg-white col-md-6  p-2">	
				<h3>
					<b><?php echo $first_name,' ',$last_name;?>&nbsp;
						<span class="add1">
							<a href="../edit_user.php?edit=<?php echo $user_id;?>">
								<i class="fas fa-user-edit"></i>
							</a>
						</span>
					</b>
				</h3>
				<p class="text-secondary">
					<b><?php echo $designation;?>&nbsp;</b>
					<span class="add1">
						<a href=""target="blank">
							<i class="fas fa-male"></i>
						</a>
					</span>
				</p>
				<p><i class="fas fa-street-view text-info"></i>&nbsp;<?php echo $cur_addr;?></p>
				<p><i class="fas fa-at text-danger"></i>
					<?php echo $email;?>
				</p>
				<p>
					<i class="fas fa-mobile">&nbsp;</i>
					<span class="add1">
						<a href="tel:<?php echo $mobile;?>">
							<?php echo $mobile;?>
						</a>,
					</span>
					<span class="add1">
						<a href="tel:<?php echo $p_mobile;?>">
						<?php echo $p_mobile;?>
					</a>
					</span>
				</p>
			</div>
			<div class="col-md-2 col-sm-2">

			</div> 
			<div class="bg-white col-md-4 col-sm-4">
				<div class="" style="float:right;">
					<a href="../index.php" target="blank">
						<img src="../image/<?php echo $image?>" style="" alt="" class="img-thumbnail" align="left" width="150" height="150"  >
					</a>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="bg-white col-md-12 col-sm-12">	
				<div class="main-body">		
					<h3> 
						<span>
						<i class="fas fa-user-circle"></i> Profile / Objective
						</span>
						<a href="../edit_personal.php?edit=<?php echo $user_id;?>">
							<span class="add">
								<i class="fas fa-user-edit" aria-hidden="true"></i>
							</span>
						</a>
					</h3>
					<p><?php echo $Objective;?></p>
						
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
						<!-- use while here-->
						<?php
							$query="SELECT * FROM education where user_id=$user_id";
							$run= mysqli_query($connection,$query);
							while($row=mysqli_fetch_array($run)){
								$e_id=$row['e_id'];
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
							<?php } ?>	
						<!-- end here-->
						</tbody>
					</table>
					<h3><i class="fab fa-skyatlas"></i> Qualifications
					<?php
						$query="SELECT * FROM skill where user_id=$user_id";
						$run= mysqli_query($connection,$query);
						while($row=mysqli_fetch_array($run)){
							$S_id=$row['s_id'];
							$s_user_id=$row['user_id'];
						}

						
						if($user_id!=$s_user_id){
					?>	
						<a href="../edit_skill.php?add=<?php echo $user_id;?>">
							<span class="add">
								<i class="fa fa-plus-circle" aria-hidden="true" width="5"></i>
							</span>	
						</a>
					<?php
						}else{
					?>	
						<a href="../edit_skill.php?edit=<?php echo $S_id;?>">	
							<span class="add">
								<i class="fas fa-user-edit" aria-hidden="true"></i>
							</span>					
						</a>	
					<?php
						}
					?>		
					</h3>
					<div class="row">
						<div class="col-sm-3">
							<div>
								<p><b>Technical skills</b></p>
							</div>
						</div>
						<div class="col-sm-9">
							<div>
								<p>
									"<?php echo $tech_skill;?>".
								</p>
							</div>
						</div>
						<div class="col-sm-3">
							<div>
								<p><b>Soft Skills</b></p>
							</div>
						</div>
						<div class="col-sm-9">
							<div>
								<p>
									"<?php echo $soft_skill;?>".
								</p>
							</div>
						</div>
					</div>
					<h3><i class="fas fa-desktop"></i> Computer Skills
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
							$comp_skill=$row['comp_skill'];
					?>
						<li>
							<?php echo $comp_skill;?>
							<span>
								<a href="../edit_skill.php?edit=<?php echo $S_id;?>">	
									<span class="add">
										<i class="text-dark fas fa-user-edit" aria-hidden="true"></i>
									</span>					
								</a>
							</span>
						</li>
					<?php
						}
					?>	
					</ul>					
					<h3> <i class="fas fa-comments"></i> Language Skills
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
							$language=$row['language'];
					?>
						<li>
							<?php echo $language;?>
							<span>
								<a href="../edit_skill.php?edit=<?php echo $S_id;?>">	
									<span class="add">
										<i class="text-dark fas fa-user-edit" aria-hidden="true"></i>
									</span>					
								</a>
							</span>
						</li>
					<?php
						}
					?>	
					</ul>
					<h3><i class="fas fa-dumbbell"></i> Strength 
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
							$strentgh=$row['strentgh'];
					?>
						<li>
							<?php echo $strentgh;?>
							<span>
								<a href="../edit_skill.php?edit=<?php echo $S_id;?>">	
									<span class="add">
										<i class="text-dark fas fa-user-edit" aria-hidden="true"></i>
									</span>					
								</a>
							</span>
						</li>
					<?php
						}
					?>	
					</ul>					
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
						}
					?>	
					</ul>
					<h3>Personal information:
					<?php

						if($user_id!=$p_user_id){
							
					?>
						<a href="../edit_personal.php?add=<?php echo $user_id;?>">	
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
					<ul>
						<li>Father's Name: <span><?php echo $father;?></span></li>
						<li>Mother's Name: <span><?php echo $mother;?></span></li>
						<li>Date of Birth: <span><?php echo $dob;?></span></li>
						<li>Gender: 		<span><?php echo $gender;?></span></li>
						<li>Marital Status: <span><?php echo $relationship;?></span></li>
						<li>Nationality: <span><?php echo $nationality;?></span></li>
						<li>Religion: <span><?php echo $religion;?></span></li>
						<li>Permanent Address: <span><?php echo $per_addr;?></span></li>
						<li>Current Location: <span><?php echo $cur_addr;?></span></li>
					</ul>
					
					<h3>Social information:
						<a href="../edit_social.php?add=<?php echo $user_id;?>">
							<span class="add">
								<i class="fa fa-plus-circle" aria-hidden="true" width="5"></i>
							</span>	
						</a>						
					</h3>
					<ul>
					<!--USe while -->
					<?php
						$query="SELECT * FROM social where user_id=$user_id";
						$run= mysqli_query($connection,$query);
						while($row=mysqli_fetch_array($run)){
							$So_id=$row['so_id'];
							$social_link=$row['social_link'];
							$social_name=$row['social_name'];
					?>
						<li class="social">
							<a href="<?php echo $social_link;?>">
								<span><?php echo $social_name;?></span>
							</a>
							<span>
								<a href="../edit_social.php?edit=<?php echo $So_id;?>">	
									<span class="add">
										<i class="text-dark fas fa-user-edit" aria-hidden="true"></i>
									</span>					
								</a>							
							</span>
						</li>
					<?php
						}
					?>
					</ul>
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
		</div>
	</div>
	<div class="container px-0">
		<div class="footer text-dark"style="border:2px solid black;border-bottom-width: 2px;border-top-width: 2px;border-left-width: 0px;border-right-width: 0px;">
			<div class="bg-white" align="center">
				<div class="row px-0 py-2 ">

					<div class="col-sm-12" align="center">
						<p>Sincerely Yours</p>
						<p class="sign_out" style="text-decoration:underline;">
							<a href=""target="blank">
								<b><?php echo $first_name;?></b>
							</a>
						</p>
						<hr />
					</div>

				</div>
				<div class="row text-dark font-weight-bold" >
					<div class="col-sm-12">
						<h2 class="sign_out">
							<a href="../sign_out.php">
								<i class="fas fa-globe" alt="Sign_Out"></i>
							</a>
						</h2>
						<p><i class="far fa-copyright">&nbsp;all Credit Goes to Bootstrap 4</i></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>	
</body>
</html>
<?php }?>