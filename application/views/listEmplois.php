<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
    <h4 class="fw-bold py-3 mb-4 text-center"> Liste des emplois</h4>
</br></br>
       
        <div class ="card-header">
       <a href="<?php echo base_url('emplois')?>"><span class="badge bg-label-primary me-1">ajouter un emplois </span></a>
        </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Classe</th>
                        <th>Niveau scolaire</th>
                        <th>Année scolaire</th>
                        <th>salle de classe</th>
                        <th>Actions </th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        
                    <?php foreach($emplois as $row):?>
                      <tr>
                         <td><?php  echo $row->nom ?></td>
                         <td><?php  echo $row->niveau ?></td>
                         <td><?php  echo $row->annee_Scolaire ?></td>
                         <td><?php  echo $row->salle_classe ?> </td>
                         <td> 
                         <a href="<?php echo base_url('listeEmplois/consulter/'.$row->id) ?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                          <a href="<?php echo base_url('listeEnseignants/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                          <a class="deleteBtn" href="<?php echo base_url('listeEnseignants/effacer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
    </div></div></h4>