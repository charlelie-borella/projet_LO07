<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");
require_once("../view/listeTrajet.php");
require_once("../model/trajet.php");
require_once("../model/membre.php");
require_once("../model/query.php");


session_start();
      
$html= headerSite("liste trajet");
$html.= menu();

if(isset($_SESSION['listeTrajet'])){

	$nbCovoiturage = count($_SESSION['listeTrajet']);
	$villeDep = $_SESSION['listeTrajet'][0]->getVilleDepart();
	$villeAr = $_SESSION['listeTrajet'][0]->getVilleArrivee();
	$date = $_SESSION['listeTrajet'][0]->getDate();
	$html.= deb($date, $nbCovoiturage, $villeDep, $villeAr);

	foreach ($_SESSION['listeTrajet'] as $key => $value) {

		$heure = $value->getHeure();//heure du trajet
		$placePrise = $_SESSION['placeRestante'][$value->getidTrajet()];//Nombre de place déjà prise
		$nbPlace = $placePrise . "/".$value->getNbPlace();//Affichage nombre de places prises / places totales
		$prix = $value->getPrix();//prix
		$idTrajet = $value->getIdTrajet();//Identifiant du trajet
		$idConducteur = $value->getConducteurID();

		$bol = $placePrise < $value->getNbPlace();//Récupère un boolean vrai s'il reste de la place
	
		$html.= trajet($bol, $heure, $nbPlace, $prix, $idTrajet, $idConducteur);//Affichage de trajet
	}

}

$html.= fin();
$html.= foot();

echo $html;