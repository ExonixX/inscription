<?php

require_once 'Formation.inc.php';
require_once 'dao.inc.php';


class FormationDAO extends DAO{

	private $_FRMTID ="FRMTid as _FRMTid";
	private $_FRMTNOM ="FRMTnom as _FRMTnom";




	 function insertFormation($nom){


		$boo=false;
		$req=$this->prepare("INSERT INTO formation (FRMTID,FRMTNOM) VALUES ('1',:nom)");
		$req->bindparam(':nom', $nom ,PDO::PARAM_STR);
		if($req->execute()){
                    $boo=true;
                }
                return $boo;
	}

}

