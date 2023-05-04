<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto ">
    <div class="card-body" >
    <h4 > Modifier compte</h4>
      <form id="formAccountSettings" action="<?php echo base_url('listeComptes/editer/'.$user->id)?>" method="POST">
        <div class="row">
            <div class="mb-3 col-md-6">
              <label for="nom" class="form-label">nom</label>
              <input
                class="form-control"
                type="text"
                id="nom"
                value="<?php echo $user->nom; ?>"
                name="nom"
                autofocus
              />
              <small><?php echo form_error('nom'); ?></small>
            </div>
            <div class="mb-3 col-md-6">
              <label for="nom" class="form-label">prenom</label>
              <input
                class="form-control"
                type="text"
                id="nom"
                value="<?php echo $user->prenom; ?>"
                name="prenom"
                autofocus
              />
              <small><?php echo form_error('prenom'); ?></small>
            </div>
            <div class="mb-3 col-md-6">
              <label for="nom" class="form-label">email</label>
              <input
                class="form-control"
                type="text"
                id="nom"
                value="<?php echo $user->email; ?>"
                name="email"
                autofocus
              />
              <small><?php echo form_error('email'); ?></small>
            </div>
            <div class="mb-3 col-md-6">
              <label for="role" class="form-label">Role</label>
              <div class="form-group">
              <select  class="form-control" name="role" id="role">
                      <option value="">--choisir un profil--</option>
                      <option value="parent" <?php if ($user->role == 'parent') { echo 'selected'; }?>>parent</option>
                      <!-- <option value="admin" <?php if ($user->role == '') { echo 'selected'; }?>>admin</option> -->
                      <option value="enseignant"  <?php if ($user->role == 'enseignant') { echo 'selected'; }?>>enseignant</option>
                  </select></div>
              <small><?php echo form_error('role'); ?></small>
            </div>
            <!-- <div class="mb-3 form-password-toggle">
              <label class="form-label" for="mot_de_passe">Mot de passe actuel </label>
              <div class="input-group input-group-merge">
                  <input
                  type="password"
                  id="mot_de_passe"
                  class="form-control"
                  name="Amot_de_passe"
                  placeholder=""
                  aria-describedby="password"
                />
              </div>  <small><?php echo form_error('Amot_de_passe'); ?></small>
              </div>
              <div class="mb-3 col-md-6">         
                  <label class="form-label" for="mot_de_passe">Nouveau mot de passe </label>
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
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="Cmot_de_passe">confirmer mot de passe</label>
              <div class="input-group input-group-merge">
                  <input
                  type="password"
                  id="Cmot_de_passe"
                  class="form-control"
                  name="Cmot_de_passe"
                  placeholder=""
                  aria-describedby="Cmot_de_passe"/>
                  
              </div><small><?php echo form_error('Cmot_de_passe'); ?></small></div> 
            -->
            <div class="mt-2"><button type="submit" class="btn btn-primary ">modifier</button>
            </div>  
            <!-- <button type="reset" class="btn btn-outline-secondary">annuler</button> -->
        </div>
      </form>
    </div>
    </div>
    </div>
</div>
                