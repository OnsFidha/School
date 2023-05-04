<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto ">
    <div class="card-body" >
      <h4>Modifier Enseignant</h4>
      <br>
        <form id="formAccountSettings" action="<?php echo base_url('listeEnseignants/editer/'.$enseignant->id) ?>" method="POST">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <div class="button-wrapper">
              <label for="photo" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input
                  type="file"
                  id="photo"
                  name="photo"
                  class="account-file-input"
                  accept="image/png, image/jpeg"
                /> <small><?php echo form_error('photo'); ?></small>
                </label>
              <p class="text-muted mb-0"> JPG, GIF ou PNG. Max 800K</p>
            </div>
          </div>
          <div class="row">
              <div class="mb-3 col-md-6">
                <label for="nom" class="form-label">nom</label>
                <input
                  class="form-control"
                  type="text"
                  id="nom"
                  value="<?php echo $enseignant->nom; ?>"
                  name="nom"
                  autofocus
                />
                <small><?php echo form_error('nom'); ?></small>
              </div>
              <div class="mb-3 col-md-6">
                <label for="Prenom" class="form-label">Prenom</label>
                <input class="form-control"
                  type="text" name="prenom" 
                  id="Prenom" 
                  value="<?php echo $enseignant->prenom; ?>"  />
                <small><?php echo form_error('prenom'); ?></small>
              </div>
              <div class="mb-3 col-md-6">
                <label for="cin" class="form-label">CIN</label>
                <input
                  class="form-control"
                  type="text"
                  id="cin"
                  name="cin"
                  value="<?php echo $enseignant->cin;?>"
              
                />
                <small><?php echo form_error('cin'); ?></small>
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input
                  class="form-control"
                  type="text"
                  id="email"
                  name="email"
                  value="<?php echo $enseignant->email;?>"
                  placeholder="john.doe@example.com"
                />
                <small><?php echo form_error('email'); ?></small>
              </div>
              <div class="mb-3 col-md-6">
                <label for="genre" class="form-label">Genre</label>
                <select name="genre"  id="genre" class="select2 form-select">
                  <option value="">--select le genre</option>
                  <option value="homme" <?php if ($enseignant->genre == 'homme') { echo 'selected'; }?> >Homme</option>
                  <option value="femme"<?php if ($enseignant->genre == 'femme') { echo 'selected'; }?> >Femme</option>
                </select>
                <small><?php echo form_error('genre'); ?></small>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="telephone">Télèphone</label>
                <div class="input-group input-group-merge">
                  <input
                    type="number"
                    id="telephone"
                    name="telephone"
                    value="<?php echo $enseignant->telephone;?>"
                    class="form-control"
                    maxlength ="8"
                    placeholder="20 555 011"
                  /> 
                </div> <small><?php echo form_error('telephone'); ?></small>
              </div>
              <div class="mb-3 col-md-6">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text"
                    class="form-control" 
                    value="<?php echo $enseignant->adresse;?>"
                    id="adresse" name="adresse"
                    placeholder="Adresse" />
                <small><?php echo form_error('adresse'); ?></small>
              </div>
              <div class="mb-3 col-md-6">
                <label for="state" class="form-label">Date de naissance</label>                         
                <input class="form-control" 
                    type="date"
                    name="dateNaissance"
                    id="dateNaissnace" 
                    value="<?php echo $enseignant->dateNaissance?>">
                <small><?php echo form_error('dateNaissance'); ?></small>
              </div>
              <div class="mb-3 col-md-6">
                <label for="salaire" class="form-label">Salaire</label>
                <input
                  type="text"
                  class="form-control"
                  id="salaire"
                  name="salaire"
                  placeholder="231465"
                  maxlength="12"
                  value="<?php echo $enseignant->salaire?>">
                    <small><?php echo form_error('salaire'); ?></small>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="country">Type salaire</label>
                <select id="typeSalaire" name="typeSalaire" class="select2 form-select">
                  <option value="">--select le type</option>
                  <option value="menseul" <?php if ($enseignant->typeSalaire == 'menseul') { echo 'selected'; }?>>Menseul</option>
                  <option value="horaire" <?php if ($enseignant->typeSalaire == 'horaire') { echo 'selected'; }?> >Horaire</option>
                </select>
                <small><?php echo form_error('typeSalaire'); ?></small>
              </div>
              <!-- <div class="mb-3 col-md-6">
                <label for="club" class="form-label">responsabe de club</label>
                <select name="idClub" value='<?php echo $enseignant->idClub?>' id="club" class="select2 form-select">
                  <option value="">--Select club</option>
                  <option value="1">club1</option>
                  
                </select>
                </div>                       
                <div class="mb-3 col-md-6">
                  <label for="matiere" class="form-label">Matiéres</label>
                  <select name="matiere[]" id="matiere"  data-placeholder="-- Select matiéres --" class="multiple-select form-select" multiple>
                    <option></option>
                    <?php foreach($matieres as $row): ?>
                      
                      <?php if (in_array($row->id, $selected->id)) : ?>
                          <option value="<?php echo $row->id ?>" selected><?php echo $row->nom ?></option>
                      <?php else: ?>
                          <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                      <?php endif; ?>
                  <?php endforeach; ?>
                  </select>
                  <script>
                      $(document).ready(function() {
                      $('#matiere').select2({
                          theme: 'bootstrap'
                      })
                      });
                  </script>
                </div>
              -->
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">modifier</button>
              <!-- <button type="reset" class="btn btn-outline-secondary">annuler</button> -->
            </div>
        </form>
    </div>
    </div>
    </div>
</div>