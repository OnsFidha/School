<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class demandeController extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
       
    }
	public function index()
	{
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
		// $config=[
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.gmail.com', 
        //     'smtp_port' => 465, 
        //     'smtp_user' => 'onsfidha3@gmail.com', 
        //     'smtp_pass' => '', 
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'wordwrap' => TRUE
        // ];
		// $this->load->library('email',$config);
		// $this->email->set_newline("\r\n");
		// $this->email->initialize($config);
		// $this->email->from('onsfidha3@gmail.com','admin');
		// $this->email->to('wiemdakhli7@gmail.com');
		// $this->email->subject('Demande d\'inscription à SCHOOLYY');
		// $this->email->message('Dommage ! votre demande a été refusée, 
		// 					   merci pour votre confiance.');
		// if (!$this->email->send())
		// show_error($this->email->print_debugger());
		// else
		// echo 'Your e-mail has been sent!';
		$this->Demande->updateDemandeEtat($id,0);
		//echo $this->email->print_debugger();
		redirect(base_url('demande/liste'));
	}
	public function accepterDemande($id)
	{
		$this->load->model('AdminAcces');
		$this->load->model('Demande');
		$this->load->model('Demande');
		$demande=$this->Demande->getDemandeById($id);
		// $config=[
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.gmail.com', 
        //     'smtp_port' => 465, 
        //     'smtp_user' => 'onsfidha3@gmail.com', 
        //     'smtp_pass' => '', 
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'wordwrap' => TRUE
        // ];
		// $this->load->library('email',$config);
		// $this->email->set_newline("\r\n");
		// $this->email->initialize($config);
		// $this->email->from('onsfidha3@gmail.com','admin');
		// $this->email->to('wiemdakhli7@gmail.com');
		// $this->email->subject('Demande d\'inscription à SCHOOLYY');
		// $this->email->message('Votre demande a été acceptée! 
		// merci de passer par l\'école
		// pour finaliser votre inscription.');
		// if (!$this->email->send())
		// show_error($this->email->print_debugger());
		// else
		// echo 'Your e-mail has been sent!';
		if($demande->etat=='2'){
			$this->Demande->updateDemandeEtat($id,3);}
		elseif($demande->etat=='3'){
			$this->Demande->updateDemandeEtat($id,1);
			$this->finaliser($id);
		}
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
    public function get($id)
	{
		$this->load->model('Demande');
		$data['demande']=$this->Demande->getDemandeById($id);
		$this->load->view('menu');
		$this->load->view('demande/consulterDemande',$data);
		$this->load->view('footer');
	}
    public function finaliser($id) 
	{
        $this->load->model('Demande');
        $d=$this->Demande->getDemandeById($id);
        $this->load->model('Eleve');
        $this->load->model('ParentEleve');
        $data = array(
            'prenom' => $d->prenomParent,
            'nom' => $d->nomParent,
            'cin' => $d->cin,
            'telephone' =>$d->telephone,
            'email' => $d->email,
            'adresse' => $d->adresse,
            //'dateNaissance' => $this->input->post('dateNaissance'),
            );
        $id=$this->ParentEleve->insertpe($data);
        $dossierData=[
			'taille'=>$d->taille,
			'poids'=>$d->poids,
			'groupeSanguin'=>$d->groupeSanguin,
			'allergies'=>$d->allergies,
			'medicaments'=>$d->medicaments,
		];
			$this->load->model('DossierMedical');
			$this->DossierMedical->insertDossierMedical($dossierData);
			$id_dossierMedical=$this->db->insert_id();
            $dateActuelle = new DateTime(); 
            $dateNaissance = new DateTime($d->dateNaissance);
            $difference = $dateActuelle->diff($dateNaissance); 
            $age = $difference->y;
			$eleveData=[
				'prenom'=>$d->prenomEnfant,
				'nom'=>$d->nomEnfant,
				'dateNaissance'=>$d->dateNaissance,
				'age'=>$age,
				'sexe'=>$d->sexe,
				'adresse'=>$d->adresse,
				'id_dossierMedical'=>$id_dossierMedical,
				'id_parent'=>$id,
				'isCantine'=>$d->isCantine,
			];
			$this->Eleve->insertEleve($eleveData);
			$this->Demande->updateDemandeEtat($id,1);
			redirect(base_url('demande/liste'));
    }
    public function creerDemande() 
	{
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
        $taille = $this->input->post('taille');
        $poids = $this->input->post('poids');
        $groupeSanguin = $this->input->post('groupeSanguin');
        $allergies = $this->input->post('allergies');
        $medicaments = $this->input->post('medicaments');
        $isCantine = $this->input->post('isCantine');
        

        $this->load->model('Demande');
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
            'taille' => $taille,
            'poids' => $poids,
            'groupeSanguin' => $groupeSanguin,
            'allergies' => $allergies,
            'medicaments' => $medicaments,
            'medicaments' => $medicaments,
            'isCantine'=>$isCantine,
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
