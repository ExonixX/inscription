<?php
require_once('modele/BD.Formation.inc.php');



$frm= new FormationDAO();

if(isset($_POST['suivant'])){

$nom=$_POST['formation'];


if(!is_null($frm->insertFormation($nom))){

	
header('Location: index.php');

   
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