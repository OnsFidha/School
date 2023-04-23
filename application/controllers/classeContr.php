<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class classeContr extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('classeModel');
    }
    public function index()
    {
        if ($this->session->userdata('role') == 'admin')
        {
            $this->load->view('menu');
            $data['classe']= $this->classeModel->selectAll();
            $this->load->view('listeClasses',$data);
            $this->load->view('footer');
        }
        else
        {   $this->session->set_flashdata('erreur',"désolez vous n'avez pas l'acces a cette espace");
        }     
    }
    public function ajouter()
    {
        $this->load->view('menu');
        $this->load->view('ajoutClasse');
        $this->load->view('footer');
    }   
    public function add()
    {
        $this->form_validation->set_rules('nom','nom','required', array(
                'required' => 'le %s est obligatoire'));
        $this->form_validation->set_rules('niveau','niveau','required', array(
            'required' => 'le %s est obligatoire'));
        $this->form_validation->set_rules('annee_Scolaire',"l'année scolaire",'required', array(
            'required' => ' %s est obligatoire'));
        $this->form_validation->set_rules('salle_classe','salle de classe','required', array(
            'required' => 'la %s est obligatoire')); 
        if($this->form_validation->run()==FALSE)
        {
            //failed 
            $this->ajouter();
            }
        else 
        {
            $data=array(
                'nom'=>$this->input->post('nom'),
                'niveau'=>$this->input->post('niveau'),
                'annee_Scolaire'=>$this->input->post('annee_Scolaire'),
                'salle_classe'=>$this->input->post('salle_classe'),
               );
            $classe= new classeModel;
            $cheking=$classe->creer($data);
            if ($cheking)
                {
                    $this->session->set_flashdata('status',' Classe ajouté avec succès');

                 redirect('listeClasses');
                }
            else 
                { }
        }
    }
}