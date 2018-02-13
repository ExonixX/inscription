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

	if(isset($_POST['validermodif']))
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

		//si on a pas d'erreurs
		if($erreurNom==false && $erreurPrenom==false && $erreurlieunaiss==false && $erreurvilleradressetu==false
			&& $erreurINE==false && $erreurEmail==false && $erreurTel==false && $erreurCPAdress==false
			&& $erreurCPNaiss==false && $erreurDate ==false)
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

			//update de la table etudiant
			if($etu->updateEtudiantAdmin($upnom,$upprenom,$upine,$upsexe,$updatenaiss,$uplieunaiss,$upcpnaiss,$uppaysnaiss,$uptel,$upmail,$upboursier,$upcycle,$upadressetu,$upcpadressetu,$upvilleadressetu,$_SESSION['idetu'],$upfrmtid)==true)
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
		$infosetu = $etu->GetEtudiantByCode($_SESSION['idetu']);
		//Pour avoir toutes les formations proposées dans la BDD
		$listeForm = $formations->getFormation();
		//Pour avoir tous les pays proposés dans la BDD
		$listePays = $pays->getPays();

		//injection dans la vue
		require_once 'vues/vueRechercheEtudiantModif.php';
	}

?>