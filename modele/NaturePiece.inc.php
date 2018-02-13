<?php

	class NaturePiece{

		private $_NTPCID;
		private $_NTPCINTITULE;

		function __construct() {
	    
	    }

		public function get_NTPCID(){
			return $this->NTPCID;
		}

		public function set_NTPCID($_NTPCID){
			$this->NTPCID = $_NTPCID;
		}

		public function get_NTPCINTITULE(){
			return $this->NTPCINTITULE;
		}

		public function set_NTPCINTITULE($_NTPCINTITULE){
			$this->NTPCINTITULE=$_NTPCINTITULE;
		}
	}

?>