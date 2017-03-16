<?php

require_once('modele/Authentification.inc.php');

$auth = new Authentification();






if(isset($_POST['valider_conn'])){
$log = $_POST['mail'];
$mdp = $_POST['mdp'];


if($auth->Login($log, $mdp)){
    
 

 header('Location: index.php');

   
}else{
    
    echo 'erreur login ou mdp';
    require_once 'vues/vueConnexion.php';

}

}
    require_once 'vues/vueConnexion.php';





