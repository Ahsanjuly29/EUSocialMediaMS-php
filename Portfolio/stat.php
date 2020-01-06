        <!--====== STAT AREA ======-->
        <div class="stat-area section-padding" style="background-image: url(assets/img/bg.png);">
            <div class="container">
                <div class="row">

                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="single-stat">
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="count-stat">
                            <?php
                                $fetch_count_data = "SELECT COUNT(v_id) as m_v  FROM visitors WHERE device!='Computer'";
                                $execute_count_query = mysqli_query($db,$fetch_count_data);
                                $count = mysqli_fetch_assoc($execute_count_query);
                            ?>
                                <h3><span class="count"><?= $count['m_v'];?></span></h3>
                                <h4>Mobile Visitors</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="single-stat">
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="count-stat">
                            <?php
                                $fetch_count_data = "SELECT COUNT(v_id) as c_v  FROM visitors WHERE device='Computer'";
                                $execute_count_query = mysqli_query($db,$fetch_count_data);
                                $count = mysqli_fetch_assoc($execute_count_query);
                            ?>
                                <h3><span class="count"><?= $count['c_v'];?></span></h3>
                                <h4>PC Visitors</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="single-stat">
                            <div class="icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="count-stat">
                            <?php
                                $fetch_count_data = "SELECT country FROM visitors GROUP BY country";
                                $execute_count_query = mysqli_query($db,$fetch_count_data);
                                $count_c =  mysqli_num_rows($execute_count_query);
                            ?>
                                <h3><span class="count"><?= $count_c;?></span></h3>
                                <h4>Countries</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="single-stat">
                            <div class="icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="count-stat">
                                <h3>
                                    <span class="count">
                                        <?php
                                          //date in mm/dd/yyyy format; or it can be in other formats as well
                                          $journeystartDate = "01/01/2020";
                                          //explode the date to get month, day and year
                                          $journeystartDate = explode("/", $journeystartDate);
                                          //get age from date or birthdate
                                          $successage = (date("md", date("U", mktime(0, 0, 0, $journeystartDate[0], $journeystartDate[1], $journeystartDate[2]))) > date("md")
                                            ? ((date("Y") - $journeystartDate[2]) - 1)
                                            : (date("Y") - $journeystartDate[2]));
                                            echo $successage;
                                        ?>
                                    </span>
                                </h3>
                                <h4>years of success</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="single-stat">
                            <div class="icon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                            <div class="count-stat">
                                <h3>
                                    <span class="count">
                                        <?php
                                            $fetch_count_data = "SELECT COUNT(pro_id) as total  FROM projects";
                                            $execute_count_query = mysqli_query($db,$fetch_count_data);
                                            $count = mysqli_fetch_assoc($execute_count_query);
                                            echo $number = $count['total'];
                                        ?>
                                    </span>
                                </h3>
                                <h4>Projects done</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="single-stat">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="count-stat">
                                <h3><i class="fa fa-spinner fa-spin"><span class="count1"></i></span></h3>
                                <h4>Happy Clients</h4>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
         <!--====== END STAT AREA ======-->