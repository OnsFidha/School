
<div class="content-wrapper ">
    <div class="container-xxl  container-p-y d-flex justify-content-center">
    <div class="card mx-auto " >
      <div class="card-body " >
          <h5 class="card-header ">
            Reclamation num°  &nbsp;<?php echo $reclamations->id ?><br><br>
                &nbsp; &nbsp;  de Mr/Mme <?php echo $reclamations->nomParent.' '.$reclamations->prenomParent?>       
          </h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-borderless">
                    <thead>
                    <br>
                    </thead>        
                    <tbody>  
                        <tr>
                        <th>type</th>                     
                            <td><?php echo $reclamations->type?> </td>
                        </tr>
                        <tr>
                        <th>titre</th>
                        <td><?php echo $reclamations->titre?></td>
                        </tr>
                        <tr>
                        <th>contenu</th>
                        <td><?php echo $reclamations->contenu?></td>
                        </tr>
                        <tr>
                        <th>date de soumission</th>
                        <td><?php echo $reclamations->date?> </td>
                        </tr>
                        <tr>
                        <th>etat</th>
                        <td>
                                <?php if ($reclamations->etat == 1): ?>
                                    <span class="badge bg-label-success">Traité</span>
                                <?php elseif ($reclamations->etat == 0): ?>
                                    <span class="badge bg-label-danger">Non traité</span>
                                <?php endif; ?>
                                </td>
                        </tr>
                      
                    </tbody>
                </table>
                <?php if ($reclamations->etat == 0): ?>
                    <div class='container-p-y d-flex justify-content-center'>
                        <a href="<?php echo base_url('listeReclamation/traite/'.$reclamations->id)?>" class='deleteBtn'>
                            <span class="badge bg-label-success me-1"><i class='bx bxs-check-square'></i> Traiter</span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
          </div>
      </div>
    </div>
    </div>
</div>



