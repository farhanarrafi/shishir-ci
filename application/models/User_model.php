<?php

/**
 * Class User_model
 *
 * This class is for the basic user info.
 * Extended information of users will be modelled
 * in a separate class(probably named User_info_model)
 *
 * Added to Git on April 19, 2015.
 *
 * Worked here on April 13, 2015
 */
class User_model extends MY_Model
{
    const TABLE_NAME = 'user';
    const TABLE_PK = 'UserID';

    /**
     * ID of an User,
     * Has to be updated using a alpha-numeric
     * string.
     * @version 0.5
     * @var int
     */
    var $UserID = 0;

    /**
     * Email address of the user. At the same
     * time, acts as the username.
     * @var string
     */
    var $Email = "";

    /**
     * Password of the user
     * @var string
     */
    var $Password = "";

    /**
     * Firstname of the user
     * @var string
     */
    var $Firstname = "";

    /**
     * Lastname of the user
     * @var string
     */
    var $Lastname = "";
    
    /**
     * Delete statuof theitem
     * @var int actsas a boolean on the databse
     */
    var $Deleted = 0;
/*
    var $userName = "";
    var $fullName = "";
    var $address = "";
    var $phone = "";
    var $gender = "";
    var $birthDate = "";
  */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * return all users form db
     * 
     * @return array
     */
    public function getUserList() {
        $this->db->select('*');
        $this->db->from($this::TABLE_NAME);
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Authenticate user and return user object
     * if authenticated. Else, FLASE is returned.
     * 
     * @return \User_model|boolean
     */
    public function authenticate_user() {
        $array = array('Email'=>$this->Email, 'Password'=>$this->Password);
        $this->db->from($this::TABLE_NAME);
        $this->db->where($array);
        if($this->db->count_all_results()>0) {
            return $this;
        }
        return FALSE;
    }
    
    /**
     * Add a new user to the 
     * @return boolean
     */
    public function register_user() {
        $array = array('Email' => $this->Email);
        if($this->entry_exists($array)) {
            return FALSE;
        } else {
            $this->db->insert($this::TABLE_NAME,$this);
            Return TRUE;
        }
        return FALSE;
    }
    
    
}

