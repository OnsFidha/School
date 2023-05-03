<?php 

class Facture extends CI_Model {
    
    public function consulter($id){
        $query = $this->db->get_where('facture',['id'=>$id]);
        return $query->row();        
    }


}