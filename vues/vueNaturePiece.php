<?php

echo 'Vous etes le compte n°'.$_SESSION['num'];
$numcompte= $_SESSION['num'];
?>

<h3> Ajouter une Piéce :</h3>
<form action="#" method="POST" id="form">
	<div class="form-group">
		<label>Intitule de la nouvelle pièce demandée :</label>
		<input type="text" class="form-control" name="ajoutpiece" id="ajoutpieceN">
	</div>
		
	<div class="col-lg-6 col-lg-offset">
		<div class="form-group">
			<button type="submit" class="btn btn-success pull-right" name="ajouter" id="ajouterN">Ajouter</button>
		</div>
	</div>
	</br>
		<div class="form-group">
		<label>Modification de l'intitulé d'une pièce :</label>
		<p>Veuillez sélectionner la pièce a modifié :</p> 
		<select name="liste">
		</select>
		<p>Modification : </p>
		<input type="text" class="form-control" name="modifpiece" id="modifpieceN">
	</div>
	
	<div class="col-lg-6 col-lg-offset">
		<div class="form-group">
			<button type="submit" class="btn btn-success pull-right" name="modifier" id="modiferN">Modifier</button>
		</div>
	</div>
		<div class="form-group">
		<label>Supprimer l'intitulé d'une pièce :</label>
		<p>Veuillez sélectionner la pièce a supprimé :</p> 
		<select name="liste">
		</select>
	</div>
		<div class="col-lg-6 col-lg-offset">
		<div class="form-group">
			<button type="submit" class="btn btn-success pull-right" name="supprimer" id="supprimerN">Supprimer</button>
		</div>
	</div>
</form>	