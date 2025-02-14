<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto ">
    <div class="card-body" >
        <h4 class="text-center">Emploi du temps de la classe <?php echo $emplois[0]->nom?></h4>
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
    </div>
    </div>
    </div>
</div>