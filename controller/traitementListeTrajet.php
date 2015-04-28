<?php

require_once("../model/exec.php");
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

	$exec = new Exec($myBase->getMyBase());

	$tab = array('trajet'=>array('conducteurID'=>$idMembre, 'dateTrajet'=>$result, 'villeDepart'=>$villeDep, 'villeArrivee'=>$villeAr, 'nbPlace'=>$nbPlace));
	$query = $exec->createExecFromArray($tab);

	$exec->execBD($query);
	header('Location: index.php'); 

}