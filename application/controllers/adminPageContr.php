<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminPageContr extends CI_Controller {
  public function __construct() 
  {
      parent::__construct();
     // $this->load->model('AdminAcces');
  }
  
    
    public function index()
    {
        $this->load->view('menu');     
    }
    public function logout()
    {
      $this->session->unset_userdata('auth_user');
      $this->session->unset_userdata('authenticated');
      $this->session->set_flashdata('status','la déconnexion est effectuée');
      redirect(base_url('login'));
    }
  public function getStat()
    {
      
      $resultats= $this->modele->calculerNombreEleves();
      $data['resultats']=$resultats;
      $data['totalEleves'] = $resultats['totalEleves'];
      $data['nombreElevesFilles'] = $resultats['nombreElevesFilles'];
      $data['nombreElevesGarcons'] = $resultats['nombreElevesGarcons'];

    }

}