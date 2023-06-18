<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto ">
    <div class="card-body" >
    <h4> Liste des matiéres</h4>
     
   <br><br>
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
              <?php foreach($mat as $row):?>
            
            <tr>
                <td><?php    echo $row->nom;?></td>
                <td><?php    echo $row->coefficient;?></td>
                <td><?php    echo $row->nombre_heures;?> hr</td>
                <td>
                    <?php    echo $row->regroupement;?>
              </td>
      
    
            </tr>
                  <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
    </div>
</div>