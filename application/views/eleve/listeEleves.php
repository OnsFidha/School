<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
    <div class="card-body" >
                <h4 > Liste des élèves</h4>
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
                                                <?php  if ($row->photo): ?>
                                                    <img style='width:105px;height:105px'src="data:image;base64,<?php echo $row->photo; ?>" alt="Photo">
                                                <?php endif; ?>                                
                                            </td>
                                            <td><?php echo $row->nom;?></td>
                                            <td><?php echo $row->prenom;?></td>
                                            <td><?php echo $row->dateNaissance;?></td>
                                            <td><?php echo $row->age;?></td>
                                            <td>
                                                <a href="<?php echo base_url('eleve/consulter/'.$row->id)?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                                                <a href="<?php echo base_url('eleve/modifier/'.$row->id)?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                                                <a  class ='deleteBtn' href="<?php echo base_url('eleve/supprimer/'.$row->id)?>" ><span class="badge bg-label-danger me-1"><i class='bx bx-trash'></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                    <script>
                                        $(document).ready(function() {
                                        $('.deleteBtn').click(function(e) {
                                        e.preventDefault();

                                        Swal.fire({
                                            title: 'Êtes-vous sûr de vouloir supprimer cet élève ?',
                                            text: "Cette action ne peut pas être annulée !",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Oui, supprimez-le !'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                            window.location.href = $(this).attr('href');
                                            }
                                        })
                                        });
                                        });
                                    </script>
                            </table>
                        </div>
            </div>
        </div>
    </div>
</div>
