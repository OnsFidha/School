
<div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">


  <!-- Borderless Table -->
  <div class="card">
    <h5 class="card-header">

      Club <?php echo $club->nom?>
      
    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-borderless">
        <thead>
              </thead>        
              <tbody>  
                <tr>
                <th>Description</th>
                <td><?php echo $club->description?></td>
                </tr>
                <tr>
                <th>Photo</th>
                <td><?php echo $club->photo?></td>
                </tr>
                <tr>
                <th>Chef du Club</th>
                <td><?php echo $enseignant->nom." ".$enseignant->prenom?></td>
                </tr>
            </tbody>
      </table>
    </div>
  </div>
  <!--/ Borderless Table -->
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
                          Liste des élèves
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
</div>
  
 