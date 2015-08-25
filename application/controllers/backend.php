<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Backend provides a backend REST
 * service to let other devices
 * access this application as a webserver.
 * 
 * Basic CRUD functions(create, read, update, delete)
 * are provided here.
 *
 *
 * Worked here on April 13, 2015
 * 
 */
class Backend extends CI_Controller {
    
        public function __construct() {
            parent::__construct();
            $this->load->helper('url_helper');
        }

    	public function index()
	{       $this->load->view('common/header');
			$data ['site_url'] = site_url();
			$data['current_url'] = current_url();
			$this->load->view('backend/homeView', $data);
			$this->load->view('common/footer');
	}
        
        private function product() {
            $this->load->model('Product_model');
            $product = new Product_model();
            $data['result'] = $product->getListArray();
            return $data['result'];
        }
        
        private function category() {
            echo "Category Backend";
        }

        public function get() 
        {
            
            if(strpos(current_url(), 'product')) {
                $data['result'] = $this->product();
            }
            $this->output->set_content_type('application/json');
            $this->load->view('backend/getView',$data);
        }
        
        public function post()
        {
            $this->load->view('common/header');
            $this->load->view('backend/postView');
            $this->load->view('common/footer');
        }
        
        public function update()
        {
            $this->load->view('common/header');
            $this->load->view('backend/updateView');
            $this->load->view('common/footer');
        }
        
        public function delete()
        {
            $this->load->view('common/header');
            $this->load->view('backend/deleteView');
            $this->load->view('common/footer');
        }
        
        public function json() {
            $this->output->set_content_type('application/json');
            $data = '{"name":"farhan"}';
            $this->output->set_output($data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */