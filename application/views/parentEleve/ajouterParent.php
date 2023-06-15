<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
        <div class="card-body" >
            <h4> Ajouter Parent</h4>
              <div class="row">
                <div class="col-xl">
                  <div class="button-wrapper">
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <form action =" <?php echo base_url('parent/ajouter')?> " method="POST" enctype="multipart/form-data">
                              <div class="card-body">
                                <div class="row">
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
                                    <div class="nomId">
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
                                  <!-- cin --> 
                                  <div class="mb-3 col-md-6">
                                    <label class="form-label" for="cinId">cin</label>
                                    <div class="cinId">
                                      <input
                                        type="number"
                                        id="cinId"
                                        name="cin"
                                        class="form-control"
                                        placeholder="14510957"
                                      />
                                    </div>
                                    <small class="error"><?php echo form_error('cin') ?></small>
                                  </div>
                                  <!-- telephone --> 
                                  <div class="mb-3 col-md-6">
                                    <label class="form-label" for="telephoneId">telephone</label>
                                    <div class="telephoneId">
                                      <input
                                        type="number"
                                        id="telephoneId"
                                        name="telephone"
                                        class="form-control"
                                        placeholder="55550261"
                                      />
                                    </div>
                                    <small class="error"><?php echo form_error('telephone') ?></small>
                                  </div>
                                  <!-- email --> 
                                  <div class="mb-3 col-md-6">
                                    <label class="form-label" for="emailId">email</label>
                                    <div class="emailId">
                                      <input
                                        type="text"
                                        id="emailId"
                                        name="email"
                                        class="form-control"
                                        placeholder="exemple@gmail.com"
                                      />
                                    </div>
                                    <small class="error"><?php echo form_error('email') ?></small>
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
                                    <div class="dateNaissanceId">
                                      <input
                                        type="date"
                                        id="dateNaissanceId"
                                        name="dateNaissance"
                                        class="form-control phone-mask"
                                      
                                      />
                                    </div>
                                    <small class="error"><?php echo form_error('dateNaissance') ?></small>
                                  </div>
                             
                                  <div class="mt-2">
                                    <input type="submit" class="btn btn-primary" value="Ajouter" />
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
    </div>
    </div>
</div>

