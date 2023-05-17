<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto ">
    <div class="card-body" >
    <h4 > Liste des évènements</h4>
        
        <div class ="card-header">
          <a href="<?php echo base_url('listeEvenement/ajouter')?>"><span class="badge bg-label-primary me-1">ajouter un évènement</span></a>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
               
                <th>Nom</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Organisateur</th>
                <th>Actions</th> 
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach($evenements as $row):?>
              
              <tr>
                  <td><?php  echo $row->nom;?></td>
                  <td><?php    echo $row->dateEvenement;?></td>
                  <td><?php    echo $row->lieu;?></td>
                  <td><?php    echo $row->organisateur;?></td>
             
                  <td> 
                  <a href="<?php echo base_url('listeEvenement/details/'.$row->id) ?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                  <a href="<?php echo base_url('listeEvenement/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                  <a class="deleteBtn" href="<?php echo base_url('listeEvenement/supprimer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                </td>
                <script>
                    $(document).ready(function() {
                    $('.deleteBtn').click(function(e) {
                      e.preventDefault();

                      Swal.fire({
                        title: 'Êtes-vous sûr de vouloir supprimer cet évènement ?',
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
              </tr>
                    <?php endforeach;?>
            </tbody>
          </table>
        </div>
    </div>
    </div>
    </div>
</div>