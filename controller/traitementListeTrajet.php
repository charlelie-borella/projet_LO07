<?php

require_once("../model/query.php");
require_once("../model/membre.php");
require_once("../model/voyage.php");
require_once("../model/Trajet.php");
require_once("../model/membre.php");
include("initBD.php");

session_start();

isset($_POST['date']){

	$date = $_POST['date'];
	echo "Success  " . $date;
}


// if(isset($_POST['villeDep']) && isset($_POST['villeAr']) && isset($_POST['date'])){
	
// 	$villeDep = $_POST['villeDep'];
// 	$villeAr = $_POST['villeAr'];
// 	$date = $_POST['date'];

// 	$query = new Query($myBase->getMyBase());
// 	$myQuery = "SELECT * FROM trajet WHERE villeDepart='". $villeDep . "' AND villeArrivee='". $villeAr ."' AND " . "dateTrajet like '". $date . "%'" ;
// 	$query->queryBD($myQuery);
// 	// echo "<pre>";
// 	// var_dump($query);
// 	// echo "</pre>";
// 	$res = $query->recoverQueryInArray();


// 	$listeTrajet = array();
// 	foreach ($res as $key => $value) {		
// 		$listeTrajet[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace']);
// 	}		

// 	$_SESSION['listeTrajet'] = $listeTrajet;

// 	$placeRestante= array();
// 	//recherche du nombre de personne déjà inscrite à un trajet
// 	foreach ($listeTrajet as $key => $value) {
		
// 		$query2 = new Query($myBase->getMyBase());
// 		$myQuery2 = "SELECT count(idVoyage) FROM voyage WHERE idTrajet=". $value->getIdTrajet();
// 		$resQuery = $query2->queryBD($myQuery2);
		
// 		while($row = $resQuery->fetch(PDO::FETCH_ASSOC)){
// 			$placeRestante[$value->getIdTrajet()]= $row['count(idVoyage)'];
// 		}
// 	}

// 	$_SESSION["placeRestante"] = $placeRestante;
	

// 	header('Location: listeTrajet.php'); 

}