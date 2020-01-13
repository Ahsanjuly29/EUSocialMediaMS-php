<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php //session_start();?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>


<?php

  $id = $_GET['id'];
  $select = "SELECT * FROM users WHERE user_id='$id'";
  $select_query = mysqli_query($db,$select);
  $assoc = mysqli_fetch_assoc($select_query); 

?>

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-1 py-5"></div>
            <div class="col-md-6 py-5 border">
                <h3 class="pb-4"><?= $assoc['username'];?>'s Details</h3>
                <form class="">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label"><b><u>Name</u></b></label>
                            <p><?= $assoc['name'];?></p>  
                        </div>
                       <div class="form-group col-md-6">
                          <label class="control-label"><b><u>Emai</u>l</b></label>
                          <p><?= $assoc['email'];?></p>                             
                        </div>
                    </div>       

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label class="control-label"><b><u>username</u></b></label>
                          <p><?= $assoc['username'];?></p>    
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label"><b><u>mobile</u></b></label>
                          <p><?= $assoc['mobile'];?></p>  
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label class="control-label"><b><u>Abou</u>t you</b></label>
                          <p><?= $assoc['about'];?></p>  
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label"><b><u>Role</u></b></label>
                          <p><?= $assoc['role'];?></p>
                          </select>
                        </div>                         
                    </div>
                </form>
            </div>
            <div class="col-md-4 py-5 bg-primary text-white text-center img-thumbnail">
                <div class=" ">
                    <div class="card-body">
                      <img class="img-thumbnail" src="../assets/img/users/<?= $assoc['image'];?>" style="width:80%" id="previmg"/>
                        <h2 class="py-3">Preview Image</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-1 py-5"></div>
        </div>
    </div>
</section>

<?php require_once('include/footer.php');?>