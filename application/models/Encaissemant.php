<?php 

class Encaissemant extends CI_Model {
    
    public function consulter($id){
        $query = $this->db->get_where('encaissement',['id'=>$id]);
        return $query->row();        
    }

    public function consulterSelonEleve($id){
        $query = $this->db->get_where('encaissement',['id_eleve'=>$id]);
        return $query->row();        
    }

    public function consulterSelonPeriode($id){
        $query = $this->db->get_where('encaissement',['id_periode'=>$id]);
        return $query->result();        
    }

    public function modifier($data,$id){
        return $this->db->update('encaissement', $data,['id'=>$id]); 
    }

    public function consulterSelonElevePeriode()
    {
        $this->db->select('encaissement.*, eleve.nom AS eleveNom, eleve.prenom AS elevePrenom, periode.nom AS periodeNom');
        $this->db->from('encaissement');
        $this->db->join('eleve', 'encaissement.id_eleve = eleve.id');
        $this->db->join('periode', 'encaissement.id_periode = periode.id');
        $query = $this->db->get();
        return $query->result();
    }
}