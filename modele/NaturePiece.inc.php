<?php

class NaturePiece{


	private $_NTPCid;
	private $_NTPCintitule;



	function __construct() {
    

}


	public function get_NTPCid(){
		return $this->_NTPCid;
	}

	public function set_NTPCid($_NTPCid){
		$this->_NTPCid = $_NTPCid;
	}

	public function get_NTPCintitule(){
		return $this->_NTPCintitule;
	}

	public function set_NTPCintitule($_NTPCintitule){
		$this->_NTPCintitule=$_NTPCintitule;
	}


}