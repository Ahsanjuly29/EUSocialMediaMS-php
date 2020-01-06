<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(!isset($_SESSION['user_id'])){
	
	header("location: sign_in.php");
}
else{
	include("include/header.php");
?>
<?php
	if(isset($_GET['add'])){
		$user_id= $_GET['add'];
		// $user_id= $_SESSION['user_id'];
?>			
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="" method="POST" enctype="multipart/form-data">
						
						<input type="text" name="r_id" value="<?php echo $user_id;?>" style="display: none;"   /> 
					
						<label for="">tech_skill</label>
						<input type="text" name="tech_skill" value="" class="form-control" placeholder="HTML, CSS and JavaScript, ( Bootstrap 4, AJAX and JQuery )"    />
						
						<label for="">soft_skill</label>
						<input type="text" name="soft_skill" value="" class="form-control" placeholder="Comprehensive Skills, Personal Effectiveness, Body Language, Team player, Strategic Planning, Presentation Skills, Public Speaking, Interview Skills, Email Etiquette, Grooming"    />
						
						<label for="">comp_skill</label>
						<input type="text" name="comp_skill" value="" class="form-control"placeholder="Operating System( Windows-Xp, windows 7, windows 8.1 , windows 10, Linux mint & Redhat Linux)"    />
						
						<label for="">language</label>
						<input type="text" name="language" value="" class="form-control"placeholder="English bangla"    />
						
						<label for="">strentgh</label>
						<input type="text" name="strentgh" value="" class="form-control"placeholder="Self-motivated Quick learner"    />

						<label for="">Interest</label>
						<input type="text" name="Interest" value="" class="form-control"placeholder="Reading books, Newspaper, Magazines Playing Football, Badminton Watching movies, programming, idea’s Sharing."    />

						<input class="btn" type="submit" name="Submit" value="Submit"/>
					</form>
				</div>
			</div>
<?php   }?>			
<?php

	if(isset($_POST['Submit'])){
		
		// $s_id=$_POST['s_id'];
		
		$tech_skill=$_POST['tech_skill'];
		$soft_skill=$_POST['soft_skill'];
		$comp_skill=$_POST['comp_skill'];
		$language=$_POST['language'];
		$strentgh=$_POST['strentgh'];
		$Interest=$_POST['Interest'];

		 
		$query="INSERT INTO skill(user_id,tech_skill,soft_skill,comp_skill,language,strentgh,Interest )
						VALUES('$user_id','$tech_skill','$soft_skill','$comp_skill','$language','$strentgh','$Interest')";

		if(mysqli_query($connection,$query)){
			
			echo "<script>window.open('index.php','_self')</script>";
		}
		
	}		
?>			
<?php

	if(isset($_GET['edit'])){
		$edit_id= $_GET['edit'];
		$user_id= $_SESSION['user_id'];
	
	$query="SELECT * FROM skill WHERE s_id=$edit_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);{
			
		$tech_skill=$row['tech_skill'];
		$soft_skill=$row['soft_skill'];
		$comp_skill=$row['comp_skill'];
		$language=$row['language'];
		$strentgh=$row['strentgh'];
		$Interest=$row['Interest'];
	}
?>			
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="" method="POST" enctype="multipart/form-data">
						
						<input type="text" name="r_id" value="<?php echo $s_id;?>" style="display: none;"   /> 
					
						<label for="">tech_skill</label>
						<input type="text" name="tech_skill" value="<?php echo $tech_skill;?>" class="form-control"    />
						
						<label for="">soft_skill</label>
						<input type="text" name="soft_skill" value="<?php echo $soft_skill;?>" class="form-control"    />
						
						<label for="">comp_skill</label>
						<input type="text" name="comp_skill" value="<?php echo $comp_skill;?>" class="form-control"    />
						
						<label for="">language</label>
						<input type="text" name="language" value="<?php echo $language;?>" class="form-control"    />
						
						<label for="">strentgh</label>
						<input type="text" name="strentgh" value="<?php echo $strentgh;?>" class="form-control"    />

						<label for="">Interest</label>
						<input type="text" name="Interest" value="<?php echo $Interest;?>" class="form-control"    />

						<input class="btn" type="submit" name="update" value="update"/>
					</form>
				</div>
			</div>
<?php   } ?>
		</div>
	</div>
</body>
<?php

	if(isset($_POST['update'])){
		
		$tech_skill=$_POST['tech_skill'];
		$soft_skill=$_POST['soft_skill'];
		$comp_skill=$_POST['comp_skill'];
		$language=$_POST['language'];
		$strentgh=$_POST['strentgh'];
		$Interest=$_POST['Interest'];
		
		
	
		$query1="UPDATE skill SET 
		s_id='$edit_id',
		user_id='$user_id',
		tech_skill='$tech_skill',
		soft_skill='$soft_skill',
		comp_skill='$comp_skill',
		language='$language',
		strentgh='$strentgh',
		Interest='$Interest'
		WHERE s_id='$edit_id'";
		
		$run=mysqli_query($connection,$query1);
		if($run){
			echo "<script>alert('Your Profile is Updated...!')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
	}	

?>
</html>
<?php
	}?>





