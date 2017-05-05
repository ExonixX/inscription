<?php

	class Formation{

		private $_FRMTID;
		private $_FRMTNOM;

		function __construct() {    

		}

		public function get_FRMTid(){
			return $this->_FRMTID;
		}

		public function set_FRMTid($_FRMTID){
			$this->_FRMTID = $_FRMTID;
		}

		public function get_FRMTnom(){
			return $this->_FRMTNOM;
		}

		public function set_FRMTnom($_FRMTNOM){
			$this->_FRMTNOM = $_FRMTNOM;
		}

	}

?>