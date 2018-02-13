<?php

	class Formation{

		private $_FRMTID;
		private $_FRMTNOM;

		function __construct() {    

		}

		public function get_FRMTid(){
			return $this->FRMTID;
		}

		public function set_FRMTid($_pFRMTID){
			$this->FRMTID = $_pFRMTID;
		}

		public function get_FRMTnom(){
			return $this->FRMTNOM;
		}

		public function set_FRMTnom($_pFRMTNOM){
			$this->FRMTNOM = $_pFRMTNOM;
		}

	}

?>