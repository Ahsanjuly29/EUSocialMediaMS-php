<!-- Gallery Section -->
<div id="portfolio">
  <div class="container">
    <div class="section-title">
      <h2>Our Works</h2>
    </div>
    <div class="row">
      <div class="portfolio-items">
        <?php 
          $query = mysqli_query($db,"SELECT * FROM projects");
          foreach ($query as $value) {
        ?> 
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/<?= $value['pro_img'];?>" title="Project Title" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4><?= $value['pro_title'];?></h4>
              </div>
              <img src="img/portfolio/<?= $value['pro_img'];?>" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <?php 
          }
        ?>
      </div>
    </div>
  </div>
</div>