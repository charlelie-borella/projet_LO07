<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");

require_once("../view/reservations.php");

require_once("../model/exec.php");
require_once("../model/voyage.php");
require_once("../model/trajet.php");
require_once("../model/query.php");
require_once("../model/membre.php"); 
include("initBD.php");
//Il faut inclure la classe pour accéder au membre

session_start();

$query = new Query($myBase->getMyBase());
$myQuery = "SELECT idTrajet, conducteurID, dateTrajet, villeDepart, villeArrivee, prnom FROM trajet, membre WHERE `dateTrajet` < CURRENT_TIMESTAMP AND `conducteurID` = `idMembre` ";
$query->queryBD($myQuery);
	 //echo "<pre>";
	 //var_dump($res);
	 //echo "</pre>";

$res = $query->recoverQueryInArray();
echo "<pre>";
	 var_dump($res);
	 echo "</pre>";	

	$RP = array();
	$membez = array();

	echo "<pre>";
	var_dump($res);
	echo "</pre>";	
	foreach ($res as $key => $value) {	
		$membre[$res][$key]['conducteurID'] = $res[$key]['prnom'];	
		$RP[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace']);
	}

	 echo "<pre>";
	 var_dump($res);
	 echo "</pre>";	

$query = new Query($myBase->getMyBase());
$myQuery1 = "SELECT * FROM trajet, membre WHERE `dateTrajet` > CURRENT_TIMESTAMP AND `conducteurID` = `idMembre`";
$query->queryBD($myQuery1);
	// echo "<pre>";
	// var_dump($query);
	// echo "</pre>";
$res = $query->recoverQueryInArray();

	$RF = array();
	foreach ($res as $key => $value) {	
		$membre[$res][$key]['conducteurID'] = $res[$key]['prnom'];		
		$RF[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace']);
	}


$html= headerSite("Vos annonces");
$html.= menu();
$html.=nav();


//Tableau avec voyages pas encore effectués

// Il faudrait peut être mettre UNIQUEMENT les trajets dont date < date trajet 

$html.=RF();
foreach ($RF as $key => $value) {
	$conducteurNom = $RP1[$value->getConducteurID];
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