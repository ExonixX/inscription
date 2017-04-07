<?php

echo 'Vous etes le compte n°'.$_SESSION['num'];
$numcompte= $_SESSION['num'];


?>



<header>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</header>

<body>

<div class="container">
<h3> Identité de l'étudiant</h3>
	<div class="row">
		<form action="#" method="POST" id="form">
			<div class="col-md-6 col-lg-4 col-lg-offset-2">
				<div class="form-group">
					<label>Nom :</label>
					<input type="text" class="form-control" name="nom" id="nomI" placeholder="Ex: Dupond" required>
				</div>
				<label>Sexe :</label>
					<div class="radio">
  						<label><input type="radio" name="sexe" value="Fille" required>Fille</label>
  						<label><input type="radio" name="sexe" value="Homme" required>Garçon</label>
					</div>
				<div class="form-group">
					<label>N°INE/BEA :</label>
					<input type="text" class="form-control" name="ine" id="ineI" maxlength="11" placeholder="Ex: HLKBNCHRF5" required>
				</div>
					
				<div class="form-group">
					<label>Date de naissance :</label>
					<input type="date" class="form-control" name="datenaiss" id="datenaissI" maxlength="10" placeholder="Ex : 10/01/1992" required>
				</div>
				<div class="form-group">
					<label>Lieu De Naissance :</label>
					<input type="text" class="form-control" name="lieunaiss" id="lieunaissI" placeholder="Ex: Bordeaux" required>
				</div>
				<div class="form-group">
					<label>Code postal de naissance :</label>
					<input type="text" class="form-control" name="cpnaiss" id="cpnaissI" maxlength="5" placeholder="Ex: 33000" required>
				</div>
				<div class="form-group">
					<label>Pays De Naissance :</label>
					<input type="text" class="form-control" name="paysnaiss" id="paysnaissI" placeholder="Ex: France" required>
				</div>
				<div class="form-group">
					<label>Boursier :</label>
						<div class="radio">
	  						<label><input type="radio" name="boursier" value="Oui" required>Oui</label>
	  						<label><input type="radio" name="boursier" value="Non" required>Non</label>
						</div>
				</div>
	<h3>Veuillez saisir votre adresse :</h3>
				<div class="form-group">
					<label>Adresse :</label>
					<input type="text" class="form-control" name="adressetu" id="adressetuI" placeholder="Ex: 18 Route de Jean Moulin" required>
				</div>
				<div class="form-group">
					<label>Code postal :</label>
					<input type="text" class="form-control" name="cpadressetu" id="CPadressetuI" maxlength="5" placeholder="Ex: 33000" required>
				</div>
				<div class="form-group">
					<label>Ville :</label>
					<input type="text" class="form-control" name="villeadressetu" id="villeadressetuI" placeholder="Ex: Bordeaux" required>
				</div>
			</div>
			




			<div class="col-md-6 col-lg-4">
				<div class="form-group">
					<label>Prénom :</label>
					<input type="text" class="form-control" name="prenom" id="prenomI" placeholder="Ex: Thomas" required>
				</div>
				<div class="form-group">
					<label>Téléphone :</label>
					<input type="text" class="form-control" name="tel" id="telI" maxlength="10" placeholder="Ex: 0500000000" required>
				</div>
				<div class="form-group">
					<label>Adresse Mail :</label>
					<input type="text" class="form-control" name="mail" id="mailI" placeholder="jean@gmail.com" required>
				</div>
				<h3> Formation : </h3>
					<label>Cycle :</label>
						<div class="radio">
	  						<label><input type="radio" name="cycle" value="premier" required>1ére Année</label>
	  						<label><input type="radio" name="cycle" value="second" required>2nd Année</label>
						</div>
				</div>

				<div class="form-group">
				<input type="hidden" name="cmptnum" value="<?php echo $numcompte; ?>">
				</input>
				</div>
				<select name="FRMTID">
						<?php
						mysql_connect("127.0.0.1", "root", "");
						mysql_select_db("inscription_ligne");
						mysql_query("SET NAMES 'utf8'");
 
						$reponse = mysql_query("SELECT * FROM FORMATION");
						while ($donnees =  mysql_fetch_array($reponse))
					{
					?>

					<option value="<?php echo $donnees['FRMTID'] ?>"><?php echo $donnees['FRMTNOM'] ?></option>
   					<?php
  					 }
  					 ?>
				</select>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-lg-offset">
				<div class="form-group">
					<button type="submit" class="btn btn-success pull-right" name="suivant" id="suivantI">Suivant -></button>
				</div>
			</div>
		</form>
	</div>
</div>

</body>