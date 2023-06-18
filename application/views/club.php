<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
      <div class="card-body" >
          <h5 class="card-header">Mon club</h5>
          <div class="row mb-5 text-center">
                <?php
                foreach ($club as $enfant) {
                ?>  
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $enfant->nom?></h5>
                        </div>
                    <p><?php echo $enfant->description;?></p>
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