<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " style='width:750px'>
                <div class="card-body" >
    <h4 class="fw-bold py-3 text-center " > Ajouter un compte</h4>
 
                                           
                <form id="form" class="mb-3" action="<?php echo base_url('ajouterCompte/register') ?>" method="POST">
                        
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <div class="form-group">
                        <select  class="form-control" name="role" id="role">
                                <option value="">--choisir un role--</option>
                                <option value="parent">parent</option>
                                <option value="enseignant">enseignant</option>
                            </select></div>
                         <small><?php echo form_error('role'); ?></small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="role" class="form-label">Profile</label>
                        <div class="form-group">
                         <select class="form-control"  name="profil" id="profil">
                         <option value=""> -- choisir un profil --</option>
                            <?php foreach($enseignants as $row): ?>
                          
                         <option value="<?php echo $row->id ?>"><?php echo $row->email ?></option>
                         
                         <?php endforeach; ?> -->
                         <option value="parent">parent</option>
                    </select>
                     <!-- <?php if ($row->idProfil != 0): ?> 
                     <?php endif; ?>    -->
 
                    </div>
                        
                         <small><?php echo form_error('profil'); ?></small>
                    </div>
                
                    <button class="btn btn-primary d-grid" type="submit">Créér</button>
                    </div>
                </form>
                </div>
            </div>
    </div>
</div>