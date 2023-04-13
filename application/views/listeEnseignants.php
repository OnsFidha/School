<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
    <h4 class="fw-bold py-3 mb-4 text-center"> Liste des enseignants</h4>
</br></br>
       
        <div class ="card-header">
       <a href="<?php echo base_url('enseignant')?>"><span class="badge bg-label-primary me-1">ajouter un enseignant</span></a>
        </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>photo</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>email</th>
                        <th>classe</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach($enseignant as $row):?>
                      
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
                        <img src='<?php  echo $row->photo;?>'></img></td>
                         <td><?php    echo $row->nom;?></td>
                         <td><?php    echo $row->prenom;?></td>
                         <td><?php    echo $row->email;?></td>
                         <td>
                          <!-- <?php    echo $row->idClasse;?> -->
                        </td>
                         <td> 
                         <a href=""><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                          <a href="<?php echo base_url('listeEnseignants/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                          <a href="<?php echo base_url('listeEnseignants/effacer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                        </td>

                      </tr>
                           <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
    </div></div></h4>