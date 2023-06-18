<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClubController extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        //$this->load->model('AdminAcces');
        $this->load->model('Club');
        $this->load->model('MatiereModel');
        $this->load->model('Eleve');
        $this->load->model('EnseigModel');
     
    }
    
    public function index(){
        $this->load->view('menu');
		$this->load->model('Club');
		$data=$this->Club->listeClubs();
		$this->load->view('club/listeClubs',['club'=>$data]);
        $this->load->view('footer');
	}

    public function creer(){
        $this->load->model('EnseigModel');
		$data['enseignants']=$this->EnseigModel->nonChefEnseignants();
        $this->load->view('menu');
		$this->load->view('club/ajouterClub',$data);
        $this->load->view('footer');
	}

    public function insererClub()
    {
        
        $this->form_validation->set_rules(
			'niveau','niveau',
			'required',
			[
				'required' =>'veuillez saisissez le prénom',
			]);
		$this->form_validation->set_rules(
			'nom', 'nom',
			'required',
			[
				'required' =>'veuillez saisissez le nom'
			]);
		$this->form_validation->set_rules('anneeScolaire', 'anneeScolaire', 'required');
        if($this->form_validation->run()){

        $data = array(
            'nom' => $this->input->post('nom'),
            'description' => $this->input->post('description'),
            'photo' => $this->input->post('photo'),
            'id_enseignant' => $this->input->post('enseignantId')
            );

        $this->load->model('Club');
        $this->Club->inserer($data);
		$this->index();        
        }
        else {
        $this->creer();
        }
    }

    public function consulter($id){
		$this->load->model('Club');
		$dataClub= $this->Club->consulter($id);

		$this->load->model('EnseigModel');
		$dataEnseignant= $this->EnseigModel->getById($dataClub->id_enseignant);
        $dataNonChefEnseignants= $this->EnseigModel->nonChefEnseignants();

		$data=[
			'club'=>$dataClub,
			'enseignant'=>$dataEnseignant,
            'enseignants'=>$dataNonChefEnseignants
		];


        if($this->uri->segment(2)==="consulter"){
            $this->load->view('menu');
            $this->load->view('club/consulterClub',$data);
            $this->load->view('footer');
        }else{
            $this->load->view('menu');
            $this->load->view('club/modifierClub',$data);
            $this->load->view('footer');
        }
	}

    public function supprimerClub($id){
		$this->load->model('Club');
		$this->Club->supprimer($id);
		redirect(base_url('club/liste'));
	}

    public function modifier($id){      
      //if($this->form_validation->run()){
        $clubData=[
            'nom' => $this->input->post('nom'),
            'description' => $this->input->post('description'),
            'photo' => $this->input->post('photo'),
            'id_enseignant' => $this->input->post('enseignantId')
        ];

        $this->load->model('Club');
        $this->Club->modifier($clubData,$id);	

        redirect(base_url('club/liste'));
    //   }
    //   else {
    //     $this->edit($id);			
    //   }
    }

    public function affecterEleve(){
        // choisir d'affecter un eleve a  une classe
        $this->load->view('menu');
        $this->load->view('classe/ajouterClasse');
        $this->load->view('footer');
        
    }
    public function get(){
        $idUser = $this->session->userdata('auth_user')['id'];
        $idEnseignant=$this->EnseigModel->getByIdUser($idUser)->id;
		$data['club']=$this->Club->clubByEn($idEnseignant);
        $this->load->view('menu');
        $this->load->view('club',$data);
        $this->load->view('footer');
    }
}
