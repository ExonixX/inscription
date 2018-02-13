<?php
	require_once 'modele/BD.Etudiant.inc.php';
	require_once 'modele/BD.Formation.inc.php';

	if(isset($_POST['findeleves']))
	{
		$etudiants = new EtudiantDAO();
		//on recupère la liste des étudiants dans un tableau
		$liste_etudiants = $etudiants->GetListeEtudiantsByFormation($_POST['searchform']);

		//si ce tableau n'est pas vide
		if(!empty($liste_etudiants))
		{
			$form = new FormationDAO();
			//on récupère l'id des élèves
			$idformation = $liste_etudiants[0]->get_FRMTID();
			//on récupère le nom de la formation depuis son id
			$formationsearch = $form->getFormationByID($idformation);	
		}
	}
	//on injecte dans les données dans la vue
	require_once 'vues/vuesListeEtuByFormation.php';
?>