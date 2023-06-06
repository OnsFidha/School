<?php 
class emploisModel extends CI_Model {
    public function creer($data)
    {
        $this->db->insert('emplois',$data); 
        $id = $this->db->insert_id();
        $emplois=$this->getById($id);
        $idE=$emplois->id_enseignant;
        $idC=$emplois->id_classe;
        $this->db->where('id_enseignant',$idE);
        $this->db->where('id_classe',$idC);
        $query= $this->db->get('classe-enseig');
        $res= $query->row();
        if(!$res){
        $d=array(
            'id_classe'=>$idC,
            'id_enseignant'=>$idE);
     $this->db->insert('classe-enseig',$d);
        }
        return true;
    }
    public function check_class_availability($jour, $heure_debut, $heure_fin, $id_classe) {
        $query = $this->db->query("SELECT COUNT(*) AS count FROM emplois WHERE
         jour = '$jour' AND id_classe = '$id_classe'
           AND (heure_debut = '$heure_debut' OR  heure_fin = '$heure_fin' )");
        $result = $query->row();
        return $result->count ;
    }
    public function count_sessions($id_enseignant, $heure_debut, $heure_fin,$jour,$id_classe) {
        $query = $this->db->query("SELECT COUNT(*) AS num_sessions FROM emplois 
            WHERE id_enseignant = '$id_enseignant'
           
            AND (
            (heure_debut > '$heure_debut' AND heure_debut < '$heure_fin') OR
            (heure_fin > '$heure_debut' And heure_fin <= '$heure_fin') OR
            (heure_debut <= '$heure_debut' And heure_fin >= '$heure_fin')
            or( heure_debut = '$heure_debut' And heure_fin = '$heure_fin')
            or (heure_debut > '$heure_debut' and heure_fin < '$heure_fin')
        )
             AND jour='$jour'");
        $result = $query->row();
        return $result->num_sessions;
    }
    public function supprimer($id){
        $this->db->where("id", $id);
        return $this->db->delete("emplois");
    }
    public function getTeachersBySubject($matiere_id) {
        $query = $this->db->query("SELECT e.*
        FROM enseignants e
        JOIN `mat-enseig` em ON e.id = em.id_enseignant
        WHERE em.id_matiere ='$matiere_id'");
        return $query->result_array();
   
    }
    public function getAll(){
        $query= $this->db->get('emplois');
        return $query->result();
    }
    public function getByClass($id){
        $this->db->select('emplois.*,classes.nom,classes.salle_classe, matieres.nom as nom_matiere, enseignants.nom as nom_enseignant,enseignants.prenom as prenom_enseignant');
        $this->db->join('matieres', 'emplois.id_matiere = matieres.id');
        $this->db->join('classes', 'emplois.id_classe = classes.id');
        $this->db->join('enseignants', 'emplois.id_enseignant = enseignants.id');
        $this->db->where("id_classe", $id);
        $query= $this->db->get('emplois');
        return $query->result();
    }
    public function getById($id){
        $this->db->where('id',$id);
        $query= $this->db->get('emplois');
        return $query->row();
    } 
    public function modifierEmplois($data,$id){
        return $this->db->update('emplois',$data,['id'=>$id]);
        
    }
    public function checkMaxHours($id_matiere) {
        // récupération des informations de la matière
        $matiere = $this->db->get_where('matieres', array('id' => $id_matiere))->row();
        
        // calcul du nombre d'heures déjà étudiées pour cette matière
        $this->db->select_sum('duree');
        $this->db->from('seances');
        $this->db->where('id_matiere', $id_matiere);
        $query = $this->db->get();
        $total_hours = $query->row()->duree;
        
        // vérification si le nombre d'heures est supérieur au maximum autorisé
        if ($total_hours >= $matiere->max_hours) {
            return false; // nombre d'heures dépasse le maximum autorisé
        } else {
            return true; // nombre d'heures n'a pas dépassé le maximum autorisé
        }
    }
    public function getTotalDuration($id_matiere,$id_classe,$d,$f) {
        $query = $this->db->query("SELECT * FROM matieres 
            WHERE id = '$id_matiere'");
        $matiere = $query->row();
        $nombre_heures = $matiere->nombre_heures;
        $this->db->select('id_classe,SUM(TIMESTAMPDIFF(HOUR, heure_debut, heure_fin)) as total_seconds');
        $this->db->from('emplois');
        $this->db->where('id_matiere', $id_matiere);
        $this->db->where('id_classe', $id_classe);
        $this->db->group_by('id_classe');
        $query = $this->db->get();
            
        $total_seconds = 0;
        foreach ($query->result() as $row) {
            $total_seconds += $row->total_seconds;
            if ($total_seconds > $nombre_heures) {
                return "Error: Total duration of hours exceeded allowed amount.";
            }
        }
        $heure_debut = new DateTime($d);
        $heure_fin = new DateTime($f);
        
        // Calculate the difference
        $diff = $heure_debut->diff($heure_fin);
        $duree_saisie = $diff->h;
        
        // Add the duration of the existing schedule to the input duration
        $total_duration = $total_seconds + $duree_saisie;
        if ($total_duration > $nombre_heures) {
            return "Error: Total duration of hours exceeded allowed amount.";
        } else {
            return $total_duration;
        }
    }
    public function getEmploisByClasse()
    {
        $this->db->select('emplois.id_classe,classes.*');
        $this->db->from('emplois');
        $this->db->join('classes', 'emplois.id_classe = classes.id');
        $this->db->group_by('id_classe');
        $query = $this->db->get();
        return $query->result();
    }
    public function getEmploisByEnseig($id)
    {
        $this->db->select('emplois.*,matieres.nom,classes.salle_classe');
        $this->db->from('emplois');
        $this->db->join('matieres', 'emplois.id_matiere = matieres.id');
        $this->db->join('classes', 'emplois.id_classe = classes.id');
        $this->db->where( 'id_enseignant ',$id);
        $query = $this->db->get();
        return $query->result();
    }
    }