<?php include('conn/connection.php')?>

<html>
<head><title>Delete Data</title>
<link rel="stylesheet" href="css/delete.css"></head>

<body>
	<div class="delete">
		<form action="delete.php" method="post">
			<input type="text" name="delete">
			<button>Delete</button>
		</form>
	</div>
</body>
</html>