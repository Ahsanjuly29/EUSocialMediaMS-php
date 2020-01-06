<?php require_once('include/head.php');?>
<?php require_once('include/session.php');?>

<?php// session_start();?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 

<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $fetch_data = "SELECT * FROM projects WHERE pro_id = $id";
        $execute_query = mysqli_query($db,$fetch_data);
        $assoc = mysqli_fetch_assoc($execute_query);
?>

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                      <img src="../img/portfolio/<?php echo $assoc['pro_img'];?>" style="width:40%" id="previmg" >
                        <h2 class="py-3">Preview Image</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill projects details</h4>
        
                <form class="" action="update_project_post.php?id=<?= $id?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" type="text" placeholder="type your projects title" value="<?php echo $assoc['pro_title'];?>" autofocus />
                              <?php
                                if(isset($_SESSION['title_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['title_msg']."</p>";
                                   unset($_SESSION['title_msg']);
                                   // session_unset();
                                }
                              ?>   
                        </div>
                        <div class="form-group col-md-4">
                             <label class="control-label">projects Image</label>
                             <input id="image" name="image" class="form-control" type="file" onchange="document.getElementById('previmg').src = window.URL.createObjectURL(this.files[0])">
                            <?php
                                if(isset($_SESSION['img_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['img_msg']."</p>";
                                   unset($_SESSION['img_msg']);
                                   // session_unset();
                                }
                              ?> 
                        </div>
                    </div>    

                    <div class="form-row">
                        <button class="btn btn-danger btn-block" name="add_project">
                        <i class="fa fa-sign-in fa-lg fa-fw"> Update project</i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php   } require_once('include/footer.php');?>