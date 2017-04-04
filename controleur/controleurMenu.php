<?php
require_once ('modele/Menu.inc.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$men = new Menu();
$men->setName("menu");
$men->ajouterLien("Accueil", "Accueil");

if(isset($_SESSION['login'])){

  if($_SESSION['grade']=="Agent"){
    $men->ajouterLien('Fichiers déposés',"AjoutDossier"); // ( ' Nom de l'onglet ' ,' Nom du controleur' )
    $men->ajouterLien('Pièces justificatives',"NaturePiece");
    $men->ajouterLien('Formation',"Formation");
    $men->ajouterLien('Déconnexion ('.$_SESSION["login"].')', "Deconnexion");
  }

  if($_SESSION['grade']=="Etudiant"){
    $men->ajouterLien('Inscription', "Inscription");
    $men->ajouterLien('Dépôt De Fichier',"Depot");
    $men->ajouterLien('Modification Profil', "ModifProfil");
    $men->ajouterLien('Déconnexion ('.$_SESSION["login"].')', "Deconnexion");
  }

}
else
{
  $men->ajouterLien("Connexion", "Connexion");
}

$men->afficheMenu();

if(isset($_GET['m'])){
  if($_GET['m']=="Deconnexion"){
    session_destroy();
    header('Location: index.php');
    require_once('controleur/controleurAccueil.php');
  }else{
    require_once('controleur/controleur'.$_GET['m'].'.php');
  }
}else{
  require_once('controleur/controleurAccueil.php');
}