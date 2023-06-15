<?php 

class Gratification extends CI_Model {

    public function inserer($data){
        return $this->db->insert('gratification', $data);
        
    }

    public function lister(){
        $this->db->select('gratification.*,eleve.nom,eleve.prenom');
        $this->db->join('eleve', 'eleve.id = gratification.id_eleve');
        $query= $this->db->get('gratification');
        return $query->result();
    }



    public function modifierGratification($data,$id){
        return $this->db->update('gratification', $data,['id'=>$id]); 
    }

    public function supprimer($id){
        return $this->db->delete('gratification',['id'=>$id]);
    }


}