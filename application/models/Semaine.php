<?php 

class Semaine extends CI_Model {
    
    public function inserer($data){
        $this->db->insert('semaine',$data);
    }

    public function lister(){
        $query= $this->db->get('semaine');
        return $query->result();
    }

    public function consulter($id){
        $query = $this->db->get_where('semaine',['id'=>$id]);
        return $query->row();        
    }

    public function modifier($data,$id){
        return $this->db->update('semaine', $data,['id'=>$id]); 
    }

}