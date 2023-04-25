<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class emploisContr extends CI_Controller {
  public function __construct() 
  {
      parent::__construct();
      $this->load->model('classeModel');
      $this->load->model('emploisModel');
      $this->load->model('enseigModel');
      
      
  }
  public function index()
  {
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
    
             
  }
  public function btn()
  {
      $this->load->model('MatiereModel');
      $data['matieres']= $this->MatiereModel->getAll();
      $data['enseignants']= $this->enseigModel->getAll();
      $this->load->view('ajoutEmploi',$data);
  }
  public function fetchClasse($id)
  {
    
    $this->db->where('id', $id);
    $query = $this->db->get('classes');
    $classe = $query->row();
    $output = array('annee_Scolaire' => $classe->annee_Scolaire);
    echo json_encode($output);
    
   
  }
  public function add(){
    $data = array(
        "jour" => $this->input->post("jour"),
        "heure_debut" => $this->input->post("heure_debut"),
        "heure_fin" => $this->input->post("heure_fin"),
        "id_matiere" => $this->input->post("matiere"),
        "id_enseignant" => $this->input->post("enseignant"),
        "id_classe" => $this->input->post("classe")
    );
    $result=$this->emploisModel->creer($data); 
    if ($result)
     {
      $this->session->set_flashdata('status','Séance ajoutée avec succès');
      $this->index();
  } else {
    $this->session->set_flashdata('erreur','echec');
  }
    
  }
}