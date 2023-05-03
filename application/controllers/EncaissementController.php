<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EncaissementController extends CI_Controller {
	public function __construct() 
    {
        parent::__construct();
        $this->load->model('AdminAcces');
    }
    public function afficherFacture($id){
		$this->load->model('Eleve');
		$dataEleve=$this->Eleve->getEleveById($id);
		$idEleve=$dataEleve->id;
		$isCantine=$dataEleve->isCantine;


		$this->load->model('Encaissemant');
		$dataEncaiss=$this->Encaissemant->consulterSelonEleve($idEleve);
	
		$idPeriode=$dataEncaiss->id_periode;
		//$idPeriode2=$dataEncaiss[1]->id_periode;
		
		$this->load->model('Periode');
		$dataPeriode=$this->Periode->consulter($idPeriode);
		$idFacture=$dataPeriode->id_facture;

		$this->load->model('Facture');
		$dataFacture=$this->Facture->consulter($idFacture);	

		$this->load->model('Eleve');
		$dataEleve=$this->Eleve->getEleveById($idEleve);
		

		if($dataFacture->type=='trimestriel'){
			if($dataEncaiss->datePaiement==NULL){
				if ($isCantine==1) {
					if($dataEleve->id_club!=NULL){
						$montant=$dataFacture->montantFrais+
						$dataFacture->montantClub+
						$dataFacture->montantCantine+
						$dataFacture->fraisInscription;
					}
					else{
						$montant=$dataFacture->montantFrais+
						$dataFacture->montantCantine+
						$dataFacture->fraisInscription;
					}

				}
				else{
					if($dataEleve->id_club!=NULL){
						$montant=$dataFacture->montantFrais+
						$dataFacture->montantClub+
						$dataFacture->fraisInscription;
					}
					else{
						$montant=$dataFacture->montantFrais+
						$dataFacture->fatisInscription;
					}
				}
			}
			else{
				if ($isCantine==1) {
					if($dataEleve->id_club!=NULL){
						$montant=$dataFacture->montantFrais+
						$dataFacture->montantClub+
						$dataFacture->montantCantine;					}
					else{
						$montant=$dataFacture->montantFrais+
						$dataFacture->montantCantine;
					}
				}
				else{
					if($dataEleve->id_club!=NULL){
						$montant=$dataFacture->montantFrais+
						$dataFacture->montantClub;
					}
					else{
						$montant=$dataFacture->montantFrais;
					}
				}
			}	
			};

			$data=[
				'encaissement'=>$dataEncaiss,
				'periode'=>$dataPeriode,
				'facture'=>$dataFacture,
				'isCantine'=>$isCantine,
				'eleve'=>$dataEleve,
				'montant'=>$montant				
			];

			$this->load->view('menu');
		$this->load->view('caisse/encaissement/consulterFacture',$data);
		$this->load->view('footer');
	}
	
	public function listeEncaissements()
	{
		$this->load->model('Encaissemant');
		$data['encaissements'] = $this->Encaissemant->consulterSelonElevePeriode();
		$this->load->view('menu');
		$this->load->view('caisse/encaissement/listeEncaissements',$data);
		$this->load->view('footer');
	}

	public function payerFacture($id,$montant){

		// $this->load->model('ParentEleve');
		// $dataParent=$this->ParentEleve->getParentById($id);
		// $idEleve=$dataParent->id_eleve;


		$dataEncaiss=[
			'montantPaye'=> $montant,
			'statue'=> 1,
			'datePaiement'=> date('Y-m-d')
		];

		$this->load->model('Encaissemant');
        $this->Encaissemant->modifier($dataEncaiss,$id);
		
		//$this->load->library('session');
		// $this->session->set_flashdata('success', 'Paiement assuré avec succès');

        redirect(base_url('encaissement/liste'));
		
	}

}


