<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 


    <div class="container">
      <h2>Services details</h2>
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

          		$select = "SELECT * FROM service ORDER BY ser_title ASC";
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
              <th>Image</th>
              <th>details</th>
           		<th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            	$sl=0;
            	foreach ( $select_query as $value ) {
            		$ser_id = $value['ser_id'];
            		$title = $value['ser_title'];
                $image = $value['ser_img'];
            		$details = $value['ser_details'];
            ?>   	
                  <tr class="text-center" id="<?= $ser_id?>">
                    <td><input type="checkbox" name="deleteitem[]" value="<?= $value['ser_id']?>" id="checkItem" ></td>
                    <td><?= ++$sl; ?></td>

                    <td><?=  $title; ?></td>
                    <!-- <td><?=  $details; ?></td> -->
                    <td><img class="img-thumbnail" src="../assets/img/service/<?= $image; ?>" alt="" width="60px" ></td>
                    <td>
                      <?php 
                        if (strlen($details)>100) {
                          echo substr($details, 0, 100); 
                          echo "<a href='#'>read more</a>";
                        }
                        elseif (empty($details)) {
                          echo "<input class='text-center bg-transparent' type='text' value='NULL' disabled>";
                        }
                        else{
                          echo substr($details, 0, 100);                        
                        }

                      ?>
                    </td>
                    <td class="text-center">
<!--					
                      <a id="delete" href="delete.php?id=<?= $ser_id; ?>&&username=<?= $title;?>" class="btn btn-outline-danger">Delete</a>
-->
                      <a href="edit_service.php?id=<?= $ser_id; ?>" class="btn btn-outline-info">Edit</a>
                    </td>
                  </tr>
            <?php } ?>

          </tbody>
        </table>
        <?php
          $select = "SELECT COUNT(*) as total FROM users ORDER BY username ASC";
          $select_query = mysqli_query($db,$select);
          $count = mysqli_fetch_assoc($select_query);

          if ($count['total'] > 0) {
            echo "<input class='btn btn-outline-danger text-center' type='submit' name='delete_service' value='Delete'>";
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
    
<?php require_once('include/footer.php');?>