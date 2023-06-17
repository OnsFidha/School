
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
    <div class="card-body" >
            <h4 >Liste des classes</h4>
                    <!-- <div class="card-header d-flex justify-content-between align-items-center">
                        <a href="<?php echo base_url('club/creer')?>" class="badge bg-label-primary me-1">Ajouter Club</a>
                    </div> -->
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th>Id</th> -->
                                        <th style='color:black;font-weight:bolder'>Nom</th>
                                        <!-- <th>description</th>
                                        <th>Chef</th> -->
                                        <th style='color:black;font-weight:bolder'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    foreach ($classes as $classe) {
                                    ?>  
                                        <tr>
                                            <td><?php echo $classe->nom;?></td>
                                            <td>
                                                <a href="<?php echo base_url('classe/matieres/'.$classe->id_classe)?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>