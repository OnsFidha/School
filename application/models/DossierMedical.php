<?php 

class DossierMedical extends CI_Model {
    public function insertDossierMedical($data){
        return $this->db->insert('dossiermedical', $data);
    }
  
    // public function deleteEleve($id){
    //     return $this->db->delete('eleve',['id'=>$id]);
    // }
    public function updateDossierMedical($data,$id){
        return $this->db->update('dossiermedical', $data,['id'=>$id]); 
    }

    public function getDossierMedicalById($id){
        $query = $this->db->get_where('dossiermedical',['id'=>$id]);
        return $query->row();        
    }

    // public function getEleves(){
    //     $query= $this->db->get('eleve');
    //     return $query->result();
    // }

    
   
}