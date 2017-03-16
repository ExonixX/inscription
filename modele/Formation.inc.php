<?php

class Formation{

private $_FRMTID;
private $_FRMTNOM;

	function __construct() {
    

}

	public function get_FRMTid(){
		return $this->_FRMTid;
	}

	public function set_FRMTid($_FRMTid){
		$this->_FRMTid = $_FRMTID;
	}

	public function get_FRMTnom(){
		return $this->_FRMTnom;
	}

	public function set_FRMTnom($_FRMTnom){
		$this->_FRMTnom = $_FRMTNOM;
	}

}

?>