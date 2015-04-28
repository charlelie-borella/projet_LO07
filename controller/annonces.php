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
if(isset($_SESSION['annonces'])){
$html.=Tfuturs($idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace);
	$nbannonces = count($_SESSION['annonces']);
	$idPassager = $_SESSION['annonces'][0]->getIdPassager();
	$dateTrajet = $_SESSION['annonces'][0]->getDateTrajet();
	$villeDep = $_SESSION['annonces'][0]->getVilleDepart();
	$villeAr = $_SESSION['annonces'][0]->getVilleArrivee();
	$prix = $_SESSION['annonces'][0]->getPrix();
	$nbPlace = $_SESSION['annonces'][0]->getNbPlace();


	foreach ($_SESSION['annonces'] as $key => $value) {

		$idPassager = $value->getIdPassager();
		$nbPlace = $value->getNbPlace();
		$prix = $value->getPrix();

	
		$html.= trajet($heure, $nbPlace, $prix);
	}

	$html.= fin();
}
// Tableau avec les voyages déjà effectués
if(isset($_SESSION['annonces'])){
$html.=Tpasses($idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace);
	$nbannonces = count($_SESSION['annonces']);
	$idPassager = $_SESSION['annonces'][0]->getIdPassager();
	$dateTrajet = $_SESSION['annonces'][0]->getDateTrajet();
	$villeDep = $_SESSION['annonces'][0]->getVilleDepart();
	$villeAr = $_SESSION['annonces'][0]->getVilleArrivee();
	$prix = $_SESSION['annonces'][0]->getPrix();
	$nbPlace = $_SESSION['annonces'][0]->getNbPlace();

// CE QUE JE N'ARRIVE PAS A FAIRE : 
	foreach ($_SESSION['annonces'] as $key => $value) {

		$idPassager = $value->getIdPassager();
		$nbPlace = $value->getNbPlace();
		$prix = $value->getPrix();

	
		$html.= trajet($heure, $nbPlace, $prix);
	}

	$html.= fin();
}

$html.= foot();

echo $html;