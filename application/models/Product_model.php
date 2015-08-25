<?php
/**
 * Model for Product Table. 
 * @author Farhan<farhan@eminence-bd.org>
 * @version 0.1
 */
class Product_model extends MY_Model
{
    const TABLE_NAME = 'product';
    const TABLE_PK = 'ProductID';
    
    /**
     * Holds the id of a product.
     * @var int 
     */
    var $ProductID = 0;
    
    /**
     * Holds name of the product.
     * @var string
     */
    var $ProductName = "";
    
    
    /**
     * Description for the Product.
     * @var String
     */
    var $Description = "";
    
    /**
     * Number of products in Stock.
     * @var int
     */
    var $Stock = 0;
    
    /**
     * Price of product.
     * @var double
     */
    var $Price = 0;
    
    /**
     * Image location on drive.
     * @var string
     */
    var $ImageSource ="";
    
    /**
     * This is the Category ID from the Categoy Table. 
     * @var int
     */
    var $CategoryID = 0;
    
    /**
     * The constructor of Product Model.
     */
    
    /**
     * Delete statuof theitem
     * @var int actsas a boolean on the databse
     */
    var $Deleted = 0;
    
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @return object
     */
    function getList() {
        $this->load->model('Category_model');
        $category = new Category_model();
        $this->db->select('*');
        $this->db->from($this::TABLE_NAME);
        $joinStr = "`".$category::TABLE_NAME.".".$category::TABLE_PK." = ".$this::TABLE_NAME.".".$category::TABLE_PK."`";
        $this->db->join($category::TABLE_NAME, $joinStr);
        $this->db->order_by($this::TABLE_NAME.".".$category::TABLE_PK);
        
        $query = $this->db->get();
        return $query->result();
        
    }
    
    function getListArray() {
        $this->load->model('Category_model');
        $category = new Category_model();
        $this->db->select('*');
        $this->db->from($this::TABLE_NAME);
        $joinStr = "`".$category::TABLE_NAME.".".$category::TABLE_PK." = ".$this::TABLE_NAME.".".$category::TABLE_PK."`";
        $this->db->join($category::TABLE_NAME, $joinStr);
        $this->db->order_by($this::TABLE_NAME.".".$category::TABLE_PK);
        
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
}

