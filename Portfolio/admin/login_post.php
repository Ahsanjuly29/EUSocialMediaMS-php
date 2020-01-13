<?php require_once('include/head.php');?>

<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['login']) ) {
          $email = $_POST['email'];
          $password = $_POST['password'];

          // $password = password_hash($password, PASSWORD_BCRYPT);

          $chk_email = "SELECT * FROM users WHERE email='$email'";

          $query = mysqli_query($db, $chk_email);
            $assoc = mysqli_fetch_assoc($query);
            $password_verify = password_verify($password, $assoc['password']);

     	 	if ($password_verify) {
                // setcookie("AEportfolio","5",time()+1000000);          
                $_SESSION['user_id']=$assoc['user_id'];
                $_SESSION['username']=$assoc['username'];
                $_SESSION['name']=$assoc['name'];
                $_SESSION['email']=$assoc['email'];
                $_SESSION['mobile']=$assoc['mobile'];
                $_SESSION['password']=$assoc['password'];
                $_SESSION['image']=$assoc['image'];
                $_SESSION['role']=$assoc['role'];
                
         		if ($assoc['role'] == 1) {
      				// header("location:index.php");
                    echo "<script>window.open('index.php','_self');</script>";
            	}
              	elseif($assoc['role'] == 2){
          			// header("location:index.php");
                    echo "<script>window.open('index.php','_self');</script>";
            	}
              	else{
                	$_SESSION['not_assigned'] = "You Are not an Assigned Person";
                    echo "<script>window.open('login.php','_self');</script>";
              	}
      		}
            else{
                $_SESSION['error_msg'] = "Email Or password is Invalid";
                // header("location:login.php");
                echo "<script>window.open('login.php','_self');</script>";
            }      		
		  }
	}
?>
<?php require_once('include/footer.php');?>