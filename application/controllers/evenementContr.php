<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class evenementContr extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Evenement');
       // $this->load->model('AdminAcces');
    }
    public function index()
    {
            $this->load->view('menu');
            $data['evenements']= $this->Evenement->lister();
            $this->load->view('listeEvenement',$data);
            $this->load->view('footer');   
    }
    public function ajouter()
    {
        $this->load->view('menu');
        $this->load->view('ajoutEvenement');
        $this->load->view('footer');
    }   
    public function add()
    {
        $this->form_validation->set_rules('nom','nom','required', array(
                'required' => 'le %s est obligatoire'));
        $this->form_validation->set_rules('description','description','required', array(
            'required' => 'le %s est obligatoire'));
        $this->form_validation->set_rules('dateEvenement',"la date d'évènement",'required', array(
            'required' => ' %s est obligatoire'));
        $this->form_validation->set_rules('lieu','lieu','required', array(
            'required' => 'le %s est obligatoire')); 
        $this->form_validation->set_rules('organisateur','organisateur','required', array(
            'required' => "l' %s est obligatoire")); 
        $this->form_validation->set_rules('avecInscri','champs est inscrit','required', array(
            'required' => 'la %s est obligatoire')); 
        // $this->form_validation->set_rules('nbreMax','nombre maximale','required', array(
        //     'required' => 'la %s est obligatoire')); 
        if($this->form_validation->run()==FALSE)
        {
            //failed 
            $this->ajouter();
            }
        else 
        {
            $data=array(
                'nom'=>$this->input->post('nom'),
                'description'=>$this->input->post('description'),
                'dateEvenement'=>$this->input->post('dateEvenement'),
                'lieu'=>$this->input->post('lieu'),
                'organisateur'=>$this->input->post('organisateur'),
                'avecInscri'=>$this->input->post('avecInscri'),
                'nbreMax'=>$this->input->post('nbreMax'),
               );
          
            $cheking=$this->Evenement->inserer($data);
            if ($cheking)
                {
                    $this->session->set_flashdata('status','Evènement ajouté avec succès');

                 redirect('listeEvenement');
                }
            else 
                { }
        }
    }
    public function modifier($id)
    {
        $data['evenement']=$this->Evenement->consulter($id);
        $this->load->view('menu');
        $this->load->view('modifierEvenement',$data);
        $this->load->view('footer');
    }  
    public function editer($id)
    {
        $this->form_validation->set_rules('nom','nom','required', array(
            'required' => 'le %s est obligatoire'));
        $this->form_validation->set_rules('description','description','required', array(
            'required' => 'le %s est obligatoire'));
        $this->form_validation->set_rules('dateEvenement',"la date d'évènement",'required', array(
            'required' => ' %s est obligatoire'));
        $this->form_validation->set_rules('lieu','lieu','required', array(
            'required' => 'le %s est obligatoire')); 
        $this->form_validation->set_rules('organisateur','organisateur','required', array(
            'required' => "l' %s est obligatoire")); 
        $this->form_validation->set_rules('avecInscri','champs est inscrit','required', array(
            'required' => 'la %s est obligatoire')); 
        if($this->form_validation->run()){
            $data=array(
            'nom'=>$this->input->post('nom'),
            'description'=>$this->input->post('description'),
            'dateEvenement'=>$this->input->post('dateEvenement'),
            'lieu'=>$this->input->post('lieu'),
            'organisateur'=>$this->input->post('organisateur'),
            'avecInscri'=>$this->input->post('avecInscri'),
            'nbreMax'=>$this->input->post('nbreMax'),
               );
            $res=$this->Evenement->modifier($data,$id);
            if($res){
                $this->session->set_flashdata('status'," L'évènement est modifié");
                redirect(base_url('listeEvenement'));
                     }
            else {
                return $this->modifier($id);
            }
        }
    }
    public function supprimer($id){
		$this->Evenement->supprimer($id);
		redirect(base_url('listeEvenement'));
	}
    public function consulter($id)
    {
        $data['evenement']=$this->Evenement->consulter($id);
        $this->load->view('menu');
        $this->load->view('detailEvenement',$data);
        $this->load->view('footer');
    }  
    

}