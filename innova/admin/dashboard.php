<?php require_once('include/head.php');?>
<?php require_once('include/session.php');?>

<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 
<!-- 			<div style="display: block;">
			    <div>
			      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
			      <p>A free and open source Bootstrap 4 admin template</p>
			    </div>
			    <ul class="app-breadcrumb breadcrumb">
			      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			    </ul>
			</div> -->

<?php
        $fetch_data = "SELECT * FROM bg WHERE bg_id ='1'";
        $execute_query = mysqli_query($db,$fetch_data);
        $assoc = mysqli_fetch_assoc($execute_query);	
?>
<style>
	.testimonial{
	  /*height: 180px;*/
	  height: 100%;	  
	  padding: 10px;
	  background-color:rgba(255,255,255,0.82);
	  overflow:hidden;
	  display: block;
	}
	.testimonial img{
		display: block;
	    position:absolute;
	    z-index:0;
/*	    width: 35%;
	    height:55%;
*/      width: 720px;
      height:480px;
	    margin:-10px;
	    background-image: url('../img/<?php echo $assoc['bg'];?>');
	    background-size: cover;
	    background-position: center center ;
	    background-repeat: no-repeat;
	}
	.testimonial content{
	    position:relative;
	    z-index:1;
	}
</style>

<div class="container">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <section class="testimonial py-0" id="testimonial">
      <img src="" height="" id="previmg">

          <div class="container content">
              <div class="row ">
                  <div class="col-md-12 py-5 border">
                      <h4 class="py-2" style="background: rgba(255,255,255,0.3); border-radius: 10px; text-align: center;"> Please fill Header Background details</h4>
                       <?php
                          if(isset($_SESSION['Success_msg'])) {
                             echo "<h5 class='pt-1 text-danger text-center' style='background: rgba(255,255,255,0.3);' >".$_SESSION['Success_msg']."</h5>";
                             unset($_SESSION['Success_msg']);
                          }
                        ?> 
                      <form class="" action="update_bg_post.php" method="POST" enctype="multipart/form-data">
                          <div class="form-row">
                              <div class="form-group col-md-8">
                                  <label class="control-label">Title</label>
                                  <input type="text" class="form-control" name="title" id="title" type="text" placeholder="type your title" value="<?php echo $assoc['bg_title'];?>" autofocus />
                                    <?php
                                      if(isset($_SESSION['title_msg'])) {
                                         echo "<p class='pt-1 text-danger text-center'>".$_SESSION['title_msg']."</p>";
                                         unset($_SESSION['title_msg']);
                                      }
                                    ?>   
                              </div>
                              <div class="form-group col-md-4">
                                   <label class="control-label">Service Image</label>
                                   <input id="image" name="image" class="form-control" type="file" onchange="document.getElementById('previmg').src = window.URL.createObjectURL(this.files[0])">
                                  <?php
                                      if(isset($_SESSION['img_msg'])) {
                                         echo "<p class='pt-1 text-danger text-center'>".$_SESSION['img_msg']."</p>";
                                         unset($_SESSION['img_msg']);
                                      }
                                    ?> 
                              </div>
                          </div>    
                          <div class="form-row">
                              <!-- <div class="form-group col-md-1"></div> -->
                              <div class="form-group col-md-11">
                                  <label class="control-label">Service Details</label>
                                  <textarea id="editor1" name="bg_desc" cols="40" rows="" placeholder="Description" class="form-control"><?php echo $assoc['bg_desc'];?></textarea>
                                  <?php
                                      if(isset($_SESSION['details_msg'])) {
                                         echo "<p class='pt-1 text-danger text-center'>".$_SESSION['details_msg']."</p>";
                                         unset($_SESSION['details_msg']);
                                      }
                                    ?> 
                              </div>
                              <div class="form-group col-md-1"></div>
                          </div>
                          <div class="form-row">
                              <button class="btn btn-danger btn-block" name="add_bg">
                              <i class="fa fa-sign-in fa-lg fa-fw"> Update BG </i>
                              </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </section>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>
<?php require_once('include/footer.php');?>