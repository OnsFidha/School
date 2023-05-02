<?php 
class MatiereModel extends CI_Model {
    public function creer($data)
    {
        return $this->db->insert('matieres',$data);
    }
    public function supprimer($id){
        $this->db->where("id", $id);
        return $this->db->delete("matieres");
        
    } 
    public function getSelectedMatieresByEnseignant($id_enseignant) {
        $this->db->select('matieres.id, matieres.nom');
        $this->db->from('matieres');
        $this->db->join('mat-enseig', 'matieres.id = mat-enseig.id_matiere');
        $this->db->where('mat-enseig.id_enseignant', $id_enseignant);
        $query = $this->db->get();
        return $query->result();
    }
    public function getAll(){
        $query= $this->db->get('matieres');
        return $query->result();
    }
    public function getById($id){
        $this->db->where('id',$id);
        $query= $this->db->get('matieres');
        return $query->row();
    } 

    
    public function modifierMatiere($data,$id){
        return $this->db->update('matieres',$data,['id'=>$id]);
        
    }
}