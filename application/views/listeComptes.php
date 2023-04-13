<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-center"> Liste des comptes</h4>
</br></br>
      <div class="card">
        <div class ="card-header">  
          <a href="<?php echo base_url('ajouterCompte')?>"><span class="badge bg-label-primary me-1">ajouter un compte</span></a>
        </div>
                  <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>nom</th>
                          <th>prenom</th>
                          <th>email</th>
                          <th>role</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                          <?php foreach($users as $row):?>
                        
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i>  <?php    echo $row->nom;?></td>
                          <td><?php    echo $row->prenom;?></td>
                          <td><?php    echo $row->email;?></td>
                          <td><?php    echo $row->role;?></td>
                          <td>
                            <a href=""><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                            <a href="<?php echo base_url('listeComptes/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                            <a href="<?php echo base_url('listeComptes/supprimer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                          </td>
                        </tr>
              
                            <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
      </div>
    </div></div></h4>