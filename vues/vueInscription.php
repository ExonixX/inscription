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
					<input type="text" class="form-control" name="nom" id="nomI">
				</div>
				<label>Sexe :</label>
					<div class="radio">
  						<label><input type="radio" name="sexe" value="Fille">Fille</label>
  						<label><input type="radio" name="sexe" value="Garçon">Garçon</label>
					</div>
				<div class="form-group">
					<label>N°INE/BEA :</label>
					<input type="text" class="form-control" name="ine" id="ineI">
				</div>
					
				<div class="form-group">
					<label>Date de naissance :</label>
					<input type="date" class="form-control" name="datenaiss" id="datenaissI">
				</div>
				<div class="form-group">
					<label>Lieu De Naissance :</label>
					<input type="text" class="form-control" name="lieunaiss" id="lieunaissI">
				</div>
				<div class="form-group">
					<label>Code postal de naissance :</label>
					<input type="text" class="form-control" name="cpnaiss" id="cpnaissI">
				</div>
				<div class="form-group">
					<label>Pays De Naissance :</label>
					<input type="text" class="form-control" name="paysnaiss" id="paysnaissI">
				</div>
				<div class="form-group">
					<label>Boursier :</label>
						<div class="radio">
	  						<label><input type="radio" name="boursier" value="Oui">Oui</label>
	  						<label><input type="radio" name="boursier" value="Non">Non</label>
						</div>
				</div>
	<h3>Veuillez saisir votre adresse :</h3>
				<div class="form-group">
					<label>Adresse :</label>
					<input type="text" class="form-control" name="adressetu" id="adressetuI">
				</div>
				<div class="form-group">
					<label>Code postal :</label>
					<input type="text" class="form-control" name="CPadressetu" id="CPadressetuI">
				</div>
				<div class="form-group">
					<label>Ville :</label>
					<input type="text" class="form-control" name="villeadressetu" id="villeadressetuI">
				</div>
			</div>
			




			<div class="col-md-6 col-lg-4">
				<div class="form-group">
					<label>Prénom :</label>
					<input type="text" class="form-control" name="prenom" id="prenomI">
				</div>
				<div class="form-group">
					<label>Téléphone :</label>
					<input type="text" class="form-control" name="tel" id="telI">
				</div>
				<div class="form-group">
					<label>Adresse Mail :</label>
					<input type="text" class="form-control" name="mail" id="mailI">
				</div>
				<div class="form-group">
				<input type="hidden" name="numcompte" value="<?php echo $numcompte; ?>">
				</input>
				</div>
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