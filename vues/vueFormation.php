<?php


?>

<header>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</header>

<body>

<div class="container">
<h3> Concernant les formations :</h3>
	<div class="row">
	<form action="#" method="POST" id="form">
			<div class="col-md-6 col-lg-4 col-lg-offset-2">
				<div class="form-group">
				<label>Liste des Formations</label>
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
				<button type="submit" class="btn btn-success pull-right-md" name="supprimer" id="supprimerI">Supprimer</button><br>
				</div>
				<div class="form-group">
					<label>Ajouter Une Formation :</label>
					<input type="text" class="form-control" name="formation" id="nomI" placeholder="BTS.....">
				</div>
				
				<button type="submit" class="btn btn-success pull-right-md " name="suivant" id="suivantI">Ajouter</button>
			</div>
		</form>
	</div>

</div>

</body>