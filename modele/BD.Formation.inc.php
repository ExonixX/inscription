<?php

require_once('Formation.inc.php');
require_once ('modele/dao.inc.php');


class FormationDAO extends DAO{

	private $_FRMTID ="FRMTID as _FRMTid";
	private $_FRMTNOM ="FRMTNOM as _FRMTnom";

	function getFormationByID($id)
	{	
		$req = $this->prepare("SELECT FRMTNOM from FORMATION where FRMTID = :id ");
		$req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return $this->cursorToObject($req);
	}

	function getFormation()
	{	
		$req ="SELECT * from FORMATION";
        $req->execute();
        return $this->cursorToObjectArray($req);
	}

	function insertFormation($nom)
	{
		$boo=false;
		$req=$this->prepare("INSERT INTO formation (FRMTNOM) VALUES (:nom)");
		$req->bindparam(':nom', $nom ,PDO::PARAM_STR);
		if($req->execute())
		{
        	$boo=true;
        }
        return $boo;
	}

	function deleteFormation($id){
		$boo=false;
		$req=$this->prepare("DELETE FROM FORMATION WHERE FRMTID= :id ");
		$req->bindParam(':id',$id,PDO::PARAM_INT);
		if($req->execute()){

			$boo=true;
		}
		return $boo;
	}


}

