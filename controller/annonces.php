<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../model/voyage.php");
require_once("../model/trajet.php");
require_once("../view/annonces.php");
require_once("../model/query.php");
require_once("../view/foot.php");
require_once("../model/membre.php"); 
include("initBD.php");
//Il faut inclure la classe pour accéder au membre

session_start();

$query = new Query($myBase->getMyBase());
$myQuery = "SELECT * FROM trajet WHERE `dateTrajet` < CURRENT_TIMESTAMP AND conducteurID=" . $_SESSION['membre']->getIdMembre();
$query->queryBD($myQuery);
	// echo "<pre>";
	// var_dump($query);
	// echo "</pre>";
$res = $query->recoverQueryInArray();

	$listeAP = array();
	foreach ($res as $key => $value) {		
		$listeAP[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace']);
	}

	// echo "<pre>";
	// var_dump($listeAP);
	// echo "</pre>";	

$html= headerSite("Vos annonces");
$html.= menu();
$html.=nav();


//Tableau avec voyages pas encore effectués

// Il faudrait peut être mettre UNIQUEMENT les trajets dont date < date trajet 

/*$html.=Tfuturs();

foreach ($listAF as $key => $value) {

		$idPassager = $value->getIdPassager();
		$dateTrajet = $value->getDateTrajet();
		$villeDep = $value->getVilleDepart();
		$villeAr = $value->getVilleArrivee();
		$prix = $value->getPrix();
		$nbPlace = $value->getNbPlace();
	}
*/
	//$html.= fin();



// Tableau avec les voyages déjà effectués
// $idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace

$html.=Tpasses();
//echo "<p><table class='table table-striped'>"
foreach ($listeAP as $key => $value) {

	$idPassager = $value->getConducteurID();
	$dateTrajet = $value->getDate();
	$villeDep = $value->getVilleDepart();
	$villeAr = $value->getVilleArrivee();
	$prix = $value->getPrix();
	$nbPlace = $value->getNbPlace();

	$html.= affichageTFuturs($idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace);		
	
	}

	//$html.= fin();
$html.= fin();
$html.= foot();

echo $html;