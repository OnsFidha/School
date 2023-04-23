<?php
class Auth_test extends TestCase {

protected $CI;

public function setUp()
{
    $this->CI = &get_instance();
}

public function test_login()
{   // load userModel 
    $this->CI->load->model('userModel');
    //user 
    $email = 'onss@gmail.com';
    $password = '123456';
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $user_data = array(
        'email' => $email,
        'mot_de_passe' => $hashed_password
    );
    //insert user 
    $this->CI->userModel->registerUser($user_data);
    
    //call the check function to see if the user exist and can log in 
    $this->assertTrue($this->CI->userModel->check($user_data));

     // Check that the user's email is stored in the session correctly
     $this->assertEquals($email, $this->CI->session->userdata('email'));
    
}
}?>