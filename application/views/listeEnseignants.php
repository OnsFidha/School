<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto ">
    <div class="card-body" >
    <h4 > Liste des enseignants</h4>
        
        <div class ="card-header">
          <a href="<?php echo base_url('listeEnseignant/ajouter')?>"><span class="badge bg-label-primary me-1">ajouter un enseignant</span></a>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th style='color:black;font-weight:bolder'>photo</th>
                <th style='color:black;font-weight:bolder'>nom</th>
                <th style='color:black;font-weight:bolder'>prenom</th>
                <th style='color:black;font-weight:bolder'>email</th>
                <th style='color:black;font-weight:bolder'>classe</th>
                <th style='color:black;font-weight:bolder'>Actions</th> 
                <th style='color:black;font-weight:bolder'>Compte</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach($enseignant as $row):?>
              
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
                    <?php  if ($row->photo): ?>
                      <img style='width:105px;height:105px'src="data:image;base64,<?php echo $row->photo; ?>" alt="Photo">
                    <?php endif; ?>
                   
                  </td>
                  <td><?php    echo $row->nom;?></td>
                  <td><?php    echo $row->prenom;?></td>
                  <td><?php    echo $row->email;?></td>
                  <td>
                <?php foreach( $this->classeModel->getClasseByEnseignant($row->id) as $a):
                  echo $a->nom.'</br>' ; endforeach; ?>
                </td>
                  <td> 
                  <a href="<?php echo base_url('listeEnseignants/consulte/'.$row->id) ?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                  <a href="<?php echo base_url('listeEnseignants/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                  <a class="deleteBtn" href="<?php echo base_url('listeEnseignants/effacer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                </td>
                <td>   
                <?php if ($row->id_user == NULL) : ?>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onchange="window.location.href='<?php echo base_url('listeEnseignants/compte/'.$row->id) ?>'">
                        <label class="form-check-label" for="flexSwitchCheckDefault">no compte</label>
                    </div>
                <?php else: ?>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Compte</label>
                    </div>
                <?php endif; ?>
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
    </div>
    </div>
</div>