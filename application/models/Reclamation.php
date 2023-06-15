<?php 

class Reclamation extends CI_Model {

    public function inserer($data){
        return $this->db->insert('reclamation', $data);
        
    }
    public function lister(){
        $this->db->select('reclamation.*, parent.nom AS nomParent, parent.prenom AS prenomParent');
        $this->db->from('reclamation');
        $this->db->join('parent', 'reclamation.id_parent = parent.id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function updateEtat($id, $etat)
    {
        $data = ['etat' => $etat];
        $this->db->where('id', $id);
        $this->db->update('reclamation', $data);
    }
}