<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-auto " >
    <div class="card-body" >
            <h4 >Liste des clubs</h4>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <a href="<?php echo base_url('club/creer')?>" class="badge bg-label-primary me-1">Ajouter Club</a>
                    </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>description</th>
                                        <th>Chef</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    foreach ($club as $row) {
                                        //echo $row->id_enseignant;

                                        $this->db->select('enseignants.nom, enseignants.prenom');
                                        $this->db->from('enseignants');
                                        $this->db->join('club', 'club.id_enseignant= enseignants.id');
                                        $this->db->where('club.id', $row->id);
                                        $query = $this->db->get();
                                        //echo $query->num_rows() ;
                                        $enseignant_nom = "";
                                        //$query->row()->nom
                                        $enseignant_prenom = "";
                                        if($query->num_rows() >0){
                                            $enseignant_nom = $query->row()->nom;
                                            $enseignant_prenom = $query->row()->prenom;
                                        }
                                        ?>  
                                        <tr>
                                            <td><?php echo $row->id;?></td>
                                            <td><?php echo $row->nom;?></td>
                                            <td><?php echo $row->description;?></td>
                                            <td><?php echo $enseignant_nom." ".$enseignant_prenom; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('club/consulter/'.$row->id.'?mode=consulter')?>"><span class="badge bg-label-info me-1"><i class='bx bx-info-circle'></i></a>
                                                <a href="<?php echo base_url('club/modconst/'.$row->id.'?mode=modconst')?>"><span class="badge bg-label-warning me-1"><i class='bx bxs-edit'></i></a>
                                                <a href="<?php echo base_url('club/supprimer/'.$row->id)?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce Club ?')"><span class="badge bg-label-danger me-1"><i class='bx bx-trash'></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>