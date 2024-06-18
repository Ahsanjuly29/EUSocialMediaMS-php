<?php 
$link='Search_result';
//include("include/connection.php"); ?>
<?php

if(!isset($_SESSION['admin_name'])){
	
	require_once("location: sign_in.php");
}
else{  ?>

<?php require_once('include/search_header.php');?>
<div>
	<center>
		<h3><span style="color:red;">Sorry!</span> We did not find results: <span style="color:red;">Nothing Found !</span></h3>
		<br/><p>&emsp; Check spelling or type a new query</p>
	</center>
</div>


<?php } ?>