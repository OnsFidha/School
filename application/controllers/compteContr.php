<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class compteContr extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('AdminAcces');
        $this->load->model('UserModel');
    }
    
    public function index()
    {
          $this->load->view('menu');
          $data['users']= $this->UserModel->getAll();
          $this->load->view('listeComptes',$data);
          $this->load->view('footer');
      }
    public function supprimer($id){
      $this->load->model('UserModel');
      $this->UserModel->supprimer($id);
       redirect(base_url('listeComptes'));
      
    }
    public function modifier($id)
    {
            $this->load->view('menu');
            $user= new UserModel;
            $data['user']=$user->getById($id);
            $this->load->view('modifierCompte', $data);
            $this->load->view('footer');
        
    }
    public function edit()
    {   $this->load->view('menu');
      $user= new UserModel;
      $id=$this->session->userdata('auth_user')['id'];
      $data['user']=$user->getById($id);
      $this->load->view('modifierMonCompte', $data);
      $this->load->view('footer');
    }
    public function update($id){
      
      $this->form_validation->set_rules('nom','nom','trim|required', array(
        'required' => 'le %s est obligatoire',
        'alpha' => 'le %s doit contient des caractéres seulement'));
      $this->form_validation->set_rules('prenom','prenom','trim|required');
      $this->form_validation->set_rules('email','email','trim|required');
      $this->form_validation->set_rules('Amot_de_passe','Amot_de_passe','trim|required');
      $this->form_validation->set_rules('mot_de_passe','mot_de_passe','trim|required');
      $this->form_validation->set_rules('Cmot_de_passe','Cmot_de_passe','trim|required|matches[mot_de_passe]'); 
     

      if($this->form_validation->run()){
        $data=array(
          'nom'=>$this->input->post('nom'),
          'prenom'=>$this->input->post('prenom'),
          'email'=>$this->input->post('email'),
          'Amot_de_passe'=>$this->input->post('Amot_de_passe'),
          'mot_de_passe'=>$this->input->post('mot_de_passe'),
          'Cmot_de_passe'=>$this->input->post('Cmot_de_passe'),
         
         );
        
         $user = $this->session->userdata('auth_user');
         $model= new UserModel;
         $email=$user['email'];
         $compte = $model->getByEmail($email);
         if(password_verify($data['Amot_de_passe'], 
         $compte->mot_de_passe)){
          $edit=array(
            'nom'=>$this->input->post('nom'),
            'prenom'=>$this->input->post('prenom'),
            'email'=>$this->input->post('email'),
            'mot_de_passe'=>  password_hash($this->input->post('mot_de_passe'), PASSWORD_DEFAULT),
            'role'=>$compte->role,
           );
        $cheking=$model->modifierUser($edit,$id);
        $this->session->set_flashdata('status', 'utilisateur modifié');
        if($compte->role=='admin'){
          redirect(base_url('admin'));}
          else if($compte->role=='enseignant'){
            redirect(base_url('enseigZone'));
          }
        
          redirect(base_url('admin'));}
      }
      else {
         return $this->edit();
      }
    }
    
    public function editer($id)
    {
      $this->form_validation->set_rules('nom','nom','trim|required', array(
        'required' => 'le %s est obligatoire',
        'alpha' => 'le %s doit contient des caractéres seulement'));
      $this->form_validation->set_rules('prenom','prenom','trim|required');
      $this->form_validation->set_rules('email','email','trim|required');
      //   $this->form_validation->set_rules('Amot_de_passe','Amot_de_passe','trim|required|md5');
      //   $this->form_validation->set_rules('mot_de_passe','mot_de_passe','trim|required|md5');
      //   $this->form_validation->set_rules('Cmot_de_passe','Cmot_de_passe','trim|required|matches[mot_de_passe]|md5'); 
        $this->form_validation->set_rules('role','role','trim|required');

      if($this->form_validation->run()){
        // $data=array(
        //   'nom'=>$this->input->post('nom'),
        //   'prenom'=>$this->input->post('prenom'),
        //   'email'=>$this->input->post('email'),
        //   'Amot_de_passe'=>$this->input->post('Amot_de_passe'),
        //   'mot_de_passe'=>$this->input->post('mot_de_passe'),
        //   'Cmot_de_passe'=>$this->input->post('Cmot_de_passe'),
        //   'role'=>$this->input->post('role'),
        //  );
         $edit=array(
          'nom'=>$this->input->post('nom'),
          'prenom'=>$this->input->post('prenom'),
          'email'=>$this->input->post('email'),
         // 'mot_de_passe'=>$this->input->post('mot_de_passe'),
          'role'=>$this->input->post('role'),
         );
      //    $user = $this->session->userdata('auth_user');
         $model= new UserModel;
      //    $email=$user['email'];
      //    $compte = $model->getByEmail($email);
      //    $mdp=md5($compte->mot_de_passe);
      //    if($mdp==$data['Amot_de_passe']){
      $cheking=$model->modifierUser($edit,$id);
      $this->session->set_flashdata('status', 'utilisateur modifié');
          redirect(base_url('listeComptes/modifier/'.$id));}
      // }
      // else {
      //    return $this->modifier($id);
      // }
    }
    }