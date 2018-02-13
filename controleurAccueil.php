<?php

	require_once('modele/BD.Etudiant.inc.php');
	require_once('modele/BD.Agent.inc.php');
	require_once('modele/BD.Depot.inc.php');
	require_once('modele/BD.NaturePiece.inc.php');

	//$_SESSION['present']=0;

	if(isset($_SESSION['num']))
	{
		//si l'utilisateur connecté est un étudiant et est déjà inscrit
		if(isset($_SESSION['verif']) && $_SESSION['grade']=="Etudiant")
		{
			$etatfichiers = new DepotDAO();

			//recuperation de l'id de la nature de piece deposé
			$tabfichiers = $etatfichiers->piecesDepotByIdEtudiant($_SESSION['idetudiant']);

			$intitulenaturepiece = new NaturePieceDAO();

			$typefichiers = array();			

			//Pour chaque piece deposée
			for($i=0;$i<count($tabfichiers);$i++)
			{
				//on recupere la nature de la piece déposée dans un tableau
				$typefichiers[] = $intitulenaturepiece->searchNaturePieceById($tabfichiers[$i]->get_NTPCID());
			}
		}
		
		if(isset($_SESSION['verif']) && $_SESSION['grade']=="Agent")
		{
			$etatfichiers = new DepotDAO();

			$nbfichiersdeposes = $etatfichiers->allDepot();
		}
	}
		require_once('vues/vueAccueil.php');

	
			
?>