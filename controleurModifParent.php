<?php

	require_once('modele/BD.Responsable.inc.php');

	//recherche du nombre de parent de l'étudiant
	$liste_parentDAO = new ResponsableDAO;
	$parents = $liste_parentDAO->GetAllResponsableByCode($_SESSION['num']);

	if(count($parents)>1)
	{
		$_SESSION['enf_scolarises'] = $parents[0]->get_RPSLNBENFSCOLARISES();
		$_SESSION['enf_tot'] = $parents[0]->get_RPSLNBTOTENFANTS();
	}


	if(isset($_POST['parent0']) || isset($_POST['modifinforesp1']))
	{
		require_once 'controleurModifProfilResp1.php';
	}
	elseif (isset($_POST['parent1']) || isset($_POST['modifinforesp2']))
	{
		require_once 'controleurModifProfilResp2.php';
	}
	else
	{
		require_once 'vues/vueModifParent.php';
	}

?>