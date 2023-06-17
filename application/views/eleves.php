
<div class="mb-3 col-md-5">
  <label for="id_eleve" class="form-label">élève</label>
  <select name="id_eleve" id="id_eleve"  data-placeholder="-- Select élève --" class="select2 form-select" >
    <option></option>
    <?php 
    if(!empty($eleves)){
      foreach ($eleves as $s){
          ?>
          <option value="<?php echo $s['id'] ?>"><?php echo $s['nom'] ?> <?php echo $s['prenom'] ?></option>
      <?php }
    }
    ?>
         <div class="mb-3 col-md-5">
                                            <label for="id_eleve" class="form-label">Matiere</label>
                                            <select name="id_matiere" id="id_matiere" data-placeholder="-- Select matiere --" class="select2 form-select">
                                                <option></option>
                                                <?php foreach ($matieres as $row) : ?>
                                                    <option value="<?php echo $row->id ?>"><?php echo $row->nom ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div> 
  </select>
  <script>
      $(document).ready(function() {
      $('#id_eleve').select2({
            theme: 'bootstrap'
      })
      $('#id_matiere').select2({
            theme: 'bootstrap'
      })
      
      });
  </script>
</div>