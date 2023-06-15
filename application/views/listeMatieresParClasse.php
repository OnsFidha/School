<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mx-auto " >
            <div class="card-body" >
            <input type="number" value="<?php echo $idClasse?>" name="idClasse" id="idClasse" hidden>
       
            <h4>Liste des matières</h4>
            <div class='mb-3 col-md-2'>
                <select  name="matiere" id="matiere" data-placeholder="-- Select matiere--" class="select2 form-select">
                    <option></option>
                    <?php foreach ($matieres as $row) : ?>
                        <option value="<?php echo $row->id ?>"> <?php echo $row->nom  ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div id="resultat"></div>
            <script>
            $(document).ready(function() {
            $('#matiere').select2({
                theme: 'bootstrap'
            });

            $('#matiere').change(function() {
             var matiere = $('#matiere').val();
           //  alert(matiere)
             idClasse = $('#idClasse').val(); 
             $.ajax({
                url:"<?php echo base_url('BulletinController/ajouterBulletin'); ?>",
                type:'POST',
                data:{matiere:matiere , idClasse: idClasse},
                dataType:'json',
                success:function(response)
                {
                    if(response['eleves']){
                        $("#resultat").html(response['eleves']);
                        
                    }
                }
                });
            });
          });
        </script>
            </div>
        </div>
    </div>
</div>
