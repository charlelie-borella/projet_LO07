<?php 

require_once("../model/exec.php");
require_once("../model/membre.php");
include("initBD.php");

session_start();

if($_SESSION['membre'])
{

	$villeDep = htmlspecialchars($_POST["villeDep"]);
	$villeAr = htmlspecialchars($_POST["villeAr"]);
	$jour = htmlspecialchars($_POST["jour"]);
	$heure = htmlspecialchars($_POST["heure"]);
	$nbPlace = htmlspecialchars($_POST["nbPlace"]);
	$idMembre = $_SESSION["membre"]->getIdMembre();

	$heure = $jour . " " . $heure;
	$date=new DateTime($heure);
	//var_dump($date); 
	$result = $date->format('Y-m-d H:i:s');
	//var_dump($result);

	$exec = new Exec($myBase->getMyBase());

	$tab = array('trajet'=>array('conducteurID'=>$idMembre, 'dateTrajet'=>$result, 'villeDepart'=>$villeDep, 'villeArrivee'=>$villeAr, 'nbPlace'=>$nbPlace));
	$query = $exec->createExecFromArray($tab);

	$exec->execBD($query);
	header('Location: index.php'); 

}else{

	header('Location: index.php'); 
}

