<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class EnseignAcces extends CI_Model {
    public function __construct()
    { parent::__construct();
        if($this->session->has_userdata('authenticated')){
            if($this->session->userdata('role') == 'enseignant'){
              
            }
        
        else{
            redirect(base_url('admin'));
        }
    }
else {
    $this->session->set_flashdata('status',"il faut s'authentifier d'abord");
    redirect(base_url('login'));
}}
}
?>