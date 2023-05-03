
            <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="card mt-3">
                <form action =" <?php echo base_url('menu/modifier')?> " method="POST" enctype="multipart/form-data">

                    <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold py-3 mb-4"><span class="fw-light"></span> Menu Cantine</h4>
                    <button type="button" class="btn rounded-pill btn-danger">
                            <span class="tf-icons bx bx-bell"></span>&nbsp; Notifier
                    </button>
                    
                    </div>
                    <div class="card-body">
                        
                    <div class="row">
                        <div class="mb-3 col-md-6">
                        <div class="row">
                            <label  class="form-label col-md-3" for="dateDebutId">Du </label>
                            <div  class="dateDebutId col-md-6">
                            <input 
                                type="date"
                                id="dateDebutId"
                                name="dateDebut"
                                class="form-control phone-mask"
                                placeholder="15/05/6063"
                                value="<?php echo $semaine->dateDebut; ?>"

                            />
                            </div>
                            <small class="error"><?php echo form_error('dateDebut') ?></small>
                        </div>
                        </div>
                        <div class="mb-3 col-md-4" >
                        <div class="row">
                            <label  class="form-label col-md-3" for="dateFintId">Jusqu'au </label>
                            <div  class="dateFinId col-md-6">
                            <input 
                                type="text"
                                id="dateFinId"
                                name="dateFin"
                                class="form-control phone-mask"
                                placeholder="15/05/6063"
                                value="<?php echo $semaine->dateFin; ?>"

                            />
                            </div>
                        </div> 
                            <small class="error"><?php echo form_error('dateFin') ?></small>
                        </div>
                    </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Temps</th>
                                        <th>Lundi</th>
                                        <th>Mardi</th>
                                        <th>Mercredi</th>
                                        <th>Jeudi</th>
                                        <th>Vendredi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                    <td>Entrée</td> 
                                    <td>
                                        <input type="text" 
                                            name="entreeLun"
                                            placeholder="Salade mixte" 
                                            class="form-control phone-mask"
                                            value="<?php echo $menuLun->entree; ?>"
                                        >
                                        <small class="error"><?php echo form_error('entreeLun') ?></small>
                                    </td>
                                    <td>
                                        <input type="text" name="entreeMar" placeholder="Salade mixte"  class="form-control phone-mask"
                                        value="<?php echo $menuMar->entree; ?>"
                                        >
                                        <small class="error"><?php echo form_error('entreeMar') ?></small>

                                    </td>
                                    <td>
                                        <input type="text" name="entreeMer" placeholder="Salade mixte"  class="form-control phone-mask"
                                        value="<?php echo $menuMer->entree; ?>"
                                        >
                                        <small class="error"><?php echo form_error('entreeMer') ?></small>

                                    </td>
                                    <td>
                                        <input type="text" name="entreeJeu" placeholder="Salade mixte"  class="form-control phone-mask"
                                        value="<?php echo $menuJeu->entree; ?>"
                                        >
                                        <small class="error"><?php echo form_error('entreeJeu') ?></small>

                                    </td>
                                    <td>
                                        <input type="text" name="entreeVen" placeholder="Salade mixte"  class="form-control phone-mask"
                                        value="<?php echo $menuVen->entree; ?>"
                                        >
                                        <small class="error"><?php echo form_error('entreeVen') ?></small>

                                    </td>
                                    </tr>

                                    <tr>
                                    <td>Plat principal</td>
                                    <td>
                                        <input type="text" name="platLun" placeholder="Couccous"  class="form-control phone-mask"
                                        value="<?php echo $menuLun->platPrincipal; ?>"
                                        >
                                        <small class="error"><?php echo form_error('platLun') ?></small>

                                    </td>
                                    <td>
                                        <input type="text" name="platMar" placeholder="Couccous"  class="form-control phone-mask"
                                        value="<?php echo $menuMar->platPrincipal; ?>"
                                        >
                                        <small class="error"><?php echo form_error('platMar') ?></small>

                                    </td>
                                    <td>
                                        <input type="text" name="platMer" placeholder="Couccous"  class="form-control phone-mask"
                                        value="<?php echo $menuMer->platPrincipal; ?>"
                                        >
                                        <small class="error"><?php echo form_error('platMer') ?></small>

                                    </td>
                                    <td>
                                        <input type="text" name="platJeu" placeholder="Couccous"  class="form-control phone-mask"
                                        value="<?php echo $menuJeu->platPrincipal; ?>"
                                        >
                                        <small class="error"><?php echo form_error('platJeu') ?></small>

                                    </td>
                                    <td>
                                        <input type="text" name="platVen" placeholder="Couccous"  class="form-control phone-mask"
                                        value="<?php echo $menuVen->platPrincipal; ?>"
                                        >
                                        <small class="error"><?php echo form_error('platVen') ?></small>

                                    </td>
                                    </tr> 
                                    

                                    <tr>                                    
                                    <td>Dessert</td> 
                                    <td>
                                        <input type="text" name="dessertLun" placeholder="Yaourt"  class="form-control phone-mask"
                                        value="<?php echo $menuLun->dessert; ?>"
                                        >
                                        <small class="error"><?php echo form_error('dessertLun') ?></small>

                                    </td>
                                    <td>
                                        <input type="text" name="dessertMar" placeholder="Yaourt"  class="form-control phone-mask"
                                        value="<?php echo $menuMar->dessert; ?>"
                                        >
                                        <small class="error"><?php echo form_error('dessertMar') ?></small>

                                    </td>
                                    <td>
                                        <input type="text" name="dessertMer" placeholder="Yaourt"  class="form-control phone-mask"
                                        value="<?php echo $menuMer->dessert; ?>"
                                        >
                                        <small class="error"><?php echo form_error('dessertMer') ?></small>

                                    </td>
                                    <td>
                                        <input type="text" name="dessertJeu" placeholder="Yaourt"  class="form-control phone-mask"
                                        value="<?php echo $menuJeu->dessert; ?>"
                                        >
                                        <small class="error"><?php echo form_error('dessertJeu') ?></small>

                                    </td>
                                    <td>
                                        <input type="text" name="dessertVen" placeholder="Yaourt" class="form-control phone-mask"
                                        value="<?php echo $menuVen->dessert; ?>"
                                        >
                                        <small class="error"><?php echo form_error('dessertVen') ?></small>
                                    </td>                     
                                    </tr>
                                    <!-- <div class="mb-3 col-md-6"> -->
                                                              
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                          <input type="submit" class="btn btn-primary" value="modifier" />
                        </div>
            </form >

                </div>
                        
            </div>
         