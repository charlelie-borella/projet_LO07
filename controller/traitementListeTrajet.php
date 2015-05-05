<?php

require_once("../model/query.php");
require_once("../model/membre.php");
require_once("../model/voyage.php");
require_once("../model/Trajet.php");
require_once("../model/membre.php");
include("initBD.php");

session_start();

if(isset($_POST['date']) && isset($_POST['villeDep']) && isset($_POST['villeAr'])){

	$villeDep = $_POST['villeDep'];
	$villeAr = $_POST['villeAr'];
	$date = $_POST['date'];

	$query = new Query($myBase->getMyBase());
	$myQuery = "SELECT * FROM trajet WHERE villeDepart='". $villeDep . "' AND villeArrivee='". $villeAr ."' AND " . "dateTrajet like '". $date . "%'" ;
	$query->queryBD($myQuery);
	// echo "<pre>";
	// var_dump($query);
	// echo "</pre>";
	$res = $query->recoverQueryInArray();


	$listeTrajet = array();
	foreach ($res as $key => $value) {		
		$listeTrajet[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace'], $res[$key]['etat']);
	}		

	$_SESSION['listeTrajet'] = $listeTrajet;

	$placeRestante= array();
	//recherche du nombre de personne déjà inscrite à un trajet
	foreach ($listeTrajet as $key => $value) {
		
		$query2 = new Query($myBase->getMyBase());
		$myQuery2 = "SELECT count(idVoyage) FROM voyage WHERE idTrajet=". $value->getIdTrajet();
		$resQuery = $query2->queryBD($myQuery2);
		
		while($row = $resQuery->fetch(PDO::FETCH_ASSOC)){
			$placeRestante[$value->getIdTrajet()]= $row['count(idVoyage)'];
		}
	}

	$_SESSION["placeRestante"] = $placeRestante;
	

	header('Location: listeTrajet.php'); 

}
else if(isset($_POST['date']) && isset($_POST['villeDep'])){
	
	$date = $_POST['date'];
	$villeDep = $_POST['villeDep'];

	$query = new Query($myBase->getMyBase());
	$myQuery = "SELECT DISTINCT villeArrivee FROM trajet WHERE villeDepart like '". $villeDep . "' AND dateTrajet like '". $date . "%'" ;
	$query->queryBD($myQuery);
	// echo "<pre>";
	// var_dump($query);
	// echo "</pre>";
	$res = $query->recoverQueryInArray();

	$listVilleAr = array();

	foreach ($res as $key => $value) {
		$listVilleAr[] = $res[$key]['villeArrivee'];
	}


	echo json_encode($listVilleAr);
}
else if(isset($_POST['date'])){

	$date = $_POST['date'];

	$query = new Query($myBase->getMyBase());
	$myQuery = "SELECT DISTINCT villeDepart FROM trajet WHERE dateTrajet like '". $date . "%'" ;
	$query->queryBD($myQuery);
	// echo "<pre>";
	// var_dump($query);
	// echo "</pre>";
	$res = $query->recoverQueryInArray();

	$listVilleDep = array();

	foreach ($res as $key => $value) {
		$listVilleDep[] = $res[$key]['villeDepart'];
	}
	// echo "<pre>";
	// var_dump($listVilleDep);
	// echo "</pre>";

	//echo $listVilleDep;

	echo json_encode($listVilleDep);
}