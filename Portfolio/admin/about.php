<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 


    <div class="container">
      <h2>Employee details</h2>
      <h5 class='pt-1 text-success text-center'>
            <?php
                // session_start();
                if(isset($_SESSION['deleted'])) {
                    echo $_SESSION['deleted'];
                    unset($_SESSION['deleted']);
                  }
                  elseif (isset($_SESSION['updated'])) {
                    echo  $_SESSION['updated'];
                    unset($_SESSION['updated']);
                  }
                  else{
                    // do Nothing
                  }

          		$select = "SELECT * FROM about ORDER BY about_id DESC";
          		$select_query = mysqli_query($db,$select);
            ?>
      </h5>  

        <table class="table table-hover table-bordered" id="myTable1" >
          <thead>
            <tr class="text-center">
              <th>Serial</th>
              <th>details</th>
      		    <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            	$sl=0;
            	foreach ( $select_query as $value ) {
            		$about_id = $value['about_id'];
            		$about = $value['about'];
                $image = $value['about_img'];              
            ?>   	
                  <tr class="text-center" id="<?= $user_id?>">
                    <td><?= ++$sl; ?></td>
                    <td><img class="img-thumbnail" src="../assets/img/<?=  $image; ?>" alt="" width="200px" ></td>
                    <td><textarea id="editor" disabled><?= $about?></textarea></td>
                    <td class="text-center">
                      <a href="edit_about.php?id=<?= $about_id; ?>" class="btn btn-outline-info">Edit</a>
                    </td>
                  </tr>
            <?php } ?>

          </tbody>
        </table>
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