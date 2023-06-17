<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') OR exit('No direct script access allowed');

class emploisContr extends CI_Controller {
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
      $this->load->model('AdminAcces');
      $this->load->view('menu');
      $this->load->model('EnseigModel');
      $this->load->model('MatiereModel');
      $data['matieres']= $this->MatiereModel->getAll();
      $data['enseignants']= $this->enseigModel->getAll();
      $data['classes']= $this->classeModel->selectAll();
      $this->load->view('emplois',$data);
      $this->load->view('footer');  
  }
  public function getEnseign(){
      $id=$this->input->post('matiere');
      $teachers= $this->emploisModel->getTeachersBySubject($id);
      $data['ens']=$teachers;
      $string=$this->load->view('select',$data,true);
      $response['ens']=$string;
      echo json_encode($response);
  }
  public function btn($id)
  { 
      $this->load->model('AdminAcces');
      $this->load->model('MatiereModel');
      $data['matieres']= $this->MatiereModel->getAll();
      $data['enseignants']= $this->enseigModel->getAll();
      $data['id']=$id;
      $this->load->view('menu');
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
  
  public function add()
  {
    $this->load->model('AdminAcces');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('jour', 'Jour', 'required');
    $this->form_validation->set_rules('heure_debut', 'Heure de début', 'required');
    $this->form_validation->set_rules('heure_fin', 'Heure de fin', 'required');
    // $this->form_validation->set_rules('id_matiere', 'Matière', 'required');
    // $this->form_validation->set_rules('id_enseignant', 'Enseignant', 'required');
    $id_classe = $this->input->post("classe");
    // print_r("idc".$id_classe);
    $this->form_validation->set_rules('heure_debut', 'Heure de début');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('erreur','champs non valide');
      $this->btn($id_classe);
      } 
    else {  $id_matiere = $this->input->post("matiere");
          $heure_debut = $this->input->post("heure_debut");
        $heure_fin = $this->input->post("heure_fin");
        $id_classe = $this->input->post("classe");
        $id_enseignant = $this->input->post("enseignant");
        $jour = $this->input->post("jour");
        // print_r("idz".$id_matiere.$id_classe);
        // print_r( "res".$this->emploisModel->getTotalDuration($id_matiere,$id_classe));
        $session_count = $this->emploisModel->count_sessions($id_enseignant,$heure_debut, $heure_fin,$jour,$id_classe);
        $total_duration=$this->emploisModel->getTotalDuration($id_matiere,$id_classe,$heure_debut,$heure_fin);
        if (is_string($total_duration)) {
          $this->session->set_flashdata('erreur',$total_duration);
          $this->btn($id_classe); 
      } else {
        $this->session->set_flashdata('erreur',"Total duration is $total_duration hours.");
          if($session_count > 0){
                          // session already exists, return false to trigger validation error
                          $this->session->set_flashdata('erreur',"L'enseignant n'est disponible a cette");
                          $this->btn($id_classe); 
                        return false;
                      } 
          else{
             if ($heure_fin < $heure_debut) 
              {
                $this->session->set_flashdata('erreur', 'L\'heure de fin doit être supérieure à l\'heure de début.');
                $this->btn($id_classe); 
              }
              else
              { 
                $class_availability = $this->emploisModel->check_class_availability( $jour, $heure_debut, $heure_fin,$id_classe);
                      if ($class_availability>0) 
                        {
                          // Class is not available at this time, show an error message
                          $this->session->set_flashdata('erreur','La classe n\'est pas disponible à cette heure.');
                        
                          $this->btn($id_classe);
                          return false;
                        }
                        else{
                          $data = array(
                            "jour" => $this->input->post("jour"),
                            "heure_debut" => $this->input->post("heure_debut"),
                            "heure_fin" => $this->input->post("heure_fin"),
                            "id_matiere" => $this->input->post("matiere"),
                            "id_enseignant" => $this->input->post("enseignant"),
                            "id_classe" => $this->input->post("classe"),
                            );
                          $result=$this->emploisModel->creer($data); 
                            if ($result==true)
                              {
                                $this->session->set_flashdata('status','Séance ajoutée avec succès');
                                $this->index($id_classe);
                              } 
                            else 
                              {
                                $this->session->set_flashdata('erreur','echec');
                              }
                    }
              }}
          }}
  }
  public function get()
  {
    $this->load->model('AdminAcces');
      $this->load->view('menu');
      $this->load->model('EmploisModel');
      $data['emplois'] =$this->emploisModel->getEmploisByClasse('');
      $this->load->view('listEmplois',$data);
      $this->load->view('footer');   
  }
  public function consulter($id)
  {
    $this->load->model('emploisModel');
    $data['emplois'] = $this->emploisModel->getByClass($id);
    $this->load->view('menu');
    //print_r($data['emplois']);
    $this->load->view('consulterEmplois', $data);
    $this->load->view('footer');
    
  }  public function consulterr()
  {
    $this->load->model('emploisModel');
     if ($this->session->userdata('role') == 'enseignant')
     {
      $id=$this->session->userdata('auth_user')['id'];
      $idE=$this->enseigModel->getByIdUser($id)->id;
      $data['emplois'] = $this->emploisModel->getEmploisByEnseig($idE);
      $this->load->view('menu');
      $this->load->view('EmploisEnseig', $data);
      $this->load->view('footer');
    }
  }
  function getSubjectColor($subjectName)
  {
    switch ($subjectName) {
        case 'رياضيات':
            return 'green';
        case 'الإيقاظ':
            return 'blue';
        case 'قراءة':
            return 'orange';
            case 'انتاج':
              return 'sky';
        default:
            return 'pink';
    }
  }
  function  modifier($id) 
  {

    $data['id']=$id;
    $data['emplois']=$this->emploisModel->getByClass($id);
    $this->load->view('menu');
    $this->load->view('emploisun',$data);
    $this->load->view('footer');

    
  }
  function update($id){
    $data['matieres']= $this->MatiereModel->getAll();
    $data['enseignants']= $this->enseigModel->getAll();
    $data['emplois']=$this->emploisModel->getById($id);
    $this->load->view('menu');
    $this->load->view('modifierSeance',$data);
    $this->load->view('footer');

  }
  function upd($id)
  {
    $this->load->model('AdminAcces');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('jour', 'Jour', 'required');
    $this->form_validation->set_rules('heure_debut', 'Heure de début', 'required');
    $this->form_validation->set_rules('heure_fin', 'Heure de fin', 'required');
    // $this->form_validation->set_rules('id_matiere', 'Matière', 'required');
    // $this->form_validation->set_rules('id_enseignant', 'Enseignant', 'required');
   
    // print_r("idc".$id_classe);
    $this->form_validation->set_rules('heure_debut', 'Heure de début');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('erreur','champs non valide');
      $this->update($id);
      } 
    else {  $id_matiere = $this->input->post("matiere");
          $heure_debut = $this->input->post("heure_debut");
        $heure_fin = $this->input->post("heure_fin");
        $id_classe = $this->input->post("classe");
        $id_enseignant = $this->input->post("enseignant");
        $jour = $this->input->post("jour");
        // print_r("idz".$id_matiere.$id_classe);
        // print_r( "res".$this->emploisModel->getTotalDuration($id_matiere,$id_classe));
        $session_count = $this->emploisModel->count_sessions($id_enseignant,$heure_debut, $heure_fin,$jour,$id_classe);
        $total_duration=$this->emploisModel->getTotalDuration($id_matiere,$id_classe,$heure_debut,$heure_fin);
        if (is_string($total_duration)) {
          $this->session->set_flashdata('erreur',$total_duration);
          $this->update($id);
         
      } else {
        $this->session->set_flashdata('erreur',"Total duration is $total_duration hours.");
          if($session_count > 0){
                          // session already exists, return false to trigger validation error
                          $this->session->set_flashdata('erreur',"L'enseignant n'est disponible a cette");
                          $this->update($id);
                        return false;
                      } 
          else{
             if ($heure_fin < $heure_debut) 
              {
                
                $this->session->set_flashdata('erreur', 'L\'heure de fin doit être supérieure à l\'heure de début.');
                $this->update($id);
              }
              else
              { 
                $class_availability = $this->emploisModel->check_class_availability( $jour, $heure_debut, $heure_fin,$id_classe);
                      if ($class_availability>0) 
                        {
                          // Class is not available at this time, show an error message
                          $this->session->set_flashdata('erreur','La classe n\'est pas disponible à cette heure.');
                          $this->update($id);
                          return false;
                        }
                        else{
                          $data = array(
                            "jour" => $this->input->post("jour"),
                            "heure_debut" => $this->input->post("heure_debut"),
                            "heure_fin" => $this->input->post("heure_fin"),
                            "id_matiere" => $this->input->post("matiere"),
                            "id_enseignant" => $this->input->post("enseignant"),
                            "id_classe" => $this->input->post("classe"),
                            );
                          $result=$this->emploisModel->update($id,$data); 
                            if ($result==true)
                              {
                                $this->session->set_flashdata('status','Séance modifiée avec succès');
                                $this->update($id);
                              } 
                            else 
                              {
                                $this->session->set_flashdata('erreur','echec');
                              }
                    }
              }}
          }}
  }
}