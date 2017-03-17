<?php



require_once('modele/BD.NaturePiece.inc.php');

$np= new NaturePieceDAO();

if(isset($_POST['ajouter'])){

	$intitule=$_POST['ajoutpiece'];

	if($np->insertNaturePiece($intitule)){

		header('Location: index.php');

	   
	}else{
	    
	    echo 'Erreur';
   
}
}

$np= new NaturePieceDAO();

if(isset($_POST['modifier'])){

	$intitule=$_POST['modifpiece'];

	if($np->updateNaturePiece($intitule)){

		header('Location: index.php');

	   
	}else{
	    
	    echo 'Erreur';
	   
	}
}

$np= new NaturePieceDAO();

if(isset($_POST['supprimer'])){

	$intitule=$_POST['(valeur liste déroulante)'];

	if($np->deleteNaturePiece($intitule)){

		header('Location: index.php');

	   
	}else{
	    
	    echo 'Erreur';
	   
	}
}

require_once('vues/vueNaturePiece.php');




