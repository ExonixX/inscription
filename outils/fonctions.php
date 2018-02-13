<?php
//fonction qui va controler les types de textes
function controleTypeTexte($nomvariable)
{
	$taille=strlen($nomvariable);
	$taille_ok=0;

	for ($i=0; $i < $taille; $i++)
	{
		//verif champs texte
		if(preg_match("/^[a-zéèàùûêâôë\- \']*$/i", $nomvariable[$i]))
		{
			$taille_ok++;
		}
	}

	if($taille_ok==$taille)
	{
		$erreurTexte = false;	
	}
	else
	{
		echo "Erreur dans le format texte de : ".$nomvariable." <br>";
		$erreurTexte = true;
	}

	return $erreurTexte;
}
//fonction qui va controler les types de textes
function controleTypeClasse($nomvariable)
{
	$taille=strlen($nomvariable);
	$taille_ok=0;

	for ($i=0; $i < $taille; $i++)
	{
		//verif champs texte
		if(preg_match("/^[a-zéèàùûêâôë\- \'0-9]*$/i", $nomvariable[$i]))
		{
			$taille_ok++;
		}
	}

	if($taille_ok==$taille)
	{
		$erreurTexte = false;	
	}
	else
	{
		echo "Erreur dans le format texte de la classe : ".$nomvariable." <br>";
		$erreurTexte = true;
	}

	return $erreurTexte;
}
//fonction qui va controler le type INE
function controleINE($INE)
{
	if (preg_match("/^[0-9]{10}[A-Z]{1}$/", $INE))
	{
		$erreurINE = false;
	}
	else
	{
		echo "Erreur dans le format de l'INE"."<br>";
		$erreurINE=true;
	}
	return $erreurINE;
}
//fonction qui va controler le format de l'email
function controleMail($mail)
{
	if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/", $mail))
	{
		$erreurEmail = false;
	}
	else
	{
		//echo "Erreur format adresse mail"."<br>";
		$erreurEmail = true;
	}
	return $erreurEmail;
}
//fonction qui va controler le format telephone
function controleNumTel($tel)
{
	if(preg_match("/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/", $tel))
	{
		$erreurTel = false;
	}
	else
	{
		echo "erreur format tel"."<br>";
		$erreurTel = true;
	}
	return $erreurTel;
}
//fonction qui va controler le format Code Postal
function controleCP($cp)
{
	if(preg_match("/^[0-9]{5}$/", $cp))
	{
		$erreurCP = false;
	}
	else
	{
		echo "erreur format cp"."<br>";
		$erreurCP = true;
	}
	return $erreurCP;
}
//fonction qui va controler le format de la date
function controleFormatDate($date)
{
	if(preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4}$/", $date))
	{
		$erreurFormatDate = false;
	}
	else
	{
		echo "erreur format date"."<br>";
		$erreurFormatDate = true;
	}
	return $erreurFormatDate;
}

?>