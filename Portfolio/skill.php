<div class="row margin-top-80">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="section-title wow zoomIn" data-wow-delay="0.2s">
        <span class="title-bg">skills</span>
       <h2>
           <span class="first-part">my</span>
           <span class="second-part">skills</span>
          </h2>
       </div>
   </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="skills">
        <?php 
            $fetch_count_data = "SELECT COUNT(skill_id) as total  FROM skills";
            $execute_count_query = mysqli_query($db,$fetch_count_data);
            $count = mysqli_fetch_assoc($execute_count_query);
            $number = $count['total'];
            $i=1;
            while($i <= $number){
                if($i % 2 != 0){
                    $id = $i;
                    $fetch_data = "SELECT * FROM skills WHERE skill_id='$id'";
                    $execute_query = mysqli_query($db,$fetch_data);
                    foreach ($execute_query  as $skills) {
        ?>
            <div class="single-skill">  
                <div class="skill-info">
                    <h4><?= $skills['title']?></h4>
                </div>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?= $skills['percent']?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $skills['percent']?>%;"><span><?= $skills['percent']?>%</span></div>
                </div>
            </div>
        <?php   
                 }
             }$i++;  
            }
        ?>
        </div>
    </div>


    <div class="col-md-6">
        <div class="skills">
        <?php 
            $fetch_count_data = "SELECT COUNT(skill_id) as total  FROM skills";
            $execute_count_query = mysqli_query($db,$fetch_count_data);
            $count = mysqli_fetch_assoc($execute_count_query);
            $number = $count['total'];
            $i=1;
            while($i <= $number){
                if($i % 2 == 0){
                    $id = $i;
                    $fetch_data = "SELECT * FROM skills WHERE skill_id='$id'";
                    $execute_query = mysqli_query($db,$fetch_data);
                    foreach ($execute_query  as $skills) {
        ?>
            <div class="single-skill">  
                <div class="skill-info">
                    <h4><?= $skills['title']?></h4>
                </div>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?= $skills['percent']?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $skills['percent']?>%;"><span><?= $skills['percent']?>%</span></div>
                </div>
            </div>
        <?php   
                 }
             }$i++;  
            }            
        ?>
		</div>
	</div>	
</div>