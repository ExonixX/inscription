<header>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</header>




<body>

	<form method="POST" action="#" enctype="multipart/form-data">
     <!-- On limite le fichier à 100Ko -->
     <input type="hidden" name="MAX_FILE_SIZE" value="100000">
     Fichier : <input id="input-1" type="file" name="avatar" class="file">
     <input type="submit" name="envoyer" value="Envoyer le fichier">
</form>


<?php

// Affichage des fichier d'un dossier -> CONTOLLEUR
$nb_fichier = 0;
echo '<ul>';

if($dossier = opendir('./upload'))
{
	while(false !== ($fichier = readdir($dossier)))
{
	if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
{
	$nb_fichier++; 
	echo '<li><a href="./upload/' . $fichier . '">' . $fichier . '</a></li>';
} 
 
} 

}

?>