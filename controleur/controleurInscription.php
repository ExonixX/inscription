<?php

	require_once('modele/BD.Etudiant.inc.php');
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

		if(!is_null($etu->insertEtudiant($nom,$prenom,$ine,$sexe,$datenaiss,$lieunaiss,$cpnaiss,$paysnaiss,$tel,$mail,$boursier,$cycle,$adressetu,$cpadressetu,$villeadressetu,$cmptnum,$frmtid)))
		{

			//----------------------------------------------------------------------------------------------------
			//----------------------------------------------------------------------------------------------------
			//creation dossier etudiant en fonction de sa formation
			//----------------------------------------------------------------------------------------------------
			//----------------------------------------------------------------------------------------------------
			$formation = $etu->GetFormationEtudiantByCode($frmtid);
			var_dump($formation);
			echo $formation->get_FRMTnom();
			//for ($i=0;$i<sizeof($etu);$i++){
			//	print $etu[$i][0];
			//}
			//while ($donnees =  mysql_fetch_array($reponse))
			//{
				//emplacement du répertoire souhaité
				//pour garder les accents lors de la création du dossier
				//utf8 pour garder la casse
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
	require_once 'vues/vueInscription.php';
?>