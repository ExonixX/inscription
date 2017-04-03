<header>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</header>
<div class="container">
<h3>Liste des documents demandés :</h3>
<div class="row">
<form action="#" method="POST" id="form">
<div class="col-md-6 col-lg-4 col-lg-offset-2">
	<div class="form-group">
				<h3>Supprimer une pièce :</h3>
				<label>Veuillez sélectionner un élément de la liste : </label>
				<select name="NTPCID">
						<?php
						// A REFAIRE AU Propre
						mysql_connect("127.0.0.1", "root", "");
						mysql_select_db("inscription_ligne");
						mysql_query("SET NAMES 'utf8'");
 
						$reponse = mysql_query("SELECT * FROM Nature_piece");
						while ($donnees =  mysql_fetch_array($reponse))
					{
					?>

					<option value="<?php echo $donnees['NTPCID'] ?>"><?php echo $donnees['NTPCINTITULE'] ?></option>
   					<?php
  					 }
  					 ?>
				</select>
				<button type="submit" class="btn btn-success pull-right-md" name="supprimer" id="supprimerI">Supprimer</button><br>
				</div>
<div class="form-group">
					<h3>Ajouter une nouvelle pièce :</h3>
				<label>Veuillez saisir le nouveau document souhaité : </label>
					<input type="text" class="form-control" name="intitule" id="intituleI" placeholder="Ex : carte d'identité...">
				</div>
				
				<button type="submit" class="btn btn-success pull-right-md " name="ajouter" id="suivantI">Ajouter</button>
			</div>
			</form>
			</div>

