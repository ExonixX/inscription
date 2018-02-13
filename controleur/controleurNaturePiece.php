<?php

	//pour pouvoir utiliser la classe NaturePieceDAO()
	require_once('modele/BD.NaturePiece.inc.php');
	require_once('modele/BD.Formation.inc.php');

	$np = new NaturePieceDAO();
	$frm = new FormationDAO();

	//--------------------------------------------------------------------------------------
	// Ajout Nature Pièce-------------------------------------------------------------------
	//--------------------------------------------------------------------------------------

	if(isset($_POST['ajouter']))
	{
		$intitule=$_POST['intitule'];

		if($np->insertNaturePiece($intitule))
		{
			$listeidformation = $frm->getFormation();

			//pour recuperer l'id de la derniere nature piece ajoutée
			$numlastinsertnp=$np->lastInsertId();
			//conversion en Int
			$numlastinsertnp=intval($numlastinsertnp);

			for($i=0;$i<count($listeidformation);$i++)
			{
				$np->insertNaturePieceFormation($numlastinsertnp, $listeidformation[$i]->get_FRMTid());
			}

			header('Location: index.php?m=NaturePiece');
		}
		else
		{
		    echo 'Erreur insertion';   
		}
	}

	//--------------------------------------------------------------------------------------
	// Suppression Nature Pièce-------------------------------------------------------------
	//--------------------------------------------------------------------------------------

	if(isset($_POST['supprimer']))
	{
		$id=$_POST['NTPCID'];

		if($np->deleteNaturePieceFormation($id))
		{
			$np->deleteNaturePiece($id);

			header('Location: index.php?m=NaturePiece');
		}
		else
		{
			echo'Erreur';
		}
	}

	//-------------------------------------------------------------------------------------
	// Liste Nature Piece présent dans la bdd
	//-------------------------------------------------------------------------------------
	$listNP = new NaturePieceDAO();
	$listenaturepiece=$listNP->getNaturePiece();

	//affichage dans la vue
	require_once('vues/vueNaturePiece.php');



?>