<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
      <div class="card-body" >
          <h5 class="card-header">
            <?php echo $eleve->nom?>
            <?php echo $eleve->prenom?>
          </h5>
          <h5 class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img src="<?php echo $eleve->photo?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
            </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-borderless">
                <thead>
                      </thead>        
                      <tbody>  
                        <tr>
                        <th>Date de naissance</th>
                        <td><?php echo $eleve->dateNaissance?></td>
                        </tr>
                        <tr>
                        <th>Age</th>
                        <td><?php echo $eleve->age?>ans</td>
                        </tr>
                        <tr>
                        <th>Sexe</th>
                        <td><?php echo $eleve->sexe?></td>
                        </tr>
                        <tr>
                        <th>Adresse</th>
                        <td><?php echo $eleve->adresse?></td>
                        </tr>
                        <tr>
                        <th>Taille</th>
                        <td><?php echo $dossier->taille?>cm</td>
                        </tr>
                        <tr>
                        <th>Poids</th>
                        <td><?php echo $dossier->poids?>Kg</td>
                        </tr>
                    </tbody>
              </table>
            </div>
          
        
          <br>
        <div class="row">
            <div class="nav-align-top mb-4">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <button
                    type="button"
                    class="nav-link active"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-top-home"
                    aria-controls="navs-top-home"
                    aria-selected="true"
                  >
                    Présence
                  </button>
                </li>
                <li class="nav-item">
                  <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-top-profile"
                    aria-controls="navs-top-profile"
                    aria-selected="false"
                  >
                    Notes
                  </button>
                </li>
                <li class="nav-item">
                  <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-top-messages"
                    aria-controls="navs-top-messages"
                    aria-selected="false"
                  >
                      Emplois du temps
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                  <p>
                    Présence 
                  </p>
                  <p class="mb-0">
                  <br><br><br><br><br>
                  </p>
                </div>
                <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                  <p>
                    Notes 
                  </p>
                  <p class="mb-0">
                    <br><br><br><br><br>
                  </p>
                </div>
                <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
                  <p>
                    Emlpoie du temps 
                  </p>
                  <p class="mb-0">
                    <br><br><br><br><br>
                  </p>
                </div>
              </div>
            </div>
        </div>
      </div>
      </h5>
      </div>
    </div>
</div>


     
   

              