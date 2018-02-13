<?php

class Etudiant{

	private $_EDNTID;
	private $_EDNTNOMETU;
	private $_EDNTPRENOMETU;
	private $_EDNTINEBEA;
	private $_EDNTSEXE;
	private $_EDNTDATENAISS;
	private $_EDNTLIEUNAISS;
	private $_EDNTCPNAISS;
	private $_EDNTTEL;
	private $_EDNTMAIL;
	private $_EDNTAPB;
	private $_EDNTBOURSIER;
	private $_EDNTCYCLE;
	private $_EDNTADRESSETU;
	private $_EDNTCPADRESSETU;
	private $_EDNTVILLEADRESSETU;
	private $_CMPTNUM;
	private $_FRMTID;
	private $_PSNSID;

	private $_EDNTANCETAB;
	private $_EDNTANCCLASSE;
	private $_EDNTANCTYPEETAB;
	private $_EDNTANCACDM;
	private $_EDNTANCCP;
	private $_EDNTANCVILLE;
	private $_EDNTLV1;
	private $_EDNTLV2;
	private $_EDNTDOUBLEMENT;

	function __construct(){
	    
	}

	public function get_EDNTID(){
		return $this->EDNTID;
	}

	public function set_EDNTID($_pEDNTID){
		$this->EDNTID = $_pEDNTID;
	}

	public function get_EDNTNOMETU(){
		return $this->EDNTNOMETU;
	}

	public function set_EDNTNOMETU($_pEDNTNOMETU){
		$this->EDNTNOMETU = $_pEDNTNOMETU;
	}

	public function get_EDNTPRENOMETU(){
		return $this->EDNTPRENOMETU;
	}

	public function set_EDNTPRENOMETU($_pEDNTPRENOMETU){
		$this->EDNTPRENOMETU = $_pEDNTPRENOMETU;
	}

	public function get_EDNTINEBEA(){
		return $this->EDNTINEBEA;
	}

	public function set_EDNTINEBEA($_pEDNTINEBEA){
		$this->EDNTINEBEA = $_pEDNTINEBEA;
	}

	public function get_EDNTSEXE(){
		return $this->EDNTSEXE;
	}

	public function set_EDNTSEXE($_pEDNTSEXE){
		$this->EDNTSEXE = $_pEDNTSEXE;
	}

	public function get_EDNTDATENAISS(){
		return $this->EDNTDATENAISS;
	}

	public function set_EDNTDATENAISS($_pEDNTDATENAISS){
		$this->EDNTDATENAISS = $_pEDNTDATENAISS;
	}

	public function get_EDNTLIEUNAISS(){
		return $this->EDNTLIEUNAISS;
	}

	public function set_EDNTLIEUNAISS($_pEDNTLIEUNAISS){
		$this->EDNTLIEUNAISS = $_pEDNTLIEUNAISS;
	}

	public function get_EDNTCPNAISS(){
		return $this->EDNTCPNAISS;
	}

	public function set_EDNTCPNAISS($_pEDNTCPNAISS){
		$this->EDNTCPNAISS = $_pEDNTCPNAISS;
	}

	public function get_EDNTTEL(){
		return $this->EDNTTEL;
	}

	public function set_EDNTTEL($_pEDNTTEL){
		$this->EDNTTEL = $_pEDNTTEL;
	}

	public function get_EDNTMAIL(){
		return $this->EDNTMAIL;
	}

	public function set_EDNTMAIL($_pEDNTMAIL){
		$this->EDNTMAIL = $_pEDNTMAIL;
	}

	public function get_EDNTAPB(){
		return $this->EDNTAPB;
	}

	public function set_EDNTAPB($_pEDNTAPB){
		$this->EDNTAPB = $_pEDNTAPB;
	}

	public function get_EDNTBOURSIER(){
		return $this->EDNTBOURSIER;
	}

	public function set_EDNTBOURSIER($_pEDNTBOURSIER){
		$this->EDNTBOURSIER = $_pEDNTBOURSIER;
	}

	public function get_EDNTCYCLE(){
		return $this->EDNTCYCLE;
	}

	public function set_EDNTCYCLE($_pEDNTCYCLE){
		$this->EDNTCYCLE = $_pEDNTCYCLE;
	}

	public function get_EDNTADRESSETU(){
		return $this->EDNTADRESSETU;
	}

	public function set_EDNTADRESSETU($_pEDNTADRESSETU){
		$this->EDNTADRESSETU = $_pEDNTADRESSETU;
	}

	public function get_EDNTCPADRESSETU(){
		return $this->EDNTCPADRESSETU;
	}

	public function set_EDNTCPADRESSETU($_pEDNTCPADRESSETU){
		$this->EDNTCPADRESSETU = $_pEDNTCPADRESSETU;
	}

	public function get_EDNTVILLEADRESSETU(){
		return $this->EDNTVILLEADRESSETU;
	}

	public function set_EDNTVILLEADRESSETU($_pEDNTVILLEADRESSETU){
		$this->EDNTVILLEADRESSETU = $_pEDNTVILLEADRESSETU;
	}

	public function get_CMPTNUM(){
		return $this->CMPTNUM;
	}

	public function set_CMPTNUM($_pCMPTNUM){
		$this->CMPTNUM = $_pCMPTNUM;
	}

	public function get_FRMTID(){
		return $this->FRMTID;
	}

	public function set_FRMTID($_pFRMTID){
		$this->FRMTID = $_pFRMTID;
	}

	public function get_PSNSID(){
		return $this->PSNSID;
	}

	public function set_PSNSID($_pPSNSID){
		$this->PSNSID = $_pPSNSID;
	}

	public function get_EDNTANCETAB(){
		return $this->EDNTANCETAB;
	}

	public function set_EDNTANCETAB($_pEDNTANCETAB){
		$this->EDNTANCETAB = $_pEDNTANCETAB;
	}

	public function get_EDNTANCCLASSE(){
		return $this->EDNTANCCLASSE;
	}

	public function set_EDNTANCCLASSE($_pEDNTANCCLASSE){
		$this->EDNTANCCLASSE = $_pEDNTANCCLASSE;
	}

	public function get_EDNTANCTYPEETAB(){
		return $this->EDNTANCTYPEETAB;
	}

	public function set_EDNTANCTYPEETAB($_pEDNTANCTYPEETAB){
		$this->EDNTANCTYPEETAB = $_pEDNTANCTYPEETAB;
	}

	public function get_EDNTANCACDM(){
		return $this->EDNTANCACDM;
	}

	public function set_EDNTANCACDM($_pEDNTANCACDM){
		$this->EDNTANCACDM = $_pEDNTANCACDM;
	}

	public function get_EDNTANCCP(){
		return $this->EDNTANCCP;
	}

	public function set_EDNTANCCP($_pEDNTANCCP){
		$this->EDNTANCCP = $_pEDNTANCCP;
	}

	public function get_EDNTANCVILLE(){
		return $this->EDNTANCVILLE;
	}

	public function set_EDNTANCVILLE($_pEDNTANCVILLE){
		$this->EDNTANCVILLE = $_pEDNTANCVILLE;
	}

	public function get_EDNTLV1(){
		return $this->EDNTLV1;
	}

	public function set_EDNTLV1($_pEDNTLV1){
		$this->EDNTLV1 = $_pEDNTLV1;
	}

	public function get_EDNTLV2(){
		return $this->EDNTLV2;
	}

	public function set_EDNTLV2($_pEDNTLV2){
		$this->EDNTLV2 = $_pEDNTLV2;
	}

	public function get_EDNTDOUBLEMENT(){
		return $this->EDNTDOUBLEMENT;
	}

	public function set_EDNTDOUBLEMENT($_pEDNTDOUBLEMENT){
		$this->EDNTDOUBLEMENT = $_pEDNTDOUBLEMENT;
	}

	
}

?>