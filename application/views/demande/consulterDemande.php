<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mx-auto " >
        <div class="card-body">
        <div class="card mx-auto" style="width: 400px;">
    <div class="card-body">
        <h4 class="card-title text-center">Demande d'inscription  <?php echo $demande->id; ?></h4>
        
        <div class="demande">
            <strong>Prénom Parent:</strong> <?php echo $demande->prenomParent; ?><br>
            <strong>Nom Parent:</strong> <?php echo $demande->nomParent; ?><br>
            <strong>CIN:</strong> <?php echo $demande->cin; ?><br>
            <strong>Téléphone:</strong> <?php echo $demande->telephone; ?><br>
            <strong>Email:</strong> <?php echo $demande->email; ?><br>
            <strong>Adresse:</strong> <?php echo $demande->adresse; ?><br>
            <strong>Prénom Enfant:</strong> <?php echo $demande->prenomEnfant; ?><br>
            <strong>Nom Enfant:</strong> <?php echo $demande->nomEnfant; ?><br>
            <strong>Sexe:</strong> <?php echo $demande->sexe; ?><br>
            <strong>Date de Naissance:</strong> <?php echo $demande->dateNaissance; ?><br>
            <strong>Date:</strong> <?php echo $demande->date; ?><br>
            <strong>État:</strong>
            <?php if ($demande->etat == 1): ?>
                <span class="badge bg-label-success">Acceptée</span>
            <?php elseif ($demande->etat == 0): ?>
                <span class="badge bg-label-danger">Réfusé </span>
                <?php elseif($demande->etat == 3):  ?>
                <span class="badge bg-label-info ">En cours </span>
            <?php else : ?>
                <span class="badge bg-label-warning">En attente </span>
            <?php endif; ?>

        </div >
        <br><div>
        <?php if ($demande->etat == 3): ?>
            <button onclick="window.location.href = '<?php echo site_url('demande/finaliser/'.$demande->id); ?>'" class="btn btn-success">Accepter demande</button>
            <button class="btn btn-danger">Refuser demande</button>
        <?php elseif ($demande->etat == 2): ?>
            <button class="btn btn-primary">finaliser demande</button>
            <button class="btn btn-danger">Refuser demande</button>
        <?php endif; ?>
</div>
    </div>
</div>


        </div>
    </div>
</div>