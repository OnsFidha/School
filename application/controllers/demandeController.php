<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class demandeController extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('AdminAcces');
    }
	public function index(){
		$this->load->model('Demande');
		$data=$this->Demande->getDemandes();
		$this->load->view('menu');
		$this->load->view('demande/listeDemandes',['demande'=>$data]);
		$this->load->view('footer');

	}


	public function refuserDemande($id){

		$this->load->model('Demande');

    	$this->Demande->updateDemandeEtat($id,0);

		//$this->Demande->getDemandeById($id);

		$config=[
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com', // Example SMTP host
            'smtp_port' => 465, // Example SMTP port
            'smtp_user' => 'hvh912326@gmail.com', // Example SMTP username
            'smtp_pass' => 'cartwknilrpeyhbc', // Example SMTP password
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        ];


		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");

		$this->email->initialize($config);
		
		$this->email->from('hvh912326@gmail.com','admin');
		$this->email->to('wiemdakhli7@gmail.com');
		
		
		$this->email->subject('Demande d\'inscription à SCHOOLYY');
		$this->email->message('Dommage ! votre demande a été refusée, 
							   merci pour votre confiance.');
		
		//$this->email->send();
		if (!$this->email->send())
		show_error($this->email->print_debugger());
		else
		echo 'Your e-mail has been sent!';
		
		//echo $this->email->print_debugger();
		redirect(base_url('demande/liste'));
		
	}
	public function accepterDemande($id){

		$this->load->model('Demande');

    	$this->Demande->updateDemandeEtat($id,1);

		$config=[
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com', // Example SMTP host
            'smtp_port' => 465, // Example SMTP port
            'smtp_user' => 'hvh912326@gmail.com', // Example SMTP username
            'smtp_pass' => 'cartwknilrpeyhbc', // Example SMTP password
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        ];


		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");

		$this->email->initialize($config);
		
		$this->email->from('hvh912326@gmail.com','admin');
		$this->email->to('wiemdakhli7@gmail.com');
		
		
		$this->email->subject('Demande d\'inscription à SCHOOLYY');
		$this->email->message('Votre demande a été acceptée! 
		merci de passer par l\'école
		pour finaliser votre inscription.');
		
		//$this->email->send();
		if (!$this->email->send())
		show_error($this->email->print_debugger());
		else
		echo 'Your e-mail has been sent!';
		
		//echo $this->email->print_debugger();
		redirect(base_url('demande/liste'));
		
	}

}
