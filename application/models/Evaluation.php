<?php 
class Evaluation extends CI_Model {
    public function creer($data)
    {
        return $this->db->insert('evaluation',$data);
    }}