<?php

require_once 'NaturePiece.inc.php';
require_once 'dao.inc.php';

class NaturePieceDAO extends DAO{


	private $_id = "NTPCid as _id";
    private $_intitule = "NTPCintitule as _intitule";



    function getNaturePiece()
    {
        
        $req = $this->prepare("SELECT NTPCid,NTPCintitule  FROM NATUREPIECE ");       
        $req->execute();
        return $this->cursorToObjectArray($req);
    }  



    function insertNaturePiece($intitule){

    	$boo=false;
    	$req=$this->prepare("INSERT INTO NATUREPIECE (NTPCintitule)VALUES(:intitule)");
    	$req->bindparam(':intitule',$intitule,PDO::PARAM_STR);
    	if($req->execute()){
                    $boo=true;
                }
                return $boo;
    }

    function updateNaturePiece($id, $intitule){
                $boo = false;
        $req= $this->prepare("UPDATE NATUREPIECE set $this->_id = ':id' ,intitule = ':intitule' where NTPCid = ':id'");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->bindParam(":intitule", $intitule, PDO::PARAM_STR);
                if($this->execute($req)){
                    $boo = true;
                }
                return $boo;
            }

function deleteNaturePiece($id){
                $boo = false;
		$req = $this->prepare("DELETE FROM NATUREPIECE WHERE $this->_id = :id");
		$req->bindParam(":id", $id, PDO::PARAM_INT);
		if($this->execute($req)){
                    $boo = true;
                }
                return $boo;
	}

}