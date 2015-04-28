<?php

require_once("../model/query.php");
require_once("../model/membre.php");
require_once("../model/voyage.php");
require_once("../model/Trajet.php");
require_once("../model/membre.php");
include("initBD.php");

session_start();


if(isset($_POST['villeDep']) && isset($_POST['villeAr']) && isset($_POST['date'])){
	
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
		$listeTrajet[] = new trajet($res[$key]['idTrajet'], $res[$key]['conducteurID'],"", $res[$key]['dateTrajet'], $res[$key]['villeDepart'], $res[$key]['villeArrivee'], $res[$key]['prix'], $res[$key]['nbPlace']);
	}		

	$_SESSION['listeTrajet'] = $listeTrajet;

	header('Location: listeTrajet.php'); 

}