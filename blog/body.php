
<!--This is Content area -->
<div class="post_body">
<?php

	// $query="select * from posts order by rand() LIMIT 0,4";
	$query="select * from posts order by 1 DESC LIMIT 0,4";
	$run= mysqli_query($conn,$query);
	
	while($row = mysqli_fetch_array($run)){
		
		$post_id=$row['post_id'];
		$title=$row['post_title'];
		$date=$row['post_date'];
		$author=$row['post_author'];
		$image=$row['post_image'];
		$content=substr($row['post_content'],0,6);
?>
	
	<h2>
		<a href="pages.php?id=<?php echo $post_id?>"><?php echo $title ?></a>
	</h2>
	<p> Published on:&nbsp;&nbsp;<?php echo $date?></p>
	
	<p  align="right">Posted by:&nbsp;&nbsp;<?php echo $author ?></p>
	<center>
		<img src="images/tmp/<?php echo $image;?>"width="400"height="300">
	</center>
	
	<p align="justify"><?php echo $content ?></p>
	<p align="right"><a href="pages.php?id=<?php echo $post_id?>">read more</a></p>
<?php
	}
?>
</div>