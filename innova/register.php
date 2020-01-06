<?php require_once('include/login_head.php');?>
<?php  session_start();?>

<body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>

    <section class="login-content">
      <div class="logo" style="margin-bottom: 25px;">
        <h1>WELCOME</h1>
      </div>
      <div class="login-box" style="min-height: 570px;">

        <form class="login-form" action="register_post.php" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Registration</h3>

          <div class="form-group">
            <label class="control-label">username</label>
            <input type="text" class="form-control" name="username" id="username" type="text" placeholder="Username is not changeable later"  autofocus>
              <?php
                if(isset($_SESSION['username_msg'])) {
                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['username_msg']."</p>";
                   unset($_SESSION['username_msg']);
                   // session_unset();
                }
              ?>
          </div>

          <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" type="email" placeholder="type your Email address" name="email" autofocus>
			<?php
                if(isset($_SESSION['email_msg'])) {
                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['email_msg']."</p>";
                   unset($_SESSION['email_msg']);
                   // session_unset();
                }
              ?>
          </div>

          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control" name="password" type="password" id="password" placeholder="Use Strong [ex. Aa12345$] Password" onkeyup='check();'>
			<?php
                if(isset($_SESSION['pass_msg'])) {
                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['pass_msg']."</p>";
                   unset($_SESSION['pass_msg']);
                   // session_unset();
				   // echo "<script>window.alert('We Do not Allow Loosers')</script>";
                }
              ?>
          </div>

          <div class="form-group">
            <label class="control-label">Confirm Password</label>
            <b><span id='message'></b></span>
            <input class="form-control" name="cpassword" type="password" id="confirm_password" placeholder="Confirm Password" onkeyup='check();'>
			       <?php
                if(isset($_SESSION['conf_pass_msg'])) {
                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['conf_pass_msg']."</p>";
                   unset($_SESSION['conf_pass_msg']);
                   // session_unset();
                }
              ?>
          </div>

          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="register"><i class="fa fa-sign-in fa-lg fa-fw"></i>Register</button>
          </div>

          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mt-2">Already have an account ?<a href="login.php"> Sign In</a></p>
            </div>
          </div>          

        </form>


      </div>
    </section>
 
<?php require_once('include/login_footer.php');?>
<script>
      var check = function() {
        if(document.getElementById('password').value =="" or
        document.getElementById('confirm_password').value=="")
        {
          document.getElementById('message').style.color = '#1ABB9C';
          document.getElementById('message').innerHTML = 'Please fill the Empty Feild </br>';
          
        }
        else{
          if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value)
            {
            document.getElementById('message').style.color = '#1ABB9C';
            document.getElementById('message').innerHTML = 'Matched </br>';
            } 
          else{
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Not Matching</br>';
            }
        }

      }  
</script> 