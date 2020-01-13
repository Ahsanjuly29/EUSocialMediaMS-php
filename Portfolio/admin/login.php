<?php require_once('include/head.php');?>
<?php
  session_start();
?>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo" style="margin-bottom: 25px;">
        <h1>Admin Panel</h1>
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
        </form>
      </div>
    </section>

<?php require_once('include/footer.php');?>