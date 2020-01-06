<?php
	require_once('conn/connection.php');
	session_start();
	if(!isset($_SESSION['user_id'])){
		
		header("location: sign_in.php");
	}
	else{
		 $user_id=$_SESSION['user_id'];
?>	
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>My Ticket</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<!--fonts-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Raleway:400,500,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
		
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
	<header class="headaer-bg">
		<div class="container">
			<div class="header-area">
				<div class="row">
					<div class="col-sm-2">
						<figure>
							<a href="my_ticket.php" ><img src="image/logo.png" alt="logo"></a>
						</figure>
					</div>
					<div class="col-sm-10">
						<nav>
							<ul>
								<li><a href="book_ticket.php">Ticket booking</a></li>
								<li><a href="my_ticket.php?search">My Ticket</a></li>
								<li><a href="help.php">help</a></li>
								<li><a href="admins.php">Admins</a></li>
								<li><a href="Log_out.php">Log Out</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	
	
	<section class="buyer-area">
		<div class="container">
			<div class="buyer-list">
				<form class="form" action="" method="post">
					<input type="text" name="search" required="" placeholder="Phone Number" title="use valid Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
					<button>Search</button>
				</form>
			</div>
<?php
				
					// if($_GET['search']){
					// $item=$_GET['search'];	
?>				
			<table class="table" style="background:white;margin-top:10px;">

		<?php

						$show = mysqli_query($conn,"SELECT * FROM railway where user_id='$user_id'");
						$res=mysqli_num_rows($show);
?>
				<thead>
					<tr>
						<th>Ticket Number</th>
						<th>Depart From</th>
						<th>Destination To</th>
						<th>Train Type</th>
						<th>Booking Date</th>
						<th>Departure Time</th>
						<th>Bogie No</th>
						<th>Ticket Bought</th>
						<th>Cancel Ticket</th>
					</tr>
				</thead>
				<tbody>
<?php			
						/* Condition to Show the Inputs of Database */
						while($row = mysqli_fetch_array($show))
						{
			?>
						<tr>
							<td><?php echo $row['ticket_id'];?></td>
							<td><?php echo $row['frm'];?></td>
							<td><?php echo $row['too'];?></td>
							<td><?php echo $row['type'];?></td>
							<td><?php echo $row['dates'];?></td>
							<td><?php echo $row['time'];?></td>
							<td><?php echo $row['carriage'];?></td>							
							<td><?php echo $row['ticket_no'];?></td>

						</tr>
<?php					}
					// }		
?>		

				</tbody>
			</table>
		</div>
	</section>	

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/cascade-slider.js"></script>
        <script src="js/main.js"></script>
		
		
		 <script>
			$('#cascade-slider').cascadeSlider({
			  
			});
		  </script>
    </body>
</html>
	<?php } ?>