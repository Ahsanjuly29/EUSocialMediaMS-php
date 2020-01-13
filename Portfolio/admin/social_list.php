<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 
    <div class="container">
      <h2>Icon's Links</h2>
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

          		$select = "SELECT * FROM social ORDER BY social_id DESC";
          		$select_query = mysqli_query($db,$select);
            ?>
      </h5>  
      <form action="delete.php" method="POST"> 
        <table class="table table-hover table-bordered" id="myTable" >
          <thead>
            <tr class="text-center">
              <th><input type="checkbox" name="" id="checkAll"></th>
              <th>Serial</th>
              <th>Title</th>
              <th>icon</th>
              <th>link</th>
      		<th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            	$sl=0;
            	foreach ( $select_query as $value ) {
            		$social_id = $value['social_id'];
            		$title = $value['social_name'];
                $icon = $value['icon_link'];
                $link = $value['social_link'];
            ?>   	
                  <tr class="text-center" id="<?= $social_id?>">
                    <td><input type="checkbox" name="deleteitem[]" value="<?= $value['social_id']?>" id="checkItem" ></td>
                    <td><?= ++$sl; ?></td>
                    <td><?=  $title; ?></td>
                    <!-- <td><?=  $details; ?></td> -->
                    <td><i class="img-thumbnail <?= $icon;?>" style="color:<?= $value['social_color']?>;" alt=""></i></td>
                    <td><?=  $link; ?></td>

                    <td class="text-center">
                      <!-- <a id="delete" href="social_delete.php?id=<?= $social_id; ?>&&username=<?= $title;?>" class="btn btn-outline-danger">Delete</a> -->
                      <a href="edit_social.php?id=<?= $social_id; ?>" class="btn btn-outline-info">Edit</a>
                    </td>
                  </tr>
            <?php } ?>

          </tbody>
        </table>
        <?php
          $select = "SELECT COUNT(*) as total FROM users";
          $select_query = mysqli_query($db,$select);
          $count = mysqli_fetch_assoc($select_query);

          if ($count['total'] > 0) {
            echo "<input class='btn btn-outline-danger text-center' type='submit' name='delete_icon' value='Delete'>";
          }
        ?>
      </form>
    </div>
 
<?php
  require_once('include/footer.php');
?>
<script>  
     $(document).on("click", "#delete", function(e){e.preventDefault();
         var link = $(this).attr("href");
            swal({
              title: "Are you Want to delete?",
              text: "Once Delete, This will be Permanently Delete!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                   window.location.href = link;
              } else {
                swal("Canceled!");
              }
            });
        });
</script>