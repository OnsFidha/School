<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ajoutEnseigContr extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('EnseigModel');
    }
    public function index()
    {
        if ($this->session->userdata('role') == 'admin')
        {
            $this->load->view('menu');
            $this->load->view('ajoutEnseig');
            $this->load->view('footer');
        }
        else
        {   $this->session->set_flashdata('erreur',"désolez vous n'avez pas l'acces a cette espace");
        }     
    }
       
    public function ajouter()
    {
        $this->form_validation->set_rules('nom','nom','trim|required|alpha', array(
                'required' => 'le %s est obligatoire',
                'alpha' => 'le %s doit contient des caractéres seulement'));
        $this->form_validation->set_rules('prenom','prenom','trim|required|alpha', array(
            'required' => 'le %s est obligatoire',
            'alpha' => 'le %s doit contient des caractéres seulement'));
        $this->form_validation->set_rules('cin','cin','trim|required|is_unique[enseignants.cin]', array(
            'required' => 'le %s est obligatoire',
            'is_unique' => 'le %s déja existe'));
        $this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[enseignants.email]', array(
            'required' => 'le %s est obligatoire',
            'valid_email' => "le %s n'est pas une adresse e-mail valide",
            "is_unique"=>"le %s déja existe"));
        $this->form_validation->set_rules('genre','genre','trim|required', array(
            'required' => 'le %s est obligatoire'));
        $this->form_validation->set_rules('telephone','telephone','trim|required', array(
            'required' => 'le %s est obligatoire')); 
        $this->form_validation->set_rules('dateNaissance','dateNaissance','required', array(
            'required' => 'le %s est obligatoire')); 
        $this->form_validation->set_rules('salaire','salaire','required', array(
            'required' => 'le %s est obligatoire')); 
      //  $this->form_validation->set_rules('photo','photo'); 
        $this->form_validation->set_rules('typeSalaire','typeSalaire','required', array(
            'required' => 'le %s est obligatoire')); 
        $this->form_validation->set_rules('adresse','adresse','required', array(
            'required' => 'le %s est obligatoire')); 
        if($this->form_validation->run()==FALSE)
        {
            //failed 
            $this->index();
        }
        else 
        {
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
                'photo'=>$this->input->post('photo'),
                'cin'=>$this->input->post('cin')
               );
            var_dump( $data);
            $enseignant= new EnseigModel;
            $cheking=$enseignant->creer($data);
            if ($cheking)
                {
                    $this->session->set_flashdata('status',' Enseignant ajouté avec succès');

                 redirect('listeEnseignants');
                }
            else 
                { }
        }
    }
}