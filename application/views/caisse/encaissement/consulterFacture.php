<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
    <div class="card-body" >

            <?php
        // foreach ($factures as $facture) {
        // ?>
  <!-- Borderless Table -->


    <h5 class="card-header">
      Facture <strong><?php echo $facture->type?>le</strong>
    <br>De l'élèvé <strong><?php echo " ".$eleve->prenom." ".$eleve->nom?></strong>
    <br> Du <strong><?php echo $periode->dateDebut?></strong> Au <strong><?php echo $periode->dateFin?></h5></strong>
    
    <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table class="table table-borderless">
        <thead>
              </thead>        
              <tbody>  
                <?php if ($encaissement->datePaiement==NULL): ?>
                  <tr>
                      <th>Frais d'Inscription</th>
                      <td><?php echo $facture->fraisInscription; ?></td>
                  </tr>
                <?php endif; ?>
                <tr>
                <th>Frais Scolaire</th>
                <td><?php echo $facture->montantFrais?></td>
                </tr>
                <?php if ($eleve->isCantine==1): ?>
                  <tr>
                      <th>Frais Cantine</th>
                      <td><?php echo $facture->montantCantine?></td>
                  </tr>
                <?php endif; ?>
                <?php if ($eleve->id_club!=NULL): ?>
                  <tr>
                      <th>Frais Club</th>
                      <td><?php echo $facture->montantClub?></td>
                  </tr>
                <?php endif; ?>
                <tr>
                <th>Montant Total</th>
                <td><?php echo $montant?></td>
                </tr>
            </tbody>
      </table>
      <div class="mt-2">
        <a class="btn btn-success" href="<?php echo base_url('facture/payer/'.$encaissement->id.'/'.$montant)?>"><i class='bx bx-dollar-circle'></i> Payer</a>
        <!-- <button type="button" class="btn btn-primary">
                              <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Primary
                            </button> -->
        <!-- <input type="submit" class="btn btn-primary" value="Payer" /> -->
        </div>
    </div>
    </div>
  </div>
<!-- 
  <?php
        // }
        ?> -->
  <!--/ Borderless Table -->
<br>
    <div class="row">
                  <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs" role="tablist">                    
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
                        Recu de paiment 
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                        <p>
                          Recu de paiment 
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
            </div></div>
  </div>
  </div></div>
  