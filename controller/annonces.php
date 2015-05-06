<?php
//Page qui affiche la liste des annonces (idMembre = conducteurID)

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/annonces.php");
require_once("../view/foot.php");

require_once("../model/voyage.php");
require_once("../model/trajet.php");
require_once("../model/query.php");
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
		$listeAP[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace'], $res[$key]['etat']);
	}

	// echo "<pre>";
	// var_dump($listeAP);
	// echo "</pre>";	

$query = new Query($myBase->getMyBase());
$myQuery1 = "SELECT * FROM trajet WHERE `dateTrajet` > CURRENT_TIMESTAMP AND conducteurID=" . $_SESSION['membre']->getIdMembre();
$query->queryBD($myQuery1);
	// echo "<pre>";
	// var_dump($query);
	// echo "</pre>";
$res = $query->recoverQueryInArray();

	$listeAF = array();
	foreach ($res as $key => $value) {		
		$listeAF[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace'], $res[$key]['etat']);
	}


$html= headerSite("Vos annonces");
$html.= menu();
$html.=nav();


//Tableau avec voyages pas encore effectués

// Il faudrait peut être mettre UNIQUEMENT les trajets dont date < date trajet 
$TitreAVenir = "Trajet à venir";
$html.=affichageTH($TitreAVenir);
foreach ($listeAF as $key => $value) {

	$dateTrajet = $value->getDate();
	$villeDep = $value->getVilleDepart();
	$villeAr = $value->getVilleArrivee();
	$prix = $value->getPrix();
	$nbPlace = $value->getNbPlace();
	$idTrajet = $value->getIdTrajet();
	
	$html.= affichageAVenir($dateTrajet, $villeDep, $villeAr, $prix, $nbPlace, $idTrajet);	
}
$html.= fin();



// Tableau avec les voyages déjà effectués
// $idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace
$TitreRealise = "Trajet réalisés";
$html.=affichageTH($TitreRealise);

foreach ($listeAP as $key => $value) {
	
	$dateTrajet = $value->getDate();
	$villeDep = $value->getVilleDepart();
	$villeAr = $value->getVilleArrivee();
	$prix = $value->getPrix();
	$nbPlace = $value->getNbPlace();
	$idTrajet = $value->getIdTrajet();
	$etat = $value->getEtat();

	$html.= affichageTrajetPasse($dateTrajet, $villeDep, $villeAr, $prix, $nbPlace, $idTrajet,$etat);		
	
	}
$html.= fin();
$html.= foot();

echo $html;