<?php
require_once('modele/BD.Etudiant.inc.php');



$etu= new EtudiantDAO();

if(isset($_POST['suivant'])){

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$ine=$_POST['ine'];
$sexe=$_POST['sexe'];
$datenaiss=$_POST['datenaiss'];
$lieunaiss=$_POST['lieunaiss'];
$paysnaiss=$_POST['paysnaiss'];
$cpnaiss=$_POST['cpnaiss'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];
$boursier=$_POST['boursier'];
$cycle=$_POST['cycle'];
$adressetu=$_POST['adressetu'];
$cpadressetu=$_POST['cpadressetu'];
$villeadressetu=$_POST['villeadressetu'];
$cmptnum=$_POST['cmptnum'];
$frmtid=$_POST['FRMTID'];







if(!is_null($etu->insertEtudiant($nom,$prenom,$ine,$sexe,$datenaiss,$lieunaiss,$cpnaiss,$paysnaiss,$tel,$mail,$boursier,$cycle,$adressetu,$cpadressetu,$villeadressetu,$cmptnum,$frmtid))){

	
header('Location: index.php?m=Responsable');



}else{
    
    echo 'Erreur';
    

}

}
    require_once 'vues/vueInscription.php';












?>