<?php 
require_once("include/header.php");
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>		
			<div class="col-md-12 col-sm-12" align="center">
				<div class="form-group main border p-3 m-2 " >					
					<form action="" method="POST">
						<label for="">Your Id</label>
						<input type="id" name="user" class="form-control" placeholder="type your university id" required />
						
						<label for="">Password</label>
						<input type="password" name="password" pattern="\d{4,}" placeholder="please Provide Your password in number at least 4 ex.1234" class="form-control text-danger" placeholder="please Provide Your password in number"required />
						
						<input class="btn btn-info" type="submit" name="user_login" value="Submit"/>
					</form>
					<p class="text-danger pt-2">not a member ?
						<span>
							<a href="sign_up.php" class="text-info">Click here</a>
						</span>
					</p>					
				</div>
			</div>
		</div>
	</div>
</body>
<?php
if(isset($_POST['user_login'])){
	
 	$user_name=mysqli_real_escape_string($connection,$_POST['user']);
	
	$password=mysqli_real_escape_string($connection,$_POST['password']);

		$login_query = "SELECT * FROM user
		WHERE user_id='$user_name' AND password='$password'
		OR	  email='$user_name'    AND password='$password'
		OR    mobile='$user_name'   AND password='$password'";
	
	$run=mysqli_query($connection,$login_query);
	
	$row=mysqli_fetch_array($run);
	if(mysqli_num_rows($run)>0){
		
			$_SESSION['user_id']=$row['user_id'];
			$_SESSION['first_name']=$row['first_name'];		
			$_SESSION['email']=$row['email'];
			
			echo"<script>window.open('index.php','_self')</script>";
		}
		else{
			echo"<script>alert('Username or Password is Incorrect')</script>";
		}		
	}
	else{
		echo"<script>alert('WELCOME')</script>";
		
	}

?>






