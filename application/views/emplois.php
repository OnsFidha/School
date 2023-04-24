
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
                <div class="card-body" >
    <h4 class="fw-bold py-3 text-center "> Ajouter un emplois des temps</h4>
        <div class="container">
        <div class="row">
        <div class="mb-3 col-md-3">
            <label for="classe" class="form-label">classe</label>
            <select name="classe" id="classe" class="select form-select">
                <option value=""></option>
                <optgroup label="préscolaire">
                    <?php foreach($classes as $row): ?>
                        <?php if ($row->niveau == 'prescolaire'): ?> 
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
                theme: 'bootstrap'})
                        });                    
            </script>                 
        </div>
        <div class="mb-3 col-md-3"></div>
        <div class="mb-3 col-md-3"></div>
        <div class="mb-3 col-md-3">
        <label for="classe" class="form-label">Année scolaire </label>
            <input 
            class="form-control"
            type="text"
            id="nom"
            value="<?= date('Y').'/' . (date('Y') + 1) ?>"
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
                                <td class="align-middle">09:00am</td>
                            </tr>

                            <tr>
                                <td class="align-middle">10:00am</td>
                                
                                <td class="bg-light-gray">

                                </td>
                               
                            </tr>

                            <tr>
                                <td class="align-middle">11:00am</td>
                               
                            </tr>

                            <tr>
                                <td class="align-middle">12:00pm</td>
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
                                <td class="align-middle">01:00pm</td>
                                <td class="bg-light-gray">

                                </td>  <td class="bg-light-gray">

                                </td>  <td class="bg-light-gray">

                                </td>
                                <td class="bg-light-gray">

                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
                            </br>
             
            <button id="popup-link" class="btn btn-primary d-grid" >ajouter une séance</button>
            <!DOCTYPE html>

            <div id="popup">
                <div id="popup-container">
                    <div id="popup-content"></div>
                    <div id="popup-close">fermer</div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                $("#popup-link").click(function() {
                    $.ajax({
                        url: '<?php echo base_url(); ?>emploisContr/btn',
                        success: function(data) {
                            $("#popup-content").html(data);
                            $("#popup").show();
                            $("#form-post").submit(function(e) {
                                e.preventDefault(); //prevent default form submission
                                $.ajax({
                                    url: '<?php echo base_url(); ?>emploisContr/post',
                                    type: 'post',
                                    data: $("#form-post").serialize(),
                                    success: function(response) {
                                        alert(response); //show success message
                                        $("#popup").hide(); //hide popup
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        alert('Error: ' + errorThrown); //show error message
                                    }
                                });
                            });
                        }
                    });
                });
                $("#popup-close").click(function() {
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