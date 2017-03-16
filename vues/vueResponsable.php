<?php

echo 'Vous etes le compte n°'.$_SESSION['num'];
$numcompte= $_SESSION['num'];
?>

<header>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
						<input type="text" class="form-control" name="nom" id="nomI">
					</div>
					<label>Lien de parenté :</label>
						<input type="text" class="form-control" name="lien" id="lienI" placeholder="Mère/Père">
					<div class="form-group">
						<label>Téléphone :</label>
						<input type="text" class="form-control" name="tel" id="telI">
					</div>
					<div class="form-group">
						<label>Adresse Mail :</label>
						<input type="text" class="form-control" name="mail" id="mailI">
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="form-group">
						<label>Prénom :</label>
						<input type="text" class="form-control" name="prenom" id="prenomI">
					</div>
				</div>
			</div>
		<h3>Veuillez saisir votre adresse :</h3>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-lg-offset-2">
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
				
					<div class="form-group">
						<input type="hidden" name="numcompte" value="<?php echo $numcompte; ?>">
					</div>





					
				</div>
			</div>
		<h3>Situation emploi :</h3>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-lg-offset-2">
					<div class="form-group">
						<label>Profession :</label>
						<select name="profession" size="1">
							<option>Profession1
							<option>Profession2
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