<?php
require_once 'modele/Compte.inc.php';
require_once 'modele/dao.inc.php';
require_once 'config/param.php';

class CompteDAO extends DAO{
    private $_num = "numCompte as _num";
    private $_login = "loginCompte as _login";
    private $_mdp = "mdpCompte as _mdp";
    private $_TypeCompte = "codeTypeCompte as _TypeCompte";

    
    

    
    /*
     * Fonction qui retourne le compte lie au login
     */
    function getCompteByID($id)
    {
        $req = $this->prepare("SELECT $this->_num,$this->_login, $this->_mdp, $this->_TypeCompte from COMPTE where loginCompte = :id");
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->execute();
        
        
        return $this->cursorToObject($req);
    }



function insertCompte($login,$mdp){



	$boo=false;
	$req=$this->prepare("INSERT INTO COMPTE (loginCompte,mdpCompte,CodeTypeCompte)VALUES(:login,:mdp,'1')");
	$req->bindparam(':login', $login, PDO::PARAM_STR);
	$req->bindparam(':mdp', $mdp, PDO::PARAM_STR);
	if($req->execute()){
                    $boo=true;
                }
                return $boo;

}

function updateCompte($id,$login,$mdp){
    $req=$this->prepare("UPDATE compte set $this->_login=':login',$this->_mdp=':mdp'where numCompte=':num'");
    $req->bindParam(":num",$id,PDO::PARAM_STR);
    $req->bindParam(":login",$login,PDO::PARAM_STR);
    $req->binParam(":mdp",$mdp,PDO::PARAM_STR);
    if($this->execute($req)){
        $boo=true;
    }
    return $boo;
}
}





/*
$unCompteDAO = new CompteDAO();
echo "test util";
print_r($unCompteDAO->getCompteByID('jgolombiewski'));
*/

?>