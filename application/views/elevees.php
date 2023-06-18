<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
      <div class="card-body" >
          <h5 class="card-header">La liste des élèves</h5>
          <div class="row mb-5 text-center">
                        <?php
                        foreach ($enfants as $enfant) {
                        ?>  
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $enfant['prenom']." ".$enfant['nom'];?></h5>
                                </div>
                                <div style="text-align: center;">
                                <?php  if ($enfant['photo']): ?>
                                    <img style='width:105px;height:105px'src="data:image;base64,<?php echo $enfant['photo']; ?>" alt="Photo">
                                <?php endif; ?>  
                                </div> 
                           <br>
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