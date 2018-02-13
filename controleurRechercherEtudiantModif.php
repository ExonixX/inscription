<?php

	require_once 'modele/BD.Etudiant.inc.php';
	require_once 'modele/BD.Formation.inc.php';
	require_once 'modele/BD.Pays.inc.php';

	if(isset($_POST['rechercher']))
	{
		$_SESSION['idetu']=$_POST['searchetu'];

		//objet etudiant
		$o_etudiant = new EtudiantDAO;
		$infosetu = $o_etudiant->GetEtudiantByCode($_SESSION['idetu']);

		$o_formation = new FormationDAO;
		$listeForm = $o_formation->getFormation();

		$o_pays = new PaysDAO;
		$listePays = $o_pays->getPays();

		require_once 'vues/vueRechercheEtudiant.php';
	}
	

?>