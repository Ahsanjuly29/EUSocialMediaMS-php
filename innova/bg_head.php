<?php
    $bgquery = mysqli_query($db,"SELECT * FROM bg");
    $bgqueryassoc = mysqli_fetch_assoc($bgquery);
?>
<style>
.intro {
  display: table;
  width: 100%;
  padding: 0;
  background: url(img/<?= $bgqueryassoc['bg'];?>) center center no-repeat;
  background-color: #e5e5e5;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
}  
</style>
<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">

          <div class="col-md-8 col-md-offset-2 intro-text">
            <h1><?= $bgqueryassoc['bg_title'];?></h1>

            <p><?= $bgqueryassoc['bg_desc'];?></p>
            <!-- <div><?= $bgqueryassoc['bg_desc'];?></div> -->

            <a href="#about" class="btn btn-custom btn-lg page-scroll">Learn More</a> 
          </div>
        </div>
      </div>
    </div>
  </div>
</header>