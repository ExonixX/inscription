<?php

require_once 'modele/Responsable.inc.php';
require_once 'modele/dao.inc.php';
require_once 'config/param.php';

class ResponsableDAO extends DAO{


	private $_id="RPSLID as _RPSlid";
	private $_nomresp="RPSLNOMRESP as _RPSLnom";
	private $_prenomresp="RPSLPRENOMRESP as _RPSLprenom";
	private $_lienresp="RPSLLIENPARENTE as _RPSLlien";
	private $_adresseresp="RPSLADRESSRESP as _RPSLadresse";
	private $_cpresp="RPSLCPADRESSRESP as _RPSLcp";
	private $_villeresp="RPSLVILLEADRESSRESP as _RPSLville";
	private $_paysresp="RPSLPAYSADRESSRESP as _RPSLpays";
	private $_telresp="RPSLTELRESP as _RPSLtel";
	private $_fixeresp="RPSLFIXRESP as _RPSLfixe";
	private $_mailresp="RPSLMAILRESP as _RPSLmail";
	private $_legal="RPSLLEGAL as _RPSLlegal";
	private $_enfantscol="RPSLNBENFSCOLARISES as _RPSLenfantsco";
	private $_nbenfant="RPSLNBTOTENFANTS as _RPSLnbenfant";
	private $_profeid="PFSNID as _PFSNid";
	private $_sitproid="STEPID as _STEPid";


	function insertResponsable($nom,$prenom,$lien,$adresse,$cp,$ville,$pays,$tel,$fixe,$mail,$legal,$enfantsco,$nbenfant,$pfsnid,$stepid){


		$boo=false;
		$req=$this->prepare("INSERT INTO RESPONSABLE (RPSLNOMRESP,RPSLPRENOMRESP,RPSLLIENPARENTE,RPSLADRESSRESP,RPSLCPADRESSRESP,RPSLVILLEADRESSRESP,RPSLPAYSADRESSRESP,RPSLTELRESP,RPSLFIXRESP,RPSLMAILRESP,RPSLLEGAL,RPSLNBENFSCOLARISES,RPSLNBTOTENFANTS,PFSNID,STEPID) VALUES (:nom,:prenom,:lien,:adresse,:cp,:ville,:pays,:tel,:fixe,:mail,:legal,:enfantsco,:nbenfant,:pfsnid,:stepid)");
		$req->bindparam(':nom', $nom ,PDO::PARAM_STR);
		$req->bindparam(':prenom', $prenom,PDO::PARAM_STR);
		$req->bindparam(':lien',$lien,PDO::PARAM_STR);
		$req->bindparam(':adresse',$adresse,PDO::PARAM_STR);
		$req->bindparam(':cp',$cp,PDO::PARAM_STR);
		$req->bindparam(':ville',$ville,PDO::PARAM_STR);
		$req->bindparam(':pays',$pays,PDO::PARAM_STR);
		$req->bindparam(':tel',$tel,PDO::PARAM_STR);
		$req->bindparam(':fixe',$fixe,PDO::PARAM_STR);
		$req->bindparam(':mail',$mail,PDO::PARAM_STR);
		$req->bindparam(':legal',$legal,PDO::PARAM_STR);
		$req->bindparam(':enfantsco',$enfantsco,PDO::PARAM_STR);
		$req->bindparam(':nbenfant',$nbenfant,PDO::PARAM_STR);
		$req->bindparam(':pfsnid',$pfsnid,PDO::PARAM_INT);
		$req->bindparam(':stepid',$stepid,PDO::PARAM_INT);
		if($req->execute()){
                    $boo=true;
                }
                return $boo;


}

}