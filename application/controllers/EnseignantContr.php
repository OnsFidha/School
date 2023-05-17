<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class enseignantContr extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('AdminAcces');
        $this->load->model('EnseigModel');
        $this->load->model('UserModel');
        $this->load->model('MatiereModel');
        $this->load->model('classeModel');
        $this->load->library("form_validation");
        $this->load->helper("form");
    }
    public function index()
    {   
            $this->load->view('menu');
            $data['enseignant']= $this->EnseigModel->getAll();
            $data['enseignantNo']= $this->EnseigModel->getWithNoAcc();
            $this->load->view('listeEnseignants',$data);
            $this->load->view('footer');   
    }
    public function effacer($id)
    {   
        $this->load->model('UserModel');
        $this->EnseigModel->supprimer($id);
        redirect(base_url('listeEnseignants'));
    }
    public function creer($id)
    {
      $enseig= $this->EnseigModel->getById($id);
      $this->load->helper('string');
      $password = random_string('alnum', 8);  
      echo $password;
      $data=array(
      'nom'=>$enseig->nom,
      'prenom'=>$enseig->prenom,
      'email'=>$enseig->email,
      'mot_de_passe'=> password_hash($password, PASSWORD_DEFAULT),
      'role'=>'enseignant',
     );
     $register_user= new UserModel;
     $cheking=$register_user->registerUser($data,$enseig->id,$data['role']);
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
      redirect(base_url('listeEnseignants'));
      } 
    
      }
    public function modifier($id)
    {   
            $this->load->view('menu');
            $enseignant= new EnseigModel;
            $this->matiereModel = $this->MatiereModel;
            $data['matieres']= $this->MatiereModel->getAll();
            $m=   $this->MatiereModel->getSelectedMatieresByEnseignant($id);
            $data['enseignant']=$enseignant->getById($id);
            $this->load->view('modifierEnseig', $data);
            $this->load->view('footer');
        
    }
    public function editer($id)
    {
      $this->form_validation->set_rules('nom','nom','trim|required|alpha', array(
        'required' => 'le %s est obligatoire',
        'alpha' => 'le %s doit contient des caractéres seulement'));
      $this->form_validation->set_rules('prenom','prenom','trim|required|alpha');
      $this->form_validation->set_rules('cin','cin','trim|required');
      $this->form_validation->set_rules('email','email','trim|required|valid_email');
      $this->form_validation->set_rules('genre','genre','trim|required');
      $this->form_validation->set_rules('telephone','telephone','trim|required'); 
      $this->form_validation->set_rules('dateNaissance','dateNaissance','required'); 
      $this->form_validation->set_rules('salaire','salaire','required'); 
     // $this->form_validation->set_rules('photo','photo'); 
      $this->form_validation->set_rules('typeSalaire','typeSalaire','required'); 
      //  $this->form_validation->set_rules('idClub','idClub',''); 
      // $this->form_validation->set_rules('idMatiere','idMatiere',''); 
      //$this->form_validation->set_rules('idClasse','idClasse',''); 
      $this->form_validation->set_rules('adresse','adresse','required'); 
      if($this->form_validation->run()){
        $data=array(
          'adresse'=>$this->input->post('adresse'),
          'nom'=>$this->input->post('nom'),
          'prenom'=>$this->input->post('prenom'),
          'email'=>$this->input->post('email'),
          'genre'=>$this->input->post('genre'),
          'telephone'=>$this->input->post('telephone'),
          'dateNaissance'=>$this->input->post('dateNaissance'),
          'salaire'=>$this->input->post('salaire'),
          'typeSalaire'=>$this->input->post('typeSalaire'),
          // 'idClub'=>$this->input->post('idClub'),
          // 'idMatiere'=>$this->input->post('idMatiere'),
          // 'idClasse'=>$this->input->post('idClasse'),
          // 'photo'=>$this->input->post('photo'),
          'cin'=>$this->input->post('cin')
         );
         $enseignant= new EnseigModel;
         $res=$enseignant->modifierEnseignant($data,$id);
         $this->session->set_flashdata('status', 'enseignant modifié');
       redirect(base_url('listeEnseignants'));
      }
      else {
         return $this->modifier($id);
      }
    }
    public function ajouter()
    {
        $this->load->view('menu');
        $this->load->model('MatiereModel');
        $data['matieres']= $this->MatiereModel->getAll();
        $this->load->view('ajoutEnseig',$data);
        $this->load->view('footer');
    }
    public function ajouterEnseignant()
    {
        $this->form_validation->set_rules('nom','nom','trim|required|alpha', array(
                'required' => 'le %s est obligatoire',
                'alpha' => 'le %s doit contient des caractéres seulement'));
        $this->form_validation->set_rules('prenom','prenom','trim|required|alpha', array(
            'required' => 'le %s est obligatoire',
            'alpha' => 'le %s doit contient des caractéres seulement'));
        $this->form_validation->set_rules('cin','cin','trim|required|is_unique[enseignants.cin]', array(
            'required' => 'le %s est obligatoire',
            'is_unique' => 'le %s déja existe'));
        $this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[enseignants.email]', array(
            'required' => 'le %s est obligatoire',
            'valid_email' => "le %s n'est pas une adresse e-mail valide",
            "is_unique"=>"le %s déja existe"));
        $this->form_validation->set_rules('genre','genre','trim|required', array(
            'required' => 'le %s est obligatoire'));
        $this->form_validation->set_rules('telephone','telephone','trim|required', array(
            'required' => 'le %s est obligatoire')); 
        $this->form_validation->set_rules('dateNaissance','dateNaissance','required', array(
            'required' => 'le %s est obligatoire')); 
        $this->form_validation->set_rules('salaire','salaire','required', array(
            'required' => 'le %s est obligatoire')); 
      //  $this->form_validation->set_rules('photo','photo'); 
        $this->form_validation->set_rules('typeSalaire','typeSalaire','required', array(
            'required' => 'le %s est obligatoire')); 
        $this->form_validation->set_rules('adresse','adresse','required', array(
            'required' => 'le %s est obligatoire')); 
        if($this->form_validation->run()==FALSE)
            {   //failed 
                $this->ajouter();
            }
            else 
            {
                $data=array(
                    'adresse'=>$this->input->post('adresse'),
                    'nom'=>$this->input->post('nom'),
                    'prenom'=>$this->input->post('prenom'),
                    'email'=>$this->input->post('email'),
                    'genre'=>$this->input->post('genre'),
                    'telephone'=>$this->input->post('telephone'),
                    'dateNaissance'=>$this->input->post('dateNaissance'),
                    'salaire'=>$this->input->post('salaire'),
                    'typeSalaire'=>$this->input->post('typeSalaire'),
                    'photo'=>$this->input->post('photo'),
                    'cin'=>$this->input->post('cin'),
                
                );
            
                $enseignant= new EnseigModel;
                $matieres=$_POST['matiere'];
                var_dump($matieres);
                $cheking=$enseignant->creer($data,$matieres);
                if ($cheking)
                    {
                        $this->session->set_flashdata('status',' Enseignant ajouté avec succès');
                        redirect('listeEnseignants');
                    }
                else 
                    { }
            }
    }
}