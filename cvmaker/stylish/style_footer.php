<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user_id'])){
	
	header("location: ../sign_in.php");
}
else{
	$user_id=$_SESSION['user_id'];
	$query="SELECT * FROM user where user_id=$user_id";
	$run= mysqli_query($connection,$query);
	$row=mysqli_fetch_array($run);
		$user_id=$row['user_id'];
		$first_name=$row['first_name'];
?>
<!-- Footer Area -->
	<div class="container px-0">
		<div class="footer">
			<div class="bg-light" align="center">
				<div class="row px-0 py-2 ">
					<div class="col-sm-2">
					
					</div>
					<div class="col-sm-8">
						<h2>Hello World</h2>
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
							Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
							when an unknown p
						</p>
						<form class="form-inline my-2 my-lg-0">
							<input class="form-control mr-sm-2" style="width:80%; border:1px solid #7B7B7B;" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-warning bg-warning text-white my-2 my-sm-0 shadow-sm mb-4" type="submit">Search</button>
						</form>
					</div>
					<div class="col-sm-2"></div>
				</div>
				<div class="container px-0">
					<div class="footer text-dark"">
						<div class="bg-white" align="center">
							<div class="row px-0 py-2 ">
								<div class="col-sm-12" align="center">
									<p>Sincerely Yours</p>
									<p class="add1">
										<a  href=" ../sign_out.php" target="blank">
											<b><?php echo $first_name;?></b>
										</a>
									</p>
									<hr />
								</div>

							</div>
							<div class="row text-dark font-weight-bold" >
								<div class="col-sm-12">
									<h2><i class="fas fa-globe"></i></h2>
									<p><i class="far fa-copyright">&nbsp;all Credit Goes to Bootstrap 4</i></p>
								</div>
							</div>
						</div>
					</div>
				</div>				
 
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>	
</body>
</html>
<?php } ?>