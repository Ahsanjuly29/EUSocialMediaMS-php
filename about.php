<?php 
$page='About us';
include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['first_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php require_once('include/blog_header.php'); ?>
	<section class="content-section">
		<div class="container">
			<div class="page-area">
			
				<div class="row">
					<div class="col-12">
						<div class="page-left">


							<div class="contact-section-1 white-bg">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="team-contact-area">
                                            <div class="team-contact">
                                                <img src="image/admin/Chayon.png" class="team-mamber" alt="">
                                            </div>
                                            <div class="team-contact-text">
                                                <h3>Md. Chayon Bin Mahfuz</h3>
                                                <ul>
                                                    <li class="">Id: 143400001</li>
                                                    <li class="">Email: chayon@gmail.com</li>
                                                    <li class="">phone: 01xxxxxxxx</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="team-contact-area">
                                            <div class="team-contact">
                                                <img src="image/admin/nishat.jpg" class="team-mamber" alt="">
                                            </div>
                                            <div class="team-contact-text">
                                                <h3>Neshat Tasnim Tulee</h3>
                                                <ul>
                                                    <li class="">Id: 143400002</li>
                                                    <li class="">Email: tulee@gmail.com</li>
                                                    <li class="">phone: 01xxxxxxxx</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="team-contact-area">
                                            <div class="team-contact">
                                                <img src="image/admin/ashraf.jpg" class="team-mamber" alt="not support">
                                            </div>
                                            <div class="team-contact-text">
                                                <h3>Md. Ashraful</h3>
                                                <ul>
                                                    <li class="">Id: 143400015</li>
                                                    <li class="">Email: abc@gmail.com</li>
                                                    <li class="">phone: 01xxxxxxxx</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="team-contact-area">
                                            <div class="team-contact">
                                                <img src="image/admin/ahsan.png" class="team-mamber" alt="">
                                            </div>
                                            <div class="team-contact-text">
                                                <h3>Md. Ahsan ahmed</h3>
                                                <ul>
                                                    <li class="">Id: 143400016</li>
                                                    <li class="">Email: aa91898@gmail.com</li>
                                                    <li class="">phone: 01xxxxxxxx</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>									
                                    <div class="col-md-6 col-12">
                                        <div class="team-contact-area">
                                            <div class="team-contact">
                                                <img src="image/admin/prisly.jpg" class="team-mamber" alt="">
                                            </div>
                                            <div class="team-contact-text">
                                                <h3>Sharmin Prily</h3>
                                                <ul>
                                                    <li class="">Id: 143400036</li>
                                                    <li class="">Email: sarmin@gmail.com</li>
                                                    <li class="">phone: 01xxxxxxxx</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="team-contact-area">
                                            <div class="team-contact">
                                                <img src="image/admin/antu.png" class="team-mamber" alt="">
                                            </div>
                                            <div class="team-contact-text">
                                                <h3>Antu</h3>
                                                <ul>
                                                    <li class="">Id: 143400037</li>
                                                    <li class="">Email: Sohan@gmail.com</li>
                                                    <li class="">phone: 01xxxxxxxx</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							

						</div>	<!-- page-left end-->
					</div>	<!-- col-md-8 col-sm-6 col-xs-12 end-->
				</div> <!-- row end-->
			</div> <!-- page-area end-->
			
			
			
		</div> <!-- container end-->
	</section> <!-- content-section end-->
	
	
	

	
<?php require_once('include/blog_footer.php'); ?>
<?php } ?>