<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
            $this->load->model('Product_model');
            $product = new Product_model();
            $data['result'] = $product->getList();
            
            $data['title'] = "Homepage";
            $this->load->view('common/header',$data);
            //$this->load->view('common/slider');
            $this->load->view('home_view',$data);
            $this->load->view('common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */