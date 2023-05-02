<div class="mb-3 col-6 mx-auto">
                            <label for="enseignant" class="form-label">Enseignant</label>
                            <select name="enseignant" id="enseignant"  data-placeholder="-- Select enseignant --" class="select2 form-select" >
                              <option></option>
                              <?php 
                              if(!empty($ens)){
                                foreach ($ens as $s){
                                    ?>
                                    <option value="<?php echo $s['id'] ?>"><?php echo $s['nom'] ?> <?php echo $s['prenom'] ?></option>
                               <?php }
                              }
                              ?>
                                
                            </select>
                            <script>
                                $(document).ready(function() {
                                $('#enseignant').select2({
                                     theme: 'bootstrap'
                                })
                                });
                            </script>
                          </div>