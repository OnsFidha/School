
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Modifier Club</h5>
                      <small class="text-muted float-end">Merged input group</small>
                    </div>

                    <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                          <!-- <img
                            src="../../assets/img/avatars/1.png"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="uploadedAvatar"
                          /> -->
                          <div class="button-wrapper">
                          <!-- <form method="post" action="<?php echo base_url('eleve/upload'); ?>" enctype="multipart/form-data">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                              <span class="d-none d-sm-block">Upload new photo</span>
                              <i class="bx bx-upload d-block d-sm-none"></i>
                              <input
                                type="file"
                                id="upload"
                                name="image"
                                hidden
                                class="account-file-input"
                              />
                            </label>
                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            <input type="submit" value="Upload" />
                          </div>
                        </div>
                      </form> -->
                      <form action =" <?php echo base_url('club/modifier/'.$club->id)?> " method="POST" enctype="multipart/form-data">
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
                                value="<?php echo $club->nom; ?>"

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
                                value="<?php echo $club->description; ?>"
                              />
                            </div>
                            <small class="error"><?php echo form_error('description') ?></small>
                          </div>

                          <!-- photo --> 
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="photoId">photo</label>
                            <div class="photoId">
                              <input
                                type="file"
                                class="form-control"
                                id="photoId"
                                name="photo"
                                placeholder="Wiem"
                                value="<?php echo $club->photo; ?>"
                              />
                            </div>
                            <small class="error"><?php echo form_error('photo') ?></small>
                          </div>

                          <!-- enseignant --> 

                          <div class="mb-3 col-md-6">

                            <label class="form-label" for="enseignantId">Chef du Club</label>

                            <select id="enseignantId" name="enseignantId" class="form-select">
                                <option value="<?php echo $enseignant->id; ?>">
                                    <?php echo $enseignant->prenom." ".$enseignant->nom;  ?>
                                </option>
                            
                              <?php foreach ($enseignants as $enseignant): ?>
                                <option value="<?php echo $enseignant->id; ?>">
                                  <?php echo $enseignant->prenom." ".$enseignant->nom;  ?>
                                </option>

                              <?php endforeach; ?>  
                            </select>

                            <small class="error"><?php echo form_error('enseignant') ?></small>
                          </div>
                        <div class="mt-2">
                          <input type="submit" class="btn btn-primary" value="Modifier"/>
                          </div>
                        </div>
                       </div> 
                      </form>


                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </div>
            <!-- / Content -->

            

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
