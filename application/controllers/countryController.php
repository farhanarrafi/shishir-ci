<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CountryController extends CI_Controller {

	public function index()
	{
            // load model 
            $this->load->model('Country_model');
            /**
             * @var Object Object of Country_model 
             */
            $country = new Country_model();
            
            // Comment out the next line to get all rows
            $country->CountryID = 10;
            $result = $country->getCountryName();
            $this->load->view('countryView', array('result' => $result));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */