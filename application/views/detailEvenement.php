<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto">
      <div class="card-body">
        <h4 class="card-title text-center mb-4">Détails de l'événement</h4>
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <th scope="row">Nom</th>
                  <td><?php echo $evenement->nom; ?></td>
                </tr>
                <tr>
                  <th scope="row">Date d'événement</th>
                  <td><?php echo $evenement->dateEvenement; ?></td>
                </tr>
                <tr>
                  <th scope="row">Description</th>
                  <td><?php echo $evenement->description; ?></td>
                </tr>
                <tr>
                  <th scope="row">Lieu</th>
                  <td><?php echo $evenement->lieu; ?></td>
                </tr>
                <tr>
                  <th scope="row">Organisateur</th>
                  <td><?php echo $evenement->organisateur; ?></td>
                </tr>
                <tr>
                  <th scope="row">Obligation d'inscription</th>
                  <td>
                    <?php echo $evenement->avecInscri == 1 ? 'Oui' : 'Non'; ?>
                  </td>
                </tr>
                <?php if ($evenement->avecInscri == 1) { ?>
                <tr>
                  <th scope="row">Nombre maximal des places</th>
                  <td><?php echo $evenement->nbreMax; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <br>
            <div class="text-center">
              <a class="btn btn-primary" href="<?php echo base_url('listeEvenement'); ?>">Retour</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
