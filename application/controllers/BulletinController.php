<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BulletinController extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        //$this->load->model('classeModel');
        //$this->load->model('AdminAcces');
        $this->load->model('enseigModel');
        
        $this->load->model('Eleve');
    }
    public function ajouterBulletin(){
        $matiere = $this->input->post('matiere');
        $idClasse = $this->input->post('idClasse');
        $eleves=$this->Eleve->getEleveByClasse($idClasse);
        $data['idclasse']=$idClasse;
        $data['matiere']=$matiere; 
        $data['param']=$eleves;
        $data['nb']=count($eleves);
        $string=$this->load->view('ajouterBulletin',$data,true);
        $response['eleves']=$string;
        
        echo json_encode($response);}

        public function saisir()
        {  $id=$_POST['ca'];
            print_r($id);
            $this->form_validation->set_rules('bul', 'Note', 'required|greater_than_equal_to[0]|less_than_equal_to[20]', array(
                'required' => 'La %s est obligatoire.',
                'greater_than_equal_to' => 'La %s doit être supérieure ou égale à 0.',
                'less_than_equal_to' => 'La %s doit être inférieure ou égale à 20.'
            ));
            
                $this->form_validation->set_rules('app','appréciation','required', array(
                    'required' => "l' %s est obligatoire"));
                if($this->form_validation->run()==FALSE)
                {
                    //failed 
                //    $this->index();
              
                redirect('classe/matieres/' . $id);
                
                }
                else 
                {
            $bul = $_POST['bul'];
            $mat = $_POST['mat'];
            $app = $_POST['app'];
            $this->load->model('Evaluation');
        	$idUser=$this->session->userdata('auth_user')['id'];
			$enseigant= $this->enseigModel->getByIdUser($idUser);
            // Iterate over bul array and add remarks from app array
            foreach ($bul as $index => &$note) {
                $studentId = $note['studentId'];
                $notes = $note['note'];
        
                // Get the corresponding remark from the app array using the same index
                $remark = $app[$index]['rem'];
        
                $note['remark'] = $remark;
        
                $data = [
                    'id_eleve' => $studentId,
                    'note' => $notes,
                    'appréciation' => $remark,
                    'id_enseignant' => $enseigant->id,
                    'id_matiere' => $mat
                ];
        
                $this->Evaluation->creer($data);
            }
        }}
        
    }

