<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class listeEnseigContr extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('EnseigModel');
        $this->load->library("form_validation");
        $this->load->helper("form");
    }
    public function index()
    {   if ($this->session->userdata('role') == 'admin') 
          {
            $this->load->view('menu');
            $data['enseignant']= $this->EnseigModel->getAll();
            $this->load->view('listeEnseignants',$data);
            $this->load->view('footer');
          }
        else
          {$this->session->set_flashdata('erreur',"désolez vous n'avez pas l'acces a cette espace");
          }    
    }
    public function effacer($id)
    {   $this->load->model('UserModel');
        $this->EnseigModel->supprimer($id);
        redirect(base_url('listeEnseignants'));
    }
    public function modifier($id)
    {   if ($this->session->userdata('role') == 'admin') {
            $this->load->view('menu');
            $enseignant= new EnseigModel;
            $data['enseignant']=$enseignant->getById($id);
            $this->load->view('modifierEnseig', $data);
            $this->load->view('footer');
        }
    }
    public function editer($id)
    {
      $this->form_validation->set_rules('nom','nom','trim|required|alpha', array(
        'required' => 'le %s est obligatoire',
        'alpha' => 'le %s doit contient des caractéres seulement'));
      $this->form_validation->set_rules('prenom','prenom','trim|required|alpha');
      $this->form_validation->set_rules('cin','cin','trim|required');
      $this->form_validation->set_rules('email','email','trim|required|valid_email');
      $this->form_validation->set_rules('genre','genre','trim|required');
      $this->form_validation->set_rules('telephone','telephone','trim|required'); 
      $this->form_validation->set_rules('dateNaissance','dateNaissance','required'); 
      $this->form_validation->set_rules('salaire','salaire','required'); 
     // $this->form_validation->set_rules('photo','photo'); 
      $this->form_validation->set_rules('typeSalaire','typeSalaire','required'); 
    //  $this->form_validation->set_rules('idClub','idClub',''); 
     // $this->form_validation->set_rules('idMatiere','idMatiere',''); 
      //$this->form_validation->set_rules('idClasse','idClasse',''); 
      $this->form_validation->set_rules('adresse','adresse','required'); 
      if($this->form_validation->run()){
        $data=array(
          'adresse'=>$this->input->post('adresse'),
          'nom'=>$this->input->post('nom'),
          'prenom'=>$this->input->post('prenom'),
          'email'=>$this->input->post('email'),
          'genre'=>$this->input->post('genre'),
          'telephone'=>$this->input->post('telephone'),
          'dateNaissance'=>$this->input->post('dateNaissance'),
          'salaire'=>$this->input->post('salaire'),
          'typeSalaire'=>$this->input->post('typeSalaire'),
          // 'idClub'=>$this->input->post('idClub'),
          // 'idMatiere'=>$this->input->post('idMatiere'),
          // 'idClasse'=>$this->input->post('idClasse'),
          // 'photo'=>$this->input->post('photo'),
          'cin'=>$this->input->post('cin')
         );
         $enseignant= new EnseigModel;
         $res=$enseignant->modifierEnseignant($data,$id);
         $this->session->set_flashdata('status', 'enseignant modifié');
       redirect(base_url('listeEnseignants/modifier/'.$id));
      }
      else {
         return $this->modifier($id);
      }
    }

}