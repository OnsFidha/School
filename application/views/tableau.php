
<div class="form-group" id="student_details">
    <div class="table-responsive"  style='width:750px ;align-items: center;'>
        <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
            <th>Elève</th>
            <th>Etat</th>
            <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($ens)){
            foreach ($ens as $s){ ?>
                <tr>
                    <td><?php echo $s['nom'] .' '. $s['prenom']; ?></td>
                    <td>
                        <div class="btn-group" id="button-group-<?php echo $s['id']; ?>"  role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-success attendance-btn" data-student="<?php echo $s['id']; ?>" data-status="present">Présent(e)</button>
                            <button type="button" class="btn btn-outline-danger attendance-btn" data-student="<?php echo $s['id']; ?>" data-status="absent">Absent(e)</button>
                        </div>
                        <input type="hidden" name="attendance[<?php echo $s['id']; ?>]" value="">
                    </td>
                    <!-- <td>
                        <a href="<?php echo base_url('eleve/consulter/'.$s['id']) ?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                        <a href="<?php echo base_url(''.$s['id']) ?>"><span class="badge bg-label-warning me-1"><i class='bx'> Discipline</i></a>
                    </td> -->
                </tr>
            <?php }
            } ?>
        <script>
            $(document).ready(function() {
                $('.attendance-btn').click(function() {
                    var studentId = $(this).data('student');
                    var status = $(this).data('status');
                    $('#button-group-'+studentId+' button').removeClass('active');
                    $(this).addClass('active');
                    $('input[name="attendance['+studentId+']"]').val(status);
                });
            });
        </script>


        </tbody>
                  </table>
                </div>
              </div>
             

      