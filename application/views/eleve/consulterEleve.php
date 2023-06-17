<body>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
      <div class="card-body" >
          <h5 class="card-header">
            <?php echo $eleve->nom?>
            <?php echo $eleve->prenom?>
          </h5>
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <?php  if ($eleve->photo): ?>
                    <img style='width:105px;height:105px'src="data:image;base64,<?php echo $eleve->photo; ?>" alt="Photo">
                <?php endif; ?>            
            </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-borderless">
                <thead>
                  <br>
                      </thead>        
                      <tbody>  
                        <tr>
                        <th>Date de naissance</th>
                        <td><?php echo $eleve->dateNaissance?></td>
                        </tr>
                        <tr>
                        <th>Age</th>
                        <td><?php echo $eleve->age?> ans</td>
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
                        <td><?php echo $dossier->taille?> cm</td>
                        </tr>
                        <tr>
                        <th>Poids</th>
                        <td><?php echo $dossier->poids?> Kg</td>
                        </tr>
                    </tbody>
              </table>
            </div>
            </div>
      </div>
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
                      <div class="content-wrapper">
                        <?php if (empty($f)): ?>
                            Non disponible
                        <?php else: ?>
                            <div class="row">
                                <?php foreach ($f as $row): ?>
                                    <div class="col-md-6">
                                        <div class="card shadow-none bg-transparent border border-danger mb-3" style="padding:10px">
                                            <div class="card-body">
                                                <p class="card-text">L'élève <?php echo $row->eleve_nom .' '.$row->eleve_prenom; ?> est absent le <?php echo date('d/m/Y', strtotime($row->date)); ?> à <?php echo date('H:i', strtotime($row->date)); ?> </p>
                                                <p class="card-text">Pour le cours de <?php echo $row->matiere_nom; ?> dispensé(e) par l'enseignant(e) <?php echo $row->enseignant_nom.' '.$row->enseignant_prenom; ?>.</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php endif;?>
                            </div>

                      </div>

                        <p class="mb-0">
                        <br><br><br><br><br>
                        </p>
                      </div>
                      <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                        <p>
                          Notes 
                          <div class="card-body">
                                  
                                  <a href="<?php echo base_url('eleve/bul/'.$row->id.'/1')?>" class="card-link">consuter bulletin de notes tri 1</a><br>
                                  <a href="<?php echo base_url('eleve/bul/'.$row->id.'/2')?>" class="card-link">consuter bulletin de notes tri 2</a><br>
                                  <a href="<?php echo base_url('eleve/bul/'.$row->id.'/3')?>" class="card-link">consuter bulletin de notes tri 3</a>
  
                                  </div>
                        </p>
                        <p class="mb-0">
                          <br><br><br>
                        </p>
                      </div>
                      <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
                          <div class="content-wrapper">
                                <?php if (empty($emplois)): ?>
                                    Non disponible
                                <?php else: ?>
                                  <h4 class="text-center">Emplois du temps de la classe <?php echo $emplois[0]->nom?></h4>
                                  </br>
                                  <div class ="card-header">
                                  <h6  style="text-align: right; padding-right: 50px;">  Salle numéro <?php echo $emplois[0]->salle_classe?></h6><br>
                                      <div class="table-responsive">
                                
                                          <table class="table table-bordered text-center">
                                          <thead>
                                                  <tr class="bg-light-gray">
                                                      <th class="text-uppercase">Temps</th>
                                                      <th class="text-uppercase">Lundi</th>
                                                      <th class="text-uppercase">Mardi</th>
                                                      <th class="text-uppercase">Mercredi</th>
                                                      <th class="text-uppercase">Jeudi</th>
                                                      <th class="text-uppercase">Vendredi</th>
                                                      <th class="text-uppercase">Samedi</th>
                                                  </tr>
                                          </thead>
                                          <tbody>
                                          <style>
                                                      table td, table th {
                                                          padding: 30px;
                                                          width: 150px;
                                                          height: 60px;}
                                                  </style>
                                                              <tr>
                                                                  <td class="align-middle">08:00</td>
                                                                  <td class="bg-light-gray">
                                                                      <?php foreach($emplois as $row):
                                                                      if($row->jour=='lundi' && $row->heure_debut=='08:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?></td> 
                                                                  <td >
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='mardi' && $row->heure_debut=='08:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>'; endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='mercredi' && $row->heure_debut=='08:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>'; endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='jeudi' && $row->heure_debut=='08:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray" >
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='vendredi' && $row->heure_debut=='08:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                          
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='samedi' && $row->heure_debut=='08:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?></td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="align-middle">10:00</td>
                                                                  <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='lundi' && $row->heure_debut=='08:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?></td> 
                                                                  <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='mardi' && $row->heure_debut=='10:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='mercredi' && $row->heure_debut=='10:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';;
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='jeudi' && $row->heure_debut=='10:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='vendredi' && $row->heure_debut=='10:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='samedi' && $row->heure_debut=='10:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?></td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="align-middle">12:00</td>
                                                                  <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='lundi' && $row->heure_debut=='12:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?></td> 
                                                                  <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='mardi' && $row->heure_debut=='12:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='mercredi' && $row->heure_debut=='12:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='jeudi' && $row->heure_debut=='12:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='vendredi' && $row->heure_debut=='12:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='samedi' && $row->heure_debut=='12:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?></td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="align-middle">13:00</td>
                                                                  <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='lundi' && $row->heure_debut=='13:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?></td> 
                                                                  <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='mardi' && $row->heure_debut=='13:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='mercredi' && $row->heure_debut=='13:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='jeudi' && $row->heure_debut=='13:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='vendredi' && $row->heure_debut=='13:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='samedi' && $row->heure_debut=='13:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?></td>
                                                                      <tr>
                                                                  <td class="align-middle">15:00</td>
                                                                  <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='lundi' && $row->heure_debut=='15:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                          echo'<div style="margin-top: 10px;">'. $row->nom_enseignant . ' '.$row->prenom_enseignant
                                                                          .'</div>';
                                                                      endif; endforeach;?></td> 
                                                                  <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='mardi' && $row->heure_debut=='15:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                      echo $row->nom_enseignant . ' '.$row->prenom_enseignant;
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='mercredi' && $row->heure_debut=='15:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                      echo $row->nom_enseignant . ' '.$row->prenom_enseignant;
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='jeudi' && $row->heure_debut=='15:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                      echo $row->nom_enseignant . ' '.$row->prenom_enseignant;
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='vendredi' && $row->heure_debut=='15:00:00'):
                                                                          echo '<span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                                                          '.$row->nom_matiere.'</br></span>';
                                                                      echo $row->nom_enseignant . ' '.$row->prenom_enseignant;
                                                                      endif; endforeach;?>
                                                                  </td> <td class="bg-light-gray">
                                                                  <?php foreach($emplois as $row):
                                                                      if($row->jour=='samedi' && $row->heure_debut=='15:00:00'):
                                                                      echo $row->nom_matiere .'</br>';
                                                                      echo $row->nom_enseignant . ' '.$row->prenom_enseignant;
                                                                      endif; endforeach;?></td>
                                                              </tr>
                                                              
                                                          </tbody>
                                          </table> 
                                      </div>
                                  </div>
                                  <?php endif ;?>
                          </div>
                        <p class="mb-0">
                          <br><br><br>
                        </p>
                      </div>
                    </div>
                  </div>
   
      </div>
    </div>
</div>



</body>