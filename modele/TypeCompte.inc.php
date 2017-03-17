<?php
class TypeCompte{
    
    private $_TCMPNUM;
    private $_TCMPLIBELLE;
    
    function __construct() {
        
    }
    public function get_TCMPNUM(){
        return $this->_TCMPNUM;
    }
    public function get_TCMPLIBELLE(){
        return $this->_TCMPLIBELLE;
    }
}
