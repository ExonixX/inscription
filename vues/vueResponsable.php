<?php

echo 'Vous etes le compte n°'.$_SESSION['num'];
$numcompte= $_SESSION['num'];

?>

<div class="container">
	<form action="#" method="POST" id="formResp1">
		<h3> Informations concernant le responsable 1 :</h3>
			<div class="row">
				<!--BLOC A GAUCHE-->
				<div class="col-md-6 col-lg-4 col-lg-offset-2">
					<div class="form-group">
						<p>
							<label for="nomResp1">Nom :</label>
							<input type="text" class="form-control" name="nomResp1" id="nomResp1" placeholder="Ex : Dupond" />
						</p>
					</div>
					
					<div class="form-group">
						<label>Lien de parenté :</label>
						<select name="lienResp1" >
							<option value="Mere">Mère</option>
							<option value="Pere">Père</option>
							<option value="Autre">Autre</option>
						</select>
					</div>
						
					<div class="form-group">
						<p>
							<label for="telResp1">Téléphone :</label>
							<input type="text" class="form-control" name="telResp1" id="telResp1" maxlength="10" placeholder="Ex : 0600000000" />
						</p>
					</div>

					<div class="form-group">
						<p>
							<label for="mailResp1">Email :</label>
							<input type="text" class="form-control" name="mailResp1" id="mailResp1" placeholder="jean@gmail.com"/>
						</p>
					</div>

					<div class="form-group">
						<p>
							<label for="fixResp1">Téléphone fix :</label>
							<input type="text" class="form-control" name="fixResp1" id="fixResp1" maxlength="10" placeholder="Ex : 0500000000" />
						</p>
					</div>
				<!--FIN BLOC A GAUCHE-->
				</div>
				<!--BLOC A DROITE-->
				<div class="col-md-6 col-lg-4">
					<div class="form-group">
						<p>
							<label for="prenomResp1">Prénom :</label>
							<input type="text" class="form-control" name="prenomResp1" id="prenomResp1" placeholder="Thomas"/>
						</p>
					</div>

					<label for="legalResp1">Parent Légal :</label>
						<div class="form-group">
							<div class="radio">
		  						<p>
		  							<label><input type="radio" name="legalResp1" value="1" />Oui</label>
		  							<label><input type="radio" name="legalResp1" value="0" />Non</label>
		  						</p>
							</div>
						</div>

					<div class="form-group">
						<label>Nombre D'enfants Scolarisés :</label>
							<select name="enfantsco">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="+3">3 Ou Plus</option>
							</select>
					</div>

					<div class="form-group">
						<label>Nombre D'enfants Totaux :</label>
						<select name="nbenfant">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="+3">3 Ou Plus</option>
						</select>
					</div>
				<!--FIN BLOC A DROITE-->
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-lg-offset-2">
					
					<div class="form-group">
						<p>
							<label for="adresseresp1">Adresse :</label>
							<input type="text" class="form-control" name="adresseresp1" id="adresseresp1" placeholder="Ex : 18 Route de Jean Moulin" />
						</p>
					</div>

					<div class="form-group">
						<p>
							<label for="CPresp1">Code postal :</label>
							<input type="text" class="form-control" name="CPresp1" id="CPresp1" maxlength="5" placeholder="Ex : 33000" />
						</p>
					</div>

					<div class="form-group">
						<label for="villeresp1">Ville :</label>
						<input type="text" class="form-control" name="villeresp1" id="villeresp1" placeholder="Ex : Bordeaux" />
					</div>

					<div class="form-group">
						<label>Pays :</label>
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
			</div>
		
		<h3>Situation emploi :</h3>
				
			<div class="row">
				<div class="col-md-6 col-lg-4 col-lg-offset-2">
					<div class="form-group">
						<label>Situation :</label>
						<!-- Liste déroulante SituationEmploi : controleurResponsable -->
						<select name="STEPID">
							<?php
								
							for($i=0;$i<count($listeSituationEmploi);$i++)
							{ 
							?>
								<option value=<?php echo $listeSituationEmploi[$i]->get_STEPID(); ?> >
									<?php echo $listeSituationEmploi[$i]->get_STEPLIBELLE(); ?> 
								</option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div>			
				
		<h3>Profession actuelle ou ancienne :</h3>
		
			<div class="row">
				<div class="col-md-6 col-lg-4 col-lg-offset-2">
					<div class="form-group">
						<label>Profession :</label>
							<!-- Liste déroulante Profession : controleurResponsable -->
							<select name="PFSNID" >
								<?php
									
								for($i=0;$i<count($listeProfession);$i++)
								{ 
								?>
									<option value=<?php echo $listeProfession[$i]->get_PFSNID(); ?> >
										<?php echo $listeProfession[$i]-> get_PFSNLIBELLE(); ?> 
									</option>
								<?php
								}
								?>
							</select>
					</div>
					
					<label for="responsable2">Souhaitez-vous rajouter un 2ème responsable ?</label>
					<div class="form-group">
						<div class="radio">
							<p>
								<label for="oui"><input type="radio" name="responsable2" id="oui" value="Oui" />Oui</label>
								<label for="non"><input type="radio" name="responsable2" id="non" value="Non" />Non</label>
							</p>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-success pull-right" name="suivant" id="suivant">Suivant</button>
					</div>

				</div>	
			</div>		
	</form>
</div>