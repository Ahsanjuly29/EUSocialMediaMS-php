<?php require_once('include/head.php');?>

<?php
  session_start();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['change_password']) ) {
      $id = $_GET['id'];
      $password = $_POST['opass'];
      $new_pass = $_POST['npass'];


      $chk_email = "SELECT * FROM users WHERE user_id = '$id'";
      $query = mysqli_query($db, $chk_email);
      $assoc = mysqli_fetch_assoc($query);
      $password_verify = password_verify($password, $assoc['password']);

      if ($password_verify) {
        $new_password=password_hash($new_pass, PASSWORD_BCRYPT);
        $update = "UPDATE users SET password='$new_password' WHERE user_id='$id'";
        if (mysqli_query($db, $update)) {
          // header("location:profile.php?id=$id");
          echo "<script>window.open('profile.php?id=$id','_self');</script>";
        }
        else{
          $_SESSION['error_msg'] = "Failed To Change Password";
          // header("location:edit_user.php?id=$id");
          echo "<script>window.open('edit_user.php?id=$id','_self');</script>";
        }        
      }
      else{
          $_SESSION['error_msg'] = "password Doesn't Matched";
          // header("location:edit_user.php?id=$id");
          echo "<script>window.open('edit_user.php?id=$id','_self');</script>";

      }
    }
  }
?>
<?php require_once('include/footer.php');?>