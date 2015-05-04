<?php
//Les parties stables des pages : 
require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");
//La page view correspondante : 
require_once("../view/reservations.php");
//Les models requis : 
require_once("../model/exec.php");
require_once("../model/voyage.php");
require_once("../model/trajet.php");
require_once("../model/query.php");
require_once("../model/membre.php"); 
include("initBD.php");

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//Appel de la fonction session_start qui permet de créer les sessions : 
session_start();
// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _


$query = new Query($myBase->getMyBase());
//Requête SQL
$myQuery = "SELECT idTrajet, conducteurID, dateTrajet, villeDepart, villeArrivee, prnom FROM voyage, trajet, membre WHERE `dateTrajet` < CURRENT_TIMESTAMP AND `trajet.conducteurID` = `membre.idMembre` AND `trajet.idTrajet` = `voyage.idTrajet` AND idPassager = " . $_SESSION['membre']->getIdMembre();

$test = $query->queryBD($myQuery);

var_dump($test);
$res = $query->recoverQueryInArray();

//Création de deux tableaux : $ResPassees pour les objets trajets 
// $membre pour ajouter le nom du conducteur
	$ResPassees = array();
	$membre = array();	

	foreach ($res as $key => $value) {	
		$membre[$res][$key]['conducteurID'] = $res[$key]['prnom'];	
		$ResPassees[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace']);
	}

	 echo "<pre>";
	 var_dump($res);
	 echo "</pre>";	

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _

$query = new Query($myBase->getMyBase());
$myQuery1 = "SELECT * FROM trajet, membre WHERE `dateTrajet` > CURRENT_TIMESTAMP AND `conducteurID` = `idMembre`";
$query->queryBD($myQuery1);

$res = $query->recoverQueryInArray();

	$ResFutures = array();

	foreach ($res as $key => $value) {	
		$membre[$res][$key]['conducteurID'] = $res[$key]['prnom'];		
		$ResFutures[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace']);
	}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _

$html= headerSite("Vos annonces");
$html.= menu();
$html.=nav();

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _

// Il faudrait peut être mettre UNIQUEMENT les trajets dont date < date trajet 

$html.=ResFutures();
foreach ($ResFutures as $key => $value) {
	$conducteurNom = $RP1[$value->getConducteurID];
	$conducteurID = $value->getConducteurID();
	$dateTrajet = $value->getDate();
	$villeDep = $value->getVilleDepart();
	$villeAr = $value->getVilleArrivee();
	
	
	$html.= affichageRF($conducteurID, $dateTrajet, $villeDep, $villeAr);	
}
$html.= fin();

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _

// Tableau avec les voyages déjà effectués
// $idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace

$html.=ResPassees();
foreach ($ResPassees as $key => $value) {

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