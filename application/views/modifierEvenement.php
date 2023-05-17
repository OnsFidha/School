<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
        <div class="card-body" >
            <h4 >Modifier évènement</h4>
            <div class="row">
                <div class="col-xl">
                  <div class="button-wrapper">
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <form action =" <?php echo base_url('listeEvenement/editer/'.$evenement->id)?> " method="POST" enctype="multipart/form-data">
                                <!-- nom --> 
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="nom">nom</label>
                                    <div class="nom">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nom"
                                        name="nom"
                                        value="<?php echo $evenement->nom; ?>"

                                    />
                                    </div>
                                    <small class="error"><?php echo form_error('nom') ?></small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="dateEvenement" class="form-label">Date d'évènement</label>
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="dateEvenement"
                                        name="dateEvenement"
                                        value="<?php echo $evenement->dateEvenement; ?>"
                                        autofocus/>
                                    <small><?php echo form_error('dateEvenement'); ?></small>
                                </div>
                                <!-- description --> 
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="descriptionId">description</label>
                                    <div class="descriptionId">
                                    <textarea cols="100" rows="4"
                                        type="text"
                                        class="form-control"
                                        id="descriptionId"
                                        name="description"
                                    ><?php echo $evenement->description; ?></textarea>
                                    </div>
                                    <small class="error"><?php echo form_error('description') ?></small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="lieu">Lieu</label>
                                    <div class="lieu">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="lieu"
                                        name="lieu"
                                        value="<?php echo $evenement->lieu; ?>"
                                    />
                                    </div>
                                    <small class="error"><?php echo form_error('lieu') ?></small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="organisateur">l'organisateur</label>
                                    <div class="organisateur">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="organisateur"
                                        name="organisateur"
                                        value="<?php echo $evenement->organisateur; ?>"
                                    />
                                    </div>
                                    <small class="error"><?php echo form_error('organisateur') ?></small>
                                </div>
                                <div class="mb-3 col-md-6">
                                <label for="avecInscri" class="form-label">Obligation d'inscription</label></br>
                                <input class="form-check-input" name="avecInscri" type="hidden" value="0">
                                <input class="form-check-input" name="avecInscri" type="checkbox" id="switch" value="1" <?php echo $evenement->avecInscri == 1 ? 'checked' : ''; ?>>
                                <small><?php echo form_error('avecInscri'); ?></small>
                                </div>
                                <div class="mb-3 col-md-6" id="nbreMaxContainer" <?php echo $evenement->avecInscri == 1 ? 'style="display: block;"' : 'style="display: none;"'; ?>>
                                <label for="nbreMax" class="form-label">Nombre maximale des places</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nbreMax"
                                    name="nbreMax"
                                    value="<?php echo $evenement->nbreMax; ?>"
                                    autofocus
                                />
                                <small><?php echo form_error('nbreMax'); ?></small>
                                </div>
                                <script>
                                    const checkbox = document.getElementById('switch');
                                    const nbreMaxContainer = document.getElementById('nbreMaxContainer');

                                    checkbox.addEventListener('change', function() {
                                        nbreMaxContainer.style.display = this.checked ? 'block' : 'none';
                                    });
                                    checkbox.dispatchEvent(new Event('change'));
                                </script><div class="mb-3 col-md-7">
                                <button class="btn btn-primary d-grid" type="submit" >Modifier</button>
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
