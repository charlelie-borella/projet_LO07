<?php

require_once("../view/administration/header.php");
require_once("../view/administration/menu.php");
require_once("../view/administration/foot.php");
require_once("../view/administration/gestionListeTrajetAdministration.php");
require_once("../model/admin.php");
require_once("../model/membre.php");
require_once("../model/query.php");
require_once("../model/Trajet.php");
include("initBD.php");
session_start();


$page = basename(__FILE__);     

$html= headerSite("gestion compte");
$html.= menu($page);


if($_SESSION['admin']){


	$query = new Query($myBase->getMyBase());
	$myQuery = "SELECT * FROM trajet WHERE `dateTrajet` < CURRENT_TIMESTAMP";
	$query->queryBD($myQuery);
	$res = $query->recoverQueryInArray();

	// echo "<pre>";
	// var_dump($res);
	// echo "</pre>";

	$listeTrajet = array();

	foreach ($res as $key => $value) {

		$listeTrajet[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace']);
	}


	$placeRestante=array();
	//recherche du nombre de personne déjà inscrite à un trajet
	foreach ($listeTrajet as $key => $value) {
		
		$query2 = new Query($myBase->getMyBase());
		$myQuery2 = "SELECT count(idVoyage) FROM voyage WHERE idTrajet=". $value->getIdTrajet();
		$resQuery = $query2->queryBD($myQuery2);
		
		while($row = $resQuery->fetch(PDO::FETCH_ASSOC)){
			$placeRestante[$value->getIdTrajet()]= $row['count(idVoyage)'];
		}
	}

	$html.= navBar($page);
	$html.= deb();

	foreach ($listeTrajet as $key => $value) {
		
		$idTrajet = $value->getIdTrajet();
		$date = $value->getDate() . " " . $value->getHeure();
		$villeDep = $value->getVilleDepart();
		$villeAr = $value->getVilleArrivee();
		$place = $placeRestante[$idTrajet] . " / " . $value->getNbPlace();
		$prix = $value->getPrix();
		$idConducteur= $value->getConducteurID();
		
		$html.= trajet($idTrajet, $date, $villeDep, $villeAr, $place, $prix, $idConducteur);
	}


	
	$html.=fin();
}




//$html.= foot();

echo $html;
        
      


