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

require_once('vues/vueNaturePiece.php');




