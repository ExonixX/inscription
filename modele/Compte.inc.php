<?php
class Compte{

private $_numCompte;
private $_loginCompte;
private $_mdpCompte;
private $_codeTypeCompte;

function __construct() {
    

}

public function get_num(){
		return $this->_num;
	}

	public function set_num($_num){
		$this->_num = $_num;
	}

	public function get_login(){
		return $this->_login;
	}

	public function set_login($_login){
		$this->_login = $_login;
	}

	public function get_mdp(){
		return $this->_mdp;
	}

	public function set_mdp($_mdp){
		$this->_mdp = $_mdp;
	}

	public function getTypeCompte(){
		return $this->_TypeCompte;
	}

	public function setTypeCompte($TypeCompte){
		$this->_TypeCompte = $TypeCompte;
	}






}