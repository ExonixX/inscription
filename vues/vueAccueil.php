<?php
	if(isset($_SESSION['verif']))
	{
?>
		<p>Bienvenue <?php echo $_SESSION['login']; ?>,</p>
<?php
		if ($_SESSION['grade']=="Etudiant")
		{
			if(count($tabfichiers)==0)
			{
?>
				<p>Aucun fichier n'a été déposé</p>
<?php
			}
			else
			{
?>
				<p>Fichier(s) déposé(s) :</p>
				<table border="1">
					<tr>
						<td><label>Type de fichiers</label></td>
						<td><label>Nom du fichier</label></td>
						<td><label>Date dépôt</label></td>
						<td><label>Validation</label></td>
					</tr>
	<?php
					for($i=0;$i<count($tabfichiers);$i++)
					{
	?>
						<tr>
							<td>
								<?php echo $typefichiers[$i][0]->get_NTPCINTITULE() ; ?>
							</td>
							<td>
								<?php echo $tabfichiers[$i]->get_PIDENOMFICHIER(); ?>
							</td>
							<td>
								<?php echo $tabfichiers[$i]->get_PIDEDATEDEPOT(); ?>
							</td>
							<td>
							<?php
								if($tabfichiers[$i]->get_PIDEVALIDEE()==0)
								{
									echo "En cours de validation";
								}
								else
								{
									echo "Validé";
								}
							?>
							</td>
						</tr>
	<?php
					}
	?>
				</table>
<?php
			}
		}
		elseif ($_SESSION['grade']=="Agent")
		{
?>
			<p>Nombre de fichier(s) à valider : <?php echo count($nbfichiersdeposes); ?></p>
<?php
		}
	}
	else
	{
?>
		<center><img src="img/logo/eiffel_logo.JPG"></center>

		<p>Bienvenue sur le site d'inscription en ligne du <b>Lycée Gustave Eiffel </b>:</p>
		<p>Si vous ne possédez pas de compte, veuillez vous inscrire. (Onglet : Création compte)</p>
<?php
	}
?>