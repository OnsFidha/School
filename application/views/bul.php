<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mx-auto">
            <div class="card-body">
                <h4>Bulletin de notes</h4>
                <div class="card-body">
                    <h5>Trimestre <?php echo $tri ?></h5>
                    <div class="table-responsive text-nowrap">
                        <div class="table-container">
                            <table class="table table-sm table-centered table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Regroupement</th>
                                        <th>Matière</th>
                                        <th>Note  /20</th>
                                        <th>Note Min</th>
                                        <th>Note Max</th>
                                        <th>Appréciation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $groupedMatieres = array();
                                    $totalNotes = 0;
                                    $totalCoefficient = 0;

                                    foreach ($eleves as $matiere_id => $matiere) {
                                        $regroupement = $matiere['regroupement'];
                                        if (!isset($groupedMatieres[$regroupement])) {
                                            $groupedMatieres[$regroupement] = array();
                                        }
                                        $groupedMatieres[$regroupement][] = $matiere;
                                        if (!empty($matiere['note'])) {
                                            $totalNotes += ($matiere['note'] * $matiere['coefficient']);
                                            $totalCoefficient += $matiere['coefficient'];
                                        }
                                    }

                                    foreach ($groupedMatieres as $regroupement => $matieres) {
                                        $rowspan = count($matieres);
                                        ?>
                                        <tr>
                                            <td rowspan="<?php echo $rowspan; ?>"><?php echo $regroupement; ?></td>
                                            <td><?php echo $matieres[0]['nom']; ?></td>
                                            <td><?php echo $matieres[0]['note']; ?></td>
                                            <td><?php echo $matieres[0]['note_min']; ?></td>
                                            <td><?php echo $matieres[0]['note_max']; ?></td>
                                            <td><?php echo $matieres[0]['appréciation']; ?></td>
                                        </tr>
                                        <?php
                                        for ($i = 1; $i < $rowspan; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $matieres[$i]['nom']; ?></td>
                                                <td><?php echo $matieres[$i]['note']; ?></td>
                                                <td><?php echo $matieres[$i]['note_min']; ?></td>
                                                <td><?php echo $matieres[$i]['note_max']; ?></td>
                                                <td><?php echo $matieres[$i]['appréciation']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="m-3">
                        <?php
                        $average = ($totalCoefficient > 0) ? round($totalNotes / $totalCoefficient, 2) : 0;
                        $progressColor = '';
                        
                        if ($average >= 16) {
                            $progressColor = 'bg-success'; // Green color for excellent average
                        } elseif ($average >= 12) {
                            $progressColor = 'bg-warning'; // Yellow color for normal average
                        } else {
                            $progressColor = 'bg-danger'; // Red color for weak average
                        }
                        ?>
                        <p>Moyenne générale: <?php echo $average; ?></p>
                        <div class="progress" style="width: 50%; margin: 0 auto;">
                            <div class="progress-bar <?php echo $progressColor; ?>" role="progressbar" style="width: <?php echo $average * 5; ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
