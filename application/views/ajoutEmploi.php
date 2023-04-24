
    <h4 class="fw-bold py-3 text-center " >ajouter une séance</h4>                         
        <div class=''>        
        <form id="form"  accept-charset="UTF-8"  action="<?php echo base_url('') ?>" method="POST">
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
                        <label for="date_Debut" class="form-label">date début</label>
                        <input style="text-align: center;"
                            type="time" 
                            class="form-control "
                            id="timepicker"
                            name="date_Debut"
                            value="<?php echo set_value('date_Debut')?>"
                            autofocus
                        /> <small><?php echo form_error('date_Debut'); ?></small>
                    </div>
                    <div class="mb-3 col-6 mx-auto">
                        <label for="date_Fin" class="form-label">date fin</label>
                        <input
                            style="text-align: center;"
                            type="date"
                            class="form-control"
                            id="date_Fin"
                            name="date_Fin"
                            value="<?php echo set_value('date_Fin')?>"
                            autofocus
                        /> <small><?php echo form_error('date_Fin'); ?></small>
                    </div>
                    <div class="mb-3 col-6 mx-auto">
                            <label for="matiere" class="form-label">Matiéres</label>
                            <select name="matiere" id="matiere"  data-placeholder="-- Select matiéres --" class="select2 form-select" >
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
                </form>
        </div>