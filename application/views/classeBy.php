<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
      <div class="card-body" >
          <h5 class="card-header">La liste de mes classes</h5>
          <div class="row mb-5 text-center">
                <?php
                foreach ($classe as $enfant) {
                ?>  
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $enfant->nom?></h5>
                        </div>
                    <p><?php echo $enfant->niveau;?></p>
                    <p><?php echo $enfant->annee_Scolaire;?></p>
                        <div class="card-body">
                            <!-- <p class="card-text">Bear claw sesame snaps gummies chocolate.</p> -->
                            <a href="<?php echo base_url('eleveby/'.$enfant->id)?>" class="card-link">Elèves</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?> 
        </div>
      </div>
    </div>
    </div>
</div>