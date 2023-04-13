<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class AuthentificationModel extends CI_Model {
    public function __construct()
    { parent::__construct();
        if($this->session->has_userdata('authenticated')){
            if($this->session->userdata('authenticated') == '1'){
              
            }
        }
        else{
           $this->session->set_flashdata('status',"il faut s'authentifier d'abord");
            redirect(base_url('login'));
        }
    }
}
?>