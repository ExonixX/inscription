<?php

//pour pouvoir utiliser la classe NaturePieceDAO()
require_once('modele/BD.NaturePiece.inc.php');

//--------------------------------------------------------------------------------------
// Ajout Nature Pièce-------------------------------------------------------------------
//--------------------------------------------------------------------------------------

$np= new NaturePieceDAO();

if(isset($_POST['ajouter']))
{
	$intitule=$_POST['intitule'];

	if($np->insertNaturePiece($intitule))
	{
		header('Location: index.php?m=NaturePiece');
	}
	else
	{
	    echo 'Erreur';   
	}
}

//--------------------------------------------------------------------------------------
// Suppression Nature Pièce-------------------------------------------------------------
//--------------------------------------------------------------------------------------
$np1=new NaturePieceDAO();

if(isset($_POST['supprimer']))
{
	$id=$_POST['NTPCID'];
	if(!is_null($np1->deleteNaturePiece($id)))
	{
		header('Location: index.php?m=NaturePiece');
	}
	else
	{
		echo'Erreur';

	}
}

//affichage dans la vue
require_once('vues/vueNaturePiece.php');



?>