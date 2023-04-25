
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
                <div class="card-body" >
    <h4 class="fw-bold py-3 text-center "> Ajouter un emplois de temps</h4>
        <div class="container">
        <div class="row">
        <div class="mb-3 col-md-3">
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
                <div class="timetable-img text-center">
                    <img src="img/content/timetable.png" alt="">
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
                                <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">رياضيات </span>
                                    <div class="margin-10px-top font-size14">8:00-10:00</div>
                                    <div class="font-size13 text-light-gray">Ameni Hamdi</div>
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
             
                  <button id="popup-link" class="btn btn-primary" disabled>ajouter une séance</button>
                <div id="popup">
                    <div id="popup-container">
                        <div id="popup-content"></div>
                        <div id="popup-close">fermer</div>
                    </div>
                </div>
                <script>
              
    $(document).ready(function() 
    {
        // Afficher le formulaire dans une popup au clic sur le lien "ajouter une séance"
        $("#popup-link").click(function()
         {
            // Charger le contenu de la popup avec une requête AJAX
            $.ajax({
                url: '<?php echo base_url(); ?>emploisContr/btn',
                success: function(data) {
                    $("#popup-content").html(data);
                    $("#popup").show();

                        }
                    });
        })
        $("#form").submit(function(event) {
            event.preventDefault(); // prevent default form submission behavior

            $.ajax({
            url: '/emploisContr/add',
            type: 'post',
            data: $('#form').serialize(),
            success: function(response) {
                alert(response); // display success message
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error: ' + errorThrown); // display error message
            }
            });
        });
        $("#popup-close").click(function() 
        {
            $("#popup").hide();
        });

    });
</script>

                <style>
                        #popup {
                            display: none;
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0,0,0,0.5);
                        }
                        #popup-container {
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%,-50%);
                            width: 700px;
                            height: 500px;
                            background-color: #fff;
                            padding: 20px;
                            box-sizing: border-box;
                            text-align: center;
                            border-radius: 10px;
                            box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
                        }
                        #popup-close {
                            position: absolute;
                            top: 5px;
                            right: 10px;
                            cursor: pointer;
                        }
                </style>                
        </div>     
    </div>
</div>