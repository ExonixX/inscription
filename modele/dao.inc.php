<?php

	include_once "param.inc.php";


	abstract class DAO extends PDO{

		public function __construct()
		{
			parent::__construct("mysql:host=".Param::$serveur.";dbname=".Param::$bd, Param::$login, Param::$mdp);
	        $this->exec('SET NAMES utf8');
			//$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		}

		//-------------------------------------------------------------------------------------------------------------
		// retourne les résultats de requête sous forme de tableau d'objets
		//-------------------------------------------------------------------------------------------------------------
		protected function cursorToObjectArray($curseur)
		{
			$tab = $curseur->fetchAll(PDO::FETCH_CLASS, substr(get_class($this),0,-3));
			return $tab;
		}
		
		//-------------------------------------------------------------------------------------------------------------
		// retourne le resultat de requête sous forme d'objet
		//-------------------------------------------------------------------------------------------------------------
		protected function cursorToObject($curseur)
		{
			$curseur->setFetchMode(PDO::FETCH_CLASS, substr(get_class($this),0,-3));
			return $curseur->fetch(PDO::FETCH_CLASS);
		}

	}

?>