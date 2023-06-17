<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mx-auto" style='width:750px'>
            <div class="card-body ">
                <h4>Ajouter une gratification</h4>
                        <div class="button-wrapper">
                            <div class="card-body mx-auto " >
                                <form id="form"  accept-charset="UTF-8" class="mb-3"  style='padding-left:100px' action="<?php echo base_url('gratification/add') ?>" method="POST">
                                    <div class="mb-3 col-md-5">
                                        <label for="classe" class="form-label">classe</label>
                                        <select name="classe" id="classe" data-placeholder="-- Select classe --" class="select2 form-select">
                                            <option></option>
                                            <?php foreach ($classes as $row) : ?>
                                                <option value="<?php echo $row->id_classe ?>"><?php echo $row->nom . ' ' . $row->annee_Scolaire ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small><?php echo form_error('classe'); ?></small>
                                    </div>
                                    <div id='j' class="row">
                                        <div class="mb-3 col-md-5">
                                            <label for="id_eleve" class="form-label">élève</label>
                                            <select name="id_eleve" id="id_eleve" data-placeholder="-- Select élève --" class="select2 form-select">
                                                <option></option>
                                                <?php foreach ($eleves as $row) : ?>
                                                    <option value="<?php echo $row->id ?>"><?php echo $row->nom ?> <?php echo $row->prenom ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-5">
                                            <label for="id_eleve" class="form-label">Matiere</label>
                                            <select name="id_matiere" id="id_matiere" data-placeholder="-- Select matiere --" class="select2 form-select">
                                                <option></option>
                                                <?php foreach ($matieres as $row) : ?>
                                                    <option value="<?php echo $row->id ?>"><?php echo $row->nom ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#id_eleve').select2({
                                                    theme: 'bootstrap'
                                                });
                                                
                                                $('#id_matiere').select2({
                                                    theme: 'bootstrap'
                                                });
                                                $('#classe').select2({
                                                    theme: 'bootstrap'
                                                });

                                                $('#classe').change(function() {
                                                     classe = $(this).val();
                                                    console.log(classe);
                                                    $.ajax({
                                                        url: "<?php echo base_url('sanctionContr/getEleve/'); ?>" + classe,
                                                        type: 'POST',
                                                        data: {
                                                            classe: classe
                                                        },
                                                        dataType: 'json',
                                                        success: function(response) {
                                                            if (response['eleves']) {
                                                                $("#j").html(response['eleves']);
                                                            }
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                        <small><?php echo form_error('id_eleve'); ?></small>
                                    </div>

                                    <div class="mb-3 col-md-10">
                                        <label for="type" class="form-label">Type</label>
                                        <select name="type" id="type" data-placeholder="-- Select Type --" class="select2 form-select">
                                            <option></option>
                                            <option value="Bon comportement">Bon comportement </option> 
                                                <option value="Participation active en classe">Participation active en classe </option>
                                                <option value="Réponses correctes">Réponses correctes </option>
                                                <option value="Respect des autres">Respect des autres  </option>
                                                <option value="Efforts et améliorations">Efforts et améliorations </option>
                                        </select>          
                                        <small><?php echo form_error('type'); ?></small>
                                        <script>
                                            $(document).ready(function() {
                                                $('#type').select2({
                                                    theme: 'bootstrap'
                                                });

                                            });
                                        </script>
                                    
                                    <div class="mb-3 col-md-10">
                                        <label for="remarque" class="form-label">Remarque</label>
                                        <textarea type="text" cols="100" rows="4" class="form-control" id="remarque" name="remarque" value="<?php echo set_value('remarque') ?>" autofocus></textarea>
                                        <small><?php echo form_error('remarque'); ?></small>
                                    </div>
                             
                                    <div class="mb-3 col-md-7">
                                        <button class="btn btn-primary d-grid" type="submit">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

