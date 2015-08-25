<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class MY_Model
 *
 * This class is an extension of CI_Model.
 * Extension was used for DRY(Don't Repeat Yourself)
 *
 * Extending allows us to avoid writing
 * same code over and over again.
 *
 * The methods that are written here
 * are used by multiple child classes
 *
 * Worked here probably on 12 April, 2015.
 */
class MY_Model extends CI_Model
{
    const TABLE_NAME = 'undefined';
    const TABLE_PK = 'undefiend';
    
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Determines the next id to be put into an specific table.
     * 
     * @return type int
     */
    function getNextID() {
        $this->db->select_max($this::TABLE_PK);
        $query = $this->db->get($this::TABLE_NAME);
        $nextID = $query->result()[0]->{$this::TABLE_PK} + 1;
        return $nextID;
    }
    
    /**
     * Inserts into the database
     */
    function dbInsert () {
        $this->db->insert($this::TABLE_NAME,$this);
    }
    
    /**
     * This fucntion needs to be coded.
     * It should return a JSON Object/ String 
     * 
     * @param type array Associative array.
     * @return type JSON String
     */
    function getJson($array) {
//        $this->db->select('*');
//        $this->db->from($this::TABLE_NAME);
//        $this->db->join('category','product.ProductID = category.CategoryID');
//        $query = $this->db->get();
//        
//        return $query->result();
    }
    
    /**
     * Checks if an entry exists on a table
     * 
     * @param type array An array of items to be checked against to make sure 
     * the same item doesn't exist in Database.
     * @return boolean
     */
    function entry_exists($array = array()) {
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);
        $this->db->where($array);
        if($this->db->count_all_results()>0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */

