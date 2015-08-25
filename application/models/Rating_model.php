<?php

class Rating_model extends MY_Model
{
    const TABLE_NAME = 'rating';
    const TABLE_PK = 'RatingID';
    
    var $RatingID = 0;
    var $UserID = 0;
    var $ProductID = 0;
    
    /**
     * Delete statuof theitem
     * @var int actsas a boolean on the databse
     */
    var $Deleted = 0;
    
    function __construct() {
        parent::__construct();
    }
    
    
}

