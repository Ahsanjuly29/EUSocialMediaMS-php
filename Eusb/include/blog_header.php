<?php require_once('connection.php');?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page;?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Roboto:300,400,500,700" rel="stylesheet">
	
	
	<link rel="stylesheet" href="css/viewbox.css">
	
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
	<header>
		<div class="navigation">
			<div class="">						
				<div class="menu">
					<div class="logo">
						<a href="index.php"><h1><span>EU</span>Social Book</h1></a>
					</div>
					<div class="nav-icon hidden-desktop">
						<i class="material-icons">menu</i>
					</div>
					<ul class="nav-list" role="tablist">
						<span class="nav-cross-icon hidden-desktop">
							<i class="material-icons">close</i>
						</span>
						<li role="presentation">
							<a href="index.php" class="<?php if($page=='home'){echo 'active';}else{echo 'non-active';} ?>">Home</a>
						</li>
						<li role="presentation">
							<a href="forum.php?forum" class="<?php if($page=='Forum'){echo 'active';}else{echo 'non-active';} ?>">Forum</a>
						</li>								
						<li role="presentation">
							<a href="my_profile.php?user=<?php echo $_SESSION['user1'];?>&&view_user=<?php echo $_SESSION['user_id'];?>" class="<?php if($page=='Profile'){echo 'active';}else{echo 'non-active';} ?>">
								<?php echo $_SESSION['first_name'];?>'s Profile
							</a>
						</li>
						
						<li role="presentation">
							<a href="about.php" class="<?php if($page=='About us'){echo 'active';}else{echo 'non-active';} ?>">About Us</a>
						</li>
						<li role="presentation">
							<a href="mail.php" class="<?php if($page=='contact us'){echo 'active';}else{echo 'non-active';} ?>">Contact Us</a>
						</li>
						<li role="presentation">
							<a href="sign_out.php" class="<?php if($page=='Logout'){echo 'active';}else{echo 'non-active';} ?>">Sign out</a>
						</li>
						<li role="presentation" class="language-select"><a href=""><?php require_once('translate.php');?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>