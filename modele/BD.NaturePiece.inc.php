<?php

require_once 'NaturePiece.inc.php';
require_once 'dao.inc.php';

class NaturePieceDAO extends DAO{


	private $_id = "NTPCID as _id";
    private $_intitule = "NTPCINTITULE as _intitule";



    function getNaturePiece()
    {
        
        $req = $this->prepare("SELECT NTPCID,NTPCINTITULE  FROM naturepiece");       
        $req->execute();
        return $this->cursorToObjectArray($req);
    }  

    function insertNaturePiece($intitule){

    	$boo=false;
    	$req=$this->prepare("INSERT INTO naturepiece (NTPCINTITULE)VALUES(:intitule)");
    	$req->bindparam(':intitule',$intitule,PDO::PARAM_STR);
    	if($req->execute()){
                    $boo=true;
                }
                return $boo;
    }

    function updateNaturePiece($intitule){
                $boo = false;
        $req= $this->prepare("UPDATE NATUREPIECE NTPCINTITULE = ':intitule' where NTPCid = ':id'");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->bindParam(":intitule", $intitule, PDO::PARAM_STR);
                if($this->execute($req)){
                    $boo = true;
                }
                return $boo;
            }

function deleteNaturePiece($intitule){
                $boo = false;
		$req = $this->prepare("DELETE FROM NATUREPIECE WHERE $this->_id = :id");
		$req->bindParam(":id", $id, PDO::PARAM_INT);
		if($this->execute($req)){
                    $boo = true;
                }
                return $boo;
	}

}