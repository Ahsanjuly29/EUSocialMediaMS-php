<?php require_once('include/login_head.php');?>

<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['login']) ) {
          $email = $_POST['email'];
          $password = $_POST['password'];

          // $password = password_hash($password, PASSWORD_BCRYPT);

          $chk_email = "SELECT * FROM users WHERE email = '$email'";

          $query = mysqli_query($db, $chk_email);
            $assoc = mysqli_fetch_assoc($query);
            $password_verify = password_verify($password, $assoc['password']);

     	 	if ($password_verify) {
            setcookie("TestCookie","5",time()+1000000);          
    				$_SESSION['username'] = $assoc['username'];
    				$_SESSION['name'] = $assoc['name'];
    				$_SESSION['email'] = $assoc['email'];
    				$_SESSION['mobile'] = $assoc['mobile'];
    				$_SESSION['password'] = $assoc['password'];
    				$_SESSION['image'] = $assoc['image'];
    				$_SESSION['role'] = $assoc['role'];
            
         		if ($assoc['role'] == 1) {
      					header("location:index.php");
                	}
          	elseif($assoc['role'] == 2){
          			header("location:admin/index.php");
            	}
          	else{
            		$_SESSION['not_assigned'] = "You Are not an Assigned Person";
          	   	header("location:login.php");
          	}
      		}
    			else{
    			  $_SESSION['error_msg'] = "Email Or password is Invalid";
    			  header("location:login.php");
    			}      		
		  }
	}
?>
<?php require_once('include/login_footer.php');?>