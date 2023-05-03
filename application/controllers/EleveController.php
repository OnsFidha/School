<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EleveController extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('AdminAcces');
    }
	public function index(){
		$this->load->view('menu');
		$this->load->model('Eleve');
		$data=$this->Eleve->getEleves();
		$this->load->view('eleve/listeEleves',['eleve'=>$data]);
		$this->load->view('footer');
	}

	public function create(){
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

	public function store(){

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
		$this->form_validation->set_rules('dateNaissance', 'dateNaissance', 'required');
		$this->form_validation->set_rules(
			'age', 'age',
			'required|max_length[2]',
			[
				'required' =>'veuillez saisissez l\'age',
				'max_length' => 'l\'age ne doit pas dépasser 2 chiffres'			
			]);
		$this->form_validation->set_rules('photo', 'photo', 'required');
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

		// $config['upload_path'] = 'assets/uploads';
		// $config['allowed_types'] = 'jpg|png';
		// $config['max_size']  = '10000';
		// $config['max_width']  = '102400';
		// $config['max_height']  = '76800';

		// <--upload image-->
		
		// if($this->form_validation->run()){
		// 	$this->load->library('upload', $config);
		
		// 	if ( ! $this->upload->do_upload('photo')){
		// 		$error = array('error' => $this->upload->display_errors());
		// 		echo $error['error'];
		// 	}
		// 	else{
		// 		//$data = array('upload_data' => $this->upload->data());
		// 		echo "success";
		// 	}
		// }

		if($this->form_validation->run()){

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

			$eleveData=[
				'prenom'=>$this->input->post('prenom'),
				'nom'=>$this->input->post('nom'),
				'dateNaissance'=>$this->input->post('dateNaissance'),
				'age'=>$this->input->post('age'),
				'photo'=>$this->input->post('photo'),
				'sexe'=>$this->input->post('sexe'),
				'adresse'=>$this->input->post('adresse'),
				'id_dossierMedical'=>$id_dossierMedical,
				'id_classe'=>$this->input->post('id_classe'),
				'id_parent'=>$this->input->post('id_parent'),
			];

			$this->load->model('Eleve');
			$this->Eleve->insertEleve($eleveData);
			
			//$this->Eleve->updateEleve(['id_dossiermedical' => $id_dossiermedical], $id_eleve);

			//echo $this->Eleve->id_dossiermedical;
			redirect(base_url('eleve/liste'));
		}	
		else{
			$this->create();
		}	
	}

	public function edit($id){
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
	
	public function getEleve($id){
		$this->load->model('Eleve');
		$dataEleve= $this->Eleve->getEleveById($id);

		$this->load->model('DossierMedical');
		$dataDossier= $this->DossierMedical->getDossierMedicalById($dataEleve->id_dossiermedical);

		$data=[
			'eleve'=>$dataEleve,
			'dossier'=>$dataDossier
		];
		$this->load->view('menu');
		$this->load->view('eleve/consulterEleve',$data);
		$this->load->view('footer');
	}

	public function update($id){
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
		$this->form_validation->set_rules('dateNaissance', 'dateNaissance', 'required');
		$this->form_validation->set_rules(
			'age', 'age',
			'required|max_length[2]',
			[
				'required' =>'veuillez saisissez l\'age',
				'max_length' => 'l\'age ne doit pas dépasser 2 chiffres'			
			]);
		$this->form_validation->set_rules('photo', 'photo', 'required');
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
        $eleveData=[
            'prenom'=>$this->input->post('prenom'),
            'nom'=>$this->input->post('nom'),
            'dateNaissance'=>$this->input->post('dateNaissance'),
            'age'=>$this->input->post('age'),
            'photo'=>$this->input->post('photo'),
            'sexe'=>$this->input->post('sexe'),
            'adresse'=>$this->input->post('adresse'),
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

        redirect(base_url('eleve/liste'));
      }
      else {
        $this->edit($id);			
      }
    }

	public function updatee($id){
		$this->form_validation->set_rules('prenom', 'prenom', 'required');
		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('dateNaissance', 'Phone Number', 'required');
		$this->form_validation->set_rules('age', 'age', 'required');
		$this->form_validation->set_rules('photo', 'photo', 'required');
		
		if($this->form_validation->run()){
			$data=[
				'prenom'=>$this->input->post('prenom'),
				'nom'=>$this->input->post('nom'),
				'dateNaissance'=>$this->input->post('dateNaissance'),
				'age'=>$this->input->post('age'),
				'photo'=>$this->input->post('photo')
			];
			$this->load->model('Eleve');
			$this->Eleve->updateEleve($data,$id);
			redirect(base_url('eleve/liste'));
		}
		else {
			$this->edit($id);			
		}
	}

	public function delete($id){
		$this->load->model('Eleve');
		$this->Eleve->deleteEleve($id);
		redirect(base_url('eleve/liste'));
	}

	public function upload_file(){
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']  = '10000';
		$config['max_width']  = '102400';
		$config['max_height']  = '76800';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('photo')){
			$error = array('error' => $this->upload->display_errors());
			echo $error['error'];
		}
		else{
			//$data = array('upload_data' => $this->upload->data());
			echo "success";
		}
	}

	public function uploadf($f){
		if($f["name"]== ""){
			
			return "";
		}
		else{
		$ran=substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1,10))), 1, 10);
		
		$temp = explode(".", $f["name"]);
		//$newfilename = round(microtime(true)) . '.' . end($temp);
		$newfilename = $ran. '.' . end($temp);
		$target_dir = 'assets/uploads/';
		$target_file = $target_dir . basename($newfilename);
		// echo $target_file;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		if ($uploadOk == 0) {
		// echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		if (move_uploaded_file($f["tmp_name"], $target_file)) {
			echo "The file ". htmlspecialchars( basename($newfilename)). " has been uploaded.";
			
		} else {
			echo "Sorry, there was an error uploading your file.";
			
		}
	}	return $newfilename;

	}
	}
	public function storeee(){

		 $file1=$this->uploadf($_FILES["photo"]);

		
		// $this->form_validation->set_rules('prenom', 'prenom', 'required');
		// $this->form_validation->set_rules('nom', 'nom', 'required');
		// $this->form_validation->set_rules('dateNaissance', 'Phone Number', 'required');
		// $this->form_validation->set_rules('age', 'age', 'required');
		// $this->form_validation->set_rules('photo', 'photo', 'required');

		
		// if($this->form_validation->run()){
			
				$eleveData=[
					'prenom'=>$this->input->post('prenom'),
					'nom'=>$this->input->post('nom'),
					'dateNaissance'=>$this->input->post('dateNaissance'),
					'age'=>$this->input->post('age'),
					'photo'=>$file1
				];

				//$data = array('upload_data' => $this->upload->data());
				$this->load->model('Eleve');
				$this->Eleve->insertEleve($eleveData);
				redirect(base_url('eleve/liste'));
			
		// }
		// else{
		// 	$this->create();
		// }	
	}

}
