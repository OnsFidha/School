<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginContr extends CI_Controller {
    public function __construct() 
    {
      parent::__construct();
      if($this->session->has_userdata('authenticated')){
        if($this->session->userdata('role')=='admin'){
        $this->session->set_flashdata('status','déja connecté');
        redirect(base_url('admin'));
      }
    else{
      $this->session->set_flashdata('status','déja connecté');
      redirect(base_url('espaceEnseignant'));
    }}
      
         $this->load->library('session');
         $this->load->library("form_validation");
         $this->load->helper("form");
         $this->load->model("UserModel");
        
    }
    public function index()
    {
          $this->load->view('login.php');
     
    }   
    public function login()
    {
      
        $this->form_validation->set_rules('email','email','trim|required|valid_email', array(
          'required' => 'le %s est obligatoire',
          'valid_email' => "le %s n'est pas une adresse e-mail valide"))  ;
        $this->form_validation->set_rules('mot_de_passe','mot_de_passe','trim|required', array(
          'required' => 'le %s est obligatoire'))  ;
        if($this->form_validation->run()==FALSE){
          $this->index();
        }
        else {
          $email=$this->input->post('email');
          $password=$this->input->post('mot_de_passe');
          $data=array(
            'email'=>$email,
            'mot_de_passe'=>$password,
          );
          // $this->load->model('UserModel');
          // $this->load->library('session');
           $user= new UserModel;
           $result=$user->loginUser($data);
           if ($result!=FALSE) 
           { 
            
            //echo $result->nom;
              $auth_userdetails=[
                'id'=>$result->id,
                'nom'=>$result->nom,
                'prenom'=>$result->prenom,
                'email'=>$result->email,
                'role'=>$result->role
              ];
              $this->session->set_userdata('authenticated','1');
              $this->session->set_userdata('auth_user',$auth_userdetails);
              $this->session->set_userdata('role', $auth_userdetails['role']);
             // $this->session->set_flashdata('status','success');
             if($auth_userdetails['role']=='admin')
              {
                redirect(base_url('admin'));
              } 
              else {
                if($auth_userdetails['role']=='enseignant'){
                redirect(base_url('espaceEnseignant'));
              }
               else
                {
                  $response = array(
                    'success' => true,
                    'message' => 'login true.'
                  );
                  $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));
                }
              }
            } 
         

            else 
            {
                $this->session->set_flashdata('status','mail ou mot de passe incorrecte');
                $response = array(
                  'success' => false,
                  'message' => 'login false.'
                );
                $this->output
                  ->set_content_type('application/json')
                  ->set_output(json_encode($response));
               // redirect(base_url('login'));
            }  
        }
    }
}