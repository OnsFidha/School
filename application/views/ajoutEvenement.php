<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
        <div class="card-body" >
                    <h4 > Ajouter un évènement</h4>   
                    <div class="row">
                <div class="col-xl">
                  <div class="button-wrapper">
                    <div class="card-body">      
                    <form id="form"  accept-charset="UTF-8" class="mb-3" action="<?php echo base_url('listeEvenement/add') ?>" method="POST">
                        <div class="mb-3 col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input 
                                type="text"
                                class="form-control"
                                id="nom"
                                name="nom"
                                value="<?php echo set_value('nom')?>"
                                autofocus
                            />
                            <small><?php echo form_error('nom'); ?></small>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateEvenement" class="form-label">Date d'évènement</label>
                            <input
                                type="date"
                                class="form-control"
                                id="dateEvenement"
                                name="dateEvenement"
                                value="<?php echo set_value('dateEvenement')?>"
                             
                                autofocus/>
                            <small><?php echo form_error('dateEvenement'); ?></small>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <textarea
                            type="text" cols="100" rows="4"
                                class="form-control"
                                id="description"
                                name="description"
                                value="<?php echo set_value('description')?>"
                                autofocus></textarea>
                       
                            <small><?php echo form_error('description'); ?></small>
                        </div>
                       
                        <div class="mb-3 col-md-6">
                            <label for="lieu" class="form-label">lieu</label>
                            <input
                                type="text"
                                class="form-control"
                                id="lieu"
                                name="lieu"
                                value="<?php echo set_value('lieu')?>"
                            
                                autofocus
                            /> <small><?php echo form_error('lieu'); ?></small>
                        </div>
                     
                        <div class="mb-3 col-md-6">
                            <label for="organisateur" class="form-label">Organisateur</label>
                            <input
                                type="text"
                                class="form-control"
                                id="organisateur"
                                name="organisateur"
                                value="<?php echo set_value('organisateur')?>"
                            
                                autofocus
                            /> <small><?php echo form_error('organisateur'); ?></small>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="avecInscri" class="form-label">obligation d'inscription</label></br>
                            <input class="form-check-input" name="avecInscri" type="hidden" value="0">
                            <input class="form-check-input" name="avecInscri" type="checkbox" id="switch" value="1" <?php echo set_checkbox('avecInscri', '1'); ?>>
                            <small><?php echo form_error('avecInscri'); ?></small>
                        </div>
                        <div class="mb-3 col-md-6" id="nbreMaxContainer" style="display: none;">
                            <label for="nbreMax" class="form-label">Nombre maximale des places</label>
                            <input
                                type="text"
                                class="form-control"
                                id="nbreMax"
                                name="nbreMax"
                                value="<?php echo set_value('nbreMax')?>"
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
                        </script>
                        <div class="mb-3 col-md-7">
                        <button class="btn btn-primary d-grid" type="submit">Créer</button>
                        </div></form>
                </div>
    </div>
    </div>
</div>