<?php
require_once 'modele/Compte.inc.php';
require_once 'modele/dao.inc.php';
require_once 'config/param.php';

class CompteDAO extends DAO{
    private $_CMPTNUM = "CMPTNUM as _CMPTNUM";
    private $_CMPTLOGIN = "CMPTLOGIN as _CMPTLOGIN";
    private $_CMPTPASSWORD = "CMPTPASSWORD as _CMPTPASSWORD";
    private $_TCMPNUM = "TCMPNUM as _TCMPNUM";

    
    

    
    /*
     * Fonction qui retourne le compte lie au login
     */
    function getCompteByID($id)
    {
        $req = $this->prepare("SELECT $this->_CMPTNUM,$this->_CMPTLOGIN,$this->_CMPTPASSWORD,$this->_TCMPNUM from COMPTE where CMPTLOGIN = :id");
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->execute();
        
        
        return $this->cursorToObject($req);
    }



}



/*
$unCompteDAO = new CompteDAO();
echo "test util";
print_r($unCompteDAO->getCompteByID('jgolombiewski'));
*/

?>