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
	
?>			
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="" method="POST" enctype="multipart/form-data">
						
						<input type="text" name="user_id" value="<?php echo $user_id;?>" style="display: none;" required /> 
					
						<label for="">designation</label>
						<input type="text" name="designation" value="" class="form-control" placeholder="ex.Web Designer,Student" required  />
						
						<label for="">Objective</label>
						<input type="text" name="Objective" value="--" class="form-control"placeholder="about Yourself" required  />
						
						<label for="">Other Number</label>
						<input type="text" name="mobile" value="--" class="form-control"placeholder="mobile number"   />
						
						<label for="">father</label>
						<input type="text" name="father" value="--" class="form-control" required  />
						
						<label for="">mother</label>
						<input type="text" name="mother" value="--" class="form-control" required  />
						
						<label for="">dob</label>
						<input type="date" name="dob" value="--" class="form-control" required  />
						
						<label for="">Gender</label>
						<input type="text" name="gender" value="--" class="form-control"placeholder="male/female/other"/>
						
						<label for="">relationship</label>
						<input type="text" name="relationship" value="--" class="form-control"placeholder="Single/married" required  />
						
						<label for="">nationality</label>
						<input type="text" name="nationality" value="--" class="form-control" required  />
						
						<label for="">religion</label>
						<input type="text" name="religion" value="--" class="form-control" />
						
						<label for="">permanent addr</label>
						<input type="text" name="per_addr" value="--" class="form-control"placeholder="type your university id"  required  />
						
						<label for="">current addr</label>
						<input type="text" name="cur_addr" value="--" class="form-control" required  />
						
						<input class="btn" type="submit" name="Submit" value="Submit"/>
					</form>
				</div>
			</div>
<?php   }?>			
<?php

	if(isset($_POST['Submit'])){
		
		// $user_id=$_POST['user_id'];
		$p_user_id=$_POST['user_id'];
		$designation=$_POST['designation'];
		$Objective=$_POST['Objective'];
		$p_mobile=$_POST['mobile'];
		$father=$_POST['father'];
		$mother=$_POST['mother'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$relationship=$_POST['relationship'];
		$nationality=$_POST['nationality'];
		$religion=$_POST['religion'];
		$per_addr=$_POST['per_addr'];
		$cur_addr=$_POST['cur_addr'];
		 
		$query="INSERT INTO personal(user_id,designation,Objective,mobile,father,mother,dob,gender,relationship,nationality,religion,per_addr,cur_addr)
						VALUES('$p_user_id','$designation','$Objective','$p_mobile','$father','$mother','$dob','$gender','$relationship','$nationality','$religion','$per_addr','$cur_addr')";

		if(mysqli_query($connection,$query)){
			echo "<script>alert('Your Profile is Updated...!')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
		
	}		
?>			
<?php

	if(isset($_GET['edit'])){
		$edit_id= $_GET['edit'];

	$query="SELECT * FROM personal WHERE user_id=$edit_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);{
			
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
	}
?>			
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="text" name="user_id" value="<?php echo $edit_id;?>" style="display:none;" required /> 
					
						
						<label for="">designation</label>
						<input type="text" name="designation" value="<?php echo $designation;?>" class="form-control" required  />
						
						<label for="">Objective</label>
						<input type="text" name="Objective" value="<?php echo $Objective;?>" class="form-control" required  />
						
						<label for="">Other Number</label>
						<input type="text" name="mobile" value="<?php echo $p_mobile;?>" class="form-control"   />
						
						<label for="">father</label>
						<input type="text" name="father" value="<?php echo $father;?>" class="form-control" required  />
						
						<label for="">mother</label>
						<input type="text" name="mother" value="<?php echo $mother;?>" class="form-control" required  />
						
						<label for="">dob</label>
						<input type="date" name="dob" value="<?php echo $dob;?>" class="form-control" required  />
						
						<label for="">Gender</label>
						<input type="text" name="gender" value="<?php echo $gender;?>" class="form-control"   />
						
						<label for="">relationship</label>
						<input type="text" name="relationship" value="<?php echo $relationship;?>" class="form-control" required  />
						
						<label for="">nationality</label>
						<input type="text" name="nationality" value="<?php echo $nationality;?>" class="form-control" required  />
						
						<label for="">religion</label>
						<input type="text" name="religion" value="<?php echo $religion;?>" class="form-control"  />
						
						<label for="">permanent address</label>
						<input type="text" name="per_addr" value="<?php echo $per_addr;?>" class="form-control" required  />
						
						<label for="">current address</label>
						<input type="text" name="cur_addr" value="<?php echo $cur_addr;?>" class="form-control" required  />
						
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
		
		$edit_id=$_POST['user_id'];
		$designation=$_POST['designation'];
		$Objective=$_POST['Objective'];
		$p_mobile=$_POST['mobile'];
		$father=$_POST['father'];
		$mother=$_POST['mother'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$relationship=$_POST['relationship'];
		$nationality=$_POST['nationality'];
		$religion=$_POST['religion'];
		$per_addr=$_POST['per_addr'];
		$cur_addr=$_POST['cur_addr'];
		// $user_id=$_POST['user_id'];
		// $p_user_id=$_POST['user_id'];		
		
	echo	
		$query1="UPDATE personal SET 
		user_id='$edit_id',
		designation='$designation',
		Objective='$Objective',
		mobile='$p_mobile',
		father='$father',
		mother='$mother',
		dob='$dob',
		gender='$gender',
		relationship='$relationship',
		nationality='$nationality',
		religion='$religion',
		per_addr='$per_addr',
		cur_addr='$cur_addr'
		WHERE user_id='$edit_id'";
		
		$run=mysqli_query($connection,$query1);
		if($run){
			echo "<script>alert('Your Profile is Updated...!')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
	}	

?>
</html>
<?php
	}
?>






