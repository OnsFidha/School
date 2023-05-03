<?php 

class Club extends CI_Model {

    public function inserer($data){
        $this->db->insert('club',$data);
    }

    public function listeClubs(){
        $query= $this->db->get('club');
        return $query->result();
    }

    public function modifier($data,$id){
        return $this->db->update('club', $data,['id'=>$id]); 
    }

    public function consulter($id){
        $query = $this->db->get_where('club',['id'=>$id]);
        return $query->row();        
    }

    public function supprimer($id){
        return $this->db->delete('club',['id'=>$id]);
    }
}
