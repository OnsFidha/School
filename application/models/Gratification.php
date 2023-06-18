<?php 

class Gratification extends CI_Model {

    public function inserer($data){
        return $this->db->insert('gratification', $data);
        
    }
    public function get($idEleve) {
        $this->db->where('id_eleve', $idEleve);
        $query = $this->db->get('gratification');
        return $query->result();
    }
    public function lister() {
        $this->db->select('gratification.*, eleve.nom, eleve.prenom, classes.nom AS classeNom');
       
        $this->db->join('eleve', 'eleve.id = gratification.id_eleve');
        $this->db->join('classes', 'classes.id = eleve.id_classe');
        $query = $this->db->get('gratification');
        return $query->result();
    }
    



    public function modifierGratification($data,$id){
        return $this->db->update('gratification', $data,['id'=>$id]); 
    }

    public function supprimer($id){
        return $this->db->delete('gratification',['id'=>$id]);
    }


}