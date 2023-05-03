<?php 

class Menu extends CI_Model {

    public function inserer($data){
        return $this->db->insert('menu', $data);
        
    }

    public function lister(){
        $query= $this->db->get('menu');
        return $query->result();
    }

    public function consulterMenuJour($id){
        $query = $this->db->get_where('menu',['id'=>$id]);
        return $query->row();        
    }

    public function consulterMenuSemaine($id){
        $query = $this->db->get_where('menu',['id_semaine'=>$id]);
        return $query->result();        
    }

    public function modifierMenu($data,$id){
        return $this->db->update('menu', $data,['id'=>$id]); 
    }

    public function modifierMenuSemaine($data,$id,$idSemaine){
        return $this->db->update('menu', $data,['id'=>$id,'id_semaine'=>$idSemaine]); 
    }


}