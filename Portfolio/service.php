        <!--===== SERVICES AREA =====-->
        <div id="services" class="services-area section-padding">
            <div class="container">
               <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="section-title wow zoomIn" data-wow-delay="0.2s">
                        <span class="title-bg">service</span>
                       <h2>
                           <span class="first-part">my</span>
                           <span class="second-part">services</span>
                          </h2>
                       </div>
                   </div>
               </div> <!--/.row-->
               
                <div class="row">
                    <div class="col-md-12 service-list">
                        <?php
                                $fetch_data = "SELECT * FROM service";
                                $execute_query = mysqli_query($db,$fetch_data);
                                foreach ($execute_query  as $social) {
                        ?>
                        <div class="single-service">
                            <div class="service-img" style="background-image: url(assets/img/service/<?= $social['ser_img'];?>) "></div>
                            <h3><?= $social['ser_title'];?></h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non vel, sint nisi possimus sunt veritatis.</p> -->
                            <div class="service-overlay text-left">
                                <div class="clearfix">
                                    <?= $social['ser_details'];?>
                                </div>
                            </div>
                        </div>
                        <?php }?>		
                    </div>
                </div> <!--/.row-->
            </div> <!--/.container-->
        </div>
        <!--====== END SERVICES AREA ======-->