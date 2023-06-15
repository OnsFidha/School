<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
        <div class="card-body" >
          <h4> Ajouter Enseignant</h4>
            <div class="card-body">
              <form id="formAccountSettings" action="<?php echo base_url('enseignant/ajout') ?>" enctype="multipart/form-data" method="POST">
                <div class="row">
                  <div class="mb-3 col-md-6">
                        <label class="form-label" for="photoId">photo</label>
                        <div class="photoId">
                          <input
                            type="file"
                            class="form-control"
                            id="photoId"
                            name="photo"
                            placeholder="photo"
                          />
                        </div>
                        <small class="error"><?php echo form_error('photo') ?></small>        
                    </div>
                      <div class="mb-3 col-md-6"> </div>
                  <div class="mb-3 col-md-6">
                    <label for="nom" class="form-label">nom</label>
                    <input
                      class="form-control"
                      type="text"
                      id="nom"
                      value="<?php echo set_value('nom')?>"
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
                      value="<?php echo set_value('prenom')?>"  />
                    <small><?php echo form_error('prenom'); ?></small>
                    </div>
                  <div class="mb-3 col-md-6">
                    <label for="cin" class="form-label">CIN</label>
                    <input
                      class="form-control"
                      type="text"
                      id="cin"
                      name="cin"
                      value="<?php echo set_value('cin')?>"
                  
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
                      value="<?php echo set_value('email')?>"
                      placeholder="john.doe@example.com"
                    />
                    <small><?php echo form_error('email'); ?></small>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="genre" class="form-label">Sexe</label><br>
                    <select name="genre" id="genre" class="select2 form-select" data-placeholder="--Sélectionner le genre">
                      <option value=""></option>
                      <option value="homme">Homme</option>
                      <option value="femme">Femme</option>
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
                        value="<?php echo set_value('telephone')?>"
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
                        value="<?php echo set_value('dateNaissance')?>">
                    <small><?php echo form_error('dateNaissance'); ?></small>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Type salaire</label><br>
                    <select id="typeSalaire" name="typeSalaire" data-placeholder="--Select le type" class="select2 form-select">
                        <option></option>
                        <?php foreach ($types as $row): ?>
                            <option value="<?php echo $row->id ?>" <?php if ($enseignant->typeSalaire == $row->id) echo 'selected' ?>><?php echo $row->type ?></option>
                        <?php endforeach; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $('#typeSalaire').select2({
                                theme: 'bootstrap',
                                minimumResultsForSearch: Infinity
                            });
                        });
                    </script>
                    <small><?php echo form_error('typeSalaire'); ?></small>
                  </div>
        
                  <div class="mb-3 col-md-6">
                    <label for="matiere" class="form-label">Matiéres</label>
                    <select name="matiere[]" id="matiere"  data-placeholder="--Sélectionner les matiéres" class="multiple-select form-select" multiple>
                      <option></option>
                        <?php foreach($matieres as $row):?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                        <?php endforeach; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                        $('#matiere').select2({
                              theme: 'bootstrap'
                        })
                        $('#genre').select2({
                              theme: 'bootstrap',
                              minimumResultsForSearch: Infinity
                        })
                   
                        });
                    </script>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="classe" class="form-label">Classes</label>
                    <select name="classe[]" id="classe" class="multiple-select form-select" multiple data-placeholder="--Sélectionner les classes">
                      <option ></option>
                      <?php foreach($classes as $row):?>
                          <option value="<?php echo $row->id ?>"> <?php echo $row->nom.'  '.$row->annee_Scolaire ?> </option>
                      <?php endforeach; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                    $('#classe').select2({
                              theme: 'bootstrap'
                        })
                        });
                    </script>
                  </div>
                  <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                    <button type="reset" class="btn btn-outline-secondary">annuler</button>
                  </div>
                </div>
              </form>
            </div>
              </br></br>
        </div>
    </div>
    </div>
</div>