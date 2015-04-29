<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../model/voyage.php");
require_once("../model/trajet.php");
require_once("../view/annonces.php");
require_once("../model/exec.php");
require_once("../model/query.php");
require_once("../view/foot.php");
include("initBD.php");
require_once("../model/membre.php"); //Il faut inclure la classe pour accéder au membre

session_start();

$query = new Query($myBase->getMyBase());
$myQuery = "SELECT `dateTrajet`, `villeDepart`, `villeArrivee`, `prix`, `nbPlace`, `conducteurID`, `idPassager`, `prnm`, `idMembre` FROM trajet, voyage, membre WHERE `dateTrajet` < CURRENT_TIMESTAMP AND `idPassager` = `idMembre` AND idPassager='". $idPassager . "' AND " . "dateTrajet like '". $date . "%' AND villeDepart='". $villeDep . "' AND villeArrivee='". $villeAr ."' AND prix='". $prix . "' AND nbPlace ='" . $nbPlace . "'";
$query->queryBD($myQuery);
	echo "<pre>";
	var_dump($query);
	echo "</pre>";
$res = $query->recoverQueryInArray();

	$listeAP = array();
	foreach ($res as $key => $value) {		
		$listeAP[] = new trajet($res[$key]['idPassager'], $res[$key]['date'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace']);
	}		

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
echo ("<tr>");
		$idPassager = $value->getIdPassager();
		$dateTrajet = $value->getDateTrajet();
		$villeDep = $value->getVilleDepart();
		$villeAr = $value->getVilleArrivee();
		$prix = $value->getPrix();
		$nbPlace = $value->getNbPlace();
        echo("<th>$key</th>");
        echo("<td>$value</td>");
	}
echo("</tr>");
	//$html.= fin();
$html.= fin();
$html.= foot();

echo $html;