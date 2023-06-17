<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto ">
    <div class="card-body" >
    <h4> Liste des matiéres</h4>
     
      <div class ="card-header">
        <a href="<?php echo base_url('listeMatieres/ajouter')?>"><span class="badge bg-label-primary me-1">ajouter une matiére</span></a>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th style='color:black;font-weight:bolder'>nom</th>
              <th style='color:black;font-weight:bolder'>coefficient</th>
              <th style='color:black;font-weight:bolder'>nombre_heures</th>
              <th style='color:black;font-weight:bolder'>regroupement</th>

            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
              <?php foreach($matieres as $row):?>
            
            <tr>
                <td><?php    echo $row->nom;?></td>
                <td><?php    echo $row->coefficient;?></td>
                <td><?php    echo $row->nombre_heures;?> hr</td>
                <td>
                    <?php    echo $row->regroupement;?>
              </td>
                <td> 
                <a href=""><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                <a href="<?php echo base_url('listeMatieres/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                <a class="deleteBtn" href="<?php echo base_url('listeMatieres/effacer/'.$row->id) ?>"><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
              </td>
              <script>
                  $(document).ready(function() {
                  $('.deleteBtn').click(function(e) {
                    e.preventDefault();

                    Swal.fire({
                      title: 'Êtes-vous sûr de vouloir supprimer ce compte ?',
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