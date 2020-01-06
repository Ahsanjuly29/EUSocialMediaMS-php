<?php 
$link='Update';
include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['admin_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php include('include/header.php')?>

<?php
		if(isset($_GET['subject'])){
?>
			<div class="admin-content-area">
				<div class="admin-content">
					<div class="content-heading">
						<h3>Add Subject</h3>
					</div>
					<div class="content">
						<div class="add-student-area">
							<div class="sign-in-area">
								<form action="">
								
									<div class="sign-input">
										<?php
											$query="select * from catagory Group By department";
												$run= mysqli_query($connection,$query);
										?>
										<label for="">Department</label>
										<select name="department" id="department">
										<?php
											while($catagory=mysqli_fetch_array($run)){
												$department= $catagory['department'];
											?>
											<option value="<?php echo $department;?>"><?php echo $department;?></option>
											<?php } ?>
										</select>
									</div>
									
									<div class="sign-input">
										<label for="">Write Course Name</label>
										<input type="text" placeholder="FULL NAME" required />
									</div>
									<div class="sign-input">
										<label for="">Write Course CODE</label>
										<input type="text" placeholder="(CODE)"/>
									</div>
									<div class="input-button">
										<input type="submit" value="Done" />
									</div>
								</form>

								<form action="add_Subject.php" method="POST">
									<div class="input-button" style="float:left;">
										<a href="add_Subject.php?new_dept=new_dept"><input type="submit" name="new_dept" value="Add new Department" />
										</a>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
<?php
		if(isset($_POST['new_dept'])){
			$new = $_POST['new_dept'];
?>		
			<!-- ADD New Department-->
			<div class="admin-content-area">
				<div class="admin-content">
					<div class="content-heading">
						<h3>ADD New Department</h3>
					</div>
					<div class="content">
						<div class="add-student-area">
							<div class="sign-in-area">
								<form action="add_subject.php" method="POST">
									<div class="sign-input">
										<label for="">Write Department Name</label>
										<input type="text" name="dept" placeholder="(Department)"   />
									</div>
									<div class="input-button">
										<input type="submit" name="submit_dept" value="Done" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>	
<?php
		if(isset($_POST['submit_dept'])){
			date_default_timezone_set("Asia/Dhaka");
			$dept=$_POST['dept'];
			if($dept==''){
				echo"<script>alert('This Feild can not be empty')</script>";
				exit();
			}
			else{
				$query="INSERT INTO catagory(department) VALUES('$dept')";
				$run=mysqli_query($connection,$query);
				// require_once('add_Subject.php?subject=subject');
echo"<script>alert('A new Department Successfully Added','_self')</script>";
				echo"<script>window.open('add_Subject.php?subject=subject','_self')</script>";
				
				
			}
		}

?>
		
<?php include('include/footer.php')?>
<?php }?>