         <!--====== WORK AREA ======-->
        <div id="work" class="work-area section-padding">
            <div class="container">
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="section-title wow zoomIn" data-wow-delay="0.2s">
                        <span class="title-bg">works</span>
                       <h2>
                           <span class="first-part">My </span>
                           <span class="second-part">Projects</span>
                          </h2>
                       </div>
                   </div>
               </div> <!--/.row-->
                <div class="row">
                    <ul class="work-list text-center">
                        <li class="filter" data-filter="all">all</li>
                        <?php
                                $fetch_data = "SELECT pro_type FROM projects GROUP BY pro_type";
                                $execute_query = mysqli_query($db,$fetch_data);
                                foreach ($execute_query as $projects) {
                        ?>
                        <li class="filter" data-filter=".<?= $projects['pro_type']?>"><?= $projects['pro_type']?></li>
                        <?php
                                }
                         ?>
                    </ul>
                </div> <!--/.row-->
                <div class="work-inner">
                <!-- <div class="work-inner"> -->
                    <div class="row">
                        <?php
                                $fetch_data = "SELECT * FROM projects ORDER BY pro_id DESC";
                                $execute_query = mysqli_query($db,$fetch_data);
                                foreach ($execute_query as $projects) {
                        ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 mix <?= $projects['pro_type']?>"> <!-- Single Work -->
                            <div class="single-work" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
                                <img src="assets/img/work/<?= $projects['pro_img']?>" alt="">
                                <div class="item-hover">
                                    <div class="work-table">
                                        <div class="work-tablecell">
                                            <div class="hover-content">
                                                <h4><?= $projects['pro_title']?></h4>
                                                <p><?= $projects['pro_desc']?></p>
                                                <a href="assets/img/work/<?= $projects['pro_img']?>" class="work-popup"><i class="fa fa-search-plus"></i></a>
                                                <a href="<?= $projects['pro_link']?>" target="_blank" ><i class="fa fa-chain-broken"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                        ?>
                    </div> <!--/.row-->
                </div>
            </div><!--/.container-->
        </div>
        <!--====== END WORK AREA ======-->