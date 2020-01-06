<?php require_once('style_head.php');?>	
				<div class="main-body">	
					<h3><i class="fab fa-skyatlas"></i> Technical skills
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
						<div class="col-sm-1 px-0 py-0">
							<div>
								 
							</div>
						</div>
						<div class="col-sm-10" style="padding: 0px 10px 0px 0px;">
							<div>
								<p><?php echo $tech_skill;?></p>
							</div>
						</div>
						<div class="col-sm-1">
							<div>
								 
							</div>
						</div>
					</div>

					<h3><i class="fab fa-skyatlas"></i> Soft Skills
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
						<div class="col-sm-1 px-0 py-0">
							<div>
								 
							</div>
						</div>
						<div class="col-sm-10" style="padding: 0px 10px 0px 0px;">
							<div>
								<p><?php echo $soft_skill;?></p>
							</div>
						</div>
						<div class="col-sm-1">
							<div>
								 
							</div>
						</div>
					</div>				
					<h3>
						<i class="fas fa-desktop"></i> Computer Skills
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
							if($comp_skill!=""){
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
						}}
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
							if($language!=""){
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
						}}
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
							if($strentgh!=""){
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
						}}
					?>	
					</ul>
				</div>
			</div>
			
			
	
<?php require_once('style_right_side_bar.php');?>	
<?php require_once('style_footer.php');?>	