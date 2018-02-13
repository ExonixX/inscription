<?php
	require_once('modele/BD.Formation.inc.php');
	
	$frm= new FormationDAO();
//----------------------------------------------------------------------------------------------------------------
//---------------------------------Pour ajouter une formation dans la bdd ----------------------------------------
//---------------------------------Création de dossier par formation----------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	if(isset($_POST['ajouter']))
	{
		//recuperation du nom de la nouvelle formation
		$nom=$_POST['formation'];
		if(!is_null($frm->insertFormation($nom)))
		{
			// creation dossier en même temps que la nouvelle formation
			//emplacement du répertoire souhaité
			//utf8 pour garder les accents lors de la création du dossier
			$dossier = "upload/".utf8_decode($nom);
			header('Location: index.php');
	   
		}
		else
		{
	    	echo 'Erreur';
		}
	}
//----------------------------------------------------------------------------------------------------------------
//---------------------------------Pour supprimer une formation---------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	elseif(isset($_POST['supprimer']))
	{
		$id=$_POST['FRMTID'];
		//on supprime la formation de la base
		if($frm->deleteFormation($id))
		{
			header('Location: index.php?m=Formation');
		}
		else
		{
			echo'Erreur';
		}
	}
	else
	{
		//---------------------liste des formations--------------
		$liste_frmtDAO = new FormationDAO;
		$listeForm = $liste_frmtDAO-> getFormation();

		require_once 'vues/vueFormation.php';
	
	}
?>