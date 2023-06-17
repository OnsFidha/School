<?php 

class Score extends CI_Model 
{

    public function insert($data)
    {
        $this->db->insert('score',$data);
    }
    public function getScores()
    {
        $query= $this->db->get('score');
        return $query->result();
    }

    public function getScoreById($id)
    {
        $query= $this->db->get_where('score',['id'=>$id]);
        return $query->row();
    }

    public function getScoresByParent($id)
    {
        $query = $this->db->get_where('score',['id_parent'=>$id]);
        return $query->result();       
    }
    public function modifierScore($id,$data)
    {
        return $this->db->update('score', $data,['id'=>$id]); 
    }
   
   
}