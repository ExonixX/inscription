<?php

	require_once('modele/BD.Responsable.inc.php');
	require_once('modele/BD.Profession.inc.php');
	require_once('modele/BD.SituationEmploi.inc.php');
	require_once('modele/BD.Pays.inc.php');
	require_once('outils/fonctions.php');

	if(isset($_POST['suivant2']))
	{
		//controle sur le type de saisie
		$erreurNom = controleTypeTexte($_POST['nomResp2']);
		$erreurPrenom = controleTypeTexte($_POST['prenomResp2']);
		$erreurTel = controleNumTel($_POST['telResp2']);
		$erreurMail = controleMail($_POST['mailResp2']);
		$erreurFix = controleNumTel($_POST['fixResp2']);
		$erreurCP = controleCP($_POST['CPResp2']);
		$erreurVille = controleTypeTexte($_POST['villeResp2']);

		//si on a pas d'erreurs
		if($erreurNom==false && $erreurPrenom==false && $erreurTel==false && $erreurMail==false
			&& $erreurFix==false && $erreurCP==false && $erreurVille==false)
		{
			//on recupere les valeurs dans le formulaire
			$nom2=$_POST['nomResp2'];
			$prenom2=$_POST['prenomResp2'];
			$lien2=$_POST['lienResp2'];
			$tel2=$_POST['telResp2'];
			$mail2=$_POST['mailResp2'];
			$fixe2=$_POST['fixResp2'];
			$legal2=$_POST['legalResp2'];
			$adresseresp2=$_POST['adresseResp2'];
			$CPresp2=$_POST['CPResp2'];
			$villeresp2=$_POST['villeResp2'];
			$paysresp2=$_POST['PSNSID2'];
			$stepid2=$_POST['STEPID2'];
			$pfsnid2=$_POST['PFSNID2'];

			/*echo "Nom : ".$nomResp2."<br>";
			echo "Prenom : ".$prenomResp2."<br>";
			echo "lien : ".$lienResp2."<br>";
			echo "Numero tel : ".$telResp2."<br>";
			echo "Email : ".$mailResp2."<br>";
			echo "Numero fix : ".$fixResp2."<br>";
			echo "Parent légal : ".$legalResp2."<br>";
			echo "Adresse : ".$adresseResp2."<br>";
			echo "CP : ".$CPResp2."<br>";
			echo "Ville de domicile : ".$villeResp2."<br>";
			echo "Pays : ".$paysResp2."<br>";
			echo "SituationEmploi : ".$STEPID2."<br>";
			echo "Profession : ".$PFSNID2."<br>";*/
			
			//-----------------------------------------------------------------------------------------------------
			//insertion des données concernant le responsable légal dans la BDD
			//-----------------------------------------------------------------------------------------------------
			$res2= new ResponsableDAO();

			if(!is_null($res2->insertResponsable($nom2,$prenom2,$lien2,$adresseresp2,$CPresp2,$villeresp2,$paysresp2,$tel2,$fixe2,$mail2,$legal2,$_SESSION['enfantsco'],$_SESSION['nbenfant'],$pfsnid2,$stepid2)))
			{
				//pour recuperer l'id du dernier insert en String
				$numinsertresp2=$res2->lastInsertId();
				//conversion en Int
				$numinsertresp2=intval($numinsertresp2);

				$res2->insertAppartenir($numinsertresp2,$_SESSION['IDE']);

				header('Location: index.php?m=Accueil');
			}
			else
			{
				echo "erruerrtty";
			}
		}
	}
	else
	{    
		//creation des objets $profession, $emploi et $pays
		$profession2 = new ProfessionDAO();
		$emploi2 = new SituationEmploiDAO();
		$pays2 = new PaysDAO();

		//pour faire les listes déroulantes dans la vue
		$listeProfession2 = $profession2->getProfession();
		$listeSituationEmploi2 = $emploi2->getSituationEmploi();
		$listePays2 = $pays2->getPays();
	    
	    //resultats des requetes injectées dans vueResponsable
		require_once 'vues/vueResponsable2.php'; 
	}
?>