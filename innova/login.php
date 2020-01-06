<?php require_once('include/login_head.php');?>
<?php
  session_start();
  // if (!empty($_SESSION['email'])) {
  //     header('location:index.php');
  //   }
?>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo" style="margin-bottom: 25px;">
        <h1>WELCOME</h1>
      </div>
      <div class="login-box" style="min-height: 370px;">
        <form class="login-form" action="login_post.php" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <?php
                // session_start();
                if(isset($_SESSION['not_assigned'])) {
                  
                   echo "<h6 class='pt-1 m-1 text-danger text-center'>".$_SESSION['not_assigned']."</h6>";
                   unset($_SESSION['not_assigned']);
                   session_unset();
                }
            ?>             
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email" name="email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="password">
            <?php
               
                if(isset($_SESSION['error_msg'])) {
                   echo "<h6 class='pt-1 m-1 text-danger text-center'>".$_SESSION['error_msg']."</h6>";
                   unset($_SESSION['error_msg']);
                   session_unset();
                }
            ?>            
          </div>

          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="login"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>

          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
 				<p class="semibold-text my-2">don't have account ? <a href="register.php" target="">Register</a></p>
              </div>
				<p class="semibold-text my-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
        </form>

        <form class="forget-form" action="index.html" method="GET">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email" name="email" >
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>

      </div>
    </section>

<?php require_once('include/login_footer.php');?>