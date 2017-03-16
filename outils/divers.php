<?php
	//fonction pour revenir à l'accueil principal
	function displayAnchorAccueil() {
		echo '<a href="administration/index.html">Retour page accueil</a>';		
	}
	
	
	//fonction qui donne la liste des dossiers dans le dossier stockage
	//en donnant le $chemin du dossier
	function dossiercontenu($chemin){
		$tableau = array();
		$dossier = $chemin;
		$contenu_dossier = scandir($dossier);
		foreach($contenu_dossier as $row) {$tableau[] = $row; };
		return $tableau;
	}
	
	
?>