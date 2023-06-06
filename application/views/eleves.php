
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
      
  </select>
  <script>
      $(document).ready(function() {
      $('#id_eleve').select2({
            theme: 'bootstrap'
      })
      });
  </script>
</div>