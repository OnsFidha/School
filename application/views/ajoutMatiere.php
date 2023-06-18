
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " style='width:750px'>
                <div class="card-body" >
                    <h4 class=" text-center " > Ajouter une matiére</h4>                    
                    <form id="form"  enctype="multipart/form-data" class="mb-3" action="<?php echo base_url('listeMatieres/add') ?>" method="POST">
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
                        </div>
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
                        <div class="mb-3 ">
                            <label for="regroupement" class="form-label">Matière</label>
                            <select class="form-select" id="regroupement" name="regroupement">
                                <option></option>
                                <option value="العلوم والتكنولوجيا">العلوم والتكنولوجيا</option>
                                <option value="مجال التنشئة">مجال التنشئة</option>
                                <option value="اللغة العربية">اللغة العربية</option>
                                <option value="Français">Français</option>
                                <option value="Anglais">Anglais</option>
                            </select>
                        </div>
                        <script>
                                    $(document).ready(function() {
                                    $('#regroupement').select2({
                                        theme: 'bootstrap',
                                        minimumResultsForSearch: Infinity
                                    })
                                    });
                                </script>
                        <div class="mb-3">
                            <label for="fiche_matiere" class="form-label">fiche matiére </label>
                            <input
                                type="file"
                                class="form-control"
                                id="fiche_matiere"
                                name="fiche_matiere"
                                value="<?php echo set_value('fiche_matiere')?>"
                            
                                autofocus
                            /> <small><?php echo form_error('fiche_matiere'); ?></small>
                        </div>
                        <!-- <div class="mb-3">
                        <label for="niveau" class="form-label">Niveau scolaire</label>
                        <select  class="select2 form-control" data-placeholder="--choisir un niveau--"  name="niveau" id="niveau" >
                                <option></option>  
                                <option value="préscolaire">préscolaire</option>
                                <option value="1 ére">1 ére</option>
                                <option value="2 éme">2 éme</option>
                                <option value="3 éme">3 éme</option>
                                <option value="4 éme">4 éme</option>
                                <option value="5 éme">5 éme</option>
                                <option value="6 éme">6 éme</option>    
                        </select>
                            <script>
                                $(document).ready(function() {
                                $('#niveau').select2({
                                    theme: 'bootstrap'
                                })
                                });
                            </script>
        
                        <small><?php echo form_error('niveau'); ?></small>
                        </div> -->
                        
                        <button class="btn btn-primary d-grid " type="submit">Créer</button>
                    </form>
                </div>
    </div>
    </div>
</div>