<?php

	require_once('modele/BD.Responsable.inc.php');
	require_once('modele/BD.Profession.inc.php');
	require_once('modele/BD.SituationEmploi.inc.php');
	require_once('modele/BD.Pays.inc.php');
	require_once('outils/fonctions.php');

	//-------------------------------------------------------------------------------------------------------------
	//insertion des données concernant le responsable légal dans la BDD
	//-------------------------------------------------------------------------------------------------------------

	if(isset($_POST['suivant']))
	{
		//controle sur le type de saisie
		$erreurNom = controleTypeTexte($_POST['nomResp1']);
		$erreurPrenom = controleTypeTexte($_POST['prenomResp1']);
		$erreurTel = controleNumTel($_POST['telResp1']);
		$erreurMail = controleMail($_POST['mailResp1']);
		$erreurFix = controleNumTel($_POST['fixResp1']);
		$erreurCP = controleCP($_POST['CPresp1']);
		$erreurVille = controleTypeTexte($_POST['villeresp1']);

		//si on a pas d'erreurs
		if($erreurNom==false && $erreurPrenom==false && $erreurTel==false && $erreurMail==false
			&& $erreurFix==false && $erreurCP==false && $erreurVille==false)
		{

			//on recupere les valeurs dans le formulaire
			$nom=$_POST['nomResp1'];
			$prenom=$_POST['prenomResp1'];
			$tel=$_POST['telResp1'];
			$mail=$_POST['mailResp1'];
			$fixe=$_POST['fixResp1'];
			$legal=$_POST['legalResp1'];
			$_SESSION['enfantsco']=$_POST['enfantsco'];
			$_SESSION['nbenfant']=$_POST['nbenfant'];
			$adresseresp=$_POST['adresseresp1'];
			$CPresp=$_POST['CPresp1'];
			$villeresp=$_POST['villeresp1'];
			$paysresp=$_POST['PSNSID'];
			$stepid=$_POST['STEPID'];
			$pfsnid=$_POST['PFSNID'];
			$resp2=$_POST['responsable2'];
			$lien=$_POST['lienResp1'];

			//-----------------------------------------------------------------------------------------------------
			//insertion des données concernant le responsable légal dans la BDD
			//-----------------------------------------------------------------------------------------------------
			$res= new ResponsableDAO();

			if(!is_null($res->insertResponsable($nom,$prenom,$lien,$adresseresp,$CPresp,$villeresp,$paysresp,$tel,$fixe,$mail,$legal,$_SESSION['enfantsco'],$_SESSION['nbenfant'],$pfsnid,$stepid)))
			{
				//pour recuperer l'id du dernier insert en String
				$numinsertresp=$res->lastInsertId();
				//conversion en Int
				$numinsertresp=intval($numinsertresp);
				//on fait le lien dans la table APPARTENIR
				$res->insertAppartenir($numinsertresp,$_SESSION['IDE']);

				//si on veut on veut ajouter un 2eme responsable
				if($resp2=="Oui")
				{
					require_once 'controleurResponsable2.php';
				}
				else
				{
					//sinon on revient dans l'accueil
					header('Location: index.php?m=Accueil');
				}
			}
		}
	}
	//redirection du sous controleur
	elseif(isset($_POST['suivant2']))
	{
		require_once 'controleurResponsable2.php';
	}
	else
	{    
		//creation des objets $profession, $emploi et $pays
		$profession = new ProfessionDAO();
		$emploi = new SituationEmploiDAO();
		$pays = new PaysDAO();

		//pour faire les listes déroulantes dans la vue
		$listeProfession = $profession->getProfession();
		$listeSituationEmploi = $emploi->getSituationEmploi();
		$listePays = $pays->getPays();
	    
	    //resultats des requetes injectées dans vueResponsable
		require_once 'vues/vueResponsable.php'; 
	}
?>