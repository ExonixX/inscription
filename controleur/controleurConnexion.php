<?php

	require_once('modele/Authentification.inc.php');
	//Pour pouvoir créer un objet Etudiant
	require_once('modele/BD.Etudiant.inc.php');
	require_once('modele/BD.Agent.inc.php');

	$auth = new Authentification();

	if(isset($_POST['valider_conn']))
	{
		$log = $_POST['mail'];
		$mdp = $_POST['mdp'];
		
		//si c'est vrai
		if($auth->Login($log, $mdp))
		{
			//si le grade est un étudiant
			//$_SESSION dans la fonction Login
			if($_SESSION['grade']=="Etudiant")
			{
				$etu = new EtudiantDAO();

      			$verif = $etu->searchEtuByIdCompte($_SESSION['num']);

      			if($verif==false)
      			{
      				$_SESSION['verif']=null;	
      			}
       			else
        		{
          			$_SESSION['verif']=1;
          			$_SESSION['idetudiant']=$verif->get_EDNTID();
      			}

				if($_SESSION['verif']==1)
				{
					header('Location: index.php?m=Accueil');
				}
				else
				{
					header('Location: index.php?m=Inscription');
				}
		    }

			if($_SESSION['grade']=="Agent")
			{
				$agt = new AgentDAO();
      			$verif = $agt->searchIdAgent($_SESSION['num']);

      			if($verif==false)
      			{
      				$_SESSION['verif']=null;	
      			}
       			else
        		{
          			$_SESSION['verif']=1;
          			$_SESSION['idagent']=$verif[0]->get_AGNTID();

          			header('Location: index.php?m=Accueil');
      			}
			}
		}
		else
		{
		    echo 'erreur login ou mdp';
		}
	}
	else
	{
		require_once 'vues/vueConnexion.php';
	}
?>