<?php
	require_once 'modele/BD.Compte.inc.php';
	require_once('outils/fonctions.php');

	if (isset($_POST['creation']))
	{
		if($_POST['mdp1']=="" || $_POST['mdp2']=="" || $_POST['nom']=="" || $_POST['prenom']=="")
		{
			echo 'champs vides';
		}
		else
		{
			$mdp1 = $_POST['mdp1'];
			$mdp2 = $_POST['mdp2'];
			
			if($mdp1==$mdp2)
			{
				$erreurNom =  controleTypeTexte($_POST['nom']);
				$erreurPrenom =  controleTypeTexte($_POST['prenom']);
				
				if(isset($_POST['mail']))
				{
					$erreurMail = controleMail($_POST['mail']);

					if ($erreurMail)
					{
						$mail = null;
					}
					else
					{
						$mail = $_POST['mail'];
					}
				}

				if (!$erreurNom && !$erreurPrenom)
				{

					$login = $_POST['prenom'].".".$_POST['nom'];
					$mdp = $mdp1;

					$compte = new CompteDAO();

					if(!$compte->insertCompte(mb_strtolower($login), $mdp, $mail))
					{
						echo 'Erreur lors de l/insert du compte';
					}
				}
				else
				{
					echo 'erreur dans les contrôles';
				}
			}
			else
			{
				echo 'Erreur Mdp';
			}

			header('Location: index.php?m=Connexion');
			exit();
		}
	}
	else
	{
		require_once 'vues/vueCompte.php';
	}

?>