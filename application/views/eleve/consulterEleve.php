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
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-s"
                          aria-controls="navs-top-s"
                          aria-selected="false"
                        >
                            Sanction
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
                      <div class="tab-pane fade " id="navs-top-s" role="tabpanel">
                      <div class="content-wrapper">
                      
                      <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="padding:10px"><br>
                             
                                    <h5 class="card-title text-center">Liste des sanctions</h5><br>
                                    <?php if (empty($sanction)): ?>
                                        Non disponible
                                    <?php else: ?>
                                    <?php foreach($sanction as $row):?>
                                        <div class="card shadow-none bg-transparent border border-danger mb-3" style="padding:10px">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="level-ball text-center">
                                                        <span class="badge badge-center rounded-pill " style="background-color: #fc868e; border-color: pink; color: white;"><?php echo $row->degre;?></span><br>
                                                        <span class="lev-text">Degré</span>
                                                    </div><br>
                                                    <div class="misco-name text-center"><strong><?php echo $row->date?></strong></div>
                                                    
                                                </div>
                                                <div class="col-md-9">
                                                    <p><strong> <?php echo $row->remarque?></strong> </p>
                                                    <div class="mis-info-box roundeed">
                                                        <hr>
                                                        <div class="report-by-box roundeed">
                                                            <div class="row">      
                                                                <div class="col-md-6">
                                                                    <div class="mis-info-title">Type</div>
                                                                    <span class="bg-red"><strong><?php echo $row->type; ?></strong></span>     
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="mis-repo-title">Elève</div>
                                                                    <!-- <div class="mis-repo-image" style="background-image: url('/images/male-icon-large.png');"></div> -->
                                                                    <div class="mis-repo-name">
                                                                        <span><strong><?php echo $row->nom .'  '.$row->prenom?></strong><br> classe<strong><br> <?php echo  $row->classeNom?></strong></span>
                                                                    
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div style='padding-left:75px'>   <br>  
                                                            <a href="<?php echo base_url('sanction/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                                                            <a class="deleteBtn" href="<?php echo base_url('sanction/effacer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                                                            </div> 
                                                        </div>   
                                                        <script>
                                                            $(document).ready(function() {
                                                            $('.deleteBtn').click(function(e) {
                                                                e.preventDefault();

                                                                Swal.fire({
                                                                title: 'Êtes-vous sûr de vouloir supprimer cette sanction ?',
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="padding:10px"><br>
                              
                                    <h5 class="card-title text-center">Liste des gratifications</h5><br>
                                    <?php if (empty($gratif)): ?>
                                        Non disponible
                                    <?php else: ?>
                                    <?php foreach($gratif as $row):?>
                                        <div class="card shadow-none bg-transparent border border-success mb-3" style="padding:10px">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <br>
                                                    <div class="misco-name text-center"><strong><?php echo $row->date?></strong></div>  
                                                </div>
                                                <div class="col-md-9">
                                                    <p><strong> <?php echo $row->remarque?></strong> </p>
                                                    <div class="mis-info-box roundeed">
                                                        <hr>
                                                        <div class="report-by-box roundeed">
                                                            <div class="row">      
                                                                <div class="col-md-6">
                                                                    <div class="mis-info-title">Type</div>
                                                                    <span class="bg-red"><strong><?php echo $row->type; ?></strong></span>     
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="mis-repo-title">Elève</div>
                                                                    <!-- <div class="mis-repo-image" style="background-image: url('/images/male-icon-large.png');"></div> -->
                                                                    <div class="mis-repo-name">
                                                                        <span><strong><?php echo $row->nom .'  '.$row->prenom?> </strong><br> classe<br> <strong><?php echo  $row->classeNom?></strong></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style='padding-left:75px'>   <br>  
                                                                <a href="<?php echo base_url('gratification/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                                                                <a class="deletBtn" href="<?php echo base_url('gratification/effacer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                                                            </div>
                                                        </div>  
                                                            <script>
                                                                $(document).ready(function() {
                                                                $('.deletBtn').click(function(e) {
                                                                    e.preventDefault();

                                                                    Swal.fire({
                                                                    title: 'Êtes-vous sûr de vouloir supprimer cette gratification ?',
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                      </div>
                        <p class="mb-0">
                        <br><br><br><br><br>
                        </p>
                      </div>
                    </div>
                  </div>
   
      </div>
    </div>
</div>



</body>