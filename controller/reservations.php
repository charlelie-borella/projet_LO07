<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../model/voyage.php");
require_once("../model/trajet.php");
require_once("../view/reservations.php");
require_once("../model/query.php");
require_once("../view/foot.php");
require_once("../model/membre.php"); 
include("initBD.php");
//Il faut inclure la classe pour accéder au membre

session_start();

$query = new Query($myBase->getMyBase());
$myQuery = "SELECT idTrajet, conducteurID, dateTrajet, villeDepart, villeArrivee, prnom FROM trajet, membre WHERE `dateTrajet` < CURRENT_TIMESTAMP AND conducteurID=" . $_SESSION['membre']->getIdMembre();
$query->queryBD($myQuery);
	 echo "<pre>";
	 var_dump($query);
	 echo "</pre>";
$res = $query->recoverQueryInArray();

	$RP = array();
	foreach ($res as $key => $value) {		
		$RP[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace'], $res[$key]['prnom']);
	}

	// echo "<pre>";
	// var_dump($listeAP);
	// echo "</pre>";	

$query = new Query($myBase->getMyBase());
$myQuery1 = "SELECT * FROM trajet, membre WHERE `dateTrajet` > CURRENT_TIMESTAMP AND conducteurID=" . $_SESSION['membre']->getIdMembre();
$query->queryBD($myQuery1);
	// echo "<pre>";
	// var_dump($query);
	// echo "</pre>";
$res = $query->recoverQueryInArray();

	$RF = array();
	foreach ($res as $key => $value) {		
		$RF[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace'], $res[$key]['prnom']);
	}


$html= headerSite("Vos annonces");
$html.= menu();
$html.=nav();


//Tableau avec voyages pas encore effectués

// Il faudrait peut être mettre UNIQUEMENT les trajets dont date < date trajet 

$html.=RF();
foreach ($RF as $key => $value) {

	$prnom = $value->getPrnom();
	$conducteurID = $value->getConducteurID();
	$dateTrajet = $value->getDate();
	$villeDep = $value->getVilleDepart();
	$villeAr = $value->getVilleArrivee();
	
	
	$html.= affichageRF($conducteurID, $dateTrajet, $villeDep, $villeAr);	
}
$html.= fin();



// Tableau avec les voyages déjà effectués
// $idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace

$html.=RP();
foreach ($RP as $key => $value) {

	$prnom = $value->getPrnom();
	$conducteurID = $value->getConducteurID();
	$dateTrajet = $value->getDate();
	$villeDep = $value->getVilleDepart();
	$villeAr = $value->getVilleArrivee();

	$html.= affichageRP($conducteurID, $dateTrajet, $villeDep, $villeAr);		
	
	}
$html.= fin();

$html.= foot();

echo $html;