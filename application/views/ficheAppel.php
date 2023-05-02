<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
<form method="post" id="attendance_form">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modal_title">Fiche d'appel</h4>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
                    <div class="form-group">
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
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Attendance Date <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="attendance_date" id="attendance_date" class="form-control" readonly="">
                <span id="error_attendance_date" class="text-danger"></span>
              </div>
            </div>
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
                          <tbody><tr>
                  <td>1</td>
                  <td>
                    Edward Hedberg                    <input type="hidden" name="student_id[]" value="1">
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status1" value="Present">
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status1" checked="" value="Absent">
                  </td>
                </tr>
                          <tr>
                  <td>2</td>
                  <td>
                    William Crawford                    <input type="hidden" name="student_id[]" value="3">
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status3" value="Present">
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status3" checked="" value="Absent">
                  </td>
                </tr>
                          <tr>
                  <td>3</td>
                  <td>
                    Renee Crowe                    <input type="hidden" name="student_id[]" value="4">
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status4" value="Present">
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status4" checked="" value="Absent">
                  </td>
                </tr>
                          <tr>
                  <td>4</td>
                  <td>
                    Lillian Williams                    <input type="hidden" name="student_id[]" value="5">
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status5" value="Present">
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status5" checked="" value="Absent">
                  </td>
                </tr>
                          <tr>
                  <td>5</td>
                  <td>
                    Betty Mayer                    <input type="hidden" name="student_id[]" value="6">
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status6" value="Present">
                  </td>
                  <td align="center">
                    <input type="radio" name="attendance_status6" checked="" value="Absent">
                  </td>
                </tr>
                        </tbody></table>
            </div>
          </div>
                  </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="attendance_id" id="attendance_id">
          <input type="hidden" name="action" id="action" value="Add">
          <input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Add">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>

      </div>
    </form></div></div></div>