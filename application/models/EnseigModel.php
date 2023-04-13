<?php 
class EnseigModel extends CI_Model {
    public function creer($data)
    {
        return $this->db->insert('enseignants',$data);
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
        $this->db->where('id NOT IN (SELECT idProfil FROM users WHERE idProfil IS NOT NULL)');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function getById($id){
        $this->db->where('id',$id);
        $query= $this->db->get('enseignants');
        return $query->row();
    }
    
    public function modifierEnseignant($data,$id){
        return $this->db->update('enseignants',$data,['id'=>$id]);
        
    }
}