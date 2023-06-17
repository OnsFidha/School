<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class enseignantContr extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('EnseigModel');
        $this->load->model('UserModel');
        $this->load->model('MatiereModel');
        $this->load->model('emploisModel');
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
        $this->load->model('AdminAcces');
        $this->load->model('UserModel');
        $this->EnseigModel->supprimer($id);
        redirect(base_url('listeEnseignants'));
    }
    public function get($id)
    {   
        //$this->load->model('AdminAcces');
            $this->load->view('menu');
            $this->load->model('MatiereModel');
            $this->load->model('classeModel');
            $enseignant= new EnseigModel;
            $this->matiereModel = $this->MatiereModel;
            $data['enseignant']=$enseignant->getById($id);
            $data['matieres']=$this-> MatiereModel->getSelectedMatieresByEnseignant($data['enseignant']->id);
            $data['classes']= $this->classeModel->getClasseByEnseignant($data['enseignant']->id);
            $this->load->view('consulterEnse.php', $data);
            $this->load->view('footer');
    }
    public function classesDeEnseignant()
    {
        $this->load->model('EnseignAcces');
        $this->load->view('menu');
        $idUser = $this->session->userdata('auth_user')['id'];
        $idEnseignant=$this->EnseigModel->getByIdUser($idUser)->id;
        $data['classes']=$this->classeModel->getClasseByEnseignant($idEnseignant);
        $this->load->view('listeClassesEnseignant', $data);
        $this->load->view('footer');
    }
    public function matieresEnseignantParClasse($idClasse)
    {
       
        $this->load->model('EnseignAcces');
        $this->load->view('menu');

        $idUser = $this->session->userdata('auth_user')['id'];
        $idEnseignant=$this->EnseigModel->getByIdUser($idUser)->id;

        $data['matieres']=$this->emploisModel->matieresParClasse($idClasse, $idEnseignant);
    
        $data['idClasse']=$idClasse;
        // echo "id classe : ".$idClasse;
        $this->load->view('listeMatieresParClasse', $data);
        
        $this->load->view('footer');

    }
    public function creer($id)
    {
        $this->load->model('AdminAcces');
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
        $this->load->model('AdminAcces');
            $this->load->view('menu');
            $enseignant= new EnseigModel;
            $this->matiereModel = $this->MatiereModel;
            $data['matieres']= $this->MatiereModel->getAll();
            $data['classes']= $this->classeModel->selectAll();
            $data['types']= $this->EnseigModel->getType();
            $data['enseignant']=$enseignant->getById($id);
            $this->load->view('modifierEnseig', $data);
            $this->load->view('footer');
        
    }
    public function editer($id)
    {
        $this->load->model('AdminAcces');
        $this->form_validation->set_rules('nom','nom','required|alpha', array(
            'required' => 'le %s est obligatoire',
            'alpha' => 'le %s doit contient des caractéres seulement'));
        $this->form_validation->set_rules('prenom','prenom','required|alpha', array(
            'required' => 'le %s est obligatoire',
            'alpha' => 'le %s doit contient des caractéres seulement'));
        $this->form_validation->set_rules('cin','cin','required|exact_length[8]', array(
            'required' => 'le %s est obligatoire',
            'is_unique' => 'le %s déja existe',
            'exact_length' => 'Le champ %s doit contenir exactement 8 chiffres'));
        $this->form_validation->set_rules('email','email','required|valid_email', array(
            'required' => 'le %s est obligatoire',
            'valid_email' => "le %s n'est pas une adresse e-mail valide",
            "is_unique"=>"le %s déja existe"));
        $this->form_validation->set_rules('genre','genre','required', array(
            'required' => 'le %s est obligatoire'));
        $this->form_validation->set_rules('dateNaissance','dateNaissance','required|callback_validate_date_de_naissance', array(
            'required' => 'le %s est obligatoire')); 
        $this->form_validation->set_rules('telephone', 'numéro de télèphone', 'required|is_valid_number' ,array(
            'required' => 'le %s est obligatoire',
            'is_valid_number'=>'Le %s doit contenir 8 chiffres et commencer par 2, 4, 5 ou 9'));
        $this->form_validation->set_rules('photo','photo'); 
        $this->form_validation->set_rules('typeSalaire','type salaire','required', array(
            'required' => 'le %s est obligatoire')); 
        $this->form_validation->set_rules('adresse','adresse','required', array(
            'required' => 'le %s est obligatoire')); 
      if($this->form_validation->run()){
        $imageData = file_get_contents($_FILES['photo']['tmp_name']);
        $encodedImageData = base64_encode($imageData);
        $data=array(
          'adresse'=>$this->input->post('adresse'),
          'nom'=>$this->input->post('nom'),
          'prenom'=>$this->input->post('prenom'),
          'email'=>$this->input->post('email'),
          'photo'=>$encodedImageData,
          'genre'=>$this->input->post('genre'),
          'telephone'=>$this->input->post('telephone'),
          'dateNaissance'=>$this->input->post('dateNaissance'),
          'typeSalaire'=>$this->input->post('typeSalaire'),
          'cin'=>$this->input->post('cin')
         );
         $selectedMatieres = $this->input->post('matiere[]');
         $selectedClasses = $this->input->post('classe[]');
         $enseignant= new EnseigModel;
         $res=$enseignant->modifierEnseignant($data,$id);
         $enseignant->updateMatieres($id, $selectedMatieres);
         $enseignant->updateClasses($id, $selectedClasses);
         
         if($res){
         $this->session->set_flashdata('status', 'enseignant modifié');
       redirect(base_url('listeEnseignants'));
      }
      else {
         return $this->modifier($id);
      }}
    }
    public function ajouter()
    {
        $this->load->model('AdminAcces');
        $this->load->view('menu');
        $this->load->model('MatiereModel');
        $data['matieres']= $this->MatiereModel->getAll();
        $data['classes']= $this->classeModel->selectAll();
        $data['types']= $this->EnseigModel->getType();
        $this->load->view('ajoutEnseig',$data);
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
    public function ajouterEnseignant()
    {
        $this->load->model('AdminAcces');
        $this->form_validation->set_rules('nom','nom','required|alpha', array(
                'required' => 'le %s est obligatoire',
                'alpha' => 'le %s doit contient des caractéres seulement'));
        $this->form_validation->set_rules('prenom','prenom','required|alpha', array(
            'required' => 'le %s est obligatoire',
            'alpha' => 'le %s doit contient des caractéres seulement'));
        $this->form_validation->set_rules('cin','cin','required|is_unique[enseignants.cin]|exact_length[8]', array(
            'required' => 'le %s est obligatoire',
            'is_unique' => 'le %s déja existe',
            'exact_length' => 'Le champ %s doit contenir exactement 8 chiffres'));
        $this->form_validation->set_rules('email','email','required|valid_email|is_unique[enseignants.email]', array(
            'required' => 'le %s est obligatoire',
            'valid_email' => "l' %s n'est pas une adresse e-mail valide",
            "is_unique"=>"le %s déja existe"));
        $this->form_validation->set_rules('genre','genre','required', array(
            'required' => 'le %s est obligatoire'));
        $this->form_validation->set_rules('dateNaissance','date de naissance','required|callback_validate_date_de_naissance', array(
            'required' => 'la %s est obligatoire')); 
        $this->form_validation->set_rules('telephone', 'numéro de télèphone', 'required|is_valid_number' ,array(
            'required' => 'le %s est obligatoire',
            'is_valid_number'=>'Le %s doit contenir 8 chiffres et commencer par 2, 4, 5 ou 9'));
         $this->form_validation->set_rules('photo','photo'); 
        $this->form_validation->set_rules('typeSalaire','type salaire','required', array(
            'required' => 'le %s est obligatoire')); 
        $this->form_validation->set_rules('adresse','adresse','required', array(
            'required' => 'le %s est obligatoire')); 
        // $this->form_validation->set_rules('classe','classe','required', array(
        //     'required' => 'la %s est obligatoire')); 
        // $this->form_validation->set_rules('matiere','matiere','required', array(
        //     'required' => 'la %s est obligatoire')); 
        if($this->form_validation->run()==FALSE)
            {   //failed 
               
                $this->ajouter();

            }
            else 
            {
                $imageData = file_get_contents($_FILES['photo']['tmp_name']);
                $encodedImageData = base64_encode($imageData);
         
                $data=array(
                    'adresse'=>$this->input->post('adresse'),
                    'nom'=>$this->input->post('nom'),
                    'prenom'=>$this->input->post('prenom'),
                    'email'=>$this->input->post('email'),
                    'genre'=>$this->input->post('genre'),
                    'telephone'=>$this->input->post('telephone'),
                    'dateNaissance'=>$this->input->post('dateNaissance'),
                    'typeSalaire'=>$this->input->post('typeSalaire'),
                    'photo'=>$encodedImageData,
                    'cin'=>$this->input->post('cin'),
                
                );
            
                $enseignant= new EnseigModel;
                $matieres=$_POST['matiere'];
                print_r($matieres);
                $classe=$_POST['classe'];
                print_r($classe);
                $cheking=$enseignant->creer($data,$matieres,$classe);
              
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