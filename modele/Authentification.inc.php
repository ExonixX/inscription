<?php

require_once('modele/BD.Compte.inc.php');


require_once('modele/BD.TypeCompte.inc.php');


class Authentification{
        public function Login($log,$pass){
	
            if(!isset($_SESSION)){
			session_start();
		}
                    
		
		$utilisateurD = new CompteDAO();
		$res = $utilisateurD->getCompteByID($log);
                $tcDAO = new TypeCompteDAO();
               
                if($res->get_mdp() == $pass){
                $tc= $tcDAO->GetLibelleTypeCompteByCode($res->getTypeCompte());
                $_SESSION['login']=$res->get_login();
                $_SESSION['num']=$res->get_num();
                $_SESSION['grade']=$tc->get_LibelleType() ;
             

                return true;
		}else{
		return False;
		}
	
	}
public function IsLogin($log){
	
            if(!isset($_SESSION)){
			session_start();
		}
                    
		 
		$utilisateurD = new CompteDAO();
		$res = $utilisateurD->getCompteByID($log);
                 if($res != null){
                     $user = new Compte($res->numCompte,
                           $res->nomCompte,
                           $res->prenomCompte,
                           $res->dateNaissanceCompte,
                           $res->emailCompte,
                           $res->rueCompte,
                           $res->villeCompte,
                           $res->CpCompte,
                           $res->loginCompte,
                           $res->mdpCompte,
                           $res->codeTypeCompte);
			return $user;
		
		
                 }else{
                     return null;
                 }
                 
                 }
        
        public function isLoggedOn() {
		
		if (!isset($_SESSION)){
			session_start();
		}
		$ret = false;
		
		if (isset($_SESSION["test"])){
			$unUtilisateurDAO = new CompteDAO();
			$util = $unUtilisateurDAO->getCompteByID($_SESSION["test"]);
			if ( $util->loginCompte() == $_SESSION["mailU"]) {
			$ret = true;
				echo '<script>alert("test")</script>';
			}
		}
		return $ret ;
	}

}
?>