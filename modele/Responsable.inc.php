<?php

class Responsable{

	private $_RPSLID;
	private $_RPSLNOMRESP;
	private $_RPSLPRENOMRESP;
	private $_RPSLLIENPARENTE;
	private $_RPSLADRESSRESP;
	private $_RPSLCPADRESSRESP;
	private $_RPSLVILLEADRESSRESP;
	private $_PSNSID;
	private $_RPSLTELRESP;
	private $_RPSLFIXRESP;
	private $_RPSLMAILRESP;
	private $_RPSLLEGAL;
	private $_RPSLNBENFSCOLARISES;
	private $_RPSLNBTOTENFANTS;
	private $_PFSNID;
	private $_STEPID;


	function __construct() {
        
    }


	public function get_RPSLID(){
		return $this->RPSLID;
	}

	public function set_RPSLID($_RPSLID){
		$this->RPSLID = $_RPSLID;
	}

	public function get_RPSLNOMRESP(){
		return $this->RPSLNOMRESP;
	}

	public function set_RPSLNOMRESP($_RPSLNOMRESP){
		$this->RPSLNOMRESP = $_RPSLNOMRESP;
	}

	public function get_RPSLPRENOMRESP(){
		return $this->RPSLPRENOMRESP;
	}

	public function set_RPSLPRENOMRESP($_RPSLPRENOMRESP){
		$this->RPSLPRENOMRESP = $_RPSLPRENOMRESP;
	}

	public function get_RPSLLIENPARENTE(){
		return $this->RPSLLIENPARENTE;
	}

	public function set_RPSLLIENPARENTE($_RPSLLIENPARENTE){
		$this->RPSLLIENPARENTE = $_RPSLLIENPARENTE;
	}

	public function get_RPSLADRESSRESP(){
		return $this->RPSLADRESSRESP;
	}

	public function set_RPSLADRESSRESP($_RPSLADRESSRESP){
		$this->RPSLADRESSRESP = $_RPSLADRESSRESP;
	}

	public function get_RPSLCPADRESSRESP(){
		return $this->RPSLCPADRESSRESP;
	}

	public function set_RPSLCPADRESSRESP($_RPSLCPADRESSRESP){
		$this->RPSLCPADRESSRESP = $_RPSLCPADRESSRESP;
	}

	public function get_RPSLVILLEADRESSRESP(){
		return $this->RPSLVILLEADRESSRESP;
	}

	public function set_RPSLVILLEADRESSRESP($_RPSLVILLEADRESSRESP){
		$this->RPSLVILLEADRESSRESP = $_RPSLVILLEADRESSRESP;
	}

	public function get_PSNSID(){
		return $this->PSNSID;
	}

	public function set_PSNSID($_PSNSID){
		$this->PSNSID = $_PSNSID;
	}

	public function get_RPSLTELRESP(){
		return $this->RPSLTELRESP;
	}

	public function set_RPSLTELRESP($_RPSLTELRESP){
		$this->RPSLTELRESP = $_RPSLTELRESP;
	}

	public function get_RPSLFIXRESP(){
		return $this->RPSLFIXRESP;
	}

	public function set_RPSLFIXRESP($_RPSLFIXRESP){
		$this->RPSLFIXRESP = $_RPSLFIXRESP;
	}

	public function get_RPSLMAILRESP(){
		return $this->RPSLMAILRESP;
	}

	public function set_RPSLMAILRESP($_RPSLMAILRESP){
		$this->RPSLMAILRESP = $_RPSLMAILRESP;
	}

	public function get_RPSLLEGAL(){
		return $this->RPSLLEGAL;
	}

	public function set_RPSLLEGAL($_RPSLLEGAL){
		$this->RPSLLEGAL = $_RPSLLEGAL;
	}

	public function get_RPSLNBENFSCOLARISES(){
		return $this->RPSLNBENFSCOLARISES;
	}

	public function set_RPSLNBENFSCOLARISES($_RPSLNBENFSCOLARISES){
		$this->RPSLNBENFSCOLARISES = $_RPSLNBENFSCOLARISES;
	}

	public function get_RPSLNBTOTENFANTS(){
		return $this->RPSLNBTOTENFANTS;
	}

	public function set_RPSLNBTOTENFANTS($_RPSLNBTOTENFANTS){
		$this->RPSLNBTOTENFANTS = $_RPSLNBTOTENFANTS;
	}

	public function get_PFSNID(){
		return $this->PFSNID;
	}

	public function set_PFSNID($_PFSNID){
		$this->PFSNID = $_PFSNID;
	}

	public function get_STEPID(){
		return $this->STEPID;
	}

	public function set_STEPID($_STEPID){
		$this->STEPID = $_STEPID;
	}
}