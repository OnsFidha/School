<?php 
class classeModel extends CI_Model {
    public function creer($data)
    {
        return $this->db->insert('classes',$data);
    }
    public function supprimer($id){
        $this->db->where("id", $id);
        return $this->db->delete("classes");
        
    }
    public function selectAll(){
        $query= $this->db->get('classes');
        return $query->result();
    }
    public function selectById($id){
        $this->db->where('id',$id);
        $query= $this->db->get('classes');
        return $query->row();
    }
    public function modifierClasse($data,$id){
        return $this->db->update('classes',$data,['id'=>$id]);
        
    }
    public function getClassesByYear() {
        $y = date('Y');
        $y1 = $y + 1;
        $y2 = $y - 1;
        $currentYear=$y . '/' . $y1;
        $nextYear=$y2 . '/' . $y;
        $this->db->select('*');
        $this->db->from('classes');
        $this->db->where('annee_Scolaire ', $currentYear);
        $this->db->or_where('annee_Scolaire ', $currentYear);
        
        $query = $this->db->get();
        return $query->result();
    }
    public function getClasseByEnseignant($id_enseignant) {
        $this->db->from('classes');
        $this->db->join('classe-enseig', 'classes.id = classe-enseig.id_classe');
        $this->db->where('classe-enseig.id_enseignant', $id_enseignant);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        
    } 
    public function getClassesByEnseig($id) 
    {    $y = date('Y');
        $y1 = $y + 1;
        $y2 = $y - 1;
        $currentYear=$y . '/' . $y1;
        $nextYear=$y2 . '/' . $y;
        $query = $this->db->query("SELECT e.*
        FROM classes e
        JOIN `classe-enseig` em ON e.id = em.id_classe
        WHERE em.id_enseignant ='$id' and annee_Scolaire ='$currentYear' 
         or annee_Scolaire=' $currentYear'");
        return $query->result();
    }
    
}