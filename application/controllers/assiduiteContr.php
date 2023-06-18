<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class assiduiteContr extends CI_Controller {
    public function __construct() 
    {
      parent::__construct();
      $this->load->model('classeModel');
      $this->load->model('emploisModel');
      $this->load->model('EnseignAcces');
      $this->load->model('Eleve');
      $this->load->model('enseigModel');
      $this->load->model('MatiereModel');
      $this->load->model('FicheAppel');
      $this->load->library('session');
    }
    public function index()
    {
      $this->load->view('menu');
      $data['matieres']= $this->MatiereModel->getAll();
      $idUser=$this->session->userdata('auth_user')['id'];
      $enseigant= $this->enseigModel->getByIdUser($idUser);
      $data['matieres']= $this->MatiereModel->getSelectedMatieresByEnseignant($enseigant->id);
      $data['classes']= $this->classeModel->getClasseByEnseignant($enseigant->id);
      $this->load->view('ficheAppel',$data);
      $this->load->view('footer');      
    }
  	public function fetchEleve($id)
    {   
      $eleves= $this->Eleve->getEleveByClasse($id);
      $data['ens']=$eleves;
      $string=$this->load->view('tableau',$data,true);
      $response['ens']=$string;
      echo json_encode($response);
    }
    public function appel()
    {
      $value = $this->input->post('attendance');
      $this->form_validation->set_rules('classe','classe','required', array(
        'required' => 'la %s est obligatoire'));
        if($this->form_validation->run()==FALSE)
        {
            //failed 
            $this->index();
        }
        else 
        {
            foreach ($value as $id_eleve => $etat) {
            $attendanceData[] = array(
                'id_classe' => $this->input->post('classe'),
                'id_eleve' => $id_eleve,
                'etat' => $etat,
                'id_enseignant' => $this->enseigModel->getByIdUser($this->session->userdata("auth_user")['id'])->id,
               'id_matiere'=>$this->input->post('matiere')
            );
                }
       
        $che=$this->FicheAppel->creer($attendanceData);
        if ($che){
            $this->session->set_flashdata('status','appel fait avec succès');
            redirect('ficheAppel');
          }
        else {$this->index(); }
      }
    }
    public function get()
    {
      $this->load->view('menu');
      $data['appel']= $this->FicheAppel->getFiche();
      $this->load->view('listeAss',$data);
      $this->load->view('footer'); 
    }
}