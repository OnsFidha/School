<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto ">
    <div class="card-body" >
      <h4>Fiche d'appel</h4>
      <form method="post" id="attendance_form" style='width:750px;margin-left:200px ;' action='<?php echo base_url('assiduiteContr/appel') ?>'>
          <div class="modal-body">
            <div class="row">
              <div class='mb-3 col-md-4'>
              <input type="hidden" name="selected_classe" id="selected_classe" value="">
                <script>
                $(document).ready(function() {
                        $('#classe').select2({
                            theme: 'bootstrap'
                        });

                        $('#classe').change(function() {
                            var classe = $(this).val();
                            console.log(classe);

                            // Mise à jour de la valeur du champ caché
                            $('#selected_classe').val(classe);

                            $.ajax({
                                url: "<?php echo base_url('assiduiteContr/fetchEleve/') ?>" + classe,
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    classe: classe
                                },
                                success: function(response) {
                                    if (response['ens']) {
                                        $("#j").empty().append(response['ens']);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    alert("An error occurred: " + error);
                                }
                            });
                        });
                    });
                    </script>
                <label>Classe</label>
                <select name="classe" id="classe" class="select form-select">
                  <option value=""></option>
                  <optgroup label="préscolaire">
                  
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == 'préscolaire'): ?> 
                              <option value="<?php echo $row->id_classe ?>" ><?php echo $row->nom .'    '.$row->annee_Scolaire ?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="1ère">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '1ere'): ?> 
                              <option value="<?php echo $row->id_classe ?>"><?php echo $row->nom.' '.$row->annee_Scolaire ?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="2ème">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '2eme'): ?> 
                              <option value="<?php echo $row->id_classe ?>"><?php echo $row->nom.' '.$row->annee_Scolaire ?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="3ème">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '3eme'): ?> 
                              <option value="<?php echo $row->id_classe ?>"><?php echo $row->nom.' '.$row->annee_Scolaire ?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="4ème">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '4eme'): ?> 
                              <option value="<?php echo $row->id_classe ?>"><?php echo $row->nom .' '.$row->annee_Scolaire?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="5ème">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '5eme'): ?> 
                              <option value="<?php echo $row->id_classe ?>"><?php echo $row->nom.' '.$row->annee_Scolaire ?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="6ème">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '6eme'): ?> 
                              <option value="<?php echo $row->id_classe ?>"><?php echo $row->nom .' '.$row->annee_Scolaire?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                </select>
              </div>
              <div id="j" >
              <div class="form-group" id="student_details">
                <div class="table-responsive "  >
                  <table class="table table-striped table-bordered text-center">
                    <thead>
                      <tr>
                        <th>Elève</th>
                        <th> Etat</th>
                        <!-- <th>Actions</th> -->
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
              </div>
              <script>
                $(document).ready(function() {
                    $('#classe').select2({
                        theme: 'bootstrap'
                                }),
                    $('#classe').change(function(){
                        var classe = $(this).val();
                        console.log(classe);
                    $.ajax({
                        url:"<?php echo base_url('assiduiteContr/fetchEleve/') ?>"+classe,
                        type:'POST',
                        dataType:'json',
                        data: {classe: classe},
                        success:function(response)
                        {
                            if(response['ens']){
                                $("#j").empty().append(response['ens']);
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("An error occurred: " + error);
                        },
                        })
                    
                        }) 
                    });
              </script>
            </div>
            <button class="btn btn-primary d-grid " type="submit">Enregistrer</button>
          </div>
      </form>
    
    </div>
    </div>
    </div>
</div>