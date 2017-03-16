<?php
require_once('modele/BD.Formation.inc.php');



$etu= new FormationDAO();

if(isset($_POST['suivant'])){

$nom=$_POST['formation'];


if(!is_null($etu->insertFormation($nom))){

	
header('Location: index.php');

   
}else{
    
    echo 'Erreur';
    

}

}
    require_once 'vues/vueFormation.php';












?>