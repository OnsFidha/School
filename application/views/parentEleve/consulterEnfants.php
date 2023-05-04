<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mx-auto " >
            <div class="card-body" >
                <h4>Leurs enfants</h4>
                <!--<div class="card-header d-flex justify-content-between align-items-center">
                            <a href="<?php echo base_url('eleve/create')?>" class="badge bg-label-primary me-1">Ajouter Eleve</a>
                        </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Date de Naissance</th>
                                            <th>Age</th>
                                            <th>Photo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <!-- <?php
                                        foreach ($eleve as $row) {
                                        ?>  
                                            <tr>
                                                <td><?php echo $row->id;?></td>
                                                <td><?php echo $row->nom;?></td>
                                                <td><?php echo $row->prenom;?></td>
                                                <td><?php echo $row->dateNaissance;?></td>
                                                <td><?php echo $row->age;?></td>
                                                <td><img src="<?php echo $row->photo;?>"></td>
                                                <td>
                                                    <a href="<?php echo base_url('eleve/consulter/'.$row->id)?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                                                    <a href="<?php echo base_url('eleve/modifier/'.$row->id)?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                                                    <a href="<?php echo base_url('eleve/supprimer/'.$row->id)?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élève ?')"><span class="badge bg-label-danger me-1"><i class='bx bx-trash'></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?> 
                                    </tbody>
                                </table>
                            </div>
                    </div> -->
            


                    <div class="row mb-5">
                
                

                <?php
                foreach ($enfants as $enfant) {
                ?>  
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $enfant->prenom." ".$enfant->nom;?></h5>
                            <!-- <h6 class="card-subtitle text-muted">Support card subtitle</h6> -->
                        </div>
                        <img class="img-fluid" src="<?php echo $enfant->photo;?>" alt="Card image cap" >
                        <div class="card-body">
                            <!-- <p class="card-text">Bear claw sesame snaps gummies chocolate.</p> -->
                            <a href="<?php echo base_url('eleve/consulter/'.$enfant->id)?>" class="card-link">Détails</a>
                            <a href="<?php echo base_url('eleve/facture/'.$enfant->id)?>" class="card-link">Facture</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?> 
            </div>
        </div>
    </div>
</div>