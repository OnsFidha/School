<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
        <div class="card-body" >
            <h4 > Liste des menus cantine</h4>
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="<?php echo base_url('menu/form')?>" class="badge bg-label-primary me-1">Ajouter Menu</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style='color:black;font-weight:bolder'>Semaine</th>
                                <th style='color:black;font-weight:bolder'>Premier Jour</th>
                                <th style='color:black;font-weight:bolder'>Dernier Jour</th>
                                <th style='color:black;font-weight:bolder'>Eleves Iscrits</th>
                                <th style='color:black;font-weight:bolder'>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            foreach ($semaines as $semaine) {
                            ?>  
                                <tr>
                                    <td><?php echo $semaine->nom;?></td>
                                    <td><?php echo $semaine->dateDebut;?></td>
                                    <td><?php echo $semaine->dateDebut;?></td>
                                    <td>
                                        <a href="" >
                                            <!-- count(select id_eleve from eleve where isCantine==1) -->
                                            <div class="icon-with-text">
                                                <i class="bx bxs-user"></i>
                                                <span>8 élèves</span>
                                            </div>
                                        </a>

                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('menu/consulter/'.$semaine->id)?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                                        <a href="<?php echo base_url('menu/modifier/'.$semaine->id)?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                                        <a href="<?php echo base_url('menu/supprimer/'.$semaine->id)?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élève ?')"><span class="badge bg-label-danger me-1"><i class='bx bx-trash'></i></a>
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
    </div>
</div>         
           