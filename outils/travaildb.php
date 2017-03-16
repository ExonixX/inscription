<?php
	class SGBDConnexion {
		private static $connexion;
		
		private function __construct() {}
		public static function getConnexion() {
			if (static::$connexion == null) {
				static::$connexion=new PDO('mysql:host=localhost;dbname=inscription_ligne','root','');
				static::$connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			}
			return static::$connexion;
		}
	}

	function sgbdGetConnexion() {		
		return SGBDConnexion::getConnexion();		
	}
	


	// renvoie le nombre de lignes touchées par la requete INSERT
	// UPDATE ou DELETE
	function sgbdExecuteIUD($uneRequete, $arrayParams) {
		$cnx = sgbdGetConnexion();
		$curseur = $cnx->prepare($uneRequete);
		$curseur->execute($arrayParams);
		return $curseur->rowCount();
	}
	
	// renvoie un tableau contenant les occurences trouvée par la requete
	// arrayParams : tableau de paramètres (peut ne pas être défini)
	function sgbdExecuteSelect($uneRequete, $arrayParams=null) {
		$tableau = array();
		$cnx = sgbdGetConnexion();
		$curseur = $cnx->prepare($uneRequete);
		$curseur->execute($arrayParams);
		foreach($curseur as $row) {$tableau[] = $row; }
		return $tableau;
	}
	
//********************************************************
// G E S T I O N    T Y P E S    D E    P I E C E 
//********************************************************
	function sgbdUpdateTypePiece($id, $nveauTexte) {
		$req = 'UPDATE naturepiece SET NTPCintitule=? WHERE NTPCid=?';
		return sgbdExecuteIUD($req, [$nveauTexte, $id]);		
	}
	function sgbdInsertTypePiece($nveauTexte) {
		// parametre : autant que de ?
		$req = 'INSERT INTO naturepiece (NTPCintitule) VALUES(?)';
		return sgbdExecuteIUD($req, [$nveauTexte]);
	}
	function sgbdDeleteTypePiece ($id) {
		$req = 'DELETE FROM naturepiece WHERE NTPCid=?';
		return sgbdExecuteIUD($req, [$id]);	
	}	
	function sgbdListeTypePiece () {
		$req = 'SELECT NTPCid, NTPCintitule FROM naturepiece';
		return sgbdExecuteSelect($req);
	}
//********************************************************
// G E S T I O N    F O R M A T I O N 
//********************************************************
	function sgbdListeFormation () {
		$req = 'SELECT FRMTid, FRMTnom FROM formation';
		return sgbdExecuteSelect($req);
	}
?>