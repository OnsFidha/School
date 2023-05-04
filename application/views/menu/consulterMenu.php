<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
        <div class="card-body" >
            <h4 > Menu cantine</h4>
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold py-3 mb-4"><span class="fw-light"></span>
                        <?php echo $semaine->nom?> 
                        Du <?php echo $semaine->dateDebut?>
                        Jusqu'au <?php echo $semaine->dateFin?>
                    
                    </h5>
                    <a href="<?php echo base_url('menu/notification/'.$semaine->id)?>" type="button" class="btn rounded-pill btn-danger">
                            <span class="tf-icons bx bx-bell"></span>&nbsp; Notifier</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <div class="card mt-3">
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
                                        <?php echo $menuLun->entree?>
                                    </td>
                                    <td>
                                        <?php echo $menuMar->entree?>
                                    </td>
                                    <td>
                                        <?php echo $menuMer->entree?>
                                    </td>
                                    <td>
                                        <?php echo $menuJeu->entree?>

                                    </td>
                                    <td>
                                        <?php echo $menuVen->entree?>

                                    </td>
                                    </tr>

                                    <tr>
                                        <td>Plat principal</td>
                                        <td>
                                            <?php echo $menuLun->platPrincipal?>
                                        </td>
                                        <td>
                                            <?php echo $menuMar->platPrincipal?>
                                        </td>
                                        <td>
                                            <?php echo $menuMer->platPrincipal?>
                                        </td>
                                        <td>
                                            <?php echo $menuJeu->platPrincipal?>
                                        </td>
                                        <td>
                                            <?php echo $menuVen->platPrincipal?>
                                        </td>
                                    </tr> 
                                    

                                    <tr>                                    
                                        <td>Dessert</td> 
                                        <td>
                                        <?php echo $menuLun->dessert?>
                                        </td>
                                        <td>
                                        <?php echo $menuMar->dessert?>
                                        </td>
                                        <td>
                                        <?php echo $menuMer->dessert?>
                                        </td>
                                        <td>
                                        <?php echo $menuJeu->dessert?>
                                        </td>
                                        <td>
                                        <?php echo $menuVen->dessert?>
                                        </td>                     
                                    </tr>
                                    <!-- <div class="mb-3 col-md-6"> -->
                                                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
                <br>
    </div>
    </div>
</div>