
<?php
        $fetch_data = "SELECT * FROM bg WHERE bg_id ='1'";
        $execute_query = mysqli_query($db,$fetch_data);
        $bg = mysqli_fetch_assoc($execute_query);   
?>
        <!--======= WELCOME AREA =======-->
        <div id="home" class="welcome-area" data-stellar-background-ratio="0.6" style="background-image: url(assets/img/<?= $bg['bg']?>);" > 
        	 <!-- style="background-image: url(assets/img/ahsan.jpg);" -->
           <div class="welcome-table">
               <div class="welcome-cell">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                                <div class="welcome-text">
                                  <h2 class="theme-color"><?= $bg['bg_title']?></h2>
                                    <h1 class="cd-headline clip">
                                        <span class="bct-text">I am</span>
                                        <span class="cd-words-wrapper">
                                            <b class="is-visible">a Web Developer.</b>
                                            <b>a Graphics Designer.</b>
                                            <b>a Programmer.</b>
                                            <b>a Freelancer.</b>
                                        </span>
                                    </h1>
									<div class="about-btn">
										<a class="smoth-scroll" href="#work"><i class="fa fa-briefcase"></i>my projects</a>
										<a class="btn-black smoth-scroll" href="#contact" href="#"><i class="fa fa-rocket"></i>Hire Me</a>
										<a class="btn-black smoth-scroll" href="https://ahsanenterprize.github.io/Mycv/" target="_blank"><i class="fa fa-file-pdf-o"></i>My CV</a>
									</div>
                                </div>
                            </div>
                       </div> <!--/.row-->
                    </div> <!--/.container-->
                </div>
            </div>
            <div class="bg-shape-1" style="background-image: url(assets/img/banner_wave.png)"></div>
        </div>
        <!--===== END WELCOME AREA =====-->