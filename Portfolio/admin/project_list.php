<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 


    <div class="container">
      <h2>Project details</h2>
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

          		$select = "SELECT * FROM projects ORDER BY pro_id DESC";
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
              <th>Link</th>
              <th>Description</th>
              <th>type</th>
          		<th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            	$sl=0;
            	foreach ( $select_query as $value ) {
            		$pro_id = $value['pro_id'];
            		$title = $value['pro_title'];
                $image = $value['pro_img'];
                $link = $value['pro_link'];
                $desc = $value['pro_desc'];
                $type = $value['pro_type'];
            ?>   	
                  <tr class="text-center" id="<?= $user_id?>">
                    <td><input type="checkbox" name="deleteitem[]" value="<?= $value['pro_id']?>" id="checkItem" ></td>
                    <td><?= ++$sl; ?></td>
                    <td><?=  $title; ?></td>
                    <td><img class="img-thumbnail" src="../assets/img/work/<?= $image; ?>" alt="" width="60px" ></td>
                    <td><a href="<?= $link; ?>"><?= $link; ?></a></td>
                    <td><?=  $desc; ?></td>
                    <td><?=  $type; ?></td>
                    <td class="text-center">				  
                      <a href="edit_project.php?id=<?= $pro_id; ?>" class="btn btn-outline-info">Edit</a>
                    </td>
                  </tr>
            <?php } ?>

          </tbody>
        </table>
        <?php
          $select = "SELECT COUNT(*) as total FROM projects";
          $select_query = mysqli_query($db,$select);
          $count = mysqli_fetch_assoc($select_query);

          if ($count['total'] > 0) {
            echo "<input class='btn btn-outline-danger text-center' type='submit' name='delete_project' value='Delete'>";
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