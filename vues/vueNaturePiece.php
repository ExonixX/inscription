<header>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</header>

<div class="container">
	<h3>Liste des documents demandés :</h3>
	
	<ul>
		<?php
									
			for($i=0;$i<count($listenaturepiece);$i++)
			{ 
		?>
				<li><?php echo $listenaturepiece[$i]->get_NTPCINTITULE(); ?></li>
		<?php
			}
		?>
		</ul>



	<div class="row">
		<form action="#" method="POST" id="form">
			<div class="col-md-6 col-lg-4 col-lg-offset-0">
				<div class="form-group">
					<h3>Supprimer une pièce :</h3>
					<label>Veuillez sélectionner un élément de la liste : </label>
					<select name="NTPCID">
						<?php
							for($i=0;$i<count($listenaturepiece);$i++)
							{ 
						?>
								<option value=<?php echo $listenaturepiece[$i]->get_NTPCID(); ?> >
									<?php echo $listenaturepiece[$i]->get_NTPCINTITULE(); ?> 
								</option>
						<?php
							}
						?>	
					</select>
					<button type="submit" onclick="return confirm('Etes-vous sur de vouloir supprimer cette demande de documents ?');" class="btn btn-success pull-right-md" name="supprimer" id="supprimerI">Supprimer</button>
				</div>
			</div>
		</form>

		<form action="#" method="POST" id="form">
			<div class="col-md-6 col-lg-4 col-lg-offset-1">
				<div class="form-group">
					<h3>Ajouter une nouvelle pièce :</h3>
					<label>Veuillez saisir le nouveau document souhaité : </label>
					<input type="text" class="form-control" name="intitule" id="intituleI" placeholder="Ex : carte d'identité..." required>
					<button type="submit" class="btn btn-success pull-right-md " name="ajouter" id="suivantI">Ajouter</button>
				</div>
			</div>
		</form>
	</div>
</div>

