
        <!--====== FOOTER AREA ======-->
        <footer class="footer">
			<div class="container text-center">
				<div class="footer_upper_grid">
					<div class="col-md-4 col-sm-4 col-xs-12 footer_GridBlock1">
						<div class="upper-table">
							<div>
								<?= $bg['bg_desc']?>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 footer_GridBlock1">
						<div class="upper-table"style="padding-top:21%;">
							<p> This is my personal blog, where I share What i learn from books, projects or the work i'm working on and from those feelings that i feel everyday in life. I hope that you have something to share. Let's start the conversation.</p>
							<a class="smoth-scroll" style="color:white;" href="blog.php">
								<img class="footer_GridBlock_image" src="assets/img/signiture.png" alt="Author Image">
							</a>
							</br>
							<span style="margin-left: 60px;"><?= date("Y.m.d");?></span>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 footer_GridBlock1">
						<div class="upper-table">
							<label class="text-justify" style="left: 0;display: block;margin-left: 13px;">Recent post:</label>
							<p class="text-justify">My Last post will be seen here.My Last post will be seen here.My Last post will be seen here.My Last post will be seen here.My Last post will be seen here.My Last post will be seen here.My Last post will be seen... <a class="text-warning" href="">read more</a></p>
						</div>
					</div>
					<div class="col-md-5 col-sm-5 col-xs-12 footer_GridBlock2">
						<div class="lower-table">
						 <div class="social-links"> <!--=== social-links ===-->
							 <ul class="social-links-navbar">
								<?php
								        $fetch_data = "SELECT * FROM social";
								        $execute_query = mysqli_query($db,$fetch_data);
								        foreach ($execute_query  as $social) {
								?>        
                                <li><a href="<?= $social['social_link']?>"><i class="<?= $social['icon_link']?>"></i></a></li>
								<?php } ?>
							</ul>
						</div>
						</div>
					</div>
                    <div class="col-md-7 col-sm-7 col-xs-12 footer_GridBlock2">
						<div class="lower-table">
							<ul class="footer_navbar">
                                <li class="dropdown">
									<a class="dropbtn smoth-scroll" href="#home" style="padding-bottom:0;">Home</a>
									<div class="dropdown-content">
										<a href="index2.html" class="dropdown-content-a" >Home (Optional)</a>
									</div>
								</li>
                                <li><a class="smoth-scroll" href="#about">about</a></li>
                                <li><a class="smoth-scroll" href="#services">service</a></li>
                                <li><a class="smoth-scroll" href="#work">work</a></li>
                                <li><a class="smoth-scroll" href="#testimonial">testimonials</a></li>
                                <li><a class="smoth-scroll" href="#contact">contact</a></li>						  
							</ul>
						</div>					
                    </div>					
					<div class="row wow zoomIn" data-wow-delay="0.4s">
						<div class="col-md-12 text-right">
							<p><span style="font-size:16px;">&copy;</span>&nbsp;2020&nbsp;<strong>&nbsp;<a class="smoth-scroll" href="#about" style="color:#fff;">Ahsan Ahmed</a></strong>.&nbsp;&nbsp;All Rights Reserved</p>
						</div>
					</div>
				</div>
            </div>
        </footer>
        <!--====== END FOOTER AREA ======-->
        <!--== plugins js ==-->
        <script src="assets/js/plugins.js"></script>
        <!--== typed js ==-->
        <script src="assets/js/animated.headline.js"></script>
        <!--== stellar js ==-->
        <script src="assets/js/jquery.stellar.min.js"></script>
        <!--== counterup js ==-->
        <script src="assets/js/jquery.inview.min.js"></script>
         <!--== wow js ==-->
        <script src="assets/js/wow.min.js"></script>
         <!--== validator js ==-->
        <script src="assets/js/validator.min.js"></script>
         <!--== mixitup js ==-->
        <script src="assets/js/jquery.mixitup.js"></script>
         <!--== google map js ==-->
        <script src="assets/js/gmap3.min.js"></script>
        <script src="assets/js/custom-google-map.js"></script>
        <!-- google map api js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmPkfTPQOB5ZHqTVOMYRDmcKOgRLTClkU&amp;region=US"></script>
         <!--== contact js ==-->
        <script src="assets/js/contact.js"></script>
         <!--== main js ==-->
        <script src="assets/js/main.js"></script>
	</body>
<!-- Mirrored from mhbthemes.com/demos/kazo/kazo/creative_one.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Jun 2018 20:51:01 GMT -->
</html>