<?php

	require_once 'TypeCompte.inc.php';
	require_once 'dao.inc.php';

	class TypeCompteDAO extends DAO{
	    
	    private $_TCMPNUM = "TCMPNUM as TCMPNUM";
	    private $_TCMPLIBELLE = "TCMPLIBELLE as TCMPLIBELLE";
	   
	    //-------------------------------------------------------------------------------------------------------------
	    //
	    //-------------------------------------------------------------------------------------------------------------
	    public function GetLibelleTypeCompteByCode($code)
	    {
	        $req = $this->prepare("SELECT $this->_TCMPNUM, $this->_TCMPLIBELLE from TYPECOMPTE where TCMPNUM = :code");
	        $req->bindParam(':code', $code);
	        $req->execute();

	        return $this->cursorToObject($req);
	    }

	    //-------------------------------------------------------------------------------------------------------------
	    //-------------------------------------------------------------------------------------------------------------
	}

?>
