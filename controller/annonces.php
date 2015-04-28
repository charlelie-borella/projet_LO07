<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../model/voyage.php");
require_once("../model/trajet.php");
require_once("../view/annonces.php");
require_once("../model/exec.php");
require_once("../model/query.php");
require_once("../view/foot.php");
require_once("../model/membre.php"); //Il faut inclure la classe pour accéder au membre

session_start();

$html= headerSite("Vos annonces");
$html.= menu();
$html.=nav();


//Tableau avec voyages pas encore effectués

$html.=Tfuturs($idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace);


if(isset($_SESSION['annonces'])){
foreach ($_SESSION['annonces'] as $key => $value) {

		$idPassager = $value->getIdPassager();
		$dateTrajet = $value->getDateTrajet();
		$villeDep = $value->getVilleDepart();
		$villeAr = $value->getVilleArrivee();
		$prix = $value->getPrix();
		$nbPlace = $value->getNbPlace();

	$idPassager = $_SESSION['annonces'][0]->getIdPassager();
	$dateTrajet = $_SESSION['annonces'][0]->getDateTrajet();
	$villeDep = $_SESSION['annonces'][0]->getVilleDepart();
	$villeAr = $_SESSION['annonces'][0]->getVilleArrivee();
	$prix = $_SESSION['annonces'][0]->getPrix();
	$nbPlace = $_SESSION['annonces'][0]->getNbPlace();

	}

	//$html.= fin();
}



// Tableau avec les voyages déjà effectués



	$html.=Tpasses($idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace);

if(isset($_SESSION['annonces'])){
foreach ($_SESSION['annonces'] as $key => $value) {

		$idPassager = $value->getIdPassager();
		$dateTrajet = $value->getDateTrajet();
		$villeDep = $value->getVilleDepart();
		$villeAr = $value->getVilleArrivee();
		$prix = $value->getPrix();
		$nbPlace = $value->getNbPlace();

	$idPassager = $_SESSION['annonces'][0]->getIdPassager();
	$dateTrajet = $_SESSION['annonces'][0]->getDateTrajet();
	$villeDep = $_SESSION['annonces'][0]->getVilleDepart();
	$villeAr = $_SESSION['annonces'][0]->getVilleArrivee();
	$prix = $_SESSION['annonces'][0]->getPrix();
	$nbPlace = $_SESSION['annonces'][0]->getNbPlace();
	}

	//$html.= fin();
}
$html.= fin();
$html.= foot();

echo $html;