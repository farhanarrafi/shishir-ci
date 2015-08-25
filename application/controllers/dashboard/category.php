<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
    
    /**
     * Sets the default header template
     * @var String
     */
    private $header = 'dashboard/header';
    
    /**
     *Set the default footer template
     * @var String
     */
    private $footer = 'dashboard/footer';
    
    public function index() {
        $data['title'] = "DashBoard";
        $data['query'] = $this->db->query("SELECT category.CategoryName,".
                        " count(product.ProductName) as `noOfProdcuts`".
                        " FROM category LEFT JOIN product".
                        " ON category.CategoryID = product.CategoryID".
                        " GROUP BY category.CategoryID");
        $this->load->view($this->header, $data);
        $this->load->view('dashboard/category/category_view',$data);
        $this->load->view($this->footer);
    }
    
    /**
     * Adds Category in Database
     */
    public function add() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        
        $data['form_name'] = $this->input->post('form-name');
        $data['category_name'] = "";
        if($data['form_name']== "add-category") {
            $data['category_name'] = $this->input->post('category-name');
            if($this->form_validation->run() == TRUE) {
                $this->load->model('Category_model');
                $model = new Category_model();
                $model->CategoryID = $model->getNextID();
                $model->CategoryName = $data['category_name'];
                $model->dbInsert();
                redirect('/dashboard/category/');
                     
            }
        }
        $data['form_name'] = "add-category";
        $data['title'] = "Add Category";
        $this->load->view($this->header, $data);
        $this->load->view('dashboard/category/category_crud', $data);
        $this->load->view($this->footer);
    }
    
    public function edit() {
        $data['form_name'] = "edit-category";
        $data['title'] = "Edit Category";
        $this->load->view($this->header, $data);
        $this->load->view('dashboard/category/category_crud', $data);
        $this->load->view($this->footer);
    }
    
    public function delete() {
        $data['form_name'] = "delete-category";
        $data['title'] = "Delete Category";
        $this->load->view($this->header, $data);
        $this->load->view('dashboard/category/category_crud', $data);
        $this->load->view($this->footer);
    }
}