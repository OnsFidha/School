<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
    <div class="card-body" >
        <h4 >  Liste des demandes d'inscriptions</h4>
        <div class="card-header d-flex justify-content-between align-items-center">
        </div>
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
                                    <span class="badge bg-label-danger">Réfusé </span>
                                    <?php elseif($row->etat == 3):  ?>
                                    <span class="badge bg-label-info ">En cours </span>
                                <?php else : ?>
                                    <span class="badge bg-label-warning">En attente </span>
                                <?php endif; ?>
                                </td>
                                <td><?php echo $row->date;?></td>
                                <td>
                                    <style>.no-border {
                                            border: none;}
                                    </style>
                                    <a href="<?php echo base_url('demande/consulter/'.$row->id)?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                                    
                                    <button href="<?php echo base_url('demande/accepter/'.$row->id)?>" <?php if($row->etat == 1 || $row->etat == 0) { echo 'disabled'; } ?> class='deleteBtn no-border'>
                                        <span class="badge bg-label-success me-1"><i class='bx bxs-check-square'></i></span>
                                    </button>
                                    <button href="<?php echo base_url('demande/refuser/'.$row->id)?>" class='deleteBt no-border' <?php if($row->etat == 1 || $row->etat == 0) { echo 'disabled'; } ?>>
                                        <span class="badge bg-label-danger me-1"><i class='bx bxs-x-square'></i></span>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                            <script>
                                $(document).ready(function() {
                                $('.deleteBtn').click(function(e) {
                                e.preventDefault();

                                Swal.fire({
                                    title: 'Êtes-vous sûr de vouloir accepter la demande d\'inscription ?',
                                    text: "Cette action ne peut pas être annulée !",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Oui !'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                    window.location.href = $(this).attr('href');
                                    }
                                })
                                });
                                });
                            </script>
                            <script>
                                    $(document).ready(function() {
                                    $('.deleteBt').click(function(e) {
                                    e.preventDefault();

                                    Swal.fire({
                                        title: 'Êtes-vous sûr de vouloir refuser la demande d\'inscription ?',
                                        text: "Cette action ne peut pas être annulée !",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Oui !'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                        window.location.href = $(this).attr('href');
                                        }
                                    })
                                    });
                                    });
                            </script>
                    </tbody>
                </table>
            </div>
    </div>

