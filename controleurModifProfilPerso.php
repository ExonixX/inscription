<?php

	require_once 'modele/BD.Etudiant.inc.php';
	require_once 'modele/BD.Formation.inc.php';
	require_once 'modele/BD.Pays.inc.php';
	require_once 'outils/fonctions.php';

	//creation nouvel objet étudiant
	$etu = new EtudiantDAO();
	//creation nouvel objet formation

	$formations = new FormationDAO();
	//creation nouvel objet pays
	$pays = new PaysDAO();

	if(isset($_POST['modifinfoetu']))
	{
		//controle sur le type de saisie
		$erreurNom = controleTypeTexte($_POST['modifnom']);
		$erreurPrenom = controleTypeTexte($_POST['modifprenom']);
		$erreurINE = controleINE($_POST['modifine']);
		$erreurDate = controleFormatDate($_POST['modifdatenaiss']);
		$erreurlieunaiss = controleTypeTexte($_POST['modiflieunaiss']);
		$erreurCPNaiss = controleCP($_POST['modifcpnaiss']);
		$erreurTel = controleNumTel($_POST['modiftel']);
		$erreurEmail = controleMail($_POST['modifmail']);
		$erreurvilleradressetu = controleTypeTexte($_POST['modifvilleadressetu']);
		$erreurCPAdress = controleCP($_POST['modifcpadressetu']);

		$erreurEtab=controleTypeTexte($_POST['modifancetab']);
		$erreurClasse=controleTypeClasse($_POST['modifancclasse']);
		$erreurAcdm=controleTypeTexte($_POST['modifancacdm']);
		$erreurAncCP= controleCP($_POST['modifanccp']);
		$erreurVille=controleTypeTexte($_POST['modifancville']);
		$erreurLv1=controleTypeTexte($_POST['modiflv1etu']);
		$erreurLv2=controleTypeTexte($_POST['modiflv2etu']);
		//si on a pas d'erreurs
		if(!$erreurNom && !$erreurPrenom && !$erreurlieunaiss && !$erreurvilleradressetu
			&& !$erreurINE && !$erreurEmail && !$erreurTel && !$erreurCPAdress
			&& !$erreurCPNaiss && !$erreurDate && !$erreurEtab && !$erreurClasse && !$erreurAcdm && !$erreurAncCP && !$erreurVille && !$erreurLv1 && !$erreurLv2)
		{
			//recuperation des nouvelles valeurs
			$upnom=$_POST['modifnom'];
			$upprenom=$_POST['modifprenom'];
			$upine=$_POST['modifine'];
			$upsexe=$_POST['modifsexe'];
			$updatenaiss=$_POST['modifdatenaiss'];
			$uplieunaiss=$_POST['modiflieunaiss'];
			$uppaysnaiss=$_POST['modifPSNSID'];
			$upcpnaiss=$_POST['modifcpnaiss'];
			$uptel=$_POST['modiftel'];
			$upmail=$_POST['modifmail'];
			$upboursier=$_POST['modifboursier'];
			$upcycle=$_POST['modifcycle'];
			$upadressetu=$_POST['modifadressetu'];
			$upcpadressetu=$_POST['modifcpadressetu'];
			$upvilleadressetu=$_POST['modifvilleadressetu'];
			$upfrmtid=$_POST['modifFRMTID'];

			$upanc_etab = $_POST['modifancetab'];
			$upanc_classe = $_POST['modifancclasse'];
			$upanc_typeetab = $_POST['modifanctypeetab'];
			$upanc_acdm = $_POST['modifancacdm'];
			$upanc_cp = $_POST['modifanccp'];
			$upanc_ville = $_POST['modifancville'];
			$upanc_lv1 = $_POST['modiflv1etu'];
			$upanc_lv2 = $_POST['modiflv2etu'];
			$updoublement = $_POST['modifdoublement'];

			//update de la table etudiant
			if($etu->updateEtudiant($upnom,$upprenom,$upine,$upsexe,$updatenaiss,$uplieunaiss,$upcpnaiss,$uppaysnaiss,$uptel,$upmail,$upboursier,$upcycle,$upadressetu,$upcpadressetu,$upvilleadressetu,$_SESSION['num'],$upfrmtid,$upanc_etab,$upanc_classe,$upanc_typeetab,$upanc_acdm,$upanc_cp,$upanc_ville,$upanc_lv1,$upanc_lv2,$updoublement)==true)
			{
				header('Location: index.php?m=Accueil');
			}
			else
			{
				echo "erreur update";
			}
		}
		else
		{
			echo "erreur type des champs";
		}
	}
	else
	{
		
		//pour avoir toutes les informations concernant l'étudiant qui est connecté
		$infosetu = $etu->searchEtuByIdCompte($_SESSION['num']);
		//Pour avoir toutes les formations proposées dans la BDD
		$listeForm = $formations->getFormation();
		//Pour avoir tous les pays proposés dans la BDD
		$listePays = $pays->getPays();

		//injection dans la vue
		require_once 'vues/vueModifProfilPerso.php';
	}

?>