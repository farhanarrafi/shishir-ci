<?php
/**
 * Model for Cart Table. 
 * @author Farhan<farhan@eminence-bd.org>
 * @version 0.1
 */
class Cart_model extends MY_Model
{
    const TABLE_NAME = 'cart';
    const TABLE_PK = 'CartID';
    
    /**
     * Cart ID number.
     * @var int
     */
    var $CartID = 0;
    
    /**
     * Session ID.
     * @var int
     */
    var $SessionID = 0;
    
    /**
     *
     * @var String This would be a JSON string to store products along with their quantity
     */
    var $ProductList = "";
    
    function __construct() {
        parent::__construct();
    }
    
    
}

