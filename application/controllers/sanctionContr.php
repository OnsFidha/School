<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sanctionContr extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
      //  $this->load->model('AdminAcces');
		$this->load->model('parentEleve');
		$this->load->model('userModel');
		$this->load->model('enseigModel');
		$this->load->model('classeModel');
		$this->load->model('Eleve');
	}
	public function index()
	{   
		$this->load->view('menu');
		$this->load->view('discipline');
		$this->load->view('footer');
	}

    public function ajout()
	{   $idUser=$this->session->userdata('auth_user')['id'];
		$enseigant= $this->enseigModel->getByIdUser($idUser);
		$data['classes']= $this->classeModel->getClasseByEnseignant($enseigant->id);
		$data['eleves']= $this->Eleve->getEleves();
		$this->load->view('menu');
		$this->load->view('ajoutDiscipline',$data);
		$this->load->view('footer');
	}
	public function getEleve($id){
		//$id=$this->input->post('classe');
		$el= $this->Eleve->getEleveByClasse($id);
		
		$data['eleves']=$el;
		$string=$this->load->view('eleves',$data,true);
		$response['eleves']=$string;
		echo json_encode($response);
	}
}