<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class statContr extends CI_Controller {
    public function __construct() 
    {
      parent::__construct();
      $this->load->model('EnseigModel');
    }
    public function index()
    {
        $this->load->view('menu'); 
        $this->load->model('Eleve');
        $resultats= $this->Eleve->calculerNombreEleves();
        $el= $this->Eleve->getNumberOfStudentsPerClass();
        $data['res'] = $this->EnseigModel->getNumberOfTeachersPerClass();
        $data['el']=$el;
        $data['resultats']=$resultats;
        $this->load->view('stat',$data); 
        $this->load->view('footer'); 
    }


}