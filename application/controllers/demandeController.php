<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class demandeController extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
       
    }
	public function index(){
		$this->load->model('Demande');
		$data=$this->Demande->getDemandes();
		$this->load->view('menu');
		$this->load->view('demande/listeDemandes',['demande'=>$data]);
		$this->load->view('footer');

	}
	public function refuserDemande($id)
	{ 	
		$this->load->model('AdminAcces');
		$this->load->model('Demande');
		$config=[
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com', // Example SMTP host
            'smtp_port' => 465, // Example SMTP port
            'smtp_user' => 'onsfidha3@gmail.com', // Example SMTP username
            'smtp_pass' => '', // Example SMTP password
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        ];
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->initialize($config);
		$this->email->from('onsfidha3@gmail.com','admin');
		$this->email->to('wiemdakhli7@gmail.com');
		$this->email->subject('Demande d\'inscription à SCHOOLYY');
		$this->email->message('Dommage ! votre demande a été refusée, 
							   merci pour votre confiance.');
		if (!$this->email->send())
		show_error($this->email->print_debugger());
		else
		echo 'Your e-mail has been sent!';
		$this->Demande->updateDemandeEtat($id,0);
		//echo $this->email->print_debugger();
		redirect(base_url('demande/liste'));
	}
	public function accepterDemande($id)
	{
		$this->load->model('AdminAcces');
		$this->load->model('Demande');
		$config=[
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com', // Example SMTP host
            'smtp_port' => 465, // Example SMTP port
            'smtp_user' => 'onsfidha3@gmail.com', // Example SMTP username
            'smtp_pass' => '', // Example SMTP password
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        ];
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->initialize($config);
		$this->email->from('onsfidha3@gmail.com','admin');
		$this->email->to('wiemdakhli7@gmail.com');
		$this->email->subject('Demande d\'inscription à SCHOOLYY');
		$this->email->message('Votre demande a été acceptée! 
		merci de passer par l\'école
		pour finaliser votre inscription.');
		if (!$this->email->send())
		show_error($this->email->print_debugger());
		else
		echo 'Your e-mail has been sent!';
		$this->Demande->updateDemandeEtat($id,1);
		//echo $this->email->print_debugger();
		redirect(base_url('demande/liste'));
		
	}
    public function ajouter() 
	{
        $this->load->model('Demande');
        $prenomParent = $this->input->post('prenomParent');
        $nomParent = $this->input->post('nomParent');
        $cin = $this->input->post('cin');
        $telephone = $this->input->post('telephone');
        $email = $this->input->post('email');
        $adresse = $this->input->post('adresse');
        $prenomEnfant = $this->input->post('prenomEnfant');
        $nomEnfant = $this->input->post('nomEnfant');
        $sexe = $this->input->post('sexe');
        $dateNaissance = $this->input->post('dateNaissance');
        $data = array(
            'prenomParent' => $prenomParent,
            'nomParent' => $nomParent,
            'cin' => $cin,
            'telephone' => $telephone,
            'email' => $email,
            'adresse' => $adresse,
            'prenomEnfant' => $prenomEnfant,
            'nomEnfant' => $nomEnfant,
            'sexe'=>$sexe,
            'dateNaissance'=>$dateNaissance,
        );
        $this->Demande->insert($data);

        $response = array(
            'success' => true,
            'message' => 'User registered successfully.'
        );
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
