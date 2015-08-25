<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class MY_Form_validation
 *
 *
 * This class is an extension of the Form Validation Class
 * This class will hold additional callback functions
 * for form validation.
 *
 *
 *
 * Worked here on April 13, 2015
 */
class MY_Form_validation extends CI_Form_validation {

    CONST message = 'The %s you entered is wrong. Please try again.';
    
    function __construct($config = array()) {
        parent::__construct($config);
    } 
    
    public function set_error_delimiters()
    {
        $prefix = '<div class="alert alert-danger">'.
                '<button type="button" class="close" data-dismiss="alert"'.
                ' aria-hidden="true">&times;</button>';
        
        $suffix = '</div>';
             
        $this->_error_prefix = $prefix;
        $this->_error_suffix = $suffix;

        return $this;
    }
    /*
    public function user_exists($str) {
        //echo $this->CI->User_model->Password;
        //echo $this->CI->User_model->Email;
        //echo "callback user exists working.";
        $this->CI->load->model('User_model');
        $user = new User_model();
        $user->Email = $str;
        //echo $user->Email;
        if($user->userExists($str)) {
            $this->User_model->Email = $str;
            return TRUE;
        }
        else {
            $this->set_message('user_exists',$this::message);
        }
        return FALSE;
    }
    
    public function authenticate_user($password) {
        $this->CI->load->model('User_model');
        $user = new User_model();
        $user->Email = $this->CI->User_model->Email;
        $user->Password = $password;
        if($user->authenticateUser()) {
            return TRUE;
        }
        else {
            $this->set_message('authenticate_user',$this::message);
        }
        return FALSE;
        
    }
    */
}

/* End of file MY_Form_validation.php */