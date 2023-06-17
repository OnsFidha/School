<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuController extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('AdminAcces');}
    public function index()
    {
        $this->load->view('menu');
        $this->load->view('menu/ajouterMenu');
        $this->load->view('footer');
    }

    public function listerMenu()
    {
        $this->load->model('Semaine');
        $dataSemaines=$this->Semaine->lister();

        $this->load->model('Menu');
        $dataMenus=$this->Menu->lister();

        $data=[
            'semaines'=>$dataSemaines,
            'menus'=>$dataMenus
        ]; $this->load->view('menu');
        $this->load->view('menu/listeMenus',$data);
        $this->load->view('footer');
    }
    public function ajouter()
    {

        $dateDebut = $this->input->post('dateDebut');
        $dateMardi = date('Y-m-d', strtotime($dateDebut . ' +1 day'));
        $dateMercredi = date('Y-m-d', strtotime($dateMardi . ' +1 day'));
        $dateJeudi = date('Y-m-d', strtotime($dateMercredi . ' +1 day'));
        $dateFin = $this->input->post('dateFin');

        $dataSemaine=[
            'dateDebut'=>$dateDebut,
            'dateFin'=>$dateFin
        ];
        
        $this->load->model('Semaine');
        $this->Semaine->inserer($dataSemaine);
        $idSemaine=$this->db->insert_id();

        $jour = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi'];

        $lundiMenu=[
            'jour'=>$dateDebut,
            'entree'=>$this->input->post('entreeLun'),
            'platPrincipal'=>$this->input->post('platLun'),
            'dessert'=>$this->input->post('dessertLun'),
            'id_semaine'=>$idSemaine          
        ];

        $mardiMenu=[
            'jour'=>$dateMardi,
            'entree'=>$this->input->post('entreeMar'),
            'platPrincipal'=>$this->input->post('platMar'),
            'dessert'=>$this->input->post('dessertMar'),
            'id_semaine'=>$idSemaine          
        ];

        $mecrediMenu=[
            'jour'=>$dateMercredi,
            'entree'=>$this->input->post('entreeMer'),
            'platPrincipal'=>$this->input->post('dessertMer'),
            'dessert'=>$this->input->post('dessertMer'),
            'id_semaine'=>$idSemaine          
        ];

        $jeudiMenu=[
            'jour'=>$dateJeudi,
            'entree'=>$this->input->post('entreeJeu'),
            'platPrincipal'=>$this->input->post('platJeu'),
            'dessert'=>$this->input->post('dessertJeu'),
            'id_semaine'=>$idSemaine          
        ];

        $vendrediMenu=[
            'jour'=>$dateFin,
            'entree'=>$this->input->post('entreeVen'),
            'platPrincipal'=>$this->input->post('platVen'),
            'dessert'=>$this->input->post('dessertVen'),
            'id_semaine'=>$idSemaine          
        ];
      
        $this->load->model('Menu');
        $this->Menu->inserer($lundiMenu);
        $this->Menu->inserer($mardiMenu);
        $this->Menu->inserer($mecrediMenu);
        $this->Menu->inserer($jeudiMenu);
        $this->Menu->inserer($vendrediMenu);
        
        echo "ok";
        redirect(base_url('menu/liste'));
        
    }
    public function consulterMenu($idSemaine)
    {
        $this->load->model('Semaine');
        $dataSemaine=$this->Semaine->consulter($idSemaine);

        $this->load->model('Menu');
        $dataMenu=$this->Menu->consulterMenuSemaine($idSemaine);

        //echo $dataMenu[0];

        $data=[
            'semaine'=>$dataSemaine,
            'menuLun'=>$dataMenu[0],
            'menuMar'=>$dataMenu[1],
            'menuMer'=>$dataMenu[2],
            'menuJeu'=>$dataMenu[3],
            'menuVen'=>$dataMenu[4],
        ];
        // echo "       entree      ".$data['menuLun']->entree;

        if($this->uri->segment(2)==="consulter"){
            $this->load->view('menu');
            $this->load->view('menu/consulterMenu',$data);
            $this->load->view('footer');
        }else{
            $this->load->view('menu');
            $this->load->view('menu/modifierMenu',$data);
            $this->load->view('footer');
        }

    }
    public function consulterMenuAPI($idSemaine){

        $this->load->model('Semaine');
        $dataSemaine = $this->Semaine->consulter($idSemaine);
    
        $this->load->model('Menu');
        $dataMenu = $this->Menu->consulterMenuSemaine($idSemaine);
    
        if (!empty($dataSemaine) && !empty($dataMenu)) {
            $response = array(
                'message' => 'Success',
                'status_code' => 200,
                'semaine' => $dataSemaine,
                'menuLun' => $dataMenu[0],
                'menuMar' => $dataMenu[1],
                'menuMer' => $dataMenu[2],
                'menuJeu' => $dataMenu[3],
                'menuVen' => $dataMenu[4]
            );
        } else {
            $response = array(
                'message' => 'Aucun menu n\'est trouvé pour cette semaine',
                'status_code' => 404
            );
        }
    
        $this->output
            ->set_content_type('application/json')
            ->set_status_header($response['status_code'])
            ->set_output(json_encode($response));

    }
    public function notifierMenu($idSemaine)
    {
        $this->load->model('Semaine');
        $dataSemaine=$this->Semaine->consulter($idSemaine);
        $this->load->model('Menu');
        $dataMenu=$this->Menu->consulterMenuSemaine($idSemaine);
        $dataMenu=[
            'semaine'=>$dataSemaine,
            'menuLun'=>$dataMenu[0],
            'menuMar'=>$dataMenu[1],
            'menuMer'=>$dataMenu[2],
            'menuJeu'=>$dataMenu[3],
            'menuVen'=>$dataMenu[4],
        ];
        $to="fEfvbmfrREyS9Ns0hMjGiI:APA91bG5uILT8SomnF9pJHwxsv6folJEqv7LnK-FFghls0-iNgwDyHpfrpHaKoPxYqSriihxUYv3FZseY4ZIOO0uUoUdsXg6X2P6m50nX5MlRcQ2mt8LHUIhl6BjkZIkPQ-odDSWcr2A";
        $data=array(
            'title'=>'Menu de la Semaine',
        );
        $this->load->model('Notification');
        $this->Notification->notify($to,$data);
        //echo("notifiaction sent ");
        redirect('menu/liste');
    }
}