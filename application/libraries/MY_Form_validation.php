<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function is_valid_number($number) {
        $this->CI->form_validation->set_message('is_valid_number', 'The %s must be 8 digits long and start with 2, 9, 4, or 5.');

        if (preg_match('/^[2|9|4|5]\d{7}$/', $number)) {
            return true;
        }
        return false;
    }
}
