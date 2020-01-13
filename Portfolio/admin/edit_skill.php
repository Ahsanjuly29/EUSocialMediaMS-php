<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php  session_start();?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 

<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $fetch_data = "SELECT * FROM skills WHERE skill_id = $id";
        $execute_query = mysqli_query($db,$fetch_data);
        $assoc = mysqli_fetch_assoc($execute_query);
?>

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">
<!--                       <img src="../img/services/<?php echo $assoc['ser_img'];?>" style="width:40%" id="previmg" >
                        <h2 class="py-3">Preview Image</h2> -->
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill Skills details</h4>
        
                <form class="" action="update_skill_post.php?id=<?= $id?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" type="text" placeholder="type your Service title" value="<?php echo $assoc['title'];?>" autofocus />
                              <?php
                                if(isset($_SESSION['title_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['title_msg']."</p>";
                                   unset($_SESSION['title_msg']);
                                   // session_unset();
                                }
                              ?>   
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Percenteges</label>
                            <input name="ser_details" type="number" placeholder="Type number" value="<?php echo $assoc['percent'];?>" class="form-control">
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
                        <button class="btn btn-danger btn-block" name="update_skill">
                        <i class="fa fa-sign-in fa-lg fa-fw"> Update Skill</i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php   } require_once('include/footer.php');?>