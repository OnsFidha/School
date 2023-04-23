<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class emploisContr extends CI_Controller {
  public function __construct() 
  {
      parent::__construct();
      $this->load->model('classeModel');
  }
  public function index(){
    
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('menu');
            $this->load->model('EnseigModel');
            $data['classes']= $this->classeModel->selectAll();
            $this->load->view('emplois',$data);
            $this->load->view('footer');
        }
          else{
            
            $this->session->set_flashdata('erreur',"désolez vous n'avez pas l'acces a cette espace");
          }
    
             
        }}