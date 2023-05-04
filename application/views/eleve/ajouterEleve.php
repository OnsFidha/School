<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
    <div class="card-body" >
    <h4 > Ajout d'un élève</h4>

                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                          <!-- <img
                            src="../assets/img/avatars/1.png"
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
                      <form action =" <?php echo base_url('eleve/store')?> " method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                        <div class="row">

                        <!-- eleve -->  

                          <!-- photo --> 
                          <div class="mb-3 col-md-6">
                                <label class="form-label" for="photoId">photo</label>
                                <div class="photoId">
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="photoId"
                                    name="photo"
                                    placeholder="photo"
                                  />
                                </div>
                                <small class="error"><?php echo form_error('photo') ?></small>
                          </div>

                          <!-- prenom --> 
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="prenomId">Prenom</label>
                            <div class="prenomId">
                              <input
                                type="text"
                                class="form-control"
                                id="prenomId"
                                name="prenom"
                                placeholder="Wiem"
                              />
                            </div>
                            <small class="error"><?php echo form_error('prenom') ?></small>
                          </div>

                          <!-- nom --> 
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="nomId">Nom</label>
                            <div class="prenomId">
                              <input
                                type="text"
                                id="nomId"
                                name="nom"
                                class="form-control"
                                placeholder="Dakhli"
                              />
                            </div>
                            <small class="error"><?php echo form_error('nom') ?></small>
                          </div>

                          <!-- sexe --> 
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="sexeId">sexe</label>
                            <select id="sexeId" name="sexe" class="form-select">
                                <option value="">--Sélectionnez--</option>
                                <option value="homme" >homme</option>
                                <option value="femme" >femme</option>                            
                              </select>
                            <small class="error"><?php echo form_error('sexe') ?></small>
                          </div>

                          <!-- adresse --> 
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="adresseId">adresse</label>
                            <div class="adresseId">
                              <input
                                type="text"
                                id="adresseId"
                                name="adresse"
                                class="form-control"
                                placeholder="20 Rue Saad Ghazela"
                              />
                            </div>
                            <small class="error"><?php echo form_error('adresse') ?></small>
                          </div>

                          <!-- date de naissance --> 
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="dateNaissanceId">date de Naissance</label>
                            <div class="prenomId">
                              <input
                                type="date"
                                id="dateNaissanceId"
                                name="dateNaissance"
                                class="form-control phone-mask"
                                placeholder="658 799 8941"
                              />
                            </div>
                            <small class="error"><?php echo form_error('dateNaissance') ?></small>
                          </div>

                          <!-- age --> 
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="ageId">age</label>
                            <div class="prenomId">
                              <input
                                type="number"
                                id="ageId"
                                name="age"
                                class="form-control phone-mask"
                                placeholder="6"
                              />
                            </div>
                            <small class="error"><?php echo form_error('age') ?></small>
                          </div>

                          <!-- classe --> 
                          <div class="mb-3 col-md-6">

                            <label class="form-label" for="classeId">Sélectionnez une classe</label>

                            <select id="classeId" name="id_classe" class="form-select">

                              <option value="">--Sélectionnez--</option>
                              <?php foreach ($classes as $classe): ?>

                                <option value="<?php echo $classe->id; ?>">
                                  <?php echo $classe->niveau." ".$classe->nom;  ?>
                                </option>

                              <?php endforeach; ?>  
                            </select>

                            <small class="error"><?php echo form_error('classe') ?></small>
                          </div>

                        <!-- dossier medical --> 

                        <!-- taille --> 
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="tailleId">taille</label>
                            <div class="tailleId">
                              <input
                                type="number"
                                id="tailleId"
                                name="taille"
                                class="form-control phone-mask"
                                placeholder="indiquer la taille de l'enfant en CM"
                              />
                            </div>
                            <small class="error"><?php echo form_error('taille') ?></small>
                        </div>

                        <!-- poids --> 
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="poidsId">poids</label>
                            <div class="poidsId">
                              <input
                                type="number"
                                id="poidsId"
                                name="poids"
                                class="form-control phone-mask"
                                placeholder="658 799 8941"
                              />
                            </div>
                            <small class="error"><?php echo form_error('poids') ?></small>
                        </div>

                        <!-- groupe sanguin --> 
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="groupeSanguinId">groupe sanguin</label>
                              <select id="groupeSanguinId" name="groupeSanguin" class="form-select">
                                <option value="">--Sélectionnez--</option>
                                <option value="A+" >A+</option>
                                <option value="A-" >A-</option>
                                <option value="B+" >B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                              </select> 
                            <small class="error"><?php echo form_error('groupeSanguin') ?></small>
                        </div> 

                        <!-- allergies --> 
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="allergiesId">allergies</label>
                            <div class="allergiesId">
                              <input
                                type="text"
                                id="allergiesId"
                                name="allergies"
                                class="form-control phone-mask"
                                placeholder="658 799 8941"
                              />
                            </div>
                            <small class="error"><?php echo form_error('allergies') ?></small>
                        </div> 

                        <!-- médicaments --> 
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="medicamentsId">medicaments</label>
                            <div class="medicamentsId">
                              <input
                                type="text"
                                id="medicamentsId"
                                name="medicaments"
                                class="form-control phone-mask"
                                placeholder="658 799 8941"
                              />
                            </div>
                            <small class="error"><?php echo form_error('medicaments') ?></small>
                        </div>

                        <!-- parent -->
                        <div class="mb-3 col-md-6">

                            <label class="form-label" for="parentId">Sélectionnez une parent</label>

                            <select id="parentId" name="id_parent" class="form-select">

                              <option value="">--Sélectionnez--</option>
                              <?php foreach ($parents as $parent): ?>

                                <option value="<?php echo $parent->id; ?>">
                                  <?php echo $parent->nom." ".$parent->prenom;  ?>
                                </option>

                              <?php endforeach; ?>  
                            </select>

                            <small class="error"><?php echo form_error('parent') ?></small>
                          </div>
                        <div class="mt-2">
                          <input type="submit" class="btn btn-primary" value="send" />
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

            
