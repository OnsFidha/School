<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
    <div class="card-body" >
    <h4 > Edit élève</h4>
          <form action ="<?php echo base_url('eleve/update/'.$eleve->id)?>" method="POST">
           <div class="card-body">
            <div class="row">
              <div class="mb-3 col-md-6">
                    <label class="form-label" for="photoId">photo</label>
                    <div class="photoId">
                      <input
                        type="text"
                        class="form-control"
                        id="photoId"
                        name="photo"
                        placeholder="photo"
                        value="<?php echo $eleve->photo; ?>"
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
                    value="<?php echo $eleve->prenom; ?>"
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
                    value="<?php echo $eleve->nom; ?>"
                  />
                </div>
                <small class="error"><?php echo form_error('nom') ?></small>
              </div>
              <!-- sexe --> 
              <div class="mb-3 col-md-6">
                <label class="form-label" for="sexeId">sexe</label>
                <select id="sexeId" name="sexe" class="form-select">
                    <option value="">--Sélectionnez--</option>
                    <option value="homme" <?php echo ($eleve->sexe == 'homme') ? 'selected' : ''; ?>>homme</option>
                    <option value="femme" <?php echo ($eleve->sexe == 'femme') ? 'selected' : ''; ?>>femme</option>                            
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
                    value="<?php echo $eleve->adresse; ?>"
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
                    value="<?php echo $eleve->dateNaissance; ?>"
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
                    value="<?php echo $eleve->age; ?>"
                  />
                </div>
                <small class="error"><?php echo form_error('age') ?></small>
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
                      value="<?php echo $dossier->taille; ?>"
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
                      value="<?php echo $dossier->poids; ?>"
                    />
                  </div>
                  <small class="error"><?php echo form_error('poids') ?></small>
              </div>
              <!-- groupe sanguin --> 
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="groupeSanguinId">groupe sanguin</label>
                    <select id="groupeSanguinId" name="groupeSanguin" class="form-select">
                      <option value="">--Sélectionnez--</option>
                      <option value="A+" <?php echo ($dossier->groupeSanguin == 'A+') ? 'selected' : ''; ?>>A+</option>
                      <option value="A-" <?php echo ($dossier->groupeSanguin == 'A-') ? 'selected' : ''; ?>>A-</option>
                      <option value="B+" <?php echo ($dossier->groupeSanguin == 'B+') ? 'selected' : ''; ?>>B+</option>
                      <option value="B-" <?php echo ($dossier->groupeSanguin == 'B-') ? 'selected' : ''; ?>>B-</option>
                      <option value="AB+" <?php echo ($dossier->groupeSanguin == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                      <option value="AB-" <?php echo ($dossier->groupeSanguin == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                      <option value="O+" <?php echo ($dossier->groupeSanguin == 'O+') ? 'selected' : ''; ?>>O+</option>
                      <option value="O-" <?php echo ($dossier->groupeSanguin == 'O-') ? 'selected' : ''; ?>>O-</option>
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
                      value="<?php echo $dossier->allergies; ?>"
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
                      value="<?php echo $dossier->medicaments; ?>"
                    />
                  </div>
                  <small class="error"><?php echo form_error('medicaments') ?></small>
              </div>
              <!-- parent --> 
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="parentId">Sélectionnez une parent</label>
                  <select id="parentId" name="id_parent" class="form-select">
                      <option value="<?php echo $parent->id; ?>">
                        <?php echo $parent->nom." ".$parent->prenom; ?>
                      </option>                              
                      <?php foreach ($parents as $parent): ?>
                      <option value="<?php echo $parent->id; ?>">
                        <?php echo $parent->nom." ".$parent->prenom;  ?>
                      </option>
                    <?php endforeach; ?>  
                  </select>
                  <small class="error"><?php echo form_error('parent') ?></small>
              </div>
              <!-- classe --> 
              <div class="mb-3 col-md-6">
                <label class="form-label" for="classeId">Sélectionnez un classe</label>
                <select id="classeId" name="id_classe" class="form-select">
                  <option value="<?php echo $classe->id; ?>">
                    <?php echo $classe->niveau." ".$classe->nom; ?>
                  </option>
                  <?php foreach ($classes as $classe): ?>
                    <option value="<?php echo $classe->id; ?>">
                      <?php echo $classe->niveau." ".$classe->nom;  ?>
                    </option>
                  <?php endforeach; ?>  
                </select>
                <small class="error"><?php echo form_error('classe') ?></small>
              </div>
              <div class="mt-2">
              <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </div>
           </div> 
          </form>
            
        </div>
    </div>
    </div>
</div>
