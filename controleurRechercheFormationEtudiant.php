<?php
	require_once '/modele/BD.Formation.inc.php';

	if(isset($_POST['findeleves']))
	{
		require_once 'controleurListeEleveByFormation.php';
	}
	else
	{
		$formation = new FormationDAO();
		$liste_formations = $formation->getFormation();

		require_once 'vues/vueRechercheFormationEtudiant.php';

	}


?>