<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScoreController extends CI_Controller {

    public function ajouterScore() {
        
        $id_parent = $this->input->post('id_parent');
        $id_enseignant = $this->input->post('id_enseignant');
        $score = $this->input->post('score');
	
        $this->load->model('Score');
        $data = array(
            'id_parent' => $id_parent,
            'id_enseignant' => $id_enseignant,
            'score' => $score,
        );
        
        $this->Score->insert($data);
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function modifierScore($id_score) {
        $putData = file_get_contents('php://input');
        $putData = json_decode($putData, true);
    
        $score = $putData['score'];
    
        $this->load->model('Score');
        $data = array(
            'score' => $score,
        );
    
        $this->Score->modifierScore($id_score, $data);
    
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}