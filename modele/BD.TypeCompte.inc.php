<?php
require_once 'TypeCompte.inc.php';
require_once 'dao.inc.php';

class TypeCompteDAO extends DAO{
    private $_code = "codeTypeCompte as _codeType";
    private $_libelle = "libelleTypecompte as _libelleType";
   
    public function GetLibelleTypeCompteByCode($code){
       
        $req = $this->prepare("SELECT $this->_code, $this->_libelle from TYPE_COMPTE where codeTypeCompte = :code");
        $req->bindParam(':code', $code);
        $req->execute();
        return $this->cursorToObject($req);
    }
    
    
}
