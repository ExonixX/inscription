<?php

require_once 'Formation.inc.php';
require_once 'dao.inc.php';


class FormationDAO extends DAO{

	private $_FRMTID ="FRMTID as _FRMTid";
	private $_FRMTNOM ="FRMTNOM as _FRMTnom";




	 function insertFormation($nom){


		$boo=false;
		$req=$this->prepare("INSERT INTO formation (FRMTNOM) VALUES (:nom)");
		$req->bindparam(':nom', $nom ,PDO::PARAM_STR);
		if($req->execute()){
                    $boo=true;
                }
                return $boo;
	}

}

