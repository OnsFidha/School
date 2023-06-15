<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto">
      <div class="card-body">
        <h3 class="card-header">
          <?php echo $enseignant->nom ?>
          <?php echo $enseignant->prenom ?>
        </h3>
        <style>
            .rating {
              display: inline-block;
            }

            .rating input[type="radio"] {
              display: none;
            }

            .rating label {
              display: inline-block;
              width: 40px;
              height: 40px;
              margin: 0;
              padding: 0;
              cursor: pointer;
              background-image:  url(<?php echo base_url('assets/img/icons/unicons/star.png'); ?>); /* Replace with your star image */
              background-size: cover;
            }

      

            .rating label:hover:before,
            .rating label:hover ~ label:before,
            .rating input[type="radio"]:checked ~ label:before {
              opacity: 1;
            }
          </style>
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
          <?php  if ($enseignant->photo): ?>
                      <img style='width:105px;height:105px'src="data:image;base64,<?php echo $enseignant->photo; ?>" alt="Photo">
                    <?php endif; ?>          </div> <br>
          <div class="table-responsive text-nowrap">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <th>Date de naissance</th>
                  <td><?php echo $enseignant->dateNaissance ?></td>
                </tr>
                <tr>
                  <th>Sexe</th>
                  <td><?php echo $enseignant->genre ?></td>
                </tr>
                <tr>
                  <th>Adresse</th>
                  <td><?php echo $enseignant->adresse ?></td>
                </tr>
                <tr>
                  <th>Téléphone</th>
                  <td><?php echo $enseignant->telephone ?></td>
                </tr>
                <tr>
                  <th>Type de salaire</th>
                  <td>
                    <?php if ($enseignant->typeSalaire == 1) : ?>
                      Menseul
                    <?php else : ?>
                      Horaire
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <th>Matieres</th>
                  <td>
                    <?php foreach ($matieres as $matiere) : ?>
                      <?php echo $matiere->nom ?><br>
                    <?php endforeach; ?>
                  </td>
                </tr>
                <tr>
                  <th>Classes</th>
                  <td>
                    <?php foreach ($classes as $classe) : ?>
                      <?php echo $classe->nom ?><br>
                    <?php endforeach; ?>
                  </td>
                </tr>
                <tr>
                  <th>Score</th>
                  <td>  
                  <div class="rating">
                  <?php
                  $moyenneEntiere = intval($enseignant->moyenneScore); // Récupérer la partie entière de la moyenne
                  for ($i = $moyenneEntiere; $i >= 1; $i--) {
                    $checked = ($i == $moyenneEntiere) ? 'checked' : ''; // Vérifier si le bouton radio doit être coché
                    ?>
                    <input type="radio" id="star<?= $i ?>" name="rating" value="<?= $i ?>" <?= $checked ?>>
                    <label for="star<?= $i ?>" title="<?= $i ?> stars"></label>
                  <?php } ?>
                </div>

                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        
       



        </div>
      </div>
    </div>
  </div>
</div>
