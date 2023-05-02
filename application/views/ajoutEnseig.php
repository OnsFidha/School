<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
    <h4 class="fw-bold py-3 mb-4 text-center"> Ajouter Enseignant</h4>
                  <div class="card-body">
                    <div class="card-body">
                      <form id="formAccountSettings" action="<?php echo base_url('enseignant/ajouter') ?>" method="POST">
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
                            <label for="genre" class="form-label">Sexe</label>
                            <select name="genre" id="genre" class="select2 form-select">
                              <option value="">--select le genre</option>
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
                            <label for="salaire" class="form-label">Salaire</label>
                            <input
                              type="text"
                              class="form-control"
                              id="salaire"
                              name="salaire"
                              placeholder="231465"
                              maxlength="12"
                              value="<?php echo set_value('salaire')?>">
                                <small><?php echo form_error('salaire'); ?></small>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Type salaire</label>
                            <select id="typeSalaire" name="typeSalaire"   data-placeholder="--Select le type--" class="select2 form-select">
                              <option></option>
                              <option value="menseul">Menseul</option>
                              <option value="horaire">Horaire</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                $('#typeSalaire').select2({
                                     theme: 'bootstrap',
                                     minimumResultsForSearch: Infinity
                                })
                                });
                            </script>
                            <small><?php echo form_error('typeSalaire'); ?></small>
                          </div>
                          <!-- <div class="mb-3 col-md-6">
                            <label for="club" class="form-label">responsabe de club</label>
                            <select name="idClub" id="club" class="select2 form-select">
                              <option value="">--Select club</option>
                              <option value="1">club1</option>
                             
                            </select>
                          </div>-->
                          <div class="mb-3 col-md-6">
                            <label for="matiere" class="form-label">Matiéres</label>
                            <select name="matiere[]" id="matiere"  data-placeholder="-- Select matiéres --" class="multiple-select form-select" multiple>
                              <option></option>
                                <?php foreach($matieres as $row): ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
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
                          <!--
                          <div class="mb-3 col-md-6">
                            <label for="classe" class="form-label">Classes</label>
                            <select name="idClasse" id="classe" class="select2 form-select">
                              <option value="">--Select classes</option>
                              <option value="1">club1</option>
                        
                            </select>
                          </div> -->
                          <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                            <button type="reset" class="btn btn-outline-secondary">annuler</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
</br></br></div>
    </div>
</div>