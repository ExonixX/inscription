<?php

require_once 'modele/dao.inc.php';
require_once 'modele/BD.Formation.inc.php';

?>

<header>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</header>
<html>
	<body>

	<div class="container">
		<!-- Affichage des formations stockées en base -->
		<h3> Les formations proposées à Eiffel :</h3>
		<ul>
		<?php
									
			for($i=0;$i<count($listeForm);$i++)
			{ 
		?>
				<li><?php echo $listeForm[$i]->get_FRMTnom(); ?></li>
		<?php
			}
		?>
		</ul>
		<div class="row">
			<form action="#" method="POST" id="form">
				<div class="col-md-6 col-lg-4 col-lg-offset-0">
					<div class="form-group">
						<h3> Supprimer une formation :</h3>
						<label>Veuillez sélectionner un élément de la liste :</label>
							<select name="FRMTID">
								<?php
									for($i=0;$i<count($listeForm);$i++)
									{ 
								?>
									<option value=<?php echo $listeForm[$i]->get_FRMTid(); ?> >
										<?php echo $listeForm[$i]->get_FRMTnom(); ?> 
									</option>
								<?php
									}
								?>	
							</select>
							
							<button type="submit" onclick="return confirm('Etes-vous sur de vouloir supprimer cette formation ?');" class="btn btn-success pull-right-md" name="supprimer" id="supprimerI">Supprimer</button>
					</div>
				</div>
			</form>
			<form action="#" method="POST">
				<div class="col-md-6 col-lg-4 col-lg-offset-1">
					<div class="form-group">
						<h3> Ajouter une formation :</h3>
						<label>Veuillez saisir la nouvelle formation souhaitée :</label> 
						<input type="text" class="form-control" name="formation" id="nomI" placeholder="BTS..." required>
					
						<button type="submit" class="btn btn-success pull-right-md " name="ajouter" id="suivantI">Ajouter</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	</body>
</html>