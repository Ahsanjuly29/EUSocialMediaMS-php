<?php require_once('include/session.php');?>
<?php require_once('include/head.php');?>
<?php session_start();?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row" style="max-width: 100%;">
            <div class="col-md-6 py-5 border">
                <h4 class="pb-4">Please fill Service details</h4>
                <form class="" action="add_skill_post.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" type="text" placeholder="type your Service title" autofocus />
                              <?php
                                if(isset($_SESSION['title_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['title_msg']."</p>";
                                   unset($_SESSION['title_msg']);
                                }
                              ?>   
                        </div>
                      <div class="form-group col-md-12">
                          <label class="control-label">Percentages</label>
                          <input name="percent" width="100%" type="number" placeholder="Description" class="form-control">
                          <?php
                              if(isset($_SESSION['details_msg'])) {
                                 echo "<p class='pt-1 text-danger text-center'>".$_SESSION['details_msg']."</p>";
                                 unset($_SESSION['details_msg']);
                              }
                            ?> 
                      </div>                       
                    </div>
                    <div class="form-row">
                        <button class="btn btn-danger btn-block" name="add_skill">
                        <i class="fa fa-sign-in fa-lg fa-fw"> Add Skill</i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
              <?php  require_once('skill_list.php'); ?>
            </div>

        </div>
    </div>
</section>

<?php require_once('include/footer.php');?>