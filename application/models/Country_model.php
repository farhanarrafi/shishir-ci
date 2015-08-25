<?php

class Country_model extends CI_Model
{
    const TABLE_NAME = 'country';
    const TABLE_PK = 'CountryID';
    
    /**
     * Stores the auto generated country ID
     * @var int Country ID
     */
    public $CountryID = 0;
    
    /**
     * Stores the Country Name 
     * @var string Country Name
     */
    public $contryName = "abstract";
    
    /**
     * Returns the country name agaisnt an ID if ID is set 
     * Returns Rows as objects, in an array
     * @return Object Array
     */


    function __construct() {
        parent::__construct();
    }


    public function getCountryName() {
        if($this->CountryID) {
            $array = array($this::TABLE_PK => $this->CountryID);
            $query = $this->db->get_where($this::TABLE_NAME,$array);
        } else {
            $query = $this->db->get($this::TABLE_NAME);
        }
        return $query->result();
    }
}
