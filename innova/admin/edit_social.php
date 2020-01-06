<?php require_once('include/head.php');?>
<?php require_once('include/session.php');?>

<?php// session_start();?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 

<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $fetch_data = "SELECT * FROM social WHERE social_id = $id";
        $execute_query = mysqli_query($db,$fetch_data);
        $assoc = mysqli_fetch_assoc($execute_query);
?>

<section class="testimonial py-5" id="testimonial">
    <div class="container" style="margin-left: 25%;">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                      <h2><i class="<?php echo $assoc['icon_link'];?>"></i></h2>
                        <h2 class="py-3">Preview Image</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill projects details</h4>
        
                <form class="" action="update_social_post.php?id=<?= $id?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" type="text" placeholder="type your projects title" value="<?php echo $assoc['social_name'];?>" autofocus />
                              <?php
                                if(isset($_SESSION['title_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['title_msg']."</p>";
                                   unset($_SESSION['title_msg']);
                                   // session_unset();
                                }
                              ?>   
                        </div>
                        <div class="form-group col-md-4">
                             <label class="control-label">Icon Link</label>
                             <input type="text" name="icon" class="form-control" value="<?php echo $assoc['icon_link'];?>" >
                            <?php
                                if(isset($_SESSION['icon_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['icon_msg']."</p>";
                                   unset($_SESSION['icon_msg']);
                                   // session_unset();
                                }
                              ?> 
                        </div>

                        <div class="form-group col-md-12">
                             <label class="control-label">Social Link</label>
                             <input type="text" name="link" class="form-control" value="<?php echo $assoc['social_link'];?>">
                            <?php
                                if(isset($_SESSION['link_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['link_msg']."</p>";
                                   unset($_SESSION['link_msg']);
                                   // session_unset();
                                }
                              ?> 
                        </div> 
                    </div>    

                    <div class="form-row">
                        <button class="btn btn-danger btn-block" name="add_social">
                        <i class="fa fa-sign-in fa-lg fa-fw"> Update Social</i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php   } require_once('include/footer.php');?>