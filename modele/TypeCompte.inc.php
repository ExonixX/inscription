<?php
class TypeCompte{
    private $_codeType;
    private $_libelleType;
    
    function __construct() {
        
    }
    public function get_CodeType(){
        return $this->_codeType;
    }
    public function get_LibelleType(){
        return $this->_libelleType;
    }
}
