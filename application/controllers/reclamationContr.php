<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reclamationContr extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
 
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