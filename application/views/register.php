<head>   
        <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
        <!-- Core CSS -->
        <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="../assets/css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
        <!-- Helpers -->
        <script src="../assets/vendor/js/helpers.js"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="../assets/js/config.js"></script>
</head>
<div class="container">
      <div class="authentication-wrapper authentication-basic ">
        <div class="authentication-inner">
            <div class="card ">
                <div class="card-body">
                <h4 class=" text-center mb-2">pour accéder a votre compte</br>merci de saisir vos coordonnées</h4>
                                            </br></br>
                <form id="form" class="mb-3" action="<?php echo base_url('register') ?>" method="POST">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nom"
                            name="nom"
                            value="<?php echo set_value('nom')?>"
                            placeholder="saisir votre nom"
                            autofocus
                        />
                        <small><?php echo form_error('nom'); ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input
                            type="text"
                            class="form-control"
                            id="prenom"
                            name="prenom"
                            value="<?php echo set_value('prenom')?>"
                            placeholder="saisir votre prenon"
                            autofocus
                        /> <small><?php echo form_error('prenom'); ?></small>
                        <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="text"
                            class="form-control"
                            id="email"
                            name="email"
                            value="<?php echo set_value('email')?>"
                            placeholder="saisir votre email"
                            autofocus
                        /> <small><?php echo form_error('email'); ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <div class="form-group">
                        <select  class="form-control" name="role" id="role">
                                <option value="">--choisir un profil--</option>
                                <option value="parent">parent</option>
                                <option value="admin">admin</option>
                                <option value="enseignant">enseignant</option>
                            </select></div>
                         <small><?php echo form_error('role'); ?></small>
                    </div>
                    <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="mot_de_passe">Mots de passe</label>
                    
                    </div>
                    <div class="input-group input-group-merge">
                        <input
                        type="password"
                        id="mot_de_passe"
                        class="form-control"
                        name="mot_de_passe"
                        placeholder=""
                        aria-describedby="password"
                      />
                    </div>  <small><?php echo form_error('mot_de_passe'); ?></small>
                    </div>
                    <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="Cmot_de_passe">resaisir le mots de passe</label>
                    
                    </div>
                    <div class="input-group input-group-merge">
                        <input
                        type="password"
                        id="Cmot_de_passe"
                        class="form-control"
                        name="Cmot_de_passe"
                        placeholder=""
                        aria-describedby="Cmot_de_passe"/>
                         
                    </div><small><?php echo form_error('Cmot_de_passe'); ?></small></div>
                    <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Se connecter</button>
                    </div>
                </form>
                </div>
            </div>
</div>
      </div></div>