<header>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</header>

<body>

<!--############################################################################################################-->
	<h3>Liste des pièces à déposer :</h3>

	<form method="POST" action="#" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td><label>Type de fichiers</label></td>
			</tr>
			
			<?php
				
				
				$compteur=0;

				//si on a aucune pieces déposées

				if(count($etatpiece)==0)
				{
					//on affiche toutes les pièces demandées
					for($i=0;$i<count($listepieces);$i++)
					{
			?>
						<tr>
				     		<td>
				     			<?php echo $listepieces[$i]->get_NTPCINTITULE(); ?>
				     			<input type="hidden" name="<?php echo "numnaturepiece".$i ;?>" value="<?php echo $listepieces[$i]->get_NTPCID(); ?>" >
				     		</td>

				     		<td>
				     			<input type="file" name="<?php echo "piece".$i ; ?>" class="file">
				     		</td>
						</tr>
			<?php
					}
			?>
					<!-- Bouton validation formulaire -->
					<div class="col-md-6 col-lg-5 col-lg-offset-0">
						<button type="submit" class="btn btn-success pull-right " name="Envoyer">
							Envoyer le(s) fichier(s)
						</button>
					</div>
			<?php
				}
				else
				{
					echo "Nombre de pieces déposées : ".count($etatpiece)."<br></br>";
					$n=0;

					for($i=0;$i<count($listepieces);$i++)
					{
						$compteur=0;

						for($j=0;$j<count($etatpiece);$j++)
						{
							if($listepieces[$i]->get_NTPCID()==$etatpiece[$j]->get_NTPCID())
							{
								$compteur++;
							}
						}

						if($compteur==0)
						{
			?>				
							<tr>
						     	<td>
						     		<?php echo $listepieces[$i]->get_NTPCINTITULE(); ?>
						     			<input type="hidden" name="<?php echo "numnaturepiece".$n ;?>" value="<?php echo $listepieces[$i]->get_NTPCID(); ?>" >
						     	</td>

						     	<td>
						     		<input type="file" name="<?php echo "piece".$n ; ?>" class="file">
						     	</td>
							</tr>
			<?php
							$n++;
						}
					}

					if($n<>0)
					{
			?>
						<div class="col-md-6 col-lg-5 col-lg-offset-0">
							<button type="submit" class="btn btn-success pull-right " name="Envoyer">
								Envoyer le(s) fichier(s)
							</button>
						</div>
			<?php
					}
				}
			?>
		</table>
	</form>
</body>