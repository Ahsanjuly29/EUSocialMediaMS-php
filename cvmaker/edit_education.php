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
						
						<input type="text" name="e_id" value="<?php echo $user_id;?>" style="display: none;" required /> 
					
						<label for="">Title</label>
						<input type="text" name="Title" value="" class="form-control" placeholder="BSC" required  />
						
						<label for="">Subject</label>
						<input type="text" name="Subject" value="" class="form-control" placeholder="CSE" required  />
						
						<label for="">Institution</label>
						<input type="text" name="Institution" value="" class="form-control" placeholder="Eastern University" required  />
						
						<label for="">start_Year</label>
						<input type="text" name="start_Year" value="" class="form-control" placeholder="2014" required  />
						
						<label for="">pass_year</label>
						<input type="text" name="pass_year" value="" class="form-control" placeholder="2018" required  />

						<input class="btn" type="submit" name="Submit" value="Submit"/>
					</form>
				</div>
			</div>
<?php   }?>			
<?php

	if(isset($_POST['Submit'])){
		
		// $e_id=$_POST['e_id'];
		
		$Title=$_POST['Title'];
		$Subject=$_POST['Subject'];
		$Institution=$_POST['Institution'];
		$start_Year=$_POST['start_Year'];
		$pass_year=$_POST['pass_year'];

		 
		$query="INSERT INTO education(user_id,Title,Subject,Institution,start_Year,pass_year)
						VALUES('$user_id','$Title','$Subject','$Institution','$start_Year','$pass_year')";

		if(mysqli_query($connection,$query)){
			
			echo "<script>window.open('index.php','_self')</script>";
		}
		
	}		
?>			
<?php

	if(isset($_GET['edit'])){
		$edit_id= $_GET['edit'];
		$user_id= $_SESSION['user_id'];
		
	$query="SELECT * FROM education WHERE e_id=$edit_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);{
			
			$Title=$row['Title'];
			$Subject=$row['Subject'];
			$Institution=$row['Institution'];
			$start_Year=$row['start_Year'];
			$pass_year=$row['pass_year'];

	}
?>			
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="" method="POST" enctype="multipart/form-data">
						
						<input type="text" name="e_id" value="<?php echo $edit_id;?>" style="display: none;" required /> 
					
						<label for="">Title</label>
						<input type="text" name="Title" value="<?php echo $Title;?>" class="form-control"placeholder="BSC" required  />
						
						<label for="">Subject</label>
						<input type="text" name="Subject" value="<?php echo $Subject;?>" class="form-control" placeholder="CSE" required  />
						
						<label for="">Institution</label>
						<input type="text" name="Institution" value="<?php echo $Institution;?>" class="form-control" placeholder="Eastern University" required  />
						
						<label for="">start_Year</label>
						<input type="text" name="start_Year" value="<?php echo $start_Year;?>" class="form-control" placeholder="2014" required  />
						
						<label for="">pass_year</label>
						<input type="text" name="pass_year" value="<?php echo $pass_year;?>" class="form-control" placeholder="2018" required  />

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
		
		$edit_id=$_POST['e_id'];
		$Title=$_POST['Title'];
		$Subject=$_POST['Subject'];
		$Institution=$_POST['Institution'];
		$start_Year=$_POST['start_Year'];
		$pass_year=$_POST['pass_year'];
		
		
	
		$query1="UPDATE education SET 
		e_id='$edit_id',
		user_id='$user_id',
		Title='$Title',
		Subject='$Subject',
		Institution='$Institution',
		start_Year='$start_Year',
		pass_year='$pass_year'
		WHERE e_id='$edit_id'";
		
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





