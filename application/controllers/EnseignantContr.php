<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class enseignantContr extends CI_Controller {
    public function __construct() 
    {    parent::__construct();
       $this->load->model('AuthentificationModel');
    }
    
    public function index()
    {
        if ($this->session->userdata('role') == 'enseignant') {
            $this->load->view('menu');
            $this->load->view('enseignant');
            $this->load->view('footer');
        }
          else{
          //  $this->session->set_flashdata('erreur',"désolez vous n'avez pas l'acces a cette espace");
            redirect(base_url('admin'));
        }
    
    }
}