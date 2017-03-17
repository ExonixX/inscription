<?php
require_once 'TypeCompte.inc.php';
require_once 'dao.inc.php';

class TypeCompteDAO extends DAO{
    private $_TCMPNUM = "TCMPNUM as _TCMPNUM";
    private $_TCMPLIBELLE = "TCMPLIBELLE as _TCMPLIBELE";
   
    public function GetLibelleTypeCompteByCode($code){
       
        $req = $this->prepare("SELECT $this->_TCMPNUM, $this->_TCMPLIBELLE from TYPECOMPTE where TCMPNUM = :code");
        $req->bindParam(':code', $code);
        $req->execute();
        return $this->cursorToObject($req);
    }
    
    
}
