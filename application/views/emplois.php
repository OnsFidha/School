
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
             
            <button class="btn btn-primary d-grid" >ajouter une séance</button>
            
            </div>
            
            </div>
            
    </div>
</div>