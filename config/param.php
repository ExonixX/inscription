<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$server="localhost";
$user="root";
$pass="";
$base="inscription_ligne";

function BDD(){
	$dsnBDD = 'mysql:dbname=inscription_ligne;host=localhost';
	$userBDD = 'root';
	$passwordBDD = '';

	try {
		$dbh = new PDO($dsnBDD, $userBDD, $passwordBDD);
		$dbh->exec('SET NAMES utf8');
                
		return $dbh;
	} catch (PDOException $e) {
		echo 'Connexion échouée : ' . $e->getMessage();
	}


}
