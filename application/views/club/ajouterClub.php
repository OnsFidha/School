<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
    <div class="card-body" >
      <h4>Ajout club</h4>
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                 
                  <div class="button-wrapper">
                            <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                      <form action =" <?php echo base_url('club/ajouter')?> " method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                        <div class="row">

                        <!-- nom --> 
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="nomId">nom</label>
                            <div class="nomId">
                              <input
                                type="text"
                                class="form-control"
                                id="nomId"
                                name="nom"
                                placeholder="Wiem"
                              />
                            </div>
                            <small class="error"><?php echo form_error('nom') ?></small>
                          </div>
                          
                          <!-- description --> 
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="descriptionId">description</label>
                            <div class="descriptionId">
                              <input
                                type="text"
                                class="form-control"
                                id="descriptionId"
                                name="description"
                                placeholder="Wiem"
                              />
                            </div>
                            <small class="error"><?php echo form_error('description') ?></small>
                          </div>

                          <!-- photo --> 
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="photoId">photo</label>
                            <div class="photoId">
                              <input
                                type="text"
                                class="form-control"
                                id="photoId"
                                name="photo"
                                placeholder="Wiem"
                              />
                            </div>
                            <small class="error"><?php echo form_error('photo') ?></small>
                          </div>

                          <!-- enseignant --> 
                          <div class="mb-3 col-md-6">

                            <label class="form-label" for="enseignantId">Chef du Club</label>

                            <select id="enseignantId" name="enseignantId" class="form-select">
                            <option value="">--Sélectionnez--</option>

                              <?php foreach ($enseignants as $enseignant): ?>

                                <option value="<?php echo $enseignant->id; ?>">
                                  <?php echo $enseignant->prenom." ".$enseignant->nom;  ?>
                                </option>

                              <?php endforeach; ?>  
                            </select>

                            <small class="error"><?php echo form_error('enseignant') ?></small>
                          </div>
                        <div class="mt-2">
                          <input type="submit" class="btn btn-primary" value="Créer" />
                          <!-- <a href="<?php echo base_url('eleve/consulter/'.$row->id)?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a> -->
                          </div>
                        </div>
                       </div> 
                      </form>
</div>
</div>
</div>
</div>
