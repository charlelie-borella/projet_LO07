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


if(isset($_SESSION['membre'])){
$query = new Query($myBase->getMyBase());
$myQuery = "SELECT voyage.idVoyage, voyage.idTrajet, conducteurID, dateTrajet, villeDepart, villeArrivee, prnm FROM voyage, membre, trajet WHERE `dateTrajet` < CURRENT_TIMESTAMP AND trajet.conducteurID = membre.idMembre AND trajet.idTrajet = voyage.idTrajet AND voyage.idPassager = " . $_SESSION['membre']->getIdMembre();
$test = $query->queryBD($myQuery);

$res = $query->recoverQueryInArray();

//Création de deux tableaux : $ResPassees pour les objets trajets 
	$ResPassees = array();
	$conducteur1 = array();



	foreach ($res as $key => $value) {

		$conducteur1[$value['conducteurID']] = $value['prnm'];	
		$ResPassees[$value['idVoyage']] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], "", "", null);
	}	
	// echo "<pre>";
	// var_dump($membre);
	// echo "</pre>";	
	// echo "<pre>";
	//var_dump($ResPassees);
	// echo "</pre>";
// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _

$query = new Query($myBase->getMyBase());
$myQuery1 = "SELECT voyage.idTrajet, conducteurID, dateTrajet, villeDepart, villeArrivee, prnm FROM voyage, membre, trajet WHERE `dateTrajet` > CURRENT_TIMESTAMP AND trajet.conducteurID = membre.idMembre AND trajet.idTrajet = voyage.idTrajet AND voyage.idPassager = " . $_SESSION['membre']->getIdMembre();
$test2 = $query->queryBD($myQuery1);

$res = $query->recoverQueryInArray();
	// echo "<pre>";
	// var_dump($res);
	// echo "</pre>";
	$ResFutures = array();
	$conducteur2 = array();

	foreach ($res as $key => $value) {	
		$conducteur2[$value['conducteurID']] = $value['prnm'];
		$ResFutures[$value['idVoyage']] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace']);
	}

	// echo "<pre>";
	// var_dump($conducteur);
	// echo "</pre>";	
// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _

$html= headerSite("Vos annonces");
$html.= menu();
$html.=nav();

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _

// Il faudrait peut être mettre UNIQUEMENT les trajets dont date < date trajet 

$html.=ResFutures();
foreach ($ResFutures as $key => $value) {
	$conducteurNom = $membre[$value->getConducteurID()];
	$conducteurID = $value->getConducteurID();
	$idVoyage = $key;
	$dateTrajet = $value->getDate();
	$villeDep = $value->getVilleDepart();
	$villeAr = $value->getVilleArrivee();
	
	
	$html.= affichage($conducteurNom, $dateTrajet, $villeDep, $villeAr, $idVoyage);	
}
$html.= fin();

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _

// Tableau avec les voyages déjà effectués
// $idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace

$html.=ResPassees();
foreach ($ResPassees as $key => $value) {

	$conducteurNom = $conducteur1[$value->getConducteurID()];
	$idVoyage = $key;
	$dateTrajet = $value->getDate();
	$villeDep = $value->getVilleDepart();
	$villeAr = $value->getVilleArrivee();

	$html.= affichage($conducteurNom, $dateTrajet, $villeDep, $villeAr, $idVoyage);		
	
	}
$html.= fin();

$html.= foot();

echo $html;
}
else {
	header('Location: ../messageAlerte.php?message=4');
}