<?php require_once('include/head.php');?>
<?php require_once('include/session.php');?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>

<?php
if (isset($_GET['readid'])) {

    $id = $_GET['readid'];
    $update_query = "UPDATE mail SET status='unread' WHERE mail_id='$id'";
    mysqli_query($db,$update_query);
}
elseif (isset($_GET['unreadid'])) {
    $id = $_GET['unreadid'];
    $update_query = "UPDATE mail SET status='read' WHERE mail_id='$id'";
    mysqli_query($db,$update_query);
}
else{

}

?>
    <div class="container">
      <h2>Quick Mail View</h2>
      <h5 class='pt-1 text-success text-center'>
            <?php
                // session_start();
                if(isset($_SESSION['deleted'])) {
                    echo $_SESSION['deleted'];
                    unset($_SESSION['deleted']);
                    // session_unset();
                  }
                  elseif (isset($_SESSION['updated'])) {
                    echo  $_SESSION['updated'];
                    unset($_SESSION['updated']);
                    // session_unset();
                  }
                  else{
                    // do Nothing
                  }

          		$select = "SELECT * FROM mail ORDER BY mail_id DESC";
          		$select_query = mysqli_query($db,$select);
            ?>
      </h5>

		<form action="delete.php" method="POST">
			<table class="table table-hover table-bordered" id="myTable" >
			  <thead>
				<tr class="text-center">
				  <th><input type="checkbox" name="" id="checkAll"></th>
				  <th>Serial</th>
				  <th>name</th>
				  <th>email</th>
				  <th>message</th>
				  <th>Status</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					$sl=0;
					foreach ( $select_query as $value ) {
						$mail_id = $value['mail_id'];
						$name = $value['name'];
					$email = $value['email'];
						$message = $value['message'];
					$status = $value['status'];
				?>   	
					  <tr class="text-center" id="<?= $user_id?>">
						
						<td><input type="checkbox" name="deleteitem[]" value="<?= $value['mail_id']?>" id="checkItem" ></td>
						<td><?= ++$sl; ?></td>
						<td><?=  $name; ?></td>
						<td><?=  $email; ?></td>
						<td><?=  $message; ?></td>
						<?php
						  if ($status=='read') {
							echo 
							"<td class='text-center' style='background-color:rgba(200,200,200,0.1);'>
								<a href='mail.php?readid=$mail_id;' class='btn btn-outline-danger'>mark as UnRead</a>
							 </td>";
						  }
						  else{
							echo
							"<td class='text-center' style='background-color:rgba(200,200,200,0.6);' >
								<a href='mail.php?unreadid=$mail_id;' class='btn btn-outline-success'>mark as Read</a>
							 </td>";
						  }
						?>
						  
						</td>

					  </tr>
				<?php } ?>

			  </tbody>
			</table>
			<?php
			  $select = "SELECT COUNT(*) as total FROM mail";
			  $select_query = mysqli_query($db,$select);
			  $count = mysqli_fetch_assoc($select_query);

			  if ($count['total'] > 0) {
				  echo "<input class='btn btn-outline-danger text-center' type='submit' name='delete_mail' value='Delete'>";
			  }
			?>
		</form>
    </div>
 
<?php
  require_once('include/footer.php');
?>