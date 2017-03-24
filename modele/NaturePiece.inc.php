<?php

class NaturePiece{


	private $_NTPCID;
	private $_NTPCINTITULE;



	function __construct() {
    

}


	public function get_NTPCID(){
		return $this->_NTPCID;
	}

	public function set_NTPCID($_NTPCID){
		$this->_NTPCID = $_NTPCID;
	}

	public function get_NTPCINTITULE(){
		return $this->_NTPCINTITULE;
	}

	public function set_NTPCINTITULE($_NTPCINTITULE){
		$this->_NTPCINTITULE=$_NTPCINTITULE;
	}


}