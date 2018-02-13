<?php

	require_once('Formation.inc.php');
	require_once ('dao.inc.php');


	class FormationDAO extends DAO{
		
		private $_frmtid = "FRMTID as FRMTID";
		private $_frmtnom ="FRMTNOM as FRMTNOM";

		//-------------------------------------------------------------------------------------------------------------
		// Pour avoir l'ID et le nom de la formation par son ID
		//-------------------------------------------------------------------------------------------------------------
		function getFormationByID($id)
		{	
			$req = $this->prepare("
									SELECT FRMTID,FRMTNOM
									FROM formation
									WHERE FRMTID = :id
								");
			$req->bindParam(':id', $id, PDO::PARAM_INT);
	        $req->execute();
	        return $this->cursorToObject($req);
		}

		//-------------------------------------------------------------------------------------------------------------
		// Pour avoir toutes les formation stockées dans le BDD
		//-------------------------------------------------------------------------------------------------------------
		function getFormation()
		{	
			$req = $this->prepare("
									SELECT *
									FROM FORMATION
								");
	        $req->execute();
	        return $this->cursorToObjectArray($req);
		}

		//-------------------------------------------------------------------------------------------------------------
		// Insertion d'une formation dans la BDD
		//-------------------------------------------------------------------------------------------------------------
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

		//-------------------------------------------------------------------------------------------------------------
		// Pour supprimer une formation dans la BDD
		//-------------------------------------------------------------------------------------------------------------
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
?>