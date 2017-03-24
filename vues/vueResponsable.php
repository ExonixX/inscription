<?php

echo 'Vous etes le compte n°'.$_SESSION['num'];


$numcompte= $_SESSION['num'];

?>

<header>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

</header>

<html>
<body>

<div class="container">
	<form action="#" method="POST" id="form">
		<h3> Informations concernant le responsable</h3>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-lg-offset-2">
					<div class="form-group">
						<label>Nom :</label>
						<input type="text" class="form-control" name="nom" id="nomI" placeholder="Ex: Dupond">
					</div>
					<label>Lien de parenté :</label>
						<input type="text" class="form-control" name="lien" id="lienI" placeholder="Ex: Mère/Père">
					<div class="form-group">
						<label>Téléphone :</label>
						<input type="text" class="form-control" name="tel" id="telI" placeholder="Ex: 06 00 00 00 00">
					</div>
					<div class="form-group">
						<label>Adresse Mail :</label>
						<input type="text" class="form-control" name="mail" id="mailI" placeholder="jean@gmail.com">
					</div>
					<div class="form-group">
						<label>Téléphone Fixe :</label>
						<input type="text" class="form-control" name="fixe" id="prenomI" placeholder="Ex: 05 00 00 00 00">
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="form-group">
						<label>Prénom :</label>
						<input type="text" class="form-control" name="prenom" id="prenomI" placeholder="Thomas">
					</div>
					<div class="form-group">
					<label>Parent Légal :</label>
						<div class="radio">
	  						<label><input type="radio" name="legal" value="Oui">Oui</label>
	  						<label><input type="radio" name="legal" value="Non">Non</label>
						</div>
				</div>
					<div class="form-group">
						<label>Nombre D'enfants Scolarisés :</label>
				<select name="enfantsco">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="+3">3 Ou Plus</option>
				</select>
				</div>		
					<div class="form-group">
						<label>Nombre D'enfants Totaux :</label>
				<select name="nbenfant">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="+3">3 Ou Plus</option>
				</select>
				</div>
				</div>
				</div>
		<h3>Veuillez saisir votre adresse :</h3>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-lg-offset-2">
					<div class="form-group">
						<label>Adresse :</label>
						<input type="text" class="form-control" name="adresseresp" id="adresserespI" placeholder="Ex: 18 Route de Jean Moulin">
					</div>
					<div class="form-group">
						<label>Code postal :</label>
						<input type="text" class="form-control" name="CPresp" id="CPrespI" placeholder="Ex: 33000">
					</div>
					<div class="form-group">
						<label>Ville :</label>
						<input type="text" class="form-control" name="villeresp" id="villerespI" placeholder="Ex: Bordeaux">
					</div>
					<div class="form-group">
						<label>Pays :</label>
						<input type="text" class="form-control" name="paysresp" id="paysrespI" placeholder="France">
					</div>
		
					
				</div>
			</div>
		<h3>Situation emploi :</h3>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-lg-offset-2">
					<div class="form-group">
						<label>Situation :</label>
				<select name="STEPID">
						<?php
						mysql_connect("127.0.0.1", "root", "");
						mysql_select_db("inscription_ligne");
						mysql_query("SET NAMES 'utf8'");
 
						$reponse = mysql_query("SELECT * FROM situation_emploi");
						while ($donnees =  mysql_fetch_array($reponse))
					{
					?>
					<option value="<?php echo $donnees['STEPID'] ?>"><?php echo $donnees['STEPLIBELLE'] ?></option>
   					<?php
  					 }
  					 ?>

				
				</select>
					</div>
				</div>
			</div>			
		<h3>Profession actuelle :</h3>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-lg-offset-2">
					<div class="form-group">
						<label>Profession :</label>
				<select name="PFSNID">
						<?php
						mysql_connect("127.0.0.1", "root", "");
						mysql_select_db("inscription_ligne");
						mysql_query("SET NAMES 'utf8'");
 
						$reponse = mysql_query("SELECT * FROM PROFESSION");
						while ($donnees =  mysql_fetch_array($reponse))
					{
					?>
					<option value="<?php echo $donnees['PFSNID'] ?>"><?php echo $donnees['PFSNLIBELLE'] ?></option>
   					<?php
  					 }
  					 ?>

				
				</select>
					</div>
				</div>
			</div>			
			


			<div class="form-group">
				<button type="submit" class="btn btn-success pull-right" name="suivant" id="suivantI">Suivant -></button>
			</div>	


	</form>
</div>
</body>
</html>