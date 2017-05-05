<?php

	require_once('modele/BD.Etudiant.inc.php');
	require_once('modele/BD.Formation.inc.php');
	require_once ('modele/Formation.inc.php');

	$etu= new EtudiantDAO();

	if(isset($_POST['suivant']))
	{
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$ine=$_POST['ine'];
		$sexe=$_POST['sexe'];
		$datenaiss=$_POST['datenaiss'];
		$lieunaiss=$_POST['lieunaiss'];
		$paysnaiss=$_POST['paysnaiss'];
		$cpnaiss=$_POST['cpnaiss'];
		$tel=$_POST['tel'];
		$mail=$_POST['mail'];
		$boursier=$_POST['boursier'];
		$cycle=$_POST['cycle'];
		$adressetu=$_POST['adressetu'];
		$cpadressetu=$_POST['cpadressetu'];
		$villeadressetu=$_POST['villeadressetu'];
		$cmptnum=$_POST['cmptnum'];
		$frmtid=$_POST['FRMTID'];

		//si c'est TRUE, on insère dans la BDD
		if(!is_null($etu->insertEtudiant($nom,$prenom,$ine,$sexe,$datenaiss,$lieunaiss,$cpnaiss,$paysnaiss,$tel,$mail,$boursier,$cycle,$adressetu,$cpadressetu,$villeadressetu,$cmptnum,$frmtid)))
		{

			//----------------------------------------------------------------------------------------------------
			//----------------creation dossier etudiant en fonction de sa formation-------------------------------
			//----------------------------------------------------------------------------------------------------
			echo $frmtid;
			//creation objets
			$formDAO= new FormationDAO();
			//$form= new Formation();

			//on récupère le nom de la formation où l'étudiant s'est inscrit
			//via la méthode sous forme d'objet
			$form=$formDAO->getFormationByID($frmtid);

			var_dump($form);
			//on récupère la valeur
			$nom_form=$form->get_FRMTnom();

			echo "valeur nom_form :";
			var_dump($nom_form);
				//emplacement du répertoire souhaité
				//pour garder les accents lors de la création du dossier
				//ut
				//$dossier = "upload/".$formation."/".$nom."_".$prenom;

				//revoir la condition
				//si dossier existe, alors on affiche un message

				//if(!is_dir($dossier))
				//{
				//	mkdir($dossier);
				//}
				//else
				//{
				//	echo 'Ce dossier existe déjà';
				//}	

		//--------------------------------------------------------------------------------------------------------
		//--------------------------------------------------------------------------------------------------------
		//--------------------------------------------------------------------------------------------------------
		//--------------------------------------------------------------------------------------------------------
			
			//header('Location: index.php?m=Responsable');
		}
		else
		{
		    echo 'Erreur lors de l ajout';
		}

	}
	//require_once 'vues/vueInscription.php';
?>