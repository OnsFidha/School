<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class assiduiteContr extends CI_Controller {
  public function __construct() 
    {
      parent::__construct();
      $this->load->model('classeModel');
      $this->load->model('emploisModel');
      $this->load->model('enseigModel');
      $this->load->model('MatiereModel');
    }
  public function index()
    {
        if ($this->session->userdata('role') == 'enseignant') {
            $this->load->view('menu');
            $data['matieres']= $this->MatiereModel->getAll();
            $idUser=$this->session->userdata('auth_user')['id'];
            $enseigant= $this->enseigModel->getByIdUser($idUser);
            $data['classes']= $this->classeModel->getClasseByEnseignant($enseigant->id);
            
            $this->load->view('ficheAppel',$data);
            $this->load->view('footer');
        }
          else{
            $this->session->set_flashdata('erreur',"désolez vous n'avez pas l'acces a cette espace");
          }
    
             
    }
  
}