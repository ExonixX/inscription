<header>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</header>

Fichiers déposés

<?php
	if($dossier = opendir("./upload"))
	{
		$nbfichier =0;
		echo '<ul>';
		while(false !== ($fichier = readdir($dossier)))
		{
			if($fichier != '.' && $fichier!= '..' && $fichier != 'index.php')
			{
				$nbfichier++;

				echo '<li><a href="upload/"'.$fichier.'>'.utf8_decode($fichier).'</a></li>';	
			}
		}
		echo '</ul>';
		echo "Nombre de dossier : ".$nbfichier;
		closedir($dossier);

	}
	else
	{
		echo "Erreur le dossier n'a pas pu s'ouvrir";
	}
?>