<?php
class Compte{

private $_CMPTNUM;
private $_CMPTLOGIN;
private $_CMPTPASSWORD;
private $_TCMPNUM;

function __construct() {
    

}


public function get_CMPTNUM(){
		return $this->_CMPTNUM;
	}

	public function set_CMPTNUM($_CMPTNUM){
		$this->_CMPTNUM = $_CMPTNUM;
	}

	public function get_CMPTLOGIN(){
		return $this->_CMPTLOGIN;
	}

	public function set_CMPTLOGIN($_CMPTLOGIN){
		$this->_CMPTLOGIN = $_CMPTLOGIN;
	}

	public function get_CMPTPASSWORD(){
		return $this->_CMPTPASSWORD;
	}

	public function set_CMPTPASSWORD($_CMPTPASSWORD){
		$this->_CMPTPASSWORD = $_CMPTPASSWORD;
	}

	public function get_TCMPNUM(){
		return $this->_TCMPNUM;
	}

	public function set_TCMPNUM($_TCMPNUM){
		$this->_TCMPNUM = $_TCMPNUM;
	}




}