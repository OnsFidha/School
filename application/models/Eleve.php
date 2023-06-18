<?php 

class Eleve extends CI_Model {
  
    public function deleteEleve($id)
    {
        return $this->db->delete('eleve',['id'=>$id]);
    }
    public function updateEleve($data,$id)
    {
        return $this->db->update('eleve', $data,['id'=>$id]); 
    }
    public function getNumberOfStudentsPerClass()
    {
        $query = $this->db->select('c.nom AS classe_nom, COUNT(e.id_classe) AS nombre_eleves')
            ->from('classes c')
            ->join('eleve e', 'c.id = e.id_classe', 'left')
            ->group_by('c.id')
            ->get();
    
        if (!$query) {
            die("Query failed: " . $this->db->error());
        }
    
        $numberOfStudents = array();
    
        foreach ($query->result_array() as $row) {
            $classeNom = $row['classe_nom'];
            $nombreEleves = $row['nombre_eleves'];
    
            $numberOfStudents[$classeNom] = $nombreEleves;
        }
    
        return $numberOfStudents;
    }
    public function getEleveById($id)
    {
        $query = $this->db->get_where('eleve',['id'=>$id]);
        return $query->row();        
    }
    public function getEnfantsParent($id)
    {
        $query = $this->db->get_where('eleve',['id_parent'=>$id]);
        return $query->result();       
    }
    public function getEleves(){
        $query= $this->db->get('eleve');
        return $query->result();
    }
    public function getAlle()
    {
        $this->db->select('dossiermedical.allergies');
        $this->db->from('eleve');
        $this->db->join('dossiermedical', 'eleve.id_dossiermedical = dossierMedical.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function insertEleve($data)
    {
        return $this->db->insert('eleve', $data);
    }
    public function getEleveByClasse($id)
    {
        $this->db->select('eleve.*');
        $this->db->join('classes', 'eleve.id_classe = classes.id');
       $this->db->where("id_classe", $id);
        $query= $this->db->get('eleve');
        return $query->result_array();
    }
    public function calculerNombreEleves()
    {
        $totalEleves = $this->db->count_all('eleve');
    
        $this->db->where('sexe', 'Fille');
        $nombreElevesFilles = $this->db->count_all_results('eleve');
    
        $this->db->where('sexe', 'Garçon');
        $nombreElevesGarcons = $this->db->count_all_results('eleve');
    
        $resultat = array(
            'totalEleves' => $totalEleves,
            'nombreElevesFilles' => $nombreElevesFilles,
            'nombreElevesGarcons' => $nombreElevesGarcons
        );
    
        return $resultat;
    }
    
}