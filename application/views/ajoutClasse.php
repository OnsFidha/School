
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " style='width:750px'>
                <div class="card-body" >
    <h4 class="fw-bold py-3 text-center " > Ajouter une classe</h4>
   
                                           
                <form id="form"  accept-charset="UTF-8" class="mb-3" action="<?php echo base_url('listeClasses/add') ?>" method="POST">
                <div class="mb-3">
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
                    <div class="mb-3">
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
                        </div>
                       
                        <div class="mb-3">
                        <label for="annee_Scolaire" class="form-label">Année scolaire</label>
                        <input
                            type="text"
                            class="form-control"
                            id="annee_Scolaire"
                            name="annee_Scolaire"
                            value="<?php echo set_value('annee_Scolaire')?>"
                            placeholder="exemple 2018/2019"
                            pattern="\d{4}/\d{4}"
                            autofocus
                        /> <small><?php echo form_error('annee_Scolaire'); ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="salle_classe" class="form-label">salle de classe</label>
                        <input
                            type="text"
                            class="form-control"
                            id="salle_classe"
                            name="salle_classe"
                            value="<?php echo set_value('salle_classe')?>"
                           
                            autofocus
                        /> <small><?php echo form_error('salle_classe'); ?></small>
                    </div>
                    <button class="btn btn-primary d-grid " type="submit">Créer</button>
                    </div>
                </form>
                </div>
            </div>
    </div>
</div>