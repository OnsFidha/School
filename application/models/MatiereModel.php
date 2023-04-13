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