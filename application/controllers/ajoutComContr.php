<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ajoutComContr extends CI_Controller {
  public function __construct() 
  {
      parent::__construct();
      $this->load->model('EnseigModel');
      $this->load->model('userModel');
    }
  public function index(){
    
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('menu');
            $this->load->model('EnseigModel');
            $data['enseignants']= $this->EnseigModel->getWithNoAcc();
            $this->load->view('ajouterCompte',$data);
            $this->load->view('footer');
        }
          else{
            
            $this->session->set_flashdata('erreur',"désolez vous n'avez pas l'acces a cette espace");
          }
    
             
        }
  public function register(){
    $this->form_validation->set_rules('role','role','trim|required');
    $this->form_validation->set_rules('profil','profil','trim|required|is_unique[users.email]');
    if($this->form_validation->run()==FALSE){
      //failed
      $this->index();
  }
  else {
    $id=$this->input->post('profil');
    $enseig= $this->EnseigModel->getById($id);
    $email=$enseig->email;
    $users=$this->userModel->getAll();
    $user= $this->userModel->getByEmail($email);
    if(!$user){
    $data=array(
      'nom'=>$enseig->nom,
      'prenom'=>$enseig->prenom,
      'email'=>$enseig->email,
      'mot_de_passe'=> password_hash($enseig->cin, PASSWORD_DEFAULT),
      'role'=>$this->input->post('role'),
      'idProfil'=>$enseig->id,
     );
     $register_user= new UserModel;
     $cheking=$register_user->registerUser($data);
     if ($cheking)
     {
      $this->session->set_flashdata('status',' Compte créé avec succès');
      redirect(base_url('listeComptes'));
  } else {
    redirect(base_url('login'));
  }}else{
    $this->session->set_flashdata('status',' Compte existe déjà');
    redirect(base_url('listeComptes'));
  }

  }
}
}