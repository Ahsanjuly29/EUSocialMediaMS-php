<?php 
$link='All Post';
include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['admin_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php include('include/header.php')?>
			<div class="admin-content-area">
				<div class="admin-content">
					<div class="content-heading">
						<h3>All Post</h3>
						<div class="search-option">
						<form action="search.php" method="GET">
							<input size="25" type="text" name="post" />
							<button type="submit" name="post_search"><i class="fa fa-search"></i></button>
						</form>
						</div>
					</div>
					<div class="content">
						<div class="all-people">
							<table style="margin-bottom:10px;padding:0;">
								<tbody>
									<tr>
										<th style="border:1px solid black;background:rgba(26,187,156,0.5);padding:5px;"><a href="all_post.php?post_type=notice" style="color:red; text-align:center;">Notice</a></th>
										<th style="border:1px solid black;background:rgba(26,187,156,0.5);padding:5px;"><a href="all_post.php?post_type=status" style="color:red; text-align:center;">Status</a></th>
										<th style="border:1px solid black;background:rgba(26,187,156,0.5);padding:5px;"><a href="all_post.php?post_type=forum" style="color:red; text-align:center;">Forum</a></th>
									</tr>
								</tbody>
							</table>
<?php
						if(isset($_GET['post_type'])){
							$type=$_GET['post_type'];
?>							
							<table>
							  <tr>
							<!--<th>Date of This post</th> -->
								<th>post no</th>
								<th>Heading</th>
								<th>Description</th>
								<th>Image</th>
								<th>Author ID</th>
								<th>Catagory</th>
								<th>option</th>
								
							  </tr>
<?php

							$i=0;
							$query="SELECT * from posts WHERE post_type='$type' ORDER BY 1 DESC";
							$run= mysqli_query($connection,$query);
							while($row=mysqli_fetch_array($run)){
								//$date = date('y-m-d');
								$headings=substr($row['post_headings'],0,20);								
								$description=substr($row['post_description'],0,60);
								$image = $row['post_image'];								
								$author=$row['post_author'];
								$catagory=$row['post_catagory'];
								$id = $row['post_id'];
								
?>
							  <tr>
							<!--<td><?php // echo $date;?></td>-->
								<td class="bg-warning"><?php echo ++$i;?></td>
								<td><?php echo $headings;?></td>
								<td><?php echo $description;?></td>
								<td><img src="../image/post/<?php echo $image;?>"width="50" height="50"/></td>
								
								<td><?php echo $author;?></td>
								<td><?php echo $catagory;?></td>
								<td>
									<ul class="option-area">
										<?php 
											if($_SESSION['admin_id']==$author){
										?>
										<li>
											<a href="edit_post.php?edit_post=<?php echo $id;?>">
												<i class="fa fa-edit"></i>
											</a>
										</li>
										
											<?php } ?>
										<li>	
											<a href="delete.php?delete_post=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete this item?');">
												<i class="fa fa-trash"></i>
											</a>
										</li>
										
										
										<li>
											<a href="read_more.php?view_post=<?php echo $id;?>" target="_blank">more</a>
										</li>
									</ul>
								</td>
							</tr>
							<?php
								
								$j=0;
								$query2="SELECT * from comment WHERE post_id='$id'";
								$run2= mysqli_query($connection,$query2);
								while($row2=mysqli_fetch_array($run2)){
									$cm_id=$row2['id'];
									$commenter=$row2['user_id'];
									$po_id=$row2['post_id'];
									$comment =substr($row2['comment'],0,60);
									$c_date=$row2['c_date'];
									$c_time=$row2['c_time'];
									// $user_type=$row['user_type'];
							?>
							<tr class="bg-success text-danger" style="background:#DFF0D8;">
								<td><?php echo $i.'&middot;&#183;&#xb7;'.++$j;?></td>
								<td> &#8594; &#8594;</td>
								<td> <?php echo $comment;?></td>
								<td> &#8594; &#8594; </td>
								<td> <?php echo $commenter;?></td>
								<td style="font-size:10px;"><?php echo $c_date;?> at <?php echo $c_time;?></td>
								<td>
									<a href="delete.php?delete_comment=<?php echo $cm_id;?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" style="color: darkblue;"></i></a></td>
							</tr>
						<?php	} ?>
						<?php	}} ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('include/footer.php')?>
<?php }?>