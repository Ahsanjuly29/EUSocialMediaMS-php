<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                      <img src="../assets/img/work/default-image.jpg" style="width:30%" id="previmg" >
                        <h2 class="py-3">Preview Image</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill project details</h4>
				
                <form action="add_project_post.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" type="text" placeholder="type your project title" autofocus />
                              <?php
                                if(isset($_SESSION['title_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['title_msg']."</p>";
                                   unset($_SESSION['title_msg']);
                                }
                              ?>   
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Link</label>
                            <input type="text" class="form-control" name="link" type="text" placeholder="type your project link" autofocus />
                              <?php
                                if(isset($_SESSION['link_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['link_msg']."</p>";
                                   unset($_SESSION['link_msg']);
                                }
                              ?>   
                        </div>

                        <div class="form-group col-md-10">
                            <label class="control-label">Description</label>
                            <textarea type="text" class="form-control" name="desc" id="editor" type="text" placeholder="type your project Description"></textarea> 
                              <?php
                                if(isset($_SESSION['desc_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['desc_msg']."</p>";
                                   unset($_SESSION['desc_msg']);
                                }
                              ?>   
                        </div>                     
                        <div class="form-group col-md-2">
                             <label class="control-label">proJect Type</label>
                             <select name="type" class="form-control" type="text">
                               <option value="Template">Template</option>
                               <option value="Application">Application</option>
                               <option value="Graphics">Graphics</option>
                             </select>
                            <?php
                                if(isset($_SESSION['img_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['img_msg']."</p>";
                                   unset($_SESSION['img_msg']);
                                }
                              ?> 
                        </div>
                        <div class="form-group col-md-12">
                             <label class="control-label">Screen Shot</label>
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
                        <button class="btn btn-danger btn-block" name="add_project">
                        <i class="fa fa-sign-in fa-lg fa-fw"> Add</i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once('include/footer.php');?>