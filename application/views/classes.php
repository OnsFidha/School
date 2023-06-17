<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mx-auto">
            <div class="card-body">
                <h4>Liste des classes</h4>
                <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <div class="table-container">
                        <table class="table table-sm table-centered table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Classe</th>
                                    <th>Niveau</th>
                                    <th>Année scolaire</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($classes as $classe) { ?>  
                                    <tr>
                                        <td><?php echo $classe->nom;?></td>
                                        <td><?php echo $classe->niveau;?></td>
                                        <td><?php echo $classe->annee_Scolaire;?></td>
                                        <td>
                                            <a href="<?php echo base_url('eleve/'.$classe->id)?>">
                                                <span class="badge bg-label-warning me-1">
                                                    <i class='bx bxs-edit'></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div></div>
                </div>
            </div>
        </div>
    </div>
</div>
