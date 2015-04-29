<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../model/voyage.php");
require_once("../model/Trajet.php");
require_once("../view/annoncesPassagers.php");
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


$html= headerSite("Les passagers inscrits à vos trajets");
$html.= menu();
$html.=nav();


$html.=Tpasses();
foreach ($listeAP as $key => $value) {

	$dateTrajet = $value->getDate();
	$villeDep = $value->getVilleDepart();
	$villeAr = $value->getVilleArrivee();
	$prix = $value->getPrix();
	$nbPlace = $value->getNbPlace();

	$html.= affichageTFuturs($dateTrajet, $villeDep, $villeAr, $prix, $nbPlace);		
	
	}


$html.= fin();
$html.= foot();

echo $html;