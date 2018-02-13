<?php

	require_once 'modele/BD.Responsable.inc.php';
	require_once 'modele/BD.SituationEmploi.inc.php';
	require_once 'modele/BD.Profession.inc.php';
	require_once 'modele/BD.Pays.inc.php';
	require_once 'outils/fonctions.php';

	if(isset($_POST['modifinforesp1']))
	{
		//controle sur le type de saisie
		$erreurNom = controleTypeTexte($_POST['modifnomresp']);
		$erreurPrenom = controleTypeTexte($_POST['modifprenomresp']);
		$erreurTel = controleNumTel($_POST['modifnumtelresp']);
		$erreurFix = controleNumTel($_POST['modifnumfixresp']);
		$erreurEmail = controleMail($_POST['modifemailresp']);
		$erreurCPAdress = controleCP($_POST['modifcpadresseresp']);
		$erreurvilleradressetu = controleTypeTexte($_POST['modifvilleadresseresp']);
		
		if ($erreurNom==false && $erreurPrenom==false && $erreurTel==false && $erreurFix==false &&
			$erreurEmail==false && $erreurCPAdress==false && $erreurvilleradressetu==false)
		{
			//recuperation des nouvelles valeurs
			$idrespetu = $_POST['idresp'];
			$upenfantsco = $_POST['modifenfantsco'];
			$uptotalenfant = $_POST['modifnbenfant'];
			$upresplegal = $_POST['modifresplegal'];
			$upnomresp=$_POST['modifnomresp'];
			$upprenomresp=$_POST['modifprenomresp'];
			$uplienparenteresp = $_POST['modiflienresp'];
			$uptelresp = $_POST['modifnumtelresp'];
			$upfixresp = $_POST['modifnumfixresp'];
			$upmailresp = $_POST['modifemailresp'];
			$upadressresp = $_POST['modifadresseresp'];
			$upcpadressresp = $_POST['modifcpadresseresp'];

			$upvilleadressresp = $_POST['modifvilleadresseresp'];
			$uppaysadressresp = $_POST['modifpaysresp'];
			$upsituemploi = $_POST['modifsituationemploiresp'];
			$upprofession = $_POST['modifprofessionresp'];
				
			//creation nouvel objet responsable
			$resp2 = new ResponsableDAO();

			//update de la table responsable
			$res=$resp2->updateResponsable($upnomresp,$upprenomresp,$uplienparenteresp,$upadressresp,$upcpadressresp,$upvilleadressresp,$uppaysadressresp,$uptelresp,$upfixresp,$upmailresp,$upresplegal,$upenfantsco,$uptotalenfant,$upprofession, $upsituemploi, $idrespetu);
			if($res==true)
			{
				header('Location: index.php?m=Accueil');
			}
			else
			{
				echo "erreur update";
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
		//creation nouvel objet responsable
		$resp = new ResponsableDAO();

		//creation nouvel objet responsable
		$emp = new SituationEmploiDAO();

		//creation nouvel objet responsable
		$prof = new ProfessionDAO();

		//creation nouvel objet pays
		$pays = new PaysDAO();

		//pour avoir toutes les informations concernant l'étudiant qui est connecté
		$infosresp = $resp->GetAllResponsableByCode($_SESSION['num']);

		//Pour avoir toutes les situations d'emploi proposées dans la BDD
		$situationemp=$emp->getSituationEmploi();

		//Pour avoir toutes les professions proposées dans la BDD
		$profession=$prof->getProfession();

		$listePays = $pays->getPays();

		//injection dans la vue
		require_once 'vues/vueModifProfilResp1.php';
	}

?>