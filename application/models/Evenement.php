<?php 

class Evenement extends CI_Model {

    public function inserer($data){
       return $this->db->insert('evenement',$data);
    }

    public function lister(){
        $query= $this->db->get('evenement');
        return $query->result();
    }

    public function modifier($data,$id){
        return $this->db->update('evenement', $data,['id'=>$id]); 
    }

    public function consulter($id){
        $query = $this->db->get_where('evenement',['id'=>$id]);
        return $query->row();        
    }

    public function supprimer($id){
        return $this->db->delete('evenement',['id'=>$id]);
    }
}
