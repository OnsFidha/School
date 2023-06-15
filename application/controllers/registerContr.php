<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registerContr extends CI_Controller {
    public function __construct() 
        {parent::__construct();
            $this->load->library("form_validation");
            $this->load->helper("form");
            $this->load->model("UserModel");
            $this->load->library("session");
        }
    public function index() 
        {
            $this->load-> database();
            $this->load->view('register');
        }
    public function register()
        {
          
            $this->form_validation->set_rules('nom','nom','trim|required|alpha', array(
                'required' => 'le %s est obligatoire',
                'alpha' => 'le %s doit contient des caractéres seulement'));
            $this->form_validation->set_rules('prenom','prenom','trim|required|alpha');
            $this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('mot_de_passe','mot_de_passe','trim|required');
            $this->form_validation->set_rules('Cmot_de_passe','Cmot_de_passe','trim|required|matches[mot_de_passe]'); 
            $this->form_validation->set_rules('role','role','required'); 
             if($this->form_validation->run()==FALSE){
                //failed
                $this->index();
            }
            else 
            {
                $mdp=$this->input->post('mot_de_passe');
                $hashed_password = password_hash($mdp, PASSWORD_DEFAULT);
               $data=array(
                'nom'=>$this->input->post('nom'),
                'prenom'=>$this->input->post('prenom'),
                'email'=>$this->input->post('email'),
                'mot_de_passe'=>$hashed_password,
                'role'=>$this->input->post('role'),
               );
             print_r($data);
              // $this->load->model('UserModel');
               //$this->load->library('session');
               $register_user= new UserModel;
              // $cheking=$register_user->registerUser($data);
            //    if ($cheking)
            //    {
            //     $this->session->set_flashdata('status','compte créé avec succes');
            //     redirect(base_url('login'));
            //     }
            //     else 
            //     {
            //         $this->session->set_flashdata('status','vérifier vos données');
            //         redirect(base_url(''));
            //     } 
            }   
        }
            
    }
    ?>
        
