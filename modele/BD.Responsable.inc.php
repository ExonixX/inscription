<?php

require_once 'Responsable.inc.php';
require_once 'dao.inc.php';

class ResponsableDAO extends DAO{


	private $_RPSLid="RPSLID as RPSLID";
	private $_RPSLnomresp="RPSLNOMRESP as RPSLNOMRESP";
	private $_RPSLprenomresp="RPSLPRENOMRESP as RPSLPRENOMRESP";
	private $_RPSLlienresp="RPSLLIENPARENTE as RPSLLIENPARENTE";
	private $_RPSLadresseresp="RPSLADRESSRESP as RPSLADRESSRESP";
	private $_RPSLcpresp="RPSLCPADRESSRESP as RPSLCPADRESSRESP";
	private $_RPSLvilleresp="RPSLVILLEADRESSRESP as RPSLVILLEADRESSRESP";
	private $_PSNSid="PSNSID as PSNSID";
	private $_RPSLtelresp="RPSLTELRESP as RPSLTELRESP";
	private $_RPSLfixeresp="RPSLFIXRESP as RPSLFIXRESP";
	private $_RPSLmailresp="RPSLMAILRESP as RPSLMAILRESP";
	private $_RPSLlegal="RPSLLEGAL as RPSLLEGAL";
	private $_RPSLenfantscol="RPSLNBENFSCOLARISES as RPSLNBENFSCOLARISES";
	private $_RPSLnbenfant="RPSLNBTOTENFANTS as RPSLNBTOTENFANTS";
	private $_PFSNprofeid="PFSNID as PFSNID";
	private $_STEPsitproid="STEPID as STEPID";


	//-------------------------------------------------------------------------------------------------------------
	// Insertion des différentes informations concernant le responsable dans la BDD
	//-------------------------------------------------------------------------------------------------------------
	public function insertResponsable($nom,$prenom,$lien,$adresse,$cp,$ville,$pays,$tel,$fixe,$mail,$legal,$enfantsco,$nbenfant,$pfsnid,$stepid)
	{
		$boo=false;
		//$req=$this->prepare("LOCK TABLES RESPONSABLE WRITE");
		$req=$this->prepare("INSERT INTO RESPONSABLE (RPSLNOMRESP,RPSLPRENOMRESP,RPSLLIENPARENTE,RPSLADRESSRESP,RPSLCPADRESSRESP,RPSLVILLEADRESSRESP,PSNSID,RPSLTELRESP,RPSLFIXRESP,RPSLMAILRESP,RPSLLEGAL,RPSLNBENFSCOLARISES,RPSLNBTOTENFANTS,PFSNID,STEPID) VALUES (:nom,:prenom,:lien,:adresse,:cp,:ville,:pays,:tel,:fixe,:mail,:legal,:enfantsco,:nbenfant,:pfsnid,:stepid);");
		$req->bindparam(':nom', $nom ,PDO::PARAM_STR);
		$req->bindparam(':prenom', $prenom,PDO::PARAM_STR);
		$req->bindparam(':lien',$lien,PDO::PARAM_STR);
		$req->bindparam(':adresse',$adresse,PDO::PARAM_STR);
		$req->bindparam(':cp',$cp,PDO::PARAM_STR);
		$req->bindparam(':ville',$ville,PDO::PARAM_STR);
		$req->bindparam(':pays',$pays,PDO::PARAM_INT);
		$req->bindparam(':tel',$tel,PDO::PARAM_STR);
		$req->bindparam(':fixe',$fixe,PDO::PARAM_STR);
		$req->bindparam(':mail',$mail,PDO::PARAM_STR);
		$req->bindparam(':legal',$legal,PDO::PARAM_STR);
		$req->bindparam(':enfantsco',$enfantsco,PDO::PARAM_STR);
		$req->bindparam(':nbenfant',$nbenfant,PDO::PARAM_STR);
		$req->bindparam(':pfsnid',$pfsnid,PDO::PARAM_INT);
		$req->bindparam(':stepid',$stepid,PDO::PARAM_INT);
		
		//$req=$this->prepare("UNLOCK TABLES");

		if($req->execute())
		{
            $boo=true;
        }
		//$req->execute();
        return $boo;
	}


	// Fonction pour l'association APPARTENIR

	public function insertAppartenir($numResp, $numEtu)
	{
		$boo=false;
		$req=$this->prepare("INSERT INTO appartenir (RPSLID,EDNTID) VALUES (:numResp,:numEtu);");
		$req->bindparam(':numResp', $numResp ,PDO::PARAM_INT);
		$req->bindparam(':numEtu', $numEtu ,PDO::PARAM_INT);
		if($req->execute())
		{
	       	$boo=true;
	    }
	    return $boo;
	}

	//-------------------------------------------------------------------------------------------------------------
    // Pour avoir toutes les informations concernant l'étudiant
    //-------------------------------------------------------------------------------------------------------------

    public function GetAllResponsableByCode($codeCompteEtu)
    {   
        $req = $this->prepare("
	        					SELECT responsable.RPSLID, PFSNID, STEPID, RPSLNOMRESP, RPSLPRENOMRESP, RPSLLIENPARENTE, RPSLADRESSRESP, RPSLCPADRESSRESP, RPSLVILLEADRESSRESP, responsable.PSNSID, RPSLTELRESP, RPSLFIXRESP, RPSLMAILRESP, RPSLLEGAL, RPSLNBENFSCOLARISES, RPSLNBTOTENFANTS
	        					FROM responsable, appartenir, etudiant
	        					WHERE responsable.RPSLID = appartenir.RPSLID
	        					AND appartenir.EDNTID = etudiant.EDNTID
	        					AND CMPTNUM = :code
	        				");
        $req->bindParam(':code', $codeCompteEtu,PDO::PARAM_INT);
        $req->execute();
        return $this->cursorToObjectArray($req);
    }

    //-------------------------------------------------------------------------------------------------------------
	// modification des différentes informations de l'étudiant dans la BDD
	//-------------------------------------------------------------------------------------------------------------

	public function updateResponsable($nomresp,$prenomresp,$lienresp,$adressresp,$cpadressresp,$villeadressresp,$paysadressresp,$telresp,$fixresp,$mailresp,$legalresp,$nbenfantsco,$nbtotenfant,$professresp,$situationresp,$idrespetu)
	{

		$boo=false;
		$req=$this->prepare("
								UPDATE RESPONSABLE
								SET PFSNID = :professresp,
								STEPID = :situationresp,
								RPSLNOMRESP = :nomresp,
								RPSLPRENOMRESP = :prenomresp,
								RPSLLIENPARENTE = :lienresp,
								RPSLADRESSRESP = :adressresp,
								RPSLCPADRESSRESP = :cpadressresp,
								RPSLVILLEADRESSRESP = :villeadressresp,
								PSNSID = :paysadressresp,
								RPSLTELRESP = :telresp,
								RPSLFIXRESP = :fixresp,
								RPSLMAILRESP = :mailresp,
								RPSLLEGAL = :legalresp,
								RPSLNBENFSCOLARISES = :nbenfantsco,
								RPSLNBTOTENFANTS = :nbtotenfant
								WHERE RPSLID = :idresp
							");

		$req->bindparam(':nomresp', $nomresp ,PDO::PARAM_STR);
		$req->bindparam(':prenomresp', $prenomresp,PDO::PARAM_STR);
		$req->bindparam(':lienresp',$lienresp,PDO::PARAM_STR);
		$req->bindparam(':adressresp',$adressresp,PDO::PARAM_STR);
		$req->bindparam(':cpadressresp',$cpadressresp,PDO::PARAM_STR);
		$req->bindparam(':villeadressresp',$villeadressresp,PDO::PARAM_STR);
		$req->bindparam(':paysadressresp',$paysadressresp,PDO::PARAM_INT);
		$req->bindparam(':telresp',$telresp,PDO::PARAM_STR);
		$req->bindparam(':fixresp',$fixresp,PDO::PARAM_STR);
		$req->bindparam(':mailresp',$mailresp,PDO::PARAM_STR);
		$req->bindparam(':legalresp',$legalresp,PDO::PARAM_STR);
		$req->bindparam(':nbenfantsco',$nbenfantsco,PDO::PARAM_STR);
		$req->bindparam(':nbtotenfant',$nbtotenfant,PDO::PARAM_STR);
		$req->bindparam(':professresp',$professresp,PDO::PARAM_INT);
		$req->bindparam(':situationresp',$situationresp,PDO::PARAM_INT);
		$req->bindparam(':idresp',$idrespetu,PDO::PARAM_INT);

		if($req->execute())
		{
        	$boo=true;
        }
        return $boo;
	}
}