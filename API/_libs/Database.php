<?php


class Database extends PDO {
//    protected $transactionCounter = 0; 
    
    function __construct() {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                         PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                         PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING,
                         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        parent::__construct(DBTYPE.':host='.DBHOST.';dbname='.DBNAME.'', DBUSER, DBPASSWORD, $options);
    }

//    function beginTransaction() 
//    { 
//        if(!$this->transactionCounter++) 
//            return parent::beginTransaction(); 
//       return $this->transactionCounter >= 0; 
//    } 
//
//    function commit() 
//    { 
//       if(!--$this->transactionCounter) 
//           return parent::commit(); 
//       return $this->transactionCounter >= 0; 
//    } 
//
//    function rollback() 
//    { 
//        if($this->transactionCounter >= 0) 
//        { 
//            $this->transactionCounter = 0; 
//            return parent::rollback(); 
//        } 
//        $this->transactionCounter = 0; 
//        return false; 
//    } 
    
    
}

    





?>
