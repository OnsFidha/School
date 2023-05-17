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
          $this->load->view('menu');
          $data['matieres']= $this->MatiereModel->getAll();
          $this->load->view('listeMatieres',$data);
          $this->load->view('footer');
    }
    public function ajouter()
    {
        $this->load->view('menu');
      $this->load->view('ajoutMatiere');
      $this->load->view('footer');
    }
    public function register()
    {
        $this->form_validation->set_rules('nom','nom','required', array(
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
            $this->ajouter();
        }
        else 
        { 
            $config['allowed_types']='pdf';
            $config['upload_path']='./uploads/';
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('fiche_matiere'))
            {
                $data=array(
                    'nom'=>$this->input->post('nom'),
                    'coefficient'=>$this->input->post('coefficient'),
                    'nombre_heures'=>$this->input->post('nombre_heures'),
                    'regroupement'=>$this->input->post('regroupement'),
                    'fiche_matiere'=>$this->upload->data('file_name'),
                );
            }
            else
            {
                print_r($config['upload_path']);
                print_r($this->upload->display_errors());
            }
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
    }
    public function delete($id)
	{
		$this->MatiereModel->supprimer($id);
		redirect(base_url('listeMatieres'));
	}
}