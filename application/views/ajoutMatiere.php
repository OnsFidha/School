<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<meta charset="UTF-8"><script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " style='width:750px'>
                <div class="card-body" >
    <h4 class="fw-bold py-3 text-center " > Ajouter une matiére</h4>
   
                                           
                <form id="form"  accept-charset="UTF-8" class="mb-3" action="<?php echo base_url('listeMatieres/add') ?>" method="POST">
                <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nom"
                            name="nom"
                            value="<?php echo set_value('nom')?>"
                            placeholder="saisir votre nom"
                            autofocus
                        />
                        <small><?php echo form_error('nom'); ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="coefficient" class="form-label">Coefficient</label>
                        <input
                            type="number"
                            class="form-control"
                            step="0.01"
                            id="coefficient"
                            name="coefficient"
                            value="<?php echo set_value('coefficient')?>"
                            placeholder="saisir la coefficient"
                            autofocus
                        /> <small><?php echo form_error('coefficient'); ?></small>
                        <div class="mb-3">
                        <label for="email" class="form-label">nombre d'heure</label>
                        <input
                            type="number"
                            class="form-control"
                            id="nombre_heures"
                            name="nombre_heures"
                            value="<?php echo set_value('nombre_heures')?>"
                            placeholder="saisir le nombre d'heure"
                            autofocus
                        /> <small><?php echo form_error('nombre_heures'); ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="regroupement" class="form-label">le regroupement</label>
                        <input
                            type="text"
                            class="form-control"
                            id="regroupement"
                            name="regroupement"
                            value="<?php echo set_value('regroupement')?>"
                           
                            autofocus
                        /> <small><?php echo form_error('nombre_heures'); ?></small>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="niveau" class="form-label">niveau scolaire</label>
                        <input
                            type="text"
                            class="form-control"
                            id="niveau"
                            name="niveau"
                            value="<?php echo set_value('niveau')?>"
                           
                            autofocus
                        /> <small><?php echo form_error('niveau'); ?></small>
                    </div> -->
                    
                    <button class="btn btn-primary d-grid " type="submit">Créer</button>
                    </div>
                </form>
                </div>
            </div>
    </div>
</div>