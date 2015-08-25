<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashboardHome extends CI_Controller {
    
    public function index() {
        $data['title'] = "DashBoard";
        $this->load->view('usercontrol/header', $data);
        $this->load->view('dashboard/home');
        $this->load->view('usercontrol/footer');
    }
    
    
}
