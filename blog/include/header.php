<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="js/analog_clock.js"></script>
	<script type="text/javascript" src="js/digital_clock.js"></script>
</head>
<body onload="analogClock();myClock();" >

<!--This is Top bar -->
<div id="top">
	<div class="top">
		<div style="float:right">Today is:&nbsp;&nbsp;
			<?php echo date("jS,F Y");?>
		</div>
		<div>Time:&nbsp;&nbsp;<span id="clock"></span></div>
	</div>
		<canvas id="canvas" width="100" height="100" style="position:absolute;"></canvas>
</div>
	<div id="header">
		<img style="float:right; width:120px;" src="images/profile/pic_2.jpg"/>
		<img style="float:; width:880px; position:inherit;" src="images/profile/pic_1.jpg"/>
	</div>
	
	<!--This is Nav bar -->
<div class="navbar">
	<div id="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="insert_post.php">post </a></li>
			<li><a href="#">cause</a></li>
			<li><a href="#">photos</a></li>
			<li><a href="#">about us</a></li>
			<li><a href="contact.php">contact us</a></li>
		<ul>
	</div>
	<!--This is Search Box  -->
	<div class="searchbox">
		<form action="search.php "method="get">
			<input type="text"  placeholder="Search here" size="25" name="search"/>
			<input type="submit" name="submit" value="search"/>
		</form>
	</div>
	
</div>

<!--This is Sidebar bar -->
	<div class="container">
		<div id="sidebar">
			<h2>Recent Posts</h2>
			<?php
				$query="select * from posts order by 1 DESC LIMIT 0,3";
				$run= mysqli_query($conn,$query);
				while($row= mysqli_fetch_array($run)){
					
					$post_id=$row['post_id'];
					$title=$row['post_title'];
					$image=$row['post_image'];
				
			?>
			<a href="pages.php?id=<?php echo $post_id; ?>">
				<img src="images/tmp/<?php echo $image; ?>" width="150" height="150">
			</a>
			<a href="pages.php?id=<?php echo $post_id;?>">
				<h2><?php echo $title; ?></h2>
			</a>
			
			<?php } ?>
			
			
			<h2>Subscribe via Email</h2>
			<form style="border: ;padding:3px;text-align:center;"action="http://feedburner.google.com/fb/a/mailverify"method="POST" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=OnlineComputerTeacherKarachi','popupwindow','scrollbars=yes,width=550,height=520');return true">
				<p>Enter Your Email address: </p>
				<p><input type="text" style="width:140px" name="email"/></p>
				<p><input type="hidden" value="OnlineTeache" name="uri"/></p>
				<p><input type="hidden" name="loc" value="en_US"/></p>
				<p><input type="submit" value="Subscribe"/></p>
				<p>Delivered by<a href="feedburner.google.com" target="blank" > </a></p>
			</form>
			<!-- Social Buttons-->
			<div class="social">
				<h2 >Follow US</h2>
				<a href="www.facebook.com/ahsanenterprize" target="blank">
					<img src="images/social/facebook2.png">
				</a>
				<a href="www.pinterest.com/ahsanenterprize" target="blank">
					<img src="images/social/pinterest.png">
				</a>
				<img src="images/social/twitter.png">
				<img src="images/social/youtube.png">
			</div>
		
	</div>
