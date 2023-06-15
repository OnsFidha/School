<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto ">
    <div class="card-body" >
    <h4 class="f text-center "> Ajouter un emplois de temps</h4>
        <div class="container">
        <div class="row">
        <div class="mb-3 col-md-3">
          <form >
            <label for="classe" class="form-label">classe</label>
            <select name="classe" id="classe" class="select form-select">
                <option value=""></option>
                <optgroup label="préscolaire">
                    <?php foreach($classes as $row): ?>
                        <?php if ($row->niveau == 'préscolaire'): ?> 
                            <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                        <?php endif; ?> 
                    <?php endforeach; ?>
                </optgroup>
                <optgroup label="1ère">
                    <?php foreach($classes as $row): ?>
                        <?php if ($row->niveau == '1ere'): ?> 
                            <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                        <?php endif; ?> 
                    <?php endforeach; ?>
                </optgroup>
                <optgroup label="2ème">
                    <?php foreach($classes as $row): ?>
                        <?php if ($row->niveau == '2eme'): ?> 
                            <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                        <?php endif; ?> 
                    <?php endforeach; ?>
                </optgroup>
                <optgroup label="3ème">
                    <?php foreach($classes as $row): ?>
                        <?php if ($row->niveau == '3eme'): ?> 
                            <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                        <?php endif; ?> 
                    <?php endforeach; ?>
                </optgroup>
                <optgroup label="4ème">
                    <?php foreach($classes as $row): ?>
                        <?php if ($row->niveau == '4eme'): ?> 
                            <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                        <?php endif; ?> 
                    <?php endforeach; ?>
                </optgroup>
                <optgroup label="5ème">
                    <?php foreach($classes as $row): ?>
                        <?php if ($row->niveau == '5eme'): ?> 
                            <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                        <?php endif; ?> 
                    <?php endforeach; ?>
                </optgroup>
                <optgroup label="6ème">
                    <?php foreach($classes as $row): ?>
                        <?php if ($row->niveau == '6eme'): ?> 
                            <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                        <?php endif; ?> 
                    <?php endforeach; ?>
                </optgroup>
            </select>
            <script>
                $(document).ready(function() {
                    $('#classe').select2({
                        theme: 'bootstrap'
                    });
                    
                    $('#classe').on('change', function() {
                        if($(this).val() == '') {
                            $('#popup-link').prop('disabled', true);
                        } else {
                            $('#popup-link').prop('disabled', false);
                        }
                        
                    var classe_id = $(this).val();
                        
                    $.ajax({
                        url: "<?php echo base_url(); ?>emploisContr/fetchClasse/" + classe_id,
                        method: "POST",
                        dataType: "json",
                        success: function(data) {
                            $('#annee_scolaire').val(data.annee_Scolaire);
                            }
                        });
                    });
                });
            </script>                 
            </div>
            <div class="mb-3 col-md-3"></div>
            <div class="mb-3 col-md-3"></div>
            <div class="mb-3 col-md-3">
                <label for="annee_scolaire" class="form-label">Année scolaire </label>
                    <input 
                    class="form-control"
                    type="text"
                    readonly
                    id="annee_scolaire"
                    name="annee_scolaire"
                    />
            </div>
                    </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="bg-light-gray">
                                <th class="text-uppercase">Temps
                                </th>
                                <th class="text-uppercase">Lundi</th>
                                <th class="text-uppercase">Mardi</th>
                                <th class="text-uppercase">Mercredi</th>
                                <th class="text-uppercase">Jeudi</th>
                                <th class="text-uppercase">Vendredi</th>
                                <th class="text-uppercase">Samedi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">08:00</td>
                                <td class="bg-light-gray">
                               <div class="margin-10px-top font-size14"></div>
                                    <div class="font-size13 text-light-gray"></div>
                                </td> 
                                <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> 
                            </tr>

                            <tr>
                                <td class="align-middle">10:00</td>
                                
                                <td class="bg-light-gray">

                                </td><td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> 
                               
                            </tr>

                            <tr>
                                <td class="align-middle">12:00</td>
                                <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> 
                            </tr>

                            <tr>
                                <td class="align-middle">13:00</td>
                                <td class="bg-light-gray">

                                </td>
                                <td class="bg-light-gray">

                                </td>  <td class="bg-light-gray">
                                <td class="bg-light-gray">

                                </td>  <td class="bg-light-gray">

                                </td>
                                </td>  <td class="bg-light-gray">

                                </td>
                            </tr>

                            <tr>
                                <td class="align-middle">14:00</td>
                                <td class="bg-light-gray">

                                </td>  <td class="bg-light-gray">

                                </td>  <td class="bg-light-gray">

                                </td>
                                <td class="bg-light-gray">

                                </td><td class="bg-light-gray">

                                </td> 
                                
                            </tr>
                            <tr>
                                <td class="align-middle">15:00</td>
                                <td class="bg-light-gray">
                                </td> 
                                <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> 
                            </tr>
                            <tr>
                                <td class="align-middle">17:00</td>
                                <td class="bg-light-gray">
                                </td> 
                                <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> <td class="bg-light-gray">

                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
                            </br>
             
            <button id="popup-link" href='' type='button'class="btn btn-primary" disabled>ajouter une séance</button>
            <script>
                $(document).ready(function() {
                    $("#popup-link").click(function() {
                        var id = $("#classe").val()
                        var url = "<?php echo base_url('emplois/add/'); ?>";
                        window.location.href = url+id ;
                    } ) 
                    });
            </script>

                        
        </div>     
                    </form>
    </div>
</div>