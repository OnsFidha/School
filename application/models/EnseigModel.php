<?php 
class EnseigModel extends CI_Model {
    public function creer($data,$matieres)
    {
        $this->db->insert('enseignants',$data);
        $id = $this->db->insert_id();
        foreach($matieres as $m){
            $d=array(
                'id_matiere'=>$m,
                'id_enseignant'=>$id);
         $this->db->insert('mat-enseig',$d);
        }
        return true;
    }
    public function supprimer($id){
        $this->db->where("id", $id);
        return $this->db->delete("enseignants");
        
    }
    public function getAll(){
        $query= $this->db->get('enseignants');
        return $query->result();
    }
    public function getWithNoAcc(){
        $this->db->select('*');
        $this->db->from('enseignants');
        $this->db->where('id_user IS  NULL');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function getById($id){
        $this->db->where('id',$id);
        $query= $this->db->get('enseignants');
        return $query->row();
    }
    public function getByIdUser($id){
        $this->db->where('id_user',$id);
        $query= $this->db->get('enseignants');
        return $query->row();
    }
    public function modifierEnseignant($data,$id){
        return $this->db->update('enseignants',$data,['id'=>$id]);
        
    }
    public function nonChefEnseignants()
    {
        // Get the ids of the enseignants assigned to clubs
        $assignedEnseignantIds = $this->db->select('id_enseignant')->get('club')->result_array();
        $assignedEnseignantIds = array_column($assignedEnseignantIds, 'id_enseignant');

        // Get the enseignants that are not assigned to any club
        $this->db->where_not_in('id', $assignedEnseignantIds);
        $unassignedEnseignants = $this->db->get('enseignants')->result();

        return $unassignedEnseignants;
    }
}