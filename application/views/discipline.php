<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mx-auto " >
            <div class="card-body " >
            <h4> Discipline</h4>
                <div class="card-body" style='padding-left: 250px;' >
                        <div class="col-md-4 col-lg-4 mb-3">
                        <div class="card h-100 card shadow-none bg-transparent border border-danger mb-3">
                            <div class="card-body ">
                        
                            
                            <p class="card-text">
                            <img class="card-img"  src="../assets/img/icons/brands/sanction.png" alt="Card image cap">
                            </p>
                            <div class='text-center'>
                            <a href="<?php echo base_url('sanction') ?>" class="btn btn-primary" style="background-color: #fc868e; border-color: pink; color: white;" >Sanctionner</a></div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card h-100">
                        <div class="card-body card shadow-none bg-transparent border border-success  ">
                    
                            
                            <p class="card-text">
                            <img class="card-img" src="../assets/img/icons/brands/medail.png" alt="Card image cap">
                            </p>
                            <div class=' text-center'>
                            <a href="<?php echo base_url('gratification') ?>" class="btn btn-success">Gratifier</a></div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
            <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="padding:10px"><br>
                    <h5 class="card-title text-center">Liste des sanctions</h5><br>
                    <?php foreach($sanction as $row):?>
                        <div class="card shadow-none bg-transparent border border-danger mb-3" style="padding:10px">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="level-ball text-center">
                                        <span class="badge badge-center rounded-pill " style="background-color: #fc868e; border-color: pink; color: white;"><?php echo $row->degre;?></span><br>
                                        <span class="lev-text">Degré</span>
                                    </div><br>
                                    <div class="misco-name text-center"><strong><?php echo $row->date?></strong></div>
                                    
                                </div>
                                <div class="col-md-9">
                                    <p><strong> <?php echo $row->remarque?></strong> </p>
                                    <div class="mis-info-box roundeed">
                                        <hr>
                                        <div class="report-by-box roundeed">
                                            <div class="row">      
                                                <div class="col-md-6">
                                                    <div class="mis-info-title">Type</div>
                                                    <span class="bg-red"><strong><?php echo $row->type; ?></strong></span>     
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="mis-repo-title">Elève</div>
                                                    <!-- <div class="mis-repo-image" style="background-image: url('/images/male-icon-large.png');"></div> -->
                                                    <div class="mis-repo-name">
                                                        <span><strong><?php echo $row->nom .'  '.$row->prenom?></strong></span>
                                                    
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div style='padding-left:75px'>   <br>  
                                            <a href="<?php echo base_url('sanction/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                                            <a class="deleteBtn" href="<?php echo base_url('sanction/effacer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                                            </div> 
                                        </div>   
                                        <script>
                                            $(document).ready(function() {
                                            $('.deleteBtn').click(function(e) {
                                                e.preventDefault();

                                                Swal.fire({
                                                title: 'Êtes-vous sûr de vouloir supprimer cette sanction ?',
                                                text: "Cette action ne peut pas être annulée !",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Oui, supprimez-le !'
                                                }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = $(this).attr('href');
                                                }
                                                })
                                            });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="padding:10px"><br>
                    <h5 class="card-title text-center">Liste des gratifications</h5><br>
                    <?php foreach($gratif as $row):?>
                        <div class="card shadow-none bg-transparent border border-success mb-3" style="padding:10px">
                            <div class="row">
                                <div class="col-md-3">
                                    <br>
                                    <div class="misco-name text-center"><strong><?php echo $row->date?></strong></div>  
                                </div>
                                <div class="col-md-9">
                                    <p><strong> <?php echo $row->remarque?></strong> </p>
                                    <div class="mis-info-box roundeed">
                                        <hr>
                                        <div class="report-by-box roundeed">
                                            <div class="row">      
                                                <div class="col-md-6">
                                                    <div class="mis-info-title">Type</div>
                                                    <span class="bg-red"><strong><?php echo $row->type; ?></strong></span>     
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="mis-repo-title">Elève</div>
                                                    <!-- <div class="mis-repo-image" style="background-image: url('/images/male-icon-large.png');"></div> -->
                                                    <div class="mis-repo-name">
                                                        <span><strong><?php echo $row->nom .'  '.$row->prenom?></strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style='padding-left:75px'>   <br>  
                                                <a href="<?php echo base_url('gratification/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                                                <a class="deletBtn" href="<?php echo base_url('gratification/effacer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                                            </div>
                                        </div>  
                                            <script>
                                                $(document).ready(function() {
                                                $('.deletBtn').click(function(e) {
                                                    e.preventDefault();

                                                    Swal.fire({
                                                    title: 'Êtes-vous sûr de vouloir supprimer cette gratification ?',
                                                    text: "Cette action ne peut pas être annulée !",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Oui, supprimez-le !'
                                                    }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = $(this).attr('href');
                                                    }
                                                    })
                                                });
                                                });
                                            </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>

</div>
    