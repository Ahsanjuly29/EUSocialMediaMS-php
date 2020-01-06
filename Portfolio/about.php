        <!--===== ABOUT AREA =====-->
        <div id="about" class="about-area section-padding">
            <div class="container">
                <div class="row">
    <!-- Start of assoc About -->
<?php
        $fetch_data = "SELECT * FROM about WHERE about_id='2'";
        $execute_query = mysqli_query($db,$fetch_data);
        $about = mysqli_fetch_assoc($execute_query);
        if ($about){
            
?>
                    <div class="col-md-5 wow fadeInLeft" data-wow-delay="0.2s">
                       <div class="author-image" style="background-image: url(assets/img/profile-pic-bg.png);">
                            <img src="assets/img/<?= $about['about_img']?>" alt="Author Image" style="border-radius: 5px;" > <!--=== about image ===-->
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="about-text" style="text-transform:capitalize;">
                            <h4>Am <?php require_once('include/age.php')?> years old creative FullStack Web Developer.</h4>
                            <?= $about['about'];
        }?>
        <!-- end of assoc About -->
        <!-- Start of foreach Social -->
                            <div class="social-links"> <!--=== social-links ===-->
                                 <ul class="social-links-navbar">
                                    <li><a href="https://www.fiverr.com/users/ahsanenterprize/" style="color:#3FC078;"><img src="assets/img/social/fiverr.png" width="20px" alt=""></a></li>
                                    <?php
                                            $fetch_data = "SELECT * FROM social";
                                            $execute_query = mysqli_query($db,$fetch_data);
                                            foreach ($execute_query  as $social) {
                                    ?>
                                        <li><a href="<?= $social['social_link']?>"><i class="<?= $social['icon_link']?>" style="color:<?= $social['social_color']?>;"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!--/.row-->
                <?php require_once('skill.php'); ?>
            </div> <!--/.container-->
        </div>
        <!--===== END ABOUT AREA =====-->