<html>
<head>
<title>Un Tuto qui envoie du lourd !</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!--jQuery-->
	<script type="text/javascript" src="librairies/jquery.js"></script>
	<!--Librairie jQuery Validate-->
	<script type="text/javascript" src="librairies/jquery.validate/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="librairies/jquery.validate/dist/additional-methods.js"></script>

	<!--Mes scripts-->
	<script type="text/javascript" src="scripts/scriptFormInscription.js"></script>

</head>
<body>
<form id="votre_form" method="POST" action="">

<h3>Veuillez saisir vos informations personnelles :</h3>

	<p>
		<label for="nom">Nom : </label>
		<input type="text" name="nom" id="nom" placeholder="Ex : Dupont" />
	</p>
	<p>
		<label for="prenom">Prenom : </label>
		<input type="text" name="prenom" id="prenom" placeholder="Ex : Jean" />
	</p>
	<p>
		<label for="sexe">Sexe :</label>
		<label for="femme">
  			<input type="radio" name="sexe" id="femme" value="0" />Femme
  		</label>
  		<label for="homme">
  			<input type="radio" name="sexe" id="homme" value="1" />Homme
  		</label>
  		
  	</p>
  	<p>
		<label for="ine">N°INE/BEA :</label>
		<input type="text" name="ine" id="ine" title="Veuillez saisir votre n°INE" placeholder="10 chiffres + UNE lettre" maxlength="11" />
	</p>
	<p>
		<label for="lieunaiss">Lieu de naissance :</label>
		<input type="text" name="lieunaiss" title="Veuillez saisir votre lieu de naissance" id="lieunaiss" placeholder="Ex : Bordeaux" />
	</p>
	<p>
		<label for="cpnaiss">Code postal de naissance :</label>
		<input type="text" name="cpnaiss" title="Veuillez saisir votre code postal de naissance" id="cpnaiss" placeholder="Ex : 33000" maxlength="5" />
	</p>
	<p>
		<label for="boursier">Boursier :</label>
		<label for="oui"><input type="radio" name="boursier" id="oui" value="1" >Oui</label>
	  	<label for="non"><input type="radio" name="boursier" id="non" value="0" >Non</label>
	</p>

<h3>Veuillez saisir votre adresse :</h3>

	<p>
		<label for="adressetu">Adresse :</label>
		<input type="text" name="adressetu" title="Veuillez saisir votre adresse" id="adressetu" placeholder="Ex : 18 Route de Jean Moulin" >
	</p>
	<p>
		<label for="cpadressetu">Code postal :</label>
		<input type="text" name="cpadressetu" title="Veuillez saisir votre code postal" id="CPadressetu" placeholder="Ex : 33000" maxlength="5">
	</p>
	<p>
		<label for="villeadressetu">Ville :</label>
		<input type="text" name="villeadressetu" title="Veuillez saisir votre ville" id="villeadressetu" placeholder="Ex: Bordeaux" >
	</p>
	<p>
		<label for="tel">Téléphone :</label>
		<input type="text" name="tel" title="Veuillez saisir votre numero de telephone" id="tel" placeholder="Ex: 0500000000" maxlength="10">
	</p>
	<p>
		<label for="mail">Email :</label>
		<input type="email" name="mail" title="Veuillez saisir votre mail" id="mail" placeholder="jean@gmail.com" >
	</p>

<h3> Formation : </h3>
			
	<p>
		<label for="cycle">Cycle :</label>
		<label for="cycle1"><input type="radio" name="cycle" id="cycle1" value="premier" >1ère Année</label>
		<label for="cycle2"><input type="radio" name="cycle" id="cycle2" value="second" >2nd Année</label>
	</p>

	<!--<input type="hidden" name="cmptnum" value="<?php echo $numcompte; ?>">-->
	
	<!--<input type="submit" name="submit" value="Envoyer"/>-->
	<button type="submit" name="suivant" id="suivantI">Suivant</button>
</form>
</body>
</html>