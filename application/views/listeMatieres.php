<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-center"> Liste des matiéres</h4>
</br></br>
       <div class="card">
        <div class ="card-header">
       <a href="<?php echo base_url('listeMatieres/ajouter')?>"><span class="badge bg-label-primary me-1">ajouter une matiére</span></a>
        </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>nom</th>
                        <th>coefficient</th>
                        <th>nombre_heures</th>
                        <th>regroupement</th>
          
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach($matieres as $row):?>
                      
                      <tr>
                         <td><?php    echo $row->nom;?></td>
                         <td><?php    echo $row->coefficient;?></td>
                         <td><?php    echo $row->nombre_heures;?></td>
                         <td>
                          <?php    echo $row->regroupement;?>
                        </td>
                         <td> 
                         <a href=""><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                          <a href="<?php echo base_url('listeMatieres/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                          <a href="<?php echo base_url('listeMatieres/effacer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                        </td>

                      </tr>
                           <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
    </div></div></h4>