<?php
	require_once('modele/BD.Etudiant.inc.php');
	require_once('modele/BD.Formation.inc.php');
	require_once('modele/BD.Pays.inc.php');
	require_once('outils/fonctions.php');

	if(isset($_POST['suivant']))
	{
		//controle sur le type de saisie
		$erreurNom = controleTypeTexte($_POST['nom']);
		$erreurPrenom = controleTypeTexte($_POST['prenom']);
		$erreurlieunaiss = controleTypeTexte($_POST['lieunaiss']);
		$erreurvilleradressetu = controleTypeTexte($_POST['villeadressetu']);
		$erreurINE = controleINE($_POST['ine']);
		$erreurEmail = controleMail($_POST['mail']);
		$erreurTel = controleNumTel($_POST['tel']);
		$erreurCPAdress = controleCP($_POST['cpadressetu']);
		$erreurCPNaiss = controleCP($_POST['cpnaiss']);
		$erreurDate = controleFormatDate($_POST['datenaiss']);
		
		$erreurEtab=controleTypeTexte($_POST['ancetab']);
		$erreurClasse=controleTypeClasse($_POST['ancclasse']);
		$erreurAcdm=controleTypeTexte($_POST['ancacdm']);
		$erreurAncCP= controleCP($_POST['anccp']);
		$erreurVille=controleTypeTexte($_POST['ancville']);
		$erreurLv1=controleTypeTexte($_POST['lv1etu']);
		$erreurLv2=controleTypeTexte($_POST['lv2etu']);

		//si on a pas d'erreurs
		if(!$erreurNom && !$erreurPrenom && !$erreurlieunaiss && !$erreurvilleradressetu
			&& !$erreurINE && !$erreurEmail && !$erreurTel && !$erreurCPAdress
			&& !$erreurCPNaiss && !$erreurDate && !$erreurEtab && !$erreurClasse && !$erreurAcdm && !$erreurAncCP && !$erreurVille && !$erreurLv1 && !$erreurLv2)
		{
			//on recupere les valeurs dans le formulaire
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$lieunaiss = $_POST['lieunaiss'];
			$villeadressetu=$_POST['villeadressetu'];
			$ine = $_POST['ine'];
			$mail = $_POST['mail'];
			$tel= $_POST['tel'];
			$cpadressetu = $_POST['cpadressetu'];
			$cpnaiss = $_POST['cpnaiss'];
			$datenaiss = $_POST['datenaiss'];
			$boursier=$_POST['boursier'];
			$cycle=$_POST['cycle'];
			$adressetu=$_POST['adressetu'];	
			$cmptnum=$_POST['cmptnum'];
			$frmtid=$_POST['FRMTID'];
			$sexe=$_POST['sexe'];
			$paysnaiss=$_POST['PSNSID'];

			$anc_etab = $_POST['ancetab'];
			$anc_classe = $_POST['ancclasse'];
			$anc_typeetab = $_POST['anctypeetab'];
			$anc_acdm = $_POST['ancacdm'];
			$anc_cp = $_POST['anccp'];
			$anc_ville = $_POST['ancville'];
			$anc_lv1 = $_POST['lv1etu'];
			$anc_lv2 = $_POST['lv2etu'];
			$doublement = $_POST['doublement'];

			$etu= new EtudiantDAO();

			/*echo "Nom : ".$nom."<br/>";
			echo "type de nom : ".gettype($nom)."<br/>";
			echo "Prenom : ".$prenom."<br/>";
			echo "type de prenom : ".gettype($prenom)."<br/>";
			echo "Lieu de naissance : ".$lieunaiss."<br/>";
			echo "type de lieu naissance : ".gettype($lieunaiss)."<br/>";
			echo "Ville de domicile : ".$villeadressetu."<br/>";
			echo "type de ville domicile : ".gettype($villeadressetu)."<br/>";
			echo "Num INE : ".$ine."<br/>";
			echo "type INE : ".gettype($ine)."<br/>";
			echo "Email : ".$mail."<br/>";
			echo "type de mail : ".gettype($mail)."<br/>";
			echo "Numero tel : ".$tel."<br/>";
			echo "type de numero : ".gettype($tel)."<br/>";
			echo "Code postal de naissance : ".$cpnaiss."<br/>";
			echo "type de CP naissance : ".gettype($cpnaiss)."<br/>";
			echo "Code postal de domicile : ".$cpadressetu."<br/>";
			echo "type de CP domicile : ".gettype($cpadressetu)."<br/>";
			echo "Boursier : ".$boursier."<br/>";
			echo "type de boursier : ".gettype($boursier)."<br/>";
			echo "Cycle : ".$cycle."<br/>";
			echo "type de cycle : ".gettype($cycle)."<br/>";
			echo "Adresse Etudiant : ".$adressetu."<br/>";
			echo "type de adresse etu : ".gettype($adressetu)."<br/>";
			echo "Numéro de compte : ".$cmptnum."<br/>";
			echo "type num compte : ".gettype($cmptnum)."<br/>";
			echo "id formation : ".$frmtid."<br/>";
			echo "type id formation : ".gettype($frmtid)."<br/>";
			echo "Sexe : ".$sexe."<br/>";
			echo "type sexe : ".gettype($sexe)."<br/>";
			echo "Date de naissance : ".$datenaiss."<br/>";
			echo "type datenaiss : ".gettype($datenaiss)."<br/>";
			echo "Pays de naissance : ".$paysnaiss."<br/>";
			echo "type paysnaiss : ".gettype($paysnaiss)."<br/>";*/

			//on insère dans la BDD
			if(!is_null($etu->insertEtudiant($nom,$prenom,$ine,$sexe,$datenaiss,$lieunaiss,$cpnaiss,$paysnaiss,$tel,$mail,$boursier,$cycle,$adressetu,$cpadressetu,$villeadressetu,$cmptnum,$frmtid,$anc_etab,$anc_classe,$anc_typeetab,$anc_acdm,$anc_cp,$anc_ville,$anc_lv1,$anc_lv2,$doublement)))
			{
				//recuperation de l'ID de l'INSERT
				//pour recuperer l'id du dernier insert en String
				$_SESSION['idetudiant']=$etu->lastInsertId();
				$numinsertetu=$_SESSION['idetudiant'];
				
				//conversion en Int
				$numinsertetu=intval($numinsertetu);

				//variable de session
				//pour recuperer l'id du dernier insert d'un étudiant
				$_SESSION['IDE'] = $numinsertetu;

				//emplacement du répertoire souhaité
				$dossier = "upload/".$_SESSION['num'];

				//creation du dossier sous le numero de compte du l'étudiant
				//si dossier existe, alors on affiche un message
				if(!is_dir($dossier))
				{
					mkdir($dossier);
				}
				header('Location: index.php?m=Responsable');
			}
			else
			{
			    echo 'Erreur requête d ajout';
			}
		}
		else
		{
			//pop up ?
			echo "erreur dans la récupération des post"."<br>";
			//retour formulaire d'inscription
		}
	}
	else
	{
		//liste déroulante des formations proposées à l'étudiant
		$liste_frmtDAO = new FormationDAO;
		$listeForm = $liste_frmtDAO->getFormation();

		$liste_paysDAO = new PaysDAO;
		$listePays = $liste_paysDAO->getPays();

		require_once 'vues/vueInscription.php';
	}
?>