<?php  require('conn/connection.php');?>
<?php require('my_ticket.php')?>
<!DOCTYPE HTML>
<html>
	<head><title>Search Data</title>
	        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<!--fonts-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Raleway:400,500,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
	</head>
<body>

<?php	

	echo"<div class=\"buyer_details\">";
		$item=$_POST['search'];
			if($item){
				$show = mysqli_query($conn,"SELECT * FROM railway where mobile = '$item'");
				$res=mysqli_num_rows($show);
	
			/* Condition to Show the Inputs of Database */
			while($row = mysqli_fetch_array($show))
			{
				echo "<p>";
				
				echo "<p>";
				echo "Name:  ".$row['fname'];
				echo "</p>";
				
				echo "<p>";
				echo "Number:  ".$row['mobile'];
				echo "</p>";
				
				echo "<p>";
				echo "Depart From:  ".$row['frm'];
				echo "</p>";
				
				echo "<p>";
				echo "Destination To:  ".$row['too'];
				echo "</p>";
								
				echo "<p>";
				echo "Train Type:  ".$row['type'];
				echo "</p>";
				
				echo "<p>";
				echo "Booking Date:  ".$row['dates'];
				echo "</p>";

				echo "<p>";
				echo "Departure Time:  ".$row['time'];
				echo "</p>";
				
				echo "<p>";
				echo "Ticket Bought:  ".$row['ticket_no'];
				echo "</p>"; 

				echo "</p>";
			}}
			else{
				die("");
			}
			?>
				<form action="cancel_booking.php" method="POST">
					<input type="text" name="delete" required="" placeholder=" Ex.01682243105 ">
					<button>Cancel Your Ticket</button>
				</form>
		<?php
			echo "</br>";
			echo " To know more about your Bookings please <a href='about.php';> Contact us <a/> ...!! ";
		?>
</div>
</table>
</body>
</html>