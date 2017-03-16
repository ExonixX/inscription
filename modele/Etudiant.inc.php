<?php

class Etudiant{

private $_EDNTid;
private $_EDNTnometu;
private $_EDNTprenometu;
private $_EDNTINEBEA;
private $_EDNTsexe;
private $_EDNTdatenaiss;
private $_EDNTlieunaiss;
private $_EDNTCPnaiss;
private $_EDNTpaysnaiss;
private $_EDNTtel;
private $_EDNTmail;
private $_EDNTAPB;
private $_EDNTboursier;
private $_EDNTadresseetu;
private $_EDNTCPadresseetu;
private $_EDNTvilleadresseetu;
private $_numCompte;

	function __construct() {
    

}

	public function get_EDNTid(){
		return $this->_EDNTid;
	}

	public function set_EDNTid($_EDNTid){
		$this->_EDNTid = $_EDNTid;
	}

	public function get_EDNTnometu(){
		return $this->_EDNTnometu;
	}

	public function set_EDNTnometu($_EDNTnometu){
		$this->_EDNTnometu = $_EDNTnometu;
	}

	public function get_EDNTprenometu(){
		return $this->_EDNTprenometu;
	}

	public function set_EDNTprenometu($_EDNTprenometu){
		$this->_EDNTprenometu = $_EDNTprenometu;
	}

	public function get_EDNTINEBEA(){
		return $this->_EDNTINEBEA;
	}

	public function set_EDNTINEBEA($_EDNTINEBEA){
		$this->_EDNTINEBEA = $_EDNTINEBEA;
	}

	public function get_EDNTsexe(){
		return $this->_EDNTsexe;
	}

	public function set_EDNTsexe($_EDNTsexe){
		$this->_EDNTsexe = $_EDNTsexe;
	}

	public function get_EDNTdatenaiss(){
		return $this->_EDNTdatenaiss;
	}

	public function set_EDNTdatenaiss($_EDNTdatenaiss){
		$this->_EDNTdatenaiss = $_EDNTdatenaiss;
	}

	public function get_EDNTlieunaiss(){
		return $this->_EDNTlieunaiss;
	}

	public function set_EDNTlieunaiss($_EDNTlieunaiss){
		$this->_EDNTlieunaiss = $_EDNTlieunaiss;
	}

	public function get_EDNTCPnaiss(){
		return $this->_EDNTCPnaiss;
	}

	public function set_EDNTCPnaiss($_EDNTCPnaiss){
		$this->_EDNTCPnaiss = $_EDNTCPnaiss;
	}

	public function get_EDNTpaysnaiss(){
		return $this->_EDNTpaysnaiss;
	}

	public function set_EDNTpaysnaiss($_EDNTpaysnaiss){
		$this->_EDNTpaysnaiss = $_EDNTpaysnaiss;
	}

	public function get_EDNTtel(){
		return $this->_EDNTtel;
	}

	public function set_EDNTtel($_EDNTtel){
		$this->_EDNTtel = $_EDNTtel;
	}

	public function get_EDNTmail(){
		return $this->_EDNTmail;
	}

	public function set_EDNTmail($_EDNTmail){
		$this->_EDNTmail = $_EDNTmail;
	}

	public function get_numCompte(){
		return $this->_numCompte;
	}

	public function set_numCompte($_numCompte){
		$this->_numCompte=$_numCompte;
	}
	public function get_EDNTAPB(){
		return $this->_EDNTAPB;
	}

	public function set_EDNTAPB($_EDNTAPB){
		$this->_EDNTAPB = $_EDNTAPB;
	}

	public function get_EDNTboursier(){
		return $this->_EDNTboursier;
	}

	public function set_EDNTboursier($_EDNTboursier){
		$this->_EDNTboursier = $_EDNTboursier;
	}

	public function get_EDNTadresseetu(){
		return $this->_EDNTadresseetu;
	}

	public function set_EDNTadresseetu($_EDNTadresseetu){
		$this->_EDNTadresseetu = $_EDNTadresseetu;
	}

	public function get_EDNTCPadresseetu(){
		return $this->_EDNTCPadresseetu;
	}

	public function set_EDNTCPadresseetu($_EDNTCPadresseetu){
		$this->_EDNTCPadresseetu = $_EDNTCPadresseetu;
	}

	public function get_EDNTvilleadresseetu(){
		return $this->_EDNTvilleadresseetu;
	}

	public function set_EDNTvilleadresseetu($_EDNTvilleadresseetu){
		$this->_EDNTvilleadresseetu = $_EDNTvilleadresseetu;
	}


}


?>