<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 
    <div class="container">
      <h2>User Data</h2>
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
      		$select = "SELECT * FROM users ORDER BY username ASC";
      		$select_query = mysqli_query($db,$select);
        ?>
      </h5>
      <form action="delete.php" method="POST">
        <table class="table table-hover table-bordered" id="myTable" >
          <thead>
            <tr class="text-center">
              <th><input type="checkbox" name="" id="checkAll"></th>
              <th>Serial</th>
              <th>Username</th>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Image</th>
              <th>Password</th>
              <th>About</th>
              <th>role</th>
      		    <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            	$sl=0;
            	foreach ($select_query as $value) {
            		$user_id = $value['user_id'];
            		$username = $value['username'];
                $name = $value['name'];
            		$email = $value['email'];
                $mobile = $value['mobile'];
                $image = $value['image'];
            		$password = $value['password'];
                $about = $value['about'];
                $role = $value['role'];
            ?>  
                <?php
                  // if ($_SESSION['user_id']!=$user_id || $_SESSION['user_id']!='1') {
                  if ($user_id!='1' || $_SESSION['user_id']=='1') {
                    // echo $_SESSION['user_id'];
                ?>	
                <tr class="text-center" id="<?= $user_id?>">
                <td><input type="checkbox" name="deleteitem[]" value="<?= $value['user_id']?>" id="checkItem" ></td>
                <td><?= ++$sl; ?></td>
                <td><?=  $username; ?></td>
                <td><?=  $name; ?></td>
                <td><?=  $email; ?></td>
                <td><?=  $mobile; ?></td>
                <td><img src="../img/users/<?=  $image; ?>" alt=""width="50px" height="50px" readonly></td>
                <td><a href="reset.php?id=<?= $user_id; ?>&&username=<?= $username;?>">Reset</a></td>
                <td>
                <?php 
                  if (strlen($about)>100) {
                    echo substr($about, 0, 100); 
                    echo "<a href='#'>read more</a>";
                  }
                  elseif (empty($about)) {
                    echo "<input class='text-center bg-transparent' type='text' value='NULL' disabled>";
                  }
                  else{
                    echo substr($about, 0, 100);                        
                  }

                ?>
              </td>
              <td>
                <?php
                  if ($role == 1) {
                      echo 'User';
                  }
                  elseif ($role== 2) {
                    echo 'Admin';
                  }
                  else{
                    echo "You are Nothing";
                  }
                ?>                    
              </td>

              <td class="text-center">
                <a href="edit_user.php?id=<?= $user_id; ?>" class="btn btn-outline-info">Edit</a>
                <!-- <a id="delete" href="delete.php?id=<?= $user_id; ?>&&username=<?= $username;?>" class="btn btn-outline-danger">Delete</a>-->
              </td>
            </tr>
        <?php 
             } 
            }
            ?>
          </tbody>
        </table>
        <?php
          $select = "SELECT COUNT(*) as total FROM users";
          $select_query = mysqli_query($db,$select);
          $count = mysqli_fetch_assoc($select_query);

          if ($count['total'] > 0) {
            echo "<input class='btn btn-outline-danger text-center' type='submit' name='delete_user' value='Delete'>";
          }
        ?>
      </form>
    </div>
 
<?php  require_once('include/footer.php');?>
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
                swal("Safe Data!");
              }
            });
        });
</script>