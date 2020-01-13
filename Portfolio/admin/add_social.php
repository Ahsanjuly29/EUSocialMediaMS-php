<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php //session_start();?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>

<section class="testimonial py-5" id="testimonial">
    <div class="container" style="margin-left: 40%;">
        <div class="row ">
<!--             <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                      <img>
                        <h2 class="py-3"></h2>
                    </div>
                </div>
            </div> -->
            <div class="col-md-12 py-5 border">
                <h4 class="pb-4">Please fill Social Icons details <i class="fa fa-facebook fa-spin fa-fw"style="color:#4063AA;"></i><i class="fa fa-skype fa-spin fa-fw" style="color:#00AFF0;"></i></h4>
				
                <form class="" action="add_social_post.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" type="text" placeholder="type your project title" autofocus/>
                              <?php
                                if(isset($_SESSION['title_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['title_msg']."</p>";
                                   unset($_SESSION['title_msg']);
                                   // session_unset();
                                }
                              ?>   
                        </div>
                        <div class="form-group col-md-6">
                             <label class="control-label">Icon Link</label>
                             <input type="text" name="icon" class="form-control" placeholder="fontawesome icon ex.fa fa-users" >
                            <?php
                                if(isset($_SESSION['icon_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['icon_msg']."</p>";
                                   unset($_SESSION['icon_msg']);
                                }
                              ?> 
                        </div>                        
                        <div class="form-group col-md-10">
                             <label class="control-label">Social Link</label>
                             <input type="text" name="link" class="form-control">
                            <?php
                                if(isset($_SESSION['link_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['link_msg']."</p>";
                                   unset($_SESSION['link_msg']);
                                }
                              ?> 
                        </div>
                        <div class="form-group col-md-2">
                             <label class="control-label">Icon Color</label>
                             <input type="color" name="color" class="form-control">
                            <?php
                                if(isset($_SESSION['link_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['link_msg']."</p>";
                                   unset($_SESSION['link_msg']);
                                }
                              ?> 
                        </div>
                    </div>

                    <div class="form-row">
                        <button class="btn btn-danger btn-block" name="add_link">
                        <i class="fa fa-sign-in fa-lg fa-fw"> Add Link</i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once('include/footer.php');?>