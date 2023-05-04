<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto ">
    <div class="card-body" >
      <h4>Fiche d'appel</h4>
      <form method="post" id="attendance_form">
          <div class="modal-body">
            <div class="row">
              <div class='mb-3 col-md-3'>
                <label>Classe</label>
                <select name="classe" id="classe" class="select form-select">
                  <option value=""></option>
                  <optgroup label="préscolaire">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == 'préscolaire'): ?> 
                              <option value="<?php echo $row->id ?>"><?php echo $row->nom .'    '.$row->annee_Scolaire ?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="1ère">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '1ere'): ?> 
                              <option value="<?php echo $row->id ?>"><?php echo $row->nom.' '.$row->annee_Scolaire ?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="2ème">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '2eme'): ?> 
                              <option value="<?php echo $row->id ?>"><?php echo $row->nom.' '.$row->annee_Scolaire ?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="3ème">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '3eme'): ?> 
                              <option value="<?php echo $row->id ?>"><?php echo $row->nom.' '.$row->annee_Scolaire ?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="4ème">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '4eme'): ?> 
                              <option value="<?php echo $row->id ?>"><?php echo $row->nom .' '.$row->annee_Scolaire?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="5ème">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '5eme'): ?> 
                              <option value="<?php echo $row->id ?>"><?php echo $row->nom.' '.$row->annee_Scolaire ?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="6ème">
                      <?php foreach($classes as $row): ?>
                          <?php if ($row->niveau == '6eme'): ?> 
                              <option value="<?php echo $row->id ?>"><?php echo $row->nom .' '.$row->annee_Scolaire?></option>
                          <?php endif; ?> 
                      <?php endforeach; ?>
                  </optgroup>
                </select>
              </div>
              <div class="form-group" id="student_details">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Roll No.</th>
                        <th>Student Name</th>
                        <th>Present</th>
                        <th>Absent</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
            <button class="btn btn-primary d-grid " type="submit">Enregistrer</button>
          </div>
      </form>
    </div>
    </div>
    </div>
</div>