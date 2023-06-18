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
    public function getFiche(){
        $this->db->select('ficheAppel.*,classes.*,matieres.nom as nomMat');
        $this->db->from('ficheAppel');
        $this->db->join('classes', 'classes.id = ficheAppel.id_classe');
        $this->db->join('matieres', 'matieres.id = ficheAppel.id_matiere');
        $this->db->group_by('ficheAppel.id_classe');
        $query = $this->db->get();
        return $query->result();
    
    }
    public function getbyEleve($id)
    {
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

    
    public function getbyEleves($id)
    {
        $query = $this->db->select('ficheAppel.*, eleve.nom AS eleve_nom, eleve.prenom AS eleve_prenom, matieres.nom AS matiere_nom, enseignants.nom AS enseignant_nom, enseignants.prenom AS enseignant_prenom, DATE_FORMAT(emplois.heure_debut, "%H:%i") AS heure_debut')
        ->from('ficheAppel')
        ->join('eleve', 'eleve.id = ficheAppel.id_eleve')
        ->join('matieres', 'matieres.id = ficheAppel.id_matiere')
        ->join('enseignants', 'enseignants.id = ficheAppel.id_enseignant')
        ->join('emplois', 'emplois.id_classe = eleve.id_classe AND emplois.id_enseignant = ficheAppel.id_enseignant')
        ->where('ficheAppel.etat', 'absent')
        ->where('ficheAppel.id_eleve', $id)
        ->get();
    
        return $query->result();
    }
}