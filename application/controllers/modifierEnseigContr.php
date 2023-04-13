<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modifierEnseigContr extends CI_Controller {
    public function __construct() 
    {
      parent::__construct();
      $this->load->model('EnseigModel');
      ;
    }
    public function index()
    {$id=3;
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('menu');
            $enseignant= new EnseigModel;
            $data['enseignant']=$enseignant->getById($id);
            $this->load->view('modifierEnseig',$data);
            $this->load->view('footer');
        }
          else{
            
            $this->session->set_flashdata('erreur',"désolez vous n'avez pas l'acces a cette espace");
          }
    
             
        }
}