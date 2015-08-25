<?php

class Category_model extends MY_Model
{
    const TABLE_NAME = 'category';
    const TABLE_PK = 'CategoryID';
    /**
     * Holds the id of Category Table.
     * @var int
     */
    var $CategoryID = 0;
    
    /**
     * Holds the name of the Category.
     * @var string
     */
    var $CategoryName = "";
    
    /**
     * Constructor of Category Class
     */
    
    /**
     * Delete statuof theitem
     * @var int actsas a boolean on the databse
     */
    var $Deleted = 0;
    
    function __construct() {
        parent::__construct();
    }
    
    
    function getList() {
        $this->db->select($this->CategoryName);
        $query = $this->db->get(self::TABLE_NAME);
        return $query;
    }
    
}

