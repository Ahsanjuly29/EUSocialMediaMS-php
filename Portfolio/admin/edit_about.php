<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php// session_start();?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 

<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $fetch_data = "SELECT * FROM about ORDER BY about_id DESC";
        $execute_query = mysqli_query($db,$fetch_data);
        $assoc = mysqli_fetch_assoc($execute_query);
?>

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                      <img src="../assets/img/<?php echo $assoc['about_img'];?>" style="width:40%" id="previmg" >
                        <h2 class="py-3">Preview Image</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill Service details</h4>
        
                <form class="" action="update_about.php?id=<?= $id?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label class="control-label">Service Details</label>
                            <textarea id="editor" name="about" cols="40" rows="" placeholder="Description" class="form-control"><?php echo $assoc['about'];?></textarea>
                            <?php
                                if(isset($_SESSION['details_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['details_msg']."</p>";
                                   unset($_SESSION['details_msg']);
                                }
                              ?>   
                        </div>
                        <div class="form-group col-md-4">
                             <label class="control-label">About Image</label>
                             <input id="image" name="image" class="form-control" type="file" onchange="document.getElementById('previmg').src = window.URL.createObjectURL(this.files[0])">
                            <?php
                                if(isset($_SESSION['img_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['img_msg']."</p>";
                                   unset($_SESSION['img_msg']);
                               }
                              ?> 
                        </div>
                    </div>    



                    <div class="form-row">
                        <div class="form-group col-md-12">

                        </div>                       
                    </div>


                    <div class="form-row">
                        <button class="btn btn-danger btn-block" name="update_about">
                        <i class="fa fa-sign-in fa-lg fa-fw"> Update</i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php   } require_once('include/footer.php');?>