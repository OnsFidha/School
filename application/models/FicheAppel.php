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
}