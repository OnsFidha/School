<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EleveController extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
    }
	public function index()
	{
		$this->load->view('menu');
		$this->load->model('Eleve');
		$data=$this->Eleve->getEleves();
		
		$this->load->view('eleve/listeEleves',['eleve'=>$data]);
		$this->load->view('footer');
		$this->load->model('AdminAcces');
	}
	public function create()
	{
		$this->load->model('AdminAcces');
		$this->load->view('menu');
		$this->load->model('ClasseModel');
		$this->load->model('parentEleve');
		$data=[
			'classes'=>$this->ClasseModel->selectAll(),
			'parents'=>$this->parentEleve->getParents(),
		];
		$this->load->view('eleve/ajouterEleve',$data);
		$this->load->view('footer');
	}
	public function validate_date_de_naissance($dateNaissance)
    {
        $current_date = date('Y-m-d');
        if ($dateNaissance > $current_date) {
            $this->form_validation->set_message('validate_date_de_naissance', 'Le %s ne peut pas être une date future');
            return false;
        }
        
        return true;
    }
	public function store()
	{
		$this->load->model('AdminAcces');
		$this->form_validation->set_rules(
			'prenom','prenom',
			'required|min_length[3]|alpha',
			[
				'required' =>'veuillez saisissez le prénom',
				'min_length' => 'le prénom doit contenir au moins 3 caractères',
				'alpha' => 'le nom ne doit contenir que des caractères'

			]);
		$this->form_validation->set_rules(
			'nom', 'nom',
			'required|min_length[3]|alpha',
			[
				'required' =>'veuillez saisissez le nom',
				'min_length' => 'le nom doit contenir au moins 3 caractères',
				'alpha' => 'le nom ne doit contenir que des caractères'
			]);
		$this->form_validation->set_rules('dateNaissance', 'dateNaissance', 'required|callback_validate_date_de_naissance');
		$this->form_validation->set_rules(
			'age', 'age',
			'required|max_length[2]',
			[
				'required' =>'veuillez saisissez l\'age',
				'max_length' => 'l\'age ne doit pas dépasser 2 chiffres'			
			]);
		//$this->form_validation->set_rules('photo', 'photo', 'required');
		$this->form_validation->set_rules('sexe', 'sexe', 'required');
		$this->form_validation->set_rules(
			'adresse', 'adresse',
			'required',
			[
				'required' =>'veuillez saisissez l\'adresse',
			]);
			

		$this->form_validation->set_rules(
			'taille', 'taille',
			'required|exact_length[3]',
			[
				'required' =>'veuillez saisissez la taille',
				'exact_length' => 'la taille est en 3 chiffres'			
			]);
		$this->form_validation->set_rules('poids', 'poids', 'required');
		$this->form_validation->set_rules('groupeSanguin', 'groupeSanguin', 'required');
		$this->form_validation->set_rules('allergies', 'allergies', 'required');
		$this->form_validation->set_rules('medicaments', 'medicaments', 'required');

		if($this->form_validation->run()){
			$imageData = file_get_contents($_FILES['photo']['tmp_name']);
			$encodedImageData = base64_encode($imageData);
		$dossierData=[
			'taille'=>$this->input->post('taille'),
			'poids'=>$this->input->post('poids'),
			'groupeSanguin'=>$this->input->post('groupeSanguin'),
			'allergies'=>$this->input->post('allergies'),
			'medicaments'=>$this->input->post('medicaments'),
		];

			$this->load->model('DossierMedical');
			$this->DossierMedical->insertDossierMedical($dossierData);

			$id_dossierMedical=$this->db->insert_id();

			$isCantine = isset($_POST['isCantine']) ? 1 : 0;

			$eleveData=[
				'prenom'=>$this->input->post('prenom'),
				'nom'=>$this->input->post('nom'),
				'dateNaissance'=>$this->input->post('dateNaissance'),
				'age'=>$this->input->post('age'),
				'photo'=>$encodedImageData,
				'sexe'=>$this->input->post('sexe'),
				'adresse'=>$this->input->post('adresse'),
				'id_dossierMedical'=>$id_dossierMedical,
				'id_classe'=>$this->input->post('id_classe'),
				'id_parent'=>$this->input->post('id_parent'),
				'isCantine'=>$isCantine,
			];

			$this->load->model('Eleve');
			$this->Eleve->insertEleve($eleveData);
			
			//$this->Eleve->updateEleve(['id_dossiermedical' => $id_dossiermedical], $id_eleve);

			//echo $this->Eleve->id_dossiermedical;
			$this->session->set_flashdata('status', 'Elève ajouté avec success');
			redirect(base_url('eleve/liste'));
		}	
		else{
			$this->create();
		}	
	}
	public function edit($id)
	{
		$this->load->model('AdminAcces');
		$this->load->model('Eleve');
		$dataEleve= $this->Eleve->getEleveById($id);

		$this->load->model('DossierMedical');
		$dataDossier= $this->DossierMedical->getDossierMedicalById($dataEleve->id_dossiermedical);

		$this->load->model('ParentEleve');
		$dataParent= $this->ParentEleve->getParentById($dataEleve->id_parent);
		$dataParents= $this->ParentEleve->getParents();

		$this->load->model('classeModel');
		$dataClasse= $this->classeModel->selectById($dataEleve->id_classe);
		$dataClasses= $this->classeModel->selectAll();

		$data=[
			'eleve'=>$dataEleve,
			'dossier'=>$dataDossier,
			'parent'=>$dataParent,
			'parents'=>$dataParents,
			'classe'=>$dataClasse,
			'classes'=>$dataClasses
		];
		$this->load->view('menu');
		$this->load->view('eleve/editerEleve',$data);
		$this->load->view('footer');
		return $data;
	}
	public function getEleve($id)
	{
		$this->load->model('Eleve');
		$dataEleve= $this->Eleve->getEleveById($id);

		$this->load->model('DossierMedical');
		$dataDossier= $this->DossierMedical->getDossierMedicalById($dataEleve->id_dossiermedical);

		$data=[
			'eleve'=>$dataEleve,
			'dossier'=>$dataDossier
		];
		$this->load->model('emploisModel');
		$data['emplois'] = $this->emploisModel->getByClass($dataEleve->id_classe);
		$this->load->model('FicheAppel');
		$data['f'] = $this->FicheAppel->getbyEleve($dataEleve->id);
		$this->load->view('menu');
		$this->load->view('eleve/consulterEleve',$data);
		$this->load->view('footer');
	}
	public function update($id)
	{
		$this->load->model('AdminAcces');
		$this->form_validation->set_rules(
			'prenom','prenom',
			'required|min_length[3]|alpha',
			[
				'required' =>'veuillez saisissez le prénom',
				'min_length' => 'le prénom doit contenir au moins 3 caractères',
				'alpha' => 'le nom ne doit contenir que des caractères'

			]);
		$this->form_validation->set_rules(
			'nom', 'nom',
			'required|min_length[3]|alpha',
			[
				'required' =>'veuillez saisissez le nom',
				'min_length' => 'le nom doit contenir au moins 3 caractères',
				'alpha' => 'le nom ne doit contenir que des caractères'
			]);
		$this->form_validation->set_rules('dateNaissance', 'dateNaissance', 'required|callback_validate_date_de_naissance');
		$this->form_validation->set_rules(
			'age', 'age',
			'required|max_length[2]',
			[
				'required' =>'veuillez saisissez l\'age',
				'max_length' => 'l\'age ne doit pas dépasser 2 chiffres'			
				]);
		//	$this->form_validation->set_rules('photo','photo'); 
		$this->form_validation->set_rules('sexe', 'sexe', 'required');
		$this->form_validation->set_rules(
			'adresse', 'adresse',
			'required',
			[
				'required' =>'veuillez saisissez l\'adresse',
			]);

		$this->form_validation->set_rules(
			'taille', 'taille',
			'required|exact_length[3]',
			[
				'required' =>'veuillez saisissez la taille',
				'exact_length' => 'la taille est en 3 chiffres'			
			]);
		$this->form_validation->set_rules('poids', 'poids', 'required');
		$this->form_validation->set_rules('groupeSanguin', 'groupeSanguin', 'required');
		$this->form_validation->set_rules('allergies', 'allergies', 'required');
		$this->form_validation->set_rules('medicaments', 'medicaments', 'required');
      
      if($this->form_validation->run()){
		$imageData = file_get_contents($_FILES['photo']['tmp_name']);
		$encodedImageData = base64_encode($imageData);
	
		
        $eleveData=[
            'prenom'=>$this->input->post('prenom'),
            'nom'=>$this->input->post('nom'),
            'dateNaissance'=>$this->input->post('dateNaissance'),
            'age'=>$this->input->post('age'),
            'photo'=>$encodedImageData,
            'sexe'=>$this->input->post('sexe'),
            'adresse'=>$this->input->post('adresse'),
			'isCantine'=>$this->input->post('isCantine'),
			'id_classe'=>$this->input->post('id_classe'),
            'id_parent'=>$this->input->post('id_parent')
        ];

        $this->load->model('Eleve');
        $this->Eleve->updateEleve($eleveData,$id);

        $dossierData=[
            'taille'=>$this->input->post('taille'),
            'poids'=>$this->input->post('poids'),
            'groupeSanguin'=>$this->input->post('groupeSanguin'),
            'allergies'=>$this->input->post('allergies'),
            'medicaments'=>$this->input->post('medicaments')
        ];

		$idDossier=$this->edit($id)['eleve']->id_dossiermedical;
        $this->load->model('DossierMedical');
        $this->DossierMedical->updateDossierMedical($dossierData,$idDossier);
		$this->session->set_flashdata('status', 'Elève modifié');
		
       	redirect(base_url('eleve/liste'));
      }
      else {
        $this->edit($id);			
      }
    }
	public function delete($id)
	{
		$this->load->model('AdminAcces');
		$this->load->model('Eleve');
		$this->Eleve->deleteEleve($id);
		redirect(base_url('eleve/liste'));
	}
}
