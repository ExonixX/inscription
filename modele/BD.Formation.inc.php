<?php

require_once 'Formation.inc.php';
require_once 'dao.inc.php';


class FormationDAO extends DAO{

	private $_FRMTID ="FRMTID as _FRMTid";
	private $_FRMTNOM ="FRMTNOM as _FRMTnom";



	function getFormationByID($id){
		
		$req = "SELECT * from FORMATION where FRMTID = :id ";
		$req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->execute();
        return $this->cursorToObject($req);
		
	
	}

	function getFormation(){
		
		$req ="SELECT * from FORMATION";
        $req->execute();
        return $this->cursorToObject($req);
		
	
	}







	function insertFormation($nom){
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


	//fonction qui supprime le dossier et fichiers à l'intérieur
	function rmRecursive($path) {
	    $path = real_path($path);
	    if(!file_exists($path))
	        throw new RuntimeException('Fichier ou dossier non-trouvé');
	    if(is_dir($path)) {
	        $dir = dir($path);
	        while(($file_in_dir = $dir->read()) !== false) {
	            if($file_in_dir == '.' or $file_in_dir == '..')
	                continue; // passage au tour de boucle suivant
	            rmRecursive("$path/$file_in_dir");
	        }
	        $dir->close();
	    }
	    unlink($path);
	}

}

