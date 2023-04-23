<?php 
class classeModel extends CI_Model {
    public function creer($data)
    {
        return $this->db->insert('classes',$data);
    }
    public function supprimer($id){
        $this->db->where("id", $id);
        return $this->db->delete("classes");
        
    }
    public function selectAll(){
        $query= $this->db->get('classes');
        return $query->result();
    }
 
    public function selectById($id){
        $this->db->where('id',$id);
        $query= $this->db->get('classes');
        return $query->row();
    }
    
    public function modifierClasse($data,$id){
        return $this->db->update('classes',$data,['id'=>$id]);
        
    }
}