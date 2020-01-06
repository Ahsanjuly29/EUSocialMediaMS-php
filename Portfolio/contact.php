<style type="text/css">
	#hire .cta-area{
		 background-size:cover;
		 background-repeat:no-repeat;
		 background-position:center center;
	}
	#hire,h2{
		color:white;
	}
</style>
         <!--==== CTA AREA =====-->
		  <!-- class="contact-info-area section-padding" -->
        <div id="hire" style="">
			<div class="cta-area section-padding" style="background-image: url(assets/img/bg.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p class="wow fadeInLeft" data-wow-delay="0.4s">Do you have any project?</p>
							<h2 class="wow fadeInRight" data-wow-delay="0.8s">Let's work together !</h2>
							<a href="#contact" class="smoth-scroll wow fadeInDown" data-wow-delay="1.2s"><i class="fa fa-user"></i>hire me</a>
						</div>
					</div>
				</div>
			</div>
        </div>
        <!--==== END CTA AREA =====-->
        
        <!--====== CONTACT INFO AREA ======-->
        <div id="contact" class="contact-info-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="section-title wow zoomIn" data-wow-delay="0.2s">
                        <span class="title-bg">contact</span>
                       <h2>
                           <span class="first-part">Contact</span>
                           <span class="second-part">me</span>
                          </h2>
                    </div>
                    </div>
                </div> <!--/.row-->
                <?php
                        $fetch_data = "SELECT * FROM contact";
                        $execute_query = mysqli_query($db,$fetch_data);
                        $contact = mysqli_fetch_assoc($execute_query);
                        if ($contact){
                ?>                
                <div class="row margin-bottom-60">
                    <div class="col-md-4">
                         <div class="single-info"> <!-- Single Info -->
                            <div class="info-icon">
                                <i class="fa fa-rocket"></i>
                            </div>
                            <div class="info-content">
                                <h5>my location:</h5>
                                <p><?= $contact['con_address'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-info"> <!-- Single Info -->
                            <div class="info-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <h5>Phone number:</h5>
                                <p>(+88) <?= $contact['con_mob'];?></p>
                                <p>(+88) <?= $contact['con_mob2'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-info"> <!-- Single Info -->
                            <div class="info-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <h5>email address:</h5>
                                <p><?= $contact['con_email'];?></p>
								<p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                ?>                
                <div class="row">
                    <div class="col-md-7">
                          <div class="contact-form">
                            <form action="contact_post.php" id="contact-form" method="post"> <!-- Start Contact From -->
                                <div class="messages">
                                   <?php									
									if(isset($_SESSION['mail_msg'])) {
										echo "<h5 class='pt-1 text-danger text-center' style='background: rgba(255,255,255,0.3);' >".$_SESSION['mail_msg']."</h5>";
										unset($_SESSION['mail_msg']);
									}
                                    ?> 
                                </div>
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Name*" required="required" data-error="Name is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Email*" required="required" data-error="Valid email is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input id="form_subject" type="text" name="subject" class="form-control" placeholder="Subject*" required="required" data-error="Subject is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea id="form_message" name="message" class="form-control" placeholder="Message*" rows="7" required="required" data-error="Please,leave us a message."></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-effect btn-sent" value="Send message">
                                        </div>
                                    </div>
                                </div>
                            </form> <!-- End Contact From -->
                          </div>
                     </div>
                    
                    <div class="col-md-5">
                        <div class="map"></div>
                    </div>
                </div> <!--/.row-->
            </div> <!--/.container-->
        </div>