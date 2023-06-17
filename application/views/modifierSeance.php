<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto "  style='width:750px'>
        <div class="card-body" >
        <h4 class='text-center' >Modifier  séance</h4>                            
        <form id="form text-center" method="POST" action="<?php echo base_url('emploisContr/upd/'.$emplois->id) ?>" >
            <div class="mb-3 col-12 mx-auto ">
                        <div class="mb-3 col-6 mx-auto ">
                            <label for="jour" class="form-label ">jour</label>
                            <select class="select2 form-control" data-placeholder="--choisir jour--" name="jour" id="jour">
                                <option></option>  
                                <option value="lundi" <?php if ($emplois->jour == 'lundi') echo 'selected'; ?>>Lundi</option>
                                <option value="mardi" <?php if ($emplois->jour == 'mardi') echo 'selected'; ?>>Mardi</option>
                                <option value="mercredi" <?php if ($emplois->jour == 'mercredi') echo 'selected'; ?>>Mercredi</option>
                                <option value="jeudi" <?php if ($emplois->jour == 'jeudi') echo 'selected'; ?>>Jeudi</option>
                                <option value="vendredi" <?php if ($emplois->jour == 'vendredi') echo 'selected'; ?>>Vendredi</option>
                                <option value="samedi" <?php if ($emplois->jour == 'samedi') echo 'selected'; ?>>Samedi</option>
                            </select>

                            <script>
                                $(document).ready(function() {
                                $('#jour').select2({
                                theme: 'bootstrap',
                                minimumResultsForSearch: Infinity
                                })
                                });
                            </script>
                            <small><?php echo form_error('jour'); ?></small>
                        </div>
                        <div class="mb-3 col-6 mx-auto ">
                            <label for="heure_debut" class="form-label">Heure début</label>
                            <input
                                type="time" 
                                class="form-control "
                                id="heure_debut"
                                name="heure_debut"
                           
                                value="<?php echo $emplois->heure_debut; ?>"
                                autofocus
                            /> <small><?php echo form_error('heure_debut'); ?></small>
                        </div>
                        <div class="mb-3 col-6 mx-auto">
                            <label for="heure_fin" class="form-label">Heure fin</label>
                            <input
                                type="time"
                                class="form-control"
                                id="heure_fin"
                                name="heure_fin"
                                
                                value="<?php echo $emplois->heure_fin; ?>"
                                autofocus
                            /> <small><?php echo form_error('heure_fin'); ?></small>
                        </div>
                        <div class="mb-3 col-6 mx-auto">
                                <label for="matiere" class="form-label">Matiére</label>
                                <select name="matiere" id="matiere" data-placeholder="-- Select matiére --" class="select2 form-select">
                                    <option></option>
                                    <?php foreach ($matieres as $row): ?>
                                        <option value="<?php echo $row->id ?>" <?php if ($emplois->id_matiere == $row->id) echo 'selected'; ?>><?php echo $row->nom ?></option>
                                    <?php endforeach; ?>
                                </select>


                        
                            </div>
                            <div id="j">
                            <div class="mb-3 col-6 mx-auto">
                                <label for="enseignant" class="form-label">Enseignant</label>
                                <select name="enseignant" id="enseignant" data-placeholder="-- Select enseignant --" class="select2 form-select">
                                    <option></option>
                                    <?php foreach ($enseignants as $row): ?>
                                        <option value="<?php echo $row->id ?>" <?php if ($emplois->id_enseignant == $row->id) echo 'selected'; ?>><?php echo $row->nom ?> <?php echo $row->prenom ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <script>
                                    $(document).ready(function() {
                                    $('#enseignant').select2({
                                        theme: 'bootstrap'
                                    })
                                    });
                                </script>
                            </div></div>
                            <script>
                                $(document).ready(function() {
                                $('#matiere').select2({
                                    theme: 'bootstrap'
                                            })
                                $('#matiere').change(function(){
                                    var matiere = $(this).val();
                                $.ajax({
                                    url:"<?php echo base_url('emploisContr/getEnseign'); ?>",
                                    type:'POST',
                                    data:{matiere:matiere},
                                    dataType:'json',
                                    success:function(response)
                                    {
                                        if(response['ens']){
                                            $("#j").html(response['ens']);
                                        }
                                    }
                                    });
                                    }); 
                                    });
                                </script>
                            <button class="btn btn-primary d-grid " type="submit">Créer</button>
            </div> 
        </form>
        </div>
    </div>