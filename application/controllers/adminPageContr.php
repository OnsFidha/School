<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminPageContr extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('AuthentificationModel');
    }
    
    public function index()
    {if ($this->session->userdata('role') == 'admin') {
        $this->load->view('menu');
    }
      else{
        
        $this->session->set_flashdata('erreur',"désolez vous n'avez pas l'acces a cette espace");
      }

         
    }
    public function logout(){
        $this->session->unset_userdata('auth_user');
        $this->session->unset_userdata('authenticated');
        $this->session->set_flashdata('status','la déconnexion est effectuée');
        redirect(base_url('login'));
    }

}