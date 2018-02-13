<?php
	class Compte{

		private $_CMPTNUM;
		private $_CMPTLOGIN;
		private $_CMPTPASSWORD;
		private $_TCMPNUM;
		private $_CMPTMAIL;

		function __construct() {
		    
		}

		public function get_CMPTNUM(){
				return $this->CMPTNUM;
		}

		public function set_CMPTNUM($_pCMPTNUM){
			$this->CMPTNUM = $_pCMPTNUM;
		}

		public function get_CMPTLOGIN(){
			return $this->CMPTLOGIN;
		}

		public function set_CMPTLOGIN($_pCMPTLOGIN){
			$this->CMPTLOGIN = $_pCMPTLOGIN;
		}

		public function get_CMPTPASSWORD(){
			return $this->CMPTPASSWORD;
		}

		public function set_CMPTPASSWORD($_pCMPTPASSWORD){
			$this->CMPTPASSWORD = $_pCMPTPASSWORD;
		}

		public function get_TCMPNUM(){
			return $this->TCMPNUM;
		}

		public function set_TCMPNUM($_pTCMPNUM){
			$this->TCMPNUM = $_pTCMPNUM;
		}

		public function get_CMPTMAIL(){
			return $this->CMPTMAIL;
		}

		public function set_CMPTMAIL($_pCMPTMAIL){
			$this->CMPTMAIL = $_pCMPTMAIL;
		}

	}