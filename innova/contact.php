<!-- Contact Section -->
<div id="contact">
  <div class="container">
    <div class="col-md-8">
      <div class="row">
        <div class="section-title">
          <h2>Get In Touch</h2>
          <p>Please fill out the form below to send us an email and we will get back to you as soon as possible.</p>
        </div>
        <form action="contact_post.php" name="sentMessage" id="contactForm" method="post" novalidate>
          <div class="row">
            <?php
              // session_start();
              if(isset($_SESSION['mail_msg'])) {
                 echo "<h5 class='pt-1 text-warning text-center'>".$_SESSION['mail_msg']."</h5>";
                 unset($_SESSION['mail_msg']);
              }
            ?>            
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea name="message" id="message" name="message" class="form-control" rows="4" placeholder="Message" required></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
        </form>
      </div>
    </div>
    <div class="col-md-3 col-md-offset-1 contact-info">
<?php 
    $contquery = mysqli_query($db,"SELECT * FROM contact");
    $contqueryassoc = mysqli_fetch_assoc($contquery);
?>

      <div class="contact-item">
        <h4>Contact Info</h4>
        <p><span>Address</span><?= $contqueryassoc['con_address'];?></p>
      </div>
      <div class="contact-item">
        <p><span>Phone</span> <?= $contqueryassoc['con_mob'];?></p>
      </div>
      <div class="contact-item">
        <p><span>Email</span> <?= $contqueryassoc['con_email'];?></p>
      </div>


    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="social">
          <ul>
          <?php 
              $socialquery = mysqli_query($db,"SELECT * FROM social");
              foreach ($socialquery as $socialqueryassoc) {
          ?>
            <li><a href="<?= $socialqueryassoc['social_link'];?>"><i class="<?= $socialqueryassoc['icon_link'];?>"></i></a></li>
          <?php 
              }
          ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>