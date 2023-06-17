<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
    <div class="card-body" >
        <h4 >  Liste des reclamations des parents</h4>
        <div class="card-header d-flex justify-content-between align-items-center">
        </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th style='color:black;font-weight:bolder'>Nom Parent</th>
                            <th style='color:black;font-weight:bolder'>Type</th>
                            <th style='color:black;font-weight:bolder'>Contenu</th>
                            <th style='color:black;font-weight:bolder'>Etat</th>
                            <th style='color:black;font-weight:bolder'>Date </th>
                            <th style='color:black;font-weight:bolder'>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        foreach ($reclamations as $row) {
                        ?>  
                            <tr>
                                <td><?php echo $row->nomParent.$row->prenomParent;?></td>
                                <td><?php echo $row->type;?></td>
                                <td><?php echo $row->contenu;?></td>
                                <td>
                                <?php if ($row->etat == 1): ?>
                                    <span class="badge bg-label-success">Traité</span>
                                <?php elseif ($row->etat == 0): ?>
                                    <span class="badge bg-label-danger">Non traité</span>
                                <?php endif; ?>
                                </td>
                                <td><?php echo $row->date;?></td>
                                <td>
                                    <a href="<?php echo base_url('listeReclamation/consulter/'.$row->id)?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                                    
                                    <a href="<?php echo base_url('listeReclamation/traite/'.$row->id)?>" <?php if($row->etat == 1 || $row->etat == 0) { echo 'disabled'; } ?> class='deleteBtn'>
                                        <span class="badge bg-label-success me-1"><i class='bx bxs-check-square'></i></span>
                                    </a>
                               

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
                                    title: 'Êtes-vous sûr de vouloir traiter la reclamation  ?',
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

