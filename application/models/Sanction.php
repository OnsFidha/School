<?php 

class Sanction extends CI_Model {

    public function inserer($data){
        return $this->db->insert('sanction', $data);
        
    }

    public function lister()
    {
        $this->db->select('sanction.*,eleve.nom,eleve.prenom, classes.nom AS classeNom');
        $this->db->join('eleve', 'eleve.id = sanction.id_eleve');
        $this->db->join('classes', 'classes.id = eleve.id_classe');
        $query= $this->db->get('sanction');
        return $query->result();
    }
    public function get($idEleve) {
        $this->db->where('id_eleve', $idEleve);
        $query = $this->db->get('sanction');
        return $query->result();
    }
    public function modifierSanction($data,$id){
        return $this->db->update('sanction', $data,['id'=>$id]); 
    }

    public function supprimer($id){
        return $this->db->delete('sanction',['id'=>$id]);
    }


}