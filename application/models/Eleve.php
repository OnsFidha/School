<?php 

class Eleve extends CI_Model {
  
    public function deleteEleve($id){
        return $this->db->delete('eleve',['id'=>$id]);
    }
    public function updateEleve($data,$id){
        return $this->db->update('eleve', $data,['id'=>$id]); 
    }

    public function getEleveById($id){
        $query = $this->db->get_where('eleve',['id'=>$id]);
        return $query->row();        
    }

    public function getEnfantsParent($id){
        $query = $this->db->get_where('eleve',['id_parent'=>$id]);
        return $query->result();       
    }

    public function getEleves(){
        $query= $this->db->get('eleve');
        return $query->result();
    }

    public function insertEleve($data){
        return $this->db->insert('eleve', $data);
    }
    public function getEleveByClasse($id){
        $this->db->select('eleve.*');
        $this->db->join('classes', 'eleve.id_classe = classes.id');
       $this->db->where("id_classe", $id);
        $query= $this->db->get('eleve');
        return $query->result_array();
    }
   
}