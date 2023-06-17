<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto ">
    <div class="card-body" >
    <h4 > Liste des comptes</h4>
      </br></br>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th style='color:black;font-weight:bolder'>nom</th>
                <th style='color:black;font-weight:bolder'>prenom</th>
                <th style='color:black;font-weight:bolder'>email</th>
                <th style='color:black;font-weight:bolder'> role</th>
                <th style='color:black;font-weight:bolder'>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach($users as $row):?>
              
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>  <?php    echo $row->nom;?></td>
                <td><?php    echo $row->prenom;?></td>
                <td><?php    echo $row->email;?></td>
                <td><?php    echo $row->role;?></td>
                <td>
                  <a href=""><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                  <a href="<?php echo base_url('listeComptes/modifier/'.$row->id) ?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                  <a class="deleteBtn" href="<?php echo base_url('listeComptes/supprimer/'.$row->id) ?>" ><span class="badge bg-label-danger me-1"><i class='bx bxs-trash'></i></a>
                </td>
              </tr>
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
                  <?php endforeach;?>
            </tbody>
          </table>
        </div>
    </div>
    </div>
    </div>
</div>