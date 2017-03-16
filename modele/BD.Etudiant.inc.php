<?php

require_once 'Etudiant.inc.php';
require_once 'dao.inc.php';


class EtudiantDAO extends DAO{

	private $_id="EDNTid as _EDNTid";
	private $_nometu="EDNTnometu as _EDNTnometu";
	private $_prenometu="EDNTprenometu as _EDNTprenometu";
	private $_ine="EDNTINEBEA as _EDNTINEBEA";
	private $_sexe="EDNTsexe as _EDNTsexe";
	private $_datenaiss="EDNTdatenaiss as _EDNTdatenaiss";
	private $_lieunaiss="EDNTlieunaiss as _EDNTlieunaiss";
	private $_cpnaiss="EDNTCPnaiss as _EDNTCPnaiss";
	private $_paysnaiss="EDNTpaysnaiss as _EDNTpaysnaiss";
	private $_tel="EDNTtel as _EDNTtel ";
	private $_mail="EDNTmail as _EDNTmail";
	//private $_apb="EDNTAPB as _EDNTAPB";
	//private $_boursier="EDNTboursier as _EDNTboursier";
	//private $_adresseetu="EDNTadressetu as _EDNTadresseetu";
	//private $_cpadresseetu="EDNTCPadressetu as _EDNTCPadresseetu";
	//private $_villeadresseetu="EDNTvilleadressetu as _EDNTvilleadresseetu";
	private $_numCompte = "numCompte as _num";




	 function insertEtudiant($nom,$prenom,$ine,$sexe,$datenaiss,$lieunaiss,$cpnaiss,$paysnaiss,$tel,$mail,$numcompte){


		$boo=false;
		$req=$this->prepare("INSERT INTO ETUDIANT (EDNTnometu,EDNTprenometu,EDNTINEBEA,EDNTsexe,EDNTdatenaiss,EDNTlieunaiss,EDNTCPnaiss,EDNTpaysnaiss,EDNTtel,EDNTmail,numCompte) VALUES (:nom,:prenom,:ine,:sexe,:datenaiss,:lieunaiss,:cpnaiss,:paysnaiss,:tel,:mail,:numcompte)");
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
		$req->bindparam(':numcompte',$numcompte,PDO::PARAM_INT);
		if($req->execute()){
                    $boo=true;
                }
                return $boo;


}

}

