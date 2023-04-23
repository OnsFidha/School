<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
    <h4 class="fw-bold py-3 mb-4 text-center"> Liste des classes</h4>
</br></br>
       
        <div class ="card-header">
       <a href="<?php echo base_url('listeClasses/ajouter')?>"><span class="badge bg-label-primary me-1">ajouter une classe</span></a>
        </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>nom</th>
                        <th>niveau</th>
                        <th>annee_scolaire</th>
                        <th>salle_classe</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach($classe as $row):?>
                      
                      <tr>
                         <td><?php    echo $row->nom;?></td>
                         <td><?php    echo $row->niveau;?></td>
                         <td><?php    echo $row->annee_Scolaire;?></td>
                         <td>
                            <?php    echo $row->salle_classe;?> 
                        </td>
                         <td> 
                         <a href=""><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                          <a href="<?php echo base_url('listeEnseignants/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                          <a class="deleteBtn" href="<?php echo base_url('listeEnseignants/effacer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                        </td>
                        <script>
                            $(document).ready(function() {
                            $('.deleteBtn').click(function(e) {
                              e.preventDefault();

                              Swal.fire({
                                title: 'Êtes-vous sûr de vouloir supprimer ce compte ?',
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
                      </tr>
                           <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
    </div></div></h4>