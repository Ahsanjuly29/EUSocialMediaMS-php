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
        <title>Booking Now</title>
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
								<li><a href="my_ticket.php">My Ticket</a></li>
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
<?php
if(isset($_POST['submit'])) {
	
	// $mobile=$_POST['mobile'];
	$frm =  $_POST['frm'];
	$too =  $_POST['too'];
	$type = $_POST['type'];
	$time = $_POST['time'];
	$ticket_no=$_POST['ticket_no'];
	$dates=$_POST['dates'];	
	$carriage=$_POST['carriage'];
	
	echo	$insert= "INSERT INTO railway(user_id,frm,too,type,time,ticket_no,dates,carriage)
					values('$user_id','$frm','$too','$type','$time','$ticket_no','$dates','$carriage')";
	
		$result=mysqli_query($conn,$insert);
			if(!$result)
			{
				die("Query failed".mysqli_error(""));
			}
			else{
					// require('my_ticket.php');
					echo "<script>window.open('my_ticket.php','_self')</script>";
				}
}
?>	
	<section class="booking-content">
		<div class="container">
			<div class="booking-area">
				<div class="booking-form">
					<div class="cascade-slider_container" id="cascade-slider">
				
						<div class="cascade-slider_slides">
							<div class="cascade-slider_item">
								<h2>General Tickets</h2>
								<form action="" method="POST" class="form">
									
									<label for="mobile">Phone Number</label>
									<input type="text" name="mobile" required="" placeholder="Phone Number" title="use valid Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
									<!-- pattern="[0-9]{11}" -->
									<label for="frm">Depart From</label>
										<select name="frm" title="DEPART">
											<option value="Dhaka">Dhaka</option>
											<option value="Rajsahi">Rajsahi</option>
											<option value="Rangpur">Rangpur</option>
											<option value="Khulna">Khulna</option>
											<option value="Bogura">Bogura</option>
											<option value="Dinajpur">Dinajpur</option>
											<option value="Chittagong">Chittagong</option>
											<option value="Barishal">Barishal</option>
										</select>
									<label for="too">Destination To</label>
										<select name="too" title="DESTINATION">
											<option value="Dhaka">Dhaka</option>
											<option value="Rajsahi">Rajsahi</option>
											<option value="Rangpur">Rangpur</option>
											<option value="Khulna">Khulna</option>
											<option value="Bogura">Bogura</option>
											<option value="Dinajpur">Dinajpur</option>
											<option value="Chittagong">Chittagong</option>
											<option value="Barishal">Barishal</option>
										</select>
										
									<label for="type">Type Of the train</label>
									<select name="type" title="">
											<option value="General">General Train</option>
									</select>
									<label for="">Time</label>
									<select name="time" title="">
											<option value="10:00">10:00 am</option>
											<option value="13:00">01:00 pm</option>
											<option value="16:00">04:00 pm</option>
											<option value="20:00">20:00 pm</option>
											<option value="12:01">12:01 am</option>
									</select>
									
									<label for="ticket_no"> How many Ticket ?</label>
									<select name="ticket_no" title="">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
									</select>
									
									<label for="carriage">Carriage</label>
										<select name="carriage" title="">
											<option value="a">a</option>
											<option value="b">b</option>
											<option value="c">c</option>
											<option value="d">d</option>
											<option value="e">e</option>
											<option value="f">f</option>
											<option value="g">g</option>
										</select>
										
									<label for="date">Date</label>
									<input type="date" name="dates" required="" placeholder="2017-08-11" pattern="[0-9]+-[0-9]+-[0-9]{2,2}$" title="Give valid Date"/>
									<button type="submit" name="submit">Submit</button>
								</form>
							</div>
									<!--Comments Writes here!-->
							<!--
							<div class="cascade-slider_item">
								<h2>Royal Tickets</h2>
								<form action="update.php" method="POST" class="form">
									<label for="mobile">Phone Number</label>
									<input type="text" name="mobile" required="" placeholder="Phone Number" pattern="[0-9]{11}" title="use valid Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
									<label for="frm">Depart From</label>
										<select name="frm" title="">
											<option value="Dhaka">Dhaka</option>
											<option value="Rajsahi">Rajsahi</option>
											<option value="Rangpur">Rangpur</option>
											<option value="Khulna">Khulna</option>
											<option value="Bogura">Bogura</option>
											<option value="Dinajpur">Dinajpur</option>
											<option value="Chittagong">Chittagong</option>
											<option value="Barishal">Barishal</option>
										</select>
									<label for="too">Destination To</label>
										<select name="too" title="">
											<option value="Dhaka">Dhaka</option>
											<option value="Rajsahi">Rajsahi</option>
											<option value="Rangpur">Rangpur</option>
											<option value="Khulna">Khulna</option>
											<option value="Bogura">Bogura</option>
											<option value="Dinajpur">Dinajpur</option>
											<option value="Chittagong">Chittagong</option>
											<option value="Barishal">Barishal</option>
										</select>
									<label for="type">Type Of the train</label>
									<select name="type" title="">
											<option value="Royal">Royal Train</option>
									</select>
									<label for="">Time</label>
									<label for="">Time</label>
									<select name="time" title="">
											<option value="10:00">10:00 am</option>
											<option value="13:00">01:00 pm</option>
											<option value="16:00">04:00 pm</option>
											<option value="20:00">20:00 pm</option>
											<option value="12:01">12:01 am</option>
									</select>
									<label for="ticket_no"> How many Ticket ?</label>
									<select name="ticket_no" title="">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
									</select>
									
									<label for="carriage">Carriage</label>
										<select name="carriage" title="">
											<option value="a">a</option>
											<option value="b">b</option>
											<option value="c">c</option>
										</select>
									<label for="date">Date</label>
									<input type="text" name="dates" required="" placeholder="2017-08-11" pattern="[0-9]+-[0-9]+-[0-9]{2,2}$" title="Give valid Date"/>
									
									<button type="submit" name="update">Submit</button>
								</form>
							</div>
									// part 2
									
							<div class="cascade-slider_item">
								<h2>Delux Tickets</h2>
								<form action="update.php" method="POST" class="form">
									<label for="mobile">Phone Number</label>
									<input type="text" name="mobile" required="" placeholder="Phone Number" pattern="[0-9]{11}" title="use valid Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
									<label for="frm">Depart From</label>
										<select name="frm" title="">
											<option value="Dhaka">Dhaka</option>
											<option value="Rajsahi">Rajsahi</option>
											<option value="Rangpur">Rangpur</option>
											<option value="Khulna">Khulna</option>
											<option value="Bogura">Bogura</option>
											<option value="Dinajpur">Dinajpur</option>
											<option value="Chittagong">Chittagong</option>
											<option value="Barishal">Barishal</option>
										</select>
									<label for="too">Destination To</label>
										<select name="too" title="">
											<option value="Dhaka">Dhaka</option>
											<option value="Rajsahi">Rajsahi</option>
											<option value="Rangpur">Rangpur</option>
											<option value="Khulna">Khulna</option>
											<option value="Bogura">Bogura</option>
											<option value="Dinajpur">Dinajpur</option>
											<option value="Chittagong">Chittagong</option>
											<option value="Barishal">Barishal</option>
										</select>
									<label for="type">Type Of the train</label>
									<select name="type" title="">
											<option value="Delux">Delux Train</option>
									</select>
									<label for="">Time</label>
									<label for="">Time</label>
									<select name="time" title="">
											<option value="10:00">10:00 am</option>
											<option value="13:00">01:00 pm</option>
											<option value="16:00">04:00 pm</option>
											<option value="20:00">20:00 pm</option>
											<option value="12:01">12:01 am</option>
									</select>
									<label for="ticket_no"> How many Ticket ?</label>
									<select name="ticket_no" title="">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
									</select>
									
									<label for="carriage">Carriage</label>
										<select name="carriage" title="">
											<option value="a">a</option>
											<option value="b">b</option>
											<option value="c">c</option>
											<option value="d">d</option>
											<option value="e">e</option>
										</select>
									<label for="date">Date</label>
									<input type="text" name="dates" required="" placeholder="2017-08-11" pattern="[0-9]+-[0-9]+-[0-9]{2,2}$" title="Give valid Date"/>
									<button type="submit" name="update">Submit</button>
								</form>
							</div>
							// part 3
							<div class="cascade-slider_item">
								<h2>V.I.P</h2>
								<form action="update.php" method="POST" class="form">
									<label for="mobile">Phone Number</label>
									<input type="text" name="mobile" required="" placeholder="Phone Number" pattern="[0-9]{11}" title="use valid Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
									<label for="frm">Depart From</label>
										<select name="frm" title="">
											<option value="Dhaka">Dhaka</option>
											<option value="Rajsahi">Rajsahi</option>
											<option value="Rangpur">Rangpur</option>
											<option value="Khulna">Khulna</option>
											<option value="Bogura">Bogura</option>
											<option value="Dinajpur">Dinajpur</option>
											<option value="Chittagong">Chittagong</option>
											<option value="Barishal">Barishal</option>
										</select>
									<label for="too">Destination To</label>
										<select name="too" title="">
											<option value="Dhaka">Dhaka</option>
											<option value="Rajsahi">Rajsahi</option>
											<option value="Rangpur">Rangpur</option>
											<option value="Khulna">Khulna</option>
											<option value="Bogura">Bogura</option>
											<option value="Dinajpur">Dinajpur</option>
											<option value="Chittagong">Chittagong</option>
											<option value="Barishal">Barishal</option>
										</select>
									<label for="type">Type Of the train</label>
									<select name="type" title="">
											<option value="V.I.P">V.I.P</option>
									</select>
									<label for="">Time</label>
									<label for="">Time</label>
									<select name="time" title="">
											<option value="10:00">10:00 am</option>
											<option value="13:00">01:00 pm</option>
											<option value="16:00">04:00 pm</option>
											<option value="20:00">20:00 pm</option>
											<option value="12:01">12:01 am</option>
									</select>
									<label for="ticket_no"> How many Ticket ?</label>
									<select name="ticket_no" title="">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
									</select>
									
									<label for="carriage">Carriage</label>
										<select name="carriage" title="">
											<option value="a">a</option>
											<option value="b">b</option>
											<option value="c">c</option>
										</select>
									<label for="date">Date</label>
									<input type="text" name="dates" required="" placeholder="2017-08-11" pattern="[0-9]+-[0-9]+-[0-9]{2,2}$" title="Give valid Date"/>
									
									<button type="submit" name="update">Submit</button>
								</form>
							</div>
							-->
						</div>
					  <span class="cascade-slider_arrow cascade-slider_arrow-left" data-action="prev">Prev</span>
					  <span class="cascade-slider_arrow cascade-slider_arrow-right" data-action="next">Next</span>
					</div>
				</div>
			</div>
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