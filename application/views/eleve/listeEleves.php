
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
    <div class="card-body" >
            <!-- <h2>uploading files</h2> 
                        <form method="post" action="<?php echo base_url('eleve/upload'); ?>" enctype="multipart/form-data">
                        <input type="file" name="photo" size="20" />
                        <br /><br />
                        <input type="submit" value="Upload" />
                        </form> -->
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Eleves /</span> liste</h4>

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <a href="<?php echo base_url('eleve/create')?>" class="badge bg-label-primary me-1">Ajouter Eleve</a>
                    </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Date de Naissance</th>
                                        <th>Age</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    foreach ($eleve as $row) {
                                    ?>  
                                        <tr>
                                            <td><?php echo $row->id;?></td>
                                            <td>
                                            <!-- <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Christina Parker">
                              <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                            </li> -->
                                                <img src="<?php echo $row->photo;?>" class="rounded-circle avatar avatar-xs pull-u">
                                            </td>
                                            <td><?php echo $row->nom;?></td>
                                            <td><?php echo $row->prenom;?></td>
                                            <td><?php echo $row->dateNaissance;?></td>
                                            <td><?php echo $row->age;?></td>
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
                </div>
         
        </div>
    </div>
</div>
