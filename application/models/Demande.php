<?php 

class Demande extends CI_Model {

    public function insert($data)
    {
        $this->db->insert('demande',$data);
    }
    public function getDemandes()
    {
        $query= $this->db->get('demande');
        return $query->result();
    }

    public function getDemandeById($id)
    {
        $query= $this->db->get_where('demande',['id'=>$id]);
        return $query->row();
    }

    public function updateDemandeEtat($id, $etat)
    {
        $data = ['etat' => $etat];
        $this->db->where('id', $id);
        $this->db->update('demande', $data);
    }

    public function updateDemande($id,$data)
    {
        return $this->db->update('demande', $data,['id'=>$id]); 
    }


    
   
}