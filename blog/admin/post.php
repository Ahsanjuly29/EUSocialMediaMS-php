<?php include("conn/connection.php");?>
<?php
	if(isset($_POST['submit'])){
	 	$title = $_POST['title'];
		$date = date('y-m-d');
	 	$author = $_POST['author'];
	 	$content = $_POST['content'];
		
	 	$image_name= $_FILES['image']['name'];
	 	$image_type= $_FILES['image']['type'];
	 	$image_size= $_FILES['image']['size'];
		$image_tmp= $_FILES['image']['tmp_name'];
	
	if($title=='' or $author=='' or $content==''){
		echo"<script>alert('any field is empty ')</script>";
		exit();
	}
	if($image_type=="image/jpeg" or $image_type=="image/png"){
		if($image_size<=8531370){
			move_uploaded_file($image_tmp,"../images/tmp/$image_name");
		}
		else{
			echo "<script>alert('Upload Only 50mb File')</script>";
		}
	}
	else{
		echo "<script>alert('Invalid file.Upload only jpg/png')</script>";		
	}
	

	$query="insert into posts(post_title,post_date,post_author,post_image,post_content)
			values('$title','$date','$author','$image_name','$content')";
	
	if(mysqli_query($conn,$query)){
		echo"<script>alert('POST HAS BEEN PUBLISHED')</script>";
	}
	
 ?>
		<div id="button" href="index.php" >
			<a href="index.php?view=view">INDEX</a>
		</div>
	</td>
</tr>
	
		</table>
	</form>
<?php } ?>
</body>


</html>