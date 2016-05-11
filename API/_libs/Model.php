<?php

class Model {
    var $db;

    function __construct() {
        $this->db = new Database();
    }

}

?>
