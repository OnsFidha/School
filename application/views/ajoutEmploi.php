
    <h4 class="fw-bold py-3 text-center " >ajouter une séance</h4>                         
        <div class=''>        
        <form id="form"  accept-charset="UTF-8"  >
                    <div class="mb-3 col-6 mx-auto ">
                        <label for="jour" class="form-label ">jour</label>
                        <select  class="select2 form-control " data-placeholder="--choisir jour--"  name="jour" id="jour" >
                                <option></option>  
                                 <option value="lundi"> Lundi</option>
                                 <option value="mardi">Mardi</option>
                                 <option value="mercredi">Mercredi </option>
                                 <option value="jeudi">Jeudi</option>
                                 <option value="venredi">Vendredi</option>
                                 <option value="samedi">Samedi</option>
                                 
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
                    <div class="mb-3 col-6 mx-auto text-center">
                        <label for="heure_debut" class="form-label">heure début</label>
                        <input style="text-align: center;"
                            type="time" 
                            class="form-control "
                            id="timepicker"
                            name="heure_debut"
                            value="<?php echo set_value('heure_debut')?>"
                            autofocus
                        /> <small><?php echo form_error('heure_debut'); ?></small>
                    </div>
                    <div class="mb-3 col-6 mx-auto">
                        <label for="heure_fin" class="form-label">date fin</label>
                        <input
                            style="text-align: center;"
                            type="time"
                            class="form-control"
                            id="heure_fin"
                            name="heure_fin"
                            value="<?php echo set_value('heure_fin')?>"
                            autofocus
                        /> <small><?php echo form_error('heure_fin'); ?></small>
                    </div>
                    <div class="mb-3 col-6 mx-auto">
                            <label for="matiere" class="form-label">Matiéres</label>
                            <select name="matiere" id="matiere"  data-placeholder="-- Select matiére --" class="select2 form-select" >
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
                          <div class="mb-3 col-6 mx-auto">
                            <label for="enseignant" class="form-label">Enseignant</label>
                            <select name="enseignant" id="enseignant"  data-placeholder="-- Select enseignant --" class="select2 form-select" >
                              <option></option>
                                <?php foreach($matieres as $row): ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                                <?php endforeach; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                $('#enseignant').select2({
                                     theme: 'bootstrap'
                                })
                                });
                            </script>
                          </div>
                </form>
                <button  form="form" class="btn btn-primary d-grid " type="submit">Créer</button>

        </div>