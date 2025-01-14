<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginContr extends CI_Controller {
    public function __construct() 
    {
      parent::__construct();
         $this->load->library('session');
         $this->load->library("form_validation");
         $this->load->helper("form");
         $this->load->model("UserModel");
        
    }
    public function index()
    {     
      if($this->session->has_userdata('authenticated'))
      {
        if($this->session->userdata('role')=='admin'){
        $this->session->set_flashdata('status','déja connecté');
        redirect(base_url('admin'));
          } 
        else{
            $this->session->set_flashdata('status','déja connecté');
            redirect(base_url('espaceEnseignant'));
          }
      }
      $this->load->view('login.php');
    }  
    public function loginParent()
    {
      $email=$this->input->post('email');
      $password=$this->input->post('mot_de_passe');
      $data=array(
        'email'=>$email,
        'mot_de_passe'=>$password,
      );
      
       $user= new UserModel;
       $result=$user->loginUser($data);
       $this->load->model('ParentEleve');
       $parent= $this->ParentEleve->getByIdUser($result->id);
       $idparent=$parent->id;
       if ($result!=FALSE) 
       { 
        
        //echo $result->nom;
          $auth_userdetails=[
            'id'=>$result->id,
            'nom'=>$result->nom,
            'prenom'=>$result->prenom,
            'email'=>$result->email,
            'role'=>$result->role,
            'idparent'=>$idparent,
          ];
        if($auth_userdetails['role']=='parent'){
 
        $this->session->set_userdata( 'parentData',$auth_userdetails );
        $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($auth_userdetails));
        
            $response = array(
              'success' => true,
              'message' => 'login true.',  
              'user'=>   $auth_userdetails,
              'parent'=>$parent 
            );
            
        }
      }
       else{
          $response = array(
            'success' => false,
            'message' => 'login false.'
          );
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }
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
       
             // $this->session->set_flashdata('status','success');
             if($auth_userdetails['role']=='admin')
              { 
                $this->session->set_userdata('authenticated','1');
                $this->session->set_userdata('auth_user',$auth_userdetails);
                $this->session->set_userdata('role', $auth_userdetails['role']);
                redirect(base_url('admin'));
              } 
              else {
                if($auth_userdetails['role']=='enseignant'){
                $this->session->set_userdata('authenticated','1');
                $this->session->set_userdata('auth_user',$auth_userdetails);
                $this->session->set_userdata('role', $auth_userdetails['role']);
                redirect(base_url('espaceEnseignant'));
              }
      
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