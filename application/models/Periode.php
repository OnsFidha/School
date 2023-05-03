<?php 

class Periode extends CI_Model {
    
    public function consulter($id){
        $query = $this->db->get_where('periode',['id'=>$id]);
        return $query->row();        
    }


}