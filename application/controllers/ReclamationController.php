<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReclamationController extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Reclamation');
		$this->load->model('parentEleve');
		$this->load->model('userModel');
	}
    public function index()
	{   
        $this->load->model('AdminAcces');
		$this->load->model('Reclamation');
		$data['reclamations']=$this->Reclamation->lister();
		$this->load->view('menu');
		$this->load->view('listeReclamation',$data);
		$this->load->view('footer');
	}
	public function reclamer() {
        
        $type = $this->input->post('type');
        $titre = $this->input->post('titre');
        $contenu = $this->input->post('contenu');
        $id_parent = $this->input->post('id_parent');
        
        $this->load->model('Reclamation');
        $data = array(
            'type' => $type,
            'titre' => $titre,
            'contenu' => $contenu,
            'id_parent' => $id_parent
        );
        
        $this->db->where('id', $id_parent);
        $query = $this->db->get('parent');
        if ($query->num_rows() > 0) {
            try {
                $this->Reclamation->insert($data);
                $id = $this->db->insert_id();
    
                $response = array(
                    'message' => 'Reclamation envoyée avec succès.',
                    'status code' => 200,
                    'reclamation' => $data
                );
            } catch (Exception $e) {
                $response = array(
                    'message' => 'Erreur lors de l\'insertion de la réclamation.',
                    'status code' => 500
                );
            }
        } else {
            $response = array(
                'message' => 'Erreur lors de l\'insertion de la réclamation. Le parent avec cet identifiant n\'existe pas.',
                'status code' => 404
            );
        }
    
        $this->output
            ->set_content_type('application/json')
            ->set_status_header($response['status code'])
            ->set_output(json_encode($response));
    }
    public function get($id)
	{   
        $this->load->model('AdminAcces');
		$this->load->model('Reclamation');
		$data['reclamations']=$this->Reclamation->consulter($id);
		$this->load->view('menu');
		$this->load->view('consultRec',$data);
		$this->load->view('footer');
	}
    public function traiter($id) 
    {	
        $this->load->model('Reclamation');
        $etat='1';
		$data['reclamations']=$this->Reclamation->updateEtat($id,$etat);
        redirect('listeReclamation');
    }
}