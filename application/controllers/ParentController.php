<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParentController extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('AdminAcces');}
    public function index(){
		$this->load->model('ParentEleve');
		$data=$this->ParentEleve->getParents();
		$this->load->view('menu');
		$this->load->view('parentEleve/listeParents',['parent'=>$data]);
		$this->load->view('footer');

	}
    
	public function create(){
		$this->load->model('Eleve');
		$data['eleves']=$this->Eleve->getEleves();
		$this->load->view('menu');
		$this->load->view('parentEleve/ajouterParent',$data);
		$this->load->view('footer');

	}
    // public function createe(){
	// 	$this->load->model('ParentEleve');
	// 	$data['eleves']=$this->Eleve->getEleves();
	// 	$this->load->view('parentEleve/ajouterParent',$data);
	// }

    public function ajouter() {

        $this->form_validation->set_rules(
			'prenom','prenom',
			'required|min_length[3]',
			[
				'required' =>'veuillez saisissez le prénom',
				'min_length' => 'le prénom doit contenir au moins 3 caractères',
				//'alpha' => 'le nom ne doit contenir que des caractères'

			]);
		$this->form_validation->set_rules(
			'nom', 'nom',
			'required|min_length[3]|alpha',
			[
				'required' =>'veuillez saisissez le nom',
				'min_length' => 'le nom doit contenir au moins 3 caractères',
				'alpha' => 'le nom ne doit contenir que des caractères'
			]);
		$this->form_validation->set_rules('dateNaissance', 'dateNaissance', 'required');
		$this->form_validation->set_rules(
			'adresse', 'adresse',
			'required',
			[
				'required' =>'veuillez saisissez l\'adresse',
			]);

		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('telephone', 'telephone', 'required');
		$this->form_validation->set_rules('cin', 'cin', 'required');

        if($this->form_validation->run()){
		$eleveId = $this->input->post('eleveId');
		echo" hiii".$eleveId;
        $data = array(
            'prenom' => $this->input->post('prenom'),
            'nom' => $this->input->post('nom'),
            'cin' => $this->input->post('cin'),
            'telephone' => $this->input->post('telephone'),
            'email' => $this->input->post('email'),
            'adresse' => $this->input->post('adresse'),
            'dateNaissance' => $this->input->post('dateNaissance'),
            // 'id_eleve' => $eleveId
            );

        $this->load->model('ParentEleve');
        $this->ParentEleve->insertParent($data);
        
        redirect(base_url('parent/liste'));

        }else{
			$this->create();
		}
    }

	public function supprimer($id){
		$this->load->model('ParentEleve');
		$this->ParentEleve->deleteParent($id);
		redirect(base_url('parent/liste'));
	}

	public function consulterEnfants($id){
		// $this->load->model('ParentEleve');

		$this->load->model('Eleve');
		$dataEnfants=$this->Eleve->getEnfantsParent($id);

		// //echo($dataEleves[0]);
		$data=[
			'enfants'=>$dataEnfants
		];
		$this->load->view('menu');
		$this->load->view('parentEleve/consulterEnfants',$data);
		$this->load->view('footer');

		//redirect(base_url('parent/liste'));
	}

	
}