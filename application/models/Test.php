<?php 

class Test extends CI_Model {
    public function insert($data){
        $this->db->insert('demande',$data);
    }
    
    public function getDemandes(){
        $query= $this->db->get('demande');
        return $query->result();
    }

    public function getDemandeById($id){
        $query= $this->db->get_where('demande',['id'=>$id]);
        return $query->row();
    }

    
   
}