<div class='auto-mx'>
    <?php if ($nb > 0) { ?>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
             
                 <input type="number" value="<?php echo $matiere?>" name="mat" id="mat" hidden>
          
                 <input type="number" value="<?php echo $idclasse?>" name="ca" id="ca" hidden>
                    <tr>
                        <th><?php echo ($nb) ?> élèves</th>
                        <th>Note /20</th>
                        <th>Appréssiation</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php foreach ($param as $eleve) { ?>
                        <tr>
                            <td><?php echo $eleve['nom'] . " " . $eleve['prenom'] ?></td>
                            <td>
                                <div class="btn-group" id="note-<?php echo $eleve['id']; ?>" role="group" aria-label="">
                                    <input type="number"  required min="0" max="20" class="form-control student-note" data-student="<?php echo $eleve['id']; ?>">
                                </div>
                            </td>
                            <td>
                            <div class="btn-group" id="app-<?php echo $eleve['id']; ?>" role="group" aria-label="">
                                    <input type="text" required class="form-control student-app" data-student="<?php echo $eleve['id']; ?>">
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            <input id="submit-btn" type="submit" class="btn btn-primary" value="Enregistrer" />
        </div>
    <?php } else { ?>
        <h2>Aucun élève disponible.</h2>
    <?php } ?>
</div>

<script>
    $(document).ready(function() {
        var mat = $('#mat').val();
        var ca = $('#ca').val();
        alert(ca)
        $('#submit-btn').click(function() {
            var bul = [];
            $('.student-note').each(function() {
                var studentId = $(this).data('student');
                var note = $(this).val();
                bul.push({
                    studentId: studentId,
                    note: note
                });
            });
            var app =[];
            $('.student-app').each(function() {
                var studentId = $(this).data('student');
                var rem = $(this).val();
                app.push({
                    studentId: studentId,
                    rem: rem
                });
            });
            
            // Perform your desired action with the collected notes
            // For example, send them to a server using AJAX
            $.ajax({
                url: "<?php echo base_url('BulletinController/saisir')?>",
                method: 'POST',
                data: {
                    ca:ca,
                    mat:mat,
                    bul:bul,
                    app: app
                },
                success: function(response) {
                 
                },
                error: function() {
                    // Handle any errors that occurred during the request
                }
            });
        });
    });
</script>
