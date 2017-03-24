<?php
require_once('modele/BD.Responsable.inc.php');






$res= new ResponsableDAO();

if(isset($_POST['suivant'])){

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$lien=$_POST['lien'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];
$fixe=$_POST['fixe'];
$legal=$_POST['legal'];
$enfantsco=$_POST['enfantsco'];
$nbenfant=$_POST['nbenfant'];
$adresseresp=$_POST['adresseresp'];
$CPresp=$_POST['CPresp'];
$villeresp=$_POST['villeresp'];
$paysresp=$_POST['paysresp'];
$stepid=$_POST['STEPID'];
$pfsnid=$_POST['PFSNID'];







if(!is_null($res->insertResponsable($nom,$prenom,$lien,$adresseresp,$CPresp,$villeresp,$paysresp,$tel,$fixe,$mail,$legal,$enfantsco,$nbenfant,$pfsnid,$stepid))){

	
header('Location: index.php');



}else{
    
    echo 'Erreur';
    

}

}

require_once'vues/vueResponsable.php';

?>
