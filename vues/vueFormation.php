<?php

echo 'Vous etes le compte n°'.$_SESSION['num'];
$numcompte= $_SESSION['num'];
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
					<label>Formation :</label>
					<input type="text" class="form-control" name="formation" id="formationI">
				</div>
				<button type="submit" class="btn btn-success pull-right" name="suivant" id="suivantI">Suivant -></button>
			</div>
		</form>
	</div>

</div>

</body>