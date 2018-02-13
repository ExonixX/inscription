<?php

require_once 'Etudiant.inc.php';
require_once 'dao.inc.php';


// CLASSE ETUDIANT DAO 
class EtudiantDAO extends DAO{

	private $_EDNTid="EDNTID as EDNTID";
	private $_EDNTnometu="EDNTNOMETU as EDNTNOMETU";
	private $_EDNTprenometu="EDNTPRENOMETU as EDNTPRENOMETU";
	private $_EDNTine="EDNTINEBEA as EDNTINEBEA";
	private $_EDNTsexe="EDNTSEXE as EDNTSEXE";
	private $_EDNTdatenaiss="EDNTDATENAISS as EDNTDATENAISS";
	private $_EDNTlieunaiss="EDNTLIEUNAISS as EDNTLIEUNAISS";
	private $_EDNTcpnaiss="EDNTCPNAISS as EDNTCPNAISS";
	private $_EDNTtel="EDNTTEL as EDNTTEL ";
	private $_EDNTmail="EDNTMAIL as EDNTMAIL";
	private $_EDNTboursier="EDNTBOURSIER as EDNTBOURSIER";
	private $_EDNTcycle="EDNTCYCLE as EDNTCYCLE";
	private $_EDNTadresseetu="EDNTADRESSETU as EDNTADRESSETU";
	private $_EDNTcpadresseetu="EDNTCPADRESSETU as EDNTCPADRESSETU";
	private $_EDNTvilleadresseetu="EDNTVILLEADRESSETU as EDNTVILLEADRESSETU";
	private $_CMPTNUM = "CMPTNUM as CMPTNUM";
	private $_FRMTID="FRMTID as FRMTID";
	private $_PSNSID="PSNSID as PSNSID";

	private $_EDNTanctab="EDNTANCETAB as EDNTANCETAB";
	private $_EDNTancclasse="EDNTANCCLASSE as EDNTANCCLASSE";
	private $_EDNTanctypeetab="EDNTANCTYPEETAB as EDNTANCTYPEETAB";
	private $_EDNTancacdm="EDNTANCACDM as EDNTANCACDM";
	private $_EDNTanccp="EDNTANCCP as EDNTANCCP";
	private $_EDNTancville="EDNTANCVILLE as EDNTANCVILLE";
	private $_EDNTlv1="EDNTLV1 as EDNTLV1";
	private $_EDNTlv2="EDNTLV2 as EDNTLV2";
	private $_EDNTdoublement="EDNTDOUBLEMENT as EDNTDOUBLEMENT";

	//-------------------------------------------------------------------------------------------------------------
	// pour avoir toutes les informations concernant l'étudiant par son code
	//-------------------------------------------------------------------------------------------------------------
	public function GetEtudiant(){
        $req = $this->prepare("
        						SELECT EDNTID, EDNTNOMETU, EDNTPRENOMETU,EDNTINEBEA,EDNTSEXE,EDNTDATENAISS,EDNTLIEUNAISS,EDNTCPNAISS,PSNSID,EDNTTEL,EDNTMAIL,EDNTBOURSIER,EDNTCYCLE,EDNTADRESSETU,EDNTCPADRESSETU,EDNTVILLEADRESSETU,CMPTNUM,FRMTID
        						FROM ETUDIANT
        						ORDER BY EDNTNOMETU
        					");
        $req->execute();
        return $this->cursorToObjectArray($req);
    }

	//-------------------------------------------------------------------------------------------------------------
	// pour avoir toutes les informations concernant l'étudiant par son code
	//-------------------------------------------------------------------------------------------------------------
	public function GetEtudiantByCode($code){
        $req = $this->prepare("
        						SELECT EDNTID, EDNTNOMETU, EDNTPRENOMETU,EDNTINEBEA,EDNTSEXE,EDNTDATENAISS,EDNTLIEUNAISS,EDNTCPNAISS,PSNSID,EDNTTEL,EDNTMAIL,EDNTBOURSIER,EDNTCYCLE,EDNTADRESSETU,EDNTCPADRESSETU,EDNTVILLEADRESSETU,CMPTNUM,FRMTID, EDNTANCETAB, EDNTANCCLASSE, EDNTANCTYPEETAB, EDNTANCACDM, EDNTANCCP, EDNTANCVILLE, EDNTLV1, EDNTLV2, EDNTDOUBLEMENT
        						FROM ETUDIANT
        						WHERE EDNTID = :code
        					");
        $req->bindParam(':code', $code, PDO::PARAM_INT);
        $req->execute();
        return $this->cursorToObject($req);
    }

    //-------------------------------------------------------------------------------------------------------------
    // Pour avoir la formation de l'étudiant par le code formation
    //-------------------------------------------------------------------------------------------------------------
    public function GetFormationEtudiantByCode($codefrmt){
        $req = $this->prepare("
        						SELECT FRMTNOM
        						FROM FORMATION 
        						WHERE FRMTID = :code
        					");
        $req->bindParam(':code', $codefrmt,PDO::PARAM_INT);
        $req->execute();
        return $this->cursorToObject($req);
    }

	//-------------------------------------------------------------------------------------------------------------
	// Insertion des différentes informations de l'étudiant dans la BDD
	//-------------------------------------------------------------------------------------------------------------

	public function insertEtudiant($nom,$prenom,$ine,$sexe,$datenaiss,$lieunaiss,$cpnaiss,$paysnaiss,$tel,$mail,$boursier,$cycle,$adressetu,$cpadressetu,$villeadressetu,$cmptnum,$frmtid,$ancetab,$ancclasse,$anctypeetab,$ancacdm,$anccp,$ancville, $lv1, $lv2, $doublement)
	{
		$boo=false;
		$req=$this->prepare("
								INSERT INTO etudiant (EDNTNOMETU,EDNTPRENOMETU,EDNTINEBEA,EDNTSEXE,EDNTDATENAISS,EDNTLIEUNAISS,EDNTCPNAISS,PSNSID,EDNTTEL,EDNTMAIL,EDNTBOURSIER,EDNTCYCLE,EDNTADRESSETU,EDNTCPADRESSETU,EDNTVILLEADRESSETU,CMPTNUM,FRMTID,EDNTANCETAB, EDNTANCCLASSE, EDNTANCTYPEETAB, EDNTANCACDM, EDNTANCCP, EDNTANCVILLE, EDNTLV1, EDNTLV2, EDNTDOUBLEMENT)
								VALUES (:nom,:prenom,:ine,:sexe,:datenaiss,:lieunaiss,:cpnaiss,:paysnaiss,:tel,:mail,:boursier,:cycle,:adressetu,:cpadressetu,:villeadressetu,:cmptnum,:frmtid,:ancetab,:ancclasse,:anctypeetab,:ancacdm,:anccp,:ancville,:lv1,:lv2,:doublement)
							");
		$req->bindparam(':nom', $nom ,PDO::PARAM_STR);
		$req->bindparam(':prenom', $prenom,PDO::PARAM_STR);
		$req->bindparam(':ine', $ine, PDO::PARAM_STR);
		$req->bindparam(':sexe', $sexe, PDO::PARAM_INT);
		$req->bindparam(':datenaiss', $datenaiss, PDO::PARAM_STR);
		$req->bindparam(':lieunaiss', $lieunaiss, PDO::PARAM_STR);
		$req->bindparam(':cpnaiss', $cpnaiss, PDO::PARAM_STR);
		$req->bindparam(':paysnaiss', $paysnaiss, PDO::PARAM_INT);
		$req->bindparam(':tel', $tel, PDO::PARAM_STR);
		$req->bindparam(':mail', $mail, PDO::PARAM_STR);
		$req->bindparam(':boursier', $boursier, PDO::PARAM_INT);
		$req->bindparam(':cycle', $cycle, PDO::PARAM_STR);
		$req->bindparam(':adressetu', $adressetu, PDO::PARAM_STR);
		$req->bindparam(':cpadressetu', $cpadressetu, PDO::PARAM_STR);
		$req->bindparam(':villeadressetu', $villeadressetu, PDO::PARAM_STR);
		$req->bindparam(':cmptnum', $cmptnum, PDO::PARAM_INT);
		$req->bindparam(':frmtid', $frmtid, PDO::PARAM_INT);

		$req->bindparam(':ancetab', $ancetab, PDO::PARAM_STR);
		$req->bindparam(':ancclasse', $ancclasse, PDO::PARAM_STR);
		$req->bindparam(':anctypeetab', $anctypeetab, PDO::PARAM_INT);
		$req->bindparam(':ancacdm', $ancacdm, PDO::PARAM_STR);
		$req->bindparam(':anccp', $anccp, PDO::PARAM_STR);
		$req->bindparam(':ancville', $ancville, PDO::PARAM_STR);
		$req->bindparam(':lv1', $lv1, PDO::PARAM_STR);
		$req->bindparam(':lv2', $lv2, PDO::PARAM_STR);
		$req->bindparam(':doublement', $doublement, PDO::PARAM_INT);


		if($req->execute())
		{
        	$boo=true;
        }
        return $boo;
    }

    //-------------------------------------------------------------------------------------------------------------
    //recherche si l'etudiant existant dans la bdd
    //-------------------------------------------------------------------------------------------------------------
    public function searchEtuByIdCompte($idcompte){
        $req = $this->prepare("
        						SELECT EDNTID, EDNTNOMETU, EDNTPRENOMETU,EDNTINEBEA,EDNTSEXE,EDNTDATENAISS,EDNTLIEUNAISS,EDNTCPNAISS,PSNSID,EDNTTEL,EDNTMAIL,EDNTBOURSIER,EDNTCYCLE,EDNTADRESSETU,EDNTCPADRESSETU,EDNTVILLEADRESSETU,FRMTID,EDNTANCETAB, EDNTANCCLASSE, EDNTANCTYPEETAB, EDNTANCACDM, EDNTANCCP, EDNTANCVILLE, EDNTLV1, EDNTLV2, EDNTDOUBLEMENT
        						FROM etudiant
        						WHERE CMPTNUM = :idcompte
        					");
        $req->bindParam(':idcompte', $idcompte,PDO::PARAM_INT);
        $req->execute();
        return $this->cursorToObject($req);
    }

    //-------------------------------------------------------------------------------------------------------------
    // Pour avoir toutes les informations concernant l'étudiant
    //-------------------------------------------------------------------------------------------------------------
    public function GetAllEtudiantByCode($codeCompteEtu){
        $req = $this->prepare("
        						SELECT FRMTID, EDNTNOMETU, EDNTPRENOMETU, EDNTINEBEA, EDNTSEXE, EDNTDATENAISS, EDNTLIEUNAISS, EDNTCPNAISS, PSNSID, EDNTTEL, EDNTMAIL, EDNTBOURSIER, EDNTCYCLE, EDNTADRESSETU, EDNTCPADRESSETU, EDNTVILLEADRESSETU,EDNTANCETAB, EDNTANCCLASSE, EDNTANCTYPEETAB, EDNTANCACDM, EDNTANCCP, EDNTANCVILLE, EDNTLV1, EDNTLV2, EDNTDOUBLEMENT 
        						FROM etudiant
        						WHERE CMPTNUM = :code
        					");
        $req->bindParam(':code', $codeCompteEtu,PDO::PARAM_INT);
        $req->execute();
        return $this->cursorToObject($req);
    }
    
    //-------------------------------------------------------------------------------------------------------------
	// modification des différentes informations de l'étudiant dans la BDD
	//-------------------------------------------------------------------------------------------------------------
	public function updateEtudiant($nom,$prenom,$ine,$sexe,$datenaiss,$lieunaiss,$cpnaiss,$paysnaiss,$tel,$mail,$boursier,$cycle,$adressetu,$cpadressetu,$villeadressetu,$cmptnum,$frmtid,$ancetab,$ancclasse,$anctypeetab,$ancacdm,$anccp,$ancville, $lv1, $lv2, $doublement){

		$boo=false;
		$req=$this->prepare("
								UPDATE ETUDIANT
								SET EDNTNOMETU = :nom,
								EDNTPRENOMETU = :prenom,
								EDNTINEBEA = :ine,
								EDNTSEXE = :sexe,
								EDNTDATENAISS = :datenaiss,
								EDNTLIEUNAISS = :lieunaiss,
								EDNTCPNAISS = :cpnaiss,
								PSNSID = :paysnaiss, 
								EDNTTEL = :tel,
								EDNTMAIL = :mail,
								EDNTBOURSIER = :boursier,
								EDNTCYCLE = :cycle,
								EDNTADRESSETU = :adressetu,
								EDNTCPADRESSETU = :cpadressetu,
								EDNTVILLEADRESSETU = :villeadressetu,
								FRMTID = :frmtid,
								EDNTANCETAB = :ancetab,
								EDNTANCCLASSE = :ancclasse,
								EDNTANCTYPEETAB = :anctypeetab,
								EDNTANCACDM = :ancacdm,
								EDNTANCCP = :anccp,
								EDNTANCVILLE = :ancville,
								EDNTLV1 = :lv1,
								EDNTLV2 = :lv2,
								EDNTDOUBLEMENT = :doublement
								WHERE CMPTNUM = :cmptnum
							");

		$req->bindparam(':nom', $nom ,PDO::PARAM_STR);
		$req->bindparam(':prenom', $prenom,PDO::PARAM_STR);
		$req->bindparam(':ine',$ine,PDO::PARAM_STR);
		$req->bindparam(':sexe',$sexe,PDO::PARAM_STR);
		$req->bindparam(':datenaiss',$datenaiss,PDO::PARAM_STR);
		$req->bindparam(':lieunaiss',$lieunaiss,PDO::PARAM_STR);
		$req->bindparam(':cpnaiss',$cpnaiss,PDO::PARAM_STR);
		$req->bindparam(':paysnaiss',$paysnaiss,PDO::PARAM_INT);
		$req->bindparam(':tel',$tel,PDO::PARAM_STR);
		$req->bindparam(':mail',$mail,PDO::PARAM_STR);
		$req->bindparam(':boursier',$boursier,PDO::PARAM_STR);
		$req->bindparam(':cycle',$cycle,PDO::PARAM_STR);
		$req->bindparam(':adressetu',$adressetu,PDO::PARAM_STR);
		$req->bindparam(':cpadressetu',$cpadressetu,PDO::PARAM_STR);
		$req->bindparam(':villeadressetu',$villeadressetu,PDO::PARAM_STR);
		$req->bindparam(':cmptnum',$cmptnum,PDO::PARAM_INT);
		$req->bindparam(':frmtid',$frmtid,PDO::PARAM_INT);

		$req->bindparam(':ancetab', $ancetab, PDO::PARAM_STR);
		$req->bindparam(':ancclasse', $ancclasse, PDO::PARAM_STR);
		$req->bindparam(':anctypeetab', $anctypeetab, PDO::PARAM_INT);
		$req->bindparam(':ancacdm', $ancacdm, PDO::PARAM_STR);
		$req->bindparam(':anccp', $anccp, PDO::PARAM_STR);
		$req->bindparam(':ancville', $ancville, PDO::PARAM_STR);
		$req->bindparam(':lv1', $lv1, PDO::PARAM_STR);
		$req->bindparam(':lv2', $lv2, PDO::PARAM_STR);
		$req->bindparam(':doublement', $doublement, PDO::PARAM_INT);

		if($req->execute())
		{
        	$boo=true;
        }
        return $boo;
    }

    //-------------------------------------------------------------------------------------------------------------
	// modification des différentes informations de l'étudiant dans la BDD
	//coté admin
	//-------------------------------------------------------------------------------------------------------------
	public function updateEtudiantAdmin($nom,$prenom,$ine,$sexe,$datenaiss,$lieunaiss,$cpnaiss,$paysnaiss,$tel,$mail,$boursier,$cycle,$adressetu,$cpadressetu,$villeadressetu,$idetudiant,$frmtid,$ancetab,$ancclasse,$anctypeetab,$ancacdm,$anccp,$ancville, $lv1, $lv2, $doublement){

		$boo=false;
		$req=$this->prepare("
								UPDATE ETUDIANT
								SET EDNTNOMETU = :nom,
								EDNTPRENOMETU = :prenom,
								EDNTINEBEA = :ine,
								EDNTSEXE = :sexe,
								EDNTDATENAISS = :datenaiss,
								EDNTLIEUNAISS = :lieunaiss,
								EDNTCPNAISS = :cpnaiss,
								PSNSID = :paysnaiss, 
								EDNTTEL = :tel,
								EDNTMAIL = :mail,
								EDNTBOURSIER = :boursier,
								EDNTCYCLE = :cycle,
								EDNTADRESSETU = :adressetu,
								EDNTCPADRESSETU = :cpadressetu,
								EDNTVILLEADRESSETU = :villeadressetu,
								FRMTID = :frmtid,

								EDNTANCETAB = :ancetab,
								EDNTANCCLASSE = :ancclasse,
								EDNTANCTYPEETAB = :anctypeetab,
								EDNTANCACDM = :ancacdm,
								EDNTANCCP = :anccp,
								EDNTANCVILLE = :ancville,
								EDNTLV1 = :lv1,
								EDNTLV2 = :lv2,
								EDNTDOUBLEMENT = :doublement
								WHERE EDNTID = :idetudiant
							");

		$req->bindparam(':nom', $nom ,PDO::PARAM_STR);
		$req->bindparam(':prenom', $prenom,PDO::PARAM_STR);
		$req->bindparam(':ine',$ine,PDO::PARAM_STR);
		$req->bindparam(':sexe',$sexe,PDO::PARAM_STR);
		$req->bindparam(':datenaiss',$datenaiss,PDO::PARAM_STR);
		$req->bindparam(':lieunaiss',$lieunaiss,PDO::PARAM_STR);
		$req->bindparam(':cpnaiss',$cpnaiss,PDO::PARAM_STR);
		$req->bindparam(':paysnaiss',$paysnaiss,PDO::PARAM_INT);
		$req->bindparam(':tel',$tel,PDO::PARAM_STR);
		$req->bindparam(':mail',$mail,PDO::PARAM_STR);
		$req->bindparam(':boursier',$boursier,PDO::PARAM_STR);
		$req->bindparam(':cycle',$cycle,PDO::PARAM_STR);
		$req->bindparam(':adressetu',$adressetu,PDO::PARAM_STR);
		$req->bindparam(':cpadressetu',$cpadressetu,PDO::PARAM_STR);
		$req->bindparam(':villeadressetu',$villeadressetu,PDO::PARAM_STR);
		$req->bindparam(':idetudiant',$idetudiant,PDO::PARAM_INT);
		$req->bindparam(':frmtid',$frmtid,PDO::PARAM_INT);

		$req->bindparam(':ancetab', $ancetab, PDO::PARAM_STR);
		$req->bindparam(':ancclasse', $ancclasse, PDO::PARAM_STR);
		$req->bindparam(':anctypeetab', $anctypeetab, PDO::PARAM_INT);
		$req->bindparam(':ancacdm', $ancacdm, PDO::PARAM_STR);
		$req->bindparam(':anccp', $anccp, PDO::PARAM_STR);
		$req->bindparam(':ancville', $ancville, PDO::PARAM_STR);
		$req->bindparam(':lv1', $lv1, PDO::PARAM_STR);
		$req->bindparam(':lv2', $lv2, PDO::PARAM_STR);
		$req->bindparam(':doublement', $doublement, PDO::PARAM_INT);

		if($req->execute())
		{
        	$boo=true;
        }
        return $boo;
    }

    //-------------------------------------------------------------------------------------------------------------
    // Pour avoir toutes la liste des étudiants selon la formation
    //-------------------------------------------------------------------------------------------------------------
    public function GetListeEtudiantsByFormation($codeformation){
        $req = $this->prepare("
        						SELECT EDNTID, EDNTNOMETU, EDNTPRENOMETU, EDNTINEBEA, EDNTSEXE, EDNTDATENAISS, EDNTLIEUNAISS, EDNTCPNAISS, PSNSID, EDNTTEL, EDNTMAIL, EDNTBOURSIER, EDNTCYCLE, EDNTADRESSETU, EDNTCPADRESSETU, EDNTVILLEADRESSETU, CMPTNUM, FRMTID,EDNTANCETAB, EDNTANCCLASSE, EDNTANCTYPEETAB, EDNTANCACDM, EDNTANCCP, EDNTANCVILLE, EDNTLV1, EDNTLV2, EDNTDOUBLEMENT
        						FROM etudiant
        						WHERE FRMTID = :code
        					");
        $req->bindParam(':code', $codeformation, PDO::PARAM_INT);
        $req->execute();
        return $this->cursorToObjectArray($req);
    }
}