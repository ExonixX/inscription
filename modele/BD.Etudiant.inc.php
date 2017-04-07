<?php

require_once 'Etudiant.inc.php';
require_once 'dao.inc.php';


// CLASSE ETUDIANT DAO 
class EtudiantDAO extends DAO{

	private $_id="EDNTID as _EDNTid";
	private $_nometu="EDNTNOMETU as _EDNTnometu";
	private $_prenometu="EDNTPRENOMETU as _EDNTprenometu";
	private $_ine="EDNTINEBEA as _EDNTINEBEA";
	private $_sexe="EDNTSEXE as _EDNTsexe";
	private $_datenaiss="EDNTDATENAISS as _EDNTdatenaiss";
	private $_lieunaiss="EDNTLIEUNAISS as _EDNTlieunaiss";
	private $_cpnaiss="EDNTCPNAISS as _EDNTCPnaiss";
	private $_paysnaiss="EDNTPAYSNAISS as _EDNTpaysnaiss";
	private $_tel="EDNTTEL as _EDNTtel ";
	private $_mail="EDNTMAIL as _EDNTmail";
	private $_boursier="EDNTBOURSIER as _EDNTboursier";
	private $_cycle="EDNTCYCLE as _EDNTcycle";
	private $_adresseetu="EDNTADRESSETU as _EDNTadresseetu";
	private $_cpadresseetu="EDNTCPADRESSETU as _EDNTCPadresseetu";
	private $_villeadresseetu="EDNTVILLEADRESSETU as _EDNTvilleadresseetu";
	private $_CMPTNUM = "CMPTNUM as _CMPTnum";
	private $_FRMTID="FRMTID as _FRMTid";

	public function GetEtudiantByCode($code){
       
        $req = $this->prepare("SELECT EDNTID, EDNTNOMETU, EDNTPRENOMETU,EDNTINEBEA,EDNTSEXE,EDNTDATENAISS,EDNTLIEUNAISS,EDNTCPNAISS,EDNTPAYSNAISS,EDNTTEL,EDNTMAIL,EDNTBOURSIER,EDNTCYCLE,EDNTADRESSETU,EDNTCPADRESSETU,EDNTVILLEADRESSETU,CMPTNUM,FRMTID from ETUDIANT where EDNTID = :code");
        $req->bindParam(':code', $code);
        $req->execute();
        return $this->cursorToObject($req);
    }

//----------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------

    public function GetFormationEtudiantByCode($codefrmt){
       
        $req = $this->prepare("SELECT FRMTNOM from FORMATION where FRMTID = :code");
        $req->bindParam(':code', $codefrmt);
        $req->execute();
        return $this->cursorToObject($req);
    }

//----------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------


	public function insertEtudiant($nom,$prenom,$ine,$sexe,$datenaiss,$lieunaiss,$cpnaiss,$paysnaiss,$tel,$mail,$boursier,$cycle,$adressetu,$cpadressetu,$villeadressetu,$cmptnum,$frmtid){


		$boo=false;
		$req=$this->prepare("INSERT INTO ETUDIANT (EDNTNOMETU,EDNTPRENOMETU,EDNTINEBEA,EDNTSEXE,EDNTDATENAISS,EDNTLIEUNAISS,EDNTCPNAISS,EDNTPAYSNAISS,EDNTTEL,EDNTMAIL,EDNTBOURSIER,EDNTCYCLE,EDNTADRESSETU,EDNTCPADRESSETU,EDNTVILLEADRESSETU,CMPTNUM,FRMTID) VALUES (:nom,:prenom,:ine,:sexe,:datenaiss,:lieunaiss,:cpnaiss,:paysnaiss,:tel,:mail,:boursier,:cycle,:adressetu,:cpadressetu,:villeadressetu,:cmptnum,:frmtid)");
		$req->bindparam(':nom', $nom ,PDO::PARAM_STR);
		$req->bindparam(':prenom', $prenom,PDO::PARAM_STR);
		$req->bindparam(':ine',$ine,PDO::PARAM_STR);
		$req->bindparam(':sexe',$sexe,PDO::PARAM_STR);
		$req->bindparam(':datenaiss',$datenaiss,PDO::PARAM_STR);
		$req->bindparam(':lieunaiss',$lieunaiss,PDO::PARAM_STR);
		$req->bindparam(':cpnaiss',$cpnaiss,PDO::PARAM_STR);
		$req->bindparam(':paysnaiss',$paysnaiss,PDO::PARAM_STR);
		$req->bindparam(':tel',$tel,PDO::PARAM_STR);
		$req->bindparam(':mail',$mail,PDO::PARAM_STR);
		$req->bindparam(':boursier',$boursier,PDO::PARAM_STR);
		$req->bindparam(':cycle',$cycle,PDO::PARAM_STR);
		$req->bindparam(':adressetu',$adressetu,PDO::PARAM_STR);
		$req->bindparam(':cpadressetu',$cpadressetu,PDO::PARAM_STR);
		$req->bindparam(':villeadressetu',$villeadressetu,PDO::PARAM_STR);
		$req->bindparam(':cmptnum',$cmptnum,PDO::PARAM_INT);
		$req->bindparam(':frmtid',$frmtid,PDO::PARAM_INT);
		if($req->execute()){
                    $boo=true;
                }
                return $boo;


}

}

