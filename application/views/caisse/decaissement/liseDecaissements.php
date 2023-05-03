
            <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Decaissements /</span> liste</h4>

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <!-- <a href="<?php echo base_url('eleve/create')?>" class="badge bg-label-primary me-1">Ajouter Eleve</a> -->
                    </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mois</th>
                                        <th>Enseignant</th>
                                        <th>Date de Paiement</th>
                                        <th>Statue</th>
                                        <th>Montant Payé</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    foreach ($encaissements as $encaissement) {
                                    ?>  
                                        <tr>
                                            <td><?php echo $encaissement->periodeNom;?></td>
                                            <td><?php echo $encaissement->elevePrenom." ".$encaissement->eleveNom;?></td>
                                            
                                            <td>
                                                <?php if ($encaissement->datePaiement==NULL) {?>
                                                    <span style="color: grey; font-style: italic;">En attente de paiement</span>
                                                <?php    
                                                }else{?>
                                                <?php echo $encaissement->datePaiement;?>
                                                <?php    
                                                }?>
                                            </td>

                                            <td>
                                            <?php if ($encaissement->statue == 1): ?>
                                                <span class="badge bg-label-success">Payé</span>
                                                <?php else: ?>
                                                    <span class="badge bg-label-danger">Non Payé</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($encaissement->montantPaye==NULL) {?>
                                                <span style="color: grey; font-style: italic;">En attente de paiement</span>
                                                <?php    
                                                }else{?>
                                                <?php echo $encaissement->montantPaye;?>dt
                                                <?php    
                                                }?>
                                            </td>
                                            <!-- <td><img src="<?php echo $encaissement->photo;?>"></td> -->
                                            <td>
                                                <!-- <a href="<?php echo base_url('facture/payer/'.$encaissement->id.'/'.$encaissement->montantPaye)?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a> -->
                                                <!-- <a href="<?php echo base_url('eleve/modifier/'.$encaissement->id)?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a> -->
                                                <a href="<?php echo base_url('eleve/supprimer/'.$encaissement->id)?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élève ?')"><span class="badge bg-label-danger me-1"><i class='bx bx-trash'></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                </div>
         