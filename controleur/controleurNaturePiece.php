<?php



require_once('modele/BD.NaturePiece.inc.php');

// Ajout Nature Piéce

$np= new NaturePieceDAO();



if(isset($_POST['ajouter'])){

$intitule=$_POST['intitule'];

if($np->insertNaturePiece($intitule)){

	header('Location: index.php?m=NaturePiece');

   
}else{
    
    echo 'Erreur';
   
}
}

// Suppression Nature Piéce
$np1=new NaturePieceDAO();

if(isset($_POST['supprimer'])){

$id=$_POST['NTPCID'];

if(!is_null($np1->deleteNaturePiece($id))){

	header('Location: index.php?m=NaturePiece');


}else{

	echo'Erreur';


}
}


require_once('vues/vueNaturePiece.php');



?>