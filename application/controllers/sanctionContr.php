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
		$this->load->model('MatiereModel');
		$this->load->model('Eleve');
	}
	public function index()
	{   
		$this->load->model('Sanction');
		$data['sanction']=$this->Sanction->lister();
		$this->load->model('Gratification');
		$data['gratif']=$this->Gratification->lister();
		$this->load->view('menu');
		$this->load->view('discipline',$data);
		$this->load->view('footer');
	}
	public function effacer($id){
		$this->load->model('Sanction');
		if( $this->Sanction->supprimer($id)){
			redirect(base_url('discipline'));
		}
		
	}
	public function efface($id){
		$this->load->model('Gratification');
		if( $this->Gratification->supprimer($id)){
			redirect(base_url('discipline'));
		}
		
	}
    public function ajout()
	{   
		$idUser=$this->session->userdata('auth_user')['id'];
		$enseigant= $this->enseigModel->getByIdUser($idUser);
		$data['classes']= $this->classeModel->getClasseByEnseignant($enseigant->id);
		$data['matieres']= $this->MatiereModel->getSelectedMatieresByEnseignant($enseigant->id);
		$data['eleves']= $this->Eleve->getEleves();
		$this->load->view('menu');
		$this->load->view('ajoutDiscipline',$data);
		$this->load->view('footer');
	}
	public function getEleve($id){
		//$id=$this->input->post('classe');
		$el= $this->Eleve->getEleveByClasse($id);
		$idUser=$this->session->userdata('auth_user')['id'];
		$enseigant= $this->enseigModel->getByIdUser($idUser);
		$data['matieres']= $this->MatiereModel->getSelectedMatieresByEnseignant($enseigant->id);
		$data['eleves']=$el;
		$string=$this->load->view('eleves',$data,true);
		$response['eleves']=$string;
		echo json_encode($response);
	}
	public function add(){
		
        $this->form_validation->set_rules('id_eleve','élève','required', array(
			'required' => 'le %s est obligatoire'));
			$this->form_validation->set_rules('id_matiere','matiére','required', array(
				'required' => 'la %s est obligatoire'));
		$this->form_validation->set_rules('type','type','required', array(
			'required' => 'le %s est obligatoire'));
		$this->form_validation->set_rules('remarque',"remarque",'required', array(
			'required' => ' %s est obligatoire'));
		$this->form_validation->set_rules('degre','degre','required', array(
			'required' => 'la %s est obligatoire')); 
		if($this->form_validation->run()==FALSE)
		{
			//failed 
			$this->ajout();
			}
		else 
		{
			$idUser=$this->session->userdata('auth_user')['id'];
			$enseigant= $this->enseigModel->getByIdUser($idUser);
			$data=array(
				'id_eleve'=>$this->input->post('id_eleve'),
				'type'=>$this->input->post('type'),
				'remarque'=>$this->input->post('remarque'),
				'degre'=>$this->input->post('degre'),
				'id_enseignant'=>$enseigant->id,
				'id_matiere'=>$this->input->post('id_matiere'),
			);
			$this->load->model('Sanction');
			
			$cheking=$this->Sanction->inserer($data);
			if ($cheking)
				{
					$this->session->set_flashdata('status',' sanction ajouté avec succès');

				redirect('discipline');
				}
			else 
				{ }
		}
	}
	public function gratifier(){
		$idUser=$this->session->userdata('auth_user')['id'];
		$enseigant= $this->enseigModel->getByIdUser($idUser);
		$data['classes']= $this->classeModel->getClasseByEnseignant($enseigant->id);
		$data['eleves']= $this->Eleve->getEleves();
		$this->load->view('menu');
		$this->load->view('ajoutGratif',$data);
		$this->load->view('footer');
	
	}
	public function addgratif(){
		
        $this->form_validation->set_rules('id_eleve','élève','required', array(
			'required' => 'le %s est obligatoire'));
		$this->form_validation->set_rules('type','type','required', array(
			'required' => 'le %s est obligatoire'));
		$this->form_validation->set_rules('remarque',"remarque",'required', array(
			'required' => ' %s est obligatoire'));
	
		if($this->form_validation->run()==FALSE)
		{
			//failed 
			$this->gratifier();
			}
		else 
		{
			$idUser=$this->session->userdata('auth_user')['id'];
			$enseigant= $this->enseigModel->getByIdUser($idUser);
			$data=array(
				'id_eleve'=>$this->input->post('id_eleve'),
				'type'=>$this->input->post('type'),
				'remarque'=>$this->input->post('remarque'),
			
				'id_enseignant'=>$enseigant->id
			);
			$this->load->model('Gratification');
			
			$cheking=$this->Gratification->inserer($data);
			if ($cheking)
				{
					$this->session->set_flashdata('status',' Gratification ajouté avec succès');

				redirect('discipline');
				}
			else 
				{ }
		}
	}
}