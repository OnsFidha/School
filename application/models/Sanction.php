<?php 

class Sanction extends CI_Model {

    public function inserer($data){
        return $this->db->insert('sanction', $data);
        
    }

    public function lister(){
        $this->db->select('sanction.*,eleve.nom,eleve.prenom');
        $this->db->join('eleve', 'eleve.id = sanction.id_eleve');
        $query= $this->db->get('sanction');
        return $query->result();
    }

    public function modifierSanction($data,$id){
        return $this->db->update('sanction', $data,['id'=>$id]); 
    }

    public function supprimer($id){
        return $this->db->delete('sanction',['id'=>$id]);
    }


}