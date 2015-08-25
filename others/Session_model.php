<?php

class Session_model extends MY_Model
{
    const TABLE_NAME = 'session';
    const TABLE_PK = 'SessionID';
    
    var $SessionID = 0;
    var $UserID = 0;
    var $IPAddress = "";
    var $time;
    
    function __construct() {
        parent::__construct();
    }
    
    
}

