<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class User
 *
 * This class will handle all login and
 * registration requests to and from the server to client.
 *
 * This class will also handle authentication requests made
 * be other clients like phones and other websites.
 *
 * Worked here on April 13, 2015
 * 
 * Worked here on April 16, 2015
 * 
 * Worked here on April 19, 2015.
 *
 */
class User extends CI_Controller {

    private $data = array();
    
    /**
     * This variable stores the location of the 
     * view file that contains the HEADER.
     * It is introduced to make the Controller
     * more dynamic.
     * Worked here on April 19, 2015.
     * 
     * @var String 
     */
    private $header = 'usercontrol/header';
    /**
     * This variable stores the location of the 
     * view file that contains the FOOTER.
     * It is introduced to make the Controller
     * more dynamic.
     * Worked here on April 19, 2015.
     * 
     * @var String 
     */
    private $footer = 'usercontrol/footer';

    private $prefix = '<div class="alert alert-danger">'.
                '<button type="button" class="close" data-dismiss="alert"'.
                ' aria-hidden="true">&times;</button>';
        
    private $suffix = '</div>';
    /**
     * The index method which is the default 
     * method which will execute when control
     * is navigated to index.php\usercontrol\user\
     */
    
    
    public function index() {
        $data['title'] = "DashBoard";
        $this->load->model('User_model');
        $user = new User_model();
        $data['result'] = $user->getUserList();
        $this->load->view($this->header, $data);
        $this->load->view('usercontrol/user_view',$data);
        $this->load->view($this->footer);
    }

    /**
     * This method loads when the control is 
     * navigated to: index.php\usercontrol\user\login.
     * This method also processes the input and output
     * of the login method.
     * 
     * Worked here on April 19, 2015.
     * Worked here on April 20, 2015.
     */
    public function login()
    {
        $this->data['login_action'] = "Login";
        $this->load->library('session');
        $this->checkSession();
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $validation_OK = ($this->form_validation->run('user/login')== FALSE) ? FALSE  :  TRUE ;

        if($validation_OK==TRUE) {
            if($this->authenticate_login()) {
                $this->data['login_action'] = "Logout";
                echo "<h1>Logged in</h1>";
            }
            else {
                
            }
        }
        else {
            $this->form_validation->set_error_delimiters();
        }
        $data = $this->data;
        $data['title'] = "Login";
        $this->load->view($this->header, $data);
        $this->load->view('usercontrol/login', $data);
        $this->load->view($this->footer);

    }
    
    public function logout() {
        $this->load->library('session');
        $cookie = $this->input->cookie('user_cookie');
        print_r($cookie);
        //$this->input->set_cookie($name);
        $this->session->sess_destroy();
        
        
        //print_r($this->input->cookie());
        //print_r($this->session->all_userdata());
        echo "redirecting . . . ";
        redirect(base_url());
        
    }

    /**
     * The registration method handles registration input and outputs.
     * Checks validity and then stores the user information in the database.
     *
     * Worked here on April 13, 2015.
     */
    public function registration()
    {
        $this->data['login_action'] = "Registration";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['form-name'] = $this->input->post('form-name');
        $validation_OK = ($this->form_validation->run()== FALSE) ? FALSE  :  TRUE ;
        if($validation_OK==TRUE) {
            $this->load->library('session');
            if($this->authenticate_registration()) {
                $this->data['login_action'] = "Logout";
            }
            else {
                $data = $this->data;
            }
        } else {
            $this->form_validation->set_error_delimiters();
        }
        //echo "<h1>$form_name</h1>";
            
        
        $this->initialize("registraton-form", "Registration");
        $data = $this->data;
        $this->load->view($this->header, $data);
        $this->load->view('usercontrol/registration', $data);
        $this->load->view($this->footer);

    }

    /**
     * Initializes the variables for data insert.
     * So that empty or null is send in place of void.
     *
     * @param $formName passes the form name
     * @param $title passes the title of the page
     *
     *
     * Worked here on April 13, 2015.
     */
    private function initialize($form_name, $title) {
        $this->data['form_name'] = $form_name;
        $this->data['title'] = $title;
        $this->data['Firstname'] = "";
        $this->data['Lastname'] = "";
        $this->data['Email'] = "";
        $this->data['Password'] = "";

    }

    /**
     * Retrives the data from a form
     * @return array returns an array of user input
     *
     * Worked here on April 13, 2015.
     */
    private function authenticate_registration() {
        $this->data['Firstname'] = $this->input->post('first-name');
        $this->data['Lastname'] = $this->input->post('last-name');
        $this->data['Email'] = $this->input->post('email');
        $this->data['Password'] = $this->input->post('password');
        
        $this->load->model('User_model');
        $user = new User_model();
        $user->UserID = $user->getNextID();
        $user->Email = $this->data['Email'];
        $user->Password = $this->data['Password'];
        $user->Firstname = $this->data['Firstname'];
        $user->Lastname = $this->data['Lastname'];
        if($user->register_user()) {
            $hashpass = hash('sha256',$user->Password);
            $session = array('useremail'=> $user->Email, 'userpass' => $hashpass);
            $this->session->set_userdata($session);
            $cookie = array('name' => 'user_cookie', 'useremail' => $user->Email,
                            'userpass' => $hashpass, 'expire' => 36000,
                            'secure' => TRUE,);
            $this->input->set_cookie($cookie);
             return TRUE;
        } else {
            $this->data['error_message_email'] = $this->prefix."Email already exists in Database".$this->suffix;
        }
        return FALSE;
    }
    
    private function authenticate_login() {
        $this->data['signin-mail'] = $this->input->post('signin-mail');
        $this->data['signin-pass'] = $this->input->post('signin-pass');
        $this->load->model('User_model');
        $user = new User_model();
        $user->Email = $this->data['signin-mail'];
        $user->Password = $this->data['signin-pass'];
        if($user->authenticate_user()) {
            $hashpass = hash('sha256',$user->Password);
            $session = array('useremail'=> $user->Email, 'userpass' => $hashpass);
            $this->session->set_userdata($session);
            $cookie = array('name' => 'user_cookie', 'useremail' => $user->Email,
                            'userpass' => $hashpass, 'expire' => 36000,
                            'secure' => TRUE,);
            $this->input->set_cookie($cookie);
            return TRUE;
        } 
        else {
            $this->data['error_message'] = $this->prefix."Username and Password doesn't match.".$this->suffix;
            return FALSE;
        }
    }
    
    
    private function checkSession() {
        //$this->session->sess_destroy();
        $cook_uname = $this->input->cookie('username');
        $userData = $this->session->all_userdata();
        if(isset($cook_uname) and isset($userData['username']) and $cook_uname==$userData['username']) {
            print_r($userData);
        }
    }

    /* End of file User.php */
    /* Location: ./application/controllers/usercontrol/User.php */
}