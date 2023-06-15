<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
    <div class="card-body" >
        <h4 >Liste des parents</h4>
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="<?php echo base_url('parent/create')?>" class="badge bg-label-primary me-1">Ajouter Parent</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date de Naissance</th>
                            <th>Cin</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Compte</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        foreach ($parent as $row) { ?>  
                            <tr>
                                <td><?php echo $row->nom;?></td>
                                <td><?php echo $row->prenom;?></td>
                                <td><?php echo $row->dateNaissance;?></td>
                                <td><?php echo $row->cin;?></td>
                                <td><?php echo $row->telephone;?></td>
                                <td><?php echo $row->email;?></td>
                                <td>   
                                    <?php if ($row->id_user == NULL) : ?>
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onchange="window.location.href='<?php echo base_url('parent/compte/'.$row->id) ?>'">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">no compte</label>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Compte</label>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('parent/consulter/'.$row->id)?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                                    <a href="<?php echo base_url('parent/modifier/'.$row->id)?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                                    <a href="<?php echo base_url('parent/enfant/'.$row->id)?>"><span class="badge bg-label-dark me-1"><i class='bx bxs-face'></i></a>
                                    <a class='deleteBtn' href="<?php echo base_url('parent/supprimer/'.$row->id)?>" ><span class="badge bg-label-danger me-1"><i class='bx bx-trash'></i></a>
                                    <br/>
                                    <!-- <a href="<?php echo base_url('parent/'.$row->id.'/facture')?>"><span class="badge bg-label-success me-1"><i class='bx bx-dollar-circle'></i> Payer</a> -->
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
         
       