<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginContr extends CI_Controller {
    public function __construct() 
    {parent::__construct();
      if($this->session->has_userdata('authenticated')){
        $this->session->set_flashdata('status','déja connecté');
        redirect(base_url('admin'));
      }
      
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
           if ($result!=FALSE && $result->role!='parent')
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
             if($auth_userdetails['role']=='admin'){
              redirect(base_url('admin'));}
              else if($auth_userdetails['role']=='enseignant'){
                redirect(base_url('enseigZone'));
              }
            } 
             

            else 
            {
                $this->session->set_flashdata('status','mail ou mot de passe incorrecte');
                redirect(base_url('login'));
            }  
        }
    }
}