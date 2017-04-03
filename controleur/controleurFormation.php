<?php
require_once('modele/BD.Formation.inc.php');



$frm= new FormationDAO();

if(isset($_POST['suivant'])){

//pour garder les accents lors de la création du dossier

$nom=$_POST['formation'];


if(!is_null($frm->insertFormation($nom))){

	
header('Location: index.php');
// creation dossier en même temps que la nouvelle formation

//emplacement du répertoire souhaité
//utf8 pour garder la casse
$dossier = "upload/ ".utf8_decode($nom);

//revoir la condition
//si dossier existe, alors on affiche un message

if(!is_dir($dossier))
{
	mkdir($dossier);
}
else
{
	echo 'erreur';
}

   
}else{
    
    echo 'Erreur';
    

}

}

$frm1=new FormationDAO();

if(isset($_POST['supprimer'])){

$id=$_POST['FRMTID'];

if(!is_null($frm1->deleteFormation($id))){

	header('Location: index.php');


}else{

	echo'Erreur';

}
}



    require_once 'vues/vueFormation.php';












?>