<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @version 0.5 Completed the Add Product with image upload functionality on 8/4/2015
 */
class Product extends CI_Controller {
    
    private $data = array();
    
    private $header = 'common/header';
    private $footer = 'common/footer';
    /**
     * This function loads the 
     */
    public function index() {
        $data['title'] = "DashBoard";
        $data['query'] = $this->db->query("SELECT `P`.`ProductName`,".
                        " `P`.`Price`, `P`.`Stock`,".
                        " `P`.`ImageSource`, `C`.`CategoryName`".
                        "FROM `product` AS `P`".
                        "LEFT JOIN `category` AS `C`".
                        "ON `P`.`CategoryID` = `C`.`CategoryID`".
                        "ORDER BY `P`.`ProductID`;");
        
        // Call view files and pass necessary data to them.
        $this->load->view($this->header, $data);
        $this->load->view('dashboard/product/product_view', $data);
        $this->load->view($this->footer);
    }
    /**
     * Worked here on 5/4/2015.
     * 
     * @version 1.0
     * Worked here on 8/4/2015 and completed the module.
     * Now it works fine
     */
    
    public function add() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $validation_OK = ($this->form_validation->run()== FALSE) ? FALSE  :  TRUE ;
        $data['upload_data'] = array();
        if($validation_OK==TRUE) {
            $upload_OK = $this->uploadImage();
//            $data = $this->retrive_data();
            if($upload_OK == TRUE) {
                  $data = $this->retrive_store_data();
                redirect('/dashboard/product/'); 
            }
        }
        else {
            $this->form_validation->set_error_delimiters();
        }
        
        $this->initialize("add-product", "Add Product");
        $data = $this->data;
        $data['title'] = "Add Product";
        $data['query'] = $this->db->get('category');
        $this->load->view($this->header, $data);
        $this->load->view('dashboard/product/product_crud',$data);
        $this->load->view($this->footer);
        
    }
    
    public function delete() {
        
    }
    
    public function edit() {
        
    }
 
    /**
     * 
     * @param string $formName The form name is passed here to
     * select a from to be displayed
     * @param string $title The tile of the page to be displayed
     */
    private function initialize($formName, $title) {
        $this->data['form_name'] = $formName;
        $this->data['$title'] = $title;
        $this->data['product_name'] = "";
        $this->data['product-category'] = "";
        $this->data['product-description'] = "";
        $this->data['product-stock'] = "";
        $this->data['product-price'] = "";
        $this->data['product-image'] = "";
    }

    /**
     * Retrives the data from a form
     * @return array returns an array of user input
     */
    private function retrive_store_data() {
        $this->load->model('Product_model');
        $product = new Product_model();
        $product->ProductID = $product->getNextID();;
        $product->ProductName = $this->input->post('product-name');
        $category = explode("-", $this->input->post('product-category'));
        $product->CategoryID = $category[1];
        $product->Description = $this->input->post('product-description');
        $product->Stock = $this->input->post('product-stock');
        $product->Price = $this->input->post('product-price');
        $product->ImageSource = $this->data['product-image'];
        $product->dbInsert();
        return $this->data;
    }
    
    private function uploadImage() {
        $this->load->library('upload');
            if(!$this->upload->do_upload()){
                $this->data['upload-error'] = $this->upload->display_errors();
                echo "<h1>".$this->upload->display_errors()."</h1>";
            } else {
                $upload_data = $this->upload->data();
                $this->data['product-image'] = $upload_data['file_name'];
                //$this->data['product-image'] = $this->input->post('userfile');
                return TRUE;
            }
    }
}