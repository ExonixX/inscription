<?php

require_once('modele/BD.Compte.inc.php');


require_once('modele/BD.TypeCompte.inc.php');


// TOUT CE QUI CONCERNE LA CONNEXION ET LA VARIABLE SESSION

class Authentification{

    public function Login($log,$pass){
	
        if(!isset($_SESSION)){
			session_start();
		}
                    
		$utilisateurD = new CompteDAO();
		$res = $utilisateurD->getCompteByID($log);
        
        $tcDAO = new TypeCompteDAO();

        if($res==true)
        {
        	if($res->get_CMPTPASSWORD() == $pass)
        	{
            	$tc= $tcDAO->GetLibelleTypeCompteByCode($res->get_TCMPNUM());
            	
	            $_SESSION['login']=$res->get_CMPTLOGIN();
	            $_SESSION['num']=$res->get_CMPTNUM();
	            $_SESSION['grade']=$tc->get_TCMPLIBELLE() ;
	          
	            return True;
			}
        }
		else
		{
			return False;
		}
	}
}

?>