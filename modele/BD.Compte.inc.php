<?php

require_once 'modele/Compte.inc.php';
require_once 'modele/dao.inc.php';
require_once 'config/param.php';

class CompteDAO extends DAO{

    private $_CMPTnum = "CMPTNUM as CMPTNUM";
    private $_CMPTlogin = "CMPTLOGIN as CMPTLOGIN";
    private $_CMPTpassword = "CMPTPASSWORD as CMPTPASSWORD";
    private $_TCMPnum = "TCMPNUM as TCMPNUM";
    private $_CMPTmail = "CMPTMAIL as CMPTMAIL";
    
    /*
     * Fonction qui retourne le compte lie au login
     */
    function getCompteByID($id)
    {
        $req = $this->prepare("
                                SELECT CMPTNUM, CMPTLOGIN, CMPTPASSWORD, CMPTMAIL, TCMPNUM
                                FROM compte
                                WHERE CMPTLOGIN = :id
                            ");
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->execute();
        
        return $this->cursorToObject($req);
    }

    //tous les comptes
    public function getComptes()
    {   
        $req = $this->prepare("
                                SELECT CMPTNUM, TCMPNUM, CMPTLOGIN, CMPTPASSWORD, CMPTMAIL
                                FROM compte
                            ");
        $req->execute();
        return $this->cursorToObjectArray($req);
    }

    //insert creation compte
    public function insertCompte($unlogin, $unmdp, $unmail)
    {
        $boo=false;
        $req=$this->prepare("
                                INSERT INTO compte (TCMPNUM, CMPTLOGIN, CMPTPASSWORD,CMPTMAIL)
                                VALUES (1, :log, :mdp, :mail)
                            ");
        $req->bindparam(':log', $unlogin ,PDO::PARAM_STR);
        $req->bindparam(':mdp', $unmdp,PDO::PARAM_STR);
        $req->bindparam(':mail', $unmail, PDO::PARAM_STR);
        if($req->execute())
        {
            $boo=true;
        }
        return $boo;
    }


}

?>