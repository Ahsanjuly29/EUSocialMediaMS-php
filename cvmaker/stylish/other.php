<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user_id'])){
	
	header("location: ../sign_in.php");
}
else{
?>
<?php require_once('style_head.php');?>	
<!--
				<div class="main-body">		
					<h3>My Works</h3>
					<div class="row">
						<div class="col-sm-3">
							<div>
								<p>technical skills</p>
							</div>
						</div>
						<div class="col-sm-9">
							<div>
								<p>
									"UI design (HTML, CSS, JavaScript, AJAX and JQuery), Magento, PHP and Laravel".
								</p>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div>
								<p>Soft Skills</p>
							</div>
						</div>
						<div class="col-sm-9">
							<div>
								<p>
									"Comprehensive Skills, Personal Effectiveness, Body Language, Team player, Strategic Planning, Presentation Skills, Public Speaking, Interview Skills, Email Etiquette, Grooming".
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		-->	
<?php require_once('style_right_side_bar.php');?>	
<?php require_once('style_footer.php');?>	
<?php } ?>