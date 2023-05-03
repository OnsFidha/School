
            <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">

                

                <div class="card">
                    <!-- <div class="card-header d-flex justify-content-between align-items-center">
                        <a href="<?php echo base_url('demande/liste')?>" class="badge bg-label-primary me-1">Ajouter Eleve</a>
                    </div> -->
                    <h4 class="fw-bold py-3 mb-4 text-center">  Liste des Demandes d'Inscriptions</h4>

                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom Parent</th>
                                        <th>Email</th>
                                        <th>Nom Enfant</th>
                                        <th>Etat</th>
                                        <th>Date Soumission</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    foreach ($demande as $row) {
                                    ?>  
                                        <tr>
                                            <td><?php echo $row->nomParent;?></td>
                                            <td><?php echo $row->email;?></td>
                                            <td><?php echo $row->nomEnfant;?></td>
                                            <td>
                                            <?php if ($row->etat == 1): ?>
                                                <span class="badge bg-label-success">Acceptée</span>
                                            <?php elseif ($row->etat == 0): ?>
                                                <span class="badge bg-label-danger">Non Acceptée</span>
                                            <?php else : ?>
                                                <span class="badge bg-label-warning">En attente</span>
                                            <?php endif; ?>
                                            </td>
                                            <td><?php echo $row->date;?></td>
                                            <td>
                                                <a href="<?php echo base_url('eleve/consulter/'.$row->id)?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                                                
                                                <a href="<?php echo base_url('demande/accepter/'.$row->id)?>"
                                                
                                                    <?php if($row->etat == 1 || $row->etat == 0) { echo 'disabled'; } ?>
                                                    onclick="return confirm('Êtes-vous sûr de vouloir accepter la demande d\'inscription ?')"
                                                ><span class="badge bg-label-success me-1"><i class='bx bxs-check-square'></i></a>
                                                
                                                <a href="<?php echo base_url('demande/refuser/'.$row->id)?>"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir refuser la demande d\'inscription ?')"
                                                    <?php if($row->etat == 1 || $row->etat == 0) { echo 'disabled'; } ?>
                                                ><span class="badge bg-label-danger me-1"><i class='bx bxs-x-square' ></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                </div>
         
