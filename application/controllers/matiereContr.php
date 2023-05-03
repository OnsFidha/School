<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class matiereContr extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('AdminAcces');
        $this->load->model('MatiereModel');
    }
    
    public function index()
    {
    
      if ($this->session->userdata('role') == 'admin') {
          $this->load->view('menu');
          $data['matieres']= $this->MatiereModel->getAll();
          $this->load->view('listeMatieres',$data);
          $this->load->view('footer');
      }
      else{
        
        $this->session->set_flashdata('erreur',"désolez vous n'avez pas l'acces a cette espace");
      }
    }
    public function ajouter()
    {
        $this->load->view('menu');
      $this->load->view('ajoutMatiere');
      $this->load->view('footer');
    }
    public function register(){
      $this->form_validation->set_rules('nom','nom','trim|required', array(
        'required' => 'le %s est obligatoire'));
$this->form_validation->set_rules('coefficient','coefficient','trim|required', array(
    'required' => 'le %s est obligatoire'));
$this->form_validation->set_rules('nombre_heures','nombre_heures','trim|required', array(
    'required' => 'le %s est obligatoire'));
$this->form_validation->set_rules('regroupement','regroupement','trim|required', array(
    'required' => 'le %s est obligatoire'));
if($this->form_validation->run()==FALSE)
{
    //failed 
    $this->index();
}
else 
{
    $data=array(
        
        'nom'=>$this->input->post('nom'),
        'coefficient'=>$this->input->post('coefficient'),
        'nombre_heures'=>$this->input->post('nombre_heures'),
        'regroupement'=>$this->input->post('regroupement')
       );
      
    $matiere= new MatiereModel;
    $cheking=$matiere->creer($data);
   
    if ($cheking)
        {
            $this->session->set_flashdata('status',' matiére ajouté avec succès');
            
         redirect('listeMatieres');
        }
    else 
        { }
    }
    }}