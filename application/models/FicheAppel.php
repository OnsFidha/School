<?php 
class FicheAppel extends CI_Model {
public function creer($data)
    {
        return $this->db->insert_batch('ficheAppel',$data);
    }
    public function supprimer($id){
        $this->db->where("id_eleve", $id);
        return $this->db->delete("ficheAppel");
        
    }
    public function getAll(){
        $query= $this->db->get('ficheAppel');
        return $query->result();
    }
    public function getbyEleve($id){
        $query = $this->db->select('ficheAppel.*, eleve.nom AS eleve_nom, eleve.prenom AS eleve_prenom, matieres.nom AS matiere_nom, enseignants.nom AS enseignant_nom, enseignants.prenom AS enseignant_prenom')
        ->from('ficheAppel')
        ->join('eleve', 'eleve.id = ficheAppel.id_eleve')
        ->join('matieres', 'matieres.id = ficheAppel.id_matiere')
        ->join('enseignants', 'enseignants.id = ficheAppel.id_enseignant')
        ->where('ficheAppel.etat', 'absent')
        ->where('ficheAppel.id_eleve', $id)
        ->get();
    
    return $query->result();
    
    }
}