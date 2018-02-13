<?php
	echo 'Vous etes le compte n°'.$_SESSION['num'];
	$numcompte= $_SESSION['num'];
?>

<div class="container">
	<form action="#" method="POST" id="formInscription" >
		<div class="row">
		<h3> Identité de l'étudiant :</h3>
			<!--BLOC A GAUCHE -->
			<div class="col-md-6 col-lg-4 col-lg-offset-2">
				<div class="form-group">
					<p>
						<label for="nom">Nom : </label>
						<input type="text" class="form-control" name="nom" id="nom" placeholder="Ex : Dupont" />
					</p>
				</div>
				
				<div class="form-group">
					<label for="sexe">Sexe :</label>
						<div class="radio">
							<p>
								<label for="femme"><input type="radio" name="sexe" id="femme" value="0" />Femme</label>
							  	<label for="homme"><input type="radio" name="sexe" id="homme" value="1" />Homme</label>
							</p>
						</div>
				</div>
				
				<div class="form-group">
					<p>
						<label for="ine">N°INE/BEA :</label>
						<input type="text" class="form-control" name="ine" id="ine" title="Veuillez saisir votre n°INE" placeholder="10 chiffres + UNE lettre" maxlength="11" />
					</p>
				</div>
				
				<div class="form-group">
					<p>
						<label>Date de naissance :</label>
						<input type="text" class="form-control" name="datenaiss" title="Veuillez saisir votre date de naissance" id="datepicker" maxlength="10"  placeholder="Ex : 10/01/1992" />
					</p>
				</div>

				<div class="form-group">
					<p>
						<label for="lieunaiss">Lieu de naissance :</label>
						<input type="text" class="form-control" name="lieunaiss" title="Veuillez saisir votre lieu de naissance" id="lieunaiss" placeholder="Ex : Bordeaux" />
					</p>
				</div>

				<div class="form-group">
					<p>
						<label for="cpnaiss">Code postal de naissance :</label>
						<input type="text" class="form-control" name="cpnaiss" title="Veuillez saisir votre code postal de naissance" id="cpnaiss" placeholder="Ex : 33000">
					</p>
				</div>
				
				<div class="form-group">
					<label>Pays de naissance :</label>
					<select name="PSNSID">
						<?php
						
						for($i=0;$i<count($listePays);$i++)
						{ 
						?>
							<option value=<?php echo $listePays[$i]->get_PSNSID(); ?> >
								<?php echo $listePays[$i]->get_PSNSNOM(); ?> 
							</option>						
						<?php
						}
						?>	
					</select>
				</div>
			</div>
			<!--BLOC A DROITE -->
			<div class="col-md-6 col-lg-4">

				<div class="form-group">
					<p>
						<label for="prenom">Prénom : </label>
						<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Ex : Jean" />
					</p>
				</div>

				<div class="form-group">
					<p>
						<label for="tel">Téléphone :</label>
						<input type="text" class="form-control" name="tel" title="Veuillez saisir votre numero de telephone" id="tel" placeholder="Ex: 0500000000" maxlength="10">
					</p>
				</div>

				<div class="form-group">
					<p>
						<label for="mail">Email :</label>
						<input type="text" class="form-control" name="mail" title="Veuillez saisir votre mail" id="mail" placeholder="jean@gmail.com" >
					</p>
				</div>
				
				<div class="form-group">
					<label for="boursier">Boursier :</label>
						<div class="radio">
							<p>
								<label for="oui"><input type="radio" name="boursier" id="oui" value="1" >Oui</label>
						  		<label for="non"><input type="radio" name="boursier" id="non" value="0" >Non</label>
						  		<label for="en_cours"><input type="radio" name="boursier" id="en_cours" value="2" >Demande en cours</label>		
							</p>
						</div>
				</div>
			</div>
		</div>
		<h3>Veuillez saisir votre adresse :</h3>
		<div class="row">
			<div class="col-md-6 col-lg-4 col-lg-offset-2">
				<div class="form-group">
					<p>
						<label for="adressetu">Adresse :</label>
						<input type="text" class="form-control" name="adressetu" title="Veuillez saisir votre adresse" id="adressetu" placeholder="Ex : 18 Route de Jean Moulin" >
					</p>
				</div>
				<div class="form-group">
					<p>
						<label for="cpadressetu">Code postal :</label>
						<input type="text" class="form-control" name="cpadressetu" title="Veuillez saisir votre code postal" id="CPadressetu" placeholder="Ex : 33000" maxlength="5">
					</p>
				</div>

				<div class="form-group">
					<p>
						<label for="villeadressetu">Ville :</label>
						<input type="text" class="form-control" name="villeadressetu" title="Veuillez saisir votre ville" id="villeadressetu" placeholder="Ex: Bordeaux" >
					</p>
				</div>
				<!--FIN BLOC A GAUCHE -->
			</div>
		</div>
		<h3> Scolarité pour la rentrée : </h3>
		<div class="row">
			<div class="col-md-6 col-lg-4 col-lg-offset-2">
				<div class="form-group">
					<label for="doublement">S'agit-il d'un doublement :</label>
						<div class="radio">
							<p>
								<label for="doublement1"><input type="radio" name="doublement" id="doublement1" value="1" >Oui</label>
								<label for="doublement2"><input type="radio" name="doublement" id="doublement2" value="0" >Non</label>
							</p>
						</div>
				</div>
				<div class="form-group">
					<label for="cycle">Cycle :</label>
						<div class="radio">
							<p>
								<label for="cycle1"><input type="radio" name="cycle" id="cycle1" value="premier" >1ère Année</label>
								<label for="cycle2"><input type="radio" name="cycle" id="cycle2" value="second" >2nd Année</label>
							</p>
						</div>
				</div>
				<div class="form-group">
					<label>Formation :</label>
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
				</div>
					<input type="hidden" name="cmptnum" value="<?php echo $numcompte; ?>">
				<div class="form-group">
					<p>
						<label for="lv1etu">Langue vivante 1 :</label>
							<input type="text" class="form-control" name="lv1etu" title="Veuillez saisir votre langue vivante 1." id="lv1etu" >
					</p>
				</div>
				<div class="form-group">
					<p>
						<label for="lv2etu">Langue vivante 2 :</label>
							<input type="text" class="form-control" name="lv2etu" title="Veuillez saisir votre langue vivante 2." id="lv2etu" >
					</p>
				</div>
			</div>
		</div>
		<h3> Scolarité de l'année finissante : </h3>
		<div class="row">
			<div class="col-md-6 col-lg-4 col-lg-offset-2">
				<div class="form-group">
					<label for="anctypeetab">Etablissement :</label>
						<div class="radio">
							<p>
								<label for="anctypeetab1"><input type="radio" name="anctypeetab" id="anctypeetab1" value="1" >Public</label>
								<label for="anctypeetab2"><input type="radio" name="anctypeetab" id="anctypeetab2" value="0" >Privé</label>
							</p>
						</div>
				</div>
				<div class="form-group">
					<p>
						<label for="ancetab">Nom de l'établissement :</label>
						<input type="text" class="form-control" name="ancetab" title="Veuillez saisir le nom de votre établissement" id="ancetab" >
					</p>
				</div>

				<div class="form-group">
					<p>
						<label for="ancclasse">Classe :</label>
						<input type="text" class="form-control" name="ancclasse" title="Veuillez saisir votre classe actuelle" id="ancclasse" >
					</p>
				</div>
					
				<div class="form-group">
					<p>
						<label for="ancacdm">Académie :</label>
						<input type="text" class="form-control" name="ancacdm" title="Veuillez saisir votre académie actuelle." id="ancacdm" >
					</p>
				</div>
				<div class="form-group">
					<p>
						<label for="anccp">Code postal :</label>
						<input type="text" class="form-control" name="anccp" title="Veuillez le code postal de votre établissement." id="anccp" >
					</p>
				</div>
					
				<div class="form-group">
					<p>
						<label for="ancville">Ville :</label>
						<input type="text" class="form-control" name="ancville" title="Veuillez le ville de votre établissement." id="ancville" >
					</p>
				</div>
			</div>
		</div>

		<!--FIN BLOC A DROITE -->
		<div class="col-lg-6 col-lg-offset">
			<div class="form-group">
				<button type="submit" class="btn btn-success pull-right" name="suivant" id="suivantI">Suivant</button>
			</div>
		</div>
	</form>
</div>