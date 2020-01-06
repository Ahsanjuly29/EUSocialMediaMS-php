<!-- Services Section -->
<div id="services">
  <div class="container">
    <div class="section-title">
      <h2>Our Services</h2>
    </div>
    <div class="row">
<?php 
  $query = mysqli_query($db,"SELECT * FROM service");
  foreach ($query as $value) {
?>      
      <div class="col-md-4">
        <div class="service-media"><img src="img/services/<?= $value['ser_img'];?>" alt=" "> </div>
        <div class="service-desc">
          <h3><?= $value['ser_title']; ?></h3>
          <p><?= $value['ser_details']; ?></p>
        </div>
      </div>
<?php   
  }
?>      
  </div>
</div>