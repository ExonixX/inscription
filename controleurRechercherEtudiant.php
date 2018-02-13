<?php
	require_once 'modele/BD.Etudiant.inc.php';
	require_once 'outils/fonctions.php';

	//liste déroulante des étudiants
	$o_etudiant = new EtudiantDAO;

	if(isset($_POST['rechercher']))
	{
		require_once 'controleurRechercherEtudiantModif.php';
	}
	elseif (isset($_POST['modifinfoetu']) || isset($_POST['validermodif']))
	{
		require_once 'controleurModifEtuAdmin.php';
	}
	elseif(isset($_POST['rechercherparnom']))
	{
		require_once 'controleurRechercheNomEtudiant.php';
	}
	elseif(isset($_POST['findeleves']) || isset($_POST['rechercherparformation']))
	{
		require_once 'controleurRechercheFormationEtudiant.php';
	}
	else
	{
		require_once 'vues/vueRecherche.php';
	}
	
?>