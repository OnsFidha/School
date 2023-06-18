<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParentController extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('AdminAcces');
		$this->load->model('parentEleve');
		$this->load->model('userModel');
	}
    public function index()
	{
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
	public function modifier($id){
		$this->load->model('ParentEleve');
		$data['parent']=$this->ParentEleve->getParentById($id);
		$this->load->view('menu');
		$this->load->view('parentEleve/modifierParent',$data);
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
    public function ajouter() 
	{
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
		$this->form_validation->set_rules('dateNaissance', 'date de naissance', 'required|callback_validate_date_de_naissance', array(
            'required' => 'la %s est obligatoire')); 
		$this->form_validation->set_rules(
			'adresse', 'adresse',
			'required',
			[
				'required' =>'veuillez saisissez l\'adresse',
			]);

		$this->form_validation->set_rules('email', 'email', 'required',array(
            'required' => "l' %s est obligatoire"));
		$this->form_validation->set_rules('telephone', 'numéro de télèphone', 'required|is_valid_number' ,array(
            'required' => 'le %s est obligatoire',
            'is_valid_number'=>'Le %s doit contenir 8 chiffres et commencer par 2, 4, 5 ou 9'));
		$this->form_validation->set_rules('cin','cin','required|exact_length[8]', array(
            'required' => 'le %s est obligatoire',
            'is_unique' => 'le %s déja existe',
            'exact_length' => 'Le champ %s doit contenir exactement 8 chiffres'));

        if($this->form_validation->run()){
		$eleveId = $this->input->post('eleveId');
		
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
		$this->session->set_flashdata('status', 'Parent ajouté avec success');
        redirect(base_url('parent/liste'));

        }else{
			$this->create();
		}
    }
	public function consulterEnfantsAPI($id)
	{
		$this->load->model('Eleve');
		$dataEnfants=$this->Eleve->getEnfantsParent($id);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($dataEnfants))
			;
	}
    public function update($id) 
	{
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
		$this->form_validation->set_rules('dateNaissance', 'date de naissance', 'required|callback_validate_date_de_naissance', array(
            'required' => 'la %s est obligatoire')); 
		$this->form_validation->set_rules(
			'adresse', 'adresse',
			'required',
			[
				'required' =>'veuillez saisissez l\'adresse',
			]);

		$this->form_validation->set_rules('email', 'email', 'required',array(
            'required' => "l' %s est obligatoire"));
		$this->form_validation->set_rules('telephone', 'numéro de télèphone', 'required|is_valid_number' ,array(
            'required' => 'le %s est obligatoire',
            'is_valid_number'=>'Le %s doit contenir 8 chiffres et commencer par 2, 4, 5 ou 9'));
		$this->form_validation->set_rules('cin','cin','required|exact_length[8]', array(
            'required' => 'le %s est obligatoire',
            'is_unique' => 'le %s déja existe',
            'exact_length' => 'Le champ %s doit contenir exactement 8 chiffres'));

        if($this->form_validation->run()){
        $data = array(
            'prenom' => $this->input->post('prenom'),
            'nom' => $this->input->post('nom'),
            'cin' => $this->input->post('cin'),
            'telephone' => $this->input->post('telephone'),
            'email' => $this->input->post('email'),
            'adresse' => $this->input->post('adresse'),
            'dateNaissance' => $this->input->post('dateNaissance'),
            );

        $this->load->model('ParentEleve');
        $this->ParentEleve->updateParent($data,$id);
		$this->session->set_flashdata('status', 'Elève modifié avec success');
        redirect(base_url('parent/liste'));

        }else{
			$this->create();
		}
    }
	public function supprimer($id)
	{
		$this->load->model('ParentEleve');
		$this->ParentEleve->deleteParent($id);
		redirect(base_url('parent/liste'));
	}

	public function consulterEnfants($id)
	{
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
	public function creer($id)
    {
      $parent= $this->parentEleve->getParentById($id);
      $this->load->helper('string');
      $password = random_string('alnum', 8);  
      $data=array(
      'nom'=>$parent->nom,
      'prenom'=>$parent->prenom,
      'email'=>$parent->email,
      'mot_de_passe'=> password_hash($password, PASSWORD_DEFAULT),
      'role'=>'parent',
     );
     $register_user= new UserModel;
     $cheking=$register_user->registerUser($data,$parent->id,$data['role']);
     if ($cheking)
     {
        
		$config=[
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com', // Example SMTP host
            'smtp_port' => 465, // Example SMTP port
            'smtp_user' => 'hvh912326@gmail.com', // Example SMTP username
            'smtp_pass' => 'cartwknilrpeyhbc', // Example SMTP password
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        ];


		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");

		$this->email->initialize($config);
		
		$this->email->from('hvh912326@gmail.com','admin');
		$this->email->to('onsfidha3@gmail.com');
		
		
		$this->email->subject('Creation compte');
		$this->email->message("Bonjour,

        Nous sommes heureux de vous informer que votre compte a été créé avec succès. Veuillez trouver ci-dessous vos informations de connexion :<br><br>
        
        Nom d'utilisateur : ".$data['email'].' <br><br>Mot de passe : '
         .$password ." <br><br> Nous vous rappelons que vous pouvez changer votre mot de passe à tout moment en accédant à votre profil sur notre site. Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter.

         <br><br> Cordialement.");
		
		//$this->email->send();
		if (!$this->email->send())
		show_error($this->email->print_debugger());
		else
		echo 'Your e-mail has been sent!';
      $this->session->set_flashdata('status',' Compte créé avec succès');
      redirect(base_url('parent/liste'));
      } 
    
      }
    
	
}