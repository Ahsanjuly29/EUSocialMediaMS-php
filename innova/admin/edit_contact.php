<?php require_once('include/head.php');?>
<?php require_once('include/session.php');?>

<?php// session_start();?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 

<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $fetch_data = "SELECT * FROM contact ORDER BY con_id DESC";
        $execute_query = mysqli_query($db,$fetch_data);
        $assoc = mysqli_fetch_assoc($execute_query);
?>

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                      <img src="https://i-love-png.com/images/contact_us_icon_png_315592.png" style="width:40%" id="previmg" >
                        <h2 class="py-3">Preview Image</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill Service details</h4>
        
                <form class="" action="update_contact.php?id=<?= $id?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label class="control-label">Contact Address</label>
                            <input name="address" type="text" id="" class="form-control" value="<?php echo $assoc['con_address'];?>">
                            <?php
                                if(isset($_SESSION['details_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['details_msg']."</p>";
                                   unset($_SESSION['details_msg']);
                                   // session_unset();
                                }
                              ?>   
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Contact Mail</label>
                            <input name="mail" type="text" id="" class="form-control" value="<?php echo $assoc['con_email'];?>">
                            <?php
                                if(isset($_SESSION['details_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['details_msg']."</p>";
                                   unset($_SESSION['details_msg']);
                                   // session_unset();
                                }
                              ?>   
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Contact mobile</label>
                            <input name="mobile" type="text" id="" class="form-control" value="<?php echo $assoc['con_mob'];?>">
                            <?php
                                if(isset($_SESSION['details_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['details_msg']."</p>";
                                   unset($_SESSION['details_msg']);
                                   // session_unset();
                                }
                              ?>   
                        </div>


                    </div>    
                    <div class="form-row">
                        <div class="form-group col-md-12">

                        </div>                       
                    </div>


                    <div class="form-row">
                        <button class="btn btn-danger btn-block" name="update_contact">
                        <i class="fa fa-sign-in fa-lg fa-fw"> Add User</i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php   } require_once('include/footer.php');?>