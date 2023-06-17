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
                                <input type="number" required min="0" max="20" class="form-control student-note" data-student="<?php echo $eleve['id']; ?>">
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
       
        $('#submit-btn').click(function() {
            var bul = [];
            var allNotesFilled = true; // Variable pour vérifier si toutes les notes sont remplies

            $('.student-note').each(function() {
                var studentId = $(this).data('student');
                var note = $(this).val();

                if (note === '') {
                    allNotesFilled = false;
                    return false; // Sortir de la boucle each() si une note est vide
                }

                if (note < 0 || note > 20) {
                    allNotesFilled = false;
                    alert('Veuillez saisir une note entre 0 et 20 ');
                    return false; // Sortir de la boucle each() si une note est hors des limites
                }

                bul.push({
                    studentId: studentId,
                    note: note
                });
            });

            if (!allNotesFilled) {
                alert('Veuillez remplir toutes les notes correctement.');
                return; // Arrêter l'exécution de la fonction si une note est vide ou hors des limites
            }

            var app = [];
            $('.student-app').each(function() {
                var studentId = $(this).data('student');
                var rem = $(this).val();
                app.push({
                    studentId: studentId,
                    rem: rem
                });
            });

            $.ajax({
                url: "<?php echo base_url('BulletinController/saisir')?>",
                method: 'POST',
                data: {
                    ca: ca,
                    mat: mat,
                    bul: bul,
                    app: app
                },
                success: function(response) {
                    alert('Note ajoutée avec succès');
                },
                error: function() {
                    alert('Veuillez vérifier les notes.');
                    window.location.href = "<?php echo base_url('EnseignantContr/classesDeEnseignant')?>";
                }
            });
        });
    });
</script>


