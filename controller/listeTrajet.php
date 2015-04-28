<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");
require_once("../view/listeTrajet.php");
require_once("../model/Trajet.php");
require_once("../model/exec.php");
require_once("../model/query.php");

session_start();
      
// $test = '14-02-2012 15:32:32';      
// $date = new DateTime($test);
// var_dump($date->format('H:i'));


$html= headerSite("liste trajet");

$html.= menu();

if(isset($_SESSION['listeTrajet'])){

	$nbCovoiturage = count($_SESSION['listeTrajet']);
	$villeDep = $_SESSION['listeTrajet'][0]->getVilleDepart();
	$villeAr = $_SESSION['listeTrajet'][0]->getVilleArrivee();

	$html.= deb($nbCovoiturage, $villeDep, $villeAr);

/*	foreach ($_SESSION['listeTrajet'] as $key => $value) {

		$heure = $value->getHeure();
		$nbPlace = $value->getNbPlace();
		$prix = $value->getPrix();
	}*/

	$html.= fin();
}

$html.= foot();

echo $html;