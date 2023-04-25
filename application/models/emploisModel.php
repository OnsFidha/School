<?php 
class emploisModel extends CI_Model {
    public function creer($data)
    {
     return  $this->db->insert('emplois',$data);
        
    }
    public function supprimer($id){
        $this->db->where("id", $id);
        return $this->db->delete("emplois");
        
    }
    public function getAll(){
        $query= $this->db->get('emplois');
        return $query->result();
    }
   
    public function getById($id){
        $this->db->where('id',$id);
        $query= $this->db->get('emplois');
        return $query->row();
    }
    
    public function modifierEmplois($data,$id){
        return $this->db->update('emplois',$data,['id'=>$id]);
        
    }
}