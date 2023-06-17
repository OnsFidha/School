<?php 
class EnseigModel extends CI_Model {
    public function creer($data,$matieres,$classe)
    {
        $this->db->insert('enseignants',$data);
        $id = $this->db->insert_id();
        foreach($matieres as $m){
            $d=array(
                'id_matiere'=>$m,
                'id_enseignant'=>$id);
         $this->db->insert('mat-enseig',$d);
        }
        foreach($classe as $m){
            $d=array(
                'id_classe'=>$m,
                'id_enseignant'=>$id);
         $this->db->insert('classe-enseig',$d);

        }
        return true;
    }
    public function getClasseByEnseignant($id_enseignant) 
    {
        $this->db->from('classes');
        $this->db->join('classe-enseig', 'classes.id = classe-enseig.id_classe');
        $this->db->where('classe-enseig.id_enseignant', $id_enseignant);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    } 
    public function supprimer($id){
        $this->db->where("id", $id);
        return $this->db->delete("enseignants");
        
    }
    public function getAll(){
        $query= $this->db->get('enseignants');
        return $query->result();
    }
    public function getWithNoAcc(){
        $this->db->select('*');
        $this->db->from('enseignants');
        $this->db->where('id_user IS  NULL');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function getById($id) 
    {
        $this->db->where('id', $id);
        $query = $this->db->get('enseignants');
        $enseignant = $query->row();
        
        // Récupérer les matières
        $this->db->select('id_matiere');
        $this->db->where('id_enseignant', $enseignant->id);
        $query = $this->db->get('mat-enseig');
        $matieres = $query->result();
        $enseignant->matieres = array();
        foreach ($matieres as $m) {
            $enseignant->matieres[] = $m->id_matiere;
        }
        
        // Récupérer les classes
        $this->db->select('id_classe');
        $this->db->where('id_enseignant', $enseignant->id);
        $query = $this->db->get('classe-enseig');
        $classes = $query->result();
        $enseignant->classes = array();
        foreach ($classes as $c) {
            $enseignant->classes[] = $c->id_classe;
        }
        
        // Récupérer la moyenne des scores
        $this->db->select_avg('score');
        $this->db->where('id_enseignant', $id);
        $query = $this->db->get('score');
        $row = $query->row();
        $moyenneScore = $row->score;
        
        $enseignant->moyenneScore = $moyenneScore;
        
        return $enseignant;
    }    
    public function updateMatieres($idEnseignant, $selectedMatieres) 
    {
        // Delete existing matieres for the enseignant
        $this->db->where('id_enseignant', $idEnseignant);
        $this->db->delete('mat-enseig');
    
        // Insert the selected matieres for the enseignant
        foreach ($selectedMatieres as $matiere) {
            $data = array(
                'id_matiere' => $matiere,
                'id_enseignant' => $idEnseignant
            );
            $this->db->insert('mat-enseig', $data);
        }
    }
    public function updateClasses($idEnseignant, $selectedClasses) 
    {
        // Delete existing classes for the enseignant
        $this->db->where('id_enseignant', $idEnseignant);
        $this->db->delete('classe-enseig');
    
        // Insert the selected classes for the enseignant
        foreach ($selectedClasses as $classe) {
            $data = array(
                'id_classe' => $classe,
                'id_enseignant' => $idEnseignant
            );
            $this->db->insert('classe-enseig', $data);
        }
    }
    public function getByIdUser($id){
        $this->db->where('id_user',$id);
        $query= $this->db->get('enseignants');
        return $query->row();
    }
    public function modifierEnseignant($data,$id){
        return $this->db->update('enseignants',$data,['id'=>$id]);
        
    }
    public function nonChefEnseignants()
    {
        // Get the ids of the enseignants assigned to clubs
        $assignedEnseignantIds = $this->db->select('id_enseignant')->get('club')->result_array();
        $assignedEnseignantIds = array_column($assignedEnseignantIds, 'id_enseignant');

        // Get the enseignants that are not assigned to any club
        $this->db->where_not_in('id', $assignedEnseignantIds);
        $unassignedEnseignants = $this->db->get('enseignants')->result();

        return $unassignedEnseignants;
    }
    public function getType()
    {
        $query= $this->db->get('salaire');
        return $query->result();
    }

    public function getNumberOfTeachersPerClass()
    {
        $query = "SELECT c.nom AS classe_nom, COUNT(ce.id_enseignant) AS nombre_enseignants,
                  SUM(CASE WHEN e.genre = 'homme' THEN 1 ELSE 0 END) AS nombre_hommes,
                  SUM(CASE WHEN e.genre = 'femme' THEN 1 ELSE 0 END) AS nombre_femmes
                  FROM `classe-enseig` ce
                  INNER JOIN classes c ON ce.id_classe = c.id
                  INNER JOIN enseignants e ON ce.id_enseignant = e.id
                  GROUP BY c.nom";
    
        $result = $this->db->query($query);
    
        if (!$result) {
            die("Query failed: " . $this->db->error());
        }
    
        $teachersPerClass = array();
    
        $rows = $result->result_array();
        foreach ($rows as $row) {
            $classeNom = $row['classe_nom'];
            $nombreEnseignants = $row['nombre_enseignants'];
            $nombreHommes = $row['nombre_hommes'];
            $nombreFemmes = $row['nombre_femmes'];
    
            $teachersPerClass[$classeNom] = [
                'total' => $nombreEnseignants,
                'hommes' => $nombreHommes,
                'femmes' => $nombreFemmes
            ];
        }
    
        $result->free_result();
    
        return $teachersPerClass;
    }

}