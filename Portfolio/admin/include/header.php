  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
      <a class="app-header__logo" href="index.php">Admin</a>
		<?= '';//$_SESSION['name']; ?>
      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="../index.php" aria-label="Visit Main Website" target="__blank"><i class="fa fa-globe fa-lg"></i></a>


        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li>
              <a class="dropdown-item" href="edit_user.php?id=<?= $_SESSION['user_id']; ?>">
                <i class="fa fa-cog fa-lg"></i> Settings</a>
            </li>
            
            <li>
              <a class="dropdown-item" href="profile.php?id=<?= $_SESSION['user_id']; ?>"><i class="fa fa-user fa-lg"></i> Profile</a>
            </li>
            
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>