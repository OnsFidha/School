<?php 
class MatiereModel extends CI_Model {
    public function creer($data)
    {
        return $this->db->insert('matieres',$data);
    }
    public function supprimer($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("matieres");
    } 
    public function getSelectedMatieresByEnseignant($id_enseignant) 
    {
        $this->db->select(' matieres.*');
        $this->db->from('matieres');
        $this->db->join('mat-enseig', 'matieres.id = mat-enseig.id_matiere');
        $this->db->where('mat-enseig.id_enseignant', $id_enseignant);
        $query = $this->db->get();
        return $query->result();
    }
    public function getAll()
    {
        $query= $this->db->get('matieres');
        return $query->result();
    }
    public function getById($id)
    {
        $this->db->where('id',$id);
        $query= $this->db->get('matieres');
        return $query->row();
    } 
    public function modifierMatiere($data,$id)
    {
        return $this->db->update('matieres',$data,['id'=>$id]);
        
    }
    public function get_matieres_par_eleve_trimestre($id_eleve, $trimestre,$id) 
    {
        // Retrieve subjects for the student and trimester
        $this->db->select('matieres.id, matieres.nom, matieres.regroupement, matieres.coefficient, evaluation.note, evaluation.appréciation');
        $this->db->from('matieres');
        $this->db->join('emplois', 'matieres.id = emplois.id_matiere');
        $this->db->join('eleve', 'emplois.id_classe = eleve.id_classe');
        $this->db->join('evaluation', 'matieres.id = evaluation.id_matiere AND eleve.id = evaluation.id_eleve AND evaluation.trimestre = '.$trimestre, 'left');
        $this->db->where('eleve.id', $id_eleve);
        $this->db->group_by('matieres.id, matieres.nom, matieres.regroupement, matieres.coefficient, evaluation.note, evaluation.appréciation');
        $query = $this->db->get();
        $result = $query->result_array();
        
        $matieres = array();
        foreach ($result as $row) {
            $matiere_id = $row['id'];
            $matieres[$matiere_id]['nom'] = $row['nom'];
            $matieres[$matiere_id]['regroupement'] = $row['regroupement'];
            $matieres[$matiere_id]['coefficient'] = $row['coefficient'];
            $matieres[$matiere_id]['note'] = $row['note'];
            $matieres[$matiere_id]['appréciation'] = $row['appréciation'];
        }
        
        // Retrieve minimum and maximum notes for each subject in the class
        $notes_min_max = $this->get_notes_min_max_par_matiere_classe($id);
        
        // Merge the two arrays to include note min and note max in the subjects array
        foreach ($matieres as $matiere_id => $matiere) {
            if (isset($notes_min_max[$matiere_id])) {
                $matieres[$matiere_id]['note_min'] = $notes_min_max[$matiere_id]['note_min'];
                $matieres[$matiere_id]['note_max'] = $notes_min_max[$matiere_id]['note_max'];
            } else {
                $matieres[$matiere_id]['note_min'] = null;
                $matieres[$matiere_id]['note_max'] = null;
            }
        }
        
        return $matieres;
    }
    public function get_notes_min_max_par_matiere_classe($id_classe) 
    {
        $this->db->select('matieres.id, matieres.nom, MIN(evaluation.note) as note_min, MAX(evaluation.note) as note_max');
        $this->db->from('matieres');
        $this->db->join('emplois', 'matieres.id = emplois.id_matiere');
        $this->db->join('eleve', 'emplois.id_classe = eleve.id_classe');
        $this->db->join('evaluation', 'matieres.id = evaluation.id_matiere AND eleve.id = evaluation.id_eleve', 'left');
        $this->db->where('eleve.id_classe', $id_classe);
        $this->db->group_by('matieres.id, matieres.nom');
        $query = $this->db->get();
        $result = $query->result_array();
        
        $matieres = array();
        foreach ($result as $row) {
            $matiere_id = $row['id'];
            $matieres[$matiere_id]['nom'] = $row['nom'];
            $matieres[$matiere_id]['note_min'] = $row['note_min'];
            $matieres[$matiere_id]['note_max'] = $row['note_max'];
        }
        
        return $matieres;
    }
}