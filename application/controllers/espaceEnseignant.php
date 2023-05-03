<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class espaceEnseignant extends CI_Controller {
	public function __construct() 
    {
        parent::__construct();
        $this->load->model('EnseignAcces');
	}
	public function index()
	{
	$this->load->view('menu');
	$this->load->view('enseignant');
	$this->load->view('footer'); 
	
	}
}
